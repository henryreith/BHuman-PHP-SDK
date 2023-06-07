# BHuman API PHP SDK

This repository contains a PHP Software Development Kit (SDK) for the BHuman API. BHuman.ai is an advanced AI-based video generation platform. This php SDK simplifies the interaction with the BHuman API, providing a structured and object-oriented approach to create dynamic and personalized videos with ease.

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
To fetch video instances, we use the getVideoInstances function. This function returns an array of video instances.

```php
$video_instances = $bh->getVideoInstances();
```

## More Examples
You can find usage examples and a detailed explnation on how to use each SDK class on my blog post: https://henryreith.co/bhuman-ai-api-php-sdk/

## Contributing
Feel free to fork this repository, make your changes, and submit a pull request. We're always open to improvements and new features!

## Questions
If you have any issues or questions, feel free to open an issue in this repository.
