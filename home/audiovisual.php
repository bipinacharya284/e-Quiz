<?php
    require_once("../connect.php");
    session_start();
    $ques_err="";
 if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  if(isset($_POST['ques_upload'])){
       $maxsize = 21474836489922567774; 
 
       $name = $_FILES['file']['name'];
       $target_dir = "../videos/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("jpg","avi","png","flv","mpeg","mp3","mp4","mkv");
       $ques=$_POST['ques'];
       $answer=$_POST['ans'];
       $adm=$_SESSION['username'];

       // Check extension
       if( in_array($videoFileType,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
            echo "File too large.";
          }else{

            $sql1 = "SELECT * FROM audiovisual WHERE Question = '$ques'";
        
        if($stmt = mysqli_prepare($conn, $sql1)){
            // Bind variables to the prepared statement as parameters
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                
                  $ques_err="Question is repeted.";
                } else{

            // Upload
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
              // Insert record

              $query = "INSERT INTO audiovisual(Question,Question_target,Answer,Admin) VALUES('$ques','$target_file','$answer','$adm')";
              if(mysqli_query($conn,$query)){
              echo'  <div class="alert alert-success">
                      Record Added sucessfully.
                    </div>';
            }else{
              echo "Coulnot Upload";
            }
            }
         
          }
        }



          }

       }
     }else{
          echo "Invalid file extension.";
       }
 }
   
   }else{
header("location: ../index.php");
   die();
   }
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Question Pannel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Audiovisual Question Pannel</h2>
  <form action="" method="POST"  enctype='multipart/form-data'>
    <div class="form-group">
      <label for="email">Question</label>
      <textarea class="form-control" id="email" placeholder="Enter Question" name="ques" required></textarea>
      <label><p style="color:Tomato;"><?php echo$ques_err; ?></p></label>
    </div>
   <input type="file" id="myFile" name="file" required>
    <div class="form-group">
      <label for="pwd">Answer</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Answer" name="ans" required>
    </div>
    <input type="submit" class="btn btn-primary" name="ques_upload" value="Submit">
  </form>
    <br><a href="addform.php"><button type="submit" class="btn btn-primary">Back</button></a>
</div>

</body>
</html>