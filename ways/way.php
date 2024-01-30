<?php


/** 
 * -------------------------------------
 * Load all required files (namespaces)
 * -------------------------------------
*/
use System\bridges\Bridge;
use System\recto\show\Display;

/** 
 * ---------------------------------------------------------------------
 * Here will be all your ways (routes) to the specified registerd ways.
 * ---------------------------------------------------------------------
*/

Bridge::get("/",function() {
    Display::view("home");
});

Bridge::get("/about",function() {
    echo "<h1>About page baby! !!</h1>";
});

Bridge::get("/auth", function() {
    echo "<h1>you should be auth to access</h1>";
});

Bridge::get("/user/{id}",function($params) {
    echo $params["id"];
});