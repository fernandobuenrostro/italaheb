<?php

	//check for blank and white space
	function is_blank($val){
		if(!isset($val) || trim($val) === '')
			return true;
		else
			return false;
	}

?>