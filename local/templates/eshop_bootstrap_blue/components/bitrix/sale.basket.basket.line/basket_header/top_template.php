<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * @global array $arParams
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global string $cartId
 */
?>

<a href="<?= $arParams['PATH_TO_BASKET'] ?>" class="bx-data-goods">
	<?if ($arParams['SHOW_NUM_PRODUCTS'] == 'Y' && ($arResult['NUM_PRODUCTS'] > 0 || $arParams['SHOW_EMPTY_VALUES'] == 'Y')):?>
	<span class="bx-data-goods__num bx-data-goods__num_basket">
		<?echo $arResult['NUM_PRODUCTS'];?>
	</span>
	<?endif;?>
		
	<span class="bx-data-goods__ico">
	  <svg class="bx-data-goods__svg bx-data-goods__svg_basket" width="54" height="40" viewBox="0 0 54 40" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M33.6762 31.7658C33.5828 32.0469 33.3271 32.2382 33.0273 32.2382C24.7877 32.2382 16.2629 32.2382 7.80692 32.2559C7.42836 32.2559 7.11377 31.9497 7.11377 31.5745C7.11377 31.1921 7.42356 30.8857 7.80197 30.8857C16.0857 30.8642 24.4434 30.8642 32.5306 30.8642C33.4942 27.9469 34.3447 25.116 35.2493 22.123C35.7213 20.5434 36.2079 18.9137 36.7143 17.28C37.1223 15.816 37.5402 14.4566 38.1105 12.7506C39.2265 9.05127 41.4733 1.79926 41.4979 1.72692C41.5814 1.44238 41.8518 1.2438 42.1517 1.2438H43.4889C43.602 0.540737 44.246 0 45.0179 0H52.4463C53.3068 0 53.9999 0.659696 53.9999 1.47475V2.39761C53.9999 3.20926 53.3068 3.87237 52.4463 3.87237H45.0179C44.2411 3.87237 43.597 3.32822 43.484 2.61772H42.6581C42.132 4.30886 40.3672 10.0172 39.4183 13.1547C39.4183 13.1616 39.4133 13.169 39.4133 13.1729C38.848 14.8674 38.435 16.2086 38.0368 17.6585C38.0318 17.6659 38.0318 17.6693 38.0269 17.6766C37.5255 19.3062 37.0338 20.9401 36.5619 22.5156C35.6523 25.5417 34.7134 28.6678 33.676 31.7655L33.6762 31.7658Z" fill="white"/>
		<path d="M1.55359 7.66992H36.3606C37.221 7.66992 37.919 8.33365 37.919 9.1487V10.068C37.919 10.8831 37.2209 11.5463 36.3606 11.5463H35.869L30.643 29.3096C30.5545 29.6022 30.289 29.8042 29.9842 29.8042H7.92983C7.62996 29.8042 7.35951 29.6022 7.27602 29.3096L2.05003 11.5463H1.55359C0.69811 11.5463 0 10.8831 0 10.068V9.1487C0 8.33365 0.69811 7.66992 1.55359 7.66992V7.66992Z" fill="white"/>
		<path d="M33.0421 32.5156C35.0086 32.5156 36.6161 34.1203 36.6161 36.0887C36.6161 38.0616 35.0084 39.6625 33.0421 39.6625C31.0658 39.6625 29.468 38.0618 29.468 36.0887C29.468 34.1203 31.0658 32.5156 33.0421 32.5156V32.5156Z" fill="white"/>
		<path d="M7.42844 32.5156C9.39979 32.5156 10.9977 34.1203 10.9977 36.0887C10.9977 38.0616 9.39994 39.6625 7.42844 39.6625C5.45694 39.6625 3.85425 38.0618 3.85425 36.0887C3.85425 34.1203 5.45694 32.5156 7.42844 32.5156Z" fill="white"/>
	  </svg>
	</span>
	
	<span class="bx-data-goods__title bx-data-goods__title_basket text-uppercase"><?= GetMessage('TSB1_CART') ?></span>
</a>