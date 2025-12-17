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

        .greatvibes {
            font-family: 'Great Vibes', cursive;
        }

        .p {
            font-family: 'Montserrat', sans-serif;
            font-weight: lighter !important;
            font-size: 0.95rem !important;
        }

        .earnings-card {
            background: #f8f9fa;
            transition: all .3s ease;
        }

        .earnings-card:hover {
            transform: translateY(-4px);
        }

        .today-earning {
            background: #0d6efd !important;
            color: #fff;
        }

        .today-earning small {
            color: #dbe7ff !important;
        }
    </style>

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
                        <h3 class="breadcrumb-title">My Account</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?=ROOT?>/logout">Home</a></li>
                                    <li><a href="javascript:void(0)">Pages</a></li>
                                    <li class="active" aria-current="page">My Account</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Account Dashboard Section :::... -->
    <div class="account-dashboard py-5 bg-light">
        <div class="container py-5">
            <div class="row">
                <!-- SIDEBAR -->
                <div class="col-md-3 mb-4">
                    <ul class="nav flex-column bg-white shadow-sm rounded p-3">
                        <li class="mb-2">
                            <a class="btn btn-dark w-100" data-bs-toggle="tab" href="#dashboard">Dashboard</a>
                        </li>
                        <li class="mb-2">
                            <a class="btn btn-outline-dark w-100" data-bs-toggle="tab" href="#orders">My Bookings</a>
                        </li>
                        <li class="mb-2">
                            <a class="btn btn-outline-dark w-100" data-bs-toggle="tab" href="#profile">Profile</a>
                        </li>
                        <li>
                            <a href="<?= ROOT ?>/logout" class="btn btn-outline-danger w-100">Logout</a>
                        </li>
                    </ul>
                </div>

                <!-- CONTENT -->
                <div class="col-md-9">
                    <div class="tab-content">

                        <!-- DASHBOARD -->
                        <div class="tab-pane fade show active" id="dashboard">

                            <!-- PROFILE HEADER (ROUNDED SECTION) -->
                            <div class="card shadow-sm border-0 rounded-4 mb-4">
                                <div class="card-body">
                                    <h3 class="mb-1">
                                        <?= esc($user->name) ?> <?= esc($user->surname) ?>
                                    </h3>
                                    <small class="text-muted"><?= esc($displayRole) ?></small>
                                </div>
                            </div>

                            <!-- WEEKLY + MONTHLY EARNINGS (ROUNDED SECTION) -->
                            <div class="card shadow-sm border-0 rounded-4 mb-4">
                                <div class="card-body">
                                    <h5 class="mb-3">💰 Earnings</h5>

                                    <div class="row" id="weekly-earnings">
                                        <?php foreach ($weeklyEarnings as $day => $amount): ?>
                                            <div class="col-md-3 mb-3">
                                                <div class="card earnings-card shadow-sm border-0 rounded-4"
                                                    data-day="<?= strtolower($day) ?>">
                                                    <div class="card-body text-center">
                                                        <small class="text-muted"><?= $day ?></small>
                                                        <h5 class="fw-bold mt-1">
                                                            R<?= number_format($amount, 2) ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                        <!-- MONTHLY TOTAL (NEXT TO SUNDAY) -->
                                        <div class="col-md-3 mb-3">
                                            <div class="card shadow-sm border-0 rounded-4 bg-dark text-white">
                                                <div class="card-body text-center">
                                                    <small>This Month</small>
                                                    <h5 class="fw-bold mt-1 text-white">
                                                        R<?= number_format($monthlyTotal, 2) ?>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- WEEKLY SCHEDULE (ROUNDED SECTION) -->
                            <div class="card shadow-sm border-0 rounded-4">
                                <div class="card-body">
                                    <h5 class="mb-3">🗓 Weekly Schedule</h5>

                                    <table class="table table-bordered mb-0">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Day</th>
                                                <th>Workin Status</th>
                                                <th>Hours</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($therapistSchedule as $day): ?>
                                                <tr>
                                                    <td><?= esc($day['day']) ?></td>
                                                    <td>
                                                        <span class="badge <?= $day['status'] === 'Off' ? 'bg-warning' : 'bg-success' ?>">
                                                            <?= $day['status'] ?>
                                                        </span>
                                                    </td>
                                                    <td><?= esc($day['hours']) ?></td>
                                                    <td>
                                                        <?php foreach ($day['service_statuses'] as $status): ?>

                                                            <?php
                                                                $s = strtolower($status);
                                                                $badgeClass = match ($s) {
                                                                    'Attended'  => 'bg-success',
                                                                    'Rejected'  => 'bg-danger',
                                                                    'pending'   => 'bg-warning',
                                                                    'completed' => 'bg-dark',
                                                                    default     => 'bg-secondary',
                                                                };
                                                            ?>

                                                            <?php if ($status === '-'): ?>
                                                                -
                                                            <?php else: ?>
                                                                <span class="badge <?= $badgeClass ?> me-1 mb-1">
                                                                    <?= esc($status) ?>
                                                                </span>
                                                            <?php endif; ?>

                                                        <?php endforeach; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <!-- BOOKINGS -->
                        <div class="tab-pane fade" id="orders">
                            <h4 class="mb-3">My Appointments</h4>

                            <table class="table table-striped bg-white shadow-sm">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($appointments)): ?>
                                        <?php foreach ($appointments as $appt): ?>
                                            <tr>
                                                <td><?= date('M d, Y', strtotime($appt->appointment_date)) ?></td>
                                                <td><?= esc($appt->appointment_time) ?></td>
                                                <td>
                                                    <span class="badge bg-warning">
                                                        <?= esc($appt->status) ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    R<?= number_format((float)explode(',', $appt->amount)[0], 2) ?>
                                                </td>
                                                <td>
                                                    <?= $appt->paid
                                                        ? '<span class="badge bg-success">Paid</span>'
                                                        : '<span class="badge bg-danger">No</span>' ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">
                                                No appointments found.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- PROFILE -->
                        <div class="tab-pane fade" id="profile">
                            <h4 class="mb-3">My Profile</h4>

                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <p><strong>Name:</strong> <?= esc($user->name) ?></p>
                                    <p><strong>Surname:</strong> <?= esc($user->surname) ?></p>
                                    <p><strong>Email:</strong> <?= esc($user->email) ?></p>
                                    <p><strong>Role:</strong> <?= esc($displayRole) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...:::: End Account Dashboard Section :::... -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const today = new Date().toLocaleDateString('en-US', {
                weekday: 'long'
            }).toLowerCase();

            document.querySelectorAll('.earnings-card').forEach(card => {
                if (card.dataset.day === today) {
                    card.classList.add('today-earning');
                }
            });
        });
    </script>

    <!-- Start Footer Section -->
    <?php $this->view('includes/footer'); ?>
    <!-- End Footer Section -->