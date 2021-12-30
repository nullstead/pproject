<?php
    
    /*
    *------holds all public functions
    */

    //function that returns all student infos
    function getStudentInfos(){
        //using global $conn object in ths block
        global $conn;

        $id = $_SESSION['id'];
        
        $sql = "SELECT * FROM infos WHERE infos.student_id = $id ";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
           while($info = $result->fetch_assoc()){ 
             echo '
                <div class="container-fluid main">
                    <div class="row">
                        <div class=" info-div mt-5" >
                            <div class="info-image">
                                <img src=" '. BASE_URL . '/static/uploads/img/' . $info['image'] . ' " alt="profile picture" height="auto" width="100%">
                            </div>
                            <div class="info-info mt-4">
                                <p>First Name: ' . $info['firstname'] . '</p>
                                <p>Last Name: ' . $info['lastname'] . '</p>
                                <p>Date of Birth: ' . $info['dob'] . '</p>
                                <p><b>Bio</b></p>
                                <p> ' .  $info['bio'] . '</p>
                                <br><hr>
                                <p><a href="portal-update.php">Update Info</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            ';
           }

        } else {

            echo '
            <div class="container-fluid main ">
            <div class="">
                <div class="container mt-5">
                    <div class="form-div">
                        <fieldset>
                            <legend>Insert Info</legend>
                            <form action=" ' . htmlspecialchars($_SERVER['PHP_SELF']) . '" method="post" enctype="multipart/form-data">
                            <div class="mb-3 mt-3">
                              <label for="firstname" class="form-label">First Name:</label>
                              <input type="text" class="form-control" id="firstname" name="firstname" required>
                            </div>
        
                            <div class="mb-3 mt-3">
                                <label for="lastname" class="form-label">Last Name:</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required>
                            </div>
    
                            <div class="mb-3 mt-3" >
                                <label for="dob" class="form-label">Date of Birth:</label>
                                <input type="date" id="birthday" name="dob" required>
                            </div>
                            
                            <div class="mb-3 mt-3" >
                                <label for="comment">Bio:</label>
                                <textarea class="form-control" rows="5" id="bio" name="bio"></textarea>
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
            
     

    }

?>
