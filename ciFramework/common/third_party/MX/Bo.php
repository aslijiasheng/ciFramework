<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
abstract class Bo
{
    public static $APP;

    public function __construct() {
        self::$APP = CI_Controller::get_instance();
    }

    public function __call($method, $arguments)
    {
        return call_user_func_array($method, $arguments);
    }

}
