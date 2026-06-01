<?php

session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1 class="mb-4">
        Welcome <?php echo $_SESSION['user_name']; ?>
    </h1>

    <div class="list-group">

        <a href="add_category.php"
           class="list-group-item list-group-item-action">

            Add Category

        </a>

        <a href="view_categories.php"
           class="list-group-item list-group-item-action">

            View Categories

        </a>

        <a href="add_news.php"
           class="list-group-item list-group-item-action">

            Add News

        </a>

        <a href="view_news.php"
           class="list-group-item list-group-item-action">

            View News

        </a>

        <a href="deleted_news.php"
           class="list-group-item list-group-item-action">

            Deleted News

        </a>

        <a href="logout.php"
           class="list-group-item list-group-item-action text-danger">

            Logout

        </a>
        
    </div>

</body>
</html>


