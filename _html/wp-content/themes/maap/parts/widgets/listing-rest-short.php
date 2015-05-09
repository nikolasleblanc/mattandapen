<?php
global $query;
?>
<?php while ( $query->have_posts()) : $query->the_post(); ?>
  <li>
    <?php get_template_part('content','list-item-short'); ?>
  </li>
<?php $counter = $counter + 1; ?>
<?php endwhile; ?>
<?php if ($query->post_count == 0) { ?>
<li class="empty">
  <h2>No other articles found.</a></h2>
  <p>No articles match this publisher.</p>
  <p>Subscribe for newsletter, stay on top of new publications.</p>
</li>
<?php } ?>
