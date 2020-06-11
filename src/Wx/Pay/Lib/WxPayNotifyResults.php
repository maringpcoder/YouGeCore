<?php
/**
 * 回调回包数据基类
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/6/11
 * Time: 下午4:32
 */

namespace YouGeCore\Wx\Pay\Lib;


use YouGeCore\Wx\Pay\Exception\WxPayException;
use YouGeCore\Wx\Pay\WxPayConfigInterface;

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