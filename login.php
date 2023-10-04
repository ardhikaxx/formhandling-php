<?php
require ('koneksi.php');
session_start();
if (isset($_POST['submit'])){
    $email=$_POST['txt_email'];
    $pass=$_POST['txt_pass'];
if (!empty(trim($email)) && !empty(trim($pass))){
    $query = "SELECT * FROM  user_detail WHERE user_email ='$email'";
    $result = mysqli_query($koneksi,$query);
    $num = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)){
        $id= $row ['id'];
        $userVal= $row ['user_email'];
        $passVal= $row ['user_password'];
        $userName=$row['user_fullname'];
        $level= $row ['level'];
    }
    if ($num!=0 ){
        if ($userVal==$email && $passVal==$pass){
            header ('Location:home.php');
        }else{
            $error ='user atau password salah!!';
            header('Location:login.php');
        }
    }else{
        $error='user tidak ditemukan!!';
            header('Location:login.php');
    }
}else{
    $error=' Data tidak boleh kosong';
    echo $error;
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            max-width: 400px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #007bff;
        }

        .form-control {
            border-radius: 50px;
        }

        .btn-login {
            background-color: #007bff;
            color: #fff;
            border-radius: 50px;
            padding: 10px 20px;
            width: 100%;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }

        .register-link {
            color: #007bff;
            text-decoration: none;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 login-container">
                <h2>Login</h2>
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" id="txt_email" name="txt_email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="txt_pass" name="txt_pass" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-login" name="submit">Sign In</button>
                </form>
                <?php
                if(isset($error)) {
                    echo '<div class="alert alert-danger mt-3">' . $error . '</div>';
                }
                ?>
                <p class="mt-3">Don't have an account? <a class="register-link" href="register.php">Register here</a></p>
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>