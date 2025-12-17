<?php $this->view('includes/header'); ?>

    <style>
        /* Fix height on all screen sizes */
        .log-in {
            height: 2vh;
        }

        .b-title{
            padding-bottom: 100px;
        }
    </style>
   
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
                                        <span class="offcanvas-cart-item-details-amount">R<?=number_format($item['row']->price, 2) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="offcanvas-cart-item-delete text-right">
                                <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </li>
                    </ul>
                    <div class="offcanvas-cart-total-amount">
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
                                <span class="offcanvas-wishlist-item-details-amount">R49.00</span>
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
                                <span class="offcanvas-wishlist-item-details-amount">R500.00</span>
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
                                <span class="offcanvas-wishlist-item-details-amount">R350.00</span>
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

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper b-title">
            <div class="container log-in">
                <div class="row">
                    <?php 
                        // Define an array mapping modes
                        $modes = [
                            'hair'   => 'Hair Services',
                            'beauty' => 'Beauty Services',
                        ];

                        // Setup modes
                        $mode = $_GET['mode'] ?? 'error';

                        // Get the title based on the mode
                        $title = $modes[$mode] ?? 'Error';
                    ?>

                    <div class="col-12">
                        <h3 class="breadcrumb-title"><?= esc($title) ?></h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?=ROOT?>/home">Home</a></li>
                                    <li class="active" aria-current="page"><?= esc($title) ?></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <div class="container-fluid">
        <form method="post" action="">
            <?php
                // Map service group names (uppercase) to icon classes
                $serviceIcons = [
                    'HAIRDRESSING'    => 'fa-users',
                    'WIG BAR'         => 'fa-user',
                    'PLAITS & BRAIDS' => 'fa-shopping-bag',
                    'NAILS'           => 'fa-users',
                    'FACE & BODY'     => 'fa-users',
                    'PACKAGES'        => 'fa-shopping-bag',
                    'KIDDIES'         => 'fa-child',
                    'ELDERLY'         => 'fa-heart',
                ];
    
                // Initialize $modeServices *before* the loop
                $modeServices = [];
                if (!empty($rows)) {
                    foreach ($rows as $row) {
                        if ($row->main_service === 'Hair') {
                            $modeServices['hair'][] = $row->service;
                        } elseif ($row->main_service === 'Beauty') {
                            $modeServices['beauty'][] = $row->service;
                        }
                    }
                }
    
                $grouped = [];
                if (!empty($rows)) {
                    foreach ($rows as $row) {
                        if (isset($modeServices[$mode]) && in_array($row->service, $modeServices[$mode])) {
                            $grouped[$row->service][] = $row;
                        }
                    }
                }
            ?>
    
            <!-- Button -->
            <div style="padding-left: 2%; padding-bottom: 40px;">
                <button type="submit" id="submitButton"
                    class="d-flex align-items-center text-white"
                    style="background: #2563eb; padding: 10px 25px; border-radius: 35px; min-width: 120px; letter-spacing: .1em; font-weight: 400; font-size: 0.9rem; text-align: center;"
                    disabled>
                    continue <i class="ion-ios-arrow-thin-right"></i>
                </button>
            </div>
    
            <?php foreach ($grouped as $serviceGroup => $services): ?>
                <?php 
                    $groupHash = md5($serviceGroup); 
    
                    // Normalize current group name to uppercase
                    $groupKey = strtoupper($serviceGroup);
    
                    // Get icon for current service group or default icon
                    $iconClass = $serviceIcons[$groupKey] ?? 'fa-scissors';
                ?>
                <div class="row px-5">
                    <div class="col-md-12">
                        <div class="user-actions accordion">
                            <h3>
                                <i class="fa <?= $iconClass ?>" aria-hidden="true"></i>
                                <?= esc($groupKey) ?> -
                                <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#collapse_<?= $groupHash ?>" aria-expanded="false">
                                    Click to view Prices
                                </a>
                            </h3>
                            <br>
                            <div id="collapse_<?= $groupHash ?>" class="collapse">
                                <div class="compare-section">
                                    <?php if (!empty($services)): ?>
                                        <?php foreach ($services as $index => $row): ?>
                                            <?php $uniqueIndex = "{$groupHash}_{$index}"; ?>
                                            <div class="panel-default pb-2">
                                                <label class="checkbox-default" for="services_<?= $uniqueIndex ?>" style="width: 35%;">
                                                    <input type="checkbox"
                                                        value="<?= esc($row->service_name) ?>"
                                                        name="services_[]"
                                                        id="services_<?= $uniqueIndex ?>"
                                                        class="service-checkbox"
                                                        data-amount-id="amount-<?= $uniqueIndex ?>">
                                                    <span style="font-size: 0.7rem;">
                                                        <?= esc($row->name) ?> - <?= esc($row->service_name) ?>
                                                    </span>
                                                </label>
    
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                
                                                <label class="checkbox-default" for="amount_<?= $uniqueIndex ?>">
                                                    <input type="checkbox"
                                                        value="<?= $row->price1 ?>"
                                                        name="amount[]"
                                                        id="amount-<?= $uniqueIndex ?>"
                                                        class="amount-checkbox"
                                                        style="display: none;"
                                                        disabled>
                                                    <span style="font-size: 0.7rem;">R<?= number_format($row->price1, 2) ?></span>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="pb-4">
                                            <div class="col-12 text-center pb-4" style="font-size: 5rem;">&#128526;</div>
                                            <h4 class="text-danger text-center text-uppercase">No services found for <?= esc($serviceGroup) ?></h4>
                                        </div>
                                    <?php endif; ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $('.amount-checkbox').on('click', function (e) {
                e.preventDefault(); // Prevent manual checking
                return false;
            });

            $('.service-checkbox').change(function () {
                const amountId = $(this).data('amount-id');
                const $priceCheckbox = $('#' + amountId);

                if ($(this).is(':checked')) {
                    $priceCheckbox.prop('disabled', false).prop('checked', true);
                } else {
                    $priceCheckbox.prop('checked', false).prop('disabled', true);
                }

                checkSubmitButton();
            });

            function checkSubmitButton() {
                const isChecked = $('.service-checkbox:checked').length > 0;
                $('#submitButton').prop('disabled', !isChecked);
            }
        });
    </script>
<?php $this->view('includes/footer'); ?>