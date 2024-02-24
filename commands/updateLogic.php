<?php

$name = readline("Enter the logic file name: ");

$f = fopen(dirname(__DIR__) . "\System\logic\appliedLogic.php","a+");

$filesLogicDIR = opendir(dirname(__DIR__)."\System\logic\interpret");

$logic_files = file(dirname(__DIR__)."\System\logic\appliedLogic.php");

$found = false;

$foundFiles = [];

while(false !== ($file = readdir($filesLogicDIR))) {
    $ext = explode(".",$file);
    if($ext[1] == "php") {
        $foundFiles[$ext[0]] = $file;
    }

}

for($file_lines = 0; $file_lines < count($logic_files); $file_lines++){
    if (str_contains($logic_files[$file_lines],$name)) {
        $found = "true";
    }
}

if($f){
    if(!$found) {
        if($foundFiles[$name]) {
            echo $name." added successfully!";
            fwrite($f,"include_once('System/logic/interpret/".$name.".php');"."\n");
        } else{
            echo "This file doens't exsist!";
        }
    } else{
        echo "This file already included!";
    }
        
}
