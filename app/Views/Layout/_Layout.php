<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>

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


    <!-- Flatpickr -->
    <link type="text/css" href="<?php echo base_url('public/assets/css/vendor-flatpickr.css') ?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url('public/assets/css/vendor-flatpickr.rtl.css') ?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url('public/assets/css/vendor-flatpickr-airbnb.css') ?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url('public/assets/css/vendor-flatpickr-airbnb.rtl.css') ?>" rel="stylesheet">

    <!-- Vector Maps -->
    <link type="text/css" href="<?php echo base_url('public/assets/vendor/jqvmap/jqvmap.min.css') ?>" rel="stylesheet">

    <link type="text/css" href="<?php echo base_url('public/assets/css/shortcodes.css') ?>" rel="stylesheet">


</head>

<body class="layout-default">
    <div class="preloader"></div>

    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px" data-fullbleed>
        <div class="mdk-drawer-layout__content">

            <!-- Header Layout -->
            <div class="mdk-header-layout js-mdk-header-layout" data-has-scrolling-region>

                <!-- Header -->

                <div id="header" class="mdk-header js-mdk-header m-0" data-fixed data-effects="waterfall" data-retarget-mouse-scroll="false">
                    <div class="mdk-header__content">

                        <div class="navbar navbar-expand-sm navbar-main navbar-light bg-white  pr-0" id="navbar" data-primary>
                            <div class="container-fluid p-0">

                                <!-- Navbar toggler -->
                                <button class="navbar-toggler navbar-toggler-custom d-lg-none d-flex mr-navbar" type="button" data-toggle="sidebar">
                                    <span class="material-icons">short_text</span>
                                </button>

                                <!-- Navbar Brand -->
                                <a href="index.html" class="navbar-brand flex ">
                                    <span>Dashboard</span>
                                </a>


                                <div class="dropdown">
                                    <a href="#" data-toggle="dropdown" data-caret="false" class="dropdown-toggle navbar-toggler navbar-toggler-company border-left d-flex align-items-center ml-navbar">
                                        <span class="rounded-circle">
                                            <span class="material-icons">business</span>
                                        </span>
                                    </a>
                                    <div id="company_menu" class="dropdown-menu dropdown-menu-right navbar-company-menu">
                                        <div class="dropdown-item d-flex align-items-center py-2 navbar-company-info py-3">

                                            <span class="mr-3">
                                                <img src="<?php echo base_url('public/assets/images/frontted-logo-blue.svg') ?>" width="43" height="43" alt="avatar">
                                            </span>
                                            <span class="flex d-flex flex-column">
                                                <strong style="font-size: 1.125rem;">
                                                    <?php
                                                    $session = session();
                                                    echo $session->get('user_name');
                                                    ?>
                                                </strong>
                                                <small class="text-muted text-uppercase">Admin</small>
                                            </span>

                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item d-flex align-items-center py-2" href="<?= base_url() . '/logout' ?>">
                                            <span class="material-icons mr-2">exit_to_app</span> Logout
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // END Header -->

                <!-- Header Layout Content -->
                <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page">
                    <div class="container-fluid page__container">
                        <!-- ############ PAGE START-->

                        <?= $this->renderSection('content'); ?>

                        <!-- ############ PAGE END-->
                    </div>
                </div>
                <!-- // END header-layout__content -->

            </div>
            <!-- // END header-layout -->

        </div>
        <!-- // END drawer-layout__content -->

        <div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
            <div class="mdk-drawer__content">
                <div class="sidebar sidebar-dark sidebar-left simplebar" data-simplebar>
                    <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account flex-shrink-0">
                        <a href="index.html" class="flex d-flex align-items-center text-underline-0 text-body">
                            <span class="mr-3">
                                <img src="<?php echo base_url('public/assets/images/logo.svg') ?>" width="43" height="43" alt="avatar">
                            </span>
                            <span class="flex d-flex flex-column">
                                <strong style="font-size: 1.125rem;">TrueFalse Design</strong>
                                <small class="text-muted" style="color: rgba(255,255,255,.54);font-size: small;">Maintenance System</small>
                            </span>
                        </a>
                    </div>

                    <div class="tab-content">
                        <div id="sm-menu" class="tab-pane show active" role="tabpanel" aria-labelledby="sm-menu-tab">
                            <ul class="sidebar-menu flex">
                                <li class="sidebar-menu-item active">
                                    <a class="sidebar-menu-button" href="<?= base_url() . '/' ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                                        <span class="sidebar-menu-text">Dashboard</span>
                                    </a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?= base_url() . '/Admin' ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">donut_small</i>
                                        <span class="sidebar-menu-text">Admin</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- // END drawer-layout -->


    <!-- App Settings FAB -->
    <div id="app-settings">
        <app-settings></app-settings>
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

    <!-- Flatpickr -->
    <script src="<?php echo base_url('public/assets/vendor/flatpickr/flatpickr.min.js') ?>"></script>
    <script src="<?php echo base_url('public/assets/js/flatpickr.js') ?>"></script>

    <!-- Global Settings -->
    <script src="<?php echo base_url('public/assets/js/settings.js') ?>"></script>

    <!-- Chart.js -->
    <script src="<?php echo base_url('public/assets/vendor/Chart.min.js') ?>"></script>

    <!-- App Charts JS -->
    <script src="<?php echo base_url('public/assets/js/chartjs-rounded-bar.js') ?>"></script>
    <script src="<?php echo base_url('public/assets/js/charts.js') ?>"></script>

    <!-- Chart Samples -->
    <script src="<?php echo base_url('public/assets/js/page.dashboard.js') ?>"></script>

</body>

</html>