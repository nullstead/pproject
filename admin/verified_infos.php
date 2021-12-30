<?php
    //initialize the session
session_start();

//making sure user logs in before accessing this page
if($_SESSION['loggedin'] != true || $_SESSION['user'] != "Admin"){
    header("location: ../login.php");
    exit;
}

//including other php files
require_once('../globals.php');
require_once(ROOT_PATH . '/xfiles/config.php');


function getVerifiedInfos(){ 

    global $conn;

    $sql = "SELECT * FROM infos WHERE verified = 1";
    $result = $conn->query($sql);

    $infos = $result->fetch_all(MYSQLI_ASSOC);

        return $infos;
}


?>

<?php $infos = getVerifiedInfos(); ?>

<!--=================================================================================-->
<!--=================================================================================-->
<!--=================================================================================-->



<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>

    <!--links && scripts-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/dashboard.css">

</head>


<body>

<!------------------------------------>

<nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top" >
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
                            <a class="nav-link active" href="#"><?php echo 'Admin: [' . $_SESSION['username'] .']' ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo BASE_URL . '/xfiles/logout_script.php' ?>">logout</a>
                        </li>
                    </ul>
                </div>
 
            </div>
        </nav>

<!-------------------------------->
<!--main body-->


    
    <div class="main">
        <div class="container-fluid"> <!--rows wrapper-->
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="head-3">
                            <h3>Dashboard</h3>
                        </div>
                    </div>
                </div>
            </div>
<?php foreach ($infos as $info): ?>
    <div class="container-fluid main">
                    <div class="row">
                        <div class=" info-div mt-5" >
                            <div class="info-image">
                                <img src="<?php echo BASE_URL . '/static/uploads/img/' . $info['image'] ?> " alt="profile picture" height="auto" width="100%">
                            </div>
                            <div class="info-info mt-4">
                                <p>First Name: <?php echo $info['firstname']; ?></p>
                                <p>Last Name: <?php echo $info['lastname']; ?></p>
                                <p>Date of Birth: <?php echo $info['firstname']; ?> </p>
                                <p><b>Bio</b></p>
                                <p> <?php echo $info['bio'] ?></p>
                                <br><hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div><hr style="color: darkblue; margin-right:%; margin-left:%; text-align: center; height: 5px;" >
        </div><!--end of rows wrapper-->
    </div>

<?php endforeach ?>

    







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