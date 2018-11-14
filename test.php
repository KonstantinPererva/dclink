<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Test");
?>

<?$APPLICATION->IncludeComponent(
	"skalar:np.store",
	"",
	Array(
		"CITY" => "Харьков",
		"WARE_HOUSE"=>"336de16f-e1c2-11e3-8c4a-0050568002cf",
		"DELIVERY_ID"=> 6,
	),
	false
);?>

<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>`