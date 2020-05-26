<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/5/26
 * Time: 下午12:04
 */

namespace YouGeCore\Wx\Pay\Lib;


class WxPayNotifyResults extends WxPayResults
{
    /**
     * 将xml转为array
     * @param WxPayConfigInterface $config
     * @param string $xml
     * @return WxPayNotifyResults
     * @throws WxPayException
     */
    public static function Init($config, $xml)
    {
        $obj = new self();
        $obj->FromXml($xml);
        //失败则直接返回失败
        $obj->CheckSign($config);
        return $obj;
    }
}

