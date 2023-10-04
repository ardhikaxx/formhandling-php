<?php
require('koneksi.php');
if (isset($_POST['update'])) {
    $userId = $_POST['txt_id'];
    $userMail = $_POST['txt_email'];
    $userPass = $_POST['txt_pass'];
    $userName = $_POST['txt_nama'];

    $query = "UPDATE user_detail SET user_password='$userPass', user_fullname='$userName' WHERE user_email ='$userMail'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header('Location: home.php');
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }
}

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id !== null) {
    $query = "SELECT * FROM user_detail WHERE id='$id'";
    $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $userId = $row['id'];
            $userMail = $row['user_email'];
            $userPass = $row['user_password'];
            $userName = $row['user_fullname'];
        }
    } else {
        echo "No user found with the provided ID";
    }
} else {
    echo "No ID provided";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 30px;
        }

        .edit-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            text-align: center;
        }

        .edit-container h2 {
            margin-bottom: 20px;
            color: #007bff;
        }

        .form-control {
            border-radius: 50px;
        }

        .btn-update {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px;
            padding: 10px 20px;
            width: 100%;
        }

        .btn-update:hover {
            background-color: #0056b3;
        }

        .back-link {
            color: #007bff;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="edit-container mt-5">
            <h2>Edit User</h2>
            <form action="edit.php" method="POST">
                <div class="form-group">
                    <input type="hidden" name="txt_id" value="<?php echo $id; ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="txt_email" name="txt_email" value="<?php echo $userMail; ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="txt_pass" name="txt_pass" value="<?php echo $userPass; ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="txt_nama" name="txt_nama" value="<?php echo $userName; ?>">
                </div>
                <button type="submit" class="btn btn-update" name="update">Update</button>
            </form>
            <p class="mt-3"><a class="back-link" href="home.php">Back to Home</a></p>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>