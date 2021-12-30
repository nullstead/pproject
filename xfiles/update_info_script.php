<?php
    //function update students infos
    function updateStudentInfos(){
        //using global $conn object in ths block
        global $conn;

        $id = $_SESSION['id'];
        
        $sql = "SELECT * FROM infos WHERE infos.student_id = $id ";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
           while($info = $result->fetch_assoc()){ 
            echo '
            <div class="container-fluid main "> 
            <div class="">
                <div class="container mt-5">
                    <div class="form-div">
                        <fieldset>
                            <legend>Update Info <span><a href="xfiles/infos_delete.php">Click to delete all infos</a></span></legend>
                            <form action=" ' . htmlspecialchars($_SERVER['PHP_SELF']) . '" method="post" enctype="multipart/form-data">
                            <div class="mb-3 mt-3">
                              <label for="firstname" class="form-label">First Name:</label>
                              <input type="text" class="form-control" id="firstname" name="firstname" value=" ' . $info['firstname'] . ' ">
                            </div>
        
                            <div class="mb-3 mt-3">
                                <label for="lastname" class="form-label">Last Name:</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value=" ' . $info['lastname'] . ' ">
                            </div>
    
                            <div class="mb-3 mt-3" >
                                <label for="dob" class="form-label">Date of Birth:</label>
                                <input type="date" id="birthday" name="dob" value=" ' . $info['dob'] . ' " required>
                            </div>
                            
                            <div class="mb-3 mt-3" >
                                <label for="comment">Bio:</label>
                                <textarea class="form-control" rows="5" id="bio" name="bio" value=" ' . $info['bio'] . ' "></textarea>
                            </div>

                            <div class="mt-3 mb-3">
                                <label for="dp">Upload Photo</label>
                                <input type="file" class="form-control mt-3" name="dp" required>
                            </div>
        
                           <div class="btn-div">
                                <button type="submit" name="submit" class="btn btn-danger"   >Submit</button>
                           </div>
                          </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
            ';
           }

        } else {

            header('location: portal.php');
        }
        
     

    }



//---------------------------------------------------------------------------

        //infos update processing

        //handling insertion of students info

    $student_id = $_SESSION[id];

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
      
       $sql = "UPDATE infos SET firstname = ?, lastname = ?, dob = ?, bio = ?, image = ? WHERE student_id = $student_id";
       
       if($stmt = $conn->prepare($sql)){
           $stmt->bind_param('sssss', $firstname, $lastname, $dob, $bio, $filename);
                if($stmt->execute()){
                 echo "<script>alert('Infos update successful...!')</script>"; 
                 
                } else {
                    echo "Fatal error!... Please try again later  $conn->error  ";
        }

       } else {
            echo "<script>alert('Fatal error!... Prepare err')</script>";
       }


       //pushing image into folder
    if($uploadOk == 0){
        echo "<script>alert(' checks went wrong!')</script>";
    } else {
        if(move_uploaded_file($tempname, $target_file)){
            echo "<script>alert(' Infos updated successfully...! ')</script>";
          header('location: portal.php');
        } else {
            echo "<script>alert('fatal!')</script>";
        }
    }

       

    }





//end-of-file
?>