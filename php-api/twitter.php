<!-- followed ibm watson documentation to for this folder and had prior knowledge of php -->


<?php

header('Access-Control-Allow-Origin: *');
header('Content-type:application/json;charset=utf-8');

require "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;


$access_token = "107773247-Nj0I7kFrLxSvr7QDFI8l9YYS6F0sFTqm9zrd5e0T";
$access_token_secret = "chkBYb9rpuVKryIm9bp9WNl1KydxP0ZC3oKE10jwbSLuA";

$connection = new TwitterOAuth("tLKq3bYIEcu4BRF9nXjGM94OV", "ndTTZdVtkeaKvfnpak5dJkLuznDfFiGYoOXVZDiFnGRNOr6BVt
", $access_token, $access_token_secret);


if (isset($_POST["twitter-screen-name"])) {
  $twitter_screen_name = $_POST["twitter-screen-name"];
  $statuses = $connection->get("statuses/user_timeline", ["screen_name" => $twitter_screen_name, "count" => 200, "tweet_mode" => "extended", "exclude_replies", false]);


  $successful_response = [
    "status" => "success",
    "tweets" => []
  ];

  $unsuccessful_response = [
    "error" => "error",
    "messages" => ""
  ];

  if(!empty($statuses->errors)) {
    $error_list = "";
    foreach($statuses->errors as $error) {
      $error_list .= $error->message." ";
    }
    $unsuccessful_response["messages"] = $error_list;
    echo json_encode($unsuccessful_response);
    exit;
  } elseif(!empty($statuses->error) || empty($statuses)) {
    $unsuccessful_response["messages"] = "Page not found.";
    echo json_encode($unsuccessful_response);
    exit;
  }
    else {
    $curated_tweets = "";
    foreach($statuses as $status) {
      $curated_tweets .= $status->full_text." ";
    }
    $successful_response["tweets"] = $curated_tweets;
    echo json_encode($successful_response);
    exit;
  }
}

