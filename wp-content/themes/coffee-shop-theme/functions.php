<?php

require get_theme_file_path("/inc/search-route.php");

function shop_custom_rest()
{
  register_rest_field("post", "authorName", [
    "get_callback" => function () {
      return get_the_author();
    },
  ]);
}

add_action("rest_api_init", "shop_custom_rest");

function shop_files()
{
  wp_enqueue_style("shop_main_styles", get_stylesheet_uri());
  wp_enqueue_style(
    "font-awesome",
    "https://use.fontawesome.com/releases/v5.15.2/css/all.css"
  );
  wp_enqueue_style(
    "custom-google-fonts",
    "https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap"
  );
  wp_enqueue_style(
    "slick",
    "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
  );
  wp_enqueue_style(
    "slick-theme",
    "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"
  );
  wp_enqueue_script(
    "slick-js",
    "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js",
    ["jquery"],
    "1.8.1",
    true
  );
  wp_enqueue_script(
    "main-shop-js",
    get_theme_file_uri("/script.js"),
    null,
    "1.0",
    true
  );

  wp_localize_script("main-shop-js", "shopData", [
    "root_url" => get_site_url(),
  ]);
}

add_action("wp_enqueue_scripts", "shop_files");

function shop_features()
{
  add_theme_support("title-tag");
  add_theme_support("post-thumbnails");
}

add_action("after_setup_theme", "shop_features");

//Redirect subscriber account out of admin and onto homepage
add_action("admin_init", "redirectSubsToFrontend");

function redirectSubsToFrontend()
{
  $currentUser = wp_get_current_user();

  if (
    count($currentUser->roles) == 1 and
    $currentUser->roles[0] == "subscriber"
  ) {
    wp_redirect(site_url("/"));
    exit();
  }
}

add_action("wp_loaded", "noSubsAdminBar");

function noSubsAdminBar()
{
  $currentUser = wp_get_current_user();

  if (
    count($currentUser->roles) == 1 and
    $currentUser->roles[0] == "subscriber"
  ) {
    show_admin_bar(false);
  }
}

//customize Login Screen
add_filter("login_headerurl", "ourHeaderUrl");

function ourHeaderUrl()
{
  return esc_url(site_url("/"));
}

add_action("login_enqueue_scripts", "ourLoginCSS");

function ourLoginCSS()
{
  wp_enqueue_style(
    "custom-google-fonts",
    "https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap"
  );
  wp_enqueue_style("shop_main_styles", get_stylesheet_uri());
}

add_filter("login_headertitle", "loginTitle");

function loginTitle()
{
  return get_bloginfo("name");
}

function mytheme_add_woocommerce_support()
{
  add_theme_support("woocommerce");
}

add_action("after_setup_theme", "mytheme_add_woocommerce_support");

function shop_post_types()
{
  // Coffee Post Type
  register_post_type("coffee", [
    "capability_type" => "coffee",
    // "map_meta_cap" => true,
    "show_in_rest" => true,
    "supports" => ["title", "editor", "thumbnail"],
    "public" => true,
    "labels" => [
      "name" => "Coffee",
      "add_new_item" => "Add New Coffee",
      "edit_item" => "Edit Coffee",
      "all_items" => "All Coffee",
      "singular_name" => "Coffee",
    ],
    "menu_icon" => "dashicons-coffee",
  ]);
}

add_action("init", "shop_post_types");
