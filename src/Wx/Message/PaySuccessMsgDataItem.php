<?php
/**
 * 用户预订酒店成功后发送给用户自己的消息体
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/7/11
 * Time: 上午12:34
 */

namespace YouGeCore\Wx\Message;


class PaySuccessMsgDataItem
{

    protected $thing1 = '';//酒店名称 20个以内字符
    protected $thing8 = '';//房型类型 20个以内字符
    protected $character_string13 = '';//入离日期,32位以内数字、字母或符号
    protected $number7 = '';//房间数量
    protected $thing12 = '';//备注 20个以内字符



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
    public function getCharacterString13()
    {
        return $this->character_string13;
    }

    /**
     * @param string $character_string13
     */
    public function setCharacterString13($character_string13)
    {
        $this->character_string13 = $character_string13;
    }

    /**
     * @return string
     */
    public function getNumber7()
    {
        return $this->number7;
    }

    /**
     * @param string $number7
     */
    public function setNumber7($number7)
    {
        $this->number7 = $number7;
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