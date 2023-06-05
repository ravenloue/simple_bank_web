<?php
require_once 'login.class.php';

class LoginController extends Login {

    private $uId;
    private $pwd;
    
    public function __construct($uId, $pwd){

        $this->uId = $uId;
        $this->pwd = $pwd;
    }

    public function loginUser(){
        if($this->emptyInput() == false){
            header('location: ../index.php?error=emptyinput');
            exit();
        }
        $this->getUser($this->uId, $this->pwd);
    }
    //Testing for valid inputs
    private function emptyInput(){
        $results = null;
        if(empty($this->uId)||empty($this->pwd)){
            $results = false;
        }else {
            $results = true;
        }
        return $results;
    }

}
?>