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

<link href="<?=ROOT?>/assets/css/icons.min.css" rel="stylesheet" type="text/css">
<link href="<?=ROOT?>/assets/css/validate.css" rel="stylesheet" type="text/css">

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
                            <span
                                class="offcanvas-cart-item-details-price">R<?=number_format($item['row']->price * 4/100 + $item['row']->price, 2) ?></span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-cart-item-delete text-right">
                    <a href="#" onclick="cart.remove('<?=$item['id'] ?>')" class="offcanvas-cart-item-delete"><i
                            class="fa fa-trash-o"></i></a>
                </div>
            </li>
        </ul>
        <div class="offcanvas-cart-total-price">
            <span class="offcanvas-cart-total-price-text">Subtotal:</span>
            <span
                class="offcanvas-cart-total-price-value">R<?=number_format($item['qty'] * $item['row']->price * 4/100 + $item['qty'] * $item['row']->price, 2) ?></span>
        </div>
        <?php endforeach;?>
        <?php else: ?>
            <div class="pb-4">
                <h6 class="text-danger text-center text-uppercase pb-4"> No items were found in the cart!</h6>
            </div>
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

    <!-- Start  Offcanvas Addcart Wrapper -->
    <div class="offcanvas-add-cart-wrapper">
        <h4 class="offcanvas-title">Wishlist</h4>
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
                            <span
                                class="offcanvas-cart-item-details-price">R<?=number_format($item['row']->price * 4/100 + $item['row']->price, 2) ?></span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-cart-item-delete text-right">
                    <a href="#" onclick="cart.remove('<?=$item['id'] ?>')" class="offcanvas-cart-item-delete"><i
                            class="fa fa-trash-o"></i></a>
                </div>
            </li>
        </ul>
        <div class="offcanvas-cart-total-price">
            <span class="offcanvas-cart-total-price-text">Subtotal:</span>
            <span
                class="offcanvas-cart-total-price-value">R<?=number_format($item['qty'] * $item['row']->price * 4/100 + $item['qty'] * $item['row']->price, 2) ?></span>
        </div>
        <?php endforeach;?>
        <?php else: ?>
            <div class="pb-4">
                <h6 class="text-danger text-center text-uppercase pb-4"> No items were found in the cart!</h6>
            </div>
        <?php endif;?>
        <ul class="offcanvas-cart-action-button">
            <li><a href="<?=ROOT?>/wish_list" class="btn btn-block btn-green">View wishlist</a></li>
        </ul>
    </div>
    <!-- End  Offcanvas Addcart Wrapper -->

</div>
<!-- End Offcanvas Mobile Menu Section -->

<!-- Start Offcanvas Search Bar Section -->
<div id="search" class="search-modal">
    <button type="button" class="close">×</button>
    <form>
        <input type="search" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-lg btn-golden">Search</button>
    </form>
</div>
<!-- End Offcanvas Search Bar Section -->

<!-- Offcanvas Overlay -->
<div class="offcanvas-overlay"></div>

<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper b-title">
        <div class="container log-in">
            <?php 
                $customersModel = new Customer();

                $userId         = Auth::getUser_id();

                // Fetch single row data
                $customerData   = $customersModel->first('user_id', $userId);

                // Fetch single data
                $customerName    = $customerData->name ?? '';

                // Setup modes
                $mode = $_GET['mode'] ?? null;

                $modes = [
                    'approved'  => 'Thank you',
                    'cancel'    => 'Cancelled',
                ];

                $title = $modes[$mode] ?? 'Error';
            ?>
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title"><?= $title ?></h1></h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="<?=ROOT?>/">Home</a></li>
                                <li><a href="<?=ROOT?>/">Shop</a></li>
                                <li class="active" aria-current="page"><?= $title ?></h1></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- Start Thanks Section -->
<div class="container-xxl py-5">
    <div class="container">
        <?php
            // Define content for each mode
            $content = [
                'approved' => [
                    'img' => 'icons8-order-completed-48.png',
                    'title' => "Thank you, {$customerName}.",
                    'message' => <<<EOT
                        <p class="pt-0">
                            We appreciate you contacting us and will attend to your booking enquiry as soon as possible. 
                            If you have any urgent questions or need immediate assistance, please don't hesitate to call us on <strong>+27 81 811 2223.</strong>

                            We're excited to help you and guarantee your experience with us is exceptional. Have a wonderful day!
                        </p>
                    EOT,
                ],
                'cancel' => [
                    'img' => 'Oerder_cancelled.png',
                    'title' => "Sorry {$customerName}, Payment was cancelled.",
                    'message' => '',
                ],
            ];

            // Fallback for invalid or missing mode
            $defaultContent = [
                'img' => 'error-image-icon-1.jpg',
                'title' => 'Sorry, an error occurred.',
                'message' => '',
            ];

            // Get the appropriate content or default
            $currentContent = $content[$mode] ?? $defaultContent;
        ?>

        <div class="text-center wow fadeInUp pb-4" data-wow-delay="0.1s">
            <img class="img-fluid" width="100" height="100" src="<?= ROOT ?>/assets/img/<?= $currentContent['img'] ?>" alt="...">
        </div>

        <div class="text-center wow fadeInUp" data-wow-delay="0.3s">
            <h6 class="section-title bg-white text-center px-3" style="color: #cfa900; font-weight: lighter; font-size: 0.9rem;">
                <?= $currentContent['title'] ?>
            </h6>
            <?php if (!empty($currentContent['message'])): ?>
                <h6 style="color: #cfa900; font-size: 0.9rem; font-weight: lighter;">
                    <?= nl2br($currentContent['message']) ?>
                </h6>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- End Thanks Section -->

<?php $this->view('includes/footer'); ?>
