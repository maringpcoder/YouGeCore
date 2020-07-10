<?php
/**
 * 小程序订阅消息
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/7/10
 * Time: 下午10:48
 */

namespace YouGeCore\Wx;


use YouGeCore\Client\Http;
use YouGeCore\Wx\Message\PaySuccessMsgDataItem;
use YouGeCore\Wx\Message\RequestParams;

class SubscribeMsg
{
    protected static $api = 'https://api.weixin.qq.com/cgi-bin/message/subscribe/send?access_token=';
    /** @var PaySuccessMsgDataItem ,付款成功向用户发送预订消息的消息体对象*/
    public  $paySuccessMsgDataItem;
    /** @var todo 发送预订消息给酒店的消息体对象待定义 */
    public $paySuccessMsgDataItemOfHotel;
    /** @var todo 酒店确认订单给用户的消息体对象待定义 */
    public $hotelConfirmMsgDataItem;
    /** @var todo 酒店取消订单给用户的消息体对象待定义 */
    public $hotelCancelMsgDataItem;
    /** @var todo 用户取消订单给用户的消息体对象待定义 */
    public $userCancelMsgDataItem;



    /**
     * 预订成功之后发送给用户的预订成功消息
     * @param RequestParams $requestParams
     * @param $option
     * @return mixed
     */
    public  function sendSubMessage(RequestParams $requestParams,$option)
    {
        $client = new Http();

        $client->header = ["Content-type: application/json;charset=UTF-8", "Accept: application/json", "Cache-Control: no-cache", "Pragma: no-cache"];

        $url = self::$api.$requestParams->getAccessToken();
        switch ($option){
            case 1://用户预订成功，发送预订消息给用户
                $paySuccessMsgData = $requestParams->getData();
                $data = $paySuccessMsgData->createMsgItem($this->paySuccessMsgDataItem)->getMsgData();
                break;
            case 2://用户预订成功,发送消息给酒店
                break;
            case 3://酒店确认,发送预订成功消息给用户
                break;
            case 4://酒店取消订单,发送酒店预订取消通知给用户
                break;
            case 5://用户取消订单,发送消息给酒店
                break;

        }


        //构造请求参数
        $req = [];
        $req['touser'] = $requestParams->getToUser();
        $req['template_id'] = $requestParams->getTemplateId();
        $req['page'] = $requestParams->getPage();
        $req['miniprogram_state'] = $requestParams->getMiniprogramState();
        $req['data'] =$data;

        return $client->post($url,json_encode($req),true);
    }


}