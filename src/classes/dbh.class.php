<?php

    class Dbh {

        protected function connect() {
            try{
                // Change these to suit your needs
                $hostname = "localhost";
                $username = "root";
                $password = "toor";
                $dbName = "simplebank";
                
                $dbh = new mysqli($hostname,$username,$password,$dbName);
                return $dbh;

            }catch(Exception $e){
                print "Error!: ". $e->getMessage() . "<br/>";
                die();
            }
        }
    }
    ?>