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
		  <svg class="bx-data-goods__svg" width="40" height="32" viewBox="0 0 40 32" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M2.74761 21.7642H7.06055V11.0945L2.74761 21.7642V21.7642ZM12.5472 21.7642L8.23547 11.0945V21.7642H12.5472ZM27.454 21.7642H31.7658V11.0945L27.454 21.7642V21.7642ZM37.2524 21.7642L32.9431 11.0945V21.7642H37.2524ZM20.5893 0C21.8891 0 21.7667 1.05253 21.7667 2.35229L21.845 4.70336H35.2954V7.05688H33.7656L40 21.763C40 24.0394 36.2525 25.8801 32.3544 25.8801C28.4552 25.8801 24.7076 24.0394 24.7076 21.763L30.9421 7.05688H21.9209L22.6295 28.3058C27.1738 28.6387 30.5872 30.0609 30.5872 31.7633H10.5878C10.5878 30.0609 14.0012 28.6387 18.5454 28.3058L19.2528 7.05688H9.05914L15.2924 21.763C15.2924 24.0394 11.5448 25.8801 7.64801 25.8801C3.74996 25.8801 0 24.0394 0 21.763L6.23321 7.05688H4.70581V4.70336H19.3324L19.4119 2.35229C19.4119 1.05253 19.2883 0 20.5868 0L20.5893 0Z" fill="white"/>
		  </svg>
		</span>
		<span class="bx-data-goods__title"><?=GetMessage("CATALOG_COMPARE_ELEMENTS")?>Сравнить</span>
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