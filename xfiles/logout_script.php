<?php 
    //initialize session
    session_start();
    
    //unset all session variables
    $_SESSION = array();

    //destroy session
    session_destroy();

    //redirect to login page or mayba home page
    header("location: ../index.php");

    exit;


?>