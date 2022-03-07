<?php
  /** Template to display user profiles/people */
?>
<section class="section">
  <?php if( have_rows('person') ): ?>
    <?php while( have_rows('person') ): the_row(); ?>
      <article class="people">
        <?php
          $imageId      = get_sub_field('photo');
          $name         = get_sub_field('name');
          $role         = get_sub_field('job_description');
          $description  = get_sub_field('description');
        ?>
        <figure class="people__thumb">
          <?php echo wp_get_attachment_image($imageId, array('400', '400')) ?>
        </figure>

        <section class="people__content">
          <header class="people__header">
            <h3><?php echo $name; ?></h3>
            <p><?php echo $role; ?></p>
          </header>

          <?php if ( $description ): ?>
            <p class="people__excerpt">
              <?php echo $description; ?>
            </p>
          <?php endif; ?>
        </section>
      </article>
    <?php endwhile; ?>
  <?php endif; ?>
</section>
