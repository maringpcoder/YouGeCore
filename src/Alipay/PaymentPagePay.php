<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/10/21
 * Time: 下午3:40
 */

namespace YouGeCore\Alipay;

/**
 * Class PaymentCommonCreate
 * @package YouGeCore\Alipay
 * @property string $subject
 * @property string $outTradeNo
 * @property string $totalAmount
 */
class PaymentPagePay
{
    private $subject;
    private $outTradeNo;
    private $totalAmount;
    private $return_url;

    /**
     * @return mixed
     */
    public function getReturnUrl()
    {
        return $this->return_url;
    }

    /**
     * @param mixed $return_url
     */
    public function setReturnUrl($return_url)
    {
        $this->return_url = $return_url;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getOutTradeNo()
    {
        return $this->outTradeNo;
    }

    /**
     * @param string $outTradeNo
     */
    public function setOutTradeNo($outTradeNo)
    {
        $this->outTradeNo = $outTradeNo;
    }

    /**
     * @return string
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @param string $totalAmount
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
    }


}