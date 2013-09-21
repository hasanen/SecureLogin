<?php
if (!isset($gCms)) exit;

if (! $this->CheckAccess())
  {
  return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
  }
if(isset($params['submit']) || isset($params['apply'])){
  $template = $params['template'];
  if(empty($template)){
    $template = $this->Lang('email.template.default');
  }
  $this->SetPreference('email.template', $template);
}
if(isset($params['cancel']) || isset($params['submit'])){
  $this->Redirect($id, 'defaultadmin');
}

$template = $this->GetPreference('email.template');

$this->smarty->assign('title', $this->Lang('email.template.title'));
$this->smarty->assign('variables', $this->Lang('email.template.variables'));

$this->smarty->assign('form_start',$this->CreateFormStart($id, 'emailtemplate','','post',''));
$this->smarty->assign('form_end',$this->CreateFormEnd());

$this->smarty->assign('template',$this->CreateTextArea(false, $id, $template, 'template'));
$this->smarty->assign('submit',$this->CreateInputSubmit($id, 'submit', $this->Lang('email.template.submit')));
$this->smarty->assign('cancel',$this->CreateInputSubmit($id, 'cancel', $this->Lang('email.template.cancel')));
$this->smarty->assign('apply',$this->CreateInputSubmit($id, 'apply',$this->Lang('email.template.apply')));

echo $this->ProcessTemplate('email.template.tpl');