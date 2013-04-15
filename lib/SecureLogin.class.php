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
    
  }
}