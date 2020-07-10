<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/7/11
 * Time: 上午12:34
 */

namespace YouGeCore\Wx\Message;


class PaySuccessMsgDataItem
{
    protected $thing1 = '';//酒店名称
    protected $thing8 = '';//房型类型
    protected $date5 = '';//入住日期
    protected $date6 = '';//离店日期
    protected $thing12 = '';//备注


    /**
     * @return string
     */
    public function getThing1()
    {
        return $this->thing1;
    }

    /**
     * @param string $thing1
     */
    public function setThing1($thing1)
    {
        $this->thing1 = $thing1;
    }

    /**
     * @return string
     */
    public function getThing8()
    {
        return $this->thing8;
    }

    /**
     * @param string $thing8
     */
    public function setThing8($thing8)
    {
        $this->thing8 = $thing8;
    }

    /**
     * @return string
     */
    public function getDate5()
    {
        return $this->date5;
    }

    /**
     * @param string $date5
     */
    public function setDate5($date5)
    {
        $this->date5 = $date5;
    }

    /**
     * @return string
     */
    public function getDate6()
    {
        return $this->date6;
    }

    /**
     * @param string $date6
     */
    public function setDate6($date6)
    {
        $this->date6 = $date6;
    }

    /**
     * @return string
     */
    public function getThing12()
    {
        return $this->thing12;
    }

    /**
     * @param string $thing12
     */
    public function setThing12($thing12)
    {
        $this->thing12 = $thing12;
    }
}