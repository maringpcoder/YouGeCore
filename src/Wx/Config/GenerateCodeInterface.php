<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/6/16
 * Time: 上午11:12
 */

namespace YouGeCore\Wx\Config;


interface GenerateCodeInterface
{
    /**
     * 获取code盐值
     * @return mixed
     */
    public  function getSalt();

    /**
     * 获取生成code的时间戳
     * @return mixed
     */
    public function getTimeStamp();

    /**
     * 随机字符串
     * @return mixed
     */
    public  function getNonceStr();

    /**
     * 获取code
     * @return mixed
     */
    public  function getCode();
}