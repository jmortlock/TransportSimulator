<?php
namespace TransportSimulator;

/**
* Bus Class
*/
class Bus {
  private $identifier;

  function __construct($id) {
    $this->identifier = $id;
  }

  function getIdentifier() {
    return $this->identifier;
  }
}
