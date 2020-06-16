<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/6/16
 * Time: 上午11:08
 */

namespace YouGeCore\Wx;


use YouGeCore\Wx\Config\GenerateCodeInterface;
use YouGeCore\Wx\Exceptions\GenerateCodeSignException;

class Common
{

    /**
     *
     * md5(md5(code.nonce_str.timestamp).halt)
     * @param GenerateCodeInterface $input
     * @return string
     * @throws GenerateCodeSignException
     */
    public static function generateCodeSign(GenerateCodeInterface $input)
    {
        $code = $input->getCode();
        $nonceStr = $input->getNonceStr();
        $halt = $input->getSalt();
        if (!$code || !$nonceStr || !$halt) {
            throw new GenerateCodeSignException("code ,nonceStr,halt 不能为空", 2);
        }
        return md5(md5($code . $nonceStr, $halt));
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
        return md5($code);
    }

}