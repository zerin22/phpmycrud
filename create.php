<?php
    include_once('config.php');

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['create_post'])){
      $title = $_POST['post_title'];
      $description = $_POST['post_description'];

      // echo "<pre>";
      //   print_r($_FILES['post_image']);
      // echo "</pre>";
      // exit();

      //UPLOADING FILE TO SERVER
      if(isset($_FILES["post_image"]) && $_FILES["post_image"]["error"] == 0){
        $allowed = array(
                  "jpg" => "image/jpg", 
                  "jpeg" => "image/jpeg",
                  "gif" => "image/gif", 
                  "png" => "image/png"
         );
        
        $filename = $_FILES["post_image"]["name"];
        $filetype = $_FILES["post_image"]["type"];//image extension checking
        $filesize = $_FILES["post_image"]["size"];

        //VALIDATE FILE EXTENSION
        $ext = pathinfo($filename, PATHINFO_EXTENSION);//JPG/JPEG/GIF/PNG
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
         
        // //VALIDATE FILE SIZE -700KB MAXIMUM
        // $maxsize = 10 * 1024 * 1024;
        // if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
         
        
        if(in_array($filetype, $allowed)){
          //Check wheather directory is exists
          $dir = "asset/img/";
          if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
          }
          //Generating unique filename
          $filename = str_shuffle(time()).'.'.$ext; 
        }else{
          echo "Error: There was a problem uploading your file. Please try again."; 
        }
        
      }else{
        echo "Error: " . $_FILES["post_image"]["error"];
      }
      
      $sql = "INSERT INTO `posts` (`title`, `description`, `image`)
               VALUES ('$title', '$description', '$filename')";

      if($conn->query($sql) === TRUE){

        //uploading file to server if post quiery is success
        if(file_exists($dir . $filename)){
          echo $filename . " is already exists.";
        }else{
          move_uploaded_file($_FILES["post_image"]["tmp_name"], $dir . $filename);
        }
        header("location:index.php");
      }else{
        echo "Error:" .$conn->error;
      }
    }

  
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>New Post</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-6 offset-3">
          <div class="mt-5 float-end">
            <a href="index.php" class="d-block">All Posts</a>
          </div>
          
          <form action="create.php" method="POST" class="mt-5" enctype="multipart/form-data">
              <div class="col-12 mb-3">
                  <label for="postTitle" class="form-label">Post Title</label>
                  <input id="postTitle" class="form-control" type="text" name="post_title" placeholder="Post Title" required >
              </div>

              <div class="col-12 mb-3">
                <label for="postImage" class="form-label">Post Image</label>
                <input id="postImage" class="form-control" type="file" name="post_image" placeholder="Post Image" required >
              </div>

              <div class="col-12 mb-3">
                <label for="postdescription" class="form-label">Description</label>
                <textarea id="postdescription" class="form-control" name="post_description" cols="30" rows="5" placeholder="Post Description"></textarea>
              </div>


              <div class="col-12">
                <button type="submit" name="create_post" class="btn btn-primary float-end" value="POST">Submit</button>
              </div>

          </form>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>