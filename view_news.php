<?php

include("db.php");

$query = "SELECT news.*, categories.category_name
          FROM news
          JOIN categories
          ON news.category_id = categories.id
          WHERE status='active'";

$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2 class="mb-4">All News</h2>

<table class="table table-bordered table-striped">

    <tr>

        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Details</th>
        <th>Image</th>
        <th>Actions</th>

    </tr>

    <?php

    while($row = mysqli_fetch_assoc($result)){

    ?>

    <tr>

        <td>
            <?php echo $row['id']; ?>
        </td>

        <td>
            <?php echo $row['title']; ?>
        </td>

        <td>
            <?php echo $row['category_name']; ?>
        </td>

        <td>
            <?php echo $row['details']; ?>
        </td>

        <td>

            <img src="uploads/<?php echo $row['image']; ?>"
                 width="100">

        </td>

        <td>

<a href="edit_news.php?id=<?php echo $row['id']; ?>"
   class="btn btn-primary btn-sm">

   Edit

</a>

<a href="delete_news.php?id=<?php echo $row['id']; ?>"
   class="btn btn-danger btn-sm">

   Delete

</a>

        </td>

    </tr>

    <?php
    }
    ?>

</table>
<a href="dashboard.php" class="btn btn-secondary">

    Back

</a>
</body>
</html>