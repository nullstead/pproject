<?php 
    /**Database connection file */

    #database credentials
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'phpmyadmin');
    define('DB_PASSWORD', '0101157029');
    define('DB_NAME', 'admin_panel');

    #making connection
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if($conn->connect_error){
            die("fatal error... unable to process website" . $conn->connect_error);
        } /* else {
            echo "Success";
        } */

?>  
