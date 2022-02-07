<?php
  /** Template to display generic content */
?>
<section class="section--full">
  <article class="content">
    <?php the_sub_field('general_content'); ?>

    <?php
        $c2a        = get_sub_field('general_call_to_action');
        $btnLabel   = get_sub_field('general_button_label');
        $page       = get_sub_field('general_page');
        $url        = get_sub_field('general_url');

        $href = $c2a === 'page' ? $page : $url;
        if ( $c2a !== 'none' ):
      ?>
        <div class="c2a">
          <a href="<?php echo $href; ?>" class="btn btn--primary"><?php echo $btnLabel; ?></a>
        </div>
      <?php endif; ?>
  </article>
</section>
