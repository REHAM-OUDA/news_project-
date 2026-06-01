<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include("db.php");

if(!isset($_GET['id'])){
    header("Location: view_news.php");
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = "SELECT * FROM news WHERE id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$category_query = "SELECT * FROM categories";
$category_result = mysqli_query($conn, $category_query);

if(isset($_POST['update_news'])){
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);

    if(!empty($_FILES['image']['name'])){
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_name, "uploads/".$image);
        
        $update_query = "UPDATE news SET title='$title', category_id='$category_id', details='$details', image='$image' WHERE id='$id'";
    } else {
       
        $update_query = "UPDATE news SET title='$title', category_id='$category_id', details='$details' WHERE id='$id'";
    }

    mysqli_query($conn, $update_query);
    header("Location: view_news.php");
    exit();
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

<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">News Title</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-control" required>
            <?php while($cat = mysqli_fetch_assoc($category_result)){ ?>
                <!-- تعديل هام: جعل الفئة الحالية مختارة تلقائياً -->
                <option value="<?php echo $cat['id']; ?>" <?php if($cat['id'] == $row['category_id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($cat['category_name']); ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">News Details</label>
        <textarea name="details" class="form-control" rows="5" required><?php echo htmlspecialchars($row['details']); ?></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">News Image (Leave empty to keep current)</label>
        <input type="file" name="image" class="form-control mb-2">
        <?php if($row['image']){ ?>
            <img src="uploads/<?php echo $row['image']; ?>" width="100" class="img-thumbnail">
        <?php } ?>
    </div>

    <button type="submit" name="update_news" class="btn btn-warning">Update News</button>
    <a href="view_news.php" class="btn btn-secondary">Cancel</a>
</form>

</body>
</html>
