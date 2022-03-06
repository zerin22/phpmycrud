<?php
    include_once('config.php');

    if(!isset($_GET['id']) || !is_numeric($_GET['id']) || $_GET['id'] == NULL){
        echo "<script>window.location = 'index.php';</script>";
    }else{
        $post_id = $_GET['id'];

        $get_data = "SELECT * FROM `posts` WHERE `id` = $post_id";
        $res = $conn->query($get_data);

        if($res->num_rows >0){
            $sql = "DELETE FROM `posts` WHERE `id`= $post_id";
            
            if($conn->query($sql) === TRUE){
                header("location:index.php");
            }else{
                echo "Error:" .$conn->error;
            }
        }else{
            header("location:index.php");
        }
    }

    
?>


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

