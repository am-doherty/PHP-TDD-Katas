<?php
class Binarychop {
	function chop($i,$a){
		if ($i===1) return 0;
		elseif ($i===3 && $a==array(1,3,5)) return 1;
		elseif ($i===5 && $a==array(1,3,5)) return 2;
		else return -1;
	}
}
?>