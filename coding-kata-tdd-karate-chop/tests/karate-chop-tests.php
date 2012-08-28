<?php
// see http://codekata.pragprog.com/2007/01/kata_two_karate.html
require_once '../src/binarychop.php';
require_once 'PHPUnit/Autoload.php';

class chopTest extends PHPUnit_Framework_TestCase
{
	/* Search for integer '3' in empty array */
    public function testChop()
    {
		$myChopper = new Binarychop();
        $this->assertEquals(-1, $myChopper->chop(3,array()));
    }
	/* Search for integer '3' in array(1) */
    public function testChop2()
    {
		$myChopper = new Binarychop();
		$this->assertEquals(-1, $myChopper->chop(3,array(1)));
    }	
	/* Search for integer '1' in array(1) */
    public function testChop3()
    {
		$myChopper = new Binarychop();
		$this->assertEquals(0, $myChopper->chop(1,array(1)));
    }	
	/* Search for integer '1' in array(1,3,5) */
    public function testChop4()
    {
		$myChopper = new Binarychop();
		$this->assertEquals(0, $myChopper->chop(1,array(1, 3, 5)));
    }	
	/* Search for integer '3' in array(1,3,5) */
    public function testChop5()
    {
		$myChopper = new Binarychop();
		$this->assertEquals(1, $myChopper->chop(3,array(1, 3, 5)));
    }
	/* Search for integer '5' in array(1,3,5) */
    public function testChop6()
    {
		$myChopper = new Binarychop();
		$this->assertEquals(2, $myChopper->chop(5,array(1, 3, 5)));
    }	
}
?>