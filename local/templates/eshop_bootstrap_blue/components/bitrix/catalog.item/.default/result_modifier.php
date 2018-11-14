<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

//print_r($arResult);

$rsStore = \Bitrix\Catalog\StoreProductTable::getList(array(
    'filter' => array('=PRODUCT_ID'=>$arResult["ITEM"]["ID"],'STORE.ACTIVE'=>'Y'),
    'select' => array('AMOUNT','STORE_ID','STORE_TITLE' => 'STORE.TITLE'),
));
$store_count = 0;
while($arStore=$rsStore->fetch())
{
    if($arStore["STORE_ID"] !== "6"){
        $store_count += intval($arStore["AMOUNT"]);
    }else{
        $arResult["STORE_COUNT_ORDER"] = $arStore;
    }
}
//print_r($store_count);
$arResult["STORE_COUNT"] = $store_count;