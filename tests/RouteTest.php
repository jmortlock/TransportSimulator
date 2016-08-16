<?php
use TransportSimulator\Route;

class RouteTest extends PHPUnit_Framework_TestCase {
  public function testConstructor() {
    $route = new Route("forward");
    $this->assertEquals("forward", $route->getName());
  }
}
