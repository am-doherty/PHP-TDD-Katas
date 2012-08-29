<?php
class Binarychop {
	function chop($i,$a){
		// Response for insufficient/incorrect req's
		if (!is_array($a) || count($a) < 1 || !is_int($i)) {
			return -1;
		}
		// Quickie response for single item arrays
		if (count($a) ===1) {
			return ($i === $a[0] ) ? 0 : -1;
		}
		// Handle dual item arrays
		if (count($a) ===2) {
			if ($i === $a[0]) return 0;
			if ($i === $a[1]) return 1;
			return -1;
		}
		/*Response for multi-item arrays:
		  *
		  *    Find middle element, rounding down, assign key and value to $midKey and $midElem respectively
		  *  	If the needle matches the middle item (you never know) then return key		  
		  *   
		  *   	If needle is less than middle item, derive lower half array and check for needle
		  *   	If needle is greater than middle item, derive upper half array and check for needle
		  *	Finally, if needle still not found, return -1
		  */
		$midElem = $a[$midKey = (floor(count($a)/2))];
		if ($i === $midElem) return $midKey; 
		$one = array_slice($a,0,$midKey);

 		if ($i < $midElem){
			if (($key = array_search($i,$one)) !==FALSE) {			 
				return $key;
			}
		} 
		else	{ 
		 	$two = array_slice($a,$midKey);
			if (($key = array_search($i,$two))!==FALSE) {
			 	return ($key+count($one)); 
			}
		} 
		//finally, return -1 if not found at all
		return -1;
 	}	
}
?>