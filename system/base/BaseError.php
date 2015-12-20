<?php
class BaseError {
    /* 错误码定义 */

    // 系统级错误码 : 通用错误码0-10000
    const SUCCESS               = 0; // 成功
    const SYS_ERR               = 1; //系统错误
    const PARAMS_ERR            = 2; //参数错误
    const LOGIN_STATUS_TIMEOUNT = 3; // 登录态超时
    const LOGIN_AUTH_ERROR      = 4; // 登录态错误
    const DIRTY_WORD_FOUND      = 5; // 敏感词错误
    const PERMISSION_FAIL       = 7;//没有权限
    const FIELD_EMPTY           = 8;//字段为空

    /** 业务级错误码开始20000，定义在子站里面 **/

    /* 错误消息定义 */
    protected static $errorMessages = array(
        self::SUCCESS               => '操作成功',
        self::SYS_ERR               => '系统异常，请稍后再试',
        self::LOGIN_STATUS_TIMEOUNT => '登录超时啦',
        self::LOGIN_AUTH_ERROR      => '登录态错误',
        self::PARAMS_ERR            => '请求参数错误',
        self::DIRTY_WORD_FOUND      => '参数含有敏感词',
        self::PERMISSION_FAIL       => '没有权限',
        self::FIELD_EMPTY           => '字段为空',
   	);

    public static function getErrorMessage($errorCode) {
        return self::$errorMessages[$errorCode];
    }
}
