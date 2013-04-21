<?php
if( !isset($gCms) ) exit;
global $config;
$secureLogin = $this->secureLogin();
$user = $params['user'];
$username = $user->username;
var_dump($params);
$ip = $_SERVER['SERVER_ADDR'];
$continueLogin = $secureLogin->userIsAllowedToLogin($username, $ip);
if(!$continueLogin){ 
  $configParam = empty($_SERVER['HTTPS']) ?  'root_url' : 'ssl_url';
  $validationKey = $secureLogin->createValidationKey($username, $ip);
  
  $cmsmailer =& CMSModule::GetModuleInstance('CMSMailer');

  $cmsmailer->AddAddress($user->email, html_entity_decode($user->firstname . ' ' . $user->lastname));
  $cmsmailer->SetSubject($this->Lang('email.subject'));
  
  
  $cmsmailer->SetBody(sprintf($this->Lang('email.body'), 'linkki'));
  $cmsmailer->Send();

  $_SESSION["logout_user_now"] = true;
  $_SESSION["redirect_url"] = $config['admin_url'] . '/login.php';
}