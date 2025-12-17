<!-- Start Header Area -->
<!DOCTYPE html>
<html lang="zxx">
    
<script language="JavaScript" type="text/javascript" >
    function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!-- /Added by HTTrack -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <title><?=APP_NAME ?> | <?=APP_DESC ?></title>

    <link rel="icon" href="<?=ROOT?>/assets/images/logo/logo_design.png" type="image/png">

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto+Mono:300,300italic,400,700|Arvo:400,700">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/stylez.css">

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="<?=ROOT?>/assets/images/logo/logo_design.png" type="image/png">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.min.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/preload.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/mdi/css/materialdesignicons.min.css">

    <script src="<?=ROOT?>/assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?=ROOT?>/assets/js/jquery-3.6.0.js"></script>

    <script src="<?=ROOT?>/assets/js/jquery-3.7.1.min.js"></script>

    <style>
        option[disabled] {
            background-color: #f8d7da; /* light red */
        }

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
            background: #FFB6C1;
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

<body class="one-screen-page">

    <div id="container"></div>

    <header class="header-section d-none d-xl-block">
        <div class="header-wrapper">
            <!-- Start Header Top -->
            <div class="header-top header-top section-fluid" style="background: #FFB6C1;">
                <div class="container">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <div class="header-top-left">
                            <div class="header-top-contact header-top-contact-color--white header-top-contact-hover-color--green">
                                <a href="tel:+27 81 811 2223" class="icon-space-right"><i class="icon-call-in"></i>
                                    +27 81 811 2223
                                </a>
                                <a href="mailto:afikamluxuryspa@gmail.com" class="icon-space-right"><i class="icon-envelope"></i>
                                afikamluxuryspa@gmail.com
                                </a>
                            </div>
                        </div>
                        <div class="header-top-right">
                            <div
                                class="header-top-user-link header-top-user-link-color--white header-top-user-link-hover-color--green">
                                <a href="<?=ROOT?>/wish_list">Wishlist</a>
                                <a href="<?=ROOT?>/cart">Cart</a>
                                <a href="<?=ROOT?>/checkout">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Header Top -->
             
            <!-- Start Header Bottom -->
            <div class="header-bottom header-bottom-color--green section-fluid sticky-header sticky-color--white">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <!-- Start Header Logo -->
                            <div class="header-logo">
                                <div class="logo">
                                    <a href="<?=ROOT?>/home"><img src="<?=ROOT?>/assets/images/logo/logo_design.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- End Header Logo -->

                            <!-- Start Header Main Menu -->
                            <div class="main-menu menu-color--black menu-hover-color--green">
                                <nav>
                                    <ul>
                                        <li class="has-dropdown">
                                            <a class="active main-menu-link" href="<?=ROOT?>/home" style="font-weight: lighter; font-size: 0.9rem">Home <i
                                                    class="fa fa-angle-down"></i></a>
                                            <!-- Sub Menu -->
                                            <ul class="sub-menu">
                                                <li><a href="<?=ROOT?>/home" style="font-weight: lighter; font-size: 0.9rem">Afika M Hair & Beauty</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-dropdown has-megaitem">
                                            <a href="<?=ROOT?>/wigs" style="font-weight: lighter; font-size: 0.9rem">Shop <i
                                                    class="fa fa-angle-down"></i></a>
                                            <!-- Mega Menu -->
                                            <div class="mega-menu">
                                                <ul class="mega-menu-inner">
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="javascript:void(0);" class="mega-menu-item-title" style="font-weight: lighter; font-size: 0.9rem">Shop Pages</a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="<?=ROOT?>/on_sale" style="font-weight: lighter; font-size: 0.9rem">On Sale</a></li>
                                                            <li><a href="<?=ROOT?>/wigs" style="font-weight: lighter; font-size: 0.9rem">Shop</a></li>
                                                            <li><a href="<?=ROOT?>/accessoriez1" style="font-weight: lighter; font-size: 0.9rem">Services & Treatment</a></li>
                                                            <li><a href="<?=ROOT?>/productz1" style="font-weight: lighter; font-size: 0.9rem">Products & Accessories</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-item">
                                                        <a href="javascript:void(0);" class="mega-menu-item-title" style="font-weight: lighter; font-size: 0.9rem">Weave/Wig Shop</a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="<?=ROOT?>/wigTypes?mode=curly" style="font-weight: lighter; font-size: 0.9rem">Curly</a></li>
                                                            <li><a href="<?=ROOT?>/wigTypes?mode=straight" style="font-weight: lighter; font-size: 0.9rem">Straight</a></li>
                                                            <li><a href="<?=ROOT?>/wigTypes?mode=wavy" style="font-weight: lighter; font-size: 0.9rem">Wavy</a></li>
                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="javascript:void(0);" class="mega-menu-item-title" style="font-weight: lighter; font-size: 0.9rem">Other</a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="<?=ROOT?>/bridal" style="font-weight: lighter; font-size: 0.9rem">AfikaM Brides</a></li>
                                                            <li><a href="<?=ROOT?>/spa" style="font-weight: lighter; font-size: 0.9rem">Spa</a></li>
                                                            <li><a href="<?=ROOT?>/manicure_pedicure" style="font-weight: lighter; font-size: 0.9rem">Manicure & Pedicure</a></li>
                                                            <li><a href="<?=ROOT?>/microshading2" style="font-weight: lighter; font-size: 0.9rem">Microshading</a></li>
                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="javascript:void(0);" class="mega-menu-item-title" style="font-weight: lighter; font-size: 0.9rem">Matric Dance</a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="<?=ROOT?>/matric" style="font-weight: lighter; font-size: 0.9rem">Matric Dance</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="<?=ROOT?>/about_us" style="font-weight: lighter; font-size: 0.9rem">About Us</a>
                                        </li>
                                        <li>
                                            <a href="<?=ROOT?>/contact_us" style="font-weight: lighter; font-size: 0.9rem">Contact Us</a>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="javascript:void(0);" style="font-weight: lighter; font-size: 0.9rem">More <i
                                                    class="fa fa-angle-down"></i></a>
                                            <!-- Sub Menu -->
                                            <ul class="sub-menu">
                                                <li><a href="<?=ROOT?>/cart" style="font-weight: lighter; font-size: 0.9rem">Cart</a></li>
                                                <li><a href="<?=ROOT?>/checkout" style="font-weight: lighter; font-size: 0.9rem">Checkout</a></li>
                                                <li><a href="<?=ROOT?>/signup" style="font-weight: lighter; font-size: 0.9rem">Sign Up</a></li>
                                                <li><a href="<?=ROOT?>/my_accounts" style="font-weight: lighter; font-size: 0.9rem">My Account</a></li>
                                                <li><a href="<?=ROOT?>/login" style="font-weight: lighter; font-size: 0.9rem">Log In</a></li>
                                                <li><a href="<?=ROOT?>/logout" style="font-weight: lighter; font-size: 0.9rem">Log Out</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- End Header Main Menu Start -->

                            <!-- Start Header Action Link -->
                            <ul class="header-action-link action-color--black action-hover-color--green">
                                <li>
                                    <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                        <i class="icon-bag"></i>
                                        <span id="cart_count" class="item-count">0</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#search">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
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
                                    <a href="<?=ROOT?>/home"><img src="<?=ROOT?>/assets/images/logo/logo_design.png" alt="">
                                    </a>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Mobile Left Side -->

                    <!-- Start Mobile Right Side -->
                    <div class="mobile-right-side">
                        <ul class="header-action-link action-color--black action-hover-color--gold">
                            <li>
                                <a href="#search">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                    <i class="icon-bag"></i>
                                    <span id="cart_count" class="item-count"> <?= $cart_count > 0 ? $cart_count : '0' ?> </span>
                                </a>
                            </li>
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
                    <ul>
                        <li>
                            <a href="<?=ROOT?>/home" style="font-weight: lighter; font-size: 0.9rem"><span>Home</span></a>
                            <ul class="mobile-sub-menu">
                            </ul>
                        </li>
                        <li>
                            <a href="<?=ROOT?>/on_sale" style="font-weight: lighter; font-size: 0.9rem"><span>On Sale</span></a>
                            <ul class="mobile-sub-menu">
                            </ul>
                        </li>
                        <li>
                            <a href="<?=ROOT?>/wigs" style="font-weight: lighter; font-size: 0.9rem"><span>Shop</span></a>
                            <ul class="mobile-sub-menu">
                            </ul>
                        </li>
                        <li>
                            <a href="#" style="font-weight: lighter; font-size: 0.9rem"><span>Hair</span></a>
                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="#" style="font-weight: lighter; font-size: 0.9rem">Wigs/Bundles/Closures</a>
                                    <ul class="mobile-sub-menu">
                                        <li>
                                            <a href="<?=ROOT?>/wigTypes?mode=straight" style="font-weight: lighter; font-size: 0.9rem">Straight</a>
                                            <ul class="mobile-sub-menu">
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="<?=ROOT?>/wigTypes?mode=curly" style="font-weight: lighter; font-size: 0.9rem">Curly</a>
                                            <ul class="mobile-sub-menu">
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="<?=ROOT?>/wigTypes?mode=wavy" style="font-weight: lighter; font-size: 0.9rem">Wavy</a>
                                            <ul class="mobile-sub-menu">
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" style="font-weight: lighter; font-size: 0.9rem">Hair Services & treatment</a>
                                    <ul class="mobile-sub-menu">
                                        <li>
                                            <a href="<?=ROOT?>/accessoriez1" style="font-weight: lighter; font-size: 0.9rem">Services & Treatment</a>
                                            <ul class="mobile-sub-menu">
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" style="font-weight: lighter; font-size: 0.9rem">Hair Products & Accessories</a>
                                    <ul class="mobile-sub-menu">
                                        <li>
                                            <a href="<?=ROOT?>/productz1" style="font-weight: lighter; font-size: 0.9rem">Products & Accessories</a>
                                            <ul class="mobile-sub-menu">
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" style="font-weight: lighter; font-size: 0.9rem"><span>Beauty</span></a>
                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="<?=ROOT?>/face_beat" style="font-weight: lighter; font-size: 0.9rem">Make up</a>
                                    <ul class="mobile-sub-menu">
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?=ROOT?>/microshading2" style="font-weight: lighter; font-size: 0.9rem">Microshading</a>
                                    <ul class="mobile-sub-menu">
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?=ROOT?>/manicure_pedicure" style="font-weight: lighter; font-size: 0.9rem">Nails</a>
                                    <ul class="mobile-sub-menu">
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?=ROOT?>/spa" style="font-weight: lighter; font-size: 0.9rem">Spa Treatment</a>
                                    <ul class="mobile-sub-menu">
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?=ROOT?>/bridal" style="font-weight: lighter; font-size: 0.9rem"><span>AfikaM Brides</span></a>
                            <ul class="mobile-sub-menu">
                            </ul>
                        </li>
                        <li>
                            <a href="<?=ROOT?>/matric" style="font-weight: lighter; font-size: 0.9rem"><span>Matric</span></a>
                            <ul class="mobile-sub-menu">
                            </ul>
                        </li>
                        <li>
                            <a href="<?=ROOT?>/about_us" style="font-weight: lighter; font-size: 0.9rem">About Us</a>
                        </li>
                        <li>
                            <a href="<?=ROOT?>/contact_us" style="font-weight: lighter; font-size: 0.9rem">Contact Us</a>
                        </li>
                        <li>
                            <a href="#" style="font-weight: lighter; font-size: 0.9rem"><span>More</span></a>
                            <ul class="mobile-sub-menu">
                                <li><a href="<?=ROOT?>/cart" style="font-weight: lighter; font-size: 0.9rem">Cart</a></li>
                                <li><a href="<?=ROOT?>/checkout" style="font-weight: lighter; font-size: 0.9rem">Checkout</a></li>
                                <li><a href="<?=ROOT?>/signup" style="font-weight: lighter; font-size: 0.9rem">Sign Up</a></li>
                                <li><a href="<?=ROOT?>/my_accounts" style="font-weight: lighter; font-size: 0.9rem">My Account</a></li>
                                <li><a href="<?=ROOT?>/login" style="font-weight: lighter; font-size: 0.9rem">Log In</a></li>
                                <li><a href="<?=ROOT?>/logout" style="font-weight: lighter; font-size: 0.9rem">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- End Mobile Menu Nav -->
            </div> <!-- End Mobile Menu -->

            <!-- Start Mobile contact Info -->
            <div class="mobile-contact-info">
                <div class="logo">
                    <a href="<?=ROOT?>/home"><img src="<?=ROOT?>/assets/images/logo/designs.png" alt=""></a>
                </div>

                <address class="address">
                    <span>Address: 1 Lancaster Road Vincent, East London 5217.</span>
                    <span>Call Us: +27 81 811 2223</span>
                    <span>Email: afikamluxuryspa@gmail.com</span>
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
                <a href="<?=ROOT?>/home"><img src="<?=ROOT?>/assets/images/logo/designs.png" alt=""></a>
            </div>

            <address class="address">
                <span>Address: 1 Lancaster Road Vincent, East London 5217.</span>
                <span>Call Us: +27 81 811 2223</span>
                <span>Email: afikamluxuryspa@gmail.com</span>
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

    <!-- Cart Offcanvas -->
    <div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div>

        <div class="offcanvas-add-cart-wrapper">
            <h4 class="offcanvas-title">Shopping Cart</h4>
            <?php if (!empty($CART)): ?>
            <ul class="offcanvas-cart">
                <?php foreach ($CART as $item): ?>
                <li class="offcanvas-cart-item-single">
                    <div class="offcanvas-cart-item-block">
                        <a href="#" class="offcanvas-cart-item-image-link">
                            <img src="<?=get_image($item['row']->image)?>" alt="Item Image"
                                class="offcanvas-cart-image">
                        </a>
                        <div class="offcanvas-cart-item-content">
                            <a href="#" class="offcanvas-cart-item-link"><?=esc($item['row']->name)?></a>
                            <div class="offcanvas-cart-item-details">
                                <span class="offcanvas-cart-item-details-quantity"><?=$item['qty']?> x </span>
                                <span
                                    class="offcanvas-cart-item-details-price">R<?=number_format($item['row']->price, 2) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-cart-item-delete text-right">
                        <a href="#" class="offcanvas-cart-item-delete" aria-label="Remove item from cart"><i
                                class="fa fa-trash-o"></i></a>
                    </div>
                </li>
                <div class="offcanvas-cart-total-price">
                    <span class="offcanvas-cart-total-price-text">Subtotal:</span>
                    <span
                        class="offcanvas-cart-total-price-value">R<?=number_format($item['qty'] * $item['row']->price, 2) ?></span>
                </div>
                <?php endforeach; ?>
            </ul>
            <?php else: ?>
            <p class="text-center">Your cart is currently empty.</p>
            <?php endif; ?>

            <ul class="offcanvas-cart-action-button">
                <li><a href="<?=ROOT?>/cart" class="btn btn-block btn-green">View Cart</a></li>
                <li><a href="<?=ROOT?>/checkout" class="btn btn-block btn-green mt-5">Checkout</a></li>
            </ul>
        </div>
    </div>

    <!-- Wishlist Offcanvas -->
    <div id="offcanvas-wishlist" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div>
        <div class="offcanvas-wishlist-wrapper">
            <h4 class="offcanvas-title">Wishlist</h4>
            <ul class="offcanvas-wishlist">
                <!-- Example Item, you should replace this with dynamic content -->
                <li class="offcanvas-wishlist-item-single">
                    <div class="offcanvas-wishlist-item-block">
                        <a href="#" class="offcanvas-wishlist-item-image-link">
                            <img src="<?=ROOT?>/assets/images/product/default/home-1/default-1.jpg" alt="Wishlist Item"
                                class="offcanvas-wishlist-image">
                        </a>
                        <div class="offcanvas-wishlist-item-content">
                            <a href="#" class="offcanvas-wishlist-item-link">Car Wheel</a>
                            <div class="offcanvas-wishlist-item-details">
                                <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                                <span class="offcanvas-wishlist-item-details-price">R49.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-wishlist-item-delete text-right">
                        <a href="#" class="offcanvas-wishlist-item-delete" aria-label="Remove item from wishlist"><i
                                class="fa fa-trash-o"></i></a>
                    </div>
                </li>
            </ul>
            <ul class="offcanvas-wishlist-action-button">
                <li><a href="<?=ROOT?>/wish_list" class="btn btn-block btn-green">View Wishlist</a></li>
            </ul>
        </div>
    </div>

    <!-- Search Modal -->
    <div id="search" class="search-modal modal">
        <button type="button" class="close" aria-label="Close search modal">×</button>
        <form role="search" method="get" action="search.php">
            <input type="search" placeholder="Type keyword(s) here" required />
            <button type="submit" class="btn btn-lg btn-green">Search</button>
        </form>
    </div>

    <!--- WhatsApp --->
    <div class="whatsapp">
        <!-- WhatsApp Chat Button -->
        <a href="https://api.whatsapp.com/send?phone=+27818112223&text=Hello!%20I%20need%20some%20assistance." target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp Chat" width="40">
        </a>

    </div>
    <!--- WhatsApp --->