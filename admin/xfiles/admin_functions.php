<?php
    // admin functions 
    function getAllInfos(){ 

        global $conn;

        $sql = "SELECT * FROM infos";
        $result = $conn->query($sql);

        $infos = $result->fetch_all(MYSQLI_ASSOC);

            return $infos;
    }






?>