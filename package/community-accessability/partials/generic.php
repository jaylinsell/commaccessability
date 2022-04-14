<?php
  /** Template to display generic content */
  $bg = get_sub_field('background_colour');
  $greyBG = false;

  if ($bg == 'grey') {
    $greyBG = true;
  }
?>
<section class="section section--generic <?php if( $greyBG ) : ?>section--full section--grey<?php endif; ?>">
  <?php if ( $greyBG ) : ?>
    <div class="section">
  <?php endif; ?>
  <article class="content section--content">
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
  <?php if ( $greyBG ) : ?>
    </div>
  <?php endif; ?>
</section>
