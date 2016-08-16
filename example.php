<?php
require_once __DIR__ . '/vendor/autoload.php';

use \TransportSimulator\Roster;
use \TransportSimulator\Bus;
use \TransportSimulator\Line;
use \TransportSimulator\Route;
use \TransportSimulator\Schedule;
use \TransportSimulator\Stop;

//This is a window for the current bus schedule.
//For example if we where looking for scheduling conflicts we would use
//this subset of data only.
$roster = new Roster();

//define a series of arbitrary stops.
//one could imagine extending this object to have extra useful
//meta-data like GPS co-ords, station name, amenities.
$roster->addStop("A-1");
$roster->addStop("A-2");
$roster->addStop("A-3");
$roster->addStop("A-4");
$roster->addStop("R-0");
$roster->addStop("R-1");
$roster->addStop("R-2");
$roster->addStop("R-3");
$roster->addStop("R-4");
$roster->addStop("R-5");
$roster->addStop("R-6");

//Next we define a route that takes us from the City
//to the bay, total expected travel time is 20mins.
//a route will define a series of stops and the exptected travel time
//between stops.

//first we need the actual line.
$line = $roster->addLine(100);

$city_to_bay_route = $line->addRoute(new Route("City to Bay"));

//next add a series of stops, first we get the created stop record
//from the roster (we want the meta-data).
//than define a number of minutes it will take to reach that stop from the
//previous stop.
$city_to_bay_route->addStop($roster->getStop("A-1"), 0);
$city_to_bay_route->addStop($roster->getStop("A-2"), 5);
$city_to_bay_route->addStop($roster->getStop("A-3"), 11);
$city_to_bay_route->addStop($roster->getStop("A-4"), 6);

//Next we add the return route. This takes us a different way with more stops.
//now the expected travel time is increased to 23mins.
$bay_to_city_route = $line->addRoute(new Route("Bay to City"));
$bay_to_city_route->addStop($roster->getStop("R-1"), 0);
$bay_to_city_route->addStop($roster->getStop("R-2"), 2);
$bay_to_city_route->addStop($roster->getStop("R-3"), 2);
$bay_to_city_route->addStop($roster->getStop("R-4"), 15);
$bay_to_city_route->addStop($roster->getStop("R-5"), 2);
$bay_to_city_route->addStop($roster->getStop("R-6"), 2);

//Lets create a couple of bus object.
//and give them a named identifier.
$morning_bus = $roster->addBus("berty");
$afternoon_bus = $roster->addBus("betty");

//Schedule the bus to run the bus line from 8AM.
$roster->scheduleBus($morning_bus, $line, new DateTime("2016-07-16 08:00:00"));

//Now schedule a second bus, this will run the same line but in the afternoon.
$roster->scheduleBus($afternoon_bus, $line, new DateTime("2016-07-16 16:30:00"));

//lets do a printout of the current roster.
$roster->render();

//Example ends.
