<?php
/**
 * 微信支付API对象门面入口
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/6/11
 * Time: 下午5:48
 * @version 1.0
 */

namespace YouGeCore\Wx;

use YouGeCore\Wx\Pay\JsApiPay;
use YouGeCore\Wx\Pay\Lib\WxPayUnifiedOrder;
use YouGeCore\Wx\Pay\WxPayApi;
use YouGeCore\Wx\Pay\WxPayConfig;


class WxPayApiAop
{
    /**
     * @description JSAPIPAY 支付方法
     * @param $openId
     * @param $params
     * @return string
     * @throws Pay\Exception\WxPayException
     */
    public function getJsApiParameters($openId, $params)
    {

        $tools = new JsApiPay();
        //②、统一下单
        $input = new WxPayUnifiedOrder();

        $input->SetBody($params["body"]);//商品描述
        $input->SetAttach($params['attach']);//附加数据,可以是平台名字或者商家名字
        $input->SetOut_trade_no($params['out_trade_no']);//商户订单号
        $input->SetTotal_fee($params['total_fee']);//标价金额,单位:分
        $input->SetTime_start($params['time_start']);//格式date(YmdHis,timestamp)
        $input->SetTime_expire($params['time_expire']);//$params['time_start'] + 600
        $input->SetNotify_url($params['notify_url']);//http://paysdk.weixin.qq.com/notify.php,异步接收微信支付结果通知的回调地址，通知url必须为外网可访问的url，不能携带参数
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);
        $config = new WxPayConfig();
        $order = WxPayApi::unifiedOrder($config, $input);
        $jsApiParameters = $tools->GetJsApiParameters($order);
        return $jsApiParameters;
    }
}