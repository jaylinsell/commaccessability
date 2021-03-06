<?php
  /** Template to display events */
  $categories     = get_categories();
  $sectionObj = new StdClass;
  $sectionTitle = get_sub_field('title');

?>
<section class="section">
  <?php if( have_rows('event') ): ?>
    <?php while( have_rows('event') ): the_row(); ?>
      <?php
        // for each item, push to the tabArray so we can create the tabs
        $id       = get_sub_field('category');
        $title          = get_sub_field('title');
        $date           = get_sub_field('date_time');
        $description    = get_sub_field('description');
        $cost           = get_sub_field('cost');
        $location       = get_sub_field('location');
        // $parent   = get_category(get_category($id)->category_parent);
        // $parentID = $parent->term_id;
        // $parentName = $parent->name;

        $event = new StdClass;
        $event->id = $id;
        $event->title = $title;
        $event->date = $date;
        $event->description = $description;
        $event->cost = $cost;
        $event->location = $location;

        if (!property_exists($sectionObj, $id)) {
          $sectionObj->$id = new StdClass;
          $sectionObj->$id->id = $id;
          $sectionObj->$id->cat_name = get_category($id)->name;
          $sectionObj->$id->events = array();
        }

        // if(!isset($sectionObj->$id->events[$event->id])) {
        array_push($sectionObj->$id->events, $event);
        // }
      ?>
      <!-- <div style="border: 1px solid black; padding: 1em;" >
        <div><?php echo $id; ?></div>
        <div><?php echo $title; ?></div>
        <div><?php echo $date; ?></div>
        <div><?php echo $description; ?></div>
        <div><?php echo $cost; ?></div>
        <div><?php echo $location; ?></div>
      </div> -->
    <?php endwhile; ?>
  <?php endif; ?>

  <article class="event__section js-tabs">
    <!-- <?php
      print_r($sectionObj);
    ?> -->
    <h2 class="event__title--main" id="<?php echo $sectionTitle ?>"><?php echo $sectionTitle ?></h2>

    <ul class="js-tablist" data-hx="h2">
      <!-- get length of sectionObj -->
      <?php
        $sectionLength = count((array)$sectionObj);
        if ($sectionLength > 1) :
      ?>
        <?php foreach($sectionObj as $section) : ?>
          <li class="js-tablist__item">
            <a href="<?php echo $sectionTitle . '-' . $section->id; ?>" class="js-tablist__link" role="button">
              <?php echo $section->cat_name; ?>
            </a>
          </li>
        <?php endforeach; ?>
      <?php endif; ?>
    </ul>

    <?php foreach($sectionObj as $section) : ?>
      <section id="<?php echo $sectionTitle . '-' . $section->id; ?>" class="event__content js-tabcontent">
        <?php foreach($section->events as $event) : ?>
            <article class="event__card">
              <div class="event__col--1">
                <h3 class="event__title">
                  <?php echo $event->title; ?>
                </h3>

                <?php if ($event->date) : ?>
                  <div class="event__description">
                    <?php echo $event->date; ?>
                  </div>
                <?php endif; ?>

                <?php if ($event->description) : ?>
                  <div class="event__time ">
                    <?php echo $event->description; ?>
                  </div>
                <?php endif; ?>
              </div>

              <div class="event__col--2">
                <?php if ($event->cost) : ?>
                  <div class="event__cost">
                    <strong>Cost:</strong>
                    <?php echo $event->cost; ?>
                  </div>
                <?php endif; ?>

                <?php if ($event->location) : ?>
                  <div class="event__location">
                    <strong>Location:</strong>
                    <?php echo $event->location; ?>
                  </div>
                <?php endif; ?>

                <a href="<?php echo get_site_url(); ?>/257-2/" class="event__enquire">Enquire about this event</a>
              </div>
            </article>

        <?php endforeach; ?>
      </section>
    <?php endforeach; ?>
  </article>
</section>

