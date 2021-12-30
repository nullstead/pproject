<?php
//including config file etc...
    require_once('globals.php');

    require_once(ROOT_PATH . '/xfiles/config.php');

    require_once(ROOT_PATH . '/xfiles/login_script.php');

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

     <!--links && scripts-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/index.css">
    <link rel="stylesheet" href="static/css/login.css">

</head>
<body>
    
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" >
            <div class="container-fluid">

                <a class="navbar-brand" id="logo" href="index.php">
                <span>_</span>pPrOjEcT
                </a>
                    
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" >
                    <span class="navbar-toggler-icon"></span>
                </button>
                

                <div class=" collapse navbar-collapse my-nav" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="register.php">Register</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

    <!--alert message-->

    <?php 
    //$login_err = "invalid username or password!";
    if(!empty($login_err)){
    echo '<div class="alert alert-danger">' . $login_err . '</div>';
    }

    ?>
    
    <div id="parent-form-div" class="container-fluid ">
        <div id="form-div" class="container ">
            <h1>Log in</h1>
            <p>Don't have an account? <a href="register.php">Register here!</a></p>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
                        <span class="<?php echo (empty($username_err))? '' : 'is-invalid'; ?>"><?php echo $username_err; ?></span>
                    <input type="password" name="password" placeholder="Password">
                        <span class="<?php echo (empty($password_err))? '' : 'is-invalid'; ?>"><?php echo $password_err; ?></span>
                        
                    <button type="submit" name="submit">LOGIN</button>
                </form>
        </div>
    </div>

    <!-------------------------------->
        <!--footer-->
    <div class="">
            <footer class="container-fluid">
                &copy; <?php echo date('Y'); ?>  <i>Designed with love by</i> <span style="color: red;"> Nullstead</span>
                
            </footer>
        </div>    

<!--links && scripts-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>