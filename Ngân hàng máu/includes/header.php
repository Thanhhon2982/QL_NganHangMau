<?php error_reporting(0);
session_start(); ?>


    <!-- header  -->
    <div id="home">
        <!-- navigation -->
        <div class="main-top py-1">
            <nav class="navbar navbar-expand-lg navbar-light fixed-navi">
                <div class="container">
                    <!-- logo -->
                    <h1>
                        <a class="navbar-brand font-weight-bold font-italic" href="index.php">
                            <span>NH</span>M
                            <i class="fas fa-syringe"></i>
                        </a>
                    </h1>
                    <!-- //logo -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item active mt-lg-0 mt-3">
                                <a class="nav-link" href="index.php">Trang chủ
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                <a class="nav-link" href="about.php">Giới thiệu</a>
                            </li>
                           
                            <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                <a class="nav-link" href="donor-list.php">Danh sách nhà tài trợ</a>
                            </li>
                            <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                <a class="nav-link" href="search-donor.php">Tìm nhà tài trợ</a>
                            </li>
                            <?php if (strlen($_SESSION['bbdmsdid']!=0)) {?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Tài khoản của tôi
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="profile.php">Thông tin</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="change-password.php">Đổi mật khẩu</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="request-received.php">Yêu cầu</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php">Đăng xuất</a>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if (strlen($_SESSION['bbdmsdid']==0)) {?>
                            <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                <a class="nav-link" href="admin/index.php">Admin</a>
                            </li>
                        </ul>
                        <!-- login -->
                        <a href="login.php" class="login-button ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3" >
                            <i class="fas fa-sign-in-alt mr-2"></i>Đăng nhập</a><?php } ?>
                        <!-- //login -->
                    </div>
                </div>
            </nav>
        </div>
        <!-- //navigation -->
   
    </div>
    <!-- //header  -->