<?php
    session_start();

    if(!isset($_SESSION['id']) || $_SESSION['loggedin'] != true){
        header('location: ../login.php');
    } else {
        $student_id = $_SESSION['id'];
    }


    require_once 'config.php';

    $sql = "DELETE FROM infos WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $student_id);
    if($stmt->execute()){
        echo "<script>alert('success...!')</script>";
        header('location: ../portal.php');
    } else {
        echo "<script>alert('Fatal error...!')</script>";
    }


?>