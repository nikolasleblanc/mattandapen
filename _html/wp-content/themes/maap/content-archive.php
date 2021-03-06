<?php
global $query;
global $counter;
?>
<?php $counter = 0; ?>
<?php if ( $query->have_posts()) : ?>
  <div class="row">
    <div class="medium-2 columns sidemenu">
      <?php get_template_part('parts/widgets/publications-sidemenu') ?>
    </div>
    <div class="medium-7 columns">
      <div class="items">
        <!--
	<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-3">
	-->
        <ul class="published-works-listing">
	  <?php get_template_part('parts/widgets/listing-all'); ?>
	  <?php /* get_template_part('parts/widgets/grid-all'); */ ?>
        </ul>
      </div>
    </div>
    <div class="medium-3 columns side-listing">
	<?php get_template_part('parts/widgets/listing-rest-short'); ?>
    </div>

  <?php else : ?>
    <?php get_template_part( 'content', 'none' ); ?>
<?php endif; // end have_posts() check ?>
