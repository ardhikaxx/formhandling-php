<?php
require("koneksi.php");
//$email=$_GET ['user_fullname'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 30px;
        }

        .table-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .table-container h1 {
            margin-bottom: 20px;
            color: #007bff;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        .table th {
            background-color: #f8f9fa;
            color: #495057;
        }

        .btn-edit {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px;
            padding: 5px 15px;
            margin-right: 10px;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            border-radius: 10px;
            padding: 5px 15px;
        }

        .btn-edit:hover,
        .btn-delete:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="table-container">
            <h1>Welcome</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM user_detail";
                    $result = mysqli_query($koneksi, $query);
                    $no = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $userMail = $row['user_email'];
                        $userName = $row['user_fullname'];
                        ?>
                        <tr>
                            <td>
                                <?php echo $no ?>
                            </td>
                            <td>
                                <?php echo $userMail; ?>
                            </td>
                            <td>
                                <?php echo $userName; ?>
                            </td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">Edit</a>
                                <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-delete">Hapus</a>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>