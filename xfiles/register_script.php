<?php 


    #THE REGISTRATION FORM PROCESSOR

    #form data variables
    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";

    #processing form data upon submission
    if(isset($_POST["submit"])){
        
        //validating username
        if(empty(trim($_POST['username']))){
            $username_err = "Please enter username";
        } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST['username']))){
            $username_err = "Username can only contain letters, numbers, and underscores.";
        } else {
            //preparing a select statement
            $sql = "SELECT id FROM users WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', trim($_POST['username']));
                if($stmt->execute()){
                    $stmt->store_result();
                        if($stmt->num_rows == 1){
                            $username_err = "This username is already taken.";
                        } else {
                            $username = trim($_POST['username']);
                        }
                } else {
                    echo "Oops! something went wrong. please try again later. (select statement)";
                }
            //closes statement
            $stmt->close();
        }

        //validating password
        if(empty(trim($_POST['password']))){
            $password_err = "Please enter password";
        } elseif(strlen(trim($_POST['password'])) < 6){
            $password_err = "Password must contain at least 6 characters.";
        } else {
            $password = trim($_POST['password']);
        }


         //validating confirmed password
        if(empty(trim($_POST['confirm_password']))){
            $confirm_password_err = "Please confirm password.";
        } else {
            $confirm_password = trim($_POST['confirm_password']);
                if(empty($password_err) && ($password != $confirm_password)){
                    $confirm_password_err = "Password did not match.";
                }
        }



         //Checking input errors before inserting into the database
         if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
             //preparing an insert statement
             $sql = "INSERT INTO users (username, password , role) VALUES(?, ?, ?)";
                if($stmt = $conn->prepare($sql)){
                    //hashing password
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $role = "Student";
                    $stmt->bind_param('sss', $username, $hashed_password, $role);
                        if($stmt->execute()){
                            //redirects to login page
                            header("location: login.php");
                        }else {
                            echo "Oops! something went wrong. please try again later. (password)";
                        }

                } else {
                    echo "Oops! something went wrong. please try again later (insert statement)."; 
                }

                //closes statement
                $stmt->close();     

         }

    }

?>