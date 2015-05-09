<?php
global $post;
global $counter;
$post_type = get_post( $post )->post_type;
if ($post_type == "published-works") {
	$date = date('F j, Y', strtotime(CFS()->get('originally_published')));
}
else
{
	$date = get_the_date('F y, Y');
}
?>
<div class="bannerItem banner_<?php echo $counter; ?> animated" style="left: 0px; background-image: url('<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' )[0];?>'); background-size: cover; background-repeat: no-repeat;">
  <span class="bannerContent">
    <header>
      <div class="date"><?php echo $date; ?></div>
      <h2>
      <?php
      if ((count(CFS()->get('original_url'))) != "0") {
        ?>
        <a href="<?php echo CFS()->get('original_url')['url']; ?>"><?php the_title(); ?></a>
      <?php
      }
      else
      {
        ?>
        <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
        <?php
      }
      ?>
      </h2>
    </header>
  </span>
</div>