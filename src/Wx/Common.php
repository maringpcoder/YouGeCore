<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/6/16
 * Time: 上午11:08
 */

namespace YouGeCore\Wx;


use YouGeCore\Client\Http;
use YouGeCore\Wx\Config\GenerateCodeInterface;
use YouGeCore\Wx\Exceptions\GenerateCodeSignException;

class Common
{

    /**
     * 生成分享码
     * md5(md5(code.nonce_str.timestamp).halt)
     * @param GenerateCodeInterface $input
     * @return string
     * @throws GenerateCodeSignException
     */
    public static function generateCodeSign(GenerateCodeInterface $input)
    {
        $code = $input->getCode();
        $nonceStr = $input->getNonceStr();
        $salt = $input->getSalt();
        $timeStamp = $input ->getTimeStamp();

        if (!$code || !$nonceStr || !$salt || !$timeStamp) {
            throw new GenerateCodeSignException("code ,nonceStr,halt ,timestamp 不能为空", 2);
        }
        return md5(md5($code . $nonceStr, $input->getTimeStamp()).$salt);
    }

    /**
     * 验证是否合法
     * @param GenerateCodeInterface $input
     * @param $signInput
     * @return bool
     * @throws GenerateCodeSignException
     */
    public static function verifyCodeSign(GenerateCodeInterface $input, $signInput)
    {
        $code = $input->getCode();
        $nonceStr = $input->getNonceStr();
        $salt = $input->getSalt();
        $timeStamp = $input->getTimeStamp();
        if (!$code || !$nonceStr || !$salt || !$timeStamp) {
            throw new GenerateCodeSignException("code ,nonceStr,halt ,timeStamp 不能为空", 2);
        }
        $sign = md5(md5($code . $nonceStr.$timeStamp).$salt);
        return $sign === $signInput ? true : false;

    }

    /**
     * @param $productId
     * @param $type
     * @return string
     */
    public static function generateCode($productId, $type)
    {
        $microtime = intval(microtime(true) * 10000);
        $code = $microtime . '|' . $productId . '|' . $type;
        return substr(md5($code),8,16);
    }

    /**
     * 小程序获取access_token
     * @param $appid
     * @param $secret
     * @param string $grantType
     * @return array
     */
    public static function getAccessToken($appid, $secret, $grantType = 'client_credential')
    {
        $client = new Http();
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=$grantType&appid=$appid&secret=$secret";
        return json_decode($client->get($url), true);
    }

    /**
     * 获取二维码
     * @param $accessToken
     * @param $params
     * @return mixed
     */
    public static function createQrCodeByWx($accessToken, $params)
    {
        $url = "https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token=$accessToken";
        $client = new Http();
        $params = json_encode($params);
        return $client->post($url, $params, true);
    }

}