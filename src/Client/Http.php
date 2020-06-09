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
    protected static $client=null;
    protected static $guzClient = null;

    public function __construct()
    {
        self::$guzClient = new \GuzzleHttp\Client();
    }

    public static function singleton()
    {
        if (self::$client==null || !self::$client instanceof Http){
            self::$client = new self();
        }
        return self::$client;
    }

    /**
     * @param $url
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($url)
    {
        $rsp = self::$guzClient->request("GET",$url);
        return $rsp;
    }


    /**
     * @param $url
     */
    public function post($url)
    {
        self::$guzClient->post();
    }
}