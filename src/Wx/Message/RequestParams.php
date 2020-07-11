<?php
/**
 * 定义请求参数抽象类,父类继承该类设置请求参数
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/7/10
 * Time: 下午10:55
 */

namespace YouGeCore\Wx\Message;


abstract class RequestParams
{
    protected $access_token;
    /**
     * @var string 接收者（用户）的 openid
     */
    protected $toUser = "";
    /**
     * @var string 所需下发的订阅模板id
     */
    protected $templateId = "";
    /**
     * @var string 点击模板卡片后的跳转页面，仅限本小程序内的页面。支持带参数,（示例index?foo=bar）。该字段不填则模板无跳转。
     */
    protected $page = "";

    /**
     * @var PaySuccessMsgData
     */
    protected $data;

    /**
     * @var string 跳转小程序类型：developer为开发版；trial为体验版；formal为正式版；默认为正式版
     */
    protected $miniprogramState = '';

    /**
     * @var string
     */
    protected $lang = 'zh_CN';

    /**
     * @return string
     */
    public function getToUser()
    {
        return $this->toUser;
    }

    /**
     * @return string
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * @return string
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @return PaySuccessMsgData
     */
    public function getData()
    {
        return $this->data;
    }

    public function setData(PaySuccessMsgData $paySuccessMsgData)
    {
        $this->data = $paySuccessMsgData;
    }

    /**
     * @return string
     */
    public function getMiniprogramState()
    {
        return $this->miniprogramState;
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * @param mixed $access_token
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;
    }

}