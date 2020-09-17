<?php

  function find_all_stores(){
	global $db;
	$sql = "SELECT * FROM stores ORDER BY id ASC";
	$result = $db->query($sql);
	confirm_result_set($result);
  	return $result;
  }


  function find_store_by_id($id){
  	global $db;
  	$sql = "SELECT * FROM stores WHERE id = " . $id;
  	$result = $db->query($sql);
  	confirm_result_set($result);

  	$store = $result->fetch(PDO::FETCH_ASSOC);
  	return $store;
  }

  function update_line_length_by_id($store){
  	global $db;
  	$sql = "UPDATE stores SET ";
  	$sql .= "line_length = '" . $store['line_length'] . "' ";
  	$sql .= "WHERE id = '" . $store['id'] . "' LIMIT 1";
  	$result = $db->query($sql);
  	if($result){
	   return true;
	}
	else{
	  echo "\nPDO::errorInfo():\n";
	  print_r($db->errorInfo());
	  $db = null;
	 }
  }




?>