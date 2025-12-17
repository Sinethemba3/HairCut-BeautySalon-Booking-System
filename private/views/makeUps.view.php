<?php $this->view('includes/header'); ?>
    <!-- header & mobile header -->

    <style>
        /* Fix height on all screen sizes */
        .carousel-item img.img1 {
            height: 60vh;
            object-fit: cover;
            object-position: center;
        }

        /* Make carousel-caption visible and responsive */
        .carousel-caption {
            bottom: 10%;
            top: auto;
            transform: none;
            padding: 1rem;
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
            font-size: 0.8rem;
            font-family: 'Montserrat', sans-serif !important;
            font-weight: lighter !important;
            border-radius: 20px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .service-filters button.active,
        .service-filters button:hover {
            background: #1e3a8a; /* Dark blue on hover/active */
            color: #fff;
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

        /* Make slick arrows black and bigger */
        .slick-prev:before, .slick-next:before {
            color: black !important;
            font-size: 30px;
        }

        /* Optional: position them better */
        .slick-prev, .slick-next {
            z-index: 10;
            top: 35%;
        }

        .slick-prev {
            left: -35px; /* adjust if too close/far */
        }

        .slick-next {
            right: -35px;
        }

        .greatvibes { 
            font-family: 'Great Vibes', cursive; /* Default font for large screens */
            font-size: 3rem;
            font-weight: lighter;
        }

        /* Small screens: override to Montserrat with smaller size */
        @media (max-width: 576px) {
            .greatvibes {
                font-family: 'Montserrat', sans-serif;
                font-size: 1.5rem;
                font-weight: lighter;
            }
        }

        .p {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.95rem;
            font-weight: lighter;
        }

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

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper b-title">
            <div class="container log-in">
                <div class="row">
                    <?php 
                        // Define an array mapping modes to their titles
                        $modes = [
                            'makeUps' => 'services'
                        ];

                        // Get the mode from the query parameter
                        $mode = $_GET['mode'] ?? 'error'; // Default to 'error' if not set

                        // Get the title based on the mode, or default to 'Error'
                        $title = $modes[$mode] ?? 'Error';
                    ?>
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Services</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?=ROOT?>/">Home</a></li>
                                    <li><a href="javascript:void(0)">Pages</a></li>
                                    <li class="active" aria-current="page">Services</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- Start Service Section -->
    <div id="bookings" class="service-promo-section section-top-gap-0">
        <!-- Start Services Content Text Area -->
        <div class="main-menu section-title-wrapper py-5 my-5 bg-light rounded-4 shadow-sm">
            <div class="container text-center px-4">
                <h2 class="greatvibes fw-dark text-dark">Hair & Beauty Services</h2>
                <?php 
                    if(!empty($salonData)):
                        foreach($salonData as $row):
                ?>
                    <p class="text-muted mt-3 mb-1 p">
                        Discover our luxurious range of hair, beauty, and wellness treatments at <?= esc($row->store_name ?? 'Salon Name') ?>.
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
</body>
</html>