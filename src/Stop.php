<?php
namespace TransportSimulator;

class Stop {
    private $code;
    private $routeName;

    function __construct($code) {
        $this->code = $code;
    }

    function getCode() {
        return $this->code;
    }

    function getRouteName() {
        return $this->routeName;
    }

    function setRouteName($value) {
        $this->routeName = $value;
    }
}
