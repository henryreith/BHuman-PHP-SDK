<?php

require_once("./sdk.php");

$api_key_id = "your_api_key_id";
$api_key_secret = "your_api_key_secret";

$bhuman = new BHumanSDK($api_key_id, $api_key_secret);

// Get video instances
$video_instances = $bhuman->getVideoInstances();

// Get a specific video instance
$instance_id = "7d859e18-dc89-446f-9718-9533bb178a75";
$video_instance = $bhuman->getVideoInstance($instance_id);

// Generate a video
$names = [["Don", "Apple"], ["James", "Google"]];
$variables = ["name", "company"];
$video = $bhuman->generateVideo($instance_id, $names, $variables);

// Get generated videos
$generated_videos = $bhuman->getGeneratedVideos($instance_id);

// Get workspace
$workspace = $bhuman->getWorkspace();

// Get products
$products = $bhuman->getProducts();

// Use a product
$product_id = "example_product_id";
$workspace_id = "example_workspace_id";
$product = $bhuman->useProduct($product_id, $workspace_id);

// Get store settings
$store_settings = $bhuman->getStoreSettings();

?>
