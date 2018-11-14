<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
	return;

$arComponentParameters = array(
	"GROUPS" => array(
	),
	"PARAMETERS" => array(
		"CITY" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("CITY"),
			"TYPE" => "STRING",
			"DEFAULT" => "",
		),
	),
	"PARAMETERS" => array(
		"WARE_HOUSE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("WARE_HOUSE"),
			"TYPE" => "STRING",
			"DEFAULT" => "",
		),
	),
	"PARAMETERS" => array(
		"CITY" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("DELIVERY_ID"),
			"TYPE" => "STRING",
			"DEFAULT" => "",
		),
	),
);

?>
