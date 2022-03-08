<?php
  /** Template to display locations */
?>
<section class="section section__locations">
  <article class="content section--content">
    <h2 class="section__title"><?php echo get_sub_field('title'); ?></h2>
    <?php if( have_rows('location') ): ?>
      <?php while( have_rows('location') ): the_row(); ?>
        <article class="location">
          <?php
            $location         = get_sub_field('location');
            $hours         = get_sub_field('hours');
            $address  = get_sub_field('address');
            $directions  = get_sub_field('directions');
            $imageId      = get_sub_field('photo');
          ?>
          <section class="location__content">
            <h3><?php echo $location; ?></h3>

            <?php if ( $hours ): ?>
              <p class="location__hours">
                <?php echo $hours; ?>
              </p>
            <?php endif; ?>

            <?php if ( $address ): ?>
              <p class="location__address">
                <?php echo $address; ?>
              </p>
            <?php endif; ?>

            <?php if ( $directions ): ?>
              <a href="<?php echo $directions; ?>" class="location__directions">
                Get Directions
              </a>
            <?php endif; ?>
          </section>
        <figure class="location__image">
            <?php echo wp_get_attachment_image($imageId, array('400', '400')) ?>
          </figure>
        </article>
      <?php endwhile; ?>
    <?php endif; ?>
  </article>
</section>
