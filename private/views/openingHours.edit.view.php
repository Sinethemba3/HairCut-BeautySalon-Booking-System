<?php $this->view('includes/admin_header'); ?>

<style>
    body {
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 960px;
        margin: 40px auto;
        background: white;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        padding: 15px;
    }

    .header {
        background: linear-gradient(to right, #007bff, #0056b3);
        color: white;
        padding: 20px;
        text-align: center;
    }

    .header h1 {
        font-size: 1.8rem;
        font-weight: bold;
    }

    .section {
        padding: 15px 20px;
        border-bottom: 1px solid #f0f0f0;
    }

    .section h2 {
        font-size: 1.2rem;
        color: #007bff;
        margin-bottom: 10px;
        border-left: 4px solid #007bff;
        padding-left: 10px;
    }

    .info-row {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        font-size: 1rem;
        flex-wrap: wrap;
    }

    .info-row .label {
        font-weight: 600;
        color: #555;
    }

    .info-row span {
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        font-size: 0.95rem;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background: #007bff;
        color: white;
        font-weight: bold;
    }

    td {
        background: #f9f9f9;
        border-bottom: 1px solid #eee;
    }

    td:last-child {
        text-align: left;
    }

    .summary {
        font-size: 1.1rem;
        font-weight: bold;
    }

    .btn-container {
        display: flex;
        justify-content: center;
        gap: 10px;
        flex-wrap: wrap;
        padding: 20px;
    }

    .btn {
        text-decoration: none;
        font-size: 1rem;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 25px;
        border: none;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .flash-button {
        background-color: #007bff;
        animation: flash 1.5s infinite;
    }

    @keyframes flash {
        0%, 100% { background-color: #007bff; color: white; }
        50% { background-color: #0056b3; color: #e9ecef; }
    }

    .btn-primary {
        background: linear-gradient(to right, #007bff, #0056b3);
    }

    .btn-primary:hover {
        background: linear-gradient(to right, #0056b3, #004494);
    }

    .btn-secondary {
        background: linear-gradient(to right, #6c757d, #495057);
    }

    .btn-secondary:hover {
        background: linear-gradient(to right, #495057, #343a40);
    }

    /* Media Queries for Responsiveness */
    @media (max-width: 768px) {
        .container {
            margin: 20px auto;
            padding: 10px;
        }

        .header h1 {
            font-size: 1.5rem;
        }

        .info-row {
            flex-direction: column;
            align-items: flex-start;
        }

        table {
            font-size: 0.85rem;
        }

        th, td {
            padding: 8px;
        }

        .btn-container {
            flex-direction: column;
            gap: 10px;
        }

        .btn {
            font-size: 0.9rem;
            padding: 8px 15px;
        }
    }

    @media (max-width: 480px) {
        .header h1 {
            font-size: 1.2rem;
        }

        .section h2 {
            font-size: 1rem;
        }

        .btn {
            font-size: 0.8rem;
            padding: 5px 10px;
        }
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        padding: 10px;
        text-align: left;
    }

    div[style="overflow-x: auto;"] {
        margin-top: 15px;
        padding: 5px;
    }
</style>

<body id="page-top">
    <div id="wrapper">
        <?php $this->view('includes/headers'); ?>
        <div class="page-heading">
            <div class="container pt-3">
                <div class="header pt-3 pb-4">
                    <h1>Update Opening Hours</h1>
                </div>
                <hr>
                <br class="clear-fix">

                <?php
                    // Helper function to render form errors
                    function renderError($errors, $key)
                    {
                        return !empty($errors[$key]) ? "<div class='text-danger' style='font-size: 0.8rem;' id='{$key}-error'>{$errors[$key]}</div>" : '';
                    }
                ?>

                <?php if (!empty($row)) : ?>
                    <form onsubmit="return validateForm()" method="post" enctype="multipart/form-data" class="form">
                        <div class="text-center">
                            <?php if (!empty($errors)) : ?>
                                <div class="col-md alert alert-warning text-center alert-dismissible fade show m-3 p-1 msg">
                                    <strong>Error:</strong>
                                    <ul class="m-0 p-0" style="list-style: none;">
                                        <?php foreach ($errors as $error) : ?>
                                            <li style='font-size: 0.8rem;'><?= esc($error) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="row">
                            <!-- Holidays -->
                            <div class="form-group col-md-6 col-12">
                                <label style="font-size: 0.8rem;">Holidays <span style="color: red">*</span></label>
                                <?= renderError($errors, 'public_holidays') ?>
                                <select name="public_holidays" id="public_holidays" class="line-input form-control form-control-sm custom-select" style="font-size: 0.8rem;">
                                    <option value="" disabled selected>Select an option</option>
                                    <option value="Public Holidays" <?= $row[0]->public_holidays == 'Public Holidays' ? 'selected' : '' ?>>Public Holidays</option>
                                </select>
                            </div>

                            <!-- Holidays Time -->
                            <div class="form-group col-md-6 col-12">
                                <label style="font-size: 0.8rem;">Holidays Time <span style="color: red">*</span></label>
                                <?= renderError($errors, 'public_holidays_time') ?>
                                <select name="public_holidays_time" id="public_holidays_time" class="line-input form-control form-control-sm custom-select" style="font-size: 0.8rem;">
                                    <option value="" disabled selected>Select an option</option>
                                    <option value="09:00 - 15:00" <?= $row[0]->public_holidays_time == '09:00 - 15:00' ? 'selected' : '' ?>>09:00 - 15:00</option>
                                    <option value="Closed" <?= $row[0]->public_holidays_time == 'Closed' ? 'selected' : '' ?>>Closed</option>
                                </select>
                            </div>

                            <!-- Working Days -->
                            <div class="form-group col-md-6 col-12">
                                <label style="font-size: 0.8rem;">Working Days <span style="color: red">*</span></label>
                                <?= renderError($errors, 'mondays_sundays') ?>
                                <select name="mondays_sundays" id="mondays_sundays" class="line-input form-control form-control-sm custom-select" style="font-size: 0.8rem;">
                                    <option value="" disabled selected>Select an option</option>
                                    <option value="Monday - Saturday" <?= $row[0]->mondays_sundays == 'Monday - Saturday' ? 'selected' : '' ?>>Monday - Saturday</option>
                                </select>
                            </div>

                            <!-- Working Days Time -->
                            <div class="form-group col-md-6 col-12">
                                <label style="font-size: 0.8rem;">Working Days Time <span style="color: red">*</span></label>
                                <?= renderError($errors, 'mondays_sundays_time') ?>
                                <select name="mondays_sundays_time" id="mondays_sundays_time" class="line-input form-control form-control-sm custom-select" style="font-size: 0.8rem;">
                                    <option value="" disabled selected>Select an option</option>
                                    <option value="08:30 - 17:30" <?= $row[0]->mondays_sundays_time == '08:30 - 17:30' ? 'selected' : '' ?>>08:30 - 17:30</option>
                                </select>
                            </div>

                            <!-- Weekends -->
                            <div class="form-group col-md-6 col-12">
                                <label style="font-size: 0.8rem;">Weekends <span style="color: red">*</span></label>
                                <?= renderError($errors, 'sundays') ?>
                                <select name="sundays" id="sundays" class="line-input form-control form-control-sm custom-select" style="font-size: 0.8rem;">
                                    <option value="" disabled selected>Select an option</option>
                                    <option value="Sundays" <?= $row[0]->sundays == 'Sundays' ? 'selected' : '' ?>>Sundays</option>
                                </select>
                            </div>

                            <!-- Weekends Time -->
                            <div class="form-group col-md-6 col-12">
                                <label style="font-size: 0.8rem;">Weekends Time <span style="color: red">*</span></label>
                                <?= renderError($errors, 'sundays_time') ?>
                                <select name="sundays_time" id="sundays_time" class="line-input form-control form-control-sm custom-select" style="font-size: 0.8rem;">
                                    <option value="" disabled selected>Select an option</option>
                                    <option value="11:00 - 16:00" <?= $row[0]->sundays_time == '11:00 - 16:00' ? 'selected' : '' ?>>11:00 - 16:00</option>
                                    <option value="Closed" <?= $row[0]->sundays_time == 'Closed' ? 'selected' : '' ?>>Closed</option>
                                </select>
                            </div>
                        </div>

                        <div class="btn-container">
                            <button type="submit" class="btn btn-secondary" style="font-size: 0.8rem;">Update Opening Hours</button>
                            <a href="<?= ROOT ?>/openingHours" class="btn btn-secondary" style="font-size: 0.8rem;">Back</a>
                        </div>
                        <hr class="separator">
                    </form>
                <?php endif; ?>
            </div>
        </div>


        <!-- ✅ JavaScript Validation -->
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const fields = [
                    "public_holidays",
                    "public_holidays_time",
                    "mondays_sundays",
                    "mondays_sundays_time",
                    "sundays",
                    "sundays_time"
                ];

                window.validateForm = function () {
                    let isValid = true;

                    fields.forEach(id => {
                        const field = document.getElementById(id);
                        const value = field.value.trim();

                        // Remove any existing JS error message
                        const existingError = document.getElementById(`${id}-error-js`);
                        if (existingError) existingError.remove();

                        if (!value || field.selectedIndex === 0) {
                            isValid = false;

                            const error = document.createElement("div");
                            error.id = `${id}-error-js`;
                            error.className = "text-danger";
                            error.style.fontSize = "0.8rem";
                            error.textContent = "This field is required.";
                            field.parentNode.appendChild(error);
                        }
                    });

                    return isValid;
                };
            });
        </script>

<?php $this->view('includes/admin_footer'); ?>
