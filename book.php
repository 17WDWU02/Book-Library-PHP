<?php 
    require("templates/databaseConnection.php");
    $currentPage = "Book";

    $id = $_GET['id'];
    $sql = "SELECT books.id as bookID, title, year, description, name, authors.id as authorID FROM books INNER JOIN authors ON books.author_id = authors.id WHERE books.id = $id";
    $result = mysqli_query($dbc, $sql);
    if($result){
        $book = mysqli_fetch_array($result, MYSQLI_ASSOC);
    } else {
        die("Cannot get the data for the book");
    }



 ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php require("templates/styles.php"); ?>
    </head>
    <body>
        <div class="container">

        <?php require("templates/nav.php"); ?>

            <h2><?= $book['title'];?></h2>
            <h4><?= $book['name']; ?></h4>
            <p><small><?= $book['year'];?></small></p>
            <hr>
            <p><?= $book['description']; ?></p>

            <a href="editBooks.php?id=<?= $book['bookID']; ?>" class="btn btn-warning">Edit Book</a>

        </div>
        <?php require("templates/scripts.php"); ?>
    </body>
</html>
