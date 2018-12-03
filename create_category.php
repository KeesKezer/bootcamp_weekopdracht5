<?php
  

    include_once("db.php");

    if(isset($_POST['post'])){

      $category= strip_tags($_POST['name']);

      $category = mysqli_real_escape_string($db, $category);

      $sql = "INSERT into categories (name) VALUES ('$category')";

      if($category == "") {
        echo "Vul de velden in";
        return;
      }
      mysqli_query($db, $sql);

      header("Location: index.php");
    }
 ?>

 <!DOCTYPE html>
<html>
  <head>
  <title>Blog Categorie</title>
  </head>
  <body>
    <form action =create_category.php" method="post" enctype="multipart/form-data">
      <
      <input placeholder="Category" name="name" type="text" autofocussize="48>"><br /><br />

      <input name="post" type="submit" value="submit">
    </form>
  </body>
</html>
