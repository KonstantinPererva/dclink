<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');
global $APPLICATION;
$APPLICATION->RestartBuffer();
if (!defined('PUBLIC_AJAX_MODE')) {
	define('PUBLIC_AJAX_MODE', true);
}
define("NO_KEEP_STATISTIC", true);
define("NO_AGENT_STATISTIC", true);
define("NO_AGENT_CHECK", true);
//define("NOT_CHECK_PERMISSIONS", true);
//print_log($_POST, "/log/np_warehouses.txt");
$APPLICATION->IncludeComponent(
	"skalar:np.store",
	"",
	Array(
		"CITY" => $_POST["city"],
		"WARE_HOUSE"=>$_POST["warehouses"],
		"DELIVERY_ID"=> $_POST["delivery_id"],
		"AJAX" => "Y"
	),
	false
);