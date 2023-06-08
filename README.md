# BHuman API PHP SDK

This repository contains a PHP SDK for the BHuman API. BHuman.ai is an awesome AI-based video generation platform. This PHP SDK simplifies the interaction with the BHuman API, providing a structured and object-oriented approach to create dynamic and personalized videos with ease.

You can find BHuman office API docs with examples here: https://github.com/bhuman-ai/public_api

## Features

- Simple and easy to use PHP classes.
- Object-oriented approach.
- Supports all major functionalities offered by the BHuman API including:
    - Retrieving video instances
    - Getting a specific video instance
    - Generating a video
    - Fetching generated videos
    - Fetching workspace settings
    - Fetching products from the store
    - Using a product
    - Fetching BHuman store settings

## How To Use

1. Clone the repository to your local machine or server.
2. Include the SDK in your PHP script: 

```php
require_once("./sdk.php");
```

3. Initialize the SDK with your BHuman API key and secret:
```php
$api_key_id = "your_api_key_id";
$api_key_secret = "your_api_key_secret";
$bh = new BHumanSDK($api_key_id, $api_key_secret);
```

4. Now you can make calls to the BHuman API. See the provided examples for more details.

## Example 
### Retrieving Video Instances
To fetch video instances, we use the ```getVideoInstances``` function. This function returns an array of video instances.

```php
$video_instances = $bh->getVideoInstances();
```

### Get a Specific Video Instance
To get a specific video instance you can use the ```getVideoInstance``` function. This function requires an instance ID e.g.

```php
$instance_id = "7d859e18-dc89-446f-9718-9533bb178a75";
$video_instance = $bhuman->getVideoInstance($instance_id);
```

### Generating a Video
To generate a video, we need an instance ID, a list of names, a list of variables, and a callback URL. Here is an example of the ```generateVideo``` class:
```php
$instance_id = "7d859e18-dc89-446f-9718-9533bb178a75";
$names = [["Don", "Apple"], ["James", "Google"]];
$variables = ["name", "company"];
$video = $bh->generateVideo($instance_id, $names, $variables);
```

### Get Generated Videos
To get a generated video, we’ll use the ```getGeneratedVideos``` class. This requires a instance ID as well.
```php
$generated_videos = $bhuman->getGeneratedVideos($instance_id);
```

### Get Workspace
To get your workspace setting we can use the ```getWorkspace``` class.
```php
$workspace = $bhuman->getWorkspace();
```

### Get Products
To get the products from the store with the ```getProducts``` class.
```php
$products = $bhuman->getProducts();
```

### Use A Product
To use a product in the BHuman store we can use the ```useProduct``` class.
```php
$product_id = "example_product_id";
$workspace_id = "example_workspace_id";
$product = $bhuman->useProduct($product_id, $workspace_id);
```

### Get BHuman Store Settings
To get the store setting in your BHuman account, you can use the ```getStoreSettings``` class.
```php
$store_settings = $bhuman->getStoreSettings();
```
## More Examples
You can find usage examples and a detailed explnation on how to use each SDK class on my blog post: https://henryreith.co/bhuman-ai-api-php-sdk/

## Contributing
Feel free to fork this repository, make your changes, and submit a pull request. We're always open to improvements and new features!

## Questions
If you have any issues or questions, feel free to open an issue in this repository.
