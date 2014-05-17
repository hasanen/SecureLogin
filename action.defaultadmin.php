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
$redirectUrl = $this->getRedirectUrl();
$current_ip = $_SERVER['REMOTE_ADDR'];
$tab = isset($params['tab']) ? $params['tab'] : 'iplist';

$validate_id = isset($params['validate_id']) ? $params['validate_id'] : '';
if(!empty($validate_id)){
	$this->secureLogin()->updateValidateStatus($validate_id, true);
}
$invalidate_id = isset($params['invalidate_id']) ? $params['invalidate_id'] : '';
if(!empty($invalidate_id)){
	$this->secureLogin()->updateValidateStatus($invalidate_id, false);
}
$paramRedirectUrl = isset($params['redirect_url']) ? $params['redirect_url'] : '';
if(isset($params['redirect_submit'])){
	$this->setRedirectUrl($paramRedirectUrl);
  $this->Redirect($id, 'defaultadmin','', Array('tab'=>'settings', 'module_message'=>$this->Lang('save.succeed')));
}

echo $this->StartTabHeaders().
	$this->SetTabHeader('iplist',$this->Lang('tabtitle.iplist'), $tab == 'iplist' ? true : false).
	$this->SetTabHeader('settings',$this->Lang('tabtitle.settings'), $tab == 'settings' ? true : false).
	$this->EndTabHeaders().$this->StartTabContent();


echo $this->StartTab('settings');

$this->smarty->assign('emailtemplatelink', $this->CreateLink($id, 'emailtemplate', '', $this->Lang('email.template.title')));
$this->smarty->assign('form_start', $this->CreateFormStart($id, 'defaultadmin', $returnid,'post'));
$this->smarty->assign('redirect_label', $this->CreateLabelForInput($id,'redirect_url',$this->Lang('redirect.title')));
$this->smarty->assign('redirect_desc', $this->Lang('redirect.description'));
$this->smarty->assign('redirect_input', $this->CreateInputText($id,'redirect_url',$redirectUrl ,20,250));
$this->smarty->assign('redirect_submit',$this->CreateInputSubmit($id, 'redirect_submit', $this->Lang('redirect.submit')));
$this->smarty->assign('form_end', $this->CreateFormEnd());

echo $this->ProcessTemplate('settings.tpl');
echo $this->EndTab();
echo $this->StartTab('iplist');



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
	$entry->validationAction = $row['validated'] == 0 ?
	$this->CreateLink($id, 'defaultadmin', '', $this->Lang('validate'), array('validate_id' => $row['id'])):
	$this->CreateLink($id, 'defaultadmin', '', $this->Lang('invalidate'), array('invalidate_id' => $row['id']));

	if($user->username == $row['username'] &&
		$current_ip == $row['ip']){
		$current = $entry;
	} else {
		array_push($entries, $entry);
	}
}

$this->smarty->assign('caption_username', $this->Lang('username'));
$this->smarty->assign('caption_ip', $this->Lang('ip'));
$this->smarty->assign('caption_current', $this->Lang('current_user'));
$this->smarty->assign('caption_actions', $this->Lang('actions'));
$this->smarty->assign('entries', $entries);
$this->smarty->assign('current', $current);

echo $this->ProcessTemplate('entries.tpl');
echo $this->EndTab();
