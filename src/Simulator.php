<?php
namespace TransportSimulator;

use \DateTime;

class Simulator {
    private $buses = [];

    function addLine($identifier) {
        $line = new Line($identifier);
        return $line;
    }

    function addBus(Bus $bus) {
        $this->buses[] = $bus;
        return $bus;
    }

    function getBus() {
        return $this->$buses;
    }

    function run() {
        //run a 24 hour simulation.
        $zero    = new DateTime('@0');
        $minutes = 0;
        while ($minutes < 1440) {
            foreach ($this->buses as $bus) {
                if ($minutes % 5 == 0) {
                    $date  = new DateTime('@' . $minutes * 60);
                    print $bus->getLocationAtTime($date->format("Hi")) . PHP_EOL;
                }
            }
            $minutes++;
        }
    }
}
