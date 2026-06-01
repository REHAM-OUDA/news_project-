<?php
include("db.php");

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO users(name,email,password)
              VALUES('$name','$email','$password')";

    mysqli_query($conn,$query);
    header("Location: login.php");
    exit();

    echo "Registered Successfully";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2 class="mb-4">Register</h2>

    <form method="POST">

        <input type="text"
               name="name"
               class="form-control mb-3"
               placeholder="Enter Name">

        <input type="email"
               name="email"
               class="form-control mb-3"
               placeholder="Enter Email">

        <input type="password"
               name="password"
               class="form-control mb-3"
               placeholder="Enter Password">

        <button type="submit"
                name="register"
                class="btn btn-success">

            Register

        </button>

    </form>

</body>
</html>