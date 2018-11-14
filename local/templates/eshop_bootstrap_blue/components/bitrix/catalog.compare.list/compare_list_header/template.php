<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$itemCount = count($arResult);
$needReload = (isset($_REQUEST["compare_list_reload"]) && $_REQUEST["compare_list_reload"] == "Y");
$idCompareCount = 'compareList'.$this->randString();
$obCompare = 'ob'.$idCompareCount;

/*if ($arParams['POSITION_FIXED'] == 'Y')
{
	$mainClass .= ' fix '.($arParams['POSITION'][0] == 'bottom' ? 'bottom' : 'top').' '.($arParams['POSITION'][1] == 'right' ? 'right' : 'left');
}*/

?>


<?
if ($needReload)
{
	$APPLICATION->RestartBuffer();
}
$frame = $this->createFrame($idCompareCount)->begin('');
	?>
	
	 <a href="<?=$arParams["COMPARE_URL"]; ?>" class="bx-data-goods" data-block="header-compare-block">
		<span class="bx-data-goods__num" data-block="count">
			<?if($itemCount > 0):?>
				<?=$itemCount; ?>
			<?else:?>
				0
			<?endif;?>
		</span>

		<span class="bx-data-goods__ico">
		  <svg class="bx-data-goods__svg" width="27" height="28" viewBox="0 0 55 56" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M44.4732 33.3906C41.4912 33.3906 38.9856 31.3458 38.2742 28.5888H50.6857C50.4141 29.6732 49.8611 30.6717 49.0502 31.489C47.8329 32.7165 46.2072 33.3906 44.4732 33.3906H44.4732ZM50.6031 25.4087H38.3318C39.1993 22.13 42.0372 16.1357 44.4565 11.5023C46.8763 16.1324 49.7189 22.1237 50.6031 25.4087ZM9.58758 33.3906C6.61699 33.3906 4.1191 31.3618 3.39688 28.6206H15.7928C15.5184 29.6922 14.9682 30.678 14.1646 31.489C12.9473 32.7165 11.3219 33.3906 9.58755 33.3906L9.58758 33.3906ZM9.57128 11.5023C11.9983 16.1452 14.8518 22.1618 15.7263 25.4405H3.43798C4.29586 22.1682 7.14427 16.1484 9.57128 11.5023V11.5023ZM45.9722 7.594C45.8099 6.888 45.181 6.36012 44.426 6.36012H28.6209V1.59003C28.6209 0.712315 27.9088 3.05176e-05 27.0306 3.05176e-05C26.1527 3.05176e-05 25.4407 0.712438 25.4407 1.59003V6.36012H9.54085C8.73264 6.36012 8.07255 6.9644 7.97144 7.74662C6.52573 10.402 -6.10352e-05 22.6357 -6.10352e-05 26.9987L0.000551893 27.0242L-6.10352e-05 27.0305L0.000950297 27.0433C0.0234448 32.2999 4.31496 36.5707 9.58746 36.5707C12.1758 36.5707 14.6031 35.5626 16.4221 33.7278C18.217 31.9215 19.1948 29.5269 19.1755 26.9892C19.1469 23.2876 14.4362 13.9128 12.1309 9.54023H25.4408V52.471H15.9015C15.0236 52.471 14.3115 53.1834 14.3115 54.0611C14.3115 54.9387 15.0236 55.6511 15.9015 55.6511L38.1614 55.651C39.0394 55.651 39.7513 54.9387 39.7513 54.0611C39.7514 53.1833 39.0394 52.471 38.1613 52.471H28.6209V9.54023H41.8967C39.5918 13.9128 34.8852 23.2939 34.8852 26.9987C34.8853 32.2776 39.1862 36.5707 44.4731 36.5707C47.0611 36.5707 49.4883 35.5626 51.3074 33.7278C53.1024 31.9215 54.0801 29.5269 54.0607 26.9892C54.0264 22.5403 47.2267 9.89003 45.9722 7.59403V7.594Z" fill="white"/>
      </svg>
		</span>
<!--		<span class="bx-data-goods__title">--><?//=GetMessage("CATALOG_COMPARE_ELEMENTS")?><!--Сравнить</span>-->
	</a>
	
	<?
	
$frame->end();
if ($needReload)
{
	die();
}
$currentPath = CHTTP::urlDeleteParams(
	$APPLICATION->GetCurPageParam(),
	array(
		$arParams['PRODUCT_ID_VARIABLE'],
		$arParams['ACTION_VARIABLE'],
		'ajax_action'
	),
	array("delete_system_params" => true)
);

$jsParams = array(
	'VISUAL' => array(
		'ID' => $idCompareCount,
	),
	'AJAX' => array(
		'url' => $currentPath,
		'params' => array(
			'ajax_action' => 'Y'
		),
		'reload' => array(
			'compare_list_reload' => 'Y'
		),
		'templates' => array(
			'delete' => (strpos($currentPath, '?') === false ? '?' : '&').$arParams['ACTION_VARIABLE'].'=DELETE_FROM_COMPARE_LIST&'.$arParams['PRODUCT_ID_VARIABLE'].'='
		)
	),
	/*'POSITION' => array(
		'fixed' => $arParams['POSITION_FIXED'] == 'Y',
		'align' => array(
			'vertical' => $arParams['POSITION'][0],
			'horizontal' => $arParams['POSITION'][1]
		)
	)*/
);
?>

<script type="text/javascript">
var <?=$obCompare; ?> = new JCCatalogCompareList(<? echo CUtil::PhpToJSObject($jsParams, false, true); ?>)
</script>