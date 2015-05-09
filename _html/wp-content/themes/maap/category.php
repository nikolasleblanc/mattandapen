<?php get_header(); ?>
<div class="featured">
  <h1>Published Works</h1>
</div>
<div class="row">
<!-- Row for main content area -->
	<div class="small-12 large-12 columns archive" role="main">
	<?php
	$tag = single_tag_title('', false);
	$query = new WP_Query(
		array(
	    'post_type' => array(
	    	'two-pens',
	    	'published-works'
	    ),
	    'posts_per_page' => -1,
	    'order' => 'DESC',
	    'category_name' => $tag
		)
	);
	?>
	<?php get_template_part('layout', 'listing'); ?>
	<?php get_template_part('parts/widgets/pagination') ?>

	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
