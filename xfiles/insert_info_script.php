<?php
    //handling insertion of students info

    $student_id = $_SESSION['id'];

    if(isset($_POST['submit'])){
       
        //text data
       $firstname = trim($_POST['firstname']);
       $lastname = trim($_POST['lastname']);
       $dob = trim($_POST['dob']);
       $bio = trim($_POST['bio']);

        //file variables
        // $target_dir = "uploads/";
        $filename = $_FILES['dp']['name'];
        $tempname = $_FILES['dp']['tmp_name'];
        $target_file = "static/uploads/img/" . $filename;
        $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $uploadOk = 1;

        //verifying image
        $check = getimagesize($tempname);
        if($check !== false){ //only returns true if file is an image
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo 'File not an image.';
            $uploadOk = 0;
        }

        //more checks to come :-)
      
       $sql = "INSERT INTO infos (student_id, firstname, lastname, dob, bio, image ) VALUES (?, ?, ?, ? , ? ,?)";
       
       if($stmt = $conn->prepare($sql)){
           $stmt->bind_param('isssss', $student_id, $firstname, $lastname, $dob, $bio, $filename);
                if($stmt->execute()){
                 echo "<script>alert('Success...')</script>";

                } else {
                    echo "<script>alert('Fatal error!... Please try again later')</script>";
        }

       } else {
            echo "<script>alert('Fatal error!... Prepare err')</script>";
       }


       //pushing image into folder
    if($uploadOk == 0){
        echo "<script>alert(' checks went wrong!')</script>";
    } else {
        if(move_uploaded_file($tempname, $target_file)){
          //  echo "<script>alert(' ". htmlspecialchars($tempname) . " has been uploaded successfully ')</script>";
        } else {
            echo "<script>alert('fatal!')</script>";
        }
    }

       

    }







?>