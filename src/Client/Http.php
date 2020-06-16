<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/6/9
 * Time: 上午10:12
 */

namespace YouGeCore\Client;


class Http
{
    /** @var null|resource  */
    protected  $curl=null;

    public function __construct()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            //CURLOPT_URL => "http://restapi.amap.com/v3/geocode/geo?key=4545b8cd5b830357e075e88eb7f336be&address=%E5%9B%9B%E5%B7%9D%E7%9C%81%E6%88%90%E9%83%BD%E5%B8%82%E8%92%B2%E6%B1%9F%E5%8E%BF&city=''",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 3,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//            CURLOPT_CUSTOMREQUEST => "GET",
        ));
        $this->curl= $curl;
    }

    /**
     * @param $url
     * @return mixed
     */
    public function get($url)
    {
        curl_setopt($this->curl,CURLOPT_URL,$url);
        curl_setopt($this->curl,CURLOPT_CUSTOMREQUEST,"GET");
        $response = curl_exec($this->curl);
        curl_close($this->curl);
        return $response;
    }

}