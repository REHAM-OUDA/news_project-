<?php

include("db.php");

$id = $_GET['id'];

$query = "UPDATE news
          SET status='deleted'
          WHERE id='$id'";

mysqli_query($conn,$query);

header("Location: view_news.php");

?>