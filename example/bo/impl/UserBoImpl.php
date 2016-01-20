<?php
class UserBoImpl extends Bo implements UserLoginBo{
    
    function __construct(){
        parent::__construct();
    }

    /**
     * islogin 
     * 验证登录
     * @param User $user 
     * @access public
     * @return void
     */
    public function islogin(User $user){

    }

    /**
     * loginout 
     * 登出
     * @access public
     * @return void
     */
    public function loginout(){

    }

}
