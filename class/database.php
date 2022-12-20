<?php

class DB {
  public $DB_HOST;
  public $DB_NAME;
  public $DB_USER;
  public $DB_PASS;

  public $conn;
  public $SQL;

  public function __construct(){
    $this->DB_HOST = DBHOST;
    $this->DB_NAME = DBNAME;
    $this->DB_USER  = DBUSER;
    $this->DB_PASS  = DBPASS;
    $this->conn = null;
    $this->SQL = "";
    $this->dbconnect();
  }

  public function dbconnect() {
    $this->conn = mysqli_connect($this->$DB_HOST, $this->DB_NAME, $this->$DB_USER, $this->$DB_PASS);
    if(!$this->conn) {
      return "Database Connection Error";
    }
    mysqli_select_db($this->conn, $this->DB_NAME);
  }

  public function setQuery($query) {
    $this->SQL = $query;
  }

  public function execute() {
    if($this->SQL == ""){
      return false;
    }
    $result = mysqli_query($this->conn, $this->SQL);
    if($result === false) {
      $this->SQL = "";
      return "Query is incorrect!";
    }
    return mysqli_affected_rows($this->conn);
  }

  public function select() {
    if($this->SQL == ""){
      return false;
    }
    $result = mysqli_query($this->conn, $this->SQL);
    if($result === false) {
      $this->SQL = "";
      return "Query is incorrect!";
    }
    $records = array();
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      $records[] = $row;
    }
    return $records;
  }

  public function selectOne() {
    if($this->SQL == ""){
      return false;
    }
    $result = mysqli_query($this->conn, $this->SQL);
    if($result === false) {
      $this->SQL = "";
      return "Query is incorrect!";
    }
    $row = mysqli_fetch_assoc($result);
    return $row;
  }
}