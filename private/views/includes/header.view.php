<?php
    $salonData    = new Salon();
    $uniqueSalons = $salonData->query("SELECT * FROM salons"); // Retrieve the current salon
?>

<!DOCTYPE html>
    <html lang="zxx">

        <script language="JavaScript" type="text/javascript">
            function preventBack() {
                window.history.forward();
            }
            setTimeout("preventBack()", 0);
            window.onunload = function() {
                null
            };
        </script>

        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <!-- /Added by HTTrack -->

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />

            <title><?=APP_NAME ?> | <?=APP_DESC ?></title>

            <!-- ::::::::::::::Favicon icon:::::::::::::: -->
            <link rel="shortcut icon" href="<?=ROOT?>/assets/images/logo/logo_design.png" type="image/png">

            <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
            <link rel="stylesheet" href="<?=ROOT?>/assets/css/vendor/vendor.min.css">
            <link rel="stylesheet" href="<?=ROOT?>/assets/css/plugins/plugins.min.css">
            <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.min.css">
            <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles.css">
            <link rel="stylesheet" href="<?=ROOT?>/assets/css/preload.css">
            <link rel="stylesheet" href="<?=ROOT?>/assets/mdi/css/materialdesignicons.min.css">
            <link rel="stylesheet" href="<?=ROOT?>/assets/css/swiper.min.css">
            <link rel="stylesheet" href="<?=ROOT?>/assets/css/vibes.css">

            <script src="<?=ROOT?>/assets/js/jquery-3.6.0.min.js"></script>
            <script src="<?=ROOT?>/assets/js/jquery-3.6.0.js"></script>
            <script src="<?=ROOT?>/assets/js/jquery-3.7.1.min.js"></script>
            <script src="<?=ROOT?>/assets/js/sipper.min.js"></script>

            <style>
                /*** Whatsapp ***/
                .whatsapp {
                    position: fixed;
                    right: 1%;
                    top: 82%;
                    z-index: 9999;
                    overflow: hidden;
                }

                .whatsapp h6 {
                    color: white;
                    background: #2563eb;
                    padding: 6px;
                    border-radius: 4px;
                }
                
                body {
                    background-color: #FFFFFF;
                    font-size: 13px;
                    line-height: 1.1875;
                    margin: 0;
                }

                .popup {
                    position: fixed;
                    top: 0;
                    width: 100vw;
                    height: 100vh;
                    background-color: rgba(0, 0, 0, .3);
                    display: grid;
                    place-content: center;
                    opacity: 0;
                    pointer-events: none;
                    transition: 200ms ease-in-out opacity;
                    z-index: 9999;
                }

                .popup-content {
                    width: clamp(300px, 90vw, 500px);
                    background-color: #fff;
                    background-size: cover;
                    background-position: center;
                    color: #000;
                    background-attachment: fixed;
                    text-align: center;
                    padding: 100px;
                    padding: clamp(1.5rem, 100vw, 3rem);
                    box-shadow: 0 0 .5em rgba(0, 0, 0, .5);
                    border-radius: .5em;
                    opacity: 0;
                    transform: translateY(20%);
                    transition: 200ms ease-in-out opacity,
                        200ms ease-in-out transform;
                    position: relative;
                }

                .popup h1 {
                    position: absolute;
                    top: 0.3rem;
                    right: 0.9rem;
                    line-height: 1;
                    cursor: pointer;
                    user-select: none;
                }

                .popup h1:active {
                    transform: scale(.9);
                }

                .showPopup {
                    opacity: 1;
                    transform: translateY(0);
                    pointer-events: all;
                }

                .greatvibes {
                    font-family: 'Great Vibes', cursive;
                    font-size: 3rem;
                }

                .p {
                    font-family: 'Montserrat', sans-serif !important;
                    font-size: 0.95rem !important;
                    font-weight: lighter !important;
                }

                button {
                    outline: none !important;
                    box-shadow: none !important;
                }

                /* Underline-style input */
                .form-control.line-input {
                    border: none !important;
                    border-bottom: 2px solid #ccc !important;
                    border-radius: 0 !important;
                    box-shadow: none !important;
                    outline: none !important;
                    background-color: transparent !important;
                    transition: border-color 0.3s ease-in-out !important;
                }

                .form-control.line-input:focus {
                    border-bottom: 2px solid #007bff !important;
                    background-color: transparent !important;
                    box-shadow: none !important;
                }

                .form-label {
                    font-weight: bold !important;
                }

                textarea.form-control.line-input {
                    resize: vertical !important;
                }
            </style>
        </head> 

        <body>
            <div id="container"></div>

            <header class="header-section d-none d-xl-block">
                <div class="header-wrapper">

                    <!-- Start Header Bottom -->
                    <div class="header-bottom header-bottom-color--green section-fluid sticky-header sticky-color--white">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center justify-content-between">
                                    <!-- Start Header Logo -->
                                    <div class="header-logo">
                                        <div class="logo">
                                            <?php 
                                                if (!empty($uniqueSalons)):
                                                    foreach ($uniqueSalons as $row):
                                                        $image =  fetch_images($row->image);
                                            ?>
                                                <a href="<?=ROOT?>/home">
                                                    <img src="<?= $image ?>" style="height: 35px; width: 35px;" alt="">
                                                </a>
                                            <?php endforeach; endif;?>
                                        </div>
                                    </div>
                                    <!-- End Header Logo --> 

                                    <!-- Start Header Main Menu -->
                                    <div class="main-menu menu-color--black menu-hover-color--green">
                                        <nav>
                                            <ul class="p">
                                                <li class="has-dropdown">
                                                    <a class="active main-menu-link" href="<?=ROOT?>/home"
                                                        style="font-weight: lighter; font-size: 0.9rem">Home <i
                                                            class="fa fa-angle-down"></i></a>
                                                    <!-- Sub Menu -->
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <?php 
                                                                if (!empty($uniqueSalons)):
                                                                    foreach ($uniqueSalons as $row):
                                                            ?>
                                                                <a href="<?=ROOT?>/home"
                                                                    style="font-weight: lighter; font-size: 0.9rem"><?= esc($row->store_name) ?>
                                                                </a>
                                                            <?php endforeach; endif;?>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <li>
                                                    <a href="<?= ROOT ?>/makeUps?mode=<?= urlencode(strtolower(str_replace(['&', ' ', ',', '`'], ['and', '-', '', ''], 'services'))) ?>"
                                                        style="font-weight: lighter; font-size: 0.9rem">Services</a>
                                                </li>

                                                <li>
                                                    <a href="<?=ROOT?>/about_us"
                                                        style="font-weight: lighter; font-size: 0.9rem">About Us</a>
                                                </li>

                                                <li>
                                                    <a href="<?=ROOT?>/contact_us"
                                                        style="font-weight: lighter; font-size: 0.9rem">Contact Us</a>
                                                </li>

                                                <li class="has-dropdown">
                                                    <a href="javascript:void(0);"
                                                        style="font-weight: lighter; font-size: 0.9rem">More <i
                                                            class="fa fa-angle-down"></i></a>
                                                    <!-- Sub Menu -->
                                                    <?php if (!Auth::logged_in()): ?>
                                                        <ul class="sub-menu">
                                                            <li><a href="<?=ROOT?>/login"
                                                                    style="font-weight: lighter; font-size: 0.9rem">Log In</a></li>
                                                            <li><a href="<?=ROOT?>/signup"
                                                                    style="font-weight: lighter; font-size: 0.9rem">Sign Up</a>
                                                            </li>
                                                        </ul>    
                                                    <?php else: ?>
                                                        <ul class="sub-menu">
                                                            
                                                            <li><a href="<?=ROOT?>/my_accounts"
                                                                    style="font-weight: lighter; font-size: 0.9rem">My Account</a>
                                                            </li> 
                                                            
                                                            <li><a href="<?=ROOT?>/logout"
                                                                    style="font-weight: lighter; font-size: 0.9rem">Log Out</a></li>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- End Header Main Menu Start -->

                                    <ul class="header-action-link action-color--black action-hover-color--green">
                                        <!-- <li>
                                            <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                                <i class="icon-bag"></i>
                                                <span id="cart_count" class="item-count">
                                                    0 </span>
                                            </a>
                                        </li> -->

                                        <li>
                                            <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                                <i class="icon-menu"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- End Header Action Link -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Header Bottom -->
                </div>
            </header>

            <!-- Start Mobile Header -->
            <div class="mobile-header mobile-header-bg-color--golden section-fluid d-lg-block d-xl-none">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <!-- Start Mobile Left Side -->
                            <div class="mobile-header-left">
                                <ul class="mobile-menu-logo">
                                    <li>
                                        <a href="index.html">
                                            <div class="logo">
                                                <?php 
                                                    if (!empty($uniqueSalons)):
                                                        foreach ($uniqueSalons as $row):
                                                            $image =  fetch_images($row->image);
                                                ?>
                                                    <a href="<?=ROOT?>/home">
                                                        <img src="<?= $image ?>" style="height: 35px; width: 35px;" alt="">
                                                    </a>
                                                <?php endforeach; endif;?>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Mobile Left Side -->

                            <!-- Start Mobile Right Side -->
                            <div class="mobile-right-side">
                                <ul class="header-action-link action-color--black action-hover-color--green">
                                    <!-- <li>
                                        <a href="#search">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                            <i class="icon-bag"></i>
                                            <span id="cart_count" class="item-count"> 0
                                            </span>
                                        </a>
                                    </li> -->
                                    <li>
                                        <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu">
                                            <i class="icon-menu"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Mobile Right Side -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Mobile Header -->

            <!--  Start Offcanvas Mobile Menu Section -->
            <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
                <!-- Start Offcanvas Header -->
                <div class="offcanvas-header text-right">
                    <button class="offcanvas-close"><i class="ion-android-close"></i></button>
                </div> <!-- End Offcanvas Header -->
                <!-- Start Offcanvas Mobile Menu Wrapper -->
                <div class="offcanvas-mobile-menu-wrapper">
                    <!-- Start Mobile Menu  -->
                    <div class="mobile-menu-bottom">
                        <!-- Start Mobile Menu Nav -->
                        <div class="offcanvas-menu">
                            <ul class="p">
                                <li>
                                    <a href="<?=ROOT?>/home"
                                        style="font-weight: lighter; font-size: 0.9rem"><span>Home</span></a>
                                    <ul class="mobile-sub-menu">
                                    </ul>
                                </li>

                                <li>
                                    <a href="<?= ROOT ?>/makeUps?mode=<?= urlencode(strtolower(str_replace(['&', ' ', ',', '`'], ['and', '-', '', ''], 'services'))) ?>"
                                        style="font-weight: lighter; font-size: 0.9rem">Services</a>
                                </li>

                                <li>
                                    <a href="<?=ROOT?>/about_us" style="font-weight: lighter; font-size: 0.9rem">About Us</a>
                                </li>
                                <li>
                                    <a href="<?=ROOT?>/contact_us" style="font-weight: lighter; font-size: 0.9rem">Contact
                                        Us</a>
                                </li>
                                <li>
                                    <a href="#" style="font-weight: lighter; font-size: 0.9rem"><span>More</span></a>
                                    <?php if (!Auth::logged_in()): ?>
                                        <ul class="mobile-sub-menu">
                                            <li><a href="<?=ROOT?>/login" style="font-weight: lighter; font-size: 0.9rem">Log In</a>
                                            </li>
                                            <li><a href="<?=ROOT?>/signup" style="font-weight: lighter; font-size: 0.9rem">Sign
                                                    Up</a></li>
                                        </ul>
                                    <?php else: ?>
                                        <ul class="mobile-sub-menu">

                                            <li><a href="<?=ROOT?>/my_accounts" style="font-weight: lighter; font-size: 0.9rem">My
                                                    Account</a></li>

                                            <li><a href="<?=ROOT?>/logout" style="font-weight: lighter; font-size: 0.9rem">Log
                                                    Out</a></li>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div><!-- End Mobile Menu Nav -->
                    </div> <!-- End Mobile Menu -->

                    <!-- Start Mobile contact Info -->
                    <div class="mobile-contact-info">
                        <div class="logo">
                            <?php 
                                if (!empty($uniqueSalons)):
                                    foreach ($uniqueSalons as $row):
                                        $image =  fetch_images($row->image);
                            ?>
                                <a href="<?=ROOT?>/home">
                                    <img src="<?= $image ?>" style="height: 35px; width: 35px;" alt="">
                                </a>
                            <?php endforeach; endif;?>
                        </div>

                        <address class="address">
                            <?php 
                                if (!empty($uniqueSalons)):
                                    foreach ($uniqueSalons as $row):
                                        $image =  fetch_images($row->image);
                            ?>
                                <span>Address: <?= esc($row->store_address ?? '') ?>.</span>
                                <span>Call Us: <?= esc($row->store_phone ?? '') ?></span>
                                <span>Email: <?= esc($row->store_email ?? '') ?></span>
                            <?php endforeach; endif;?>
                        </address>

                        <ul class="social-link">
                            <li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                        </ul>

                        <ul class="user-link">
                            <li><a href="<?=ROOT?>/">Wishlist</a></li>
                            <li><a href="<?=ROOT?>/cart">Cart</a></li>
                            <li><a href="<?=ROOT?>/checkout">Checkout</a></li>
                        </ul>
                    </div>
                    <!-- End Mobile contact Info -->

                </div> <!-- End Offcanvas Mobile Menu Wrapper -->
            </div>
            <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

            <!-- Start Offcanvas Mobile Menu Section -->
            <div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
                <!-- Start Offcanvas Header -->
                <div class="offcanvas-header text-right">
                    <button class="offcanvas-close"><i class="ion-android-close"></i></button>
                </div> <!-- End Offcanvas Header -->
                <!-- Start Offcanvas Mobile Menu Wrapper -->
                <!-- Start Mobile contact Info -->
                <div class="mobile-contact-info">
                    <div class="logo">
                        <?php 
                            if (!empty($uniqueSalons)):
                                foreach ($uniqueSalons as $row):
                                    $image =  fetch_images($row->image);
                        ?>
                            <a href="<?=ROOT?>/home">
                                <img src="<?= $image ?>" style="height: 35px; width: 35px;" alt="">
                            </a>
                        <?php endforeach; endif;?>
                    </div>

                    <address class="address">
                        <?php 
                            if (!empty($uniqueSalons)):
                                foreach ($uniqueSalons as $row):
                                    $image =  fetch_image($row->image);
                        ?>
                            <span>Address: <?= esc($row->store_address ?? '') ?>.</span>
                            <span>Call Us: <?= esc($row->store_phone ?? '') ?></span>
                            <span>Email: <?= esc($row->store_email ?? '') ?></span>
                        <?php endforeach; endif;?>
                    </address>

                    <ul class="social-link">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>

                    <ul class="user-link">
                        <li><a href="<?=ROOT?>/" style="font-weight: lighter; font-size: 0.9rem">Wishlist</a></li>
                        <li><a href="<?=ROOT?>/cart" style="font-weight: lighter; font-size: 0.9rem">Cart</a></li>
                        <li><a href="<?=ROOT?>/checkout" style="font-weight: lighter; font-size: 0.9rem">Checkout</a></li>
                    </ul>
                </div>
                <!-- End Mobile contact Info -->
            </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->
            <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

            <!--- WhatsApp --->
            <div class="whatsapp">
                <!-- WhatsApp Chat Button -->
                <a href="https://api.whatsapp.com/send?phone=+27817679053&text=Hello!%20I%20need%20some%20assistance."
                    target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp Chat" width="40">
                </a>

            </div>
            <!--- WhatsApp --->