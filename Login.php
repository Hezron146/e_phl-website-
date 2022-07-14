<?php
session_start();
$conn = mysqli_connect('localhost','root','','Data_Form') or die ("Data gagal terbaca". mysqli_connect_error());

if (isset($_SESSION['login'])) {
    header('Location: homepage.php');
    exit;
}

if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $cek_username = "SELECT * FROM Data_Approval WHERE username = '$username'";
    $result = mysqli_query($conn, $cek_username);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;

            echo "<script>
                alert('Login berhasil!');
                document.location.href = 'form/form.php';
            </script>";
        }
        else{
            echo"<script>
                alert('Password atau username salah');
            </script>";
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="style.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>Login</title>
    
</head>
<body>
    <div class="wrapper">
        <div class="logo">
            <img src="https://play-lh.googleusercontent.com/ycA3YYBEZ_dzzZubelaUYPa6qIKkfmvY-c3tvf5-VgyEMBKJQRDG2rEjlEf5DnHAuw=w240-h480-rw" alt="">
        </div>
        <div class="text-center mt-4 name">
            Login
        </div>
        <form method="post" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-envelope"></span>
                <input type="text" required="User harus terisi" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" placeholder="password" name="password" autocomplete="current-password" required="" id="id_password"><i class="fas fa-eye" id="togglePassword" style="margin-left: -35px; cursor: pointer;"></i>
            </div>
            <button type="submit" name="login" class="btn mt-3">Login</button>
            
        </form>
        <script src="javascrip.js"></script>
        
        <div class="text-center fs-6">
            <a href="#">Forget password?</a> or <a href="Register.php">Sign up</a>
        </div>
    </div>
</body>
</html>