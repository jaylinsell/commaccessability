<?php
  /** Template to display events */
  $categories     = get_categories();

  $sectionObj = new StdClass;

  // $sectionArray   = array();
  $tabArray       = array();
  // create object with 2 arrays
?>
<section class="section">
  <?php if( have_rows('event') ): ?>
    <?php while( have_rows('event') ): the_row(); ?>
      <?php
        // for each item, push to the tabArray so we can create the tabs
        $id       = get_sub_field('category');
        $parent   = get_category(get_category($id)->category_parent);
        $parentID = $parent->term_id;
        $parentName = $parent->name;

        if (!property_exists($sectionObj, $parentID)) {
          $sectionObj->$parentID = new StdClass;
          $sectionObj->$parentID->id = $parentID;
          $sectionObj->$parentID->name = $parentName;
          $sectionObj->$parentID->tabs = array();
        }

        if (!in_array($id, $sectionObj->$parentID->tabs)) {
          array_push($sectionObj->$parentID->tabs, $id);
        }
      ?>
    <?php endwhile; ?>
  <?php endif; ?>

  <?php foreach($sectionObj as $section) : ?>
    <article
      class="event__section"
      style="border: 1px solid black; margin-bottom: 2em;"
    >
      <h2>
        <?php
          $sectionID = get_category($section)->id;
          $sectionName = get_category($section)->name;
          echo $sectionName;
        ?>
      </h2>

      <section class="event__body js-tabs">
        <ul class="js-tablist" data-hx="h2">
          <li class="js-tablist__item">
            <?php foreach($section->tabs as $tab) : ?>
          <!-- <button class="event__tab"> -->
                <a href="<?php echo $tab; ?>" class="js-tablist__link">
                  <?php
                    $tab_name = get_category($tab)->name;
                    echo $tab_name;
                  ?>
                </a>
              <!-- </button> -->
              <?php endforeach; ?>
            </li>
          </ul>

        <?php if( have_rows('event') ): ?>
          <?php while( have_rows('event') ): the_row(); ?>
            <?php
              $catID          = get_sub_field('category');
              $title          = get_sub_field('title');
              $date           = get_sub_field('date_time');
              $description    = get_sub_field('description');
              $cost           = get_sub_field('cost');
              $location       = get_sub_field('location');

              $_cat = get_category($catID);
              $_catName = $_cat->name;
              $_parentCat = get_category($_cat->category_parent);
              $_parentID = $_parentCat->term_id;
              $_parentTitle = $_parentCat->name;
            ?>

            <?php if ( $_parentID == $sectionID) : ?>
              <article id="<?php echo $catID; ?>" class="js-tabcontent" style="border: 1px solid cyan;">
                <?php echo $title ?>
                <?php echo $date ?>
                <?php echo $description ?>
                <?php echo $cost ?>
                <?php echo $location ?>
              </article>
            <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </section>

    </article>
  <?php endforeach; ?>
</section>

