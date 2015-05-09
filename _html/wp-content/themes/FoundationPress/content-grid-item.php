<?php
global $post;
$post_type = get_post( $post )->post_type;
if ($post_type == "published-works") {
	$date = date('F j, Y', strtotime(CFS()->get('originally_published')));
}
else
{
	$date = get_the_date('F y, Y');
}
?>
<article>
	<div class="thumb wp-post-image">
		<?php the_post_thumbnail();?>
	</div>
	<header>
		<div class="date"><?php echo $date; ?></div>
		<h2><a href="<?php echo CFS()->get('original_url')['url']; ?>"><?php the_title(); ?></a></h2>
	</header>
</article>