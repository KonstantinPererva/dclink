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
<div class="colm delivery" data-product-id="<?=$arParams['ELEMENT_ID']?>" >
	<?$frame = $this->createFrame()->begin();?>
	<strong class="strong-h2">Доставка</strong>
	<?if(!empty($arResult['GEO_LOCATION']['city'])){?>
		<p>Выберите город: <a class="city-click" role="button" data-toggle="modal" data-target="#delivery-cities"><?=$arResult['GEO_LOCATION']['city']?></a></p>
	<?}else{?>
		<p>Город не найден. Проверьте написание или введите ближайший к вам!</p>
	<?}?>
	<ul>
		<li class="<?=$key?>">
			<span class="delivery-name">Самовывоз</span>
			<span class="rte">0 грн. </span>
		</li>
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
	<?$frame->end();?>
</div>

<?if(empty($_REQUEST["NP_AJAX"])):?>
	<div class="modal fade" id="delivery-cities" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="">Выберите свой город</h4>
				</div>
				<div class="modal-align popup-box ">
					<p class="delive">Мы доставляем заказы по всей Украине!</p>
					<div class="city-box">
						<ul class="city">
							<li><span class="city-element" >Киев</span></li>
							<li><span class="city-element" >Харьков</span></li>
						</ul>
						<ul class="city">
							<li><span class="city-element" >Одесса</span></li>
							<li><span class="city-element" >Запорожье</span></li>
						</ul>
						<ul class="city">
							<li><span class="city-element" >Днепр</span></li>
							<li><span class="city-element" >Львов</span></li>
						</ul>
						</div>
					<p>Или введите другой населенный пункт Украины</p>
					<form class="search-form step-two-form" action="#">
						<fieldset>
							<input type="search" id="city_select" value="<?=isset($arResult['GEO_LOCATION']["city"]) ? $arResult['GEO_LOCATION']["city"] : "" ?>" autocomplete="off">
							<select name="variants" id="loc_var" style="display: none; height: 40px; font-size: 14px;">
							</select>

							<input type="hidden" name = "loc_id" value="">
						</fieldset>
					</form>
					<span>Например: <span>Полтава</span></span>
					<p>Выбор города поможет предоставить актуальную информацию
						о наличии товара, его цены и способов доставки в вашем городе!
						Это поможет сохранить больше свободного времени для вас!
					</p>
				</div>
			</div>
		</div>
	</div>
<?endif;?>