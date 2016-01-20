<?php

class RestStatus {
    const STATUS_OK = 200;
    const STATUS_BAD_REQUEST = 400;
    const STATUS_UNAUTHORIZED = 401;
    const STATUS_PAYMENT_REQUIRED = 402;
    const STATUS_FORBIDDEN = 403;
    const STATUS_NOT_FOUNT = 404;
    const STATUS_INTERNAL_SERVER_STATUS = 500;
    const STATUS_NOT_IMPLEMENTED = 501;
    const STATUS_PHP_ERROR = 608;

	protected static $statusMessages = array(
		self::STATUS_OK => 'Ok',
		self::STATUS_BAD_REQUEST => 'Bad Request',
		self::STATUS_UNAUTHORIZED => 'Unauthorized',
		self::STATUS_PAYMENT_REQUIRED => 'Payment required',
		self::STATUS_FORBIDDEN => 'Forbidden',
		self::STATUS_NOT_FOUNT => 'Not Found',
		self::STATUS_INTERNAL_SERVER_STATUS => 'Internal Server STATUS',
		self::STATUS_NOT_IMPLEMENTED => 'Not Implemented',
        self::STATUS_PHP_ERROR => 'Error From PHP Server',
	);

    /**
     * 返回错误码信息
     * @param $statusCode
     * @return string
     */
    public static function getStatusMessage($statusCode) {
		return isset(self::$statusMessages[$statusCode]) ? self::$statusMessages[$statusCode] : "";
	}
}
