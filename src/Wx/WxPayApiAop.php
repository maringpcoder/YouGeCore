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
use YouGeCore\Wx\Pay\JsApiPramsInterface;
use YouGeCore\Wx\Pay\Lib\WxPayUnifiedOrder;
use YouGeCore\Wx\Pay\WxPayApi;
use YouGeCore\Wx\Pay\WxPayConfig;
use YouGeCore\Wx\Pay\WxPayConfigInterface;


class WxPayApiAop
{
    /**
     * @description JSAPIPAY 支付方法
     * @param JsApiPramsInterface $params
     * @param WxPayConfigInterface $config
     * @return string
     * @throws Pay\Exception\WxPayException
     */
    public function getJsApiParameters(JsApiPramsInterface $params,WxPayConfigInterface $config)
    {
        $tools = new JsApiPay();
        //②、统一下单
        $input = new WxPayUnifiedOrder();


        $input->SetBody($params->getBody());//商品描述
        $input->SetAttach($params->getAttach());//附加数据,可以是平台名字或者商家名字
        $input->SetOut_trade_no($params->getOutTradeNo());//商户订单号
        $input->SetTotal_fee($params->getTotalFee());//标价金额,单位:分
        $input->SetTime_start($params->getTimeStart());//格式date(YmdHis,timestamp)
        $input->SetTime_expire($params->getTimeExpire());//$params['time_start'] + 600
        $input->SetNotify_url($params->getNotifyUrl());//http://paysdk.weixin.qq.com/notify.php,异步接收微信支付结果通知的回调地址，通知url必须为外网可访问的url，不能携带参数
        $input->SetTrade_type($params->getTradeType());
        $input->SetOpenid($params->getOpenid());

        $order = WxPayApi::unifiedOrder($config, $input);
        $jsApiParameters = $tools->GetJsApiParameters($order);
        return $jsApiParameters;
    }
}