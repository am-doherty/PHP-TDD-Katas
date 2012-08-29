<?php
class Binarychop {
	private $needleInteger;
	private $haystackArray;
	function chop($inputInt,$inputArray){
		// Response for insufficient/incorrect req's
		if (!is_array($inputArray) || count($inputArray) < 1 || !is_int($inputInt)) {
			return -1;
		}
		$a = $inputArray;
		$i = $inputInt;
		$this->needleInteger = $inputInt;
		$this->haystackArray = $inputArray;
		// Quickie response for single item arrays
		if (count($this->haystackArray) ===1) {
			return ($this->needleInteger === $this->haystackArray[0] ) ? 0 : -1;
		}
		// Handle dual item arrays
		if (count($this->haystackArray) ===2) {
			if ($this->needleInteger === $this->haystackArray[0]) return 0;
			if ($this->needleInteger === $this->haystackArray[1]) return 1;
			return -1;
		}
		return $this->haystackSlice();
		
 	}	
	private function haystackSlice() {
			/*Response for multi-item arrays:
		  *
		  *    Find middle element, rounding down, assign key and value to $midKey and $midElem respectively
		  *  	If the needle matches the middle item (you never know) then return key		  
		  *   
		  *   	If needle is less than middle item, derive lower half array and check for needle
		  *   	If needle is greater than middle item, derive upper half array and check for needle
		  *	Finally, if needle still not found, return -1
		  */
		$midElem = $this->haystackArray[$midKey = (floor(count($this->haystackArray)/2))];
		if ($this->needleInteger === $midElem) return $midKey; 
		$one = array_slice($this->haystackArray,0,$midKey);

 		if ($this->needleInteger < $midElem){
			if (($key = array_search($this->needleInteger,$one)) !==FALSE) {			 
				return $key;
			}
		} 
		else	{ 
		 	$two = array_slice($this->haystackArray,$midKey);
			if (($key = array_search($this->needleInteger,$two))!==FALSE) {
			 	return ($key+count($one)); 
			}
		} 
		//finally, return -1 if not found at all
		return -1;
	}
	
	
}
?>