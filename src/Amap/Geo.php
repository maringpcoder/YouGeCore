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
     * 地理编码,获取经纬度
     * @param $address
     * @param string $city
     * @return int
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function GeoCode($address,$city="")
    {
        $client = Http::singleton();
        $url = self::GeoBaseUrl.'&address='.$address.'&city='.$city;
        $rep = $client->get($url);
        if ($rep->getStatusCode() == 200){
            $result = $rep->getBody()->getContents();
            $result = json_decode($result,true);
            if ($result['status']==0){
                return $result['info'];//返回高德请求状态表
            }
            if ($result['status'] == 1){
                return $result['geocodes'];
            }
        }
        return $rep->getStatusCode();
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