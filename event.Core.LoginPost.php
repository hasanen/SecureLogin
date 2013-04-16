<?php
if( !isset($gCms) ) exit;
global $config;

$continueLogin = $this->secureLogin()->userIsAllowedToLogin($params['user']->username, $_SERVER['SERVER_ADDR']);
if(!$continueLogin){ 
  $_SESSION['logout_user_now'] = true;
  header('Location: ' . $config['admin_url'] . '/login.php');
}