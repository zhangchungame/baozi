<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-5
 * Time: 下午4:16
 */

namespace app\service\common;


class ArrayCmp
{

    public static function cmp($a,$b){
        if($a['sort_order']==$b['sort_order']){
            return 0;
        }
        return ($a['sort_order'] < $b['sort_order']) ? -1 : 1;
    }
}