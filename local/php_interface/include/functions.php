<?php
/**
 * ОЧистка строки
 * @param $str
 * @return string
 */
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

function clearPostString($str)
{
	return trim(strip_tags($str));
}

// вспомагательная функция вывода
function print_all($array, $onlyAdmin = "Y")
{
	global $USER;
	if ($onlyAdmin == "Y") {

		if ($USER->IsAdmin()) {
			echo "<pre>";
			print_r($array);
			echo "</pre>";
		}

	} elseif ($onlyAdmin == "N") {
		echo "<pre>"; print_r($array); echo "</pre>";
	}
}

// запись лог
function print_log($MySTR, $FILE = '/log/MyLog.txt')
{
	$date = date("Y-m-d G:i:s");
	$fp = fopen($_SERVER["DOCUMENT_ROOT"] . $FILE, 'a+');
	$str = $date . " " . print_r($MySTR,true). "\r\n";
	fwrite($fp, $str);
	fclose($fp);
}
// c перезаписью файла
function print_log_w($MySTR, $FILE = '/log/MyLog.txt')
{
	$date = date("Y-m-d G:i:s");
	$fp = fopen($_SERVER["DOCUMENT_ROOT"] . $FILE, 'w');
	$str = $date . " " . print_r($MySTR,true). "\r\n";
	fwrite($fp, $str);
	fclose($fp);
}

function getParent($ID){
	CModule::IncludeModule("iblock");
	$tt = CIBlockSection::GetList(array(), array('ID'=>$ID));
	$as=$tt->GetNext();
	static $a;
	if($as['DEPTH_LEVEL']==1)
		$a = $as['ID'];
	else{
		getParent($as['IBLOCK_SECTION_ID']);
	}

	return $a;
}
function getParent2Level($ID){
	CModule::IncludeModule("iblock");
	$tt = CIBlockSection::GetList(array(), array('ID'=>$ID));
	$as=$tt->GetNext();
	static $a;
	if($as['DEPTH_LEVEL']==2)
		$a = $as['ID'];
	else{
		getParent2Level($as['IBLOCK_SECTION_ID']);
	}

	return $a;
}
function getParent3Level($ID){
	CModule::IncludeModule("iblock");
	$tt = CIBlockSection::GetList(array(), array('ID'=>$ID));
	$as=$tt->GetNext();
	static $a;
	if($as['DEPTH_LEVEL']==3)
		$a = $as['ID'];
	else{
		getParent3Level($as['IBLOCK_SECTION_ID']);
	}

	return $a;
}
function Redirect404() {
	if(defined("ERROR_404") && !CSite::InDir('/404.php')) {
		LocalRedirect("/404.php", "404 Not Found");
	}
}
function sklonen($n,$s1,$s2,$s3, $b = false){
	$m = $n % 10; $j = $n % 100;
	if($b) $n = '<b>'.$n.'</b>';
	if($m==0 || $m>=5 || ($j>=10 && $j<=20)) return $n.' '.$s3;
	if($m>=2 && $m<=4) return  $n.' '.$s2;
	return $n.' '.$s1;
}
function sortAr($a, $b){
	return strcmp($a["SORT"], $b["SORT"]);
}
function GetElementCount($ID){
	global $DB;
	$strHint = $DB->type=="MYSQL"?"STRAIGHT_JOIN":"";
	//$ID = 28809;
	$strSql = "
	    SELECT $strHint COUNT(DISTINCT BE.ID) as CNT
	    FROM b_iblock_section BS
	        INNER JOIN b_iblock_section BSTEMP ON (BSTEMP.IBLOCK_ID=BS.IBLOCK_ID
	            AND BSTEMP.LEFT_MARGIN >= BS.LEFT_MARGIN
	            AND BSTEMP.RIGHT_MARGIN <= BS.RIGHT_MARGIN)
	        INNER JOIN b_iblock_section_element BSE ON BSE.IBLOCK_SECTION_ID=BSTEMP.ID
			INNER JOIN b_iblock_element BE ON BE.ID=BSE.IBLOCK_ELEMENT_ID AND BE.IBLOCK_ID=BS.IBLOCK_ID
	    WHERE BS.ID=$ID AND BE.ACTIVE='Y'";
	$res = $DB->Query($strSql);
	$res = $res->Fetch();
	//print_log($res);
	return $res["CNT"];
}

function printr ($data) {
	echo '
		<div onclick="displayRespondData(this)" style="position:fixed;color:#0084ff;font-weight:bold;left:20px;bottom:20px;z-index:9999999999;padding:10px 30px;background-color:#e0f8f6;cursor:pointer">Посмотреть данные</div>
		<script>
			function displayRespondData (elem) {
				if (!(container = document.querySelector("#displayRespondData"))){
					alert ("бла бла");
				}
				if (elem.classList.contains("active")){
					container.style.display = "none";
					elem.classList.remove("active");
					elem.innerHTML = "Посмотреть данные";
				}else{
					container.style.display = "block";
					elem.classList.add("active");
					elem.innerHTML = "Закрыть";
				}
			}
		</script>
		<div style="position: fixed;z-index: 99999999;background: #fff;width: 100%;height: 100%;top: 0;left: 0;font-size: 12px;color: #2a52c5;padding-bottom: 500px;overflow: auto;display:none;" id="displayRespondData"><pre>
	';
	print_r($data);
	echo '</pre></div>';
}

// XML to Array
function xml2ary(&$string) {
    $parser = xml_parser_create();
    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
    xml_parse_into_struct($parser, $string, $vals, $index);
    xml_parser_free($parser);
    //set_time_limit (30);

    $mnary=array();
    $ary=&$mnary;
    foreach ($vals as $r) {
        $t=$r['tag'];
        if ($r['type']=='open') {
            if (isset($ary[$t])) {
                if (isset($ary[$t][0])) $ary[$t][]=array(); else $ary[$t]=array($ary[$t], array());
                $cv=&$ary[$t][count($ary[$t])-1];
            } else $cv=&$ary[$t];
            if (isset($r['attributes'])) {foreach ($r['attributes'] as $k=>$v) $cv['_a'][$k]=$v;}
            $cv['_c']=array();
            $cv['_c']['_p']=&$ary;
            $ary=&$cv['_c'];

        } elseif ($r['type']=='complete') {
            if (isset($ary[$t])) { // same as open
                if (isset($ary[$t][0])) $ary[$t][]=array(); else $ary[$t]=array($ary[$t], array());
                $cv=&$ary[$t][count($ary[$t])-1];
            } else $cv=&$ary[$t];
            if (isset($r['attributes'])) {foreach ($r['attributes'] as $k=>$v) $cv['_a'][$k]=$v;}
            $cv['_v']=(isset($r['value']) ? $r['value'] : '');

        } elseif ($r['type']=='close') {
            $ary=&$ary['_p'];
        }
        //usleep(300000);
    }

    _del_p($mnary);
    return $mnary;
}

// _Internal: Remove recursion in result array
function _del_p(&$ary) {
    foreach ($ary as $k=>$v) {
        if ($k==='_p') unset($ary[$k]);
        elseif (is_array($ary[$k])) _del_p($ary[$k]);
    }
}

// Array to XML
function ary2xml($cary, $d=0, $forcetag='') {
    $res=array();
    foreach ($cary as $tag=>$r) {
        if (isset($r[0])) {
            $res[]=ary2xml($r, $d, $tag);
        } else {
            if ($forcetag) $tag=$forcetag;
            $sp=str_repeat("\t", $d);
            $res[]="$sp<$tag";
            if (isset($r['_a'])) {foreach ($r['_a'] as $at=>$av) $res[]=" $at=\"$av\"";}
            $res[]=">".((isset($r['_c'])) ? "\n" : '');
            if (isset($r['_c'])) $res[]=ary2xml($r['_c'], $d+1);
            elseif (isset($r['_v'])) $res[]=$r['_v'];
            $res[]=(isset($r['_c']) ? $sp : '')."</$tag>\n";
        }

    }
    return implode('', $res);
}

// Insert element into array
function ins2ary(&$ary, $element, $pos) {
    $ar1=array_slice($ary, 0, $pos); $ar1[]=$element;
    $ary=array_merge($ar1, array_slice($ary, $pos));
}
