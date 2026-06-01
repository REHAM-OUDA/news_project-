<?php

include("db.php");

$id = $_GET['id'];

$query = "SELECT * FROM news WHERE id='$id'";

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_assoc($result);

$category_query = "SELECT * FROM categories";

$category_result = mysqli_query($conn,$category_query);

if(isset($_POST['update_news'])){

    $title = $_POST['title'];

    $category_id = $_POST['category_id'];

    $details = $_POST['details'];

    $update_query = "UPDATE news
                     SET title='$title',
                     category_id='$category_id',
                     details='$details'
                     WHERE id='$id'";

    mysqli_query($conn,$update_query);

    header("Location:view_news.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2 class="mb-4">Edit News</h2>

<form method="POST">

   <input type="text"
       name="title"
       value="<?php echo $row['title']; ?>"
       class="form-control mb-3">
    <br><br>

    <select name="category_id"
        class="form-control mb-3">

        <?php

        while($cat = mysqli_fetch_assoc($category_result)){

        ?>

        <option value="<?php echo $cat['id']; ?>">

            <?php echo $cat['category_name']; ?>

        </option>

        <?php
        }
        ?>

    </select>

    <br><br>

    <textarea name="details"
          class="form-control mb-3"><?php echo $row['details']; ?></textarea>
    <br><br>

    <button type="submit"
        name="update_news"
        class="btn btn-warning">

    Update News

</button>

</form>

</body>
</html>