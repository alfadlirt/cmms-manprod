<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Simplebar -->
    <link type="text/css" href="<?php echo base_url('public/assets/vendor/simplebar.min.css') ?>" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="<?php echo base_url('public/assets/css/app.css') ?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url('public/assets/css/app.rtl.css') ?>" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="<?php echo base_url('public/assets/css/vendor-material-icons.css') ?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url('public/assets/css/vendor-material-icons.rtl.css') ?>" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="<?php echo base_url('public/assets/css/vendor-fontawesome-free.css') ?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url('public/assets/css/vendor-fontawesome-free.rtl.css') ?>" rel="stylesheet">

    <!-- ion Range Slider -->
    <link type="text/css" href="<?php echo base_url('public/assets/css/vendor-ion-rangeslider.css') ?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url('public/assets/css/vendor-ion-rangeslider.rtl.css') ?>" rel="stylesheet">





</head>

<body class="layout-login-centered-boxed">

    <div class="layout-login-centered-boxed__form">
        <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-4 navbar-light">
            <a href="index.html" class="navbar-brand text-center mb-2 mr-0 flex-column" style="min-width: 0">
                <img class="navbar-brand-icon mb-3" src="<?php echo base_url('public/assets/images/logo.svg') ?>" width="43" alt="Flat">
                <span>Welcome To CMMS </span>
            </a>
        </div>
        <div class="card card-body">

            <form role="form" action="<?= base_url() . '/Login/authentication' ?>" method="post">
                <div class="form-group">
                    <label class="text-label" for="name_2">Username:</label>
                    <div class="input-group input-group-merge">
                        <input id="username" name="username" type="text" class="form-control" placeholder="Masukkan Username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label" for="password_2">Password:</label>
                    <div class="input-group input-group-merge">
                        <input id="password" name="password" type="password" class="form-control" placeholder="Masukkan Password">
                    </div>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary mb-2" type="submit">Masuk</button><br>
                </div>
            </form>
        </div>
    </div>


    <!-- jQuery -->
    <script src="<?php echo base_url('public/assets/vendor/jquery.min.js') ?>"></script>

    <!-- Bootstrap -->
    <script src="<?php echo base_url('public/assets/vendor/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('public/assets/vendor/bootstrap.min.js') ?>"></script>

    <!-- Simplebar -->
    <script src="<?php echo base_url('public/assets/vendor/simplebar.min.js') ?>"></script>

    <!-- DOM Factory -->
    <script src="<?php echo base_url('public/assets/vendor/dom-factory.js') ?>"></script>

    <!-- MDK -->
    <script src="<?php echo base_url('public/assets/vendor/material-design-kit.js') ?>"></script>

    <!-- Range Slider -->
    <script src="<?php echo base_url('public/assets/vendor/ion.rangeSlider.min.js') ?>"></script>
    <script src="<?php echo base_url('public/assets/js/ion-rangeslider.js') ?>"></script>

    <!-- App -->
    <script src="<?php echo base_url('public/assets/js/toggle-check-all.js') ?>"></script>
    <script src="<?php echo base_url('public/assets/js/check-selected-row.js') ?>"></script>
    <script src="<?php echo base_url('public/assets/js/dropdown.js') ?>"></script>
    <script src="<?php echo base_url('public/assets/js/sidebar-mini.js') ?>"></script>
    <script src="<?php echo base_url('public/assets/js/app.js') ?>"></script>

    <!-- App Settings (safe to remove) -->
    <script src="<?php echo base_url('public/assets/js/app-settings.js') ?>"></script>





</body>

</html>