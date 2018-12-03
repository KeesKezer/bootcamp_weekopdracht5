<?php
include_once("db.php");
if (isset($_POST['submit'])){
    $cat = $_POST['cat'];
    $cat = strip_tags($_POST['cat']);

    $cat =mysqli_real_escape_string($db, $cat);



    $sql = "INSERT INTO categories (name) VALUES ('$cat')";

    if (!empty($_POST['cat'])){
        mysqli_query($db, $sql);
        header("Location: index.php");
    }
    else {
        echo "veld is leeg, geef de categorie een naam";
    }
}
?>
<!Doctype html>
<html>
<head>
  <form action="add_category.php" method="post">
    <input type="text" name="cat" placeholder="Categorie-naam">
    <input type="submit" name="submit" value="Voeg toe">
</form>
<title>Add categorie</title>
</head>

<body>

</body>

</html>
