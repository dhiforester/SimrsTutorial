<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>SIMRS</title>
        <meta content="Gambaran Umum Tentang Aplikasi" name="description">
        <meta content="Kata Kunci Jika Ada Pencarian" name="keywords">
        <!-- Favicons -->
        <link href="assets/img/logo.png" rel="icon">
        <link href="assets/img/logo.png" rel="apple-touch-icon">
        <!-- Google Fonts -->
        <link href="assets/fonts/fonts.css" rel="stylesheet">
        <!-- Vendor CSS Files -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="vendor/simple-datatables/style.css" rel="stylesheet">
        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="vendor/mdb-ui-kit/css/mdb.min.css" rel="stylesheet">
        <script src="vendor/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css"/>
        <!-- =======================================================
        * Template Name: NiceAdmin - v2.3.1
        * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>
    <body>
        <main class="login_background">
            <div class="container">
                <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex justify-content-center py-4">
                                    <img src="assets/img/logo.png" alt="" width="100px"><br>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="pt-4 pb-2">
                                            <h5 class="card-title text-center pb-0 fs-4">Login Ke Akun Anda</h5>
                                            <p class="text-center small">Masukan Email Dan Password Untuk Melakukan Login</p>
                                        </div>
                                        <form action="_Page/Login/ProsesLogin.php" class="row g-3" method="POST">
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="email" name="email" class="form-control" id="email" required>
                                                    <div class="invalid-feedback">Please enter your username.</div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" id="password" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                                <small class="credit">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Tampilkan" id="TampilkanPassword2" name="TampilkanPassword2">
                                                        <label class="form-check-label" for="TampilkanPassword2">
                                                            Tampilkan Password
                                                        </label>
                                                    </div>
                                                </small>
                                            </div>
                                            <div class="col-12" id="NotifikasiLogin">
                                                <?php
                                                    if(empty($_SESSION ["SesiNotifikasi"])){
                                                        echo "Pastikan email dan password sudah benar.";
                                                    }else{
                                                        $Notifikasi=$_SESSION ["SesiNotifikasi"];
                                                        echo '<span class="text-danger">'.$Notifikasi.'</span>';
                                                    }
                                                    unset($_SESSION['SesiNotifikasi']);
                                                ?>
                                                
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100" type="submit" id="TombolLogin">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="credits">
                                    <small>
                                        <div class="copyright text-white">
                                            &copy; Copyright <strong><span>SIMRS</span></strong>. All Rights Reserved 2023
                                        </div>
                                        <div class="credits">
                                            Designed by <a href="" class="text-light">Nama Kamu</a>
                                        </div>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </body>
</html>