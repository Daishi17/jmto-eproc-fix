<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Url_curl_email
{

    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    function sen_row_email($type, $data, $message)
    {
        $data_post = array(
            'type' => $type,
            'data' => $data,
            'message' => $message
        );
        $url = 'https://jmto-eproc.kintekindo.net/send_email_jmto/sen_row_email';
        $this->ci->curl->simple_post($url, $data_post);
    }
}
