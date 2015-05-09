<?php
global $query;
global $counter;
?>
<?php $counter = 0; ?>
<?php if ( $query->have_posts() ) : ?>
  <?php /* Start the Loop */ ?>
  <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    <?php if ($counter == 0) { ?>
      <?php //get_template_part( 'content', 'jumbo' ); ?>
    <?php } ?>
    <?php $counter = $counter + 1; ?>
  <?php endwhile; ?>
  <?php $counter = 0; ?>
  <div class="row">
    <div class="medium-3 columns sidemenu">
      <?php get_template_part('parts/widgets/publications-sidemenu') ?>
    </div>
    <div class="medium-9 columns">
      <div class="items">
        <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-3">
        <?php get_template_part('content', 'grid-all'); ?>
        </ul>
      </div>
    </div>

  <?php else : ?>
    <?php get_template_part( 'content', 'none' ); ?>

<?php endif; // end have_posts() check ?>