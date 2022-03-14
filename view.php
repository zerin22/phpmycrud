<?php
    include_once('config.php');

    if(!isset($_GET['id']) || !is_numeric($_GET['id']) || $_GET['id'] == NULL){
        echo "<script>window.location = 'index.php';</script>";
    }else{
        $post_id = $_GET['id'];
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

    <title>View Post</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-6 offset-3">
          <div class="mt-2 float-end">
            <a href="index.php" class="d-block">All Posts</a>
          </div>

            <?php
                if(isset($_GET['id']) && is_numeric($_GET['id'])){
                    $id = $_GET['id'];

                    $sql = "SELECT * FROM `posts` WHERE `id` = $id";
                    
                    //"SELECT * FROM `posts` WHERE `id` = $id";

                    $res = $conn->query($sql);

                    if($res->num_rows > 0){
                        $data = $res->fetch_assoc();
            ?>
                    <img src="asset/img/<?php echo $data['image']; ?>" alt="" class="img-fluid">
                    <hr>
                    <div>
                        <h6 class="text-center">
                            <?php echo $data['title']; ?>|
                            Posted On: <?php echo date("F j, Y, g:i a", strtotime($data['created_at']));?>
                        </h6>
                    </div>
                    <p class="text-justify">
                         <?php echo $data['description']; ?>
                    </p>

                    
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