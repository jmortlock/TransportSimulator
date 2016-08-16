<?php
use TransportSimulator\Bus;
use TransportSimulator\Line;
use TransportSimulator\Route;
use TransportSimulator\Schedule;
use TransportSimulator\Stop;

class SimulatorTest extends PHPUnit_Framework_TestCase {

  public function testSimulation() {
     $line = new Line(100);
     $forward_route = $line->addRoute(new Route("forward"));
     $return_route = $line->addRoute(new Route("return"));

     //define the outgoing route.
     $forward_route->addStop("A-1");
     $forward_route->addStop("A-2");
     $forward_route->addStop("A-3");
     $forward_route->addStop("A-4");

     //define the return route.
     $return_route->addStop("R-0");
     $return_route->addStop("R-1");
     $return_route->addStop("R-2");
     $return_route->addStop("R-3");
     $return_route->addStop("R-4");

     //Bus Schedule.
     $schedule = new Schedule();
     $schedule->addTime($line->getRouteStop("forward", "A-1"), 800);
     $schedule->addTime($line->getRouteStop("forward", "A-2"), 815);
     $schedule->addTime($line->getRouteStop("forward", "A-3"), 845);
     $schedule->addTime($line->getRouteStop("forward", "A-4"), 847);

     $schedule->addTime($line->getRouteStop("return", "R-4"), 900);
     $schedule->addTime($line->getRouteStop("return", "R-3"), 915);
     $schedule->addTime($line->getRouteStop("return", "R-2"), 940);
     $schedule->addTime($line->getRouteStop("return", "R-1"), 1010);
     $schedule->addTime($line->getRouteStop("return", "R-0"), 1340);

     $bus = new Bus();
     $bus->setLine($line);
     $bus->setSchedule($schedule);
  }
}
