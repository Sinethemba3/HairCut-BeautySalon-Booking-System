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
        </div> <!-- ENd Offcanvas Header -->

        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-wishlist-wrapper">
            <h4 class="offcanvas-title">Wishlist</h4>
            <ul class="offcanvas-wishlist">
                <li class="offcanvas-wishlist-item-single">
                    <div class="offcanvas-wishlist-item-block">
                        <a href="#" class="offcanvas-wishlist-item-image-link">
                            <img src="assets/images/product/default/home-1/default-1.jpg" alt=""
                                class="offcanvas-wishlist-image">
                        </a>
                        <div class="offcanvas-wishlist-item-content">
                            <a href="#" class="offcanvas-wishlist-item-link">Car Wheel</a>
                            <div class="offcanvas-wishlist-item-details">
                                <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                                <span class="offcanvas-wishlist-item-details-price">$49.00</span>
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
                            <img src="assets/images/product/default/home-2/default-1.jpg" alt=""
                                class="offcanvas-wishlist-image">
                        </a>
                        <div class="offcanvas-wishlist-item-content">
                            <a href="#" class="offcanvas-wishlist-item-link">Car Vails</a>
                            <div class="offcanvas-wishlist-item-details">
                                <span class="offcanvas-wishlist-item-details-quantity">3 x </span>
                                <span class="offcanvas-wishlist-item-details-price">$500.00</span>
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
                            <img src="assets/images/product/default/home-3/default-1.jpg" alt=""
                                class="offcanvas-wishlist-image">
                        </a>
                        <div class="offcanvas-wishlist-item-content">
                            <a href="#" class="offcanvas-wishlist-item-link">Shock Absorber</a>
                            <div class="offcanvas-wishlist-item-details">
                                <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                                <span class="offcanvas-wishlist-item-details-price">$350.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-wishlist-item-delete text-right">
                        <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </li>
            </ul>
            <ul class="offcanvas-wishlist-action-button">
                <li><a href="#" class="btn btn-block btn-golden">View wishlist</a></li>
            </ul>
        </div> <!-- End Offcanvas Mobile Menu Wrapper -->

    </div> <!-- End Offcanvas Mobile Menu Section -->

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
                        <h3 class="breadcrumb-title">My Account</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?=ROOT?>/home">Home</a></li>
                                    <li><a href="<?=ROOT?>/home">Shop</a></li>
                                    <li class="active" aria-current="page">My Account</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Account Dashboard Section :::... -->
    <div class="account-dashboard py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- Sidebar Menu -->
                <div class="col-sm-12 col-md-3 col-lg-3 mb-4 mb-md-0">
                    <div class="dashboard_tab_button" data-aos="fade-up">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-outline-dark active">
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            </a></li>
                            <li><a href="#orders" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-outline-dark">
                                <i class="fas fa-shopping-bag me-2"></i> Orders
                            </a></li>
                            <li><a href="#downloads" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-outline-dark">
                                <i class="fas fa-download me-2"></i> Downloads
                            </a></li>
                            <li><a href="#address" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-outline-dark">
                                <i class="fas fa-map-marker-alt me-2"></i> Addresses
                            </a></li>
                            <li><a href="#account-details" data-bs-toggle="tab" class="nav-link btn btn-block btn-md btn-outline-dark">
                                <i class="fas fa-user-cog me-2"></i> Account Details
                            </a></li>
                            <li><a href="<?= ROOT ?>/logout" class="nav-link btn btn-block btn-md btn-outline-danger">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </a></li>
                        </ul>
                    </div>
                </div>

                <!-- Tab Content -->
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                        
                        <!-- Dashboard Tab -->
                        <div class="tab-pane fade show active" id="dashboard">
                            <h4 class="mb-3">👋 Welcome Back, <?= Auth::getname() ?>!</h4>
                            <p>From your dashboard you can quickly access your <a href="#orders" data-bs-toggle="tab">recent orders</a>, manage your <a href="#address" data-bs-toggle="tab">addresses</a>, and <a href="#account-details" data-bs-toggle="tab">update your account details</a>.</p>
                        </div>

                        <!-- Orders Tab -->
                        <div class="tab-pane fade" id="orders">
                            <h4 class="mb-3">🛒 Your Orders</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Jul 10, 2025</td>
                                            <td><span class="badge bg-success">Completed</span></td>
                                            <td>R250.00</td>
                                            <td><a href="<?=ROOT?>/cart" class="btn btn-sm btn-outline-primary">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jul 12, 2025</td>
                                            <td><span class="badge bg-warning text-dark">Processing</span></td>
                                            <td>R120.00</td>
                                            <td><a href="<?=ROOT?>/cart" class="btn btn-sm btn-outline-primary">View</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Downloads Tab -->
                        <div class="tab-pane fade" id="downloads">
                            <h4 class="mb-3">📥 Your Downloads</h4>
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Product</th>
                                            <th>Date</th>
                                            <th>Expires</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Spa & Beauty eBook</td>
                                            <td>May 10, 2025</td>
                                            <td><span class="text-danger">Expired</span></td>
                                            <td><a href="#" class="btn btn-sm btn-outline-secondary disabled">Download</a></td>
                                        </tr>
                                        <tr>
                                            <td>Relaxation Music Pack</td>
                                            <td>June 18, 2025</td>
                                            <td>Never</td>
                                            <td><a href="#" class="btn btn-sm btn-success">Download</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Address Tab -->
                        <div class="tab-pane fade" id="address">
                            <h4 class="mb-3">📍 Your Address</h4>
                            <p>This is your default billing address:</p>
                            <address class="border p-3 bg-white rounded shadow-sm">
                                <strong><?= Auth::getname() ?> <?= Auth::getsurname() ?></strong><br>
                                123 Customer Lane<br>
                                Cape Town, 8001<br>
                                South Africa<br>
                                Phone: 081 234 5678
                            </address>
                            <a href="#" class="btn btn-sm btn-outline-dark mt-2">Edit Address</a>
                        </div>

                        <!-- Account Details Tab -->
                        <div class="tab-pane fade" id="account-details">
                            <h4 class="mb-3">👤 Update Your Details</h4>
                            <form>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" value="<?= Auth::getname() ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" value="<?= Auth::getsurname() ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="<?= Auth::getemail() ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Birthdate</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>New Password</label>
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="offers">
                                    <label class="form-check-label" for="offers">
                                        Receive special offers from our partners
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="newsletter">
                                    <label class="form-check-label" for="newsletter">
                                        Sign up for our newsletter<br>
                                        <em>You can unsubscribe at any time.</em>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-dark text-white">Save Changes</button>
                            </form>
                        </div>
                    </div> <!-- End .tab-content -->
                </div>
            </div>
        </div>
    </div>
    <!-- ...:::: End Account Dashboard Section :::... -->

    <!-- Start Footer Section -->
    <?php $this->view('includes/footer'); ?>
    <!-- End Footer Section -->
</body>

</html>