<?php
namespace TransportSimulator;

class Line {
    private $routes = [];
    private $identifier;

    function __construct($identifier) {
        $this->identifier = $identifier;
    }

    function addRoute(Route $route) {
        $this->routes[] = $route;
        return $route;
    }

    function getRoutes() {
        return $this->routes;
    }

    function getRoute($name) {
        foreach ($this->routes as $route) {
            if ($route->getName() == $name) {
                return $route;
            }
        }
        return null;
    }

    function getRouteStop($route, $stop) {
        $route = $this->getRoute($route);
        if ($route != null) {
            return $route->getStop($stop);
        }
        return null;
    }

    function getIdentifier() {
        return $this->identifier;
    }
}
