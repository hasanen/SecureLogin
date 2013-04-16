<?php
if( !isset($gCms) ) exit;
global $config;
$secureLogin = $this->secureLogin();
$username = $params['user']->username;
$ip = $_SERVER['SERVER_ADDR'];
$continueLogin = $secureLogin->userIsAllowedToLogin($username, $ip);
if(!$continueLogin){ 
  $configParam = empty($_SERVER['HTTPS']) ?  'root_url' : 'ssl_url';
  $validationUrl = $secureLogin->createValidationUrl($config[$configParam], $username, $ip);
  $cmsmailer =& CMSModule::GetModuleInstance('CMSMailer');

  $_SESSION["redirect_url"] = $config['admin_url'] . '/login.php';
}