<?php 
    //including config file etc...
    require_once('globals.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Welcome</title>

    <!--links && scripts-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/index.css">
    <link rel="stylesheet" href="static/css/content.css">
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
                            <a class="nav-link active" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="register.php">Register</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    

    <!-------------------------------->
    <!--main body-->
    
    <section class="video_container">
			<video autoplay loop muted src="./static/videos/background.mp4"></video>
			<div class="overlay"></div>

			<section class="content_container">
				<h1 class="title_1">_pPrOjEcT</h1><br><br>
				<h3 class="title_2">Improvised 90%</h3>
				<div class="title_3">By: Nullstead</div>
				<button class="dive_button"><a href="login.php" >Let's dive in...</a></button>
			</section>
		</section>
    
    
    

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
<!-------------------------------->

</html> 