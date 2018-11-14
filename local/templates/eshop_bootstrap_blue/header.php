<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
CJSCore::Init(array("fx"));
$curPage = $APPLICATION->GetCurPage(true);
$theme = COption::GetOptionString("main", "wizard_eshop_bootstrap_theme_id", "blue", SITE_ID);
?>
<!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
	<link rel="shortcut icon" type="image/x-icon" href="<?=htmlspecialcharsbx(SITE_DIR)?>favicon.ico" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
	<?$APPLICATION->ShowHead();?>
	<?
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/colors.css", true);
	$APPLICATION->SetAdditionalCSS("/bitrix/css/main/bootstrap.css");
	$APPLICATION->SetAdditionalCSS("/bitrix/css/main/font-awesome.css");
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/magnific-popup.css");
	?>
	<title><?$APPLICATION->ShowTitle()?></title>
</head>
<body class="bx-background-image bx-theme-<?=$theme?>" <?=$APPLICATION->ShowProperty("backgroundImage")?>>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<?$APPLICATION->IncludeComponent("bitrix:eshop.banner", "", array());?>
<div class="bx-wrapper" id="bx_eshop_wrap">
	<header class="bx-header">
    <div class="bx-header__inner">
      <div class="container">
        <div class="row">
          <div class="bx-header-hold">
            <div class="bx-logo-wrapper">
              <div class="bx-logo">
                <a class="bx-logo-block hidden-xs" href="<?=htmlspecialcharsbx(SITE_DIR)?>">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_logo.php"), false);?>
                </a>
                <a class="bx-logo-block hidden-lg hidden-md hidden-sm text-center" href="<?=htmlspecialcharsbx(SITE_DIR)?>">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_logo_mobile.php"), false);?>
                </a>
              </div>
            </div>
            <div class="bx-inc-orginfo-wrapper">
              <div class="bx-inc-orginfo">
                <div>
                <span class="bx-inc-orginfo-phone">
                  <span class="bx-inc-orginfo-phone__ico">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M32 25.165C32 25.7864 31.6893 26.0971 31.3786 26.4078L27.0291 31.068C26.7184 31.068 26.4078 31.3786 26.0971 31.3786C25.7864 31.6893 25.4757 31.6893 25.165 31.6893C25.165 31.6893 25.165 31.6893 24.8544 31.6893H24.5437C23.9223 31.6893 23.301 31.6893 22.3689 31.6893C21.4369 31.3786 20.1942 31.068 18.9515 30.4466C17.3981 29.8252 15.8447 29.2039 14.2913 27.9612C12.4272 26.7184 10.5631 25.165 8.69903 23.301C7.14563 21.7476 5.59223 20.1942 4.66019 18.6408C3.72816 17.3981 2.79612 16.1553 2.17476 14.9126C1.5534 13.6699 1.24272 12.4272 0.932039 11.4951C0.621359 10.5631 0.31068 9.63107 0 9.00971C0 8.38835 0 7.76699 0 7.45631C0 6.83495 0 6.83495 0 6.83495C0 6.52427 0.31068 6.21359 0.31068 5.90291C0.621359 5.28155 0.621359 5.28155 0.932039 4.97087L5.28155 0.621359C5.59223 0.31068 6.21359 0 6.52427 0C6.83495 0 7.14563 0 7.14563 0.31068C7.45631 0.31068 7.76699 0.621359 7.76699 0.932039L11.4951 7.76699C11.4951 8.07767 11.8058 8.38835 11.4951 9.00971C11.4951 9.32039 11.1845 9.63107 11.1845 9.94175L9.32039 11.4951C9.32039 11.8058 9.32039 11.8058 9.32039 11.8058V12.1165C9.32039 12.4272 9.63107 13.0485 9.94175 13.6699C9.94175 14.2913 10.5631 14.9126 11.1845 15.8447C11.4951 16.466 12.4272 17.3981 13.3592 18.3301C14.6019 19.2621 15.2233 20.1942 16.1553 20.8155C17.0874 21.4369 17.7087 21.7476 18.0194 22.0583C18.6408 22.3689 18.9515 22.3689 19.2621 22.6796H19.8835C20.1942 22.6796 20.1942 22.3689 20.1942 22.3689L22.0583 20.5049C22.6796 20.1942 22.9903 19.8835 23.6117 19.8835C23.9223 19.8835 24.233 19.8835 24.5437 20.1942L31.068 23.9223C31.3786 24.233 31.6893 24.5437 32 25.165Z" fill="#FEFEFE"/>
                    </svg>
                  </span>
                  <span class="bx-inc-orginfo-phone__num">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/telephone_header.php"), false);?>
                  </span>
                </span>
                </div>
              </div>
            </div>
            <div class="bx-address-wrapper">
              <div class="bx-address">
                <span class="bx-address__ico">
                  <svg class="bx-address__svg" width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.72414 6C3.72414 7.24138 4.75862 8.27586 6 8.27586C7.24138 8.27586 8.27586 7.24138 8.27586 6C8.27586 4.75862 7.24138 3.72414 6 3.72414C4.75862 3.72414 3.72414 4.75862 3.72414 6ZM6 9.72414C3.93103 9.72414 2.27586 8.06897 2.27586 6C2.27586 3.93103 3.93103 2.27586 6 2.27586C8.06897 2.27586 9.72414 3.93103 9.72414 6C9.72414 8.06897 8.06897 9.72414 6 9.72414ZM6 0C2.68966 0 0 2.68966 0 6C0 12 6 19.2535 6 19.2535C6 19.2535 12 12 12 6C12 2.68966 9.31034 0 6 0Z" fill="#FEFEFE"/>
                  </svg>
                </span>
                <span class="bx-address__text">
                  <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_localization.php"), false);?>
                </span>
              </div>
              <div class="bx-address">
                <span class="bx-address__ico">
                  <svg class="bx-address__svg" width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.5219 4.0044C12.8868 4.50154 12.7808 5.19971 12.2837 5.56464C11.7898 5.92848 11.0949 5.82468 10.7289 5.3341C10.7027 5.30023 9.90508 4.41304 8.70977 4.29941C7.80619 4.21309 6.91353 4.53978 6.91353 5.02162C6.91353 5.53187 7.17029 5.7034 8.77205 6.08472C10.2678 6.43982 12.5295 6.97848 12.5295 9.46853C12.5295 10.6955 11.9253 11.6319 10.8283 12.1039C10.046 12.4404 9.15993 12.4863 8.39619 12.4863C6.04928 12.4863 4.5677 10.6617 4.50542 10.5841C4.12083 10.1022 4.20059 9.39969 4.68243 9.01619C5.16426 8.63159 5.86681 8.71026 6.25141 9.19319C6.25469 9.19756 7.14079 10.2148 8.39619 10.2552C9.90727 10.3033 10.2525 9.85312 10.2973 9.46962C10.352 9.00089 9.93458 8.65672 8.25634 8.25683C6.83267 7.91812 4.68243 7.40678 4.68243 5.1134C4.68243 4.39883 4.97306 2.0683 8.71086 2.0683C11.0709 2.0683 12.4651 3.92683 12.523 4.00659L12.5219 4.0044ZM4.60594 0.508062C4.21588 0.398801 3.7996 0.351819 3.36911 0.382412C1.55757 0.506969 0.0989416 1.99182 0.00497746 3.80446C-0.0398194 4.67089 0.220221 5.47287 0.685671 6.11641C0.955545 6.48899 1.0801 6.94461 1.0801 7.40569V7.41333C1.0801 11.5117 4.40163 14.8332 8.49999 14.8332C9.39702 14.8332 10.2558 14.6737 11.0512 14.382C11.4817 14.2246 11.9526 14.194 12.394 14.3186C12.7841 14.429 13.2004 14.4748 13.6309 14.4453C15.4424 14.3208 16.901 12.8359 16.995 11.0222C17.0398 10.1569 16.7809 9.3538 16.3143 8.70917C16.0444 8.33659 15.9199 7.88097 15.9199 7.42098V7.41224C15.9199 3.3696 12.6858 0.0895937 8.66497 0H8.31097C7.48277 0.0207595 6.68736 0.172632 5.94876 0.442506C5.51827 0.599841 5.04736 0.630434 4.60594 0.505877V0.508062Z" fill="white"/>
                  </svg>
                </span>
                <span class="bx-address__text">
                  <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_skype.php"), false);?>
                </span>
              </div>
              <div class="bx-address">
                <span class="bx-address__ico">
                  <svg class="bx-address__svg" width="19" height="14" viewBox="0 0 19 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.5 9.49992L7.18854 7.4668L0.411469 13.1668C0.677711 13.433 0.956055 13.5662 1.35542 13.5662H17.6446C18.044 13.5662 18.3223 13.433 18.5885 13.1668L11.8115 7.4668L9.5 9.49992Z" fill="white"/>
                    <path d="M18.5885 0.411465C18.3223 0.133121 18.044 0 17.6446 0H1.35542C0.943953 0 0.677711 0.133121 0.411469 0.411465L9.5 8.14459L18.5885 0.411465Z" fill="white"/>
                    <path d="M0 1.22266V12.4895L6.51083 6.92266L0 1.22266Z" fill="white"/>
                    <path d="M12.4892 6.92266L19 12.4895V1.22266L12.4892 6.92266Z" fill="white"/>
                  </svg>
                </span>
                <span class="bx-address__text">
                  <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_mail.php"), false);?>
                </span>
              </div>
            </div>
            <div class="">
              <div class="bx-worktime">
                <div class="bx-worktime-prop">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/schedule.php"), false);?>
                </div>

								<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "auth_header", Array(
									"COMPONENT_TEMPLATE" => ".default",
										"REGISTER_URL" => "/auth/index.php?register=yes&registration=yes",	// Страница регистрации
										"FORGOT_PASSWORD_URL" => "/auth/index.php?forgot_password=yes&registration=yes",	// Страница забытого пароля
										"PROFILE_URL" => "/personal/",	// Страница профиля
										"SHOW_ERRORS" => "N",	// Показывать ошибки
									),
									false
								);?>

              </div>
            </div>

						<div id="compare_list_count">
							<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.compare.list",
	"compare_list_header",
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "43",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"DETAIL_URL" => "#SECTION_CODE#",
		"COMPARE_URL" => "/catalog/compare/",
		"NAME" => "CATALOG_COMPARE_LIST",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "compare_list_header",
		"POSITION_FIXED" => "Y",
		"POSITION" => "top left",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id"
	),
	false
);?>
					</div>

					<?$APPLICATION->IncludeComponent(
						"bitrix:sale.basket.basket.line",
						"basket_header",
						array(
							"COMPONENT_TEMPLATE" => "basket_header",
							"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
							"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
							"SHOW_NUM_PRODUCTS" => "Y",
							"SHOW_TOTAL_PRICE" => "Y",
							"SHOW_EMPTY_VALUES" => "Y",
							"SHOW_PERSONAL_LINK" => "Y",
							"PATH_TO_PERSONAL" => SITE_DIR."personal/",
							"SHOW_AUTHOR" => "N",
							"PATH_TO_AUTHORIZE" => "",
							"SHOW_REGISTRATION" => "Y",
							"PATH_TO_REGISTER" => SITE_DIR."login/",
							"PATH_TO_PROFILE" => SITE_DIR."personal/",
							"SHOW_PRODUCTS" => "N",
							"POSITION_FIXED" => "N",
							"HIDE_ON_BASKET_PAGES" => "N"
						),
						false
					);?>

<!--            <div class="">-->
<!--                --><?//$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", ".default", Array(
//                    "PATH_TO_BASKET" => SITE_DIR."personal/cart/",	// Страница корзины
//                    "PATH_TO_PERSONAL" => SITE_DIR."personal/",	// Страница персонального раздела
//                    "SHOW_PERSONAL_LINK" => "N",	// Отображать персональный раздел
//                    "SHOW_NUM_PRODUCTS" => "Y",	// Показывать количество товаров
//                    "SHOW_TOTAL_PRICE" => "Y",	// Показывать общую сумму по товарам
//                    "SHOW_PRODUCTS" => "N",	// Показывать список товаров
//                    "POSITION_FIXED" => "N",	// Отображать корзину поверх шаблона
//                    "SHOW_AUTHOR" => "Y",	// Добавить возможность авторизации
//                    "PATH_TO_REGISTER" => SITE_DIR."login/",	// Страница регистрации
//                    "PATH_TO_PROFILE" => SITE_DIR."personal/",	// Страница профиля
//                ),
//                    false
//                );?>
<!--            </div>-->
          </div>
        </div>
      </div>
    </div>
		<div class="bx-header-section container">
			<div class="bx-header-section-row">
				<div class="hidden-xs bx-header-menu">
					<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"catalog_horizontal",
	array(
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "36000000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_THEME" => "green",
		"CACHE_SELECTED_ITEMS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "4",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"COMPONENT_TEMPLATE" => "catalog_horizontal"
	),
	false
);?>
				</div>
			</div>
			<?if ($curPage != SITE_DIR."index.php"):?>
			<div class="row">
				<div class="col-lg-12">
					<?$APPLICATION->IncludeComponent(
	"bitrix:search.title",
	"visual",
	array(
		"NUM_CATEGORIES" => "1",
		"TOP_COUNT" => "5",
		"CHECK_DATES" => "N",
		"SHOW_OTHERS" => "N",
		"PAGE" => SITE_DIR."catalog/",
		"CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS"),
		"CATEGORY_0" => array(
			0 => "iblock_catalog",
		),
		"CATEGORY_0_iblock_catalog" => array(
			0 => "43",
		),
		"CATEGORY_OTHERS_TITLE" => GetMessage("SEARCH_OTHER"),
		"SHOW_INPUT" => "Y",
		"INPUT_ID" => "title-search-input",
		"CONTAINER_ID" => "search",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"SHOW_PREVIEW" => "Y",
		"PREVIEW_WIDTH" => "75",
		"PREVIEW_HEIGHT" => "75",
		"CONVERT_CURRENCY" => "Y",
		"COMPONENT_TEMPLATE" => "visual",
		"ORDER" => "date",
		"USE_LANGUAGE_GUESS" => "Y",
		"PRICE_VAT_INCLUDE" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"CURRENCY_ID" => "UAH"
	),
	false
);?>
				</div>
			</div>
			<?endif?>

			<?
			if ($curPage != SITE_DIR."index.php")
			{
			?>
			<div class="row">
				<div class="col-lg-12" id="navigation">
					<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "", array(
							"START_FROM" => "0",
							"PATH" => "",
							"SITE_ID" => "-"
						),
						false,
						Array('HIDE_ICONS' => 'Y')
					);?>
				</div>
			</div>
			<h1 class="bx-title dbg_title" id="pagetitle"><?=$APPLICATION->ShowTitle(false);?></h1>
			<?
			}
			else
			{
			?>
			<h1 style="display: none"><?$APPLICATION->ShowTitle()?></h1>
			<?
			}
			?>
		</div>
	</header>

	<div class="workarea">
		<div class="container bx-content-seection">
			<div class="row">
        <div class="page-container">
			<?
			$hideSidebar =
				defined("HIDE_SIDEBAR") && HIDE_SIDEBAR == true
				|| preg_match("~^".SITE_DIR."(catalog|personal\\/cart|personal\\/order\\/make)/~", $curPage)
			? true : false;
			?>
				  <div class="bx-content <?=($hideSidebar ? "col-xs-12" : "col-md-9 col-sm-8")?> bx-content_left">