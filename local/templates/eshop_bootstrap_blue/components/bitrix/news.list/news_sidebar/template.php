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
$this->setFrameMode(true);
?>

<div class="news-banner"news-banner>

  <div class="news-banner-title">
    <span class="news-banner-title__text">Обзоры</span>
  </div>

  <ul class="news-list">

  <?foreach($arResult["ITEMS"] as $arItem):?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <li class="news-list__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
      <div class="news-card">

      <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
        <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
          <a class="news-card__img-wrap" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
            <img
              class="news-card__img"
              src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
              width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
              height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
              alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
              title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
              />
          </a>
        <?else:?>
          <img
            class="news-card__img"
            src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
            width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
            height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
            alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
            title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
            />
        <?endif;?>
      <?endif?>

        <div class="news-card__block">

          <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
            <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
            <a class="news-card__title" href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
            <?else:?>
            <span class="news-card__title">
              <?echo $arItem["NAME"]?>
            </span>
            <?endif;?>
          <?endif;?>

          <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
            <span class="news-card__date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
          <?endif?>

        </div>
      </div>
    </li>
  <?endforeach;?>

  </ul>

  <div class="news-banner__button">
    <a class="button-see-more" href="<?SITE_DIR?>/overviews/">
      <span class="button-see-more__text">
        Смотреть ещё
      </span>
    </a>
  </div>
</div>

