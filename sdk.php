<?php

class BHumanSDK
{
    private $api_key_id;
    private $api_key_secret;
    private $headers;

    public function __construct($api_key_id, $api_key_secret)
    {
        $this->api_key_id = $api_key_id;
        $this->api_key_secret = $api_key_secret;

        $api_key_combined = $this->api_key_id . ":" . $this->api_key_secret;
        $api_key_encoded = base64_encode($api_key_combined);
        $this->headers = [
            "Authorization: Basic " . $api_key_encoded
        ];
    }

    private function sendRequest($url, $method = 'GET', $payload = null)
    {
        $curl = curl_init();

        if ($payload) {
            $this->headers[] = 'Content-Type: application/json';
        }

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => $this->headers,
            CURLOPT_CUSTOMREQUEST => $method
        ]);

        if ($payload) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
        }

        $response = curl_exec($curl);

        if (!$response) {
            die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
        }

        curl_close($curl);

        return json_decode($response, true);
    }

    public function getVideoInstances($page = 0, $size = 100)
    {
        $url = "https://studio.bhuman.ai/api/ai_studio/video_instances?page={$page}&size={$size}";
        return $this->sendRequest($url);
    }

    public function getVideoInstance($instance_id)
    {
        $url = "https://studio.bhuman.ai/api/ai_studio/video_instance?id={$instance_id}";
        return $this->sendRequest($url);
    }

    public function generateVideo($instance_id, $names, $variables, $callback_url = "")
    {
        $url = "https://studio.bhuman.ai/api/ai_studio/try_sample";
        $payload = [
            "callback_url" => $callback_url,
            "names" => $names,
            "variables" => $variables,
            "video_instance_id" => $instance_id
        ];
        return $this->sendRequest($url, 'POST', $payload);
    }

    public function getGeneratedVideos($instance_id, $page = 0, $size = 100)
    {
        $url = "https://studio.bhuman.ai/api/ai_studio/generated_video_by_video_instance_id?video_instance_id={$instance_id}&page={$page}&size={$size}";
        return $this->sendRequest($url);
    }

    public function getWorkspace()
    {
        $url = "https://user.bhuman.ai/api/workspace";
        return $this->sendRequest($url);
    }

    public function getProducts()
    {
        $url = "https://store.bhuman.ai/api/store/product";
        return $this->sendRequest($url);
    }

    public function useProduct($product_id, $workspace_id, $folder_id = null, $video_instance_id = null)
    {
        $url = "https://store.bhuman.ai/api/store/product/use";
        $payload = [
            "folder_id" => $folder_id,
            "id" => $product_id,
            "video_instance_id" => $video_instance_id,
            "workspace_id" => $workspace_id
        ];
        return $this->sendRequest($url, 'POST', $payload);
    }

    public function getStoreSettings()
    {
        $url = "https://store.bhuman.ai/api/store/settings";
        return $this->sendRequest($url);
    }
}

?>
