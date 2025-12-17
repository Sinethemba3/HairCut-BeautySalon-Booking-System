<?php $this->view('includes/bookings_header'); ?>

    <div class="container">
        <div class="row">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h2 class="pt-3 pb-4 text-center fw-bold" style="font-size: 1.4rem;">Appointment Details</h2>
                    <?php if (!empty($row)) : ?>
                        <div class="row text-center text-muted small">
                            <?php
                            $info = [
                                ['title' => 'Service', 'value' => esc($row[0]->services_)],
                                ['title' => 'Therapist', 'value' => esc($row[0]->name_) . ' ' . esc($row[0]->surname_)],
                                ['title' => 'Date', 'value' => get_date($row[0]->appointment_date)],
                                ['title' => 'Time', 'value' => esc($row[0]->appointment_time)],
                            ];

                            foreach ($info as $item):
                            ?>
                                <div class="col-md-3 mb-3">
                                    <div class="card border h-100">
                                        <div class="card-body py-3">
                                            <h6 class="text-uppercase fw-bold mb-1" style="font-size: 0.8rem;">
                                                <?= $item['title'] ?>:
                                            </h6>
                                            <p class="m-0" style="font-size: 0.85rem;">
                                                <?= $item['value'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="col-md-12 mb-4">
                            <div class="card border text-center">
                                <div class="card-body">
                                    <h6 class="text-uppercase text-muted mb-2" style="font-size: 0.75rem;">Total Price</h6>

                                    <?php
                                        $amountsData = $row[0]->amount; // e.g. "320, 380, 180"
                                        $amountsArray = explode(',', $amountsData);
                                        $total = 0;

                                        foreach ($amountsArray as $amount) {
                                            $trimmedAmount = trim($amount);
                                            if (is_numeric($trimmedAmount)) {
                                                $total += floatval($trimmedAmount);
                                            }
                                        }

                                        $totalWithVAT = $total * 1.14;
                                        $finalPrice = $totalWithVAT / 2;
                                    ?>

                                    <h3 class="text-success fw-bold mb-3">R<?= number_format($finalPrice, 2) ?></h3>

                                    <div class="alert alert-info d-flex align-items-center justify-content-start flex-wrap gap-2 p-3 shadow-sm rounded" role="alert" style="font-size: 0.8rem;">
                                        <i class="fa fa-info-circle me-2" style="font-size: 1rem;"></i>
                                        <span>
                                            Please pay <strong>50%</strong> now
                                            <span class="text-primary fw-semibold">(R<?= number_format($finalPrice, 2) ?>)</span>.
                                            The remaining <strong>50%</strong> is due <u>upon arrival at the venue</u>.
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <hr class="my-4">
                    <h4 class="text-center">Provide Client Details</h4>
                    <form name="PayFastPayNowForm" action="" method="post" id="payment" class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="form-group col-md-4 mb-3">
                                <label for="validationCustom01" class="form-label" style="font-size: 0.8rem;">Name & Surname</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="name" 
                                    id="validationCustom01" 
                                    required >
                                <div class="invalid-feedback text-danger" style="font-size: 0.75rem;">
                                    Please enter your name and surname.
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-3">
                                <label for="validationCustom02" class="form-label" style="font-size: 0.8rem;">Phone</label>
                                <input 
                                    type="tel" 
                                    class="form-control" 
                                    name="phone" 
                                    id="validationCustom02" 
                                    required>
                                <div class="invalid-feedback text-danger" style="font-size: 0.75rem;">
                                    Please enter your phone number.
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-3">
                                <label for="validationCustomEmail" class="form-label" style="font-size: 0.8rem;">Email</label>
                                <input 
                                    type="email" 
                                    class="form-control" 
                                    name="email" 
                                    id="validationCustomEmail" 
                                    required>
                                <div class="invalid-feedback text-danger" style="font-size: 0.75rem;">
                                    Please enter a valid email.
                                </div>
                            </div>

                            <?php if (!empty($row)) : ?>
                                <input type="hidden" name="appointment_time" value="<?= esc($row[0]->appointment_time) ?>">
                                <input type="hidden" name="appointment_date" value="<?= esc($row[0]->appointment_date) ?>">
                                <input type="hidden" name="services_" value="<?= esc($row[0]->services_) ?>">
                                <input type="hidden" name="name_" value="<?= esc($row[0]->name_) ?>">
                            <?php endif; ?>
                        </div>

                        <hr class="my-4">
                        <h4 class="text-uppercase" style="font-size: 0.85rem;">Punctuality</h4>
                        <p class="small text-muted" style="font-size: 0.75rem;" >Please arrive 15 minutes before your appointment. Late arrivals may reduce session time.</p>

                        <hr class="my-4">
                        <h4 class="text-uppercase" style="font-size: 0.85rem;">Terms and Conditions</h4>
                        <p class="small text-muted" style="font-size: 0.75rem;" >Please give at least 48 hours' notice to reschedule.</p>

                        <h4 class="text-uppercase" style="font-size: 0.85rem;">Cancellation fees:</h4>
                        <ul class="small">
                            <li style="font-size: 0.75rem;" >More than 90 days: 5% fee</li>
                            <li style="font-size: 0.75rem;" >More than 30 days: 10% fee</li>
                            <li style="font-size: 0.75rem;" >30 - 20 days: 25% fee</li>
                            <li style="font-size: 0.75rem;" >21 - 15 days: 30% fee</li>
                            <li style="font-size: 0.75rem;" >14 - 7 days: 50% fee</li>
                            <li style="font-size: 0.75rem;" >7 - 0 days: 100% fee</li>
                            <li style="font-size: 0.75rem;" >No shows: 100% fee</li>
                        </ul>

                        <div class="form-check my-3">
                            <input type="checkbox" name="terms" value="I accept the Terms and Conditions" class="form-check-input" required>
                            <label class="form-check-label" style="font-size: 0.8rem;">I accept the Terms and Conditions</label>
                            <div class="invalid-feedback" style="font-size: 0.75rem;">You must accept the terms and conditions to continue.</div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 mt-3" style="font-size: 0.85rem;">
                            Book Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
        $ses = new Session;
        $waLink = $ses->pop('wa_link');
        $waDeposit = $ses->pop('wa_deposit');
        $waCustomer = $ses->pop('wa_customer');
        $waPaymentLink = $ses->pop('wa_payment_link');
    ?>

    <?php if ($waLink): ?>
        <!-- Admin-facing WhatsApp Modal -->
        <div class="modal fade" id="whatsappModal" tabindex="-1" aria-labelledby="whatsappModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="whatsappModalLabel">Send Payment Request</h5>

                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong><?= esc($waCustomer) ?></strong>'s appointment was saved successfully.</p>
                        <p>Click the button below to open WhatsApp and send the client their payment link.</p>

                        <div class="alert alert-info mt-3">
                        <p><strong>Deposit:</strong> R<?= esc($waDeposit) ?></p>
                        <p><strong>Client pays 50% now</strong> to confirm the booking.</p>
                        <p><strong>Remaining 50%</strong> is due upon arrival.</p>
                        </div>

                        <a href="<?= esc($waLink) ?>" 
                            target="_blank" 
                            class="btn btn-success w-100 mt-3" 
                            style="font-size: 1.1rem;" 
                            onclick="handleWhatsAppAndRedirect(event)">
                            <i class="fa fa-whatsapp"></i> Send WhatsApp Payment Link
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Show Modal Automatically -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var whatsappModal = new bootstrap.Modal(document.getElementById('whatsappModal'));
                whatsappModal.show();
            });

            function redirectAfterWhatsApp() {
                const modalInstance = bootstrap.Modal.getInstance(document.getElementById('whatsappModal'));
                if (modalInstance) modalInstance.hide();

                setTimeout(function () {
                    window.location.href = "<?= ROOT ?>/dashboard";
                }, 1500);
            }

            function handleWhatsAppAndRedirect(event) {
                // Open WhatsApp link in new tab
                const link = event.currentTarget.href;
                window.open(link, '_blank');

                // Immediately redirect current tab to dashboard
                window.location.href = "<?= ROOT ?>/dashboard";
            }
        </script>
    <?php endif; ?>

    <script src="<?= ROOT ?>/assets/js/core.min.js"></script>
    <script src="<?= ROOT ?>/assets/js/script.js"></script>
    <script src="<?= ROOT ?>/assets/js/vendor.min.js"></script>
    <script src="<?= ROOT ?>/assets/js/app.min.js"></script>

<?php $this->view('includes/bookings_footer'); ?>
