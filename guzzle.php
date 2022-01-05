<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;

    $client = new Client();
    $response = $client->request('GET', 'http://localhost/rest_airsoftgun/');
    
    $result = json_decode($response->getBody()->getContents(), true);

?>