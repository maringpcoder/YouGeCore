<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/10/21
 * Time: 下午3:13
 */

namespace YouGeCore\Alipay;


interface Setting
{
    /**
     * 请求协议 eg:https
     * @return mixed
     */
    public function getProtocol();

    /**
     * api网关 eg:openapi.alipay.com
     * @return mixed
     */
    public function getGatewayHost();

    /**
     * 签名类型 eg:RSA2
     * @return mixed
     */
    public function getSignType();

    /**
     * 获取支付宝应用id eg:2019022663440152
     * @return mixed
     */
    public function getAppId();

    /**
     * 请填写您的应用私钥
     * @return mixed
     */
    public function getMerchantPrivateKey();

    /**
     * 请填写您的支付宝公钥证书文件路径,eg: /foo/alipayCertPublicKey_RSA2.crt
     * @return mixed
     */
    public function getAlipayCertPath();

    /**
     * 请填写您的支付宝根证书文件路径,eg:/foo/alipayRootCert.crt
     * @return mixed
     */
    public function getAlipayRootCertPath();

    /**
     * 请填写您的应用公钥证书文件路径,eg:/foo/appCertPublicKey_2019051064521003.crt
     * @return mixed
     */
    public function getMerchantCertPath();

    /**
     * 可选
     * 异步通知接收服务地址
     * @return mixed
     */
    public function getNotifyUrl();

    /**
     * 可设置AES密钥，调用AES加解密相关接口时需要 可选
     * @return mixed
     */
    public function getEncryptKey();
}