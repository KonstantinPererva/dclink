<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult["STORES"] as $key=>$store){
	if($store["AMOUNT"] > 0 && $store["ID"] !=6 ){
		$store_count += intval($store["AMOUNT"]);
	}else{
		unset($arResult["STORES"][$key]);
		//$arResult["STORE_COUNT_ORDER"] = $store;
	}
}
//print_r($store_count);

$arResult["STORE_COUNT"] = $store_count;

//print_log($arResult);