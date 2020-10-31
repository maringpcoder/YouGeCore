<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/10/21
 * Time: 下午3:25
 */

namespace YouGeCore\Alipay;


use Alipay\EasySDK\Kernel\Config;
use Alipay\EasySDK\Kernel\Factory;

class Pay
{
    /** @var \Alipay\EasySDK\Kernel\Config $config */
    protected $config;

    /**
     * 异步通知验签
     * @param $params
     * @return bool
     * @throws \Exception
     */
    public function checkNotifySign($params)
    {
        Factory::setOptions($this->config);
        return Factory::payment()->common()->verifyNotify($params);
    }

    /**
     * 统一收单下单并支付页面接口
     * @param PaymentPagePay $params
     * @return string
     * @throws \Exception
     */
    public function paymentPagePay(PaymentPagePay $params)
    {
        Factory::setOptions($this->config);
        return Factory::payment()->page()->pay(
            $params->getSubject(),
            $params->getOutTradeNo(),
            $params->getTotalAmount(),
            $params->getReturnUrl())->body;
    }

    /**
     * @param $outTrade
     * @param $amount
     * @return \Alipay\EasySDK\Payment\Common\Models\AlipayTradeRefundResponse
     * @throws \Exception
     */
    public function refund($outTrade,$amount)
    {
        Factory::setOptions($this->config);
        return Factory::payment()->common()->refund($outTrade,$amount);
    }

    public function createOption(Setting $option)
    {
        $config = new Config();
        $config->protocol = $option->getProtocol();
        $config->gatewayHost = $option->getGatewayHost();
        $config->signType = $option->getSignType();
        $config->merchantCertSN = true;

        $config->appId = $option->getAppId();

        // 为避免私钥随源码泄露，推荐从文件中读取私钥字符串而不是写入源码中
        $config->merchantPrivateKey = $option->getMerchantPrivateKey();

        $config->alipayCertPath = $option->getAlipayCertPath();
        $config->alipayRootCertPath = $option->getAlipayRootCertPath();
        $config->merchantCertPath = $option->getMerchantCertPath();

        //注：如果采用非证书模式，则无需赋值上面的三个证书路径，改为赋值如下的支付宝公钥字符串即可
        // $options->alipayPublicKey = '<-- 请填写您的支付宝公钥，例如：MIIBIjANBg... -->';

        //可设置异步通知接收服务地址（可选）
        if ($notifyUrl = $option->getNotifyUrl()) {
            $config->notifyUrl = $option->getNotifyUrl();
        }

        //可设置AES密钥，调用AES加解密相关接口时需要（可选）
        if ($encryptKey = $option->getEncryptKey()) {
            $config->encryptKey = $option->getEncryptKey();
        }
        $this->config = $config;
        return $this;

    }
}