<?php
global $query;
?>
<?php while ( $query->have_posts() ) : $query->the_post(); ?>
  <?php if ($query->post_count == 1) { ?>
    <li class="empty">
      <h2>No other articles found.</a></h2>
      <p>No articles match this publisher.</p>
      <p>Subscribe for newsletter, stay on top of new publications.</p>
    </li>
  <?php } ?>
  <?php if ($counter != 0) { ?>
    <li>
       <?php get_template_part('content','grid-item'); ?>
    </li>
  <?php } ?>
<?php $counter = $counter + 1; ?>
<?php endwhile; ?>