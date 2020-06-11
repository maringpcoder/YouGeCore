<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/6/11
 * Time: 下午11:12
 */

namespace YouGeCore\Wx\Pay;


interface JsApiPramsInterface
{
    public function __construct($params);
    public function getBody();
    public function getAttach();
    public function getOutTradeNo();
    public function getTotalFee();
    public function getTimeStart();
    public function getTimeExpire();
    public function getNotifyUrl();
    public function getTradeType();
    public function getOpenid();
}