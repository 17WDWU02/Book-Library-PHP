<?php 
	require("templates/databaseConnection.php");
	$currentPage = "Edit Books";
	$id = $_GET['id'];

	if($_POST){
		extract($_POST);
		$book = $_POST;
		$errors = array();

		if(!$title){
			array_push($errors, "Please enter a title");
		} else if(strlen($title) < 1){
			array_push($errors, "Please enter more than 1 characters into the title");
		} else if(strlen($title) > 100){
			array_push($errors, "Cant be more than 100 characters");
		}

		if(!$description){
			array_push($errors, "Please enter a description");
		}

		if(!$year){
			array_push($errors, "Please enter a year");
		}

		if($author){
			if(empty($errors)){
				$sql = "INSERT INTO authors VALUES(NULL, '$author')";
				$result = mysqli_query($dbc, $sql);
				if($result && mysqli_affected_rows($dbc) > 0){
					$authorid = $dbc->insert_id;
				} else {
					die("Cannot add authors to the database");
				}
			}
		} else {
			if(!isset($authorid)){
				array_push($errors, "Please check an author, or add a new one");
			}
		}

		if(empty($errors)){
			$title = mysqli_real_escape_string($dbc, $title);
			$year = mysqli_real_escape_string($dbc, $year);
			$description = mysqli_real_escape_string($dbc, $description);
			$sql = "UPDATE `books` SET `title`='$title',`year`='$year',`description`='$description',`author_id`='$authorid' WHERE id = $id";
			$result = mysqli_query($dbc, $sql);
			if($result){
		   		header("Location: book.php?id=$id");
		   	} else{
		   		die("Something went wrong, can't update entry into database");
			}
		}

	} else {
		$sql = "SELECT books.id as bookID, title, year, description, name, authors.id as authorid FROM books INNER JOIN authors ON books.author_id = authors.id WHERE books.id = $id";
	    $result = mysqli_query($dbc, $sql);
	    if($result){
	        $book = mysqli_fetch_array($result, MYSQLI_ASSOC);
	    } else {
	        die("Cannot get the data for the book");
	    }

	}

	

    $sql = "SELECT * FROM `authors`";
    $result = mysqli_query($dbc, $sql);
    if(!$result){
        die("Something went wrong, can't get authors");
    } else {
        $allAuthors = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
 ?>

 <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<?php require("templates/styles.php"); ?>
		<?php if(isset($author)): ?>
			<style type="text/css">
				#author{
					display: block;
				}
			</style>
		<?php endif; ?>
	</head>
	<body>
		<div class="container">

			<?php require("templates/nav.php"); ?>

			<h1>Edit Book - <?= $book['title']; ?></h1>
			<hr>

			<?php if($_POST): ?>
				<div class="alert alert-danger">
					<ul>
						<?php foreach($errors as $singleError): ?>
							<li><?= $singleError; ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<form action="editBooks.php?id=<?=$id;?>" method="post">
				<div class="form-group">
					<label for="title">Book Title</label>
					<input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?=$book['title']; ?>">
				</div>
				<div class="form-group">
					<label for="year">Year Released</label>
					<input type="number" class="form-control" id="year" name="year" placeholder="Year" value="<?=$book['year']; ?>">
				</div>
				<div class="form-group">
					<label for="author">Author</label><br>
					<?php foreach($allAuthors as $singleAuthor): ?>
						<label class="radio-inline"><input type="radio" <?php if($book['authorid'] == $singleAuthor['id']): ?>checked<?php endif; ?> name="authorid" value="<?= $singleAuthor['id']; ?>"><?= $singleAuthor['name']; ?></label>
					<?php endforeach; ?>
					<br>
					<button type="button" name="button" id="addNewAuthor" class="btn btn-link">add new author</button>
					<input type="text" class="form-control" id="author" name="author" placeholder="Author" value="">
				</div>
				<div class="form-group">
					<label for="description">Book Description</label>
					<textarea name="description" rows="8" cols="80" class="form-control" placeholder="Description of Book"><?=$book['description']; ?></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary" name="button">Edit Book</button>
				</div>
			</form>
		</div>
		<?php require("templates/scripts.php"); ?>
	</body>
</html>