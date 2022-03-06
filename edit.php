<?php
    include_once('config.php');

    if(!isset($_GET['id']) || !is_numeric($_GET['id']) || $_GET['id'] == NULL){
        echo "<script>window.location = 'index.php';</script>";
    }else{
        $post_id = $_GET['id'];
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update_post'])){
      $id = $_GET['id'];
      //$id = $post_id;  
      $title = $_POST['post_title'];
      $description = $_POST['post_description'];
      $updated_at = date('Y-m-d H:i:s');

      $sql = "UPDATE `posts`
             SET
             `title` = '$title',
             `description` = '$description',
             `updated_at` = '$updated_at'
             WHERE `id` = $id";

      if($conn->query($sql) === TRUE){
        header("location:index.php?id=$id");
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

    <title>Edit Post</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-6 offset-3">
          <div class="mt-5 float-end">
            <a href="index.php" class="d-block">All Posts</a>
          </div>

            <?php
                if(isset($_GET['id']) && is_numeric($_GET['id'])){
                    $id = $_GET['id'];

                    $sql = "SELECT * FROM `posts` WHERE `id` = $id";

                    $res = $conn->query($sql);

                    if($res->num_rows > 0){
                        $data = $res->fetch_assoc();
            ?>
                    <form action="" method="POST" class="mt-5">
                      <div class="col-12 mb-3">
                          <label for="postTitle" class="form-label">Post Title</label>
                          <input id="postTitle" class="form-control" type="text" name="post_title" placeholder="Post Title" value="<?php echo $data['title']; ?>" required >
                      </div>

                      <div class="col-12 mb-3">
                        <label for="postdescription" class="form-label">Description</label>
                        <textarea id="postdescription" class="form-control" name="post_description" cols="30" rows="5" placeholder="Post Description"><?php echo $data['description']; ?></textarea>
                      </div>

                      <div class="col-12">
                        <button type="submit" name="update_post" class="btn btn-primary float-end" value="POST">Update</button>
                      </div>

                      </form>
                    
            <?php
                    }else{
            ?>
                        <div class="alert alert-danger text-center" role="alert">
                            Post Not Found!;
                        </div>
                       
            <?php            
                    }
                }else{
            ?>
                    <div class="alert alert-danger text-center" role="alert">
                    Something went wrong! Please try again later!
                    </div>
                   
            <?php        
                }
            ?>
          
          
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