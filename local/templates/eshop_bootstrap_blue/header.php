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
            <div class="bx-header-hold__left">
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
                      <path d="M3.72414 6C3.72414 7.24138 4.75862 8.27586 6 8.27586C7.24138 8.27586 8.27586 7.24138 8.27586 6C8.27586 4.75862 7.24138 3.72414 6 3.72414C4.75862 3.72414 3.72414 4.75862 3.72414 6ZM6 9.72414C3.93103 9.72414 2.27586 8.06897 2.27586 6C2.27586 3.93103 3.93103 2.27586 6 2.27586C8.06897 2.27586 9.72414 3.93103 9.72414 6C9.72414 8.06897 8.06897 9.72414 6 9.72414ZM6 0C2.68966 0 0 2.68966 0 6C0 12 6 19.2535 6 19.2535C6 19.2535 12 12 12 6C12 2.68966 9.31034 0 6 0Z" fill="#4de481"/>
                    </svg>
                  </span>

                  <span class="bx-address__text">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_localization.php"), false);?>
                  </span>
                </div>

                <div class="bx-address">
                  <span class="bx-address__ico">
                    <svg class="bx-address__svg" width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M12.5219 4.0044C12.8868 4.50154 12.7808 5.19971 12.2837 5.56464C11.7898 5.92848 11.0949 5.82468 10.7289 5.3341C10.7027 5.30023 9.90508 4.41304 8.70977 4.29941C7.80619 4.21309 6.91353 4.53978 6.91353 5.02162C6.91353 5.53187 7.17029 5.7034 8.77205 6.08472C10.2678 6.43982 12.5295 6.97848 12.5295 9.46853C12.5295 10.6955 11.9253 11.6319 10.8283 12.1039C10.046 12.4404 9.15993 12.4863 8.39619 12.4863C6.04928 12.4863 4.5677 10.6617 4.50542 10.5841C4.12083 10.1022 4.20059 9.39969 4.68243 9.01619C5.16426 8.63159 5.86681 8.71026 6.25141 9.19319C6.25469 9.19756 7.14079 10.2148 8.39619 10.2552C9.90727 10.3033 10.2525 9.85312 10.2973 9.46962C10.352 9.00089 9.93458 8.65672 8.25634 8.25683C6.83267 7.91812 4.68243 7.40678 4.68243 5.1134C4.68243 4.39883 4.97306 2.0683 8.71086 2.0683C11.0709 2.0683 12.4651 3.92683 12.523 4.00659L12.5219 4.0044ZM4.60594 0.508062C4.21588 0.398801 3.7996 0.351819 3.36911 0.382412C1.55757 0.506969 0.0989416 1.99182 0.00497746 3.80446C-0.0398194 4.67089 0.220221 5.47287 0.685671 6.11641C0.955545 6.48899 1.0801 6.94461 1.0801 7.40569V7.41333C1.0801 11.5117 4.40163 14.8332 8.49999 14.8332C9.39702 14.8332 10.2558 14.6737 11.0512 14.382C11.4817 14.2246 11.9526 14.194 12.394 14.3186C12.7841 14.429 13.2004 14.4748 13.6309 14.4453C15.4424 14.3208 16.901 12.8359 16.995 11.0222C17.0398 10.1569 16.7809 9.3538 16.3143 8.70917C16.0444 8.33659 15.9199 7.88097 15.9199 7.42098V7.41224C15.9199 3.3696 12.6858 0.0895937 8.66497 0H8.31097C7.48277 0.0207595 6.68736 0.172632 5.94876 0.442506C5.51827 0.599841 5.04736 0.630434 4.60594 0.505877V0.508062Z" fill="#4de481"/>
                    </svg>
                  </span>

                  <span class="bx-address__text">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_skype.php"), false);?>
                  </span>
                </div>

                <div class="bx-address">
                  <span class="bx-address__ico">
                    <svg class="bx-address__svg" width="19" height="14" viewBox="0 0 19 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M9.5 9.49992L7.18854 7.4668L0.411469 13.1668C0.677711 13.433 0.956055 13.5662 1.35542 13.5662H17.6446C18.044 13.5662 18.3223 13.433 18.5885 13.1668L11.8115 7.4668L9.5 9.49992Z" fill="#4de481"/>
                      <path d="M18.5885 0.411465C18.3223 0.133121 18.044 0 17.6446 0H1.35542C0.943953 0 0.677711 0.133121 0.411469 0.411465L9.5 8.14459L18.5885 0.411465Z" fill="#4de481"/>
                      <path d="M0 1.22266V12.4895L6.51083 6.92266L0 1.22266Z" fill="#4de481"/>
                      <path d="M12.4892 6.92266L19 12.4895V1.22266L12.4892 6.92266Z" fill="#4de481"/>
                    </svg>
                  </span>

                  <span class="bx-address__text">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_mail.php"), false);?>
                  </span>
                </div>
              </div>
            </div>

            <div class="bx-header-hold__right">
              <!--            <div class="">-->
              <!--              <div class="bx-worktime">-->
              <!--                <div class="bx-worktime-prop">-->
              <!--                    --><?//$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/schedule.php"), false);?>
              <!--                </div>-->
              <!---->
              <!--								--><?//$APPLICATION->IncludeComponent("bitrix:system.auth.form", "auth_header", Array(
                //									"COMPONENT_TEMPLATE" => ".default",
                //										"REGISTER_URL" => "/auth/index.php?register=yes&registration=yes",	// Страница регистрации
                //										"FORGOT_PASSWORD_URL" => "/auth/index.php?forgot_password=yes&registration=yes",	// Страница забытого пароля
                //										"PROFILE_URL" => "/personal/",	// Страница профиля
                //										"SHOW_ERRORS" => "N",	// Показывать ошибки
                //									),
                //									false
                //								);?>
              <!---->
              <!--              </div>-->
              <!--            </div>-->

              <a href="#"  class="bx-data-goods">
                <span class="bx-data-goods__ico">
                  <svg class="bx-data-goods__svg" width="16" height="21" viewBox="0 0 48 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M30.5528 25.3376C34.1366 23.0333 36.5169 19.0221 36.5169 14.4464C36.5169 7.29538 30.7192 1.50005 23.5703 1.50005C16.4183 1.50005 10.6232 7.29512 10.6232 14.4464C10.6232 19.0221 13.0021 23.0333 16.586 25.3376C8.1429 26.0926 1.49996 33.205 1.49996 41.8431V55.2812L1.53366 55.4935L2.46101 55.7813C11.1819 58.507 18.7612 59.4164 24.9998 59.4164C37.1818 59.4164 44.2438 55.9408 44.6809 55.7224L45.5459 55.2812H45.6378V41.8431C45.6378 33.2073 38.9966 26.0949 30.5525 25.3376H30.5528Z" stroke="white" stroke-width="2.99992" stroke-miterlimit="10"/>
                  </svg>

                </span>
              </a>

              <a href="#"  class="bx-data-goods">
                <span class="bx-data-goods__num">0</span>
                <span class="bx-data-goods__ico">
                  <svg class="bx-data-goods__svg" width="25" height="25" viewBox="0 0 53 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M26.3754 41.6938C28.3349 41.6938 30.197 42.1072 31.619 42.8546L39.4551 46.9728C40.0266 47.2749 40.3824 47.3196 40.5433 47.3196C40.6131 47.3196 40.6968 47.3101 40.7149 47.2877C40.7837 47.2049 40.9312 46.8171 40.7914 46.0031L39.2951 37.2768C38.7336 34.0014 40.1567 29.6226 42.5356 27.3043L48.875 21.1222C49.5239 20.4895 49.5831 20.0794 49.5671 20.0283C49.551 19.9805 49.2611 19.6817 48.3648 19.5514L39.6038 18.2793C36.3163 17.799 32.5891 15.0929 31.1191 12.1132L27.2013 4.17585C26.8002 3.36158 26.4271 3.18033 26.375 3.18033C26.3228 3.18033 25.95 3.36158 25.5489 4.17585L21.6308 12.1132C20.1605 15.0929 16.4338 17.799 13.1466 18.2793L4.38487 19.5514C3.4883 19.6815 3.1987 19.9805 3.18253 20.0283C3.1666 20.0792 3.22597 20.4895 3.87444 21.1222L10.2143 27.3043C12.5934 29.6226 14.0164 34.0016 13.4548 37.2771L11.9585 46.0031C11.819 46.8171 11.966 47.2052 12.0347 47.2879C12.0533 47.3101 12.1368 47.3198 12.2063 47.3198C12.3676 47.3198 12.723 47.2754 13.2945 46.9732L21.1312 42.8551C22.5529 42.1077 24.4153 41.6945 26.3747 41.6942L26.3754 41.6938ZM40.5438 50.4994C39.7368 50.4994 38.8723 50.261 37.9753 49.7872L30.1391 45.6691C29.179 45.1635 27.807 44.8741 26.3754 44.8741C24.9436 44.8741 23.5716 45.1635 22.612 45.6693L14.7751 49.7875C13.8786 50.2581 13.0143 50.4996 12.2071 50.4996C11.1601 50.4996 10.2358 50.0862 9.60425 49.3357C9.0569 48.687 8.47745 47.488 8.82473 45.4654L10.321 36.7394C10.704 34.507 9.6168 31.1616 7.99502 29.5811L1.65535 23.399C-0.26834 21.526 -0.108093 19.8692 0.158826 19.0455C0.425261 18.225 1.26946 16.7907 3.92778 16.4029L12.69 15.1308C14.9315 14.8065 17.7771 12.7394 18.7799 10.7074L22.698 2.76668C23.8865 0.359353 25.5122 0.000244262 26.3754 0.000244262C27.2389 2.92557e-06 28.8646 0.359594 30.0532 2.76668L33.9713 10.7074C34.9738 12.7394 37.8194 14.8065 40.0614 15.1308L48.8229 16.4029C51.4812 16.791 52.3254 18.225 52.5918 19.0455C52.8587 19.8692 53.019 21.526 51.095 23.399L44.7556 29.5811C43.1336 31.1616 42.0466 34.507 42.4296 36.7396L43.9259 45.4656C44.2732 47.488 43.6937 48.687 43.1464 49.3359C42.5148 50.0862 41.5905 50.4999 40.5438 50.4996V50.4994Z" fill="white"/>
                  </svg>
                </span>
              </a>

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
    </div>

	</header>

  <main class="main">

    <div class="workarea">
      <div class="bx-content-seection">
        <div class="bx-content-seection__row">
          <div class="page-container">
        <?
        $hideSidebar =
          defined("HIDE_SIDEBAR") && HIDE_SIDEBAR == true
          || preg_match("~^".SITE_DIR."(catalog|personal\\/cart|personal\\/order\\/make)/~", $curPage)
        ? true : false;
        ?>
            <div class="bx-content bx-content_left">

              <div class="bx-content-top">
                <div class="bx-content-top__row">
                  <div class="bx-menu-top">
                    <div class="bx-menu-top-button">
                      <span class="bx-menu-top-button__ico">
                        <svg class="bx-menu-top-button__svg" width="24" height="19" viewBox="0 0 24 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M0 16H24V19H0V16Z" fill="white"/>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M0 8H24V11H0V8Z" fill="white"/>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H24V3H0V0Z" fill="white"/>
                        </svg>
                      </span>

                      <div class="bx-menu-top-button-title">
                        <span class="bx-menu-top-button-title__text">каталог товаров</span>
                      </div>
                    </div>

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

                  <div class="bx-search-block">
                      <?if ($APPLICATION->GetCurPage(true) == SITE_DIR."index.php"):?>

                        <div class="">

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