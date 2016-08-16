<?php
use TransportSimulator\Bus;
use TransportSimulator\Line;
use TransportSimulator\Route;
use TransportSimulator\Schedule;
use TransportSimulator\Stop;
use TransportSimulator\Roster;

/**
* Test the main acceptance criteria.
*/
class SystemTest extends PHPUnit_Framework_TestCase {

  public function testAddBus() {
    $roster = new Roster();
    $this->assertEquals(0, count($roster->getBuses()));

    $roster->addBus("TEST");
    $this->assertEquals(1, count($roster->getBuses()), "#1");
    $this->assertNotNull($roster->getBus("TEST"));

    $roster->addBus("TEST 1");
    $this->assertEquals(2, count($roster->getBuses()), "#2");
    $this->assertNotNull($roster->getBus("TEST 1"));
  }

  public function testRemoveBus() {
    $roster = new Roster();
    $roster->addBus("TEST");
    $roster->addBus("TEST 1");
    $roster->addBus("TEST 2");

    $this->assertEquals(3, count($roster->getBuses()));

    //now remove the buses.
    $roster->removeBus("TEST 1");
    $this->assertNull($roster->getBus("TEST 1"));
    $this->assertEquals(2, count($roster->getBuses()));

    //this should be a no-op.
    $roster->removeBus("TEST 1");
    $this->assertEquals(2, count($roster->getBuses()));

    $roster->removeBus("TEST");
    $this->assertNull($roster->getBus("TEST"));
    $this->assertEquals(1, count($roster->getBuses()));

    $roster->removeBus("TEST 2");
    $this->assertNull($roster->getBus("TEST 2"));
    $this->assertEquals(0, count($roster->getBuses()));
  }

  public function testAddStop() {
    $roster = new Roster();
    $roster->addStop("S-1");
    $this->assertNotNull($roster->getStop("S-1"));

    $roster->addStop("S-2");
    $this->assertNotNull($roster->getStop("S-2"));
  }

  public function testAddLine() {
    $roster = new Roster();
    $roster->addLine(1);
    $this->assertNotNull($roster->getLine(1), "#1");

    $roster->addLine(2);
    $this->assertNotNull($roster->getLine(2), "#2");
  }

  public function testScheduleBus() {
    $roster = new Roster();
    $line = $roster->addLine(1);
    $line->addRoute(new Route("forward"));
    $line->addRoute(new Route("backward"));
    $bus = $roster->addBus("Bus1");

    $roster->scheduleBus($bus, $line, new \DateTime("2016-01-01 01:00:00"));
    $this->assertEquals(1, count($roster->getSchedules()));

  }

}
