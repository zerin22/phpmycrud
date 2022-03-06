<?php
    include_once('config.php');

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['create_post'])){
      $title = $_POST['post_title'];
      $description = $_POST['post_description'];

      $sql = "INSERT INTO posts (`title`, `description`) VALUES ('$title', '$description')";

      if($conn->query($sql) === TRUE){
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
          
          <form action="create.php" method="POST" class="mt-5">
              <div class="col-12 mb-3">
                  <label for="postTitle" class="form-label">Post Title</label>
                  <input id="postTitle" class="form-control" type="text" name="post_title" placeholder="Post Title" required >
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