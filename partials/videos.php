<?php
  /** Template to dislpay two col video section */
?>
<section class="section--grey">
  <div class="section grid grid--2">
    <?php
      $title = get_sub_field('video_title');
      $content = get_sub_field('video_content');
    ?>
    <?php if( $title || $content): ?>
      <article class="content">
        <?php
          if( $title ) { echo '<h2>'.$title.'</h2>'; }
          if( $content ) { echo '<p>'.$content.'</p>'; }
        ?>
      </article>
    <?php endif; ?>

    <?php
      $userURL = get_sub_field('video');
      parse_str( parse_url( $userURL, PHP_URL_QUERY ), $query_arrays );
      $videoId = $query_arrays['v'];
      $videoUrl = 'https://www.youtube.com/embed/'.$videoId;
    ?>
    <article class="video">
        <iframe src="<?php echo $videoUrl; ?>" frameborder="0" allowfullscreen></iframe>
    </article>
  </div>
</section>
