<?php
if( !isset($gCms) ) exit;
global $config;

$secureLogin = $this->secureLogin();
$user = $params['user'];
$username = $user->username;

$paramsfor_module['module'] = 'SecureLogin';
cms_module_plugin($paramsfor_module,$this->smarty);

$ip = $this->getUserID();
$continueLogin = $secureLogin->userIsAllowedToLogin($username, $ip);
if(!$continueLogin){

  $this->sendEmail($ip, $user);
  session_destroy();

  $redirectUrl = $this->getRedirectUrl();
  if(!empty($redirectUrl)){
    header(sprintf('Location: %s', $redirectUrl));
    die();
  } else {
    $_SESSION["redirect_url"] = $config['admin_url'] . '/logout.php';
  }
}
