<?php
    session_start();

    if(!isset($_SESSION['id']) || $_SESSION['loggedin'] != true){
        header('location: ../login.php');
    } else {
        $student_id = $_SESSION['id'];
    }

    require_once 'config.php';

   



?>