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
		return ($this->haystackSlice());
 	}	

	private function haystackSlice( ) {
		if (count($this->haystackArray) ===1) {
			return ($this->needleInteger === $this->haystackArray[0] ) ? ($this->sliceDisgardCount) : -1;
		}
		//Get the 'middle' element and its key 
		$midElem = $this->haystackArray[$midKey = (floor(count($this->haystackArray)/2))];
		// If we've found needle, return the key	
		if ($this->needleInteger === $midElem) {
			return ($this->sliceDisgardCount+$midKey); 
		}
		//If needle's smaller or larger than middle value, slice and retry.
		if ($this->needleInteger < $midElem){
			$this->haystackArray = array_slice($this->haystackArray,0,$midKey); //length from beginning
			return $this->haystackSlice();
		} 
		/* Otherwise...
		  * Record the offset you're disgarding by slicing the upper half from the original haystack, 
		  * Retry
	 	  */
		 $this->sliceDisgardCount +=$midKey;
		 $this->haystackArray = array_slice($this->haystackArray,$midKey);  //remainder from midpoint
		return $this->haystackSlice();
	}
}
?>