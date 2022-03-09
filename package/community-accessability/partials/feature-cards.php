<?php
 /** Template for feature cards */
?>
<section class="section">
  <?php if( have_rows('cards') ): ?>
    <?php while( have_rows('cards') ): the_row(); ?>
      <article class="card card--feature">
        <?php
          $imageId    = get_sub_field('image');
          $title      = get_sub_field('title');
          $content    = get_sub_field('content');
          $link       = get_sub_field('call_to_action');
          $btnLabel   = get_sub_field('button_label');
          $page       = get_sub_field('page');
          $url        = get_sub_field('url');

          $href = $link === 'page' ? $page : $url;
        ?>
          <figure class="card__thumb">
            <?php echo wp_get_attachment_image($imageId, array('700', '600')) ?>
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

            <?php if ( $link !== 'none' ): ?>
              <a href="<?php echo $href; ?>" class="btn btn--primary"><?php echo $btnLabel; ?></a>
            <?php endif; ?>
          </section>
      </article>
    <?php endwhile; ?>
  <?php endif; ?>
</section>
