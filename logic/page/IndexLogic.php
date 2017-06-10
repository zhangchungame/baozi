<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-11
 * Time: 上午12:05
 */

namespace app\logic\page;

use app\service\activity\service\ActivitySelectService;
use app\service\member\service\MemberLoginService;

/**
 * 首页逻辑
 * Class IndexLogic
 * @package app\logic\page
 */
class IndexLogic
{
    public function getInfo(){
        $memberLoginService=new MemberLoginService();
        $member=$memberLoginService->getMemberSession();
        $activitySelectService=new ActivitySelectService();
        $condition=[
            'orderby'=>'id',
            'ordersort'=>'desc',
            'length'=>3,
            'status'=>'active'
        ];
        $activitys=$activitySelectService->selectList($condition);
        $data=[
            'member'=>$member,
            'activitys'=>$activitys
        ];
        return $data;
    }
}