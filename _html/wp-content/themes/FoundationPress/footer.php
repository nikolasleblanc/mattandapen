</section>
<footer>
  <div class="row">
    <div class="medium-12 columns">
    <?php get_template_part("parts/widgets/footer"); ?>
    </div>
  </div>
</footer>
<a class="exit-off-canvas"></a>

	<?php do_action('foundationPress_layout_end'); ?>
	</div>
</div>
<?php wp_footer(); ?>
<?php do_action('foundationPress_before_closing_body'); ?>
<script>
  function resetNav(item) {
    $("#banners .bannerNavigation li").removeClass("current");
    $(item).addClass("current");
  }
  function resizeCarousel() {
    $("#banners .bannerItem").each(function(index, item) {
      $(item).removeClass("animated");
      var width = $("#banner").width();
      $(item).css("left", $(document).width()*index);
      $(item).addClass("animated");
    });
  }
  $(window).resize(function() {
    resizeCarousel();
  });

  $(window).load(function() {
    resizeCarousel();

    $(".bannerNavigation li:first-child").addClass("current");

    $("#banners .bannerNavigation li a").click(function(e) {
      console.log("B");
      advanceCarouselTo(e);
    });

    setInterval(function() {
      advanceCarousel();
    }, 6000);
  });

  function advanceCarousel() {
    console.log("A");
    var current = $(".bannerNavigation li.current");
    var next = current.next();
    if (next.length == 0) {
      next = $(".bannerNavigation li:first");
    }
    $(next).children("a")[0].click();
  }

  function advanceCarouselTo(e) {
    resetNav($(e.currentTarget).parent()[0]);

    var width = $("#banners").width();
    var targetPane = $(e.currentTarget).parent()[0].className.split("_")[1].split(" ")[0];

    $("#banners .bannerItem").each(function(index, item) {
      var multiplier = index-(targetPane-1);
      console.log(index, multiplier, width*multiplier);
      $(item).css("left", width*multiplier);
    });
  }
</script>
</body>
</html>
