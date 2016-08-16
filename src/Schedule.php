<?php
namespace TransportSimulator;

class Schedule {
    private $schedule = [];

    private function getLastVisitedStop($time) {
        $min = 2400;
        $minStop = null;
        foreach ($this->schedule as $schedule) {
            $diff = $time - $schedule["arrival_time"];
            if ($diff > 0 && $diff < $min) {
                $min = $diff;
                $minStop = $schedule["stop"];
            }
        }
        return $minStop;
    }

    private function getNextStop($stop) {
        for ($i=0; $i < count($this->schedule); $i++) {
            if ($this->schedule[$i]["stop"]->getCode() == $stop->getCode()) {
                if ($i != count($this->schedule)) {
                    return $this->schedule[$i+1]["stop"];
                }
            }
        }
        return null;
    }

    function addTime(Stop $stop, $arrivalTime) {
        //sort.
        $this->schedule[] = ["stop" => $stop, "arrival_time" => $arrivalTime];
    }

    function hasStarted($time) {
        if (count($this->schedule) > 0) {
            return $time > $this->schedule[0]["arrival_time"];
        }
        return false;
    }

    function hasFinished($time) {
        $count = count($this->schedule);
        if ($count > 0) {
            $last = $this->schedule[$count-1];
            return $time > $last["arrival_time"];
        }
        return true;
    }

    function getLocationAtTime($time) {
        if ($this->hasFinished($time)) {
            return ["route" => "", "from" => "Last", "dest" => "Finished"];
        } else {
            $pastStop = $this->getLastVisitedStop($time);
            if ($pastStop != null) {
                $dest = $this->getNextStop($pastStop);
                if ($dest != null) {
                    return ["route" => $pastStop->getRouteName(), "from" => $pastStop->getCode(), "dest" => $dest->getCode()];
                } else {
                    return ["route" => $pastStop->getRouteName(), "from" => $pastStop->getCode(), "dest" => "UNK"];
                }
            }
        }
        return null;
    }

    function getSchedule() {
        return $this->schedule;
    }
}
