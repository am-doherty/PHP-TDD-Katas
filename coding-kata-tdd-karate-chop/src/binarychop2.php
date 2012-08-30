<?php
class Binarychop2 {
	private $sliceDisgardCount = 0;
	private $needleInteger;
	private $haystackArray;
	private $indexFound = -1;	
		
	function chop($inputInt,$inputArray){
		// Response for insufficient/incorrect req's
		if (!is_array($inputArray) || count($inputArray) < 1 || !is_int($inputInt)) return -1;
		
		$this->needleInteger = $inputInt;
		$this->haystackArray = $inputArray;
		while(count($this->haystackArray) > 0) {
			if (count($this->haystackArray) === 1) {
				$this->indexFound = ($this->needleInteger === $this->haystackArray[0])?0: -1;
				unset($this->haystackArray);
			}
			else {
				$midElem = $this->haystackArray[$midKey = (floor(count($this->haystackArray)/2))];
				if ($this->needleInteger === $midElem) {
					$this->indexFound = $midKey;
					unset($this->haystackArray);
				}
				elseif ($this->needleInteger < $midElem){
					$this->haystackArray = array_slice($this->haystackArray,0,$midKey); 
				} 
				else {
					 $this->sliceDisgardCount +=$midKey;
					 $this->haystackArray = array_slice($this->haystackArray,$midKey); 
				}
			}
		}
		//return original offset if found, return -1 if not found
		return ($this->indexFound === -1)?-1:($this->indexFound+$this->sliceDisgardCount);
 	}	
}
?>