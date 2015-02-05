<?php
require_once ("database.php");

function db_connect($mysql){
    //biến kết nối csdl

    $ret=mysql_connect($mysql['host'],$mysql['username'],$mysql['password']);
    mysql_query("SET NAMES 'utf8'",$ret);
    mysql_query("SET character_set_results=utf8",$ret);
    if ($ret) {
        //Kết nối thành công
        mysql_select_db($mysql['database']);
    }
    return $ret;
}

db_connect($mysql);
?>