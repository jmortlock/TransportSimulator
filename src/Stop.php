<?php
namespace TransportSimulator;

class Stop {
    var $code;

    function __construct($code) {
        $this->code = $code;
    }

    function getCode() {
        return $this->code;
    }
}
