<?php
require "../../db.php";

session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Mohon login terlebih dahulu')
  location.replace('../login.php')</script>";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $admins = $conn->query("SELECT * FROM author_detail WHERE author_detail_id = $id")->fetch_assoc();
}
if (isset($_POST['update'])) {
    $lokasi = $_POST['lokasi'];
    $ig_id = $_POST['ig_id'];
    $email_add = $_POST['em_ad'];
    $shdec = $_POST['short_desc'];
    $ab = $_POST['about'];
    $wu = $_POST['web_url'];
    $wd = $_POST['web_dom'];
    $ig_url = $_POST['ig_url'];
    $em_url = $_POST['em_url'];

    $simpan = mysqli_query($conn, "UPDATE author_detail SET location = '$lokasi', instagram_id = '$ig_id', email_address = '$email_add', short_description = '$shdec', about = '$ab', website_url = '$wu', website_domain = '$wd', instagram_url = '$ig_url', email_url = '$em_url' WHERE author_detail_id = '$id'");
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow mb-3">
                    <div class="card-header bg-dark">
                        <h3 class="mb-0 text-white">Edit Data</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="form-grup">
                                    <label class="form-label" for="">Lokasi</label>
                                    <input type="text" required name="lokasi" id="lokasi" class="form-control" value="<?= $admins['location'] ?>">
                                </div>
                                <div class="form-grup">
                                    <label class="form-label" for="">Instagram Id</label>
                                    <input type="text" required name="ig_id" id="ig_id" class="form-control" value="<?= $admins['instagram_id'] ?>">
                                </div>
                                <div class="form-grup">
                                    <label class="form-label" for="">Email Address</label>
                                    <input type="text" required name="em_ad" id="em_ad" class="form-control" value="<?= $admins['email_address'] ?>">
                                </div>
                                <div class="form-grup">
                                    <label class="form-label" for="">Short Desc</label>
                                    <input type="text" required name="short_desc" id="short_desc" class="form-control" value="<?= $admins['short_description'] ?>">
                                </div>
                                <div class="form-grup">
                                    <label class="form-label" for="">About</label>
                                    <input type="text" required name="about" id="about" class="form-control" value="<?= $admins['about'] ?>">
                                </div>
                                <div class="form-grup">
                                    <label class="form-label" for="">Web URL</label>
                                    <input type="text" required name="web_url" id="web_url" class="form-control" value="<?= $admins['website_url'] ?>">
                                </div>
                                <div class="form-grup">
                                    <label class="form-label" for="">Web Dom</label>
                                    <input type="text" required name="web_dom" id="web_dom" class="form-control" value="<?= $admins['website_domain'] ?>">
                                </div>
                                <div class="form-grup">
                                    <label class="form-label" for="">IG URL</label>
                                    <input type="text" required name="ig_url" id="ig_url" class="form-control" value="<?= $admins['instagram_url'] ?>">
                                </div>
                                <div class="form-grup">
                                    <label class="form-label" for="">Email URL</label>
                                    <input type="text" required name="em_url" id="em_url" class="form-control" value="<?= $admins['email_url'] ?>">
                                </div>
                                <div class="form-group text-end">
                                    <button type="submit" name="update" class="btn btn-success btn-md mt-4 w-100">Perbarui <i class="bi bi-arrow-clockwise"></i></button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>

</html>