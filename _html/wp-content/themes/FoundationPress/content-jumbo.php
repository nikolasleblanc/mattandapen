<?php
global $query;
global $counter;
?>
<?php while ( $query->have_posts() ) : $query->the_post(); ?>
  <?php if ($counter == 0) { ?>
    <div class="featured">
    	<?php get_template_part('content', 'grid-item'); ?>
    </div>
    <?php } ?>
  <?php $counter = $counter + 1; ?>
<?php endwhile; ?>