<?php

include("db.php");

if(isset($_POST['add_category'])){

    $category_name = $_POST['category_name'];

    $query = "INSERT INTO categories(category_name)
              VALUES('$category_name')";

    mysqli_query($conn,$query);

    echo "Category Added Successfully";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2 class="mb-4">Add Category</h2>

    <form method="POST">

        <input type="text"
               name="category_name"
               class="form-control mb-3"
               placeholder="Enter Category Name">

        <button type="submit"
                name="add_category"
                class="btn btn-primary">

            Add Category

        </button>
        <a href="dashboard.php" class="btn btn-secondary">

            Back

        </a>

    </form>
    

</body>
</html>