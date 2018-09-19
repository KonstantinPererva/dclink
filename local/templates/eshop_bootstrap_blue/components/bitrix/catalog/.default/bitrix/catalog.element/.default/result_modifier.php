<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();


$pictureList = \Expertit\SkalarShopBase\Picture::getData($arResult["PROPERTIES"]["CML2_TRAITS"]["VALUE"][3]);

$arResult["MORE_PHOTO"] = [];

if (sizeof($pictureList)) {
    foreach ($pictureList as $key => $picture) {
        $arResult["MORE_PHOTO"][] = [
            "SRC" => $pictureList[$key],
            "ID" => $key,
        ];
    }

    $arResult['MORE_PHOTO_COUNT'] = sizeof($pictureList);
}
