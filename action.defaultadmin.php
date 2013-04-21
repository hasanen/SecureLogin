<?php
if (!isset($gCms)) exit;

if (! $this->CheckAccess())
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

   Code for SecureLogin "defaultadmin" admin action
   
   -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
   
   Typically, this will display something from a template
   or do some other task.
   
*/

$userops = cmsms()->GetUserOperations();
$user = $userops->LoadUserByID(get_userid());
$rows = $this->secureLogin()->getAllIps();
$current = null;
$entries = array();
foreach ($rows as $key => $row) {
	$entry = new stdClass(); 
	$entry->id = $row['id'];
	$entry->username = $row['username'];
	$entry->ip = $row['ip'];
	$entry->for_all = $row['for_all'];
	$entry->validated = $row['validated'] == 1 ? 'valid' : 'invalid';

	if($user->username == $row['username'] &&
		$_SERVER['SERVER_ADDR'] == $row['ip']){
		$current = $entry;
	} else {
		array_push($entries, $entry);
	}
}

$this->smarty->assign('caption_username', $this->Lang('username'));
$this->smarty->assign('caption_ip', $this->Lang('ip'));
$this->smarty->assign('caption_current', $this->Lang('current_user'));
$this->smarty->assign('entries', $entries);
$this->smarty->assign('current', $current);

echo $this->ProcessTemplate('entries.tpl');