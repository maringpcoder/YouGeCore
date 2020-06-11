<?php
/**
 * 微信支付API异常类
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/6/11
 * Time: 下午4:11
 */

namespace YouGeCore\Wx\Pay\Exception;


use Exception;

class WxPayException extends Exception
{
    public function errorMessage()
    {
        return $this->getMessage();
    }

}