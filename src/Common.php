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
     *
     */
    public function generateStr()
    {
        $seek = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm123456";
        $seek = str_shuffle($seek);
    }
}