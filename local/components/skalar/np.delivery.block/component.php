<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;
global $DB;
$ELEMENT_ID = intval($arParams["ELEMENT_ID"]);
if($ELEMENT_ID <= 0){
	return;
}
CModule::IncludeModule("iblock");
CModule::IncludeModule("highloadblock");
CModule::IncludeModule("sale");
$hlblock_id = 3;
$hlblock = HL\HighloadBlockTable::getById($hlblock_id)->fetch();
$entity = HL\HighloadBlockTable::compileEntity($hlblock);
$entity_data_class = $entity->getDataClass();

//подключаем API новой почты
require_once($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/include/npAPI/NovaPoshtaApi2.php");
// экземпляр класса параметр - API key
$oNp = new NovaPoshtaApi2("7a8ec273e1d8857e9a42336de64c0a9a");

if(empty($arParams["DEFAULT_CITY"]) && \Bitrix\Main\Loader::includeModule('olegpro.ipgeobase') ) {
	//print_all($_SERVER["REMOTE_ADDR"]);
	$arRes = \OlegPro\IpGeoBase\IpGeoBase::getInstance()->getRecord($_SERVER["REMOTE_ADDR"]);
	if(isset($arRes['city']) && !empty($arRes['city']))
		$arResult['GEO_LOCATION'] = $arRes;
} else {
	$arResult['GEO_LOCATION']["city"] = $arParams["DEFAULT_CITY"];
}
//print_log($arResult,"/log/NP.txt");
if(!empty($arResult['GEO_LOCATION']["city"])){
	$arCity = $oNp->getCities(0, $arResult['GEO_LOCATION']["city"]);
	if(array_key_exists(0,$arCity["data"][0]))
		$cityRef = $arCity["data"][0][0]["Ref"];
	else
		$cityRef = $arCity["data"][0]["Ref"];

	$rsData = $entity_data_class::getList(array(
		"select" => array("*"),
		"order" => array("ID" => "ASC"),
		"filter" => array("UF_CITY_RU" => $arResult['GEO_LOCATION']["city"])
	));
	$arResult["NP_CITY"] = $rsData->Fetch();
	$arResult["WEEK_DAY"] = date("w", mktime(0,0,0,date("m"),date("d"),date("Y") ) );
	if( $arResult["WEEK_DAY"] < 6 && date("H") > 13 ){
		$arResult["NP_CITY"]["UF_DELIVERY_DIFF"]++;
	} else if( $arResult["WEEK_DAY"] == 6 && date("H") < 13 ) {
		$arResult["NP_CITY"]["UF_DELIVERY_DIFF"] = $arResult["NP_CITY"]["UF_DELIVERY_DIFF"] + 1;
	} else if( ($arResult["WEEK_DAY"] == 6 && date("H") > 13) || $arResult["WEEK_DAY"] == 7 ) {
		$arResult["NP_CITY"]["UF_DELIVERY_DIFF"] = $arResult["NP_CITY"]["UF_DELIVERY_DIFF"] + 2;
	}

	$arResult["DELIVERY_DAY"] = date('d.m.Y',(strtotime(date("Y").'-'.date("m").'-'.date("d").' +'.$arResult["NP_CITY"]["UF_DELIVERY_DIFF"].'days')) );

}
$db_ptype = CSaleDeliveryHandler::GetList($arOrder = Array("SORT"=>"ASC"), Array("ACTIVE"=>"Y"));
while ($ptype = $db_ptype->Fetch()){
	$arResult['DELIVERY_SYSTEMS'][] = $ptype;
}
$price = array();
$arWareHouses = array();

$arSelect = array("ID", "NAME", "IBLOCK_SECTION_ID", "CATALOG_WEIGHT");
$res = CIBlockElement::getList(array('SORT' => 'ASC', 'ID' => 'DESC'), array('ID' => $ELEMENT_ID), false, false, $arSelect);
if ($row = $res->GetNextElement()) {
	$arProduct = $row->GetFields();
	$arPrice = CCatalogProduct::GetOptimalPrice($arProduct['ID']);
	$result_price = $arPrice['RESULT_PRICE']['DISCOUNT_PRICE'];
}

if($arCity["success"]==1 && !empty($cityRef) && empty($arCity["error"])){
	$cityRow = $DB->query("SELECT id, updated, warehouses, city_ref FROM np_data WHERE city_ru = '" . strtolower($arResult['GEO_LOCATION']["city"]) . "' OR city_ua = '" . strtolower($arResult['GEO_LOCATION']["city"]) . "'")->fetch();//print_r($cityRow);exit;
	if(!empty($cityRow)){
		if ((strtotime($cityRow['updated']) < time() - 3600 * 24 * 30)&&date("H")>0&&date("H")<7) {
			$arWareHouses = $oNp->getWarehouses($cityRow['city_ref']);
			$DB->query("UPDATE np_data SET warehouses = '" . addslashes(json_encode($arWareHouses,1)) . "', updated = NOW() WHERE id = " . $cityRow['id']);
		} else {
			$arWareHouses = json_decode($cityRow['warehouses'],1);
		}
	} else {
		$arWareHouses = $oNp->getWarehouses($cityRef);
		$s .= "('" . $arCurCity["DescriptionRu"]. "', ";
		$s .= "'', ";
		$s .= "NOW(), ";
		$s .= "'" . addslashes(json_encode($arWareHouses,1)) . "', ";
		$s .= "'" . $arCurCity['Ref'] . "'),";
		if ($s != '') {
			$sql = 'INSERT INTO np_data(city_ru, city_ua, updated, warehouses, city_ref) VALUES';
			//$DB->Query('TRUNCATE TABLE np_data');
			$DB->Query($sql . substr($s, 0, -1) . ';');
		}
	}
	$quantity = 1;
	$weight = 0.1;
	if(floatval($weight) < 0.1) $weight=0.1;
	$totalWeight = 0;
	$totalPrice = 0;
	$totalVolume = 0;

	$totalPrice = $quantity * $result_price;
	$totalWeight = $quantity * $weight;
	//$totalVolume = ($width * $height * $length/1000) * $quantity;

	$type="WarehouseWarehouse";
	// расчет предварительной цены доставки, первый параметр ID Харькова, как города отправки,
	// затем город получатель, вес в кг, оценочная стоимость посылки

	// получаем ref отправителя
	$sender = $oNp->getCounterparties("Sender");
	$senderStr = $sender["data"][0]["Ref"];//$sender["data"][2]["Ref"]; //"0efc4c79-1355-11e6-971e-005056887b8d"

	$price = $oNp->getDocumentPrice(
		"db5c88e0-391c-11dd-90d9-001a92567626",
		$cityRef,
		$type,
		//$totalWeight > $totalVolume ? $totalWeight : $totalVolume,
		$totalWeight,
		$totalPrice,
		$senderStr
	);

	$arResult["WW"]["WareHouses"] = (isset($arWareHouses["data"])) ? $arWareHouses["data"] : "empty";
	$arResult["WW"]["cost"] = !empty($price["data"]) ? $price["data"][0]["Cost"] : 0;

	unset($price);

	$type="DoorsDoors";
	// расчет предварительной цены доставки, первый параметр ID Харькова, как города отправки,
	// затем город получатель, вес в кг, оценочная стоимость посылки

	// получаем ref отправителя
	$sender = $oNp->getCounterparties("Sender");
	$senderStr = $sender["data"][0]["Ref"];//$sender["data"][2]["Ref"]; //"0efc4c79-1355-11e6-971e-005056887b8d"

	$price = $oNp->getDocumentPrice(
		"db5c88e0-391c-11dd-90d9-001a92567626",
		$cityRef,
		$type,
		//$totalWeight > $totalVolume ? $totalWeight : $totalVolume,
		$totalWeight,
		$totalPrice,
		$senderStr
	);

	$arResult["DD"]["WareHouses"] = (isset($arWareHouses["data"])) ? $arWareHouses["data"] : "empty";
	$arResult["DD"]["cost"] = !empty($price["data"]) ? $price["data"][0]["Cost"] : 0;
}

foreach($arResult['DELIVERY_SYSTEMS'][0]["PROFILES"] as $key=>$arDel){
	if($key == "door")
		$arResult['DELIVERY_SYSTEMS'][0]["PROFILES"][$key]["NP"] = $arResult["DD"];
	if($key == "ware")
		$arResult['DELIVERY_SYSTEMS'][0]["PROFILES"][$key]["NP"] = $arResult["WW"];
}
//print_log($arResult,"/log/NP.txt");
/*if(!empty($_REQUEST["NP_AJAX"]))
	echo json_encode($arResult);
else*/
	$this->IncludeComponentTemplate();


?>
