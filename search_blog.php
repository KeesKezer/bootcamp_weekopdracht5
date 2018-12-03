<?php
  include_once ("db.php")


?>



<!DOCTYPE html>
<html>
 <head>
   <link rel="stylesheet" type="text/css" href="blog.css">
   <?php include 'header.php';?>
 <title>Blog Categorie</title>
 </head>
 <body>
    <form action="search_blog.php" method="GET">
    <input type="text" name="search" />
    <input type="submit" value="Search" />
    </form>
    <?php


    if (isset($_GET['search'])){
    $search = $_GET['search'];
    // gets value sent over search form





    $search = htmlspecialchars($search);


    $search = mysqli_real_escape_string($db, $search);


    $results = mysqli_query($db, "SELECT * FROM posts
            WHERE (`title` LIKE '%".$search."%') OR (`content` LIKE '%".$search."%')") or die(mysqli_error($db));
    $posts = "";
  
  }

    if(mysqli_num_rows($results) > 0){ // if one or more rows are returned do following

        while($row = mysqli_fetch_assoc($results)){
          $id = $row['id'];
          $title = $row['title'];
          $content = $row['content'];
          $date = $row['date'];


          $admin = "<div><a href = 'del_post.php?pid=$id'>Delete</a>&nbsp;<a href = 'edit_post.php?pid=$id'>Edit</a</div";


          $posts .=  "<div class = blog>
                      <h2><a href= 'view_post.php?id=$id'>$title</a></h2>
                      <h3>$date</h3>

                      <p>$content</p>$admin<hr />
                     </div>";

}

          echo $posts  ;
        } else {
          echo "Er zijn geen posts";
}
?>






 </body>
</html>
