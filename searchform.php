<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Search…', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
    <button type="submit" class="btn btn--search search-submit">
      <svg class="search-icon" width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
        <title>Search</title>
        <path d="M7 13.0762C10.3137 13.0762 13 10.3728 13 7.03809C13 3.70334 10.3137 1 7 1C3.68629 1 1 3.70334 1 7.03809C1 10.3728 3.68629 13.0762 7 13.0762Z" stroke="#5C068C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M16.9999 17.1021L11.2856 11.3516" stroke="#5C068C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </button>
</form>
