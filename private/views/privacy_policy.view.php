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
                        <h3 class="breadcrumb-title">Privacy Policy</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?=ROOT?>/home">Home</a></li>
                                    <li><a href="#">Pages</a></li>
                                    <li class="active" aria-current="page">Privacy Policy</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...::::Start Privacy Policy  Section:::... -->
    <div class="privacy-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="privacy-policy-wrapper">
                        <!-- Start Privacy Policy Single Item -->
                        <div class="privacy-single-item" data-aos="fade-up" data-aos-delay="0">
                            <h3 class="title">Who we are</h3>
                            <p>Our website address is: <a
                                    href="https://www.afikam.co.za/">afikam.co.za</a>
                            </p>
                        </div> <!-- Start Privacy Policy Single Item -->
                        <!-- Start Privacy Policy Single Item -->
                        <div class="privacy-single-item" data-aos="fade-up" data-aos-delay="0">
                            <h3 class="title">DISCLAIMER FOR BRIDAL SERVICES</h3>
                           <li>
                                All prices are subject to change without notice and are not guaranteed, except prices for an order that have been accepted and paid for.
                           </li>
                           <li>
                                In order to secure your booking a non-refundable 60% has to be paid.
                           </li>
                           <li>
                                The 40% balance is payable 2days before the appointment, 
                                should the appointment be booked less than 48hrs of the event the full amount of the treatment or service is payable.
                           </li>
                           <li>
                                Group discounts are offered to a group of 8 or more people when per person will be spending R1000 or more.
                           </li>
                           <li>
                                Additional or last minute bookings are welcome on subject to time availability on the day. 
                                Immediate payments are to be made before the service or treatment is rendered.
                           </li>
                           <li>
                                Any acceptable changes are to be made during our working hours.
                           </li>
                           <li>
                                All booked wigs to be dropped off at the salon 2days before the event (before 12h00 afternoon) for preps or the client will be responsible for their wigs prep (curling or straightening).
                           </li>
                           <li>
                                Wig wash or treatments are not included in the styling price.
                           </li>
                           <li>
                                Should finishing time be before 12h00 and the venue for makeup and styling is outside of East London then accommodation needs to be booked for.
                           </li>
                           <li>
                                Should the call time be before 09h00 we would kindly request that the bride prepare breakfast for Afika and her team
                           </li>

                           <div class="title pt-4">
                                NB: NO REFUNDS, WE ONLY GIVE OUT A VOUCHER THAT YOU CAN USE AT ANY OF OUR BRANCHES (AFIKAM SPA & SALON) AND THE VOUCHER WILL EXPIRE AFTER 6 MONTHS AFTER FIRST PAYMENT….
                                By paying the deposit you fully accepting the terms & conditions.
                                THANK YOU
                                AFIKAM MANAGEMENT
                           </div>
                        </div> <!-- Start Privacy Policy Single Item -->
                        <hr class="pt-4" data-aos="fade-up" data-aos-delay="0">
                        <!-- Start Privacy Policy Single Item -->
                        <div class="privacy-single-item" data-aos="fade-up" data-aos-delay="0">
                            <h4 class="sub-title">SALON & SPA DISCLAIMER</h4>
                            <h5 class="title pt-4">PUNCTUALITY</h5>

                            <p>Please arrive 15 minutes prior to your scheduled appointment: So that we can start your service on
                                time or even early. A late arrival may require a reduced appointment time, at scheduled price, with
                                respect to the clients that are scheduled after you.</p>
                        </div> <!-- Start Privacy Policy Single Item -->
                        <!-- Start Privacy Policy Single Item -->
                        <div class="privacy-single-item" data-aos="fade-up" data-aos-delay="0">
                            <h4 class="sub-title">CANCELLATION/RESCHEDULING</h4>
                            <p>Please provide at least 48 hours’ notice if you need to reschedule a service.</p>
                            <p>In the event of cancellation, the following rules shall apply:</p>

                            <li>
                                More than 90 days prior to appointment : 5% cancellation fee of the total appointment cost
                            </li>
                            <li>
                                More than 30 days prior to appointment : 10% cancellation fee of the total appointment cost
                            </li>
                            <li>
                                30 – 20 days prior to appointment : 25% cancellation fee of the total appointment cost
                            </li>
                            <li>
                                21 – 15 days prior to appointment : 30% cancellation fee of the total appointment cost
                            </li>
                            <li>
                                14 – 7 days prior to appointment : 50% cancellation fee of the total appointment cost
                            </li>
                            <li>
                                7 – 0 days prior to appointment : 100% cancellation fee of the total appointment cost
                            </li>
                            <li>
                                No shows : 100% cancellation fee of the total appointment cost
                            </li>
                        </div> <!-- Start Privacy Policy Single Item -->
                        <!-- Start Privacy Policy Single Item -->
                        <div class="privacy-single-item" data-aos="fade-up" data-aos-delay="0">
                                <h5 class="title pt-4">VALUABLES</h5>

                                <p>
                                    The management and staff accept no responsibility for the loss of valuables of any kind brought into
                                    the salon premises. All vehicles parked at AfikaM are parked at the owners own risk. AfikaM Hair
                                    and Beauty , management and the staff will not be liable for any damage and/or loss suffered by the
                                    owner.
                                </p>

                                <h5 class="title pt-4">QUIET PLEASE</h5>

                                <p>
                                    The salon is a shared space with other clients and staff members. Please be mindful and considerate
                                    of your surroundings, and thoughtful of other clients that visiting the salon. Please keep noise levels
                                    to a minimum, in order to ensure a peaceful experience for everyone in the salon, and a professional
                                    working environment for the staff.
                                </p>

                                <h5 class="title pt-4">CHILDREN</h5>

                                <p>
                                    To maintain a serene atmosphere, we ask that you not bring children to the salon to accompany
                                    you, unless they are receiving a service as well. We do, however allow children to enjoy certain salon
                                    services under the following guidelines: children under 18 must be accompanied by an adult. It is the
                                    adult’s responsibility to monitor the child’s behaviour.
                                </p>

                                <h5 class="title pt-4">PRODUCT RETURNS OR REFUNDS</h5>

                                <p>
                                    With regret, there are no refunds on services rendered at the salon, and on sale items. However,
                                    we will make an exchange for reasonable and unavoidable cases.
                                </p>

                                <h5 class="title pt-4">MEDICAL CONDITIONS</h5>

                                <p>
                                    Pregnancy or Medical Conditions: Be sure to mention any medical information when you book an
                                    appointment. Certain services may not be advisable for you.
                                </p>

                                <h5 class="title pt-4">DISCLAIMER</h5>

                                <p>
                                    AfikaM Hair and Beauty, representatives, staff and suppliers will not be held liable for any direct or
                                    indirect injury, illness if the client fails to disclose their condition.   
                                </p>

                        </div> <!-- Start Privacy Policy Single Item -->
                        <hr class="pt-4" data-aos="fade-up" data-aos-delay="0">
                        <!-- Start Privacy Policy Single Item -->
                        <div class="privacy-single-item" data-aos="fade-up" data-aos-delay="0">
                            <h4 class="sub-title">WIG SALE POLICY</h4>
                            <h5 class="title">PLEASE NOTE</h5>

                            <li>
                                Discounted items are final and cannot be returned or exchanged
                            </li>
                            <li>
                                Returned items must have tags, lace still on and be returned in original product packaging
                            </li>
                            <li>
                                Returned items must have no visible signs of wear or use
                            </li>
                            <li>
                                No cash refund ,we offer vouchers for exchange to be used at Afika M Hair & Beauty
                            </li>
                        </div> <!-- Start Privacy Policy Single Item -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...::::End Privacy Policy Section:::... -->

    <!-- Start Footer Section -->
    <?php $this->view('includes/footer'); ?>
    <!-- End Footer Section -->
</body>


</html>