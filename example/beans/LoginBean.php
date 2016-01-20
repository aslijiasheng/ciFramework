<?php
class LoginBean{

    private $userAccount;
    private $userPassword;
    private $identifyingCode;

    public function setUserAccount($userAccount){
        $this->userAccount = $userAccount;
    }

    public function getUserAccount(){
        return $this->userAccount;
    }

    public function setUserPassword($userPassword){
        $this->userPassword = $userPassword;
    }

    public function getUserPassword(){
        return $this->userPassword;
    }

    public function setIdentifyingCode($identifyingCode){
        $this->identifyingCode = $identifyingCode;
    }

    public function getIdentifyingCode(){
        return $this->identifyingCode;
    }

    public function isValidate(){
        $ret = array("succ" => TRUE, "msg" => array());
        if(empty($this->userAccount)){
            $ret['succ']                       = FALSE;
            $ret['msg'][]                      = ERROR::LOGIN_ACCOUNT_EMPTY;
        }
        if(empty($this->userPassword)){
            $ret['succ']                       = FALSE;
            $ret['msg'][]                      = ERROR::LOGIN_PASSWORD_EMPTY;
        }
        if(empty($this->identifyingCode)){
            $ret['succ']                       = FALSE;
            $ret['msg'][]                      = ERROR::LOGIN_VIDFY_FAILED;
        }
        return $ret;
    }
}
