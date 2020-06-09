<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/6/9
 * Time: 上午9:38
 */

namespace YouGeCore\Amap;


use YouGeCore\Client\Http;

class Geo
{
    const GeoBaseUrl = Config::GEO_API."key=".Config::API_KEY;

    /**
     * @param $address
     * @param string $city
     * @return bool
     */
    public function GeoCode($address,$city="")
    {
        $client = new Http();
        $url = self::GeoBaseUrl.'&address='.$address.'&city='.$city;
        $result = $client->get($url);
        $result = json_decode($result,true);
        if ($result['status']==0){
            return $result['info'];//返回高德请求状态表
        }
        if ($result['status'] == 1){
            return $result['geocodes'];
        }
        return false;
    }

    /**
     * 根据经纬度逆地理编码
     * @param $longitude
     * @param $latitude
     */
    public function InverseGeo($longitude,$latitude)
    {

    }

}