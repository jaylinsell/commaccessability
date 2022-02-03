<?php
 /** Template for services cards */
?>
<?php
  $title = get_sub_field('service_title');
  $content = get_sub_field('service_content');
?>
<section class="section--center">
  <?php if( $title || $content): ?>
    <article class="content content--center">
      <?php
        if( $title ) { echo '<h2>'.$title.'</h2>'; }
        if( $content ) { echo '<p>'.$content.'</p>'; }
      ?>
    </article>
  <?php endif; ?>

  <section class="card__wrapper">
    <?php if( have_rows('service_cards') ): ?>
      <?php while( have_rows('service_cards') ): the_row(); ?>
        <article class="card card--link">
          <?php
            $imageId    = get_sub_field('thumbnail');
            $title      = get_sub_field('title');
            $content    = get_sub_field('content');
            $link       = get_sub_field('link_option');
            $page       = get_sub_field('page');
            $url        = get_sub_field('url');

            $href = $link === 'page' ? $page : $url;

            if ( $link !== 'none' ) { echo '<a href="'.$href.'">'; }
          ?>
            <figure class="card__thumb">
              <?php echo wp_get_attachment_image($imageId) ?>
            </figure>

            <section class="card__content">
              <?php if( $title ): ?>
                <header class="card__header">
                  <h3><?php echo $title; ?></h3>
                </header>
              <?php endif; ?>

              <?php if ( $content ): ?>
                <p class="card__excerpt">
                  <?php echo $content; ?>
                </p>
              <?php endif; ?>
            </section>
          <?php if ( $link !== 'none' ) { echo '</a>'; } ?>
        </article>
      <?php endwhile; ?>
    <?php endif; ?>
  </section>

  <?php
    $c2a        = get_sub_field('call_to_action');
    $btnLabel   = get_sub_field('service_button_label');
    $page       = get_sub_field('service_page');
    $url        = get_sub_field('service_url');

    $href = $c2a === 'page' ? $page : $url;
    if ( $c2a !== 'none' ):
  ?>
    <footer class="section__actions">
      <a href="<?php echo $href; ?>" class="btn btn--primary"><?php echo $btnLabel; ?></a>
    </footer>
  <?php endif; ?>
</section>
