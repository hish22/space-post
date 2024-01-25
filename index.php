<?php

include_once("System/load.php");

use System\process\Process as bridgeProcess;
use System\recto\Process as RectoProcess;

include_once("ways/way.php");

bridgeProcess::process();
RectoProcess::process();

// RectoProcess::process();