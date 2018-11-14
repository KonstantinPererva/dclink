<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;
global $DB;

// Закончил на корректной записи суммы доставки в заказ

if(empty($arParams["CITY"]) || empty($arParams["DELIVERY_ID"]) ) {
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

//print_log($arResult,"/log/NP.txt");

$arCity = $oNp->getCities(0, $arParams["CITY"]);
if(array_key_exists(0,$arCity["data"][0])){
	$cityRef = $arCity["data"][0][0]["Ref"];
	$arCurCity = $arCity["data"][0][0];
} else{
	$cityRef = $arCity["data"][0]["Ref"];
	$arCurCity = $arCity["data"][0];
}

$rsData = $entity_data_class::getList(array(
	"select" => array("*"),
	"order" => array("ID" => "ASC"),
	"filter" => array("UF_CITY_RU" => $arParams["CITY"])
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


$db_ptype = CSaleDeliveryHandler::GetList($arOrder = Array("SORT"=>"ASC"), Array("ACTIVE"=>"Y"/*, "ID"=>$arParams["DELIVERY_ID"]*/));
while ($ptype = $db_ptype->Fetch()){
	// оставим выбранный способ доставки
	if($arParams["DELIVERY_ID"] == 5)
		unset($ptype["PROFILES"]["door"]);
	if($arParams["DELIVERY_ID"] == 6)
		unset($ptype["PROFILES"]["ware"]);
	$arResult['DELIVERY_SYSTEMS'][] = $ptype;
}
$price = array();
$arWareHouses = array();

$arBasketItems = array();

$dbBasketItems = CSaleBasket::GetList(
	array(
		"NAME" => "ASC",
		"ID" => "ASC"
	),
	array(
		"FUSER_ID" => CSaleBasket::GetBasketUserID(),
		"LID" => SITE_ID,
		"ORDER_ID" => "NULL",
		"CAN_BUY" => "Y"
	),
	false,
	false,
	array("ID", "CALLBACK_FUNC", "MODULE",
		"PRODUCT_ID", "QUANTITY", "DELAY",
		"CAN_BUY", "PRICE", "WEIGHT", "DIMENSIONS")
);

$totalWeight = 0;
$totalPrice = 0;
$totalVolume = 0;
$cnt = 0;

while ($arItems = $dbBasketItems->Fetch()){
	// получаем массово-габаритные характеристики из реквизитов
	$cnt++;

	/*$DBprod = CIBlockElement::GetProperty(
		2, // ID каталога
		$arItems["PRODUCT_ID"],
		Array("sort" => "asc"),
		Array("CODE"=>"CML2_TRAITS") //filter выбор множественного свойства "реквизиты"
	);
	while ($props = $DBprod->Fetch()){

		if($props["DESCRIPTION"]=="Вес")
			$arItems["mass_dim"]["WEIGHT"] = $props["VALUE"];
		if($props["DESCRIPTION"]=="Длина")
			$arItems["mass_dim"]["LENGTH"] = $props["VALUE"];
		if($props["DESCRIPTION"]=="Ширина")
			$arItems["mass_dim"]["WIDTH"] = $props["VALUE"];
		if($props["DESCRIPTION"]=="Высота")
			$arItems["mass_dim"]["HEIGHT"] = $props["VALUE"];
		//print_all($props);

	}*/
	//if(floatval($arItems["mass_dim"]["WEIGHT"]) < 0.1) $arItems["mass_dim"]["WEIGHT"]=0.1;
	$arItems["mass_dim"]["WEIGHT"]=0.1;
	$arBasketItems[] = $arItems;
	//print_log($arItems["QUANTITY"]." * ".$arItems["PRICE"]." = ".($arItems["QUANTITY"]*$arItems["PRICE"]));
	$totalPrice+=($arItems["QUANTITY"]*$arItems["PRICE"]);
	$totalWeight+=($arItems["QUANTITY"]*$arItems["mass_dim"]["WEIGHT"]);
	//$totalVolume+=($arItems["mass_dim"]["WIDTH"]*$arItems["mass_dim"]["HEIGHT"]*$arItems["mass_dim"]["LENGTH"]/1000)*$arItems["QUANTITY"];
	$totalVolume = 0;
	//print_all($arItems);
}
//print_log($totalPrice);

/*$arSelect = array("ID", "NAME", "IBLOCK_SECTION_ID", "CATALOG_WEIGHT");
$res = CIBlockElement::getList(array('SORT' => 'ASC', 'ID' => 'DESC'), array('ID' => $ELEMENT_ID), false, false, $arSelect);
if ($row = $res->GetNextElement()) {
	$arProduct = $row->GetFields();
	$arPrice = CCatalogProduct::GetOptimalPrice($arProduct['ID']);
	$result_price = $arPrice['RESULT_PRICE']['DISCOUNT_PRICE'];
}*/

if($arCity["success"]==1 && !empty($cityRef) && empty($arCity["error"])){
	$cityRow = $DB->query("SELECT id, updated, warehouses, city_ref FROM np_data WHERE city_ru = '" . strtolower($arParams["CITY"]) . "' OR city_ua = '" . strtolower($arParams["CITY"]) . "'")->fetch();//print_r($cityRow);exit;
	if(!empty($cityRow)){
		if ((strtotime($cityRow['updated']) < time() - 3600 * 24 * 30)&&date("H")>0&&date("H")<7) {
			$arWareHouses = $oNp->getWarehouses($cityRow['city_ref']);
			$res = $DB->query("UPDATE np_data SET warehouses = '" . addslashes(json_encode($arWareHouses,1)) . "', updated = NOW() WHERE id = " . $cityRow['id']);
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
	//$quantity = 1;
	//$weight = 0.1;
	//if(floatval($weight) < 0.1) $weight=0.1;
	//$totalWeight = 0;
	//$totalPrice = 0;
	//$totalVolume = 0;

	//$totalPrice = $quantity * $result_price;
	//$totalWeight = $quantity * $weight;
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

	print_log("WarehouseWarehouse");
	print_log($totalWeight);
	print_log($totalPrice);
	print_log($price);

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

	print_log("DoorsDoors");
	print_log($totalWeight);
	print_log($totalPrice);
	print_log($price);

	$arResult["DD"]["WareHouses"] = (isset($arWareHouses["data"])) ? $arWareHouses["data"] : "empty";
	$arResult["DD"]["cost"] = !empty($price["data"]) ? $price["data"][0]["Cost"] : 0;

	unset($price);
}

foreach($arResult['DELIVERY_SYSTEMS'][0]["PROFILES"] as $key=>$arDel){
	if($key == "door"){
		$arResult['DELIVERY_SYSTEMS'][0]["PROFILES"][$key]["NP"] = $arResult["DD"];
		$arResult["COST"] = $arResult["DD"]["cost"];
	}
	if($key == "ware"){
		$arResult['DELIVERY_SYSTEMS'][0]["PROFILES"][$key]["NP"] = $arResult["WW"];
		$arResult["COST"] = $arResult["WW"]["cost"];
	}
}
//print_log($arResult,"/log/NP.txt");
/*if(!empty($_REQUEST["NP_AJAX"]))
	echo json_encode($arResult);
else*/
	if($arParams["AJAX"] == "Y")
	$this->IncludeComponentTemplate();

return $arResult["COST"];
?>
