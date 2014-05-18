<?php
if (!isset($gCms)) exit;

	/*---------------------------------------------------------
	   Upgrade()
	   If your module version number does not match the version
	   number of the installed module, the CMS Admin will give
	   you a chance to upgrade the module. This is the function
	   that actually handles the upgrade.
	   Ideally, this function should handle upgrades incrementally,
	   so you could upgrade from version 0.0.1 to 10.5.7 with
	   a single call. For a great example of this, see the News
	   module in the standard CMS install.
	  ---------------------------------------------------------*/
		$current_version = $oldversion;
		switch($current_version)
		{
			case "1.0":
			case "1.0.1":
					$this->SetPreference('email.template', $this->Lang('email.template.default'));
					break;
			case "1.1":
					cms_route_manager::del_static('',$this->GetName());

					$templateops =& $gCms->GetTemplateOperations();
					$contentops =& $gCms->GetContentOperations();
					$contentops->LoadContentFromId($this->getLandingPageId())->Delete();
					cms_siteprefs::remove('SecureLoginTemplateId');

					//These are some old configs, removing just in case
					$templateops->DeleteTemplateById(cms_siteprefs::get('SecureLoginTemplateId'));
					cms_siteprefs::remove('SecureLoginLangingPageId');
					break;
			case "1.1.1":
					$config = cmsms()->GetConfig();
					$src = sprintf('%s/modules/SecureLogin/templates/secureLoginHandler.php', $config['root_path']);
					$dest = sprintf('%s/tmp/secureLoginHandler.php', $config['root_path']);
					copy($src, $dest);
		}

		// put mention into the admin log
		$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('upgraded',$this->GetVersion()));

?>
