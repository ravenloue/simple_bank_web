<?php
   if(isset($_POST["submit"])){
       
       // Grabbing the data
       $acctNum = $_POST["acctNum"];
       $uId = $_POST["uId"];
       $pwd = $_POST["pwd"];
       
       //Instantiate Signup Controller class
       include "../classes/dbh.class.php";
       include "../classes/signup.class.php";
       include "../classes/signupController.class.php";

       $signup = new SignupController($acctNum, $uId, $pwd);

       //Running error handlers and user signup
        $signup->signUpUser();
       //Going back to the front page
       header('location: ../../index.php?p=main&c=success');
   }
    
    ?>