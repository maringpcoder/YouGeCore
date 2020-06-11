<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/6/11
 * Time: 下午5:20
 */

namespace YouGeCore\Wx\Pay;


use YouGeCore\Wx\Pay\Lib\WxPayUnifiedOrder;

class JsApiAop
{
    /**
     * @param $openId
     * @param $params
     * @throws Exception\WxPayException
     */
    public function getJsApiParameters($openId,$params)
    {
        $tools = new JsApiPay();

        //②、统一下单
        $input = new WxPayUnifiedOrder();
        $input->SetBody("test");
        $input->SetAttach("test");
        $input->SetOut_trade_no("sdkphp".date("YmdHis"));
        $input->SetTotal_fee("1");
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
        $input->SetNotify_url("http://paysdk.weixin.qq.com/notify.php");
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);

        $config = new WxPayConfig();



        $order = WxPayApi::unifiedOrder($config, $input);
        $jsApiParameters = $tools->GetJsApiParameters($order);


    }
}