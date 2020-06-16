<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/6/16
 * Time: 上午11:47
 */

namespace YouGeCore;


class Common
{

    /**
     * 生成随机字符串
     * @param int $len
     * @return string
     */
    public static function generateStr($len = 32)
    {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str = "";

        for ($i = 0; $i < $len; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }
}