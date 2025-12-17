<?php $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>
    <style>
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
    </style>
    
    <!-- Start Footer Section -->
    <footer class="footer-section footer-bg section-top-gap-100">
        <div class="footer-wrapper">
            <!-- Start Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row justify-content-between align-items-center align-items-center flex-column flex-md-row mb-n6">
                        <div class="col-auto mb-6">
                            <div class="footer-copyright">
                                <p class="copyright-text"> <a href="">&copy; 2024</a> &nbsp;<a href="<?=ROOT?>/home">all rights reserve. Made </a> <a href="#" target="_blank">by sinethemba nxavipi <span class="text-white"> | </span> <a href="mailto:sinethembanxayiphi3@gmail.com" target="_blank" class="icon-space-right"><i class="icon-envelope"></i>sinethembanxayiphi3@gmail.com</a> <span class="text-white"> | </span> <a href="tel:+27 81 767 9053" target="_blank" class="icon-space-right"><i class="icon-call-in"></i>+27 81 767 9053</a> </p>
                            </div>
                        </div>
                        <div class="col-auto mb-6">
                            <div class="footer-payment">
                                <div class="image">
                                    <img src="<?=ROOT?>/images/Background.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Footer Bottom -->
        </div>
    </footer>
    <!-- End Footer Section -->

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button" style="background-color: #2563eb;"></button>

    <div class="preloader"></div>

    <!-- Start Branch & Service Modal -->
    <div id="branchServiceModal" style="
        display:none;
        position:fixed;
        top:0; left:0;
        width:100%; height:100%;
        background: #000000aa;
        z-index:9999;
        justify-content:center;
        align-items:center;
    ">
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

    <script>
        const popup = document.querySelector('.popup');
        const x = document.querySelector('.popup-content h1')

        window.addEventListener('load', () => {
            popup.classList.add('showPopup');
            popup.childNodes[1].classList.add('showPopup');
        })
        x.addEventListener('click', () => {
            popup.classList.remove('showPopup');
            popup.childNodes[1].classList.remove('showPopup');
        })
    </script>

    <script src="<?=ROOT?>/assets/js/vendor/vendor.min.js"></script>
    <script src="<?=ROOT?>/assets/js/plugins/plugins.min.js"></script>
    <script src="<?=ROOT?>/assets/js/bootstrap.min.js"></script>

    <!-- Main JS -->
    <script src="<?=ROOT?>/assets/js/main.js"></script>
    <script src="<?=ROOT?>/assets/js/preload.js"></script> 
    