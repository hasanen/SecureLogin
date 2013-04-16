<?php
namespace pieceofcode;
class SecureLogin{

  private $_db;
  private $_whitelistTable;

  public function __construct($db, $tablePrefix){
    $this->_db = $db;
    $this->_whitelistTable = $tablePrefix . '_whitelist';
  }

  public function userIsAllowedToLogin($username, $ip){
    $query = sprintf('SELECT id FROM %s WHERE username = ? AND ip = ? AND validated = 1', $this->_whitelistTable);
    $result = $this->_db->Execute($query, array($username, $ip));
    if($result && $result->FetchRow()){
      return true;
    } else {
      return false;
    }
  }

  public function createValidationUrl($siteroot, $username, $ip){

  }
}