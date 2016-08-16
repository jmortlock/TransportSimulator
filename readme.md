[![Build Status](https://travis-ci.org/jmortlock/TransportSimulator.svg?branch=master)](https://travis-ci.org/jmortlock/TransportSimulator)

# Notes
* This code is composed of the API and an example driver.
* example.php contains the API driver code.
* src/ folder contains the API.
* There is light test code coverage which is run via GitHubs TravisCI integration.
* Code is runnable with a working PHP system (as outlined below)

# Requirements
 * PHP 5.6+
 * composer
 * phpunit

# Installation
Following steps
* composer install
* php example.php or phpunit

# Problem

## Description

* A bus company needs a new system to manage their bus schedule.
* The company manages different bus lines on different times and routes.
* Each route is defined by a sequence of stops and is identified by a name.
* Each stop is identified by a code.
* Each bus line is defined as a series of routes (usually 2, forward and return) and is identified by a number.
* Buses are assigned to a line and a time schedule.
* Each time schedule is defined and identified by the arrival time at the first stop.

## Functional requirements

* The system must allow adding and removing buses
* The system must allow defining stops
* The system must allow defining routes
* The system must allow defining lines
* The system must allow assigning a line and a time schedule to a bus

## Task
Design a model of the system, either in UML, a programming language of your choice or pseudo-code.
