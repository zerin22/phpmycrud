<?php
    include_once('config.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PHPMYCRUD</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-10 offset-1">
          <div class="mt-5 float-md-end">
            <a href="create.php">NEW POST</a>
          </div>
          <table class="table table table-striped">
              <tr>
                <th>Post Title</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
              <?php
                $sql = "SELECT * FROM posts ORDER BY `id` DESC";
                $res = $conn->query($sql);
                
                if($res->num_rows > 0){
                  //OUTPUT DATA FROM EACH ROW
                  while($row = $res->fetch_assoc()){
                ?>
                    <tr>
                      <td><?php echo $row['title'];?></td>
                      <td><?php echo $row['description'];?></td>
                      <td>
                        <a href="view.php?id=<?php echo $row['id'];?>" class="btn btn-info">View</a>|
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>|
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                <?php
                  }
                }else{
                 ?>
                    <tr>
                      <td colspan="3" class="text-center text-danger">Post Not Found!</td>
                    </tr>
                 <?php 
                }

              ?>
              
          </table>
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