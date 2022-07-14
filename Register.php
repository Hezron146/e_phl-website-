<?php
$conn = mysqli_connect('localhost','root','','Data_Form') or die ("Data gagal terbaca". mysqli_connect_error());

if (isset($_POST['daftar'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    

    if ($password === $cpassword){
        $password=password_hash($password,PASSWORD_DEFAULT);
        $result=mysqli_query($conn,"SELECT username FROM Data_Approval WHERE username = '$username'");

        if (mysqli_fetch_assoc($result)){
            echo "<script>
                    alert('username ini telah digunakan!');
                    document.location.href = 'Register.php';
                </script>";
        }
        else{
            $sql = "INSERT INTO Data_Approval (username,password,email) VALUES ('$username','$password','$email')";
            $result=mysqli_query($conn,$sql);

            if (mysqli_affected_rows($conn)>0){
                echo "<script>
                        alert('Data berhasil diregistrasi!');
                        document.location.href = 'Login.php';
                    </script>";
            }
            else{
                echo "<script>
                    alert('Data gagal diregistrasi!');
                    document.location.href = 'Register.php';
                </script>";
            }
        }
    }
    else{
        echo"<script>
            alert('Konfimasi password anda tidak sesuai!');
            document.location.href = 'Register.php';
            </script>";
    }
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
<title>Register/opt/lampp/</title>
    
</head>
<body>
    <div class="wrapper">
        <div class="logo">
            <img src="https://play-lh.googleusercontent.com/ycA3YYBEZ_dzzZubelaUYPa6qIKkfmvY-c3tvf5-VgyEMBKJQRDG2rEjlEf5DnHAuw=w240-h480-rw" alt="Error image 404">
        </div>
        <div class="text-center mt-4 name">
        Register
        </div>
        <form method="post" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" required="" name="username"  placeholder="username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-envelope"></span>
                <input type="text" required="" name="email"  placeholder="Email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" placeholder="password" name="password" autocomplete="current-password" required="" id="id_password"><i class="fas fa-eye" id="togglePassword" style="margin-left: -35px; cursor: pointer;"></i>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" placeholder="Ulangi Password" name="cpassword" autocomplete="current-password" required="" id="id_password2"><i class="fas fa-eye" id="togglePassword2" style="margin-left: -35px; cursor: pointer;"></i>
            </div>
            <button type="submit" name="daftar" class="btn mt-3">Submit</button>
            
        </form>
        <script src="javascrip.js"></script>
        
        <!-- <div class="text-center fs-6">
            <a href="#">Forget password?</a> or <a href="#">Sign up</a>
        </div> -->
    </div>
</body>
</html>