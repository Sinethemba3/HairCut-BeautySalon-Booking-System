<?php $this->view('includes/header'); ?>
    <style>
        /* Fix height on all screen sizes */
        .carousel-item img.img1 {
            height: 50vh;
            object-fit: cover;
            object-position: center;
        }

        /* Make carousel-caption visible and responsive */
        .carousel-caption {
            top: auto;
            transform: none;
        }

        /* Ensure caption text and buttons are not hidden on small devices */
        @media (max-width: 768px) {
            .carousel-caption {
                bottom: 5%;
                font-size: 0.9rem;
                padding: 0.5rem;
            }

            .carousel-caption .btn {
                font-size: 0.85rem;
                padding: 6px 12px;
            }
        }

        /* Filter tabs */
        .service-filters {
            display: flex;
            flex-wrap: wrap; /* Responsive */
            justify-content: center;
            gap: 0.75rem;
            margin-bottom: 2rem;
        }

        .service-filters button {
            background: #2563eb; /* Light Blue */
            color: #fff;
            border: none;
            padding: 0.45rem 1.3rem;
            font-size: 0.9rem;
            border-radius: 20px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .service-filters button.active,
        .service-filters button:hover {
            background: #1e3a8a; /* Dark blue on hover/active */
            color: #fff;
        }

        /* Card Animations */
        .card {
            color: #E0E0E0;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }

        /* Smaller service images */
        .card-img-top {
            height: 160px !important;
        }

        .product-gallery .product-image {
            width: 100%; /* Image adapts to the width of its container */
            max-height: 500px; /* Set a fixed maximum height for uniformity */
            object-fit: contain; 
        }

        a:hover img[alt="TikTok"] {
            transform: scale(1.2);
            transition: transform 0.3s ease;
            filter: grayscale(100%) brightness(1.2);
        }

        a:hover img[alt="Facebook"] {
            transform: scale(1.2);
            transition: transform 0.3s ease;
        }

        a:hover img[alt="X (Twitter)"] {
            transform: scale(1.2);
            transition: transform 0.3s ease;
        }

        .facebook-icon img {
            filter: invert(29%) sepia(96%) saturate(636%) hue-rotate(190deg) brightness(94%) contrast(91%);
        }
    
        .tick-icon {
            width: 20px;
            height: 20px;
            border: 2px solid white;
            border-radius: 50%;
            position: relative;
            animation: spin 0.4s linear;
        }

        .tick-icon::after {
            content: '✔';
            color: white;
            font-size: 0.8rem;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @keyframes spin {
            0% { transform: rotate(0deg); opacity: 0.2; }
            100% { transform: rotate(360deg); opacity: 1; }
        }

        .greatvibes {
            font-family: 'Great Vibes', cursive;
            font-size: 3rem;
        }

        .p {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.95rem;
            font-weight: lighter;
        }
    </style>

    <!-- Start Popup  
    <div class="popup">
        <div class="popup-content">
            <h1>
                <button type="submit">
                    <img src="</?=ROOT?>/images/layer_close.png" alt="buttonpng" border="0" />
                </button>
            </h1>
            <h2>20% ONLINE SALE</h2>
            <div class="text-uppercase" style="font-weight: lighter; font-size: 1rem">Sale price will be calculated on checkout</div>
        </div>
    </div>
     End Popup -->

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
            <button type="submit" class="btn btn-lg btn-green">Search</button>
        </form>
    </div>
    <!-- End Offcanvas Search Bar Section -->

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- Start Carousel Slide -->
    <?php
        $sliderImages = [];

        if (!empty($rows)) {
            foreach ($rows as $salon) {
                if (!empty($salon->slider)) {
                    $images = array_map('trim', explode(',', $salon->slider));
                    $sliderImages = array_merge($sliderImages, $images);
                }
            }
        }

        // remove duplicates + FIX KEYS
        $sliderImages = array_values(array_unique(array_filter($sliderImages)));
    ?>

    <?php if (!empty($sliderImages)): ?>
        <div id="carouselExampleIndicators" class="carousel slide img-fluid" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php foreach ($sliderImages as $index => $img): ?>
                    <li 
                        data-target="#carouselExampleIndicators"
                        data-slide-to="<?= $index ?>"
                        class="<?= $index === 0 ? 'active' : '' ?>">
                    </li>
                <?php endforeach; ?>
            </ol>

            <div class="carousel-inner">
                <?php foreach ($sliderImages as $index => $img): ?>
                    
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <img 
                            src="<?= fetch_images($img) ?>"
                            class="w-100 img1 img-fluid"
                            alt="Slide <?= $index + 1 ?>">

                        <div class="carousel-caption"
                            data-aos="fade-up"
                            data-aos-duration="<?= 1000 + ($index * 500) ?>"
                            data-aos-delay="0">

                            <a href="#bookings"
                            class="btn btn-lg icon-space-left"
                            style="background: #FFFFFF;">
                                <span class="d-flex align-items-center"
                                    style="font-size: 0.8rem; font-weight: lighter;">
                                    Book Now
                                    <i class="ion-ios-arrow-thin-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    <?php endif; ?>
    <!-- End Carousel Slide -->

    <!-- Start Service Section -->
    <div id="bookings" class="service-promo-section section-top-gap-100">
        <!-- Start Services Content Text Area -->
        <div class="main-menu section-title-wrapper py-5 my-5 bg-light rounded-4 shadow-sm">
            <div class="container text-center px-4">
                <h2 class="greatvibes fw-dark text-dark">Hair & Beauty Services</h2>
                <?php 
                    if(!empty($rows)):
                        foreach($rows as $row):
                ?>
                    <p class="text-muted mt-3 mb-1 p">
                        Discover our luxurious range of hair, beauty, and wellness treatments at <?= esc($row->store_name ?? '') ?>.
                    </p>
                    <p class="text-muted p">
                        From premium wigs, braids, and hair care to facials, semi-permanent makeup, and relaxing massages, our salon and spa are designed for your total self-care.
                    </p>
                    <p class="text-muted mb-4 p">
                        Explore the services below to begin your personalized pampering experience.
                    </p>
                <?php endforeach; endif; ?>
            </div>
        </div>

        <!-- Filters -->
        <div class="container pt-4">
            <div class="service-filters">
                <button class="active" onclick="filterServices('all')">All</button>
                <?php
                    $serviceCategories = [];

                    if (!empty($rowz)) {
                        foreach ($rowz as $row) {
                            $cat = strtolower(trim($row->services));
                            if (!in_array($cat, $serviceCategories)) {
                                $serviceCategories[] = $cat;
                            }
                        }

                        foreach ($serviceCategories as $cat): ?>
                            <button onclick="filterServices('<?= $cat ?>')"><?= ucfirst($cat) ?></button>
                        <?php endforeach;
                    }
                ?>
            </div>
        </div>

        <!-- Start Product Default Single Item -->
        <div class="service-wrapper pt-4">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <?php if (!empty($rowz)): ?>
                        <?php foreach ($rowz as $row): ?>
                            <div class="col-lg-3 col-sm-6 col-6 card-item" data-cat="<?= strtolower($row->services) ?>">
                                <div class="service-promo-single-item">
                                    <div class="image">
                                        <a href="javascript:void(0);" onclick="selectBranch('<?= strtolower($row->services) ?>')">
                                            <img src="<?= get_image($row->image) ?>" alt="">
                                        </a>
                                    </div>

                                    <div class="contact-social p">
                                        <h5 style="font-weight: lighter; font-size: 0.9rem;"><?= strtoupper($row->services) ?></h5>
                                        <ul>
                                            <li>
                                                <a href="https://www.facebook.com/share/7aQqUELVVZvkGf2F/?mibextid=qi20mg" class="facebook-icon" target="_blank">
                                                    <img src="<?= ROOT ?>/images/facebook-f-brands-solid.svg" alt="Facebook" width="17" height="17" style="filter: invert(29%) sepia(96%) saturate(636%) hue-rotate(190deg) brightness(94%) contrast(91%) drop-shadow(1px 1px 2px rgba(0,0,0,0.3));">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.instagram.com/afikam_luxury_spa?igsh=MWxjZTkyemozNW5ndA==" target="_blank">
                                                    <img src="<?= ROOT ?>/images/x-twitter-brands-solid.svg" alt="X (Twitter)" width="17" height="17" style="filter: drop-shadow(0 0 2px #000);">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.tiktok.com/@afikam" target="_blank">
                                                    <img src="<?= ROOT ?>/images/tiktok-brands-solid.svg" alt="TikTok" width="17" height="17" style="filter: drop-shadow(0 0 2px #25F4EE) drop-shadow(0 0 2px #FE2C55);">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="content pt-2">
                                        <a href="javascript:void(0);" onclick="selectBranch('<?= strtolower($row->services) ?>')"
                                        class="btn btn-xs icon-space-left"
                                        style="background: #2563eb; padding: 10px 25px; border-radius: 35px; min-width: 120px; letter-spacing: .1em; font-weight: 400; font-size: 50px; text-align: center;">
                                            <span class="d-flex align-items-center text-white" style="font-size: 0.7rem;">
                                                Book 
                                                <i class="ion-ios-arrow-thin-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="pb-4">
                            <h3 class="text-danger text-center text-uppercase pb-4">
                                Sorry we couldn't find what you were looking for.
                            </h3>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- End Product Default Single Item -->
    </div>
    <!-- End Service Section -->

    <!-- Start Branch & Service Modal -->
    <div id="branchServiceModal" style="
        display:none;
        position:fixed;
        top:0; left:0;
        width:100%; height:100%;
        background: #000000aa;
        z-index:9999;
        justify-content:center;
        align-items:center">

        <div style="background:white; padding:30px; border-radius:10px; max-width:400px; width:90%; text-align:center; position:relative;">
            <h4 class="mb-4" style="font-size: 1rem;">📍 Choose Venue</h4>

            <!-- Branch Selection -->
            <div class="d-flex flex-column gap-2 mb-4">
                <button onclick="setBranch('east-london', this)" class="btn mb-2 branch-btn" style="background: #2563eb; color:white; font-size: 0.9rem; display: flex; justify-content: space-between; align-items: center;">
                    East London
                    <span class="tick-icon" style="display: none; margin-left: 10px;"></span>
                </button>

                <button onclick="setBranch('mthatha', this)" class="btn branch-btn" style="background: #2563eb; color:white; font-size: 0.9rem; display: flex; justify-content: space-between; align-items: center;">
                    Mthatha
                    <span class="tick-icon" style="display: none; margin-left: 10px;"></span>
                </button>
            </div>

            <!-- Dynamic Service Options -->
            <div id="serviceOptions" style="display:none;">
                <h4 class="mb-3" style="font-size: 1rem;">💇 Select Service</h4>

                <?php
                    $services = [];

                    if (!empty($rowz)) {
                        foreach ($rowz as $row) {
                            $serviceName = ucfirst(strtolower(trim($row->services)));
                            if (!in_array($serviceName, $services)) {
                                $services[] = $serviceName;
                            }
                        }

                        foreach ($services as $service): ?>
                            <a href="#" 
                            id="service_<?= strtolower($service) ?>" 
                            class="btn mb-2 service-btn" 
                            data-service="<?= strtolower($service) ?>"
                            style="background: #2563eb; color:white; font-size: 0.9rem; display: none;">
                            <?= $service ?>
                            </a>
                    <?php endforeach;
                    } 
                ?>
            </div>

            <!-- Close button -->
            <button onclick="closeBranchServiceModal()" style="position:absolute; top:10px; right:15px; background:none; border:none; font-size:20px;">&times;</button>
        </div>
    </div>

    <script>
        let selectedBranch = null;
        let selectedService = null;

        // Called when user clicks on a service card (like 'Hair')
        function selectBranch(service) {
            selectedService = service.toLowerCase(); // e.g. "hair"
            selectedBranch = null;

            // Show modal
            document.getElementById("branchServiceModal").style.display = "flex";

            // Hide service buttons until branch is selected
            document.getElementById("serviceOptions").style.display = "none";

            // Hide all service buttons initially
            document.querySelectorAll('.service-btn').forEach(btn => {
                btn.style.display = "none";
            });
        }

        // Called when user selects a branch
        function setBranch(branch) {
            selectedBranch = branch;
            const serviceOptions = document.getElementById("serviceOptions");

            // Show the service section
            serviceOptions.style.display = "block";

            // Hide all service buttons
            document.querySelectorAll('.service-btn').forEach(btn => {
                btn.style.display = "none";
            });

            // Show only the button for the selected service
            const btn = document.querySelector(`#service_${selectedService}`);
            if (btn) {
                btn.style.display = "inline-block";
                btn.href = `<?= ROOT ?>/services?mode=${selectedService}&branch=${selectedBranch}`;
            }
        }

        // Close modal
        function closeBranchServiceModal() {
            document.getElementById("branchServiceModal").style.display = "none";
            selectedBranch = null;
            selectedService = null;
        }

        // Close modal when clicking outside the modal content
        document.getElementById("branchServiceModal").addEventListener("click", function (e) {
            if (e.target === this) closeBranchServiceModal();
        });

        // Tick icon
        function setBranch(branch, btn) {
            selectedBranch = branch;
            const serviceOptions = document.getElementById("serviceOptions");

            // Show the service section
            serviceOptions.style.display = "block";

            // Hide all service buttons
            document.querySelectorAll('.service-btn').forEach(btn => {
                btn.style.display = "none";
            });

            // Show only the button for the selected service
            const serviceBtn = document.querySelector(`#service_${selectedService}`);
            if (serviceBtn) {
                serviceBtn.style.display = "inline-block";
                serviceBtn.href = `<?= ROOT ?>/services?mode=${selectedService}&branch=${selectedBranch}`;
            }

            // Remove previous ticks
            document.querySelectorAll('.branch-btn').forEach(button => {
                button.querySelector('.tick-icon').style.display = 'none';
            });

            // Show tick on the selected button
            const tick = btn.querySelector('.tick-icon');
            if (tick) {
                tick.style.display = 'inline-block';
            }
        }
    </script>
    <!-- End Branch & Service Modal -->

    <!-- Start Filters Section -->
    <script>
        function filterServices(cat) {
            document.querySelectorAll('.service-filters button').forEach(btn => {
                btn.classList.toggle('active', btn.textContent.toLowerCase() === cat);
            });
            document.querySelectorAll('.card-item').forEach(card => {
                if (cat === 'all' || card.dataset.cat.includes(cat)) {
                card.style.display = 'block';
                } else {
                card.style.display = 'none';
                }
            });
        }
    </script>
    <!-- End Filters Section -->

    <!-- Start Smooth-scroll Section -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('a[href^="#bookings"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector('#bookings').scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
    <!-- Start Smooth-scroll Section -->

    <!-- Start Footer Section -->
    <?php $this->view('includes/footer'); ?>
    <!-- End Footer Section -->