<?php
class LoginBean{

    /** type=String required  **/
    private $userAccount;
    /** type=String required  **/
    private $userPassword;
    /** type=String required  **/
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

}

/*
 * @controller
 */
class WelcomeController extends Controller{

    /** @autowired BoUser */
    public $boUser;

    /** @autowired BoDeparment */
    public $boDeparment;

    public function __construct(){
        parent::__construct();
    }

    /**
     * @resource username required
     * @resource userpassword required
     * @resource identifyingcode required
     */
    public function AAAAA(){
        echo "this is sbaaaaaaaaaaaaaaaa";
    }

}

class Controller{

    public function __construct(){
        $reflector = new ReflectionClass($this);
        $properties = $reflector->getProperties();
        foreach($properties as &$property){
            $docblock = $property->getDocComment();
            $doname = $property->getName();
            var_dump($docblock);
            var_dump($doname);
        }
        var_dump($reflector->getMethod('AAAAA')->getDocComment());
    }

}

(new WelcomeController);


// to get the Class DocBlock
// echo $reflector->getDocComment()

// to get the Method DocBlock

?>
