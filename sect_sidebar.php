<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if ($APPLICATION->GetCurPage(true) == SITE_DIR."index.php"):?>
<div class="bx-sidebar-block">
	<?$APPLICATION->IncludeComponent("bitrix:search.title", "visual1", Array(
	"NUM_CATEGORIES" => "1",	// Количество категорий поиска
		"TOP_COUNT" => "5",	// Количество результатов в каждой категории
		"CHECK_DATES" => "N",	// Искать только в активных по дате документах
		"SHOW_OTHERS" => "N",	// Показывать категорию "прочее"
		"PAGE" => SITE_DIR."catalog/",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
		"CATEGORY_0_TITLE" => "Товары",	// Название категории
		"CATEGORY_0" => array(	// Ограничение области поиска
			0 => "iblock_catalog",
		),
		"CATEGORY_0_iblock_catalog" => array(	// Искать в информационных блоках типа "iblock_catalog"
			0 => "all",
		),
		"CATEGORY_OTHERS_TITLE" => "Прочее",
		"SHOW_INPUT" => "Y",	// Показывать форму ввода поискового запроса
		"INPUT_ID" => "title-search-input",	// ID строки ввода поискового запроса
		"CONTAINER_ID" => "search",	// ID контейнера, по ширине которого будут выводиться результаты
		"PRICE_CODE" => array(	// Тип цены
			0 => "BASE",
		),
		"SHOW_PREVIEW" => "Y",	// Показать картинку
		"PREVIEW_WIDTH" => "75",	// Ширина картинки
		"PREVIEW_HEIGHT" => "75",	// Высота картинки
		"CONVERT_CURRENCY" => "Y",	// Показывать цены в одной валюте
	),
	false
);?>
</div>
<?endif?>

<div class="bx-sidebar-block">
	<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"",
		Array(
			"AREA_FILE_SHOW" => "file",
			"PATH" => SITE_DIR."include/socnet_sidebar.php",
			"AREA_FILE_RECURSIVE" => "N",
			"EDIT_MODE" => "html",
		),
		false,
		Array('HIDE_ICONS' => 'Y')
	);?>
</div>

<div class="bx-sidebar-block hidden-xs">
	<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"",
		Array(
			"AREA_FILE_SHOW" => "file",
			"PATH" => SITE_DIR."include/sender.php",
			"AREA_FILE_RECURSIVE" => "N",
			"EDIT_MODE" => "html",
		),
		false,
		Array('HIDE_ICONS' => 'Y')
	);?>
</div>

<div class="bx-sidebar-block">
	<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array(
	"AREA_FILE_SHOW" => "file",
		"PATH" => SITE_DIR."include/about.php",
		"AREA_FILE_RECURSIVE" => "N",
		"EDIT_MODE" => "html"
	),
	false,
	array(
	"HIDE_ICONS" => "N",
		"ACTIVE_COMPONENT" => "N"
	)
);?>
</div>

<div class="bx-sidebar-block">
	<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array(
	"AREA_FILE_SHOW" => "file",
		"PATH" => SITE_DIR."include/twitter.php",
		"AREA_FILE_RECURSIVE" => "N",
		"EDIT_MODE" => "html"
	),
	false,
	array(
	"HIDE_ICONS" => "N",
		"ACTIVE_COMPONENT" => "N"
	)
);?>
</div>

<div class="bx-sidebar-block">
	<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array(
	"AREA_FILE_SHOW" => "file",
		"PATH" => SITE_DIR."include/info.php",
		"AREA_FILE_RECURSIVE" => "N",
		"EDIT_MODE" => "html"
	),
	false,
	array(
	"HIDE_ICONS" => "N",
		"ACTIVE_COMPONENT" => "N"
	)
);?>
</div>

<div class="bx-sidebar-block">
<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => SITE_DIR."include/banner.php",
		"AREA_FILE_RECURSIVE" => "N",
	),
false);?>
</div>

<div class="bx-sidebar-block">
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"news_sidebar", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "news_sidebar",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "3",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	),
	false
);?>
</div>