<?php
/**
 *
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/7/10
 * Time: 下午11:06
 */

namespace YouGeCore\Wx\Message;

/**
 * 预订酒店成功给用户发送的消息
 * Class PaySuccessMsgData
 * @package YouGeCore\Wx\Message
 * @property array $msgData
 */
abstract class PaySuccessMsgData
{
    public $msgData;


    /**
     * @param PaySuccessMsgDataItem $paySuccessMsgDataItem
     * @return PaySuccessMsgData
     */
    public function createMsgItem(PaySuccessMsgDataItem $paySuccessMsgDataItem)
    {
        $this->msgData =  [
            'thing1'=>['value'=>$paySuccessMsgDataItem->getThing1()],
            'thing8'=>['value'=>$paySuccessMsgDataItem->getThing8()],
            'date5'=>['value'=>$paySuccessMsgDataItem->getDate5()],
            'date6'=>['value'=>$paySuccessMsgDataItem->getDate6()],
            'thing12'=>['value'=>$paySuccessMsgDataItem->getThing12()]
        ];
        return $this;
    }

    /**
     * @return array
     */
    public function getMsgData()
    {
        return $this->msgData;
    }
}