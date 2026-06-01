<?php

include("db.php");

$query = "SELECT * FROM categories";

$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2 class="mb-4">All Categories</h2>

<table class="table table-bordered">

    <tr>
        <th>ID</th>
        <th>Category Name</th>
    </tr>

    <?php

    while($row = mysqli_fetch_assoc($result)){

    ?>

    <tr>

        <td><?php echo $row['id']; ?></td>

        <td><?php echo $row['category_name']; ?></td>

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