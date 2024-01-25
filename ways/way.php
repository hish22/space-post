<?php


/* 
-------------------------------------
 Load all required files (namespaces)
-------------------------------------
*/
use System\bridges\Bridge;

/*
---------------------------------------------------------------------
 Here will be all your ways (routes) to the specified registerd ways.
---------------------------------------------------------------------
*/

Bridge::get("/",function() {
    echo "<h1>Dude hello !!</h1>";
});

Bridge::get("/about",function() {
    echo "<h1>About page baby! !!</h1>";
});

Bridge::get("/auth", function() {
    echo "<h1>you should be auth to access</h1>";
});