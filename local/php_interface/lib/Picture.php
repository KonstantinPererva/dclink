<?php

namespace Expertit\SkalarShopBase;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();


/**
 * Class Picture
 * @package Expertit\SkalarShopBase
 */
class Picture
{
    /**
     * @param $sqlId
     * @return mixed
     */
    public static function getPicture($sqlId)
    {
        return self::getData($sqlId)[0];
    }

    /**
     * @param $sqlId
     * @return mixed
     */
    public static function getData($sqlId)
    {
        $url = 'https://api.dclink.com.ua/api/GetPicturesUrl/json';
        $data = array(
            'login' => 'bitrix-images',
            'password' => 'y8xSQDAo',
            'id' => $sqlId,
        );

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

//        var_dump($result);

        $res = json_decode($result, true);
        return $res[$sqlId];
    }
}