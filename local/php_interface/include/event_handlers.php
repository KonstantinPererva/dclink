<?php 
use Skalar\Iblock\ElementPropertyTable;

AddEventHandler("search", "BeforeIndex", "BeforeIndexHandler");

function BeforeIndexHandler($arFields)
{
    if (!CModule::IncludeModule("iblock"))
    {
        return $arFields;
    }
    if ($arFields["MODULE_ID"] == "iblock" && $arFields["PARAM1"] == 'catalog') {

        $result = ElementPropertyTable::getList([
			'select' => ['VALUE'],
			'filter' => [
				'IBLOCK_ELEMENT_ID' => $arFields["ITEM_ID"],
				'IBLOCK_PROPERTY_ID' => 33908,
				'DESCRIPTION' => 'Код SQL'
			],
		]);
		if($row = $result->fetch()){
			$arFields["BODY"] .= " ".$row["VALUE"];
		}

    }
    return $arFields;
}