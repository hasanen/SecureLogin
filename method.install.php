<?php
if (!isset($gCms)) exit;

	/*---------------------------------------------------------
	   Install()
	   When your module is installed, you may need to do some
	   setup. Typical things that happen here are the creation
	   and prepopulation of database tables, database sequences,
	   permissions, preferences, etc.

	   For information on the creation of database tables,
	   check out the ADODB Data Dictionary page at
	   http://phplens.com/lens/adodb/docs-datadict.htm

	   This function can return a string in case of any error,
	   and CMS will not consider the module installed.
	   Successful installs should return FALSE or nothing at all.
	  ---------------------------------------------------------*/
		/*
		// Typical Database Initialization
		$db =& $gCms->GetDb();

		// mysql-specific, but ignored by other database
		$taboptarray = array('mysql' => 'TYPE=MyISAM');
		$dict = NewDataDictionary($db);

        // table schema description
        $flds = "
			id I KEY,
			description C(80)
			";

		// create it. This should do error checking, but I'm a lazy sod.
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_securelogin",
				$flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);

		// create a sequence
		$db->CreateSequence(cms_db_prefix()."module_securelogin_seq");
		*/
		$this->addEventHandler('Core','LoginPost',false);
		// permissions
		$this->CreatePermission('SecureLogin management','SecureLogin management');

//function for nicer table adding
function addTable($db, $tableName, $flds){
	$dict = NewDataDictionary($db);
	$taboptarray = array('mysql' => 'TYPE=MyISAM');
	$sqlarray = $dict->CreateTableSQL(sprintf("%smodule_securelogin_%s",cms_db_prefix(), $tableName),
		$flds, $taboptarray);
	$dict->ExecuteSQLArray($sqlarray);
	$db->CreateSequence(sprintf("%smodule_securelogin_%s_seq",cms_db_prefix(), $tableName));
}

$db = $this->GetDb();


addTable($db, "whitelist", "
		id I KEY,
		username C(25),
		ip C(15),
		for_all I DEFAULT 0,
		validateWithKey C(32),
		validated I DEFAULT 0,
		added TS");

		// put mention into the admin log
		$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('installed',$this->GetVersion()));

		$ip = $_SERVER['REMOTE_ADDR'];
		$userops = cmsms()->GetUserOperations();
		$user = $userops->LoadUserByID(get_userid());

		$key = $this->secureLogin()->createValidationKey($user->username, $ip);
		$this->secureLogin()->validateKey($key, $ip, $user->username);

  	$this->SetPreference('email.template', $this->Lang('email.template.default'));
