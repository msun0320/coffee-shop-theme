<?php get_header();?>

<main>
    <section class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb-nav-inner">
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li><a href="<?php echo site_url("blog"); ?>">Blog</a></li>
                <li><?php the_archive_title(); ?></li>
            </ul>
        </div>
    </section>

    <section class="blog">
        <div class="container"> 
            <h2 class="headline headline--medium">BLOG</h2>
            <div class="blog__main">
                <?php 
                    while (have_posts()) {
                        the_post();?>
                        <div class="blog__item">
                            <img
                                src="https://cdn11.bigcommerce.com/s-w4ny20pujt/images/stencil/1075x814/uploaded_images/5.jpg?t=1608636755"
                                alt="<?php the_title(); ?> blog"
                            />
                            <h2 class="headline headline--small">
                                <a class="blog__item-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <h3 class="headline headline--smallest">
                                Posted by <?php the_author_posts_link(); ?> on <?php the_time("M jS Y"); ?>
                            </h3>
                            <?php the_excerpt(); ?>
                            <a class="btn btn-brown" href="<?php the_permalink(); ?>">Read More</a>
                        </div>
                    <?php } ?>

                <!-- <div class="blog__item">
                    <img
                        src="https://cdn11.bigcommerce.com/s-w4ny20pujt/images/stencil/1075x814/uploaded_images/5.jpg?t=1608636755"
                        alt="Donec In Libero Sem blog"
                    />
                    <h2 class="headline headline--small">
                        <a class="blog__item-link" href="#">Donec In Libero Sem</a>
                    </h2>
                    <h3 class="headline headline--smallest">
                        Posted by <a class="blog__item-link" href="#">Coffee</a> on
                        <a class="blog__item-link" href="#">22nd Dec 2020</a>
                    </h3>
                    <p class="blog__item-excerpt">
                        Donec In Libero Sem. Cras Dignissim Orci A Mi Aliquet, Eget
                        Fermentum Enim Viverra. Integer Consectetur Posuere Sem Sit Amet
                        Vestibulum. Fusce Efficitur Ornare Aliquam. Aliquam Venenatis Nisi
                        Null…
                    </p>
                    <a class="btn btn-brown" href="#">Read More</a>
                </div> -->
            </div>
            <?php echo paginate_links(); ?>
        </div>
    </section>
</main>

<?php get_footer();