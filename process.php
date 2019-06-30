<?php

$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

if(isset($_POST['create'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $mysqli->query("INSERT INTO data (title, content) VALUES('$title', '$content')") or die($mysqli->error);
}

?>