<?php


/** 
 * -------------------------------------
 * Load all required files (namespaces)
 * -------------------------------------
*/
use System\bridges\Bridge;
use System\bridges\route;
use System\recto\show\Display;

/** 
 * ---------------------------------------------------------------------
 * Here will be all your ways (routes) to the specified registerd ways.
 * ---------------------------------------------------------------------
*/

Bridge::get("/",function() {
    echo "<h1>Hello world!</h1>";
    Display::build()->view("home");
});

Bridge::get("/",function() {
    Display::build()->view("home");
});

Bridge::post("/", function($postData) {
   $display = Display::build();
   $display->inject($postData);
   $display->redirect("/",["msg" => "DONE"]);
});

Bridge::get("/about",function() {
    Display::build()->view("about");
});

Bridge::get("/auth", function() {
    echo "<h1>you should be auth to access</h1>";
});

Bridge::get("/user/{id}",function($params) {
    echo $params["id"];
});

Bridge::get("/name/{id}",function($params) {
    $view = Display::build();
    $view->inject($params);
    $view->view("user");
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