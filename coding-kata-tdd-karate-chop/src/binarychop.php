<?php
class Binarychop {
	private $sliceDisregardCount = 0;
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
			return ($this->needleInteger === $this->haystackArray[0] ) ? ($this->sliceDisregardCount) : -1;
		}
		/* Handling duplicate values
		  * retrieve the index of the midpoint item in the array, rounding down 
		  */
		$midpointIdx = floor(count($this->haystackArray)/2);
		// 
		while ($this->haystackArray[$midpointIdx] === $this->haystackArray[$midpointIdx-1])  {
				$midpointIdx--;
		}
		$midElem = $this->haystackArray[$midpointIdx];
		/* ---------- End Handling duplicates */
		// If we've found needle, return the key	
		if ($this->needleInteger === $midElem) {
			return ($this->sliceDisregardCount+$midpointIdx); 
		}
		//If needleInteger is smaller or larger than middle value, slice and retry.
		if ($this->needleInteger < $midElem){
			$this->haystackArray = array_slice($this->haystackArray,0,$midpointIdx); //length from beginning
			return $this->haystackSlice();
		} 
		/* Otherwise...
		  * Record the offset you're disgarding by slicing the upper half from the original haystack, 
		  * Retry
	 	  */
		 $this->sliceDisregardCount +=$midpointIdx;
		 $this->haystackArray = array_slice($this->haystackArray,$midpointIdx);  //remainder from midpoint
		return $this->haystackSlice();
	}
}
?>