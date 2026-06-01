<?php

session_start();

include("db.php");

$category_query = "SELECT * FROM categories";
$category_result = mysqli_query($conn,$category_query);

if(isset($_POST['add_news'])){

    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $details = $_POST['details'];

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name,"uploads/".$image);

    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO news
              (title,category_id,details,image,user_id)
              VALUES
              ('$title','$category_id','$details','$image','$user_id')";

    mysqli_query($conn,$query);

    echo "News Added Successfully";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2 class="mb-4">Add News</h2>

<form method="POST" enctype="multipart/form-data">

    <input type="text"
           name="title"
           class="form-control mb-3"
           placeholder="Enter News Title">

    <select name="category_id"
            class="form-control mb-3">

        <option>Select Category</option>

        <?php

        while($row = mysqli_fetch_assoc($category_result)){

        ?>

        <option value="<?php echo $row['id']; ?>">

            <?php echo $row['category_name']; ?>

        </option>

        <?php
        }
        ?>

    </select>

<textarea name="details"
          class="form-control mb-3"
          placeholder="Enter News Details"></textarea>

<input type="file"
       name="image"
       class="form-control mb-3">

<button type="submit"
        name="add_news"
        class="btn btn-success">

    Add News

</button>
<a href="dashboard.php" class="btn btn-secondary">

    Back

</a>

</form>

</body>
</html>