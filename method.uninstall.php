<?php
if (!isset($gCms)) exit;

	/*---------------------------------------------------------
	   Uninstall()
	   Sometimes, an exceptionally unenlightened or ignorant
	   admin will wish to uninstall your module. While it
	   would be best to lay into these idiots with a cluestick,
	   we will do the magnanimous thing and remove the module
	   and clean up the database, permissions, and preferences
	   that are specific to it.
	   This is the method where we do this.
	  ---------------------------------------------------------*/

		/*
		// Typical Database Removal
		$db =& $gCms->GetDb();

		// remove the database table
		$dict = NewDataDictionary( $db );
		$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_securelogin" );
		$dict->ExecuteSQLArray($sqlarray);

		// remove the sequence
		$db->DropSequence( cms_db_prefix()."module_securelogin_seq" );
		*/

		$this->RemoveEventHandler('Core','LoginPost');
		// remove the permissions
		$this->RemovePermission('SecureLogin management');

		function dropTable($db, $tableName){
			$dict = NewDataDictionary($db);
			$taboptarray = array('mysql' => 'TYPE=MyISAM');
			$sqlarray = $dict->DropTableSQL(sprintf("%smodule_securelogin_%s",cms_db_prefix(), $tableName));
			$dict->ExecuteSQLArray($sqlarray);
			$db->DropSequence(sprintf("%smodule_securelogin_%s_seq",cms_db_prefix(), $tableName));
		}

		$db = $this->GetDb();

		dropTable($db, "whitelist");

		// put mention into the admin log
		$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('uninstalled'));

 		cms_siteprefs::remove('email.template');

		$config = cmsms()->GetConfig();
		$slh = sprintf('%s/tmp/secureLoginHandler.php', $config['root_path']);
		unlink($slh);
