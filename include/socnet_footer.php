<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$APPLICATION->IncludeComponent(
	"bitrix:eshop.socnet.links", 
	"big_squares", 
	array(
		"FACEBOOK" => "https://www.facebook.com/1CBitrix",
		"VKONTAKTE" => "",
		"TWITTER" => "https://twitter.com/1c_bitrix",
		"GOOGLE" => "https://plus.google.com/111119180387208976312/",
		"INSTAGRAM" => "https://instagram.com/1CBitrix/",
		"TEST" => "#",
		"COMPONENT_TEMPLATE" => "big_squares"
	),
	false,
	array(
		"HIDE_ICONS" => "N"
	)
);?>