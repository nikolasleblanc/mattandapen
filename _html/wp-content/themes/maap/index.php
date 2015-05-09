<?php get_header(); ?>
<?php
$query = new WP_Query(array(
    'post_type' => array('published-works', 'two-pens'),
    'posts_per_page' => -1,
    'order' => 'DESC',
));
?>
<?php get_template_part('content', 'home-jumbo'); ?>
<div class="row">
<!-- Row for main content area -->
	<div class="small-12 large-12 columns archive" role="main">
		<?php get_template_part('content', 'home'); ?>
    <?php get_template_part('parts/widgets/pagination'); ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
