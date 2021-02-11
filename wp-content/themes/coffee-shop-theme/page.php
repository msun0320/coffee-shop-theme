<?php get_header();?>

<main>
    <section class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb-nav-inner">
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li><?php the_title(); ?></li>
            </ul>
        </div>
    </section>

    <?php while (have_posts()) {
        the_post();?>
        <section class="about">
            <div class="container">
                <h2 class="headline headline--medium"><?php the_title() ?></h2>
                <p><?php the_content() ?></p>
            </div>
        </section>
</main>

<?php }
    get_footer();
