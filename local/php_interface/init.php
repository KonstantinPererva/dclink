<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 07.09.18
 * Time: 15:56
 */

require($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/lib/Picture.php");

if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/functions.php")){
	require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/functions.php";
}

if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/lib/ElementPropertyTable.php")){
	require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/lib/ElementPropertyTable.php";
}

if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/event_handlers.php")){
	require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/event_handlers.php";
}

if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/order_event_handlers.php")){
	require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/order_event_handlers.php";
}

if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/pictures_agent.php")){
	require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/pictures_agent.php";
}