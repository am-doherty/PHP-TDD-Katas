<?php
// see http://codekata.pragprog.com/2007/01/kata_two_karate.html
require_once '../src/binarychop2.php';
require_once 'PHPUnit/Autoload.php';

class chopTest extends PHPUnit_Framework_TestCase
{
	/* Search for integer '3' in empty array */
    public function testChop()
    {
		$myChopper = new Binarychop2();
        $this->assertEquals(-1, $myChopper->chop(3,array()));
    }
	/* Search for integer '3' in array(1) */
    public function testChop2()
    {
		$myChopper = new Binarychop2();
		$this->assertEquals(-1, $myChopper->chop(3,array(1)));
    }	
	/* Search for integer '1' in array(1) */
    public function testChop3()
    {
		$myChopper = new Binarychop2();
		$this->assertEquals(0, $myChopper->chop(1,array(1)));
    }	
	/* Search for integer '1' in array(1,3,5) */
    public function testChop4()
    {
		$myChopper = new Binarychop2();
		$this->assertEquals(0, $myChopper->chop(1,array(1, 3, 5)));
    }	
	/* Search for integer '3' in array(1,3,5) */
    public function testChop5()
    {
		$myChopper = new Binarychop2();
		$this->assertEquals(1, $myChopper->chop(3,array(1, 3, 5)));
    }
	/* Search for integer '5' in array(1,3,5) */
    public function testChop6()
    {
		$myChopper = new Binarychop2();
		$this->assertEquals(2, $myChopper->chop(5,array(1, 3, 5)));
    }	
	/* test Incorrect argument types ---- Search for string 'foo' in array(1,3,5) */
    public function testChop7()
    {
		$myChopper = new Binarychop2();
		$this->assertEquals(-1, $myChopper->chop('foo',array(1, 3, 5)));
    }
	/* test Incorrect argument types ---- Search for integer 5 in string */
    public function testChop8()
    {
		$myChopper = new Binarychop2();
		$this->assertEquals(-1, $myChopper->chop(5,'a string'));
    }		
	/* Search for integer '5' in array(1,3,5) */
    public function testChop9()
    {
		$myChopper = new Binarychop2();
		$this->assertEquals(2, $myChopper->chop(5,array(1, 3, 5,7,9)));
    }	
	/* Search for integer '12' in longer array */
    public function testChop10()
    {
		$myChopper = new Binarychop2();
		$this->assertEquals(2, $myChopper->chop(5,array(1, 3, 5,7,9,12,34,123,223,278,450,1124,1900)));
    }	
	/* Search for integer '450' in longer array */
    public function testChop11()
    {
		$myChopper = new Binarychop2();
		$this->assertEquals(10, $myChopper->chop(450,array(1, 3, 5,7,9,12,34,123,223,278,450,1124,1900)));
    }		
	/* Search for integer '450' in longer array (doesnt exist) */
    public function testChop12()
    {
		$myChopper = new Binarychop2();
		$this->assertEquals(-1, $myChopper->chop(221,array(1, 3, 5,7,9,12,34,123,223,278,450,1124,1900)));
    }	
	/* Search for integer '450' in longer array, of even number of items */
    public function testChop13()
    {
		$myChopper = new Binarychop2();
		$this->assertEquals(10, $myChopper->chop(450,array(1, 3, 5,7,9,12,34,123,223,278,450,1124)));
    }		
    public function testChop14()
    {
		$myChopper = new Binarychop2();
		$this->assertEquals(13, $myChopper->chop(450,array(1, 3, 5,5,7,9,12,12,34,123,223,278,278,450,1124)));
    }		
}
?>