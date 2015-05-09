<?php
global $query;
global $counter;
?>
<?php $counter = 1; ?>
  <div id="banners">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <?php if ($counter < 5) { ?>
    	<?php get_template_part('content', 'carousel-item'); ?>
      <?php } ?>
  <?php $counter++; ?>
<?php endwhile; ?>
<?php $counter = 1; ?>
<ul class="bannerNavigation">
<?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <?php if ($counter < 5) { ?>
  <li class="nav_<?php echo $counter; ?>"><a href="javascript:void(0)">·</a></li>
  <?php } ?>
  <?php $counter++; ?>
<?php endwhile; ?>
</ul>
    </div>