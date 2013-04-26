<?php
if( !isset($gCms) ) exit;
global $config;

$secureLogin = $this->secureLogin();
$user = $params['user'];
$username = $user->username;

$paramsfor_module['module'] = 'SecureLogin';
cms_module_plugin($paramsfor_module,$this->smarty);
$mid_cache = cms_utils::get_app_data('mid_cache');
$id = array_shift(array_values($mid_cache));

$ip = $_SERVER['SERVER_ADDR'];
$continueLogin = $secureLogin->userIsAllowedToLogin($username, $ip);
if(!$continueLogin){ 
  $configParam = empty($_SERVER['HTTPS']) ?  'root_url' : 'ssl_url';
  $validationKey = $secureLogin->createValidationKey($username, $ip);
  
  $cmsmailer =& CMSModule::GetModuleInstance('CMSMailer');

  $cmsmailer->AddAddress($user->email, html_entity_decode($user->firstname . ' ' . $user->lastname));
  $cmsmailer->SetSubject($this->Lang('email.subject'));

  $url_params = array('ip' => $ip, 'key' => $validationKey, 'username' => $username);
  $url = $this->CreateFrontEndLink($id, $this->getLandingPageId(), 'securelogin', '', $url_params, '', true , true );

  $cmsmailer->SetBody(sprintf($this->Lang('email.body'), $url));
  $cmsmailer->Send();

  $_SESSION["logout_user_now"] = true;
  $_SESSION["redirect_url"] = $config['admin_url'] . '/login.php';
}