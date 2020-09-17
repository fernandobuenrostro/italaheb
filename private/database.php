<?php

  require_once('db_credentials.php');

  function db_connect() {
    try{
    $dbh = new PDO(DB_SN, DB_USER, DB_PASS);
    return $dbh;
    }
    catch(PDOException $e){
      print "Error!: " . $e->getMessage() . "</br>";
      die();
    }
  }

  function db_disconnect($dbh) {
    if(isset($dbh)) {
      $dbh = null;
    }
  }

  function confirm_result_set($result_set){
    if(!$result_set){
      exit("Database query failed.");
    }
  }



?>
