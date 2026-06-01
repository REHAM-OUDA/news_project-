<?php

session_start();

include("db.php");

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users 
              WHERE email='$email' 
              AND password='$password'";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];

        header("Location: dashboard.php");

    }else{

        echo "Invalid Email or Password";

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-4">

            <div class="card p-4">

                <h2 class="text-center mb-4">
                    Login
                </h2>

                <form method="POST">

                    <input type="email"
                           name="email"
                           class="form-control mb-3"
                           placeholder="Enter Email">

                    <input type="password"
                           name="password"
                           class="form-control mb-3"
                           placeholder="Enter Password">

                    <button type="submit"
                            name="login"
                            class="btn btn-primary w-100">

                        Login

                    </button>
                    <br><br>

                    <a href="register.php" class="btn btn-success">

                        Create New Account

                    </a>

                </form>

            </div>

        </div>

    </div>

</body>

</body>
</html>