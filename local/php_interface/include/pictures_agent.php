<?php

function setPictures(){

	CModule::IncludeModule("iblock");
	$iblockID = 43;
	$propertyId = 33908;
	$arSelect = array("ID", "NAME", "PREVIEW_PICTURE", "DETAIL_PICTURE");
	$arFilter = array('IBLOCK_ID'=>$iblockID, '!CATALOG_PRICE_2' => false,
		'>CATALOG_QUANTITY' => 0, "PREVIEW_PICTURE"=>false, "DETAIL_PICTURE"=>false,
		/*"SECTION_ID"=>2610,*/ "INCLUDE_SUBSECTIONS"=>"Y");
	$res = CIBlockElement::getList(array('SORT' => 'ASC', 'ID' => 'DESC'), $arFilter, false, false, $arSelect);
	$count = 0;
	print_log("Начало итерации загрузки картинок", "/log/loadPicture.txt");
	while ($arFields = $res->Fetch()) {
		$count++;
		print_log("Начало загрузки картинок товару с ID = ".$arFields["ID"], "/log/loadPicture.txt");
		//print_all($arFields["ID"]);

		$iterator = CIBlockElement::GetPropertyValues($iblockID, array('ID' => $arFields["ID"]), true, array('ID' => array($propertyId)));
		while ($row = $iterator->Fetch()){
			//print_all($row);
			foreach($row["DESCRIPTION"][$propertyId] as $key=>$arDesc){
				if($arDesc == "Код SQL"){
					$sqlCode = $row[$propertyId][$key];
				}
			}
			if(!empty($sqlCode)){
				$picture = \Expertit\SkalarShopBase\Picture::getData($sqlCode);
				//print_all($picture);
				if(!empty($picture[0])){
					print_log($picture, "/log/loadPicture.txt");
					$el = new CIBlockElement;
					$arLoadProductArray = Array(
						"PREVIEW_PICTURE" => CFile::MakeFileArray($picture[0]),
						"DETAIL_PICTURE" => CFile::MakeFileArray($picture[0])
					);
					$resUpd = $el->Update($arFields["ID"], $arLoadProductArray);
					if($resUpd){
						print_log("Успешная загрузка картинки", "/log/loadPicture.txt");
					} else {
						print_log("Ошибка загрузки картинки (".$el->LAST_ERROR.")", "/log/loadPicture.txt");
						print_log($el->LAST_ERROR, "/log/loadPicture.txt");
						$el = new CIBlockElement;
						$arLoadProductArray = Array(
							"PREVIEW_PICTURE" => CFile::MakeFileArray($picture[1]),
							"DETAIL_PICTURE" => CFile::MakeFileArray($picture[1])
						);
						$resUpd = $el->Update($arFields["ID"], $arLoadProductArray);
						if($resUpd){
							print_log("Успешная загрузка второй картинки", "/log/loadPicture.txt");
						} else {
							print_log("Ошибка загрузки второй картинки (".$el->LAST_ERROR.")", "/log/loadPicture.txt");
							print_log($el->LAST_ERROR, "/log/loadPicture.txt");
						}
					}
					foreach($picture as $key=>$photo){
						if($key == 0) continue;
						$arFile[] = array("VALUE" => CFile::MakeFileArray($photo),"DESCRIPTION"=>"");
					}
					//print_all($arFile);
					CIBlockElement::SetPropertyValuesEx($arFields["ID"], $iblockID, array(33911 => Array ("VALUE" => array("del" => "Y"))));
					$resUpdMorePic = $el->SetPropertyValueCode($arFields["ID"], "MORE_PHOTO", $arFile);
					if($resUpdMorePic){
						print_log("Успешная загрузка дополнительных картинок", "/log/loadPicture.txt");
					} else {
						print_log("Ошибка загрузки дополнительных картинок (".$el->LAST_ERROR.")", "/log/loadPicture.txt");
					}
					unset($arFile);
				} else {
					print_log("Картинок не найдено", "/log/loadPicture.txt");
				}
			} else {
				print_log("Код SQL не найден", "/log/loadPicture.txt");
			}
			unset($picture);
			unset($sqlCode);
		}
		print_log("Конец загрузки картинок товару с ID = ".$arFields["ID"]." -------------------------- ", "/log/loadPicture.txt");
		//if($count == 500) break;

	}
	print_log("Конец итерации загрузки картинок", "/log/loadPicture.txt");
	print_log("Количество элементов в итерации = ".$count, "/log/loadPicture.txt");
	print_log("-------------------------------------------------------------------", "/log/loadPicture.txt");
	//print_all($count);

	return "setPictures();";
}
