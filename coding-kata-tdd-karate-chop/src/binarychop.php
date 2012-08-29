<?php
class Binarychop {
	function chop($i,$a){
		if (!is_array($a)  || !is_int($i)) {
			return -1;
		}
		$key = array_search($i,$a);
		if ($key === FALSE) {
			return -1;
		}
		else {
			return($key);
		}
	}	
}
?>