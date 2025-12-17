<?php $this->view('includes/header'); ?>
<!-- header & mobile header -->

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
        </div> <!-- End Offcanvas Header -->

        <!-- Start  Offcanvas Addcart Wrapper -->
        <div class="offcanvas-add-cart-wrapper">
            <h4 class="offcanvas-title">Shopping Cart</h4>
            <ul class="offcanvas-cart">
                <li class="offcanvas-cart-item-single">
                    <div class="offcanvas-cart-item-block">
                        <a href="#" class="offcanvas-cart-item-image-link">
                            <img src="assets/images/product/default/home-1/default-1.jpg" alt=""
                                class="offcanvas-cart-image">
                        </a>
                        <div class="offcanvas-cart-item-content">
                            <a href="#" class="offcanvas-cart-item-link">Car Wheel</a>
                            <div class="offcanvas-cart-item-details">
                                <span class="offcanvas-cart-item-details-quantity">1 x </span>
                                <span class="offcanvas-cart-item-details-price">$49.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-cart-item-delete text-right">
                        <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </li>
                <li class="offcanvas-cart-item-single">
                    <div class="offcanvas-cart-item-block">
                        <a href="#" class="offcanvas-cart-item-image-link">
                            <img src="assets/images/product/default/home-2/default-1.jpg" alt=""
                                class="offcanvas-cart-image">
                        </a>
                        <div class="offcanvas-cart-item-content">
                            <a href="#" class="offcanvas-cart-item-link">Car Vails</a>
                            <div class="offcanvas-cart-item-details">
                                <span class="offcanvas-cart-item-details-quantity">3 x </span>
                                <span class="offcanvas-cart-item-details-price">$500.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-cart-item-delete text-right">
                        <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </li>
                <li class="offcanvas-cart-item-single">
                    <div class="offcanvas-cart-item-block">
                        <a href="#" class="offcanvas-cart-item-image-link">
                            <img src="assets/images/product/default/home-3/default-1.jpg" alt=""
                                class="offcanvas-cart-image">
                        </a>
                        <div class="offcanvas-cart-item-content">
                            <a href="#" class="offcanvas-cart-item-link">Shock Absorber</a>
                            <div class="offcanvas-cart-item-details">
                                <span class="offcanvas-cart-item-details-quantity">1 x </span>
                                <span class="offcanvas-cart-item-details-price">$350.00</span>
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
                <span class="offcanvas-cart-total-price-value">$170.00</span>
            </div>
            <ul class="offcanvas-cart-action-button">
                <li><a href="cart.html" class="btn btn-block btn-golden">View Cart</a></li>
                <li><a href="compare.html" class=" btn btn-block btn-golden mt-5">Checkout</a></li>
            </ul>
        </div> <!-- End  Offcanvas Addcart Wrapper -->

    </div> <!-- End  Offcanvas Addcart Section -->

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
        <div class="breadcrumb-wrapper b-title">
            <div class="container log-in">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Frequently Asked Questions</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?=ROOT?>/home">Home</a></li>
                                    <li><a href="<?=ROOT?>/home">Shop</a></li>
                                    <li class="active" aria-current="page">Frequently Asked Questions</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...::::Start About Us Center Section:::... -->
    <div class="faq-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="faq-content" data-aos="fade-up" data-aos-delay="0">
                        <h5 class="title">Below are frequently asked questions, you may find the answer for yourself</h5>
                        <p>Our platform makes booking a medical appointment quick and easy. From choosing your preferred service and location to selecting a doctor and confirming your appointment—everything is done in a few simple steps.</p>
                    </div>
                </div>
            </div>
            <div class="faq-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="faq-accordian">
                            <div class="faq-accordian-single-item" data-aos="fade-up" data-aos-delay="0">
                                <input id="item-1" name="accordian-item" type="radio" checked>
                                <label for="item-1">How do I book a medical appointment?</label>
                                <div class="item-content">
                                    <p>First, browse through available services, choose the one you need, select your nearest location, pick a doctor, choose a date and time, enter your contact info, and confirm your booking.</p>
                                </div>
                            </div>

                            <div class="faq-accordian-single-item" data-aos="fade-up" data-aos-delay="200">
                                <input id="item-2" name="accordian-item" type="radio">
                                <label for="item-2">Do I need an account to make a booking?</label>
                                <div class="item-content">
                                    <p>Yes, creating an account helps you manage appointments, receive updates, and view your booking history securely.</p>
                                </div>
                            </div>

                            <div class="faq-accordian-single-item" data-aos="fade-up" data-aos-delay="400">
                                <input id="item-3" name="accordian-item" type="radio">
                                <label for="item-3">Can I choose a specific doctor?</label>
                                <div class="item-content">
                                    <p>Yes, after selecting your service and location, you’ll see a list of available doctors. You can view their profile and choose the one that best suits you.</p>
                                </div>
                            </div>

                            <div class="faq-accordian-single-item" data-aos="fade-up" data-aos-delay="600">
                                <input id="item-4" name="accordian-item" type="radio">
                                <label for="item-4">What if no doctors are available at my selected time?</label>
                                <div class="item-content">
                                    <p>If no doctors are available at your chosen time, you’ll be shown alternative time slots or other doctors with availability. You can also choose a different date.</p>
                                </div>
                            </div>

                            <div class="faq-accordian-single-item" data-aos="fade-up" data-aos-delay="800">
                                <input id="item-5" name="accordian-item" type="radio">
                                <label for="item-5">Will I receive a confirmation or reminder?</label>
                                <div class="item-content">
                                    <p>Yes, once your appointment is confirmed, you'll receive an email or SMS confirmation. A reminder is also sent 24 hours before your appointment.</p>
                                </div>
                            </div>

                            <div class="faq-accordian-single-item" data-aos="fade-up" data-aos-delay="1000">
                                <input id="item-6" name="accordian-item" type="radio">
                                <label for="item-6">Is my personal information secure?</label>
                                <div class="item-content">
                                    <p>Yes, your data is encrypted and protected under healthcare data compliance laws. Only authorized personnel can access your information.</p>
                                </div>
                            </div>

                            <div class="faq-accordian-single-item" data-aos="fade-up" data-aos-delay="1200">
                                <input id="item-7" name="accordian-item" type="radio">
                                <label for="item-7">Can I reschedule or cancel my booking?</label>
                                <div class="item-content">
                                    <p>Yes, you can log into your account and easily reschedule or cancel your booking at least 24 hours in advance without any fees.</p>
                                </div>
                            </div>

                            <div class="faq-accordian-single-item" data-aos="fade-up" data-aos-delay="1400">
                                <input id="item-8" name="accordian-item" type="radio">
                                <label for="item-8">How do I know which service to choose?</label>
                                <div class="item-content">
                                    <p>Each service is described clearly on the site. If you're unsure, you can contact our support team or consult your doctor before making a selection.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...::::End  About Us Center Section:::... -->

    <!-- Start Footer Section -->
    <?php $this->view('includes/footer'); ?>
    <!-- End Footer Section -->
</body>



</html>