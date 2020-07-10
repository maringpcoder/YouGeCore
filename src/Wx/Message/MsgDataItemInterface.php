<?php
/**
 * 消息体
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/7/11
 * Time: 上午1:12
 */

namespace YouGeCore\Wx\Message;


interface MsgDataItemInterface
{
    public function createMsgItem();
}