<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="bx-sidebar-block bx-sidebar-block_socnet">

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

<div class="bx-sidebar-block bx-sidebar-block_banner">
<?//$APPLICATION->IncludeComponent(
//	"bitrix:main.include",
//	"",
//	Array(
//		"AREA_FILE_SHOW" => "file",
//		"PATH" => SITE_DIR."include/banner.php",
//		"AREA_FILE_RECURSIVE" => "N",
//	),
//false);?>

  <div class="banner-sidebar">
    <div class="banner-sidebar__ico-wrap">
      <svg class="banner-sidebar__ico" width="53" height="30" viewBox="0 0 83 47" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M79.3751 26.4583H65.4629C64.4889 26.4583 63.699 25.6682 63.699 24.6945C63.699 23.7208 64.4889 22.9306 65.4629 22.9306H79.3751C80.3491 22.9306 81.1389 23.7208 81.1389 24.6945C81.139 25.6681 80.349 26.4584 79.3751 26.4583Z" fill="white"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6389 12.3472H7.05561C6.0815 12.3472 5.29171 11.5571 5.29171 10.5834C5.29171 9.60971 6.0815 8.81949 7.05561 8.81949H17.6389C18.6129 8.81939 19.4028 9.60967 19.4028 10.5834C19.4028 11.5571 18.6129 12.3473 17.6389 12.3472V12.3472Z" fill="white"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3473 21.1667H1.76392C0.789812 21.1667 1.52588e-05 20.3765 1.52588e-05 19.4028C1.52588e-05 18.4291 0.789812 17.6389 1.76392 17.6389H12.3473C13.3213 17.6389 14.1111 18.4292 14.1111 19.4028C14.1111 20.3764 13.3213 21.1667 12.3473 21.1667Z" fill="white"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6389 29.9861H7.05561C6.0815 29.9861 5.29171 29.1959 5.29171 28.2223C5.29171 27.2486 6.0815 26.4583 7.05561 26.4583L17.6389 26.4583C18.6129 26.4583 19.4028 27.2486 19.4028 28.2223C19.4028 29.1958 18.6129 29.9862 17.6389 29.9861Z" fill="white"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M65.4625 26.4583C64.5037 26.4583 63.7177 25.6928 63.6993 24.7298L63.5004 14.1464C63.4821 13.1692 64.2567 12.3649 65.2308 12.3473L65.2646 12.3472C66.2235 12.3472 67.0095 13.1163 67.0274 14.0794L67.2264 24.6628C67.2451 25.6364 66.4701 26.4407 65.4964 26.4584L65.4625 26.4583V26.4583Z" fill="white"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M43.2552 36.4525H56.4445V3.52779H26.4697V36.4525H29.7392C30.7711 33.6903 33.4487 31.75 36.497 31.75C39.545 31.75 42.2229 33.6903 43.2552 36.4525ZM58.2084 39.9803H41.8921C41.0112 39.9803 40.265 39.3312 40.1447 38.4599C39.8942 36.6466 38.3265 35.2778 36.497 35.2778C34.6679 35.2778 33.0998 36.6466 32.8496 38.4564C32.7294 39.3312 31.9836 39.9803 31.1023 39.9803H24.7058C23.7317 39.9803 22.9419 39.1901 22.9419 38.2165V1.76388C22.9419 0.790091 23.7317 6.66603e-05 24.7058 6.66603e-05L58.2084 -3.05176e-05C59.1824 -3.05176e-05 59.9722 0.790285 59.9722 1.76388L59.9723 38.2164C59.9723 39.1901 59.1824 39.9803 58.2084 39.9803V39.9803Z" fill="white"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M76.1059 36.4525H79.3751V28.8291L72.1967 14.4745L59.9723 14.157V36.4525H62.5899C63.6218 33.6903 66.2997 31.75 69.3477 31.75C72.3964 31.75 75.074 33.6903 76.1059 36.4525V36.4525ZM81.139 39.9803H74.7424C73.8615 39.9803 73.1153 39.3312 72.995 38.4564C72.7453 36.6466 71.1772 35.2778 69.3477 35.2778C67.5185 35.2778 65.9504 36.6466 65.7003 38.4564C65.58 39.3312 64.8342 39.9803 63.953 39.9803H58.2084C57.2344 39.9803 56.4445 39.1901 56.4445 38.2165V12.3472C56.4445 11.871 56.6364 11.4159 56.9772 11.0843C57.3183 10.7527 57.7751 10.5763 58.2539 10.5834L73.3464 10.9749C73.998 10.9926 74.5871 11.3665 74.8785 11.9486L82.7166 27.626C82.839 27.8694 82.9028 28.1411 82.9028 28.4128V38.2163C82.9028 39.19 82.1129 39.9803 81.139 39.9803L81.139 39.9803Z" fill="white"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M69.3477 35.2778C67.3139 35.2778 65.6594 36.9323 65.6594 38.9679C65.6594 40.9998 67.3139 42.6544 69.3477 42.6544C71.3818 42.6544 73.0363 40.9999 73.0363 38.9679C73.0363 36.9323 71.3818 35.2778 69.3477 35.2778ZM69.3477 46.1822C65.3687 46.1821 62.1316 42.9472 62.1316 38.9679C62.1316 34.9886 65.3687 31.75 69.3477 31.75C73.3267 31.75 76.5641 34.9886 76.5641 38.9679C76.5641 42.9472 73.3267 46.1822 69.3477 46.1822Z" fill="white"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M36.497 35.2778C34.4633 35.2778 32.8087 36.9323 32.8087 38.9679C32.8087 40.9998 34.4632 42.6544 36.497 42.6544C38.5308 42.6544 40.1853 40.9999 40.1853 38.9679C40.1853 36.9323 38.5308 35.2778 36.497 35.2778ZM36.497 46.1822C32.518 46.1821 29.2809 42.9472 29.2809 38.9679C29.281 34.9886 32.518 31.75 36.497 31.75C40.476 31.75 43.7131 34.9886 43.7131 38.9679C43.7131 42.9472 40.476 46.1822 36.497 46.1822Z" fill="white"/>
      </svg>
    </div>

    <h2 class="banner-sidebar-title">
      <div class="banner-sidebar-title__text">Оплата и доставка</div>
    </h2>

    <div class="banner-sidebar-block">
      <h3 class="banner-sidebar-block-title">
        <span class="banner-sidebar-block-title__text">Доставка по Харькову</span>
      </h3>

      <div class="banner-sidebar-block-descr">
        <span class="banner-sidebar-block-descr__text">Доставка товаров по Харькову осуществляется в любой район города в день заказа или на следующий день. Доставка товара производится с понедельника по субботу с 10 до 18 часов, выходной - воскресенье. Стоимость доставки товара обсуждается с нашими менеджерами и зависит от растояния и обема покупки.</span>
      </div>
    </div>

    <div class="banner-sidebar-block">
      <div class="banner-sidebar-block-title">
        <span class="banner-sidebar-block-title__text">Самовывоз из офиса</span>
      </div>
      <div class="banner-sidebar-block-descr">
        <span class="banner-sidebar-block-descr__text">Если Вам доставка не нужна, т.е Вы можете самостоятельно приехать к нам в офис и забрать товар, то можно сообщить нашим менеджерам ориентировочное время вашего визита к нам в офис и в указанное время приехать и забрать товар. </span></div>
    </div>

    <div class="banner-sidebar-block">
      <div class="banner-sidebar-block-title">
        <span class="banner-sidebar-block-title__text">Доставка по украине</span>
      </div>
      <div class="banner-sidebar-block-descr">
        <span class="banner-sidebar-block-descr__text">Доставка по Украине осуществляется  любой удобной для Вас транспортной компанией, которая выполняет экспресс-доставки грузов по всей территории Украины, после 100% предоплаты товара через банковский перевод. Стоимость доставки и всех затрат, связанных с ней, согласно тарифам выбранной Вами транспортной компании. Рассчитать затраты Вы можете непосредственно на сайте транспортной компании.</span></div>
    </div>
  </div>

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