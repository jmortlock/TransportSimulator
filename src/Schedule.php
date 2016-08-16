<?php
namespace TransportSimulator;

use DateTime;

class Schedule {
    private $bus;
    private $start;
    private $line;

    function __construct(Bus $bus, Line $line, DateTime $start) {
      $this->bus = $bus;
      $this->line = $line;
      $this->start = $start;
    }

    function getBus() {
      return $this->bus;
    }

    function getStart() {
      return $this->start;
    }

    function getLine() {
      return $this->line;
    }

    function toString() {
      $bus = $this->getBus();
      $line = $this->getLine();
      $start = $this->getStart()->format("c");
      return sprintf("Bus: %s Scheduled to Start line: %s @ %s",
                    $bus->getIdentifier(), $line->getIdentifier(), $start);
    }
}
