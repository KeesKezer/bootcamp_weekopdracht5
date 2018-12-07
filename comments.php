<?php
session_start();
 include_once("db.php");


     if(isset($_POST['post'])){
       $user_id = $_SESSION['userr_id'];
       $posts_id = $_GET['id'];
       $inhoud = strip_tags($_POST['content']);


       $title = mysqli_real_escape_string($db, $title);
       $inhoud = mysqli_real_escape_string($db, $inhoud);

       $category = mysqli_real_escape_string($db, $category);

       $sql = "INSERT into comments (comments_id, inhoud, user_id, posts_id) VALUES ('$comments_id', '$inhoud', '$user_id', '$posts_id')";

     if($content == "")
       echo "Vul commentaar in";
         return;
      }
       mysqli_query($db, $sql);


       header("Location: index.php");
     }
  ?>

  <!DOCTYPE html>
 <html>
   <head>
     <?php include 'header.php';?>
     <link rel="stylesheet" type="text/css" href="blog.css">
   <title>Blog Post</title>
   </head>
   <body>
     <form action ="post.php" method="post" enctype="multipart/form-data">
       <input placeholder="Title" name="title" type="text" autofocussize="48>"><br /><br />


       <textarea placeholder="inhoud" name="inhoud" rows="20" cols="50"></textarea><br />
       <input name="post" type="submit" value="Post">
     </form>
   </body>
 </html>
