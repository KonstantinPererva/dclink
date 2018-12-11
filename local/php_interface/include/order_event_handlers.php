<?php
\Bitrix\Main\EventManager::getInstance()->addEventHandler('sale', 'OnAfterSaleOrderFinalAction', 'OnAfterSaleOrderFinalActionHandler');

//подменяем сумму доставки на высчитанную с помощью АПИ Новой почты
function OnAfterSaleOrderFinalActionHandler(\Bitrix\Main\Event $event){

	//print_log("OnAfterSaleOrderFinalActionHandler");
	$order = $event->getParameter('ENTITY');
	//$orderId = $event->getParameter('ENTITY')->getField("ORDER_ID");

	$propertyCollection = $order->getPropertyCollection();
	$deliveryIds = $order->getDeliverySystemId();
	$sum = $order->getPrice();
	$deliverySum = $order->getDeliveryPrice();
	$locPropValue = $propertyCollection->getItemByOrderPropertyId(6);
	$location = $locPropValue->getValue();
	//print_log("sum - ".$sum);
	//print_log("deliverySum - ".$deliverySum);
	if(!empty($location) && (in_array(5, $deliveryIds) || in_array(6, $deliveryIds) ) ) {
		//print_log("not empty location");
		$arLocs = CSaleLocation::GetByID($location, LANGUAGE_ID);
		$delivery["ID"] = $deliveryIds[1];
		$delivery = getWarehouses($delivery, $arLocs);
		//print_log($delivery);
		foreach ($order->getShipmentCollection() as $shipment){
			if (!$shipment->isSystem()){
				$shipment->setFields(array(
					'CUSTOM_PRICE_DELIVERY' => "Y",
					'PRICE_DELIVERY' => $delivery["COST"],
				));
			}
		}
		//$order->save();
	}

}

function getWarehouses($arDelivery, $arLocation){
	global $APPLICATION;
	//print_log("getWarehouses", "/log/order.txt");
	//print_log($arDelivery, "/log/order.txt");
	//print_log($arLocation, "/log/order.txt");
	$cost = $APPLICATION->IncludeComponent(
		"skalar:np.store",
		"",
		Array(
			"CITY" => $arLocation["CITY_NAME"],
			"WARE_HOUSE"=>"",
			"DELIVERY_ID"=> $arDelivery["ID"],
			"AJAX" => "N"
		),
		false
	);
	//print_log($cost, "/log/order.txt");
	$arDelivery["COST"] = $cost;
	return $arDelivery;
}
