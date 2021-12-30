<?php 
    //including config file etc...
    require_once('globals.php');
?>

<?php require_once(ROOT_PATH . '/xfiles/config.php'); ?>

<?php require_once(ROOT_PATH . '/xfiles/public_functions.php') ?>

<?php $infos = getVerifiedInfos(); ?>










<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome! John</title>

    <!--links && scripts-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/portal.css">
</head>

<!-------------------------------->
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
                            <a class="nav-link active" href="login.php">John Kponyo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Logout</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    

    <!-------------------------------->
    <!--main body-->
        <?php foreach($infos as $info):  ?>
            <div class="container-fluid main">
            <div class="row">
                <div class=" info-div mt-5" >
                    <div class="info-image">
                        <img src="<?php echo BASE_URL . '/static/uploads/img/' . $info['image']; ?>" alt="profile picture" height="auto" width="100%">
                    </div>
                    <div class="info-info mt-4">
                        <p>First Name: <?php echo $info['firstname']?></p>
                        <p>Last Name: <?php echo $info['lastname']?></p>
                        <p>Date of Birth: <?php echo $info['dob']?></p>
                        <p><b>Bio</b></p>
                        <p><?php echo $info['bio']?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    

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