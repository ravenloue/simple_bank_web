<?php

require_once 'dbh.class.php';

class Login extends Dbh {

    protected function getUser($uId,$pwd){
        // First locate the customerID based on the account number
        $query = "Select custID, passWd From mobilelogin Where accName = '".$uId."'";
        $db = $this->connect();
        try{ 
            $stmt = $db->query($query);
            if($stmt->num_rows == 0){
                header("location: ../../index.php?error=usernotfound");
                exit();
            }
            $results = $stmt->fetch_row();
            if($results[1] != $pwd){
                header("location: ../../index.php?error=wrongpassword");
                exit();                
            }else{
                $custId = $results[0];
                $query2 = "Select fName, balance, accType, accNum From customer, account Where customer.custID = '".$custId."' And account.custID = '".$custId."'";
                $stmt = $db->query($query2);
                $results2 = $stmt->fetch_row();
                $fName = $results2[0];
                $balance = $results2[1];
                $accType = $results2[2];
                $accNum = $results2[3];
                session_start();
                $_SESSION["userid"] = $uId;
                $_SESSION["custID"] = $custId;
                $_SESSION["userName"] = $fName;
                $_SESSION["balance"] = $balance;
                $_SESSION["accType"] = $accType;

                $query3 = "Select transactionDate, transactionDetails, transactionType, transactionAmount from transactions WHERE transactions.accNum ='".$accNum."' ";
                $stmt = $db->query($query3);
                $results3 = $stmt->fetch_all();
                $_SESSION["transactions"] = $results3;
            }

        }catch(Exception $e){
            print "Error!: ". $e->getMessage() . "<br/>";
            die();
        }        
    }

}?>