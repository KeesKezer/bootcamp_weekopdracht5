<?php
    session_start();
    include_once("db.php");
    $id = $_GET["blog_id"];
    $sql = "SELECT * FROM posts WHERE blog_id='$id' LIMIT 1";
    $res = mysqli_query($db, $sql) or die(mysqli_error($db));
    $posts = "";




    if(mysqli_num_rows($res) > 0) {
      while($row = mysqli_fetch_assoc($res)) {

        $pid = $row['blog_id'];
        $title = $row['title'];
        $content = $row['content'];
        $date = $row['date'];

      }
    }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <?php include 'header.php'; ?>
    <link rel="stylesheet" type="text/css" href="blog.css">
  <title>Blog Post</title>
  </head>
  <body>

    <h3>Edit</h3>
    <form action="edit_post.php" enctype="multipart/form-data" method="post" name="myForm" />
      <table>
        <tr>
          <td><b>Title</b></td>
          <td><input type="text" size="70" maxlength="100" name="title" value="<?php echo $title ?>"></td>
        </tr>
        <tr>
          <td><b>Content</b></td>
          <td><textarea cols="80" rows="18" name="content"><?php echo $content; ?></textarea></td>
        </tr>
      </table>
      <input type="hidden" name="id" value="<?php echo $pid; ?>" >
      <input name="enter" type="submit" value="Edit">
    </form>
  </body>
</html>


<?php

    if (isset($_POST['enter'])){
            if (!empty ($_POST['title'])){
                $title = $_POST['title'];
                $content = $_POST['content'];
                $pid= $_POST['id'];
                $sql2 = "UPDATE `posts` SET `title` = '$title', `content` = '$content' WHERE `posts`.`blog_id`= $pid";




                mysqli_query($db, $sql2);
                header("location:index.php");

            }
            else {
                echo "Er is een probleem opgetreden";
            }
    }
?>
