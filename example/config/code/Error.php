<?php
class Error extends BaseError{
    /* 错误码定义 */

    // 用户中心错误码:预留10001-20000
    const LOGIN_ACCOUNT_EMPTY   = 10001; //用户账号为空
    const LOGIN_ACCOUNT_FAILED  = 10002; //用户账号错误
    const LOGIN_PASSWORD_EMPTY  = 10003; //用户密码为空
    const LOGIN_PASSWORD_FAILED = 10004; //用户密码错误
    const LOGIN_VIDFY_FAILED    = 10005; //验证码验证失败
    const LOGIN_VIDFY_SUCCESS   = 10006; //验证码验证成功
    const LOGIN_SUCCESS         = 10007; //登录成功
    const LOGIN_ACCOUNT_ILLEGAL = 10008; //用户账号非法

    /** 业务级错误码开始20000，定义在子站里面 **/

    /* 错误消息定义 */
    protected static $errorMessages = array(
        self::LOGIN_ACCOUNT_EMPTY   => '用户账号为空',
        self::LOGIN_ACCOUNT_FAILED  => '用户账号错误',
        self::LOGIN_PASSWORD_EMPTY  => '用户密码为空',
        self::LOGIN_PASSWORD_FAILED => '用户密码错误',
        self::LOGIN_VIDFY_FAILED    => '验证码验证失败',
        self::LOGIN_VIDFY_SUCCESS   => '验证码验证成功',
        self::LOGIN_SUCCESS         => '登录成功',
        self::LOGIN_ACCOUNT_ILLEGAL => '用户账号非法',
   	);

    public static function getErrorMessage($errorCode) {
        return self::$errorMessages[$errorCode];
    }
}
