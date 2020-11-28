<?php

/*
THE AIM OF THE DIRECTORIES IS TO BE ABLE TO 
CALL CODE QUICKER VIA A DIRECTORY VARIBLE.

Jarryd Patel 14th May 2020
https://github.com/JarrydLeePatel
*/


ob_start();
//15TH MAY OB_START()- turns on output buffering. In other words, it creates the buffer (invisible holding cell) that will store all output after it is called

session_start();
//15th MAY Sessions - session_start() creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie

//session_destroy();

//*******************************************************************//
//DIRECTORIES
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);


//DIRECTORY TO CALL THE FRONT-END FILES//
defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");


defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS . "templates/back");

defined("TEMPLATE_STATIC") ? null : define("TEMPLATE_STATIC", __DIR__ . DS . "templates/static");

//CREATING DB DIRECTORY VARIBLES TO BE CALLED IN CODE LATER//
//LOCAL HOST
defined("DB_HOST") ? null : define("DB_HOST", "localhost");
//ROOT
defined("DB_USER") ? null : define("DB_USER", "root");
//PASSWORD
defined("DB_PASS") ? null : define("DB_PASS", "");
//DATABASE NAME
defined("DB_NAME") ? null : define("DB_NAME","ecom_db");


//CONNECTION TO THE DB
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


require_once("functions.php");
require_once("cart.php");
?>
