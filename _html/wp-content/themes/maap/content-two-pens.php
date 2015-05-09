<?php
global $post;
global $counter;
?>
<?php while (have_posts()) : the_post(); ?>
<div class="featured">
  <div class="jumbo wp-post-image">
  <?php the_post_thumbnail();?>
  <header>
    <?php
    $title = get_the_title();
    $title = str_replace(":", "<br/>", $title);
    ?>
    <h1 class="entry-title"><?php echo $title; ?></h1>
  </header>
  </div>
</div>
<div class="row">
  <div class="small-12 large-12 columns" role="main">
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <div class="attribution">
        <?php echo CFS()->get('attribution') ?>
      </div>
      <div class="entry-content">
      <?php the_content(); ?>
      </div>
      <div class="footer">
        <?php echo CFS()->get('footer') ?>
      </div>
    </article>
  </div>
</div>
<?php endwhile;?>