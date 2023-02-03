<?php


if(isset($_POST["submit"]))

{

    echo "hola";
    $username =  $_POST["username"];
    $email =  $_POST["email"];
    $password  =  $_POST["password"];
    $passwordRepeat =  $_POST["passwordRepeat"];
    echo "hola";
    

    include "databaseConnect.php";
    include "databaseInteract.php";
    include "signupContr.php";
    echo "hola";
    

    $signup = new SignupContr($username,$email,$password,$passwordRepeat);
    
    $signup->allChecks();

    header("location: login.php");

    






    
}

//12345678