<?php

namespace System\recto;

abstract class Portal{

    protected static array $ways = [];

    protected static function port() {
        $handle = opendir("../../views");
        if($handle) {

            while(false !==  ($f = readdir($handle))) {
               $file_split = explode('.',$f);
            //    echo $file_split;
               if($file_split[1] == 'php') {
                    self::append($file_split[0],$file_split[1]);
               }
            }
            
        
        }

        closedir($handle);

    }
    
    protected static function append(String $way, $ext) {
        self::$ways = [$way => $way . "." . $ext];
    }


}