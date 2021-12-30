
<?php
    /*
    *------holds all public functions
    */

    //function that returens all verified infos
    function getVerifiedInfos(){
        //using global $conn object in ths block
        global $conn;
        
        $sql = "SELECT * FROM infos WHERE verified = true ";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $infos = $result->fetch_all(MYSQLI_ASSOC);
            return $infos;
        } else {
            $infos_err = "No verified infos yet!";
            return $infos_err;
        }

    }

?>