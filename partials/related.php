<?php
  /** Template to display related pages */
?>
<section class="section--grey">
  <div class="section grid grid--2">
    <?php if( have_rows('cont_block') ): ?>
      <?php while( have_rows('cont_block') ): the_row(); ?>
        <?php
          $thumb = get_sub_field('thumbnail');
          $title = get_sub_field('title');
          $content = get_sub_field('content');
          $c2a = get_sub_field('call_to_action');
          $btnLabel = get_sub_field('button_label');
          $page = get_sub_field('page');
          $url = get_sub_field('url');
        ?>
        <article class="content r-article">

          <?php if( $thumb ): ?>
            <figure class="r-article__thumb">
              <?php echo wp_get_attachment_image($thumb, array('250', '250')) ?>
            </figure>
          <?php endif; ?>

          <section class="r-article__content">
            <?php if( $title ): ?>
              <header class="r-article__header">
                <h3><?php echo $title; ?></h3>
              </header>
            <?php endif; ?>

            <?php if ( $content ): ?>
              <p class="r-article__excerpt">
                <?php echo $content; ?>
              </p>
            <?php endif; ?>

            <?php if ( $c2a !== 'none' ): ?>
              <a href="<?php echo $c2a === 'page' ? $page : $url; ?>" class="btn btn--primary"><?php echo $btnLabel; ?></a>
            <?php endif; ?>
          </section>
        </article>
      <?php endwhile; ?>
    <?php endif; ?>
</section>
