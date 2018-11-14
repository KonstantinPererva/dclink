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
$APPLICATION->IncludeComponent(
	"skalar:np.delivery.block",
	"",
	Array(
		"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
		"DEFAULT_CITY" => $_REQUEST["CITY"]
	),
	false
);?>
