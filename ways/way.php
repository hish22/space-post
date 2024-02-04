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
    Display::view("about");
});

Bridge::get("/auth", function() {
    echo "<h1>you should be auth to access</h1>";
});

Bridge::get("/user/{id}",function($params) {
    echo $params["id"];
});

Bridge::get("/name/{id}",function($params) {
    echo $params["id"];
});

Bridge::get("/person/{id}",function($params) {
    echo $params["id"];
});

Bridge::get("/mom/{id}/{name}",function($params) {
    echo $params["id"];
    echo $params["name"];
});

Bridge::get("/oop/{id}",function($params) {
    echo $params["id"];
});