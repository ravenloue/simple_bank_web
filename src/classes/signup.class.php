<?php

require_once 'dbh.class.php';

class Signup extends Dbh {

    protected function setUser($accNum,$uId,$pwd){
        // First locate the customerID based on the account number
        $query = 'Select custID From account Where accNum = ?';
        $db = $this->connect();
        try{ 
            $stmt = $db->stmt_init();
            if(!$stmt->prepare($query)){
                $stmt->close();
                header("location: ../../index.php?error=stmtfailed");
                exit();
            }else{
                $stmt->bind_param("s", $accNum);
                $stmt->execute();
                $stmt->bind_result($custID);
                $stmt->fetch();
                $stmt->close();
            }
        }catch(Exception $e){
            print "Error!: ". $e->getMessage() . "<br/>";
            die();
        }

        // Next create the account in the database
        $query2 = "Insert into mobilelogin (custID, accName, passWd) Values(?,?,?)";
        $stmt2 = $db->stmt_init();
        
        try{
            if(!$stmt2->prepare($query2)){
                $stmt2->close();
                header("location: ../../index.php?error=stmtfailed");
                exit();
            }else{
                $stmt2->bind_param("sss", $custID, $uId, $pwd);
                $stmt2->execute();
                $stmt2->close();
            }
        }catch(Exception $e){
            print "Error!: ". $e->getMessage() . "<br/>";
            die();
        }
        
    }

    protected function checkUser($uId){
        $query = "Select * From mobilelogin Where accName = '".$uId."'";
        $db = $this->connect();
        try{
            $result = $db->query($query);
        }catch(Exception $e){
            print "Error!: ". $e->getMessage() . "<br/>";
            die();
        }

        if($result->num_rows > 0){
            $resultCheck = false;
        }else{
            $resultCheck = true;
        }
        return $resultCheck;
    }

    /*public function close(){
        $this->close();
    }*/

}