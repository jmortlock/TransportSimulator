<?php
namespace TransportSimulator;

class RouteStop {
    private $stop;
    private $expected_travel_time;
    private $parent;

    function __construct(Route $parent, Stop $stop, $expectedTravelTime) {
      $this->parent = $parent;
      $this->stop = $stop;
      $this->expected_travel_time = $expectedTravelTime;
    }

    function getRoute() {
      return $this->parent;
    }

    function getStop() {
        return $this->stop;
    }

    function getExpectedTravelTime() {
        return $this->expected_travel_time;
    }

    function toString() {
      return $this->getStop()->getCode() . " " . $this->getExpectedTravelTime() . "mins";
    }
}
