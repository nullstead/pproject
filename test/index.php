<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test | uploads</title>

    <!--links && scripts-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">

</head>
<body>
    <!--
    <div class="container-fluid main ">
        <div class="">
            <div class="container">
                <div class="form-div">
                    <form action="/action_page.php">
                        <div class="mb-3 mt-3">
                          <label for="firstname" class="form-label">First Name:</label>
                          <input type="text" class="form-control" id="firstname" name="firstname">
                        </div>
    
                        <div class="mb-3 mt-3">
                            <label for="lastname" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="lastname" name="lastname">
                        </div>

                        <div class="mb-3 mt-3" >
                            <label for="dob" class="form-label">Date of Birth:</label>
                            <input type="date" id="birthday" name="birthday">
                        </div>
                        
                        <div class="mb-3 mt-3" >
                            <label for="comment">Bio:</label>
                            <textarea class="form-control" rows="5" id="bio" name="bio"></textarea>
                        </div>
    
                       <div class="btn-div">
                            <button type="submit" class="btn btn-danger">Submit</button>
                       </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
-->

<?php 

    //using getimagesize() to confirm image by extension
    if(isset($_POST['submit'])){
    
         //file variables
    // $target_dir = "uploads/";
    $filename = $_FILES['dp']['name'];
    $tempname = $_FILES['dp']['tmp_name'];
    $target_file = "images/" . $filename;
    $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $uploadOk = 1;
        
        $det = trim($_POST['det']);
    //    echo "$filename <br> $tempname <br> $filetype <br> $target_dir" . basename($filename);

    
        $check = getimagesize($tempname);
        if($check !== false){ //only returns true if file is an image
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo 'File not an image.';
            $uploadOk = 0;
        }
    

        //more checks will come!

    //inserting image into database
    $conn = new mysqli("localhost", "phpmyadmin", "0101157029", "pproject");
    if($conn->connect_error){
        die("DB connection error!" . $conn->connect_error);
    }


   $sql = "INSERT INTO pics (images , det) VAlUES (?, ?)";
   $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $filename, $det);
    if($stmt->execute()){
        echo "<script>alert('Hurray!')</script>";
    } else {
        echo "<script>alert('population error')</script>";
    }
   

    //pushing image into folder
    if($uploadOk == 0){
        echo "<script>alert(' checks went wrong!')</script>";
    } else {
        if(move_uploaded_file($tempname, $target_file)){
            echo "<script>alert(' ". htmlspecialchars($tempname) . " has been uploaded successfully ')</script>";
        } else {
            echo "<script>alert('fatal!')</script>";
        }
    }


  

    }   

    


?>






<div class="container-fluid main ">
    <div class="">
        <div class="container">
            <div class="form-div">
                <fieldset>
                    <legend>Upload Photo ID</legend>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3 mt-3">
                                <label for="det" class="form-label">Description</label>
                                <input type="text" class="form-control" id="det" name="det" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="dp" required>
                                <button class="input-group-text" name="submit">Upload</button>
                            </div>
                            
                        </form>
                </fieldset>
            </div>
        </div>
    </div>
</div>



<!--links && scripts-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>