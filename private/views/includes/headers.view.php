<?php
    $userData        = new User();
    $salonData       = new Salon();

    $userId          = Auth::getUser_id();

    $uniqueSalons    = $salonData->findAll();

    $uniqueUsers     = $userData->query("SELECT * FROM users WHERE user_id = :user_id", ['user_id' => $userId]); // Retrieve the current users
?>

<script language="JavaScript" type="text/javascript">
    function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
     <?php 
        if (!empty($uniqueSalons)):
            foreach ($uniqueSalons as $row):
                $image =  fetch_images($row->image ?? '');
    ?>
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= ROOT ?>/dashboard">
            <img src="<?= $image ?>" class="rounded-circle me-3" height="50" width="50" alt="">
            <div class="sidebar-brand-text mx-0"><?= $row->store_name ?? ''?></div>
        </a>
    <?php endforeach; endif;?>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="<?= ROOT ?>/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Interface</div>

    <li class="nav-item">
        <a class="nav-link" href="<?= ROOT ?>/salons">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Organisation</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/appointments">
            <i class="fas fa-fw fa-book"></i>
            <span>Bookings</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/bookings">
            <i class="fas fa-fw fa-phone"></i>
            <span>Phone Bookings</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/messages">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Messages</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/our_services">
            <i class="fas fa-fw fa-balance-scale"></i>
            <span>Main Sevices</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/salon_services">
            <i class="fas fa-fw fa-balance-scale"></i>
            <span>Sub-Sevices</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/blogz">
            <i class="fas fa-fw fa-video"></i>
            <span>Blog</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/staff">
            <i class="fas fa-fw fa-users"></i>
            <span>Staff</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/users">
            <i class="fas fa-fw fa-users"></i>
            <span>Customers</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/admins">
            <i class="fas fa-fw fa-users"></i>
            <span>Admins</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/reports">
            <i class="fas fa-fw fa-users"></i>
            <span>Appointments Report</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/openingHours">
            <i class="fas fa-fw fa-users"></i>
            <span>Opening Hours</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input name="find" value="<?=isset($_GET['find'])? $_GET['find']: ''; ?>" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Nav Item - Appointments -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <h6><i class="fas fa-bell fa-fw"></i></h6>

                        <!-- Counter - Alerts -->
                        <?php $appointments_count = (new Service())->get_appointments_count(); ?>
                        <?php if($appointments_count): ?>
                            <span class="badge badge-danger badge-counter" style="font-size: 0.8rem;">
                                <?= $appointments_count ?> 
                            </span>
                        <?php endif; ?>
                    </a>

                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">Alerts Center</h6>

                        <?php if (!empty($rows)): ?>
                            <?php foreach ($rows as $row): ?>
                                <div class="cell-xs-6 cell-md-3">
                                    <?php if ($sesh->appointments($row, $row->id)): ?>
                                        <button class="bt btn-sm btn-danger text-uppercase">
                                            <small>Incomplete Profile</small>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php
                            // Show single "View Appointments" link if there are any orders
                            $ordersModel = new Service();
                            $allOrders = $ordersModel->findAll();
                        ?>
                        <?php if (!empty($allOrders)): ?>
                            <a class="dropdown-item text-center small text-gray-500" href="<?= ROOT ?>/appointments">
                                View Appointments
                            </a>
                        <?php else: ?>
                            <div class="dropdown-item text-center small text-muted">No Appointments yet</div>
                        <?php endif; ?>
                    </div>
                </li>

                <!-- Nav Item - Messages -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <h6><i class="fas fa-envelope fa-fw"></i></h6>
                        <?php $messages_count = (new Message())->get_messages_count(); ?>
                        <?php if($messages_count) : ?>
                            <span class="badge badge-danger badge-counter" style="font-size: 0.8rem;"><?=$messages_count?></span>
                        <?php endif; ?>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Message Center
                        </h6>
                    
                        <?php if (!empty($rows)): ?>
                            <?php foreach ($rows as $row) : ?>
                                <div class="cell-xs-6 cell-md-3">
                                    <?php if($sesh->message($row, $row->id, $message)) :?>
                                        <button class="bt btn-sm btn-danger text-uppercase"><small>incomplete Profile</small></button>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    
                        <!-- Show link only if messages exist -->
                        <?php
                            $ordersModel = new Message();
                            $allOrders = $ordersModel->findAll(); // Retrieve all orders
                            $uniqueOrders = []; // Array to store unique orders
                        
                            if (!empty($allOrders)):
                                foreach ($allOrders as $row):
                                    $order = strtolower($row->user_id); // Normalize the user_id
                                    if (!in_array($order, $uniqueOrders)): // Avoid duplicates
                                        $uniqueOrders[] = $order;
                        ?>
                            <a class="dropdown-item text-center small text-gray-500" href="<?=ROOT?>/messages">
                                View messages
                            </a>
                        <?php
                                    endif;
                                endforeach;
                            else:
                        ?>
                                <div class="dropdown-item text-center small text-muted">No messages yet</div>
                        <?php endif; ?>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php 
                            if (!empty($uniqueUsers)):
                                foreach ($uniqueUsers as $row):
                                    $image =  fetch_image($row->image, $row->gender);
                        ?>
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$row->name?>&nbsp;<?=$row->surname?></span>
                                <?php $image =  fetch_image($row->image, $row->gender); ?>
                                <img class="img-profile rounded-circle"
                                    src="<?= $image ?>">
                            <?php endforeach;?>
                        <?php endif;?>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <?php 
                            if (!empty($uniqueUsers)):
                                foreach ($uniqueUsers as $row):
                        ?>
                            <a class="dropdown-item" href="<?=ROOT?>/admins/edit/<?=$row->id?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <?php endforeach;?>
                        <?php endif;?>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- End of Topbar -->
