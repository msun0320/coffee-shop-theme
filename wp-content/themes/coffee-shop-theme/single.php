<?php 
    
    get_header();

    while (have_posts()) {
        the_post(); ?>
        <main>
            <section class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb-nav-inner">
                        <li><a href="<?php echo site_url(); ?>">Home</a></li>
                        <li><a href="<?php echo site_url("/blog"); ?>">Blog</a></li>
                        <li><?php the_title(); ?></li>
                    </ul>
                </div>
            </section>

            <section>
                <div class="container">
                    <?php the_post_thumbnail(); ?>
                    <h2 class="headline headline--medium"><?php the_title(); ?></h2>
                    <h3 class="headline headline--small"><?php the_time("M jS Y"); ?></h3>
                    <p><?php the_content(); ?></p>
                    <?php echo get_the_category_list(); ?>
                </div>
            </section>
        </main>
    <?php } 
    
    get_footer();