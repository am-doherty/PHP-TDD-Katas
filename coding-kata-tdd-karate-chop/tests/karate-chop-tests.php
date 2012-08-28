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
}
?>