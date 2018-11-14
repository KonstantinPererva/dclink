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
?>
<div class="colm np-warehouses-block" data-city="<?=$arParams['CITY']?>" data-delivery-date="<?=$arResult["DELIVERY_DAY"]?>" data-delivery-price="<?=$arResult['COST']?>" >
	<?//$frame = $this->createFrame()->begin();?>
	<?/*?>
	<ul>
		<?foreach($arResult['DELIVERY_SYSTEMS'][0]["PROFILES"] as $key=>$arDel){
			?>
			<li class="<?=$key?>">
				<span class="delivery-name"><?=$arDel['TITLE']?></span>
				<span class="rte <?=$key?>"><?=CurrencyFormat($arDel['NP']["cost"], $arResult['DELIVERY_SYSTEMS'][0]['CURRENCY'])?></span>
				<?if(!empty($arResult["DELIVERY_DAY"])):?>
					<span class="delivery-name delivery-day">Ориентировочная дата доставки</span>
					<span class="rte delivery-day-val"><?=$arResult["DELIVERY_DAY"]?></span>
				<?endif;?>
			</li>
		<?}?>
	</ul>
	<p class="gr">Заказ, оформленный до 13:00, отправляется в этот же день. </p>
	<?*/?>
	<?if(!empty($arResult['DELIVERY_SYSTEMS'][0]["PROFILES"]["ware"])):?>
		<select name="variants" id="warehouse-list" style="height: 40px; font-size: 14px; width: 100%;">
			<?foreach($arResult['DELIVERY_SYSTEMS'][0]["PROFILES"]["ware"]["NP"]["WareHouses"] as $key=>$arWarehouse):?>
				<option data-wh-ref="<?=$arWarehouse['Ref']?>" <?=($arWarehouse['Ref'] == $arParams["WARE_HOUSE"])?'selected': ''?> ><?=$arWarehouse['DescriptionRu']?></option>
			<?endforeach;?>
		</select>
	<?endif;?>
	<?//$frame->end();?>
</div>
