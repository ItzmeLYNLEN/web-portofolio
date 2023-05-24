<?php
require "../../db.php";

session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Mohon login terlebih dahulu')
  location.replace('../login.php')</script>";
}

$projeks =  $conn->query("SELECT * FROM project");
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $desc = $_POST['desc'];
    $cat = $_POST['cat'];
    $strt = $_POST['strt'];
    $fns = $_POST['fns'];
    $thm = $_POST['thum'];

    $simpan = $conn->query("INSERT INTO project VALUE(NULL, '$nama', '$desc', '$cat', '$strt', '$fns', '$thm')");

    if ($simpan) {
        echo '<script>alert("Data Berhasil Ditambahkan");
        location.replace("index.php");</script>';
    } else {
        echo '<script>alert("Data Gagal Ditambah");
        location.replace("index.php");</script>';
    }
}
if (isset($_POST['delete'])) {

    $id = $_POST['id'];

    $delete = $conn->query("DELETE FROM project WHERE project_id = '$id'");

    if ($delete) {
        echo '<script>alert("Datanya Dihapus");
      location.replace("index.php");</script>';
    } else {
        echo "<script>alert('data error')</script>";
    }
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

  <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow mb-3">
                    <div class="card-header bg-dark">
                        <h3 class="mb-0 text-white">Tambah Project </h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-grup mb-3">
                                        <label class="form-label" for="">Nama</label>
                                        <input type="text" required name="nama" class="form-control">
                                    </div>
                                    <div class="form-grup mb-3">
                                        <label class="form-label" for="">Description</label>
                                        <input type="text" required name="desc" class="form-control">
                                    </div>
                                    <div class="form-grup mb-3">
                                        <label class="form-label" for="">Category</label>
                                        <input type="text" required name="cat" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-grup mb-3">
                                        <label class="form-label" for="">Start</label>
                                        <input type="date" required name="strt" class="form-control">
                                    </div>
                                    <div class="form-grup mb-3">
                                        <label class="form-label" for="">Finish</label>
                                        <input type="date" required name="fns" class="form-control">
                                    </div>
                                    <div class="form-grup mb-3">
                                        <label class="form-label" for="">Thumbnail</label>
                                        <input type="text" required name="thum" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group text-end">
                                    <button type="submit" name="simpan" class="btn btn-success btn-lg w-100 mt-4"><i class="bi bi-plus"></i> Tambah</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <table class=" table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Desc</th>
                                <th>Category</th>
                                <th>Start</th>
                                <th>Finish</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($projeks as $pro) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $pro['name'] ?></td>
                                    <td><?= $pro['description'] ?></td>
                                    <td><?= $pro['category'] ?></td>
                                    <td><?= $pro['start_date'] ?></td>
                                    <td><?= $pro['finish_date'] ?></td>
                                    <td class="text-center">
                                        <a href="edit.php?id=<?= $pro['project_id'] ?>" class="btn btn-warning text-white btn-sm">Edit <i class="bi bi-pencil-fill"></i></a>
                                        <form action="" method="POST">
                                            <input type="hidden" name="id" value="<?= $pro['project_id'] ?>">
                                            <button type="submit" name="delete" class="btn btn-danger text-white btn-sm">Delete <i class="bi bi-trash"></i></button>
                                        </form>
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