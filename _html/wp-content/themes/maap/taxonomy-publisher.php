<?php get_header(); ?>
<div class="featured">
  <h1>Published Works</h1>
</div>
<div class="row">
<!-- Row for main content area -->
	<div class="small-12 large-12 columns archive" role="main">
	<?php
	$query = new WP_Query(array(
	    'post_type' => 'published-works',
	    'posts_per_page' => -1,
	    'orderby' => 'meta_value',
	    'meta_key' => 'originally_published',
	    'order' => 'DESC',
	    'tax_query' => array(
				array(
					'taxonomy' => 'publisher',
					'field'    => 'slug',
					'terms'    => get_query_var('publisher'),
				),
			),
	));
	?>

	<?php get_template_part('layout', 'listing'); ?>
	<?php /* get_template_part('parts/widgets/pagination') */ ?>

	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
