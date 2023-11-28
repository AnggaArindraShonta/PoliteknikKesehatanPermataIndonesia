<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url() ?>assets/admin/images/logo-pkpi.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Login Dosen</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/main/css/vendors_css.css" />

    <!-- Style-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/main/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/main/css/skin_color.css">

    <link href="<?= base_url() ?>assets/user/css/theme.css" rel="stylesheet" />

</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url(<?php echo base_url('assets/admin/images/auth-bg/bg-8.jpg'); ?>);">
    <?= $this->session->flashdata('message') ?>
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-lg-5 col-md-6 col-8">
                <div class="bg-white rounded10 shadow-lg">
                    <div class="content-top-agile p-40 pb-0">
                        <h2 class="text-primary">Hallo, Dosen!</h2>
                        <p class="mb-0">Selamat Datang Kembali</p>
                    </div>
                    <div style="margin-top: 10px; margin-left: 40px; margin-right: 40px">
                        <form action="<?php echo base_url() ?>authmember" method="POST">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-transparent"><i class="fa fa-user"></i></span>
                                    <input type="text" id="username" name="username" class="form-control ps-15 bg-transparent" placeholder="Username" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-transparent"><i class="fa fa-lock"></i></span>
                                    <input type="password" id="password" name="password" class="form-control ps-15 bg-transparent" placeholder="Password" required="required">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-danger mt-5" style="margin-bottom: 20px;">SIGN IN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS -->
    <script src="<?= base_url() ?>assets/admin/main/js/vendors.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/main/js/pages/chat-popup.js"></script>
    <script src="<?= base_url() ?>assets/admin/icons/feather-icons/feather.min.js"></script>

</body>

</html>