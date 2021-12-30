<?php 

//initialize the session
session_start();

//checking if user is already logged in. else redirected to home page
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    //redirects to homepage
    header("location: portal.php"); 
    exit;
}

//processing form data
$username = $password = "";
$username_err = $password_err = $login_err = "";

if(isset($_POST['submit'])){

    //username check
    if(empty(trim($_POST['username']))){
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST['username']);
    }

    //password check
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter your password";
    } else {
        $password = trim($_POST['password']);
    }


    //validating credentials
    if(empty($username_err) && empty($password_err)){
        //prepare select statement
        $sql = "SELECT id, username, role, password FROM users WHERE username = ?";

            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param('s', $username);

                if($stmt->execute()){
                    $stmt->store_result();

                    //checking if username exists
                    if($stmt->num_rows == 1){
                        $stmt->bind_result($id, $username, $role, $hashed_password);
                            if($stmt->fetch()){
                                if(password_verify($password, $hashed_password)){
                                    //password is correct... hence
                                    session_start();
                                    $_SESSION['loggedin'] = true;
                                    $_SESSION['id'] = $id;
                                    $_SESSION['username'] = $username;
                                    $_SESSION['user'] = $role;

                                    if($role == "Admin"){
                                        //redirection to admin dashboard
                                    header("location: admin/dashboard.php");
                                        
                                    } else {
                                        //redirection to the portal page
                                    header("location: portal.php");
                                    }

                                } else {    
                                    //displaying a generic error message
                                    $login_err = "Invalid username or password.";
                                }
                            } else {
                                $login_err = "fatal... unable to fetch data!";
                            }

                    } else {
                        $login_err = "Invalid username or password.";
                    }
                } 

            } else {
                $login_err = "Oops! Sorry... try again later";
            }

            //close statement
            $stmt->close();
    }




}

//close connection
$conn->close();




?>