/*
 * ES2015 accessible tabs panel system, using ARIA
 * Website: https://van11y.net/accessible-tab-panel/
 * License MIT: https://github.com/nico3333fr/van11y-accessible-tab-panel-aria/blob/master/LICENSE
 */
'use strict';

function _defineProperty( obj, key, value ) {
	if ( key in obj ) {
		Object.defineProperty( obj, key, { value, enumerable: true, configurable: true, writable: true } );
	} else {
		obj[ key ] = value;
	} return obj;
}

( function( doc ) {
	'use strict';

	const TABS_JS = 'js-tabs';
	const TABS_JS_LIST = 'js-tablist';
	const TABS_JS_LISTITEM = 'js-tablist__item';
	const TABS_JS_LISTLINK = 'js-tablist__link';
	const TABS_JS_CONTENT = 'js-tabcontent';
	const TABS_JS_LINK_TO_TAB = 'js-link-to-tab';

	const TABS_DATA_PREFIX_CLASS = 'data-tabs-prefix-class';
	const TABS_DATA_HX = 'data-hx';
	const TABS_DATA_GENERATED_HX_CLASS = 'data-tabs-generated-hx-class';
	const TABS_DATA_EXISTING_HX = 'data-existing-hx';

	const TABS_DATA_SELECTED_TAB = 'data-selected';

	const TABS_PREFIX_IDS = 'label_';

	const TABS_STYLE = 'tabs';
	const TABS_LIST_STYLE = 'tabs__list';
	const TABS_LISTITEM_STYLE = 'tabs__item';
	const TABS_LINK_STYLE = 'tabs__link';
	const TABS_CONTENT_STYLE = 'tabs__content';

	const TABS_HX_DEFAULT_CLASS = 'invisible';

	const TABS_ROLE_TABLIST = 'tablist';
	const TABS_ROLE_TAB = 'tab';
	const TABS_ROLE_TABPANEL = 'tabpanel';
	const TABS_ROLE_PRESENTATION = 'presentation';

	const ATTR_ROLE = 'role';
	const ATTR_LABELLEDBY = 'aria-labelledby';
	const ATTR_HIDDEN = 'aria-hidden';
	const ATTR_CONTROLS = 'aria-controls';
	const ATTR_SELECTED = 'aria-selected';

	const DELAY_HASH_UPDATE = 1000;

	const hash = window.location.hash.replace( '#', '' );

	//const IS_OPENED_CLASS = 'is-opened';

	const findById = function findById( id ) {
		return doc.getElementById( id );
	};

	const addClass = function addClass( el, className ) {
		if ( el.classList ) {
			el.classList.add( className ); // IE 10+
		} else {
			el.className += ' ' + className; // IE 8+
		}
	};

	/*const removeClass = (el, className) => {
          if (el.classList) {
            el.classList.remove(className); // IE 10+
          }
          else {
               el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' '); // IE 8+
               }
          }*/

	const hasClass = function hasClass( el, className ) {
		if ( el.classList ) {
			return el.classList.contains( className ); // IE 10+
		}
		return new RegExp( '(^| )' + className + '( |$)', 'gi' ).test( el.className ); // IE 8+ ?
	};

	const setAttributes = function setAttributes( node, attrs ) {
		Object.keys( attrs ).forEach( function( attribute ) {
			if ( node ) {
				node.setAttribute( attribute, attrs[ attribute ] );
			}
		} );
	};
	const unSelectLinks = function unSelectLinks( elts ) {
		elts.forEach( function( link_node ) {
			let _setAttributes;

			setAttributes( link_node, ( _setAttributes = {}, _defineProperty( _setAttributes, ATTR_SELECTED, 'false' ), _defineProperty( _setAttributes, 'tabindex', '-1' ), _setAttributes ) );
		} );
	};
	const unSelectContents = function unSelectContents( elts ) {
		elts.forEach( function( content_node ) {
			content_node.setAttribute( ATTR_HIDDEN, true );
		} );
	};

	const selectLink = function selectLink( el ) {
		let _setAttributes2;

		const destination = findById( el.getAttribute( ATTR_CONTROLS ) );
		setAttributes( el, ( _setAttributes2 = {}, _defineProperty( _setAttributes2, ATTR_SELECTED, 'true' ), _defineProperty( _setAttributes2, 'tabindex', '0' ), _setAttributes2 ) );
		destination.removeAttribute( ATTR_HIDDEN );
		setTimeout( function() {
			el.focus();
		}, 0 );
		// setTimeout( function() {
		// 	history.pushState( null, null, location.pathname + location.search + '#' + el.getAttribute( ATTR_CONTROLS ) );
		// }, DELAY_HASH_UPDATE );
	};

	const selectLinkInList = function selectLinkInList( itemsList, linkList, contentList, param ) {
		let indice_trouve;

		itemsList.forEach( function( itemNode, index ) {
			if ( itemNode.querySelector( '.' + TABS_JS_LISTLINK ).getAttribute( ATTR_SELECTED ) === 'true' ) {
				indice_trouve = index;
			}
		} );
		unSelectLinks( linkList );
		unSelectContents( contentList );
		if ( param === 'next' ) {
			selectLink( linkList[ indice_trouve + 1 ] );
			setTimeout( function() {
				linkList[ indice_trouve + 1 ].focus();
			}, 0 );
		}
		if ( param === 'prev' ) {
			selectLink( linkList[ indice_trouve - 1 ] );
			setTimeout( function() {
				linkList[ indice_trouve - 1 ].focus();
			}, 0 );
		}
	};

	/* gets an element el, search if it is child of parent class, returns id of the parent */
	const searchParent = function searchParent( el, parentClass ) {
		let found = false;
		let parentElement = el.parentNode;
		while ( parentElement && found === false ) {
			if ( hasClass( parentElement, parentClass ) === true ) {
				found = true;
			} else {
				parentElement = parentElement.parentNode;
			}
		}
		if ( found === true ) {
			return parentElement.getAttribute( 'id' );
		}
		return '';
	};

	/** Find all tabs inside a container
	 *
	 * @param  {Node} node Default document
	 * @return {Array}
	 */
	const $listTabs = function $listTabs() {
		const node = arguments.length <= 0 || arguments[ 0 ] === undefined ? doc : arguments[ 0 ];
		return [].slice.call( node.querySelectorAll( '.' + TABS_JS ) );
	};

	/**
	 * Build tooltips for a container
	 *
	 * @param  {Node} node
	 */
	const attach = function attach( node ) {
		$listTabs( node ).forEach( function( tabs_node ) {
			const iLisible = Math.random().toString( 32 ).slice( 2, 12 );
			const prefixClassName = tabs_node.hasAttribute( TABS_DATA_PREFIX_CLASS ) === true ? tabs_node.getAttribute( TABS_DATA_PREFIX_CLASS ) + '-' : '';
			const hx = tabs_node.hasAttribute( TABS_DATA_HX ) === true ? tabs_node.getAttribute( TABS_DATA_HX ) : '';
			const hxGeneratedClass = tabs_node.hasAttribute( TABS_DATA_GENERATED_HX_CLASS ) === true ? tabs_node.getAttribute( TABS_DATA_GENERATED_HX_CLASS ) : TABS_HX_DEFAULT_CLASS;
			const existingHx = tabs_node.hasAttribute( TABS_DATA_EXISTING_HX ) === true ? tabs_node.getAttribute( TABS_DATA_EXISTING_HX ) : '';
			const $tabList = [].slice.call( tabs_node.querySelectorAll( '.' + TABS_JS_LIST ) );
			const $tabListItems = [].slice.call( tabs_node.querySelectorAll( '.' + TABS_JS_LISTITEM ) );
			const $tabListLinks = [].slice.call( tabs_node.querySelectorAll( '.' + TABS_JS_LISTLINK ) );
			const $tabListPanels = [].slice.call( tabs_node.querySelectorAll( '.' + TABS_JS_CONTENT ) );
			let noTabSelected = true;

			// container
			addClass( tabs_node, prefixClassName + TABS_STYLE );
			tabs_node.setAttribute( 'id', TABS_STYLE + iLisible );

			// ul
			$tabList.forEach( function( tabList ) {
				let _setAttributes3;

				addClass( tabList, prefixClassName + TABS_LIST_STYLE );
				setAttributes( tabList, ( _setAttributes3 = {}, _defineProperty( _setAttributes3, ATTR_ROLE, TABS_ROLE_TABLIST ), _defineProperty( _setAttributes3, 'id', TABS_LIST_STYLE + iLisible ), _setAttributes3 ) );
			} );
			// li
			$tabListItems.forEach( function( tabListItem, index ) {
				let _setAttributes4;

				addClass( tabListItem, prefixClassName + TABS_LISTITEM_STYLE );
				setAttributes( tabListItem, ( _setAttributes4 = {}, _defineProperty( _setAttributes4, ATTR_ROLE, TABS_ROLE_PRESENTATION ), _defineProperty( _setAttributes4, 'id', TABS_LISTITEM_STYLE + iLisible + '-' + ( index + 1 ) ), _setAttributes4 ) );
			} );
			// a
			$tabListLinks.forEach( function( tabListLink ) {
				let _setAttributes5, _setAttributes6;

				const idHref = tabListLink.getAttribute( 'href' ).replace( '#', '' );
				const panelControlled = findById( idHref );
				const linkText = tabListLink.innerText;
				const panelSelected = tabListLink.hasAttribute( TABS_DATA_SELECTED_TAB ) === true;

				addClass( tabListLink, prefixClassName + TABS_LINK_STYLE );
				setAttributes( tabListLink, ( _setAttributes5 = {
					id: TABS_PREFIX_IDS + idHref,
				}, _defineProperty( _setAttributes5, ATTR_ROLE, TABS_ROLE_TAB ), _defineProperty( _setAttributes5, ATTR_CONTROLS, idHref ), _defineProperty( _setAttributes5, 'tabindex', '-1' ), _defineProperty( _setAttributes5, ATTR_SELECTED, 'false' ), _setAttributes5 ) );

				// panel controlled
				setAttributes( panelControlled, ( _setAttributes6 = {}, _defineProperty( _setAttributes6, ATTR_HIDDEN, 'true' ), _defineProperty( _setAttributes6, ATTR_ROLE, TABS_ROLE_TABPANEL ), _defineProperty( _setAttributes6, ATTR_LABELLEDBY, TABS_PREFIX_IDS + idHref ), _setAttributes6 ) );
				addClass( panelControlled, prefixClassName + TABS_CONTENT_STYLE );

				// if already selected
				if ( panelSelected && noTabSelected ) {
					noTabSelected = false;
					setAttributes( tabListLink, _defineProperty( {
						tabindex: '0',
					}, ATTR_SELECTED, 'true' ) );
					setAttributes( panelControlled, _defineProperty( {}, ATTR_HIDDEN, 'false' ) );
				}

				// hx
				if ( hx !== '' ) {
					const hx_node = document.createElement( hx );
					hx_node.setAttribute( 'class', hxGeneratedClass );
					hx_node.setAttribute( 'tabindex', '0' );
					hx_node.innerHTML = linkText;
					panelControlled.insertBefore( hx_node, panelControlled.firstChild );
				}
				// existingHx

				if ( existingHx !== '' ) {
					const $hx_existing = [].slice.call( panelControlled.querySelectorAll( existingHx + ':first-child' ) );
					$hx_existing.forEach( function( hx_item ) {
						hx_item.setAttribute( 'tabindex', '0' );
					} );
				}

				tabListLink.removeAttribute( 'href' );
			} );

			if ( hash !== '' ) {
				const nodeHashed = findById( hash );
				if ( nodeHashed !== null ) {
					// just in case of an dumb error
					// search if hash is current tabs_node
					if ( tabs_node.querySelector( '#' + hash ) !== null ) {
						// search if hash is ON tabs
						if ( hasClass( nodeHashed, TABS_JS_CONTENT ) === true ) {
							// unselect others
							unSelectLinks( $tabListLinks );
							unSelectContents( $tabListPanels );
							// select this one
							nodeHashed.removeAttribute( ATTR_HIDDEN );
							const linkHashed = findById( TABS_PREFIX_IDS + hash );
							setAttributes( linkHashed, _defineProperty( {
								tabindex: '0',
							}, ATTR_SELECTED, 'true' ) );
							noTabSelected = false;
						} else {
							// search if hash is IN tabs
							const panelParentId = searchParent( nodeHashed, TABS_JS_CONTENT );
							if ( panelParentId !== '' ) {
								// unselect others
								unSelectLinks( $tabListLinks );
								unSelectContents( $tabListPanels );
								// select this one
								const panelParent = findById( panelParentId );
								panelParent.removeAttribute( ATTR_HIDDEN );
								const linkParent = findById( TABS_PREFIX_IDS + panelParentId );
								setAttributes( linkParent, _defineProperty( {
									tabindex: '0',
								}, ATTR_SELECTED, 'true' ) );
								noTabSelected = false;
							}
						}
					}
				}
			}

			// if no selected => select first
			if ( noTabSelected === true ) {
				setAttributes( $tabListLinks[ 0 ], _defineProperty( {
					tabindex: '0',
				}, ATTR_SELECTED, 'true' ) );
				if ( $tabListLinks[ 0 ] ) {
					const panelFirst = findById( $tabListLinks[ 0 ].getAttribute( ATTR_CONTROLS ) );
					panelFirst.removeAttribute( ATTR_HIDDEN );
				}
			}
		} );
	};

	/* listeners */
	[ 'click', 'keydown' ].forEach( function( eventName ) {
		//let isCtrl = false;

		doc.body.addEventListener( eventName, function( e ) {
			// click on a tab link or on something IN a tab link
			const parentLink = searchParent( e.target, TABS_JS_LISTLINK );
			if ( ( hasClass( e.target, TABS_JS_LISTLINK ) === true || parentLink !== '' ) && eventName === 'click' ) {
				const linkSelected = hasClass( e.target, TABS_JS_LISTLINK ) === true ? e.target : findById( parentLink );
				var parentTabId = searchParent( e.target, TABS_JS );
				var parentTab = findById( parentTabId );
				//let $parentListItems = [].slice.call(parentTab.querySelectorAll('.' + TABS_JS_LISTITEM));
				var $parentListLinks = [].slice.call( parentTab.querySelectorAll( '.' + TABS_JS_LISTLINK ) );
				var $parentListContents = [].slice.call( parentTab.querySelectorAll( '.' + TABS_JS_CONTENT ) );

				// aria selected false on all links
				unSelectLinks( $parentListLinks );
				// add aria-hidden on all tabs contents
				unSelectContents( $parentListContents );
				// add aria selected on selected link + show linked panel
				selectLink( linkSelected );

				e.preventDefault();
			}

			// Key down on tabs
			if ( ( hasClass( e.target, TABS_JS_LISTLINK ) === true || parentLink !== '' ) && eventName === 'keydown' ) {
				//let linkSelected = hasClass( e.target, TABS_JS_LISTLINK) === true ? e.target : findById( parentLink );
				var parentTabId = searchParent( e.target, TABS_JS );
				var parentTab = findById( parentTabId );
				const $parentListItems = [].slice.call( parentTab.querySelectorAll( '.' + TABS_JS_LISTITEM ) );
				var $parentListLinks = [].slice.call( parentTab.querySelectorAll( '.' + TABS_JS_LISTLINK ) );
				var $parentListContents = [].slice.call( parentTab.querySelectorAll( '.' + TABS_JS_CONTENT ) );
				const firstLink = $parentListItems[ 0 ].querySelector( '.' + TABS_JS_LISTLINK );
				const lastLink = $parentListItems[ $parentListItems.length - 1 ].querySelector( '.' + TABS_JS_LISTLINK );

				// strike home on a tab => 1st tab
				if ( e.keyCode === 36 ) {
					unSelectLinks( $parentListLinks );
					unSelectContents( $parentListContents );
					selectLink( firstLink );

					e.preventDefault();
				}
				// strike end on a tab => last tab
				else if ( e.keyCode === 35 ) {
					unSelectLinks( $parentListLinks );
					unSelectContents( $parentListContents );
					selectLink( lastLink );

					e.preventDefault();
				}
				// strike up or left on the tab => previous tab
				else if ( ( e.keyCode === 37 || e.keyCode === 38 ) && ! e.ctrlKey ) {
					if ( firstLink.getAttribute( ATTR_SELECTED ) === 'true' ) {
						unSelectLinks( $parentListLinks );
						unSelectContents( $parentListContents );
						selectLink( lastLink );

						e.preventDefault();
					} else {
						selectLinkInList( $parentListItems, $parentListLinks, $parentListContents, 'prev' );
						e.preventDefault();
					}
				}
				// strike down or right in the tab => next tab
				else if ( ( e.keyCode === 40 || e.keyCode === 39 ) && ! e.ctrlKey ) {
					if ( lastLink.getAttribute( ATTR_SELECTED ) === 'true' ) {
						unSelectLinks( $parentListLinks );
						unSelectContents( $parentListContents );
						selectLink( firstLink );

						e.preventDefault();
					} else {
						selectLinkInList( $parentListItems, $parentListLinks, $parentListContents, 'next' );
						e.preventDefault();
					}
				}
			}

			// Key down in tab panels
			const parentTabPanelId = searchParent( e.target, TABS_JS_CONTENT );
			if ( parentTabPanelId !== '' && eventName === 'keydown' ) {
				( function() {
					const linkSelected = findById( findById( parentTabPanelId ).getAttribute( ATTR_LABELLEDBY ) );
					const parentTabId = searchParent( e.target, TABS_JS );
					const parentTab = findById( parentTabId );
					const $parentListItems = [].slice.call( parentTab.querySelectorAll( '.' + TABS_JS_LISTITEM ) );
					const $parentListLinks = [].slice.call( parentTab.querySelectorAll( '.' + TABS_JS_LISTLINK ) );
					const $parentListContents = [].slice.call( parentTab.querySelectorAll( '.' + TABS_JS_CONTENT ) );
					const firstLink = $parentListItems[ 0 ].querySelector( '.' + TABS_JS_LISTLINK );
					const lastLink = $parentListItems[ $parentListItems.length - 1 ].querySelector( '.' + TABS_JS_LISTLINK );

					// strike up + ctrl => go to header
					if ( e.keyCode === 38 && e.ctrlKey ) {
						setTimeout( function() {
							linkSelected.focus();
						}, 0 );
						e.preventDefault();
					}
					// strike pageup + ctrl => go to prev header
					if ( e.keyCode === 33 && e.ctrlKey ) {
						// go to header
						linkSelected.focus();
						e.preventDefault();
						// then previous
						if ( firstLink.getAttribute( ATTR_SELECTED ) === 'true' ) {
							unSelectLinks( $parentListLinks );
							unSelectContents( $parentListContents );
							selectLink( lastLink );
						} else {
							selectLinkInList( $parentListItems, $parentListLinks, $parentListContents, 'prev' );
						}
					}
					// strike pagedown + ctrl => go to next header
					if ( e.keyCode === 34 && e.ctrlKey ) {
						// go to header
						linkSelected.focus();
						e.preventDefault();
						// then next
						if ( lastLink.getAttribute( ATTR_SELECTED ) === 'true' ) {
							unSelectLinks( $parentListLinks );
							unSelectContents( $parentListContents );
							selectLink( firstLink );
						} else {
							selectLinkInList( $parentListItems, $parentListLinks, $parentListContents, 'next' );
						}
					}
				}() );
			}

			// click on a tab link
			const parentLinkToPanelId = searchParent( e.target, TABS_JS_LINK_TO_TAB );
			if ( ( hasClass( e.target, TABS_JS_LINK_TO_TAB ) === true || parentLinkToPanelId !== '' ) && eventName === 'click' ) {
				const panelSelectedId = hasClass( e.target, TABS_JS_LINK_TO_TAB ) === true ? e.target.getAttribute( 'href' ).replace( '#', '' ) : findById( parentLinkToPanelId ).replace( '#', '' );
				const panelSelected = findById( panelSelectedId );
				const buttonPanelSelected = findById( panelSelected.getAttribute( ATTR_LABELLEDBY ) );
				var parentTabId = searchParent( e.target, TABS_JS );
				var parentTab = findById( parentTabId );
				//let $parentListItems = [].slice.call(parentTab.querySelectorAll('.' + TABS_JS_LISTITEM));
				var $parentListLinks = [].slice.call( parentTab.querySelectorAll( '.' + TABS_JS_LISTLINK ) );
				var $parentListContents = [].slice.call( parentTab.querySelectorAll( '.' + TABS_JS_CONTENT ) );

				unSelectLinks( $parentListLinks );
				unSelectContents( $parentListContents );
				selectLink( buttonPanelSelected );

				e.preventDefault();
			}
		}, true );
	} );

	const onLoad = function onLoad() {
		attach();
		document.removeEventListener( 'DOMContentLoaded', onLoad );
	};

	document.addEventListener( 'DOMContentLoaded', onLoad );

	window.van11yAccessibleTabPanelAria = attach;
}( document ) );
