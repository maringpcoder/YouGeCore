<?php
/**
 * Created by PhpStorm.
 * User: marin
 * Date: 2020/7/9
 * Time: 上午11:33
 */

namespace YouGeCore\Common;


class DataType
{

    //订单状态  1待支付,2待确认,3待入住, 4已关闭,5,超时未付款自动关闭,  6已完成
    const Waiting_pay=1;
    const Waiting_confirmed=2;
    const Waiting_stay_in=3;
    const Been_closed=4;
    const Sys_Closed=5;
    const Finished=6;
    //状态描述
    const ORDER_STATUS_TXT=[
        self::Waiting_pay=>'待支付',
        self::Waiting_confirmed=>'待确认',
        self::Waiting_stay_in=>'待入住',
        self::Been_closed=>'关闭',
        self::Sys_Closed=>'自动关闭',
        self::Finished=>'完成'
    ];
    /** 供应商类型 */
    const HOTEL_SUP=1;//酒店供应商
    const LINE_SUP=2;//线路供应商
    const TICKETS_SUP=3;//门票
}