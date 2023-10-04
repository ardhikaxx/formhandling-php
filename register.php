<?php
require ('koneksi.php');
if (isset($_POST['register'])){
    $userMail=$_POST['txt_email'];
    $userPass=$_POST['txt_pass'];
    $userName=$_POST['txt_nama'];


    $query="INSERT INTO user_detail VALUES ('','$userMail','$userPass','$userName',2)";
    $result =mysqli_query($koneksi, $query);
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Page</title>
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

        .register-container {
            max-width: 400px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            text-align: center;
        }

        .register-container h2 {
            margin-bottom: 20px;
            color: #007bff;
        }

        .form-control {
            border-radius: 50px;
        }

        .btn-register {
            background-color: #007bff;
            color: #fff;
            border-radius: 50px;
            padding: 10px 20px;
            width: 100%;
        }

        .btn-register:hover {
            background-color: #0056b3;
        }

        .login-link {
            color: #007bff;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 register-container">
                <h2>Register</h2>
                <form action="register.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" id="txt_nama" name="txt_nama" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="txt_email" name="txt_email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="txt_pass" name="txt_pass" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-register" name="register">Register</button>
                </form>
                <p class="mt-3">Already have an account? <a class="login-link" href="login.php">Login here</a></p>
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>