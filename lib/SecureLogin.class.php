<?php
namespace pieceofcode;
class SecureLogin{

  private $_db;
  private $_whitelistTable;

  public function __construct($db, $tablePrefix){
    $this->_db = $db;
    $this->_whitelistTable = $tablePrefix . '_whitelist';
  }

  private function getRowByUsernameAndIp($username, $ip, $validated = 1){
    $query = 'SELECT id, validateWithKey, username, ip FROM ' . $this->_whitelistTable . ' WHERE username = ? AND ip = ? AND validated = ?';
    $result = $this->_db->Execute($query, array($username, $ip, $validated));  

    
    if($result){
      return $result->FetchRow();
    } else {
      return null;
    }
  }

  public function userIsAllowedToLogin($username, $ip){
    if($this->getRowByUsernameAndIp($username, $ip) != null){
      return true;
    } else {
      return false;
    }
  }

  public function createValidationKey($username, $ip){
    $row = $this->getRowByUsernameAndIp($username, $ip, 0);
    if($row != null){
      $validationKey = $row['validateWithKey'];
    } else {
      $validationKey = md5(time() . $username . $ip . rand());
      $id = $this->_db->GenID($this->_whitelistTable . '_seq');

      $query = 'INSERT INTO ' . $this->_whitelistTable . ' (id, username, ip, validateWithKey) VALUES (?, ?, ?, ?)';
      $this->_db->Execute($query, array($id, $username, $ip, $validationKey));
    }
    return $validationKey;
  }

  public function getAllIps(){
    $entries = array();
        
    $query = 'SELECT id, username, ip, for_all, validated  FROM '. $this->_whitelistTable . ' ORDER BY username ASC';
    $result = $this->_db->Execute($query);
    while($result && $row = $result->FetchRow()){
      array_push($entries, $row);
    }
    return $entries;
  }

  public function updateValidateStatus($id, $valid){
    $query = 'UPDATE '. $this->_whitelistTable . ' SET validated = ? WHERE id = ?';
    $this->_db->Execute($query, array($valid ? 1 : 0, $id));
  }
}