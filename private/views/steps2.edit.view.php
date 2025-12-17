<?php $this->view('includes/header'); ?>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg p-4">
                    <div class="card-body">
                        <h2 class="text-center fw-bold mb-4">Appointment Details</h2>
                        
                        <?php if (!empty($row)) : ?>
                        <div class="row text-center text-muted small mb-4">
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
                                <div class="card border h-100 shadow-sm p-2">
                                    <div class="card-body py-3">
                                        <h6 class="text-uppercase fw-bold mb-1"><?= $item['title'] ?>:</h6>
                                        <p class="m-0 fw-semibold"><?= $item['value'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="card border text-center shadow-sm p-3">
                                <div class="card-body">
                                    <h6 class="text-uppercase text-muted mb-2">Total Price</h6>
                                    <?php
                                        $amountsData = $row[0]->amount;
                                        $amountsArray = explode(',', $amountsData);
                                        $total = array_sum(array_map('floatval', $amountsArray));
                                        $finalPrice = ($total * 1.14) / 2;
                                    ?>
                                    <h3 class="text-success fw-bold mb-3">R<?= number_format($finalPrice, 2) ?></h3>

                                    <div class="alert alert-info d-flex align-items-center justify-content-start gap-2 p-3 shadow-sm rounded">
                                        <i class="fa fa-info-circle me-2"></i>
                                        <span>
                                            Please pay <strong>50%</strong> now
                                            <span class="text-primary fw-semibold">(R<?= number_format($finalPrice, 2) ?>)</span>.
                                            Remaining <strong>50%</strong> due <u>upon arrival</u>.
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Form Section -->
                        <form name="PayFastPayNowForm" action="<?= ROOT ?>/payfastbookings/edit" method="post" id="payment" class="needs-validation" novalidate>
                            <div class="card border mb-4 shadow-sm p-3">
                                <div class="card-body">
                                    <h4 class="text-center">Provide Your Details</h4>
                                    <div class="row mt-3">
                                        <div class="form-group col-md-4 mb-3">
                                            <label for="validationCustom01" class="form-label">Name & Surname</label>
                                            <input 
                                                type="text" 
                                                class="line-input form-control" 
                                                name="name" 
                                                value="<?= esc(get_var('name', Auth::user_name())) ?> <?= esc(get_var('name', Auth::surname())) ?>"
                                                id="validationCustom01" required>

                                            <div class="invalid-feedback">Please enter your name and surname.</div>
                                        </div>

                                        <div class="form-group col-md-4 mb-3">
                                            <label for="validationCustom02" class="form-label">Phone</label>
                                            <input 
                                                type="tel" 
                                                class="line-input form-control"
                                                name="phone" 
                                                value="<?= esc(get_var('phone', Auth::phone())) ?>"
                                                id="validationCustom02" required>

                                            <div class="invalid-feedback">Please enter your phone number.</div>
                                        </div>

                                        <div class="form-group col-md-4 mb-3">
                                            <label for="validationCustomEmail" class="form-label">Email</label>
                                            <input 
                                                type="email" 
                                                class="line-input form-control" 
                                                name="email" 
                                                value="<?= esc(get_var('email', Auth::email())) ?>"
                                                id="validationCustomEmail" required>

                                            <div class="invalid-feedback">Please enter a valid email.</div>
                                        </div>

                                        <?php if (!empty($row)) : ?>
                                            <input type="hidden" name="appointment_time" value="<?= esc($row[0]->appointment_time) ?>">
                                            <input type="hidden" name="appointment_date" value="<?= esc($row[0]->appointment_date) ?>">
                                            <input type="hidden" name="services_" value="<?= esc($row[0]->services_) ?>">
                                            <input type="hidden" name="name_" value="<?= esc($row[0]->name_) ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="card border mb-4 shadow-sm p-3">
                                <div class="card-body">
                                    <h4>Punctuality</h4>
                                    <p class="small text-muted">Please arrive 15 minutes before your appointment. Late arrivals may reduce session time.</p>
                                </div>
                            </div>

                            <div class="card border mb-4 shadow-sm p-3">
                                <div class="card-body">
                                    <h4>Terms & Conditions</h4>
                                    <p class="small text-muted">Please give at least 48 hours' notice to reschedule.</p>

                                    <h4>Cancellation fees:</h4>
                                    <ul class="small">
                                        <li>More than 90 days: 5% fee</li>
                                        <li>More than 30 days: 10% fee</li>
                                        <li>30 - 20 days: 25% fee</li>
                                        <li>21 - 15 days: 30% fee</li>
                                        <li>14 - 7 days: 50% fee</li>
                                        <li>7 - 0 days: 100% fee</li>
                                        <li>No shows: 100% fee</li>
                                    </ul>

                                    <div class="form-check my-3">
                                        <input type="checkbox" name="terms" class="form-check-input" required>
                                        <label class="form-check-label">I accept the Terms and Conditions</label>
                                        <div class="invalid-feedback">You must accept the terms to continue.</div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">Book Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= ROOT ?>/assets/js/core.min.js"></script>
    <script src="<?= ROOT ?>/assets/js/script.js"></script>
    <script src="<?= ROOT ?>/assets/js/vendor.min.js"></script>
    <script src="<?= ROOT ?>/assets/js/app.min.js"></script>

<?php $this->view('includes/footer'); ?>
