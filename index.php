<?php 
    require("templates/databaseConnection.php");
    $currentPage = "";

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

            <h1>View Books</h1>
                <table class="table table-striped">
                    <thead>
                        <td>Title</td>
                        <td>Author</td>
                        <td>Description</td>
                        <td>Year Released</td>
                    </thead>
                    <tbody>
 <!--                        <tr>
                            <td><a href="book.php">Harry Potter</a></td>
                            <td>J K Rowling</td>
                            <td>First Book in the Harry Potter Series.</td>
                            <td>1997</td>
                        </tr> -->
                    </tbody>
                </table>
                <a href="addBooks.php" class="btn btn-primary">Add Books</a>
        </div>
        <?php require("templates/scripts.php"); ?>
    </body>
</html>
