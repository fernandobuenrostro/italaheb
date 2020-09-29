<?php 
	require_once('../private/initialize.php');

	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$store['id'] = $_POST['id'];
		$store['line_length'] = $_POST['line_length'];

		$result = update_line_length_by_id($store);
		if(!$result === true){
			$errors = $result;
		}
	}else{
		echo "Error: not POST method.";
	}
?>

