<?php

include("db.php");

$query = "SELECT news.*, categories.category_name
          FROM news
          JOIN categories
          ON news.category_id = categories.id
          WHERE status='deleted'";

$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Deleted News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2 class="mb-4">Deleted News</h2>

<table class="table table-bordered table-striped">

    <tr>

        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Details</th>
        <th>Image</th>

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