<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/6/9
 * Time: 下午10:06
 */

require_once 'vendor/autoload.php';


$res  = new \YouGeCore\Amap\Geo();
$res ->GeoCode("四川省成都市蒲江县甘溪学校","成都市");