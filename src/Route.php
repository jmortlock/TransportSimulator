<?php
namespace TransportSimulator;

class Route {
    private $stops = [];
    private $name = "";

    function __construct($name) {
        $this->name = $name;
    }

    function getName() {
        return $this->name;
    }

    function addStop(Stop $stop, $expectedTravelTime) {
        $stop = new RouteStop($this, $stop, $expectedTravelTime);
        $this->stops[] = $stop;
        return $stop;
    }

    function getStops() {
        return $this->stops;
    }

    function toString() {
      return $this->name;
    }
}
