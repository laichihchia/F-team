<?php 
session_start();
foreach($_SESSION as $k => $v){
    var_dump($k);
}


?>