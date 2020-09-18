<?php
	require_once('../private/initialize.php');

if(!isset($_GET['id'])){
	header("Location: " . url_for('index.html'));
}
$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$store['id'] = $id;
	$store['line_length'] = $_POST['line_length'];

	$result = update_line_length_by_id($store);
	if($result === true){
		header("Location: " . url_for('updateLineCount.php'));
	}else{
		$errors = $result;
	}
}else{
	$store = find_store_by_id($id);
}


?>
<a href="<?php echo url_for('index.html');?>"> &laquo Back </a>
<h3><?php if($errors){echo $errors[0];}?></h3>
<h1>H-E-B<?php
	if(isset($store['address'])){
		echo " at " . $store['address'];
	}?></h1>


<form action="<?php echo url_for('updateLineCount.php') . "?id=" . $id; ?>" method="post">
	<h3>Line length: <input type="int" name="line_length" value="<?php echo $store['line_length']; ?>" /></h3>
        <input type="submit" value="Enter" />
</form>



