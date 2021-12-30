<?php 
    session_start();

     //making sure user logs in before accessing this page
     if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
        header("location: login.php");
        exit;
    }

    //including config file etc...
    require_once('globals.php');
?>

<?php require_once(ROOT_PATH . '/xfiles/config.php'); ?>

<?php require_once(ROOT_PATH . '/xfiles/update_info_script.php'); ?>






<!--=================================================================================-->
<!--=================================================================================-->
<!--=================================================================================-->




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | <?php echo $_SESSION['username']; ?></title>

    <!--links && scripts-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/portal.css">
    <link rel="stylesheet" href="static/css/portal-update.css">

</head>

<!-------------------------------->
<body>
   
    
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top" >
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
                            <a class="nav-link active" href="#"><?php echo $_SESSION['username']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="../xfiles/logout_script.php">Logout</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    

    <!-------------------------------->
    <!--main body-->
       
    <?php 
        updateStudentInfos();
    ?>
       
    

    <!-------------------------------->
    <!--footer-->
    <div class="mt-5">
        <footer class="container-fluid">
            &copy; <?php echo date('Y'); ?>  <i>Designed with love by</i> <span style="color: red;"> Nullstead</span>
        </footer>
    </div>    

    <!--links && scripts-->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
<!-------------------------------->

</html> 