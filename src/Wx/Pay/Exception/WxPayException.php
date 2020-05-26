<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/5/26
 * Time: 下午12:19
 */

namespace YouGeCore\Wx\Pay\Exception;


use Exception;

class WxPayException extends Exception {
    public function errorMessage()
    {
        return $this->getMessage();
    }
}