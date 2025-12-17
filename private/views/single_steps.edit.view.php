<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title><?=APP_NAME ?> | <?=APP_DESC ?></title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <!-- ::::::::::::::Favicon icon:::::::::::::: -->
    <link rel="shortcut icon" href="<?=ROOT?>/assets/images/logo/logo_design.png" type="image/png">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto+Mono:300,300italic,400,700%7CArvo:400,700">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/stylez.css">
  </head>

  <body class="one-screen-page">
    <?php $this->view('includes/header'); ?>
 
    <!-- Start Offcanvas Addcart Section -->
    <div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div>
        <!-- End Offcanvas Header -->

        <!-- Start  Offcanvas Addcart Wrapper -->
        <div class="offcanvas-add-cart-wrapper">
            <h4 class="offcanvas-title">Shopping Cart</h4>
            <?php if(!empty($CART)):?>
                <?php foreach($CART as $item):?>
                    <ul class="offcanvas-cart">
                        <li class="offcanvas-cart-item-single">
                            <div class="offcanvas-cart-item-block">
                                <a href="#" class="offcanvas-cart-item-image-link">
                                    <img src="<?=get_image($item['row']->image)?>" alt="" class="offcanvas-cart-image">
                                </a>
                                <div class="offcanvas-cart-item-content">
                                    <a href="#" class="offcanvas-cart-item-link"><?=esc($item['row']->name)?></a>
                                    <div class="offcanvas-cart-item-details">
                                        <span class="offcanvas-cart-item-details-quantity"><?=$item['qty']?> x </span>
                                        <span class="offcanvas-cart-item-details-price">R<?=number_format($item['row']->price, 2) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="offcanvas-cart-item-delete text-right">
                                <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </li>
                    </ul>
                    <div class="offcanvas-cart-total-price">
                        <span class="offcanvas-cart-total-price-text">Subtotal:</span>
                        <span class="offcanvas-cart-total-price-value">R<?=number_format($item['qty'] * $item['row']->price, 2) ?></span>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
            <ul class="offcanvas-cart-action-button">
                <li><a href="<?=ROOT?>/cart" class="btn btn-block btn-green">View Cart</a></li>
                <li><a href="<?=ROOT?>/checkout" class=" btn btn-block btn-green mt-5">Checkout</a></li>
            </ul>
        </div>
        <!-- End  Offcanvas Addcart Wrapper -->

    </div>
    <!-- End  Offcanvas Addcart Section -->

    <!-- Start Offcanvas Mobile Menu Section -->
    <div id="offcanvas-wishlish" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div>
        <!-- ENd Offcanvas Header -->

        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-wishlist-wrapper">
            <h4 class="offcanvas-title">Wishlist</h4>
            <ul class="offcanvas-wishlist">
                <li class="offcanvas-wishlist-item-single">
                    <div class="offcanvas-wishlist-item-block">
                        <a href="#" class="offcanvas-wishlist-item-image-link">
                            <img src="<?=ROOT?>/assets/images/product/default/home-1/default-1.jpg" alt="" class="offcanvas-wishlist-image">
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
                        <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </li>
                <li class="offcanvas-wishlist-item-single">
                    <div class="offcanvas-wishlist-item-block">
                        <a href="#" class="offcanvas-wishlist-item-image-link">
                            <img src="<?=ROOT?>/assets/images/product/default/home-2/default-1.jpg" alt="" class="offcanvas-wishlist-image">
                        </a>
                        <div class="offcanvas-wishlist-item-content">
                            <a href="#" class="offcanvas-wishlist-item-link">Car Vails</a>
                            <div class="offcanvas-wishlist-item-details">
                                <span class="offcanvas-wishlist-item-details-quantity">3 x </span>
                                <span class="offcanvas-wishlist-item-details-price">R500.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-wishlist-item-delete text-right">
                        <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </li>
                <li class="offcanvas-wishlist-item-single">
                    <div class="offcanvas-wishlist-item-block">
                        <a href="#" class="offcanvas-wishlist-item-image-link">
                            <img src="<?=ROOT?>/assets/images/product/default/home-3/default-1.jpg" alt="" class="offcanvas-wishlist-image">
                        </a>
                        <div class="offcanvas-wishlist-item-content">
                            <a href="#" class="offcanvas-wishlist-item-link">Shock Absorber</a>
                            <div class="offcanvas-wishlist-item-details">
                                <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                                <span class="offcanvas-wishlist-item-details-price">R350.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-wishlist-item-delete text-right">
                        <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </li>
            </ul>
            <ul class="offcanvas-wishlist-action-button">
                <li><a href="<?=ROOT?>/wish_list" class="btn btn-block btn-green">View wishlist</a></li>
            </ul>
        </div>
        <!-- End Offcanvas Mobile Menu Wrapper -->

    </div>
    <!-- End Offcanvas Mobile Menu Section -->

    <!-- Start Offcanvas Search Bar Section -->
    <div id="search" class="search-modal">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-lg btn-green">Search</button>
        </form>
    </div>
    <!-- End Offcanvas Search Bar Section -->

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>
    
    <div class="page">
      <main class="page-content" id="perspective">
        <div class="content-wrapper">
          <br><br>
            <div id="wrapper">
                <section class="section-xs bg-periglacial-blue one-screen-page-content text-center">
                    <div class="step-progress">
                        <div class="step-progress-top">
                            <span class="step-progress-number">2</span><span>of</span><span class="step-progress-number">3</span>
                        </div>
                    </div>
                    <div class="step-progress">
                        <div class="step-progress-bottom">
                            <p class="step-progress-text">STEPs</p>
                        </div>
                    </div>
                    <div class="shell">
                        <h2 style="font-size: 1rem;">CHOOSE <?= esc(ucfirst($mode)) ?> Therapist</h2>
                        <h2 style="font-size: 1rem;">FROM <?= esc($branch) ?> Branch</h2>
                        <div class="p text-width-medium">
                            <p class="big">Afika's Hair & Beauty offers professional services of certified therapists with years of experience. On this page you can choose a preferred therapist in a few clicks.</p>
                        </div>
                        <div class="range range-lg-center">
                            <div class="cell-lg-10">
                                <div class="range range-sm-center range-md-left range-30">
                                    <!-- Start Service Promo Single Item -->
                                    <div class="container">
                                        <div class="row">
                                            <?php if (!empty($rows)): ?>
                                            <?php
                                                date_default_timezone_set('Africa/Johannesburg');
                                                $today = strtolower(date('l'));
                                                $todayDate = date('Y-m-d');

                                                $todayCodeMap = [
                                                'monday'    => 'mo',
                                                'tuesday'   => 'tu',
                                                'wednesday' => 'we', 
                                                'thursday'  => 'th',
                                                'friday'    => 'fr',
                                                'saturday'  => 'st',
                                                'sunday'    => 'sn'
                                                ];
                                                $expectedCode = $todayCodeMap[$today]; 
                                            ?>

                                            <?php foreach ($rows as $row): 
                                                $isAvailableToday = isset($row->$today) && $row->$today === $expectedCode;
                                                $bookedSlots = $bookings[$row->id][$todayDate] ?? [];

                                                $isBusy = false;
                                                $busySlotTime = '';
                                                $now = time();

                                                $therapistBookings = $bookings[$row->id] ?? [];

                                                foreach ($therapistBookings as $appointmentDate => $slots) {
                                                foreach ($slots as $slot) {
                                                    $slot = trim($slot);
                                                    if (strpos($slot, '-') === false) continue;

                                                    [$start, $end] = array_map('trim', explode(' - ', $slot));
                                                    $startTime = strtotime("$appointmentDate $start");
                                                    $endTime   = strtotime("$appointmentDate $end");

                                                    if ($now >= $startTime && $now < $endTime) {
                                                    $isBusy = true;
                                                    $busySlotTime = "$start - $end";
                                                    break 2;
                                                    }
                                                }
                                                }
                                            ?>

                                                <div class="col-sm-6 col-md-4 mb-4">
                                                <form method="post">
                                                    <div class="card h-100 text-center shadow-sm">
                                                    <img src="<?= get_image($row->image, $row->gender) ?>"
                                                        class="card-img-top rounded-circle mx-auto mt-3"
                                                        style="width:120px;height:120px;"
                                                        alt="<?= esc($row->name) ?>">

                                                    <div class="card-body">
                                                        <h5 class="card-title" style="font-size: 1rem;">
                                                        <?= esc($row->name . ' ' . $row->surname) ?>
                                                        </h5>

                                                        <span class="pb-1" style="font-size: 0.7rem;">Weekday Availability</span>

                                                        <ul class="list-inline" style="padding-left: 0; margin-bottom: 10px;">
                                                        <?php foreach ($todayCodeMap as $day => $code): ?>
                                                            <?php
                                                            $isActive = isset($row->$day) && $row->$day === $code;
                                                            $badgeClass = $isActive ? 'bg-success' : 'bg-secondary';
                                                            $badgeText = $isActive ? $code : 'off';
                                                            ?>
                                                            <li class="list-inline-item" style="margin-right: 5px;">
                                                            <span class="badge <?= $badgeClass ?>" style="font-size: 0.6rem; padding: 0.30em 0.6em;">
                                                                <?= $badgeText ?>
                                                            </span>
                                                            </li>
                                                        <?php endforeach; ?>
                                                        </ul>

                                                        <input type="hidden" name="name_" value="<?= esc($row->name) ?>">
                                                        <input type="hidden" name="surname_" value="<?= esc($row->surname) ?>">
                                                        <input type="hidden" name="therapist_id" value="<?= esc($row->id) ?>">

                                                        <?php if ($isAvailableToday): ?>
                                                        <?php if ($isBusy): ?>
                                                            <button type="button" class="btn btn-sm text-white" style="background-color: red;" disabled>
                                                            Therapist Busy
                                                            </button>
                                                            <?php if (!empty($busySlotTime)): ?>
                                                            <div style="font-size: 0.75rem; color: red; margin-top: 5px;">
                                                                Busy from <?= $busySlotTime ?>
                                                            </div>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <button type="submit" class="btn btn-sm btn-primary">
                                                            Continue <i class="ion-ios-arrow-thin-right"></i>
                                                            </button>
                                                        <?php endif; ?>
                                                        <?php else: ?>
                                                        <button type="button" class="btn btn-sm btn-secondary" disabled>
                                                            Off Day
                                                        </button>
                                                        <?php endif; ?>
                                                    </div>
                                                    </div>
                                                </form>
                                                </div>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                            <div class="col-12 text-center pb-4" style="font-size: 5rem;">&#128526;</div>
                                            <div class="col-12 text-center text-danger">
                                                <h4>No <?= esc(ucfirst($mode)) ?> therapists found.</h4>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- End Service Promo Single Item -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
          <div id="perspective-content-overlay"></div>
        </div>
      </main>
    </div>
    
    <div class="snackbars" id="form-output-global"></div>
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Share"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                <div class="pswp__preloader__icn">
                    <div class="pswp__preloader__cut">
                    <div class="pswp__preloader__donut"></div>
                    </div>
                </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__cent"></div>
            </div>
            </div>
        </div>
    </div>
    
    <script src="<?=ROOT?>/assets/js/core.min.js"></script>
    <script src="<?=ROOT?>/assets/js/script.js"></script>

    <!-- Start Footer Section -->
   <?php $this->view('includes/footer'); ?>
    <!-- End Footer Section -->
  </body>
</html>