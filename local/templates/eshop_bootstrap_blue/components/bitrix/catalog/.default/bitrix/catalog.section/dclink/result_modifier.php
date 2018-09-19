<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();


foreach ($arResult["ITEMS"] as &$arItem) {
    $picture = \Expertit\SkalarShopBase\Picture::getData($arItem["PROPERTIES"]["CML2_TRAITS"]["VALUE"][3]);
    if ($picture && $picture[0]) {
        $arItem["PREVIEW_PICTURE"]["SRC"] = $picture[0];
        $arItem["DETAIL_PICTURE"]["SRC"] = $picture[1];
    }
}