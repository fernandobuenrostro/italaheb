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
    $sql = $db->prepare("SELECT * FROM stores WHERE id = ? LIMIT 1");
    $sql->bindParam(1, $id);

    $result = $sql->execute();
    confirm_result_set($result);

    $store = $sql->fetch(PDO::FETCH_ASSOC);
  return $store;
  }

  function update_line_length_by_id($store){
    global $db;

    $errors = validate_line_input($store);
    if(!empty($errors)){
      return $errors;
    }

    $sql = $db->prepare("UPDATE stores SET line_length = ? WHERE id = ? LIMIT 1");
    $sql->bindParam(1, $store['line_length']);
    $sql->bindParam(2, $store['id']);

    $result = $sql->execute();
    if($result){
     return true;
    }
    else{
      echo "\nPDO::errorInfo():\n";
      print_r($db->errorInfo());
      $db = null;
    }
  }

  function validate_line_input($store){
    $errors = [];
    if(is_blank($store['line_length'])){
      $errors[] = "Value cannot be blank";
    }
    return $errors;


  }

?>