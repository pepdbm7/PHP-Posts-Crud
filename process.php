<?php

$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

//post method (add new item to DB):
if(isset($_POST['create'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $mysqli->query("INSERT INTO data (title, content) VALUES('$title', '$content')") or die($mysqli->error);
}

//delete method (delete item from DB):
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error);
}
?>