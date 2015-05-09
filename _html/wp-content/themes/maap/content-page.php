<?php while (have_posts()) : the_post(); ?>
<div class="featured">
  <header>
    <h1 class="entry-title"><?php the_title(); ?></h1>
  </header>
</div>
<div class="row">
  <div class="small-12 large-12 columns" role="main">
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <div class="entry-content">
      <?php the_content(); ?>
      </div>
    </article>
  </div>
</div>
<?php endwhile;?>