<?php
require "../../db.php";

session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Mohon login terlebih dahulu')
  location.replace('../login.php')</script>";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $projeks = $conn->query("SELECT * FROM project WHERE project_id = $id")->fetch_assoc();
}
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $desc = $_POST['desc'];
    $cat = $_POST['cat'];
    $strt = $_POST['strt'];
    $fns = $_POST['fns'];
    $thm = $_POST['thum'];

    $simpan = mysqli_query($conn, "UPDATE project SET name = '$nama', description = '$desc', category = '$cat', start_date = '$strt', finish_date = '$fns', thumbnail = '$thm' WHERE project_id = '$id'");
    if ($simpan) {
        echo '<script>alert("Datanya Berhasil Diperbarui");
    location.replace("index.php");</script>';
    } else {
        echo '<script>alert("Data Gagal Diperbarui");
    location.replace("index.php");</script>';
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit | Portofolio</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
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
                                        <input type="text" required name="nama" class="form-control" value="<?= $projeks['name'] ?>">
                                    </div>
                                    <div class="form-grup mb-3">
                                        <label class="form-label" for="">Description</label>
                                        <input type="text" required name="desc" class="form-control" value="<?= $projeks['description'] ?>">
                                    </div>
                                    <div class="form-grup mb-3">
                                        <label class="form-label" for="">Category</label>
                                        <input type="text" required name="cat" class="form-control" value="<?= $projeks['category'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-grup mb-3">
                                        <label class="form-label" for="">Start</label>
                                        <input type="date" required name="strt" class="form-control" value="<?= $projeks['start_date'] ?>">
                                    </div>
                                    <div class="form-grup mb-3">
                                        <label class="form-label" for="">Finish</label>
                                        <input type="date" required name="fns" class="form-control" value="<?= $projeks['finish_date'] ?>">
                                    </div>
                                    <div class="form-grup mb-3">
                                        <label class="form-label" for="">Thumbnail</label>
                                        <input type="text" required name="thum" class="form-control" value="<?= $projeks['thumbnail'] ?>">
                                    </div>
                                </div>
                                <div class="form-group text-end">
                                    <button type="submit" name="update" class="btn btn-success btn-lg w-100 mt-4">Perbarui</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script src="../../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>

</html>