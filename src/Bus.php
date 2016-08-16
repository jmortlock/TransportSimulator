<?php
namespace TransportSimulator;

/**
* Bus Class
*/
class Bus {
    private $schedule;
    private $line;

    /**
    * Current Bus Schedule.
    * @return TransportSimulator\Schedule
    */
    function getSchedule() {
        return $this->schedule;
    }

    /**
    * Set Bus Schedule.
    * @param TransportSimulator\Schedule Current Bus Schedule.
    */
    function setSchedule(Schedule $schedule) {
        $this->schedule = $schedule;
    }

    /**
    * Retrieve the current bus Line.
    * @return TransportSimulator\Line
    */
    function getLine() {
        return $this->line;
    }

    /**
    * Set the bus line.
    * @param TransportSimulator\Schedule Current Bus Line.
    */
    function setLine(Line $line) {
        $this->line = $line;
    }

    /**
    * Determine where the bus would
    * @param Current Time.
    */
    function getLocationAtTime($time) {
        $line = $this->getLine();
        $schedule = $this->getSchedule();

        if ($line == null || $schedule == null) {
            return "Not Scheduled.";
        } else {
            $location = $schedule->getLocationAtTime($time);
            if ($location != null) {
                print "Line:" . $line->getIdentifier() . " @ $time on route '" . $location["route"] . "' Departed from " . $location["from"] . " heading towards " . $location["dest"];
            } else {
                print "@ $time Not Departed";
            }
        }
    }
}
