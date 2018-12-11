<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

$this->setFrameMode(true);

if (empty($arResult["ALL_ITEMS"]))
	return;

CUtil::InitJSCore();

//print_log($arResult);

if (file_exists($_SERVER["DOCUMENT_ROOT"].$this->GetFolder().'/themes/'.$arParams["MENU_THEME"].'/colors.css'))
	$APPLICATION->SetAdditionalCSS($this->GetFolder().'/themes/'.$arParams["MENU_THEME"].'/colors.css');

$menuBlockId = "catalog_menu_".$this->randString();
?>
<div class="bx-top-nav bx-<?=$arParams["MENU_THEME"]?>" id="<?=$menuBlockId?>">
	<nav class="bx-top-nav-container" id="cont_<?=$menuBlockId?>">
		<ul class="bx-nav-list-1-lvl" id="ul_<?=$menuBlockId?>">
		<?foreach($arResult["MENU_STRUCTURE"] as $itemID => $arColumns):?>     <!-- first level-->
			<?$existPictureDescColomn = ($arResult["ALL_ITEMS"][$itemID]["PARAMS"]["picture_src"] || $arResult["ALL_ITEMS"][$itemID]["PARAMS"]["description"]) ? true : false;?>
			<li
				class="bx-nav-1-lvl bx-nav-list-<?=($existPictureDescColomn) ? count($arColumns)+1 : count($arColumns)?>-col <?if($arResult["ALL_ITEMS"][$itemID]["SELECTED"]):?>bx-active<?endif?><?if (is_array($arColumns) && count($arColumns) > 0):?> bx-nav-parent<?endif?>"
				onmouseover="BX.CatalogMenu.itemOver(this);"
				onmouseout="BX.CatalogMenu.itemOut(this)"
				<?if (is_array($arColumns) && count($arColumns) > 0):?>
					data-role="bx-menu-item"
				<?endif?>
				onclick="if (BX.hasClass(document.documentElement, 'bx-touch')) obj_<?=$menuBlockId?>.clickInMobile(this, event);"
			>
				<a
          class="bx-nav-1-lvl-link"
					href="<?=$arResult["ALL_ITEMS"][$itemID]["LINK"]?>"
					<?if (is_array($arColumns) && count($arColumns) > 0 && $existPictureDescColomn):?>
						onmouseover="window.obj_<?=$menuBlockId?> && obj_<?=$menuBlockId?>.changeSectionPicure(this, '<?=$itemID?>');"
					<?endif?>
				>
          <span class="bx-nav-1-lvl-link__ico">
          	<?if(!empty($arResult["ALL_ITEMS"][$itemID]["PARAMS"]["picture_svg"])):?>
          		<?=$arResult["ALL_ITEMS"][$itemID]["PARAMS"]["picture_svg"]?>
          	<?else:?>
	            <svg class="bx-nav-1-lvl-svg" width="20" height="11" viewBox="0 0 20 11">
	              <path d="M18.3884 3.37149V7.1843H19.0082V3.37149H18.3884Z"/>
	              <path d="M2.57169 10.3057L1.13285 10.6543L0.000671387 5.97864L1.43951 5.63001L2.57169 10.3062V10.3057ZM12.1066 7.16971C12.1066 6.88404 12.1066 6.59953 12.1066 6.31386C10.6381 5.96698 8.8605 5.93841 7.35228 6.10807L7.14648 5.73145L8.95727 5.71279L8.10785 4.80856C5.69831 4.86978 3.38847 5.28779 2.30993 6.2888C2.44693 7.2898 2.58394 8.29023 2.72094 9.29065C3.8059 9.77687 5.10365 10.2025 6.95642 10.3599C6.95642 10.3599 7.06603 10.1657 7.2281 9.87249C7.49453 9.88181 7.76446 9.86666 8.03963 9.80836C8.09444 9.56816 8.14866 9.32855 8.20404 9.08835C8.06412 8.99741 7.92012 8.92628 7.77262 8.87031L7.85891 8.70707C8.18597 8.73272 8.51711 8.72515 8.85642 8.65402C8.91122 8.41382 8.96602 8.17421 9.0214 7.9346C8.82085 7.80343 8.61097 7.71423 8.39468 7.65185C8.44424 7.54749 8.48621 7.45421 8.51944 7.37317C9.71575 7.50435 10.9109 7.45129 12.1072 7.16854L12.1066 7.16971Z"/>
	              <path d="M4.83548 1.89766H4.50666V3.75859H4.83548V1.89766ZM14.8234 6.32553C14.8234 5.76702 14.5966 5.26156 14.2311 4.89602C13.8655 4.53048 13.3595 4.3037 12.8016 4.3037C12.2436 4.3037 11.7376 4.53048 11.3721 4.89602C11.3073 4.96074 11.2473 5.02953 11.1919 5.1024C11.5149 5.14496 11.832 5.19918 12.141 5.26564C12.3322 5.14555 12.5596 5.07675 12.8021 5.07675C13.1473 5.07675 13.4592 5.21667 13.6854 5.44287C13.9116 5.6685 14.0515 5.98098 14.0515 6.32612C14.0515 6.67125 13.9116 6.98316 13.6854 7.20936C13.5356 7.35977 13.3472 7.47171 13.1374 7.53001C12.9158 7.89788 12.5153 8.13924 12.109 8.22611C12.3253 8.3054 12.559 8.34795 12.8021 8.34795C13.3607 8.34795 13.8661 8.12117 14.2317 7.75621C14.5972 7.39067 14.824 6.88463 14.824 6.3267L14.8234 6.32553ZM19.7748 1.45983V9.41426C19.7748 10.217 19.1178 10.8735 18.3156 10.8735H7.91604C8.02856 10.8595 8.14108 10.8409 8.25301 10.817L8.89781 10.6811L9.04472 10.0381C9.07446 9.90806 9.10419 9.77863 9.13334 9.64921L9.28842 9.61656H11.3481C10.9389 9.43583 10.5704 9.18106 10.2591 8.86916C10.1472 8.7578 10.0428 8.63887 9.94662 8.51353L9.95595 8.47038C10.2719 8.46455 10.5868 8.44648 10.901 8.41442C11.403 8.8709 12.0699 9.14958 12.8021 9.14958C13.5822 9.14958 14.2882 8.83359 14.7995 8.32289C15.3102 7.8116 15.6268 7.105 15.6268 6.32553C15.6268 5.54548 15.3102 4.83947 14.7995 4.32818C14.2882 3.81689 13.5822 3.50091 12.8021 3.50091C12.0221 3.50091 11.3161 3.81689 10.8048 4.32818C10.6042 4.52873 10.4334 4.7596 10.3005 5.01262C10.0965 4.99863 9.89124 4.98872 9.68544 4.98289L9.53328 4.82082C9.71226 4.43196 9.95886 4.08099 10.2585 3.78133C10.9092 3.1307 11.8087 2.72785 12.8021 2.72785C13.7956 2.72785 14.6946 3.1307 15.3458 3.78133C15.9964 4.43196 16.3992 5.33152 16.3992 6.32495C16.3992 7.3178 15.9964 8.21736 15.3458 8.86857C15.0339 9.18048 14.6648 9.43525 14.2561 9.61598H17.4218V1.22372H5.81899V3.94923C4.95557 4.06467 4.07116 4.25181 3.28295 4.55147V1.45925C3.28295 0.656459 3.93999 -0.000579834 4.74278 -0.000579834H18.3161C19.1189 -0.000579834 19.7754 0.655876 19.7754 1.45925L19.7748 1.45983Z"/>
	            </svg>
            <?endif;?>
          </span>

					<span class="bx-nav-1-lvl-link__text">
						<?=$arResult["ALL_ITEMS"][$itemID]["TEXT"]?>
						<?if (is_array($arColumns) && count($arColumns) > 0):?><?endif?>
					</span>
				</a>
			<?if (is_array($arColumns) && count($arColumns) > 0):?>
				<span class="bx-nav-parent-arrow" onclick="obj_<?=$menuBlockId?>.toggleInMobile(this)"><i class="fa fa-angle-left"></i></span> <!-- for mobile -->
				<div class="bx-nav-2-lvl-container">
					<?foreach($arColumns as $key=>$arRow):?>
						<ul class="bx-nav-list-2-lvl">
						<?foreach($arRow as $itemIdLevel_2=>$arLevel_3):?>  <!-- second level-->
							<li class="bx-nav-2-lvl">
								<a
									href="<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"]?>"
									<?if ($existPictureDescColomn):?>
										onmouseover="window.obj_<?=$menuBlockId?> && obj_<?=$menuBlockId?>.changeSectionPicure(this, '<?=$itemIdLevel_2?>');"
									<?endif?>
									data-picture="<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["PARAMS"]["picture_src"]?>"
									<?if($arResult["ALL_ITEMS"][$itemIdLevel_2]["SELECTED"]):?>class="bx-active"<?endif?>
								>
									<span><?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["TEXT"]?></span>
								</a>
							<?if (is_array($arLevel_3) && count($arLevel_3) > 0):?>
								<ul class="bx-nav-list-3-lvl">
								<?foreach($arLevel_3 as $itemIdLevel_3):?>	<!-- third level-->
									<li class="bx-nav-3-lvl">
										<a
											href="<?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["LINK"]?>"
											<?if ($existPictureDescColomn):?>
												onmouseover="window.obj_<?=$menuBlockId?> && obj_<?=$menuBlockId?>.changeSectionPicure(this, '<?=$itemIdLevel_3?>');return false;"
											<?endif?>
											data-picture="<?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["PARAMS"]["picture_src"]?>"
											<?if($arResult["ALL_ITEMS"][$itemIdLevel_3]["SELECTED"]):?>class="bx-active"<?endif?>
										>
											<span><?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["TEXT"]?></span>
										</a>
									</li>
								<?endforeach;?>
								</ul>
							<?endif?>
							</li>
						<?endforeach;?>
						</ul>
					<?endforeach;?>
					<?if ($existPictureDescColomn):?>
						<div class="bx-nav-list-2-lvl bx-nav-catinfo dbg" data-role="desc-img-block">
							<a href="<?=$arResult["ALL_ITEMS"][$itemID]["LINK"]?>">
								<img src="<?=$arResult["ALL_ITEMS"][$itemID]["PARAMS"]["picture_src"]?>" alt="">
							</a>
							<p><?=$arResult["ALL_ITEMS"][$itemID]["PARAMS"]["description"]?></p>
						</div>
						<div class="bx-nav-catinfo-back"></div>
					<?endif?>
				</div>
			<?endif?>
			</li>
		<?endforeach;?>
		</ul>
		<div style="clear: both;"></div>
	</nav>
</div>

<script>
	BX.ready(function () {
		window.obj_<?=$menuBlockId?> = new BX.Main.Menu.CatalogHorizontal('<?=CUtil::JSEscape($menuBlockId)?>', <?=CUtil::PhpToJSObject($arResult["ITEMS_IMG_DESC"])?>);
	});
</script>