<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo("charset"); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header class="site-header">
            <div class="container">
                <div class="site-header__mobile">
                    <h1>
                        <a href="<?php echo site_url(); ?>"><strong>Coffee</strong> Zone</a>
                    </h1>
                    <div class="site-header__menu-triggers">
                        <i class="fa fa-search fa-lg" aria_hidden="true"></i>
                        <i class="fa fa-bars fa-lg" aria_hidden="true"></i>
                    </div>
                </div>
                <div class="site-header__menu hidden">
                    <nav>
                        <ul class="list">
                            <li <?php if (is_page("about-us")) echo "class='current-menu-item'"; ?>><a href="<?php echo site_url("/about-us") ?>">About Us</a></li>
                            <li <?php if (is_page("shop")) echo "class='current-menu-item'"; ?>><a href="<?php echo site_url("/shop") ?>">Shop</a></li>
                            <li <?php if (get_post_type() == "post") echo "class='current-menu-item'"; ?>><a href="<?php echo site_url("/blog"); ?>">Blog</a></li>
                        </ul>
                    </nav>
                    <div class="site-header__util">
                        <i class="fa fa-search fa-lg" aria-hidden="true"></i>
                        <?php if (is_user_logged_in()) { ?>
                            <a class="site-header__avatar" href="<?php echo wp_logout_url(); ?>">
                                <span><?php echo get_avatar(get_current_user_id(), 60); ?></span>
                                <span>Log Out</span>
                            </a>
                            <?php } else { ?>
                            <a href="<?php echo wp_login_url(); ?>"><i class="fas fa-user fa-lg" aria_hidden="true"></i> Login</a>
                            <a href="<?php echo wp_registration_url(); ?>"><i class="fas fa-user-plus fa-lg" aria_hidden="true"></i> Sign Up</a>
                        <?php } ?>

                        <a href="<?php echo site_url("/cart") ?>"><i class="fas fa-mug-hot fa-lg" aria_hidden="true"></i> Cart</a>
                    </div>
                </div>
            </div>
        </header>
    