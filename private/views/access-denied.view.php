<?php $this->view('includes/header'); ?>
    <!-- header & mobile header -->
    
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
                                        <span class="offcanvas-cart-item-details-price">R<?=number_format($item['row']->price * 4/100 + $item['row']->price, 2) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="offcanvas-cart-item-delete text-right">
                                <a href="#" onclick="cart.remove('<?=$item['id'] ?>')" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </li>
                    </ul>
                    <div class="offcanvas-cart-total-price">
                        <span class="offcanvas-cart-total-price-text">Subtotal:</span>
                        <span class="offcanvas-cart-total-price-value">R<?=number_format($item['qty'] * $item['row']->price * 4/100 + $item['qty'] * $item['row']->price, 2) ?></span>
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
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">403 Page</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?=ROOT?>/">Home</a></li>
                                    <li><a href="<?=ROOT?>/wigs">Shop</a></li>
                                    <li class="active" aria-current="page">404 Page</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Error Section :::... -->
    <div class="error-section">
        <div class="container">
            <div class="row">
                <div class="error-form">
                    <h1 class="big-title" data-aos="fade-up" data-aos-delay="0">403</h1>
                    <h4 class="sub-title" data-aos="fade-up" data-aos-delay="200">Access Denied!!</h4>
                    <p data-aos="fade-up" data-aos-delay="400">It's looking like you may have taken a wrong turn. Don't worry... it
                                    happens to the best of us. Here's a
                                    little tip that might help you get back on track.</p>
                    <div class="row">
                        <div class="col-10 offset-1 col-md-4 offset-md-4">
                            <div class="default-search-style d-flex" data-aos="fade-up" data-aos-delay="600">
                                <input class="default-search-style-input-box" type="search" placeholder="Search..."
                                    required>
                                <button class="default-search-style-input-btn" type="submit"><i
                                        class="fa fa-search"></i></button>
                            </div>
                            <a href="<?=ROOT?>/home" class="btn btn-md btn-black-default-hover mt-7" data-aos="fade-up"
                                data-aos-delay="800">Back to home page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Error Section :::... -->

    <!-- Start Footer Section -->
    <?php $this->view('includes/footer'); ?>
    <!-- End Footer Section -->
</body>



</html>