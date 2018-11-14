<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
	return;

$arComponentParameters = array(
	"GROUPS" => array(
	),
	"PARAMETERS" => array(
		"ELEMENT_ID" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("ELEMENT_ID"),
			"TYPE" => "STRING",
			"DEFAULT" => "",
		),
	),
	"PARAMETERS" => array(
		"DEFAULT_CITY" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("DEFAULT_CITY"),
			"TYPE" => "STRING",
			"DEFAULT" => "",
		),
	),
);

?>
