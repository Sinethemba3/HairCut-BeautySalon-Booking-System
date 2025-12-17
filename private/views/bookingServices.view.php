<?php $this->view('includes/bookings_header'); ?>
    <div class="container-fluid section-top-gap-100">
        <form method="post" action="">
            <?php
                // Map service group names (uppercase) to icon classes
                $serviceIcons = [
                    'HAIRDRESSING'    => 'fa-users',
                    'WIG BAR'         => 'fa-user',
                    'PLAITS & BRAIDS' => 'fa-shopping-bag',
                    'NAILS'           => 'fa-users',
                    'FACE & BODY'     => 'fa-users',
                    'PACKAGES'        => 'fa-shopping-bag',
                    'KIDDIES'         => 'fa-child',
                    'ELDERLY'         => 'fa-heart',
                ];
    
                // Initialize $modeServices *before* the loop
                $modeServices = [];
                if (!empty($rows)) {
                    foreach ($rows as $row) {
                        if ($row->main_service === 'Hair') {
                            $modeServices['hair'][] = $row->service;
                        } elseif ($row->main_service === 'Beauty') {
                            $modeServices['beauty'][] = $row->service;
                        }
                    }
                }
    
                $grouped = [];
                if (!empty($rows)) {
                    foreach ($rows as $row) {
                        if (isset($modeServices[$mode]) && in_array($row->service, $modeServices[$mode])) {
                            $grouped[$row->service][] = $row;
                        }
                    }
                }
            ?>
    
            <!-- Button -->
            <div style="padding-left: 2%; padding-bottom: 40px;">
                <button type="submit" id="submitButton"
                    class="d-flex align-items-center text-white"
                    style="background: #2563eb; padding: 10px 25px; border-radius: 35px; min-width: 120px; letter-spacing: .1em; font-weight: 400; font-size: 0.9rem; text-align: center;"
                    disabled>
                    continue <i class="ion-ios-arrow-thin-right"></i>
                </button>
            </div>
    
            <?php foreach ($grouped as $serviceGroup => $services): ?>
                <?php 
                    $groupHash = md5($serviceGroup); 
    
                    // Normalize current group name to uppercase
                    $groupKey = strtoupper($serviceGroup);
    
                    // Get icon for current service group or default icon
                    $iconClass = $serviceIcons[$groupKey] ?? 'fa-scissors';
                ?>
                <div class="row px-5">
                    <div class="col-md-12">
                        <div class="user-actions accordion">
                            <h3>
                                <i class="fa <?= $iconClass ?>" aria-hidden="true"></i>
                                <?= esc($groupKey) ?> -
                                <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#collapse_<?= $groupHash ?>" aria-expanded="false">
                                    Click to view Prices
                                </a>
                            </h3>
                            <br>
                            <div id="collapse_<?= $groupHash ?>" class="collapse">
                                <div class="compare-section">
                                    <?php if (!empty($services)): ?>
                                        <?php foreach ($services as $index => $row): ?>
                                            <?php $uniqueIndex = "{$groupHash}_{$index}"; ?>
                                            <div class="panel-default pb-2">
                                                <label class="checkbox-default" for="services_<?= $uniqueIndex ?>" style="width: 35%;">
                                                    <input type="checkbox"
                                                        value="<?= esc($row->service_name) ?>"
                                                        name="services_[]"
                                                        id="services_<?= $uniqueIndex ?>"
                                                        class="service-checkbox"
                                                        data-amount-id="amount-<?= $uniqueIndex ?>">
                                                    <span style="font-size: 0.7rem;">
                                                        <?= esc($row->name) ?> - <?= esc($row->service_name) ?>
                                                    </span>
                                                </label>
    
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                
                                                <label class="checkbox-default" for="amount_<?= $uniqueIndex ?>">
                                                    <input type="checkbox"
                                                        value="<?= $row->price1 ?>"
                                                        name="amount[]"
                                                        id="amount-<?= $uniqueIndex ?>"
                                                        class="amount-checkbox"
                                                        style="display: none;"
                                                        disabled>
                                                    <span style="font-size: 0.7rem;">R<?= number_format($row->price1 * 1.14, 2) ?></span>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="pb-4">
                                            <div class="col-12 text-center pb-4" style="font-size: 5rem;">&#128526;</div>
                                            <h4 class="text-danger text-center text-uppercase">No services found for <?= esc($serviceGroup) ?></h4>
                                        </div>
                                    <?php endif; ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Button -->
            <div style="padding-left: 2%; padding-top: 40px;">
                <button type="submit" id="submitButton"
                    class="d-flex align-items-center text-white"
                    style="background: #2563eb; padding: 10px 25px; border-radius: 35px; min-width: 120px; letter-spacing: .1em; font-weight: 400; font-size: 0.9rem; text-align: center;"
                    disabled>
                    continue <i class="ion-ios-arrow-thin-right"></i>
                </button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $('.amount-checkbox').on('click', function (e) {
                e.preventDefault(); // Prevent manual checking
                return false;
            });

            $('.service-checkbox').change(function () {
                const amountId = $(this).data('amount-id');
                const $priceCheckbox = $('#' + amountId);

                if ($(this).is(':checked')) {
                    $priceCheckbox.prop('disabled', false).prop('checked', true);
                } else {
                    $priceCheckbox.prop('checked', false).prop('disabled', true);
                }

                checkSubmitButton();
            });

            function checkSubmitButton() {
                const isChecked = $('.service-checkbox:checked').length > 0;
                $('#submitButton').prop('disabled', !isChecked);
            }
        });
    </script>
<?php $this->view('includes/bookings_footer'); ?>