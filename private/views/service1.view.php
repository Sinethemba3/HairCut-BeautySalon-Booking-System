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
                    <h3 class="breadcrumb-title">Book Appointment</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="<?=ROOT?>/home">Home</a></li>
                                <li class="active" aria-current="page">Appointment</li>
                            </ul>
                        </nav>
                    </div>
                    <?php if(!empty($errors)) : ?>
                        <div class="col-md alert alert-warning text-center alert-dismissible fade show m-3 p-1">
                            <strong>Error - </strong> Please fix the errors below!!
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<section class="section-xs bg-periglacial-blue one-screen-page-content text-center">
    <div class="shell">
        <div class="range range-lg-center">
            <div class="cell-lg-10">
                <div class="range range-sm-center range-md-left range-30">
                    <div class="cell-sm-8 cell-md-6">
                        <!-- Start Bookings Section -->
                        <div id="booking" class="banner-section section-top-gap-100 section-fluid">
                            <div class="banner-wrapper">
                                <div class="container">
                                    <div class="row mb-n6">
                                        <div class="col-sm-4 p-4 p-md-5 d-flex align-items-center justify-content-center bg-danger" data-aos="fade-up" data-aos-delay="0">
                                            <form method="post" action="" class="appointment-form">
                                                <h3 class="mb-3 text-uppercase text-white text-center">Select your Service</h3>
                                                <div class="row">
                                                    <div class="col-md-12 mt-4">
                                                        <div class="form-group">
                                                            <div class="form-field">
                                                                <div class="default-form-box mb-20">
                                                                    <?php if(!empty($errors['services_'])) : ?>
                                                                        <div class="text-warning">
                                                                            <?=$errors['services_']?>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                    <select name="services_" id="services_" value="<?=get_var('services_')?>" class="country_option nice-select wide" onchange="random_function()" required='true'>
                                                                        <option value="" style="font-weight: 500; color: red;">====MIZANI====</option>
                                                                        <option <?=get_select('services_', 'Mizani Relaxer')?> value="Mizani Relaxer" >Mizani Relaxer</option>
                                                                        <option <?=get_select('services_', 'Mizani Sensitive Relaxer')?> value="Mizani Sensitive Relaxer" >Mizani Sensitive Relaxer</option>
                                                                        <option <?=get_select('services_', 'Mizani Wash')?> value="Mizani Wash" >Mizani Wash</option>
                                                                        <option <?=get_select('services_', 'Kera/Hydra Treat')?> value="Kera/Hydra Treat" >Kera/Hydra Treat</option>
                                                                        <option <?=get_select('services_', 'Thermasmooth Treat')?> value="Thermasmooth Treat" >Thermasmooth Treat</option>
                                                                        <option <?=get_select('services_', 'True Texture Treat')?> value="True Texture Treat" >True Texture Treat</option>
                                                                        <option <?=get_select('services_', 'True Texture Wash')?> value="True Texture Wash" >True Texture Wash</option>
                                                                        <option <?=get_select('services_', 'Scalp Tonic')?> value="Scalp Tonic" >Scalp Tonic</option>
                                                                        <option <?=get_select('services_', 'Scalp Oil Drop')?> value="Scalp Oil Drop" >Scalp Oil Drop</option>
                                                                        <option value="" style="font-weight: 500; color: red;">====OLIVE OIL====</option>
                                                                        <option <?=get_select('services_', 'Hair Stylist')?> value="Hair Stylist" >Hair Stylist</option>
                                                                        <option <?=get_select('services_', 'Wash')?> value="Wash" >Wash</option>
                                                                        <option <?=get_select('services_', 'Treatment')?> value="Treatment" >Treatment</option>
                                                                        <option value="" style="font-weight: 500; color: red;">====AFIKA M HAIR CARE====</option>
                                                                        <option <?=get_select('services_', 'Hair Stylist')?> value="Hair Stylist" >Hair Stylist</option>
                                                                        <option <?=get_select('services_', 'Wash')?> value="Wash" >Wash</option>
                                                                        <option <?=get_select('services_', 'Treatment')?> value="Treatment" >Treatment</option>
                                                                        <option value="" style="font-weight: 500; color: red;">====EXTRA (OWN HAIR)====</option>
                                                                        <option <?=get_select('services_', 'Hair Stylist')?> value="Hair Stylist" >Hair Stylist</option>
                                                                        <option <?=get_select('services_', 'Wash')?> value="Wash" >Wash</option>
                                                                        <option <?=get_select('services_', 'Treatment')?> value="Treatment" >Treatment</option>
                                                                        <option value="" style="font-weight: 500; color: red;">====MIZANI AFTER CARE====</option>
                                                                        <option <?=get_select('services_', 'Hair Stylist')?> value="Hair Stylist" >Hair Stylist</option>
                                                                        <option <?=get_select('services_', 'Wash')?> value="Wash" >Wash</option>
                                                                        <option <?=get_select('services_', 'Treatment')?> value="Treatment" >Treatment</option>
                                                                    </select>
                                                                    <input type="hidden" name="appointment" value="Hair Dressing & Hair Styling">
                                                                </div>
                                                                <div class="default-form-box mb-20 d-none">
                                                                    <select name="price" id="price" class="country_option nice-select wide" onchange="random_function0()" required='true'>
                                                                        <option value="">Select Price</option>
                                                                    </select>
                                                                    <input type="hidden" name="appointment" value="Hair Dressing & Hair Styling">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="form-group pt-4">
                                                            <a href="javascript:void(0);">
                                                                <input type="submit" value="Next" class="btn btn-success py-3 px-4">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-sm-8 wrap-about py-5 ftco-animate img" style="background-image: url(<?=ROOT?>/assets/images/logo/logo_designs.png);" data-aos="fade-up" data-aos-delay="200">
                                            <div class="row pb-5 pb-md-0">
                                                <div class="col-md-12 col-lg-7">
                                                    <!-- <div class="heading-section mt-5 mb-4">
                                                        <div class="pl-lg-3 ml-md-5">
                                                            <span class="subheading" style="font-size: 2em; font-weight: bolder;">About</span> 
                                                            <h2 class="mb-4 text-bold text-success" style="font-size: 3em; font-weight: bolder;">Welcome to Nakho's Glam Bar</h2>
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="pl-lg-3 ml-md-5">
                                                        <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little
                                                            Blind Text should turn around and return to its own, safe country. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts
                                                            of sentences fly into your mouth.</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Bookings Section -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Footer Section -->
<?php $this->view('includes/footer'); ?>
<!-- End Footer Section -->

<script>
	 function random_function()
        {
            var a = document.getElementById("services_").value;
            
            if(a === "Mizani Relaxer")
            {
                var arr = [600];
            }
            else if(a === "Mizani Sensitive Relaxer")
            {
                var arr = [700];
            }
            else if(a === "Mizani Wash")
            {
                var arr = [370];
            }
            else if(a === "Kera/Hydra Treat")
            {
                var arr = [450];
            }
            else if(a === "Thermasmooth Treat")
            {
                var arr = [480];
            }
            else if(a === "True Texture Treat")
            {
                var arr = [480];
            }
            else if(a === "True Texture Wash")
            {
                var arr = [430];
            }
            else if(a === "Scalp Tonic")
            {
                var arr = [70];
            }
            else if(a === "Scalp Oil Drop")
            {
                var arr = [50];
            }
            
            var string = "";
            
            for(i = 0; i < arr.length; i ++)
            {
                string = string + "<option style='color: red;' value=" + arr[i] + ">" + arr[i] + "</option>";
            }
            document.getElementById("price").innerHTML = string;
        }
</script>
</body>
</html>