<?php
  namespace pieceofcode;
  class SecureLogin{

    private $_db;
    public function __construct($db){
      $this->_db = $db;
    }

    public function userIsAllowedToLogin($username, $ip){

    }
  }