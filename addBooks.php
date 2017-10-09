<?php 

    $currentPage = "Add Books";

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

            <h1>Add Books</h1>
            <hr>
            <form action="book.html" method="post">
                <div class="form-group">
                    <label for="title">Book Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="">
                </div>
                <div class="form-group">
                    <label for="year">Year Released</label>
                    <input type="number" class="form-control" id="year" name="year" placeholder="Year" value="">
                </div>
                <div class="form-group">
                    <label for="author">Author</label><br>
                    <!--  <label class="radio-inline"><input type="radio" name="authorid" value="1">J K Rowling</label> -->
                    <br>
                    <button type="button" name="button" id="addNewAuthor" class="btn btn-link">add new author</button>
                    <input type="text" class="form-control" id="author" name="author" placeholder="Author" value="">
                </div>
                <div class="form-group">
                    <label for="description">Book Description</label>
                    <textarea name="description" rows="8" cols="80" class="form-control" placeholder="Description of Book"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="button">Add Book</button>
                </div>
            </form>
        </div>
        <?php require("templates/scripts.php"); ?>
    </body>
</html>
