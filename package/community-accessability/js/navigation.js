/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	const siteNavigation = document.getElementById( 'site-navigation' );

	// Return early if the navigation don't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];

	// Return early if the button don't exist.
	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}

	const body = document.querySelector( 'body' );

	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	button.addEventListener( 'click', function() {
		siteNavigation.classList.toggle( 'toggled' );
		body.classList.toggle( 'nav-toggled' );

		if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
			button.setAttribute( 'aria-expanded', 'false' );
		} else {
			button.setAttribute( 'aria-expanded', 'true' );
		}
	} );

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	const searchBtn = document.querySelector( '.header__top .btn--search' );
	const searchField = document.querySelector( '.header__top .search-field' );
	const searchForm = document.querySelector( '.header__top .search-form' );

	const highContrastBtn = document.querySelector( '.acc__high-contrast' );

	document.addEventListener( 'click', function( event ) {
		const isClickInside = siteNavigation.contains( event.target );
		const closeBtns = siteNavigation.querySelectorAll( '.nav__close' );
		const isCloseBtn = [ ...closeBtns ].some( ( btn ) => btn.contains( event.target ) );
		const subMenuBtns = siteNavigation.querySelectorAll( '.sub-menu-toggle' );
		const isSubMenuToggle = [ ...subMenuBtns ].some( ( btn ) => btn.contains( event.target ) );

		if ( ! isClickInside || isCloseBtn ) {
			siteNavigation.classList.remove( 'toggled' );
			body.classList.remove( 'nav-toggled' );
			button.setAttribute( 'aria-expanded', 'false' );
			[ ...subMenuBtns ].forEach( ( btn ) => btn.classList.remove( 'menu-item-open' ) );
		}

		if ( isSubMenuToggle ) {
			event.target.classList.toggle( 'menu-item-open' );
		}

		// if search btn- we just want to focus on the field if it's empty
		if ( searchBtn && searchBtn.contains( event.target ) || searchForm && searchForm.contains( event.target ) ) {
			if ( ! searchForm.classList.contains( 'search-form--open' ) ) {
				event.preventDefault();
				searchForm.classList.add( 'search-form--open' );
				searchField.focus();
			}
		} else if ( searchForm.classList.contains( 'search-form--open' ) ) {
			searchForm.classList.remove( 'search-form--open' );
		}
	} );

	[ searchBtn, searchField ].forEach( ( el ) => {
		el.addEventListener( 'mouseenter', () => {
			searchForm.classList.add( 'search-form--hover' );
		} );

		el.addEventListener( 'mouseleave', () => {
			searchForm.classList.remove( 'search-form--hover' );
		} );
	} );

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName( 'a' );

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

	// Toggle focus each time a menu link is focused or blurred.
	for ( const link of links ) {
		link.addEventListener( 'focus', toggleFocus, true );
		link.addEventListener( 'blur', toggleFocus, true );
	}

	// Toggle focus each time a menu link with children receive a touch event.
	for ( const link of linksWithChildren ) {
		link.addEventListener( 'touchstart', toggleFocus, false );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		if ( event.type === 'focus' || event.type === 'blur' ) {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while ( ! self.classList.contains( 'nav-menu' ) ) {
				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					self.classList.toggle( 'focus' );
				}
				self = self.parentNode;
			}
		}
	}
}() );
