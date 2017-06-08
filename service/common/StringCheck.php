<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-5-25
 * Time: 下午2:08
 */

namespace app\service\common;


class  StringCheck
{
    // 函数名：CheckPassword($C_passwd)
    // 作 用：判断是否为合法用户密码
    // 参 数：$C_passwd（待检测的密码）
    // 返回值：布尔值
    // 备 注：无
    //-----------------------------------------------------------------------------------
    public static function checkPassword($C_passwd)
    {
        if (!preg_match("@^(?![A-Z]+$)(?![a-z]+$)(?!\d+$)(?![\W_]+$)\S{6,30}$@", $C_passwd)) return false;
        return true;
    }

    // 函数名：CheckLengthBetween($C_char, $I_len1, $I_len2=100)
    // 作 用：判断是否为指定长度内字符串
    // 参 数：$C_char（待检测的字符串）
    // $I_len1 （目标字符串长度的下限）
    // $I_len2 （目标字符串长度的上限）
    // 返回值：布尔值
    // 备 注：无
    //-----------------------------------------------------------------------------------
    public static function checkLengthBetween($C_cahr, $I_len1, $I_len2=100)
    {
        $C_cahr = trim($C_cahr);
        if (strlen($C_cahr) < $I_len1) return false;
        if (strlen($C_cahr) > $I_len2) return false;
        return true;
    }

    /**
     * 登录名验证
     * 包含字母数字下划线
     * @param $loginName
     * @return bool
     */
    public static function checkLoginName($loginName){
        if (!self::checkLengthBetween($loginName, 6, 30)) return false; //宽度检测
        if (!preg_match("@^[A-Za-z0-9_]*$@", $loginName)) return false; //特殊字符检测
        return true;
    }

    /**
     * 手机号验证
     * @param $mobile
     * @return bool
     */
    public static function checkMobile($mobile){
        if (!preg_match("@^1[34578]\d{9}$@", $mobile)) return false; //特殊字符检测
        return true;
    }
}