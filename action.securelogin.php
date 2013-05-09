<?php
if (!isset($gCms)) exit;
global $config;

$regexp_string = "/\A[\w]*\Z/";

$real_ip = $_SERVER['SERVER_ADDR'];
$ip = $params['ip'];
$user = $params['username'];
$key = $params['key'];
if($real_ip == $ip
  && preg_match($regexp_string, $user)
  && preg_match($regexp_string, $key)){
  $this->secureLogin()->validateKey($key, $real_ip, $user);
  $this->RedirectToAdmin($config['admin_url']);
}