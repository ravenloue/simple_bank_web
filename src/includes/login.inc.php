<?php
   if(isset($_POST["submit"])){
       
       // Grabbing the data
       $uId = $_POST["uId"];
       $pwd = $_POST["pwd"];
       
       //Instantiate Signup Controller class
       include "../classes/dbh.class.php";
       include "../classes/login.class.php";
       include "../classes/loginController.class.php";

       $login = new LoginController($uId, $pwd);

       //Running error handlers and user signup
        $login->loginUser();
       //Going back to the front page
       header('location: ../../index.php?p=loggedin');
   }
    
    ?>