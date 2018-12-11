<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();


/*$pictureList = \Expertit\SkalarShopBase\Picture::getData($arResult["PROPERTIES"]["CML2_TRAITS"]["VALUE"][3]);

$arResult["MORE_PHOTO"] = [];

if (sizeof($pictureList)) {
    foreach ($pictureList as $key => $picture) {
        $arResult["MORE_PHOTO"][] = [
            "SRC" => $pictureList[$key],
            "ID" => $key,
        ];
    }

    $arResult['MORE_PHOTO_COUNT'] = sizeof($pictureList);
}*/

$rsStore = \Bitrix\Catalog\StoreProductTable::getList(array(
    'filter' => array('=PRODUCT_ID'=>$arResult["ID"],'STORE.ACTIVE'=>'Y'),
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

$key = array_search("Код SQL", $arResult["PROPERTIES"]["CML2_TRAITS"]["DESCRIPTION"]);

$arResult["SQL_CODE"] = $arResult["PROPERTIES"]["CML2_TRAITS"]["VALUE"][$key];

if(!empty($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"])){
	foreach($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $key=>$arPhoto){
		$arResult["MORE_PHOTO"][] = [
			"SRC" => CFile::GetPath($arPhoto),
			"ID" => $key
		];
	}
	$arResult['MORE_PHOTO_COUNT'] = sizeof($arResult["MORE_PHOTO"]);
}