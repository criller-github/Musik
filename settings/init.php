<?php
require "classes/classDB.php";

define("CONFIG_LIVE", "1"); // 0: Test enviroment || 1: Live enviroment

if(CONFIG_LIVE == 1){
    $DB_SERVER = "localhost";
    $DB_NAME = "music";
    $DB_USER = "root";
    $DB_PASS = "";
}else{
    $DB_SERVER = "mysql44.unoeuro.com";
    $DB_NAME = "bresson_portfolio_dk_db";
    $DB_USER = "bresson_portfolio_dk";
    $DB_PASS = "yREhDgAtBkm5pcd26wx3";
}

$db = new db($DB_SERVER, $DB_NAME, $DB_USER, $DB_PASS);