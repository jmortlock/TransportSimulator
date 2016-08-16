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

    function addStop($stopCode) {
        $stop = new Stop($stopCode);
        $stop->setRouteName($this->getName());
        $this->stops[] = $stop;
        return $stop;
    }

    function getStop($code) {
        foreach ($this->stops as $stop) {
            if ($stop->getCode() == $code) {
                return $stop;
            }
        }
        return null;
    }

    function getStops() {
        return $this->stops;
    }
}
