<?php
require_once 'signup.class.php';

class SignupController extends Signup {

    private $acctNum;
    private $uId;
    private $pwd;
    
    public function __construct($acctNum, $uId, $pwd){
        $this->acctNum = $acctNum;
        $this->uId = $uId;
        $this->pwd = $pwd;
    }

    public function signUpUser(){
        if($this->emptyInput() == false){
            header('location: ../../index.php?error=emptyinput');
            exit();
        }
        if($this->invalidAcct() == false){
            header('location: ../../index.php?error=invalidaccountnumber');
            exit();
        }
        if($this->invalidUId() == false){
            header('location: ../../index.php?error=invalidusername');
            exit();
        }
        if($this->uIdNotInDb() == false){
            header('location: ../../index.php?error=invalidusername');
            exit();
        }

        $this->setUser($this->acctNum, $this->uId, $this->pwd);
    }
    //Testing for various valid inputs
    private function emptyInput(){
        $results = null;
        if(empty($this->acctNum)||empty($this->uId)||empty($this->pwd)){
            $results = false;
        }else {
            $results = true;
        }
        return $results;
    }

    private function invalidAcct(){
        $results = null;
        if(!preg_match("/^[A0-9]*$/",$this->acctNum)){
            $results = false;
        }else{
            $results = true;
        }
        return $results;
    }

    private function invalidUId(){
        $results = null;
        if(!preg_match("/^[a-z]*$/", $this->uId)){
            $results = false;
        }else{
            $results = true;
        }
        return $results;
    }

    private function uIdNotInDb(){
        $results = null;
        if(!$this->checkUser($this->uId)){
            $results = false;
        }else{
            $results = true;
        }
        return $results;
    }
}