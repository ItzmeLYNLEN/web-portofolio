<?php

require "db.php";

$isi = $conn->query("SELECT * FROM author JOIN author_detail ON author.author_id = author_detail.author_id WHERE author.author_id = '1'")->fetch_assoc();
$show = $conn->query("SELECT * FROM author ORDER BY author_id DESC LIMIT 1")->fetch_assoc();
$tampil = $conn->query("SELECT * FROM project");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>M. Daffa A. | Portofolio</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="bi bi-pc-display-horizontal"></i> M Daffa A</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about-me">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#project">Project</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="banner-gradient"></div>
    <div class="container">
        <section id="profile" class="position-relative pt-3 pt-lg-0 pb-5">
            <div class="row">
                <div class="col-md-9">
                    <div class="row gy-4">
                        <div class="col-md-3 d-flex justify-content-center">
                            <div class="profile-img rounded-circle overflow-hidden border border-5 border-white shadow" style="width: 150px; height: 150px;">
                                <img class="w-100" src="<?= $show['photo'] ?>" alt="">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="author-detail mt-md-5 ">
                                <h4 class="name fw-bold "><?= $isi['name'] ?></h4>
                                <p class="about text-muted"><?= $isi['short_description'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex justify-content-md-end mt-md-5 pt-md-3">
                        <button class="btn btn-sm btn-light border-secondary me-2">View Profile</button>
                        <button class="btn btn-sm btn-primary ">
                            <a class="text-decoration-none text-white" href="https://www.instagram.com/dzikraa_24">Follow</a>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section id="about-me">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="fw-bold">About Me</h5>
                </div>
                <div class="col-md-9">
                    <p class="text-muted">
                        <?= $isi['about'] ?>
                    </p>

                    <div class="card bg-info-subtle">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <h6 class="fw-bold">Lokasi</h6>
                                    <p href=""><?= $isi['location'] ?></p>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="fw-bold">Website</h6>
                                    <a href="<?= $isi['website_url'] ?>"><?= $isi['website_domain'] ?></a>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="fw-bold">Instagram</h6>
                                    <a href="<?= $isi['instagram_url'] ?>"><?= $isi['instagram_id'] ?></a>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="fw-bold">Email</h6>
                                    <a href="<?= $isi['email_url'] ?>"><?= $isi['email_address'] ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section id="project">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="fw-bold">Project</h5>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <?php foreach ($tampil as $show) { ?>
                            <div class="col-md-6 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="header pb-3">
                                            <img class="w-100" src="<?= $show['thumbnail'] ?>" alt="">
                                            <h6 class="fw-bold"><?= $show['name'] ?></h6>
                                            <span class="text-muted"><?= $show['category'] ?></span><br>
                                            <span><?= $show['start_date'] . " | " . $show['finish_date']  ?></span>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-end">
                                            <button class="btn btn-sm text-primary fw-bold">
                                                View Project
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?><br>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer class="bg-light text-center text-white">
        <div class="container p-4 pb-0">
            <section class="mb-4">
                <a class="btn text-white btn-floating m-1" style="background-color: red;" href="https://www.youtube.com/channel/UC4mViXpUaKG1jnJ6xx35aQQ" role="button"><i class="bi bi-youtube"></i></a>
                <a class="btn text-white btn-floating m-1" style="background-color: #333333;" href="https://github.com/ItzmeLYNLEN" role="button"><i class="bi bi-github"></i></a>
                <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="https://www.instagram.com/dzikraa_24" role="button"><i class="bi bi-instagram"></i></a>
            </section>
        </div>
        </div>
        <div class="text-center p-3" style="background-color: rgb(45,48,71);">
            © 2023 Copyright My Portofolio, Created With
            <i class="bi bi-heart-fill text-danger"></i> By <a href="https://www.instagram.com/dzikraa_24" class="fw-bold text-white text-decoration-none">Daoa</a>
        </div>
    </footer>


    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>