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


$result = true;
$errors = array();
$data = array();
//echo "<pre>";
//print_r($_REQUEST['filter']['=PHRASE']);exit;
if (isset($_REQUEST['filter']['=PHRASE'])) {
	global $DB;
	$phrase = $_REQUEST['filter']['=PHRASE'];
	$cities = $DB->query("SELECT id, city_ru FROM np_data WHERE city_ru LIKE '" . addslashes(strtolower($phrase)) . "%' OR city_ua LIKE '" . addslashes(strtolower($phrase)). "%'");
	while ($row = $cities->fetch()){
		$data['ITEMS'][] = ["VALUE" => $row['id'],"DISPLAY" => $row['city_ru']];
	}
}

echo(json_encode(array(
	'result' => $result,
	'errors' => $errors,
	'data' => $data
)));
