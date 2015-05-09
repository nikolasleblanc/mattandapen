<?php
global $query;
global $counter;
?>
<?php $counter = 0; ?>
<?php if ( $query->have_posts() ) : ?>
  <div class="row">
    <div class="medium-12 columns">
      <div class="items">
        <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-3">
          <?php get_template_part('parts/widgets/grid-home-offset'); ?>
        </ul>
      </div>
    </div>

  <?php else : ?>
    <?php get_template_part( 'content', 'none' ); ?>

<?php endif; // end have_posts() check ?>