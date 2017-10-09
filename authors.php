<?php 

    $currentPage = "Authors";

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

            <h1>View Authors</h1>

            <table class="table table-striped">
                <thead>
                    <td>Author</td>
                    <td>Number of Books</td>
                    <td></td>
                    <td></td>
                </thead>
                <tbody>
                      <!--   <tr>
                            <td>
                                <form class="inline" action="" method="post">
                                    <span class="authorName">J K Rowling</span>
                                </form>
                            </td>
                            <td>5</td>
                            <td><button class="btn btn-warning updateAuthor" name="button">Edit Author</button></td>
                            <td><a class="btn btn-danger" href="">Delete Author</a></td>
                        </tr> -->
                </tbody>
            </table>
            <a href="addAuthors.php" class="btn btn-primary">Add Authors</a>


        </div>
        <?php require("templates/scripts.php"); ?>
    </body>
</html>
