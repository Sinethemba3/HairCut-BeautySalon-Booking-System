<?php $this->view('includes/admin_header'); ?>
    <style>
        #pagination-controls {
            margin-top: 20px;
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: nowrap;
            gap: 10px;
            padding: 10px;
        }

        .pagination-btn {
            background: #4e73df;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .pagination-btn:hover {
            background: #4e73df;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        #page-info {
            font-size: 15px;
            color: #333;
            padding: 5px 10px;
            white-space: nowrap;
        }

        /* Smaller buttons and tighter spacing on small screens */
        @media (max-width: 500px) {
            .pagination-btn {
                padding: 6px 12px;
                font-size: 13px;
                border-radius: 20px;
            }

            #page-info {
                font-size: 13px;
                padding: 3px 6px;
            }

            #pagination-controls {
                gap: 5px;
                padding: 5px;
            }
        }
    </style>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- header & mobile header -->
            <?php $this->view('includes/headers'); ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="m-4">
                    <a href="<?=ROOT?>/staff_signup">
                        <button class="btn btn-sm btn-primary">Add Staff</button>
                    </a>
                    <hr>
                </div>
                <div class="page">
                    <main class="page-content" id="perspective">
                        <div class="content-wrapper">
                            <div id="wrapper">
                                <section class="section-xs bg-periglacial-blue one-screen-page-content text-center">
                                    <div class="shell">
                                        <div class="range range-lg-center">
                                            <div class="cell-lg-10">
                                                <div class="prods range range-sm-center range-md-left range-30">
                                                    <!-- Start Service Promo Single Item -->
                                                    <div class="blog-wrapper container">
                                                        <div class="row">
                                                            <?php if (!empty($rows)): ?>
                                                                <?php
                                                                    date_default_timezone_set('Africa/Johannesburg');
                                                                    $today = strtolower(date('l'));
                                                                    $todayDate = date('Y-m-d');

                                                                    $todayCodeMap = [
                                                                        'monday'    => 'mo',
                                                                        'tuesday'   => 'tu',
                                                                        'wednesday' => 'we',
                                                                        'thursday'  => 'th',
                                                                        'friday'    => 'fr',
                                                                        'saturday'  => 'st',
                                                                        'sunday'    => 'sn'
                                                                    ];
                                                                    $expectedCode = $todayCodeMap[$today];
                                                                ?>

                                                                <?php foreach ($rows as $row): ?>
                                                                    <?php
                                                                        $isAvailableToday = isset($row->$today) && $row->$today === $expectedCode;
                                                                        $bookedSlots = $bookings[$row->id][$todayDate] ?? [];

                                                                        $isBusy = false;
                                                                        $busySlotTime = '';
                                                                        $now = time();

                                                                        $therapistBookings = $bookings[$row->id] ?? [];

                                                                        foreach ($therapistBookings as $appointmentDate => $slots) {
                                                                            foreach ($slots as $slot) {
                                                                                $slot = trim($slot);
                                                                                if (strpos($slot, '-') === false) continue;

                                                                                [$start, $end] = array_map('trim', explode(' - ', $slot));
                                                                                $startTime = strtotime("$appointmentDate $start");
                                                                                $endTime   = strtotime("$appointmentDate $end");

                                                                                if ($now >= $startTime && $now < $endTime) {
                                                                                    $isBusy = true;
                                                                                    $busySlotTime = "$start - $end";
                                                                                    break 2;
                                                                                }
                                                                            }
                                                                        }
                                                                    ?>

                                                                    <div class="col-sm-6 col-md-4 mb-4">
                                                                        <div class="card h-100 text-center shadow-sm">
                                                                            <a href="<?=ROOT?>/staff_members/edit/<?= esc($row->id) ?>">
                                                                                <img src="<?= get_image($row->image, $row->gender) ?>"
                                                                                    class="card-img-top rounded-circle mx-auto mt-3"
                                                                                    style="width:120px;height:120px;"
                                                                                    alt="<?= esc($row->name) ?>">
                                                                            </a>

                                                                            <div class="card-body">
                                                                                <h5 class="card-title" style="font-size: 1rem;">
                                                                                    <?= esc($row->name . ' ' . $row->surname) ?>
                                                                                </h5>

                                                                                <span style="font-size: 0.7rem;">Weekday Availability</span>
                                                                                <ul class="list-inline" style="padding-left: 0; margin-bottom: 10px;">
                                                                                    <?php foreach ($todayCodeMap as $day => $code): ?>
                                                                                        <?php
                                                                                            $isActive = isset($row->$day) && $row->$day === $code;
                                                                                            $badgeClass = $isActive ? 'bg-success' : 'bg-secondary';
                                                                                            $badgeText = $isActive ? $code : 'off';
                                                                                        ?>
                                                                                        <li class="list-inline-item" style="margin-right: 5px;">
                                                                                            <span class="badge <?= $badgeClass ?>" style="font-size: 0.6rem; padding: 0.30em 0.6em; color: #FFFFFF">
                                                                                                <?= $badgeText ?>
                                                                                            </span>
                                                                                        </li>
                                                                                    <?php endforeach; ?>
                                                                                </ul>

                                                                                <input type="hidden" name="name_" value="<?= esc($row->name) ?>">
                                                                                <input type="hidden" name="surname_" value="<?= esc($row->surname) ?>">
                                                                                <input type="hidden" name="therapist_id" value="<?= esc($row->id) ?>">

                                                                                <!-- Availability -->
                                                                                <?php if ($isAvailableToday): ?>
                                                                                    <?php if ($isBusy): ?>
                                                                                        <a href="<?=ROOT?>/staff_members/edit/<?=$row->id?>" type="button" class="btn btn-sm btn-warning text-white" disabled>
                                                                                            Therapist Busy
                                                                                        </a>
                                                                                        <?php if (!empty($busySlotTime)): ?>
                                                                                            <div style="font-size: 0.75rem; color: red; margin-top: 5px;">
                                                                                                Busy from <?= $busySlotTime ?>
                                                                                            </div>
                                                                                        <?php endif; ?>
                                                                                    <?php else: ?>
                                                                                        <a href="<?=ROOT?>/staff_members/edit/<?=$row->id?>" type="button" class="btn btn-sm btn-primary">
                                                                                            Profile <i class="ion-ios-arrow-thin-right"></i>
                                                                                        </a>
                                                                                        <a href="<?=ROOT?>/staff_members/delete/<?=$row->id?>" type="button" class="btn btn-sm btn-danger">
                                                                                            Delete <i class="ion-ios-arrow-thin-right"></i>
                                                                                        </a>
                                                                                    <?php endif; ?>
                                                                                <?php else: ?>
                                                                                    <a href="<?=ROOT?>/staff_members/edit/<?=$row->id?>" type="button" class="btn btn-sm btn-secondary" disabled>
                                                                                        Off Day
                                                                                    </a>

                                                                                    <a href="<?=ROOT?>/staff_members/delete/<?=$row->id?>" type="button" class="btn btn-sm btn-danger">
                                                                                            Delete <i class="ion-ios-arrow-thin-right"></i>
                                                                                    </a>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                <div class="col-12 text-center text-danger">
                                                                    <h4>No <?= esc(ucfirst($mode)) ?> therapists found.</h4>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <!-- End Service Promo Single Item -->
                                                    <br><br>
                                                    <div id="pagination-controls">
                                                        <button id="prev" class="pagination-btn">← Prev</button>
                                                        <span id="page-info">Page 1</span>
                                                        <button id="next" class="pagination-btn">Next →</button>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </main>
                </div>
            </div>

            <script>
                let currentItems = [];
                let itemsPerPage = 6;
                let currentPage = 1;

                document.addEventListener('DOMContentLoaded', () => {
                    initPagination();
                    bindPaginationControls();
                });

                function initPagination() {
                    // Corrected selector to grab the therapist cards
                    currentItems = document.querySelectorAll('.prods .blog-wrapper .row > div');
                    showPage(1);
                }

                function showPage(page) {
                    const totalPages = Math.ceil(currentItems.length / itemsPerPage);
                    currentPage = Math.max(1, Math.min(page, totalPages));

                    currentItems.forEach((item, index) => {
                        item.style.display = (index >= (currentPage - 1) * itemsPerPage && index < currentPage * itemsPerPage) ? '' : 'none';
                    });

                    document.getElementById('page-info').textContent = `Page ${currentPage} of ${totalPages}`;
                    document.getElementById('prev').disabled = currentPage === 1;
                    document.getElementById('next').disabled = currentPage === totalPages;
                }

                function bindPaginationControls() {
                    document.getElementById('prev').addEventListener('click', () => showPage(currentPage - 1));
                    document.getElementById('next').addEventListener('click', () => showPage(currentPage + 1));
                }
            </script>

<!-- footer & mobile footer -->
<?php $this->view('includes/admin_footer'); ?>
<!-- footer & mobile footer -->