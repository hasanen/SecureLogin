<?php
require('../include.php');
if (!isset($gCms)) exit;

$regexp_string = "/\A[\w]*\Z/";
$real_ip = $_SERVER['REMOTE_ADDR'];
$ip = $_GET['ip'];
$user = $_GET['username'];
$key = $_GET['key'];
if($real_ip == $ip
  && preg_match($regexp_string, $user)
  && preg_match($regexp_string, $key)){

  $securelogin =& CMSModule::GetModuleInstance('SecureLogin');

  $securelogin->secureLogin()->validateKey($key, $real_ip, $user);
  $config = cmsms()->GetConfig();
  $configParam = empty($_SERVER['HTTPS']) ?  'root_url' : 'ssl_url';
  $url =  str_replace('/tmp/', '/', $config['admin_url']);
  header( sprintf('Location: %s', $url));
}
