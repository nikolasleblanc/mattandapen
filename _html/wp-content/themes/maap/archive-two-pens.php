<?php get_header(); ?>
<div class="row">
<!-- Row for main content area -->
	<div class="small-12 large-12 columns archive" role="main">
	<?php
	$query = new WP_Query(array(
	    'post_type' => 'two-pens',
	    'posts_per_page' => -1,
	    'orderby' => 'meta_value',
	    'meta_key' => 'originally_published',
	    'order' => 'DESC',
	));
	?>
	<?php $counter = 0; ?>
	<?php if ( $query->have_posts() ) : ?>
		<?php get_template_part( 'content', 'jumbo' ); ?>
		<div class="row">
			<div class="large-3 columns sidemenu">
				<?php get_template_part('content', 'sidemenu') ?>
			</div>
			<div class="large-9 columns">
				<div class="items">
					<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
						<?php get_template_part('widget', 'grid-offset'); ?>
					</ul>
				</div>
			</div>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; // end have_posts() check ?>

	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists('FoundationPress_pagination') ) { FoundationPress_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'FoundationPress' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'FoundationPress' ) ); ?></div>
		</nav>
	<?php } ?>

	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
