<?php $this->view('includes/header'); ?>

    <style>
        /* Fix height on all screen sizes */
        .log-in {
            height: 2vh;
        }

        .b-title{
            padding-bottom: 100px;
        }

        .breadcrumb-title {
            font-family: 'Montserrat', sans-serif !important;
            font-size: 1.5rem !important;
            font-weight: lighter !important;
        }
    </style>
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
                        <h3 class="breadcrumb-title">Contact Us</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?=ROOT?>/home">Home</a></li>
                                    <li><a href="javascript:void(0)">Pages</a></li>
                                    <li class="active" aria-current="page">Contact Us</li>
                                </ul>
                            </nav>
                        </div>
                        <?php if(!empty($errors)) : ?>
                            <div class="col-md alert alert-warning text-center alert-dismissible fade show m-3 p-1 msg">
                               <strong>Error - </strong> Please fix the errors below!!
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($message['message'])) : ?>
                            <div class="col-md alert alert-warning text-center alert-dismissible fade show m-3 p-1 msg">
                               <strong>Alert - </strong> <?=$message['email']?>!
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...::::Start Map Section:::... -->
    <div class="map-section" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3346.9767511488376!2d27.897426476226396!3d-32.978015173474546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e66e0386354b39b%3A0xde878bf71c0df303!2sAfikaM%20Hair%26Beauty%20Salon!5e0!3m2!1sen!2sza!4v1707210780029!5m2!1sen!2sza" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...::::End  Map Section:::... -->

    <!-- ...::::Start Contact Section:::... -->
    <div class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Start Contact Details -->
                    <div class="contact-details-wrapper section-top-gap-100" data-aos="fade-up" data-aos-delay="0">
                        <div class="contact-social">
                            <h4>Contact Details</h4>
                            <?php 
                                if($salonData): 
                                    foreach($salonData as $row):
                            ?>
                                <!-- Start Contact Details Single Item -->
                                <div class="contact-details-single-item">
                                    <div class="contact-details-icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="contact-details-content contact-phone col-md">
                                        <a style="font-weght: lighter; font-size: 0.8rem;" href="tel:<?= esc($row->store_phone ?? '') ?>">
                                            <?= esc($row->store_phone ?? '') ?>
                                        </a>
                                    </div>
                                </div> <!-- End Contact Details Single Item -->

                                <!-- Start Contact Details Single Item -->
                                <div class="contact-details-single-item">
                                    <div class="contact-details-icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="contact-details-content contact-phone">
                                        <a style="font-weght: lighter; font-size: 0.8rem;" href="mailto:<?= esc($row->store_email ?? '') ?>">
                                            <?= esc($row->store_email ?? '') ?>
                                        </a>
                                    </div>
                                </div> <!-- End Contact Details Single Item -->

                                <!-- Start Contact Details Single Item -->
                                <div class="contact-details-single-item">
                                    <div class="contact-details-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="contact-details-content contact-phone">
                                        <span style="font-weght: lighter; font-size: 0.8rem;">
                                            <?= esc($row->store_address ?? '') ?> <br>
                                            <?= esc($row->postal_code ?? '') ?>
                                        </span>
                                    </div>
                                </div> <!-- End Contact Details Single Item -->
                            <?php endforeach; endif; ?>
                        </div>
                        <br>
                        <div class="contact-social">
                            <h4>Opening Hours</h4>
                            <?php 
                                if($hoursData): 
                                    foreach($hoursData as $row):
                            ?>
                                <!-- Start Contact Details Single Item -->
                                <div class="contact-details-single-item">
                                    <div class="contact-details-content contact-phone">
                                        <span style="font-weght: lighter; font-size: 0.8rem;"><?= esc($row->mondays_sundays ?? '') ?></span>
                                        <span style="font-weight: bold; font-size: 0.8rem;"><?= esc($row->mondays_sundays_time ?? '') ?></span>
                                    </div>
                                </div> <!-- End Contact Details Single Item -->
                                <!-- Start Contact Details Single Item -->
                                <div class="contact-details-single-item">
                                    <div class="contact-details-content contact-phone">
                                        <span style="font-weght: lighter; font-size: 0.8rem;"><?= esc($row->sundays ?? '') ?></span>
                                        <span style="font-weight: bold; font-size: 0.8rem;"><?= esc($row->sundays_time ?? '') ?></span>
                                    </div>
                                </div> <!-- End Contact Details Single Item -->
                                <!-- Start Contact Details Single Item -->
                                <div class="contact-details-single-item">
                                    <div class="contact-details-content contact-phone">
                                        <span style="font-weght: lighter; font-size: 0.8rem;"><?= esc($row->public_holidays ?? '') ?></span>
                                        <span style="font-weight: bold; font-size: 0.8rem;"><?= esc($row->public_holidays_time ?? '') ?></span>
                                    </div>
                                </div> <!-- End Contact Details Single Item -->
                            <?php endforeach; endif; ?>
                        </div>
                        <!-- Start Contact Social Link -->
                        <div class="contact-social">
                            <h4>Follow Us</h4>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div> <!-- End Contact Social Link -->
                    </div> <!-- End Contact Details -->
                </div>
                <div class="col-lg-8">
                    <div class="contact-form section-top-gap-100" data-aos="fade-up" data-aos-delay="200">
                        <h3>Get In Touch</h3>
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="default-form-box mb-20">
                                        <label for="contact-name">Name</label>
                                        <?php if(!empty($errors['name'])) : ?>
                                            <div class="text-danger">
                                                <?=$errors['name']?>
                                            </div>
                                        <?php endif; ?>
                                        <input value="<?=get_var('name')?>" name="name" type="text" id="contact-name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box mb-20">
                                        <label for="contact-email">Email</label>
                                        <?php if(!empty($errors['email'])) : ?>
                                            <div class="text-danger">
                                                <?=$errors['email']?>
                                            </div>
                                        <?php endif; ?>
                                        <input value="<?=get_var('email')?>" name="email" type="email" id="contact-email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="default-form-box mb-20">
                                        <label for="contact-subject">Subject</label>
                                        <?php if(!empty($errors['subject'])) : ?>
                                            <div class="text-danger">
                                                <?=$errors['subject']?>
                                            </div>
                                        <?php endif; ?>
                                        <input value="<?=get_var('subject')?>" name="subject" type="text" id="contact-subject">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="default-form-box mb-20">
                                        <label for="contact-message">Your Message</label>
                                        <?php if(!empty($errors['message'])) : ?>
                                            <div class="text-danger">
                                                <?=$errors['message']?>
                                            </div>
                                        <?php endif; ?>
                                        <textarea value="<?=get_var('message')?>" name="message" id="contact-message" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-lg btn-black-default-hover">SEND</button>
                                </div>
                                <!-- <p class="form-messege"></p> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...::::ENd Contact Section:::... -->
     
    <script>
		(function() {
		// removing the message 3 seconds after the page load
		setTimeout(function(){
			document.querySelector('.msg').remove();
		},1500)
		})();
	</script>

    <!-- Start Footer Section -->
    <?php $this->view('includes/footer'); ?>
    <!-- End Footer Section -->