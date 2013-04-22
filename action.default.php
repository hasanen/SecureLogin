<?php
if (!isset($gCms)) exit;

$real_ip = $_SERVER['SERVER_ADDR'];
$ip = $params['ip'];
$user = $params['username'];
$key = $params['key'];
var_dump($params);
echo "$ip $user $key";
echo !preg_match('\A[\w]*\Z', $user);
echo !preg_match('\A[\w]*\Z', $key);

if($real_ip == $ip
	&& preg_match('\A[\w]*\Z', $user)
	&& preg_match('\A[\w]*\Z', $key)){
	die("tallennetaan");
	$this->secureLogin()->validateKey($key, $real_ip, $user);
}