<?php
class UserBean extends CBean{

    private $userID;
    private $userName;
    private $userPassword;
    private $userEMail;

    protected $_isValidata = array(
        array('user_id', 'required' => TRUE, 'ingore' => TRUE),
        array('user_name', 'type'   => 'string', 'length' => 10, 'required' => TRUE, 'regex' => ''),
        array('user_password', 'type'   => 'string', 'length' => 10, 'required' => TRUE, 'regex' => ''),
        array('user_email', 'type'   => 'string', 'length' => 10, 'required' => TRUE, 'regex' => '/(^[\w\.\_]{2,6})@(\w{4,}).([a-z]{2,10})/'),
    );

    protected $_mapSetting = array(
        'user_id'       => 'userID',
        'user_name'     => 'userName',
        'user_password' => 'userPassword',
        'user_email'    => 'userEMail',
    );

    public function getMapSetting(){
        return $this->_mapSetting;
    }

    public function setUserID($userID){
        $this->userID = $userID;
    }

    public function getUserID(){
        return $this->userID;
    }

    public function setUserName($userName){
        $this->userName = $userName;
    }

    public function getUserName(){
        return $this->userName;
    }

    public function setUserPassword($userPassword){
        $this->userPassword = $userPassword;
    }

    public function getUserPassword(){
        return $this->userPassword;
    }

    public function setUserEMail($userEMail){
        $this->userEMail = $userEMail;
    }

    public function getUserEMail(){
        return $this->userEMail;
    }

}
