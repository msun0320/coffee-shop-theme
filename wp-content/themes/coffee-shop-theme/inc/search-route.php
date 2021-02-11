<?php

add_action("rest_api_init", "shopRegisterSearch");

function shopRegisterSearch()
{
  register_rest_route("shop/v1", "search", [
    "method" => WP_REST_SERVER::READABLE,
    "callback" => "shopSearchResults",
  ]);
}

function shopSearchResults($data)
{
  $mainQuery = new WP_Query([
    "post_type" => ["post", "page", "coffee"],
    "s" => sanitize_text_field($data["term"]),
  ]);

  $results = [
    "generalInfo" => [],
    "coffee" => [],
  ];

  while ($mainQuery->have_posts()) {
    $mainQuery->the_post();

    if (get_post_type() == "post" or get_post_type() == "page") {
      array_push($results["generalInfo"], [
        "title" => get_the_title(),
        "permalink" => get_permalink(),
        "postType" => get_post_type(),
        "authorName" => get_the_author(),
      ]);
    }

    if (get_post_type() == "coffee") {
      array_push($results["coffee"], [
        "title" => get_the_title(),
        "permalink" => get_permalink(),
        "image" => get_the_post_thumbnail_url(),
      ]);
    }
  }

  return $results;
}
