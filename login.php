<?php

session_start();

include "includes/connection.php";

$error = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users
              WHERE username='$username'
              AND password='$password'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){

        $_SESSION['username'] = $username;

        header("Location: dashboard.php");
        exit();

    }else{

        $error = "Invalid username or password.";

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FCMS Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{

    background:linear-gradient(135deg,#0d6efd,#6610f2);

    height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    font-family:Arial, Helvetica, sans-serif;

}

.login-card{

    width:420px;

    border:none;

    border-radius:15px;

    overflow:hidden;

    box-shadow:0 10px 30px rgba(0,0,0,.3);

}

.card-header{

    background:#212529;

    color:white;

    text-align:center;

    padding:25px;

}

.card-header i{

    font-size:60px;

}

.card-body{

    padding:30px;

}

.form-control{

    height:50px;

}

.btn-login{

    height:50px;

    font-size:18px;

}

.footer{

    text-align:center;

    margin-top:20px;

    color:#6c757d;

    font-size:14px;

}

</style>

</head>

<body>

<div class="card login-card">

<div class="card-header">

<i class="bi bi-heart-pulse-fill"></i>

<h3 class="mt-3">FCMS Login</h3>

<p class="mb-0">Funeral Contribution Management System</p>

</div>

<div class="card-body">

<?php if($error != ""){ ?>

<div class="alert alert-danger">

<?php echo $error; ?>

</div>

<?php } ?>

<form method="POST">

<div class="mb-3">

<label class="form-label">Username</label>

<div class="input-group">

<span class="input-group-text">

<i class="bi bi-person-fill"></i>

</span>

<input
type="text"
name="username"
class="form-control"
placeholder="Enter Username"
required>

</div>

</div>

<div class="mb-3">

<label class="form-label">Password</label>

<div class="input-group">

<span class="input-group-text">

<i class="bi bi-lock-fill"></i>

</span>

<input
type="password"
name="password"
class="form-control"
placeholder="Enter Password"
required>

</div>

</div>

<div class="d-grid">

<button
type="submit"
name="login"
class="btn btn-primary btn-login">

<i class="bi bi-box-arrow-in-right"></i>

Login

</button>

</div>

</form>

<div class="footer">

© 2026 Funeral Contribution Management System

</div>

</div>

</div>

</body>

</html>