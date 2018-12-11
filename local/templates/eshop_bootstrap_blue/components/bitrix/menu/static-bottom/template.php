<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="footer-menu-list">

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li class="footer-menu-list__item"><a href="<?=$arItem["LINK"]?>" class="footer-menu-link selected"><span class="footer-menu-link__text"><?=$arItem["TEXT"]?></span></a></li>
	<?else:?>
		<li class="footer-menu-list__item"><a href="<?=$arItem["LINK"]?>" class="footer-menu-link"><span class="footer-menu-link__text"><?=$arItem["TEXT"]?></span></a></li>
	<?endif?>

<?endforeach?>

</ul>
<?endif?>