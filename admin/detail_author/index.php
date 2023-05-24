<?php
require "../../db.php";

session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Mohon login terlebih dahulu')
  location.replace('../login.php')</script>";
}

$admins =  $conn->query("SELECT * FROM author_detail");
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Portofolio</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
<div class="container">
    <a href="../"><button class="btn btn-warning btn-lg text-white mt-4"><i class="bi bi-arrow-90deg-left"></i> Back</button></a>
  </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow mb-3">
                    <div class="card-header bg-dark">
                        <h3 class="mb-0 text-white text-center">Edit Portofolio</h3>
                    </div>
                    <div class="card-body">
                        <table class=" table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Lokasi</th>
                                    <th>Instagram</th>
                                    <th>Email</th>
                                    <th class="text-center">Lihat Lengkap</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($admins as $admin) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $admin['location'] ?></td>
                                        <td><?= $admin['instagram_id'] ?></td>
                                        <td><?= $admin['email_address'] ?></td>
                                        <td class="text-center">
                                            <a href="edit.php?id=<?= $admin['author_detail_id'] ?>" class="btn btn-warning text-white btn-sm">Edit <i class="bi bi-pencil-fill"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>