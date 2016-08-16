<?php
namespace TransportSimulator;

class Stop {
    private $code;

    function __construct($code) {
        $this->code = $code;
    }

    function getCode() {
        return $this->code;
    }
}
