<?php $this->view('includes/admin_header'); ?>
<!-- header & mobile header -->

<style>
    #appointments-chart {
        position: relative;
        z-index: 1; /* Ensure it's on top of base content but under modals */
    }
</style>

<!-- third party css -->
<link href="<?=ROOT?>/assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
<!-- third party css end -->
<!-- App css -->
<link href="<?=ROOT?>/assets/css/icons.min.css" rel="stylesheet" type="text/css">
<link href="<?=ROOT?>/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
<!-- <link href="</?=ROOT?>/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style"> -->

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- header & mobile header -->
        <?php $this->view('includes/headers'); ?>
        <!-- header & mobile header -->

        <!-- container-fluid -->
        <div class="container-fluid">
 
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <form class="d-flex">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-light" id="dash-daterange">
                                    <span class="input-group-text bg-primary border-primary text-white">
                                            <i class="fas fa-calendar-alt font-13"></i>
                                        </span>
                                </div>
                                <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                    <i class="fas fa-sync-alt"></i>
                                </a>
                                <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                    <i class="fas fa-filter"></i>
                                </a>
                            </form>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                    <div class="row">
                        <!-- Customers -->
                        <div class="col-lg-6">
                            <div class="card widget-flat">
                                <div class="card-body">
                                    <div class="float-end">
                                        <i class="mdi mdi-account-multiple widget-icon"></i>
                                    </div>
                                    <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Customers</h5>
                                    <?php
                                        $customerModel = new Customer();
                                        $customer_count = $customerModel->get_customer_count();
                                        $prev_customer_count = $customerModel->get_customer_count_last_month() ?? 0;
                                        $customer_percent = $prev_customer_count > 0 ? (($customer_count - $prev_customer_count) / $prev_customer_count) * 100 : 0;
                                    ?>
                                    <h3 class="mt-3 mb-3"><?= $customer_count ?></h3>
                                    <p class="mb-0 text-muted">
                                        <span class="<?= $customer_percent >= 0 ? 'text-success' : 'text-danger' ?> me-2">
                                            <i class="mdi mdi-arrow-<?= $customer_percent >= 0 ? 'up' : 'down' ?>-bold"></i>
                                            <?= number_format(abs($customer_percent), 2) ?>%
                                        </span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                
                        <!-- Appointments -->
                        <div class="col-lg-6">
                            <div class="card widget-flat">
                                <div class="card-body">
                                    <div class="float-end">
                                        <i class="mdi mdi-cart-plus widget-icon"></i>
                                    </div>
                                    <h5 class="text-muted fw-normal mt-0" title="Number of Appointments">Appointments</h5>
                                    <?php
                                        $orderModel = new Service();
                                        $appointments_count = $orderModel->get_appointments_count();
                                        $prev_appointments_count = $orderModel->get_revenue_last_month() ?? 0;
                                        $appointments_percent = $prev_appointments_count > 0 ? (($appointments_count - $prev_appointments_count) / $prev_appointments_count) * 100 : 0;
                                    ?>
                                    <h3 class="mt-3 mb-3"><?= $appointments_count ?></h3>
                                    <p class="mb-0 text-muted">
                                        <span class="<?= $appointments_percent >= 0 ? 'text-success' : 'text-danger' ?> me-2">
                                            <i class="mdi mdi-arrow-<?= $appointments_percent >= 0 ? 'up' : 'down' ?>-bold"></i>
                                            <?= number_format(abs($appointments_percent), 2) ?>%
                                        </span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <!-- Revenue and Growth -->
                    <div class="row">
                        <!-- App. Revenue Card -->
                        <div class="col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-currency-usd widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Average Revenue">App. Revenue</h5>
                            <h3 class="mt-3 mb-3">
                                R<?= number_format($currentRevenue, 2) ?>
                            </h3>
                            <p class="mb-0 text-muted">
                                <span class="<?= $revenuePercent >= 0 ? 'text-success' : 'text-danger' ?> me-2">
                                <i class="mdi mdi-arrow-<?= $revenuePercent >= 0 ? 'up' : 'down' ?>-bold"></i>
                                <?= number_format(abs($revenuePercent), 2) ?>%
                                </span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                            </div>
                        </div>
                        </div>

                        <!-- Growth Card -->
                        <div class="col-lg-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-pulse widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Growth">Growth</h5>
                            <h3 class="mt-3 mb-3">
                                <?= $growthPercent >= 0 ? '+' : '-' ?><?= number_format(abs($growthPercent), 2) ?>%
                            </h3>
                            <p class="mb-0 text-muted">
                                <span class="<?= $growthPercent >= 0 ? 'text-success' : 'text-danger' ?> me-2">
                                <i class="mdi mdi-arrow-<?= $growthPercent >= 0 ? 'up' : 'down' ?>-bold"></i>
                                <?= number_format(abs($growthPercent), 2) ?>%
                                </span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- Chart Card -->
                <div class="col-xl-7 col-lg-6">
                    <div class="card card-h-100">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                </div>
                            </div>
                            <h4 class="header-title mb-3">Projections Vs Actuals</h4>

                            <div dir="ltr">
                                <div id="appointments-chart" class="apex-charts" data-colors="#727cf5,#e3eaef"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart Script -->
                <script>
                    const appointmentsByMonth = <?= json_encode(array_values($appointments_by_month)) ?>;
                    const maxAppointments = Math.max(...appointmentsByMonth);
                    const yMax = Math.ceil(maxAppointments / 10) * 10;

                    const options = {
                        chart: { height: 300, type: 'bar', toolbar: { show: false } },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '55%',
                                endingShape: 'rounded'
                            }
                        },
                        dataLabels: { enabled: true },
                        stroke: { show: true, width: 2, colors: ['transparent'] },
                        series: [{ name: 'Appointments', data: appointmentsByMonth }],
                        xaxis: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] },
                        yaxis: {
                            min: 0,
                            max: yMax,
                            title: { text: 'Appointments' }
                        },
                        colors: ['#727cf5'],
                        tooltip: {
                            y: {
                                formatter: val => `${val} appointments`
                            }
                        }
                    };

                    document.addEventListener('DOMContentLoaded', () => {
                        const chartEl = document.querySelector("#appointments-chart");
                        if (window.appointmentsChart) window.appointmentsChart.destroy();
                        const chart = new ApexCharts(chartEl, options);
                        chart.render();
                        window.appointmentsChart = chart;
                    });
                </script>
            </div>
            <!-- end row -->

        </div>
        <!-- container -->
    </div>
    <!-- End of Main Content -->

    <!-- bundle -->
    <script src="<?=ROOT?>/assets/js/vendor.min.js"></script>
     <!--<script src="</?=ROOT?>/assets/js/app.min.js"></script> -->

    <!-- third party js -->
    <script src="<?=ROOT?>/assets/js/vendor/apexcharts.min.js"></script>
    <script src="<?=ROOT?>/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?=ROOT?>/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="<?=ROOT?>/assets/js/pages/demo.dashboard.js"></script>
    <!-- end demo js-->

<!-- footer & mobile footer -->
<?php $this->view('includes/admin_footer'); ?>
<!-- footer & mobile footer -->