<?php
if( !isset($gCms) ) exit;

$continueLogin = $this->secureLogin()->userIsAllowedToLogin($params['user']->username, $_SERVER['SERVER_ADDR']);