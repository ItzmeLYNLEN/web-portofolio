<?php
require "../db.php";

session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Mohon login terlebih dahulu')
  location.replace('login.php')</script>";
}

$admins =  $conn->query("SELECT * FROM author");
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
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <h5><a class="nav-link " href="detail_author">Detail</a></h5>
                    </li>
                    <li class="nav-item">
                        <h5><a class="nav-link " href="project">Project</a></h5>
                    </li>
                    <li class="nav-item">
                        <h5><a class="nav-link " href="logout.php">Log Out</a></h5>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow mb-3">
                    <div class="card-header bg-dark">
                        <h3 class="mb-0 text-white text-center">Author Update</h3>
                    </div>
                    <div class="card-body">
                        <table class=" table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th class="text-center">Photo</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($admins as $admin) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $admin['name'] ?></td>
                                        <td><?= $admin['username'] ?></td>
                                        <td><?= $admin['password'] ?></td>
                                        <td><?= $admin['photo'] ?></td>
                                        <td class="text-center">
                                            <a href="edit.php?id=<?= $admin['author_id'] ?>" class="btn btn-warning text-white btn-sm">Edit <i class="bi bi-pencil-fill"></i></a>
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
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>