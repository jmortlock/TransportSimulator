<?php
namespace TransportSimulator;
use DateTime;

/**
* This is a window for the current bus schedule.
* For example if we where looking for scheduling conflicts we would use
* this subset of data only.
*/
class Roster {
    private $buses = [];
    private $lines = [];
    private $stops = [];

    /**
    * Adds a new bus line to this roster.
    * @param string $identifier Unique Identifier of the line.
    * @return Line Newly registered line.
    */
    function addLine($identifier) {
        $line = new Line($identifier);
        $this->lines[$identifier] = $line;
        return $line;
    }

    /**
    * Retrieve a line by its identifier.
    * @return Line If found or null otherwise.
    */
    function getLine($identifier) {
      return isset($this->lines[$identifier])  ? $this->lines[$identifier] : null;
    }

    /**
    * Add a new bus to this roster.
    * @param string $identifier Unique Identifier of the bus.
    * @return Bus Newly registered Bus.
    */
    function addBus($identifier) {
      $bus = new Bus($identifier);
      $this->buses[$identifier] = $bus;
      return $bus;
    }

    /**
    * Retrieve a bus by its identifier.
    * @return Bus If found or null otherwise.
    */
    function getBus($identifier) {
      return isset($this->buses[$identifier])  ? $this->buses[$identifier] : null;
    }

    /**
    * Retieve the currently registered buses for this roster.
    * @return array Bus.
    */
    function getBuses() {
      return $this->buses;
    }

    /**
    * Remove a bus from the system based on its identifier.
    * @param string $identifier Unique Bus Identifier.
    * @return void
    */
    function removeBus($identifier) {
      unset($this->buses[$identifier]);
      //remove from schedule as well!.
    }

    /**
    * Register a new stop with the system.
    * @param string $code Unique Stop Code.
    * @return Stop newly created stop record.
    */
    function addStop($code) {
      $stop = new Stop($code);
      $this->stops[$code] = $stop;
      return $stop;
    }

    /**
    * Retrieve a registered BusStop from the system.
    * @param $code string Unique indentifier.
    * @return Stop record if Found, null otherwise.
    */
    function getStop($code) {
      return isset($this->stops[$code])  ? $this->stops[$code] : null;
    }

    /**
    * Schedule a bus.
    * @param $bus Bus Bus to to scheduled.
    * @param @line line Line to schedule the bus too.
    * @param @start DateTime Start time of the schedule.
    * @return Schedule Returns the newly created scheduled.
    */
    function scheduleBus(Bus $bus, Line $line, DateTime $start) {
      $schedule = new Schedule($bus, $line, $start);
      $this->schedules[] = $schedule;
      return $schedule;
    }

    /**
    * Print to scren the current roster schedule.
    */
    function print() {
      foreach ($this->schedules as $schedule) {
        print $schedule->toString() . PHP_EOL;
        $this->printRoutes($schedule->getLine());
      }
    }

    /**
    * Print the BusLines routes.
    * @param Line $line Line to print.
    */
    private function printRoutes(Line $line) {
      $routes = $line->getRoutes();
      foreach ($routes as $route) {
        print "\t" . $route->toString() . PHP_EOL;
        $this->printStops($route);
      }
    }

    /**
    * Print the Route stops.
    * @param Route $route Route to print.
    */
    private function printStops(Route $route) {
      $stops = $route->getStops();
      foreach ($stops as $stop) {
        print "\t\t" . $stop->toString() . PHP_EOL;
      }
    }
}
