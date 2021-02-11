<?php get_header(); ?>

<main>
  <section class="hero-slider">
    <div class="hero-slider__slide">
      <img
        src="https://cdn11.bigcommerce.com/s-w4ny20pujt/images/stencil/1920w/carousel/3/slider-1-1920x800.jpg?c=1"
        alt="slider-1"
      />
      <div class="hero-slider__overlay">
        <h2 class="headline headline--medium">Life Begin After Coffee</h2>
        <p>Here to bring your Life Style to the next level!</p>
        <a class="btn btn-white">Buy Now</a>
      </div>
    </div>
    <div class="hero-slider__slide">
      <img
        src="https://cdn11.bigcommerce.com/s-w4ny20pujt/images/stencil/1920w/carousel/4/slider-2-1920x800.jpg?c=1"
        alt="slider-2"
      />
      <div class="hero-slider__overlay">
        <h2 class="headline headline--medium">Life Begin After Milk</h2>
        <p>Here to bring your Life Style to the next level!</p>
        <a class="btn btn-white">Buy Now</a>
      </div>
    </div>
  </section>

  <section class="reservation">
    <div class="container">
      <div class="image-overlay reservation__image-1">
        <img
          src="https://cdn11.bigcommerce.com/s-w4ny20pujt/product_images/uploaded_images/banner-1-580x450.jpg"
          alt="reservation-1"
        />
      </div>

      <div class="reservation__name-card">
        <p>Is Right Here For Your Disposition</p>
        <h3 class="headline headline--large">Mr. David Thomsan</h3>
        <p>+91 54321 98765</p>
        <a class="btn btn-brown" href="#">BOOK A TABLE</a>
      </div>

      <div class="image-overlay reservation__image-2">
        <img
          src="https://cdn11.bigcommerce.com/s-w4ny20pujt/product_images/uploaded_images/img-right-580x700.jpg"
          alt="reservation-2"
        />
      </div>
    </div>
  </section>

  <section class="featured-products">
    <div class="container">
      <h2 class="headline headline--medium">Featured Product</h2>
      <div class="product-slider">

        <?php
          $homepageProducts = new WP_Query(array(
            "posts_per_page" => 5,
            "post_type" => "product"
          ));

          while ($homepageProducts->have_posts()) {
            $homepageProducts->the_post(); ?>
            <div class="product-slider__slide">
              <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail(); ?>
              </a>
              <h3 class="headline headline--small">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>
              <?php $product = wc_get_product( get_the_ID() ); ?>
              <p><?php echo $product->get_price_html(); ?></p>
            </div>
          <?php }
        ?>        
      </div>
    </div>
  </section>

  <section class="menu">
    <div class="container">
      <div class="menu__heading">
        <h2 class="headline headline--medium">Explore Our Menu</h2>
        <p>
          Coffee Address Is Committed To Positively Impacting The Quality Of
          Life Through Exceptional Cup Of Coffee.
        </p>
      </div>

      <div class="menu__items">

        <?php
          $homepageCoffee = new WP_Query(array(
            "posts_per_page" => -1,
            "post_type" => "coffee"
          ));

          while ($homepageCoffee->have_posts()) {
            $homepageCoffee->the_post(); ?>
            <div class="menu__item">
              <?php the_post_thumbnail(); ?>
              <div class="menu__item-detail">
                <div class="menu__item-heading">
                  <h3 class="headline headline--small"><?php the_title(); ?></h3>
                  <span></span>
                  <h3 class="headline headline--small">$<?php the_field('coffee_price'); ?></h3>
                </div>
                <p><?php the_content(); ?></p>
              </div>
            </div>
          <?php }
        ?>

      </div>
    </div>
  </section>

  <section class="recent-post">
    <div class="container">
      <h2 class="headline headline--medium">Recent Posts</h2>
      <div class="post-slider">
      <?php 
        $homepagePosts = new WP_Query(array(
          "posts_per_page" => 3
        ));

        while ($homepagePosts->have_posts()) {
          $homepagePosts->the_post(); ?>
          <div class="post-slider__slide">
            <a href="<?php the_permalink(); ?>">
              <div class="image-overlay">
                <?php the_post_thumbnail(); ?>
              </div>
            </a>
            <div class="recent-post__heading">
              <h2 class="headline headline--small">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
              <div class="recent-post__info">
                <h3 class="headline headline--smallest"><?php the_time("M jS Y"); ?></h3>
                <span></span>
                <h3 class="headline headline--smallest">By: <?php the_author(); ?></h3>
              </div>
            </div>

            <hr />

            <div class="recent-post__detail">
              <p class="recent-post__excerpt"><?php echo wp_trim_words(get_the_content(), 18); ?></p>
              <a href="<?php the_permalink(); ?>">READ MORE</a>
            </div>
          </div>
        <?php } wp_reset_postdata();
      ?>

      </div>
    </div>
  </section>
</main>

<?php get_footer();
?>
