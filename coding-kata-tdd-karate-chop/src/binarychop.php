<?php
class Binarychop {
	private $sliceDisgardCount = 0;
	private $needleInteger;
	private $haystackArray;
	function chop($inputInt,$inputArray){
		// Response for insufficient/incorrect req's
		if (!is_array($inputArray) || count($inputArray) < 1 || !is_int($inputInt)) {
			return -1;
		}
		$this->needleInteger = $inputInt;
		$this->haystackArray = $inputArray;
		return ($this->haystackSlice($this->haystackArray));
 	}	
	private function haystackSlice($localArray ) {
 		if (count($localArray) ===1) {
			return ($this->needleInteger === $localArray[0] ) ? ($this->sliceDisgardCount) : -1;
		}
		// Handle dual item arrays
		if (count($localArray) ===2) {
			if ($this->needleInteger === $localArray[0]) return $this->sliceDisgardCount;
			if ($this->needleInteger === $localArray[1]) return ($this->sliceDisgardCount+1);
			return -1;
		}
		//Get the 'middle' element and its key 
		$midElem = $localArray[$midKey = (floor(count($localArray)/2))];
		// If we've found needle, return the key	
		if ($this->needleInteger === $midElem) {
			return ($this->sliceDisgardCount+$midKey); 
		}
		//If needle's smaller or larger than middle value, slice and retry.
		if ($this->needleInteger < $midElem){
 			$localArray = array_slice($localArray,0,$midKey); //length from beginning
 			return $this->haystackSlice($localArray);
		} 
		else { 
			// If larger than middle, record the offset you're disgarding by slicing the upper half from the original haystack
 			 $this->sliceDisgardCount +=$midKey;
		 	 $localArray = array_slice($localArray,$midKey);  //remainder from midpoint
 			return $this->haystackSlice($localArray);
		} 
		return -1;
	}
}
?>