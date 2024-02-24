<?php

/*
-----------------------------
Loder file for the app files.
-----------------------------
*/

// checkers System
include_once("System/checker/checkManger.php");
include_once("System/checker/gather.php");
include_once("System/checker/process.php");

// Bridges system
include_once("System/bridges/bridge.php");
include_once("System/bridges/route.php");
include_once("System/bridges/process.php");


// Recto System
include_once("System/recto/portal.php");
include_once("System/recto/show/display.php");
include_once("System/recto/process.php");

// Logic system
include_once("System/logic/logic.php");
include_once("System/logic/appliedLogic.php");