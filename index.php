<?php

require_once("class.main.php");
$o = new main;

#print_r($_SERVER['REQUEST_URI']);


if(isset($_SERVER['REQUEST_URI'])){
    $array = explode('/', $_SERVER['REQUEST_URI']);
    if(isset($array[0])){ $x = $array[0]; }
    if(isset($array[1])){ $o->api = $array[1]; }
    if(isset($array[2])){ $o->std_id = $array[2]; }
    if(isset($array[3])){ $o->action = $array[3]; }
   
    
    if($o->api != 'api' || !$o->std_id) {
        $arr = array("error" => "Wrong Query.");
        print_r(JSON_ENCODE($arr));        
    }

    print_r($o->takecall());
}
else{
    $arr = array("error" => "Something went wrong.");
    print_r(JSON_ENCODE($arr));
}
?>