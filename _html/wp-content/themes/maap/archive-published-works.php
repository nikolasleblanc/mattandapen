<?php get_header(); ?>
<?php
$query = new WP_Query(array(
    'post_type' => 'published-works',
    'posts_per_page' => -1,
    'orderby' => 'meta_value',
    'meta_key' => 'originally_published',
    'order' => 'DESC',
));
?>
<div class="featured">
  <h1>Published Works</h1>
</div>
<div class="row">
<!-- Row for main content area -->
	<div class="small-12 large-12 columns archive" role="main">
	<?php get_template_part('content', 'archive'); ?>
    <?php /*get_template_part('parts/widgets/pagination');*/ ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
