<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curl {

    public function __construct() {
        
    }

    public function create($url) {
        // Initialize cURL session
        $ch = curl_init($url);
        return $ch;
    }

    public function execute($ch) {
        // Execute the cURL session
        $response = curl_exec($ch);
        return $response;
    }

    // Other cURL methods can be defined here as needed
}
