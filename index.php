<?php
session_start();
include_once("db.php");
?>

<!Doctype html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="blog.css">
    <title>Blog</title>
    <?php include 'header.php';?>
    <div id="google_translate_element"></div>

    <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'nl'}, 'google_translate_element');
    }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <br>
    <br>
    <br>
    <div class = "form">
      <form action="index.php" method="GET" >
        <select name="sorteer">
        <option>Sorteer op</option>
        <option value="Sport">filter op Sport</option>
        <option value="Internet">filter op Internet</option>
        <option value="Nieuws">filter op Nieuws</option>
        <option value="Werk">filter op Werk</option>
        </select>
        <input type="submit" name="filter" value="Update">
      </form>
    </div>

  </head>

  <body>


    <?php

    if (isset($_GET['sorteer'])){
    $sort = $_GET["sorteer"];

      switch ($sort){

          case "Sport";
              $sql = "SELECT * FROM posts INNER JOIN categories on  posts.category_id = categories.id WHERE categories.id = 1  ";
              echo "U ziet alleen posts van de Sport categorie";
              break;
            case "Internet";
                $sql = "SELECT * FROM posts INNER JOIN categories on  posts.category_id = categories.id WHERE categories.id = 2  ";
                echo "U ziet alleen posts van de Internet categorie";
                break;

            case "Nieuws";
                $sql = "SELECT * FROM posts INNER JOIN categories on  posts.category_id = categories.id WHERE categories.id = 3 ";
                echo "U ziet alleen posts van de Nieuws categorie";
                break;
            case "Werk";
                $sql = "SELECT * FROM posts INNER JOIN categories on  posts.category_id = categories.id WHERE categories.id = 4 ";
                echo "U ziet alleen posts van de Werk categorie";
                break;
            default:
              $sql = "SELECT * FROM posts INNER JOIN categories on  posts.category_id = categories.id  ";
            }
        }  else {
          $sql = "SELECT * FROM posts INNER JOIN categories on  posts.category_id = categories.id  ";
          }


      $res = mysqli_query($db, $sql) or die(mysqli_error($db));
      $posts = "";



      if(mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_assoc($res)) {

          $id = $row['id'];
          $title = $row['title'];
          $content = $row['content'];
          $date = $row['date'];
          $cat = $row['name'];

          $admin = "<div><a href = 'del_post.php?pid=$id'>Delete</a>&nbsp;<a href = 'edit_post.php?pid=$id'>Edit</a</div";


          $posts .=  "<div class = blog>
                      <h2><a href= 'view_post.php?id=$id'>$title</a></h2>
                      <h3>$date</h3>
                      <h4>$cat</h4>
                      <p>$content</p>$admin<hr />
                     </div>";
          }

          echo $posts  ;
        } else {
          echo "Er zijn geen posts";
        }


     ?>
     <form>
      <select>
     <?php echo $cat; ?>
     </select>
     </form>

  </body>
<html>
