<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Electro Store Ecommerce Category Bootstrap Responsive Web Template | Home :: w3layouts</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link href=" <?php echo base_url() ?>assets/web/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap css -->
    <link href="<?php echo base_url() ?>assets/web/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Main css -->
    <link rel="<?php echo base_url() ?>stylesheet" href="assets/web/css/fontawesome-all.css">
    <!-- Font-Awesome-Icons-CSS -->
    <link href="<?php echo base_url() ?>assets/web/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!-- pop-up-box -->
    <link href="<?php echo base_url() ?>assets/web/css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <!-- menu style -->
    <!-- //Custom-Files -->

    <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <!-- //web fonts -->

</head>

<style>
    .dropbtn {
        /* background-color: #4CAF50; */
        color: black;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
</style>

<body>
    <!-- top-header -->
    <div class="agile-main-top">
        <div class="container-fluid">
            <div class="row main-top-w3l py-2" style="background-color: rgb(41, 41, 41);">
                <div class="col-lg-4 header-most-top">
                </div>
                <div class="col-lg-8 header-right mt-lg-0 mt-2">
                    <!-- header lists -->
                </div>a
            </div>
        </div>
    </div>


    <!-- //top-header -->

    <!-- header-bottom-->
    <div class="header-bot">
        <div class="container">
            <div class="row header-bot_inner_wthreeinfo_header_mid">
                <!-- logo -->
                <div class="col-md-3 logo_agile">
                    <h1 class="text-center">
                        <a href="index.html" class="font-weight-bold font-italic">
                            <alt=" " class=" img-fluid">CV Dwi Tunggal
                        </a>
                    </h1>
                </div>
                <!-- //logo -->
                <!-- header-bot -->
                <div class="col-md-9 header mt-4 mb-md-0 mb-4">
                    <div class="row">
                        <!-- search -->
                        <div class="col-10 agileits_search">
                            <form class="form-inline" action="#" method="post">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" required>
                                <button class="btn my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                        <!-- //search -->
                        <!-- cart details -->
                        <div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
                            <div class="wthreecartaits wthreecartaits2 cart cart box_1">

                            </div>
                        </div>
                        <!-- //cart details -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop locator (popup) -->
    <!-- //header-bottom -->
    <!-- navigation -->
    <div class="navbar-inner" style="margin-left: -200px;">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="agileits-navi_search">


                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto text-center mr-xl-5">
                        <div class="dropdown">
                            <button class="dropbtn">Barang</button>
                            <div class="dropdown-content">
                                <a href="<?php echo site_url(); ?>/katalog/C_katalogtelpon">Telpon</a>
                                <a href="<?php echo site_url(); ?>/katalog/C_katalogcctv">Cctv</a>
                                <a href="<?php echo site_url(); ?>/katalog/C_kataloglainlain">Lain-Lain</a>
                            </div>
                        </div>
                        <li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url(); ?>controlerloginuser/C_dashboardutama">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url(); ?>controlerloginuser/C_riwayatpembelian">Riwayat Pembelian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url(); ?>controlerloginuser/C_riwayatpembayaran">Riwayat Pembayaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url(); ?>controlerloginuser/C_komplainbarang">Komplain Barang</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('C_pelaporanclient') ?>">Pelaporan</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('C_checkoutclient') ?>">checkout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('C_paymentclient') ?>">Pembayaran</a>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- //navigation -->