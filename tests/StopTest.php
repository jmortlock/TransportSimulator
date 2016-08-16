<?php
use TransportSimulator\Stop;

class StopTest extends PHPUnit_Framework_TestCase {
  public function testConstructor() {
    $stop = new Stop("aa-11");
    $this->assertEquals("aa-11", $stop->getCode());
  }
}
