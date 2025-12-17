<?php $this->view('includes/bookings_header'); ?>
    <!-- End Footer Section -->

    <style>
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

        button {
            outline: none !important;
            box-shadow: none !important;
        }

        /* Underline-style input */
        .form-control.line-input {
            border: none !important;
            border-bottom: 2px solid #ccc !important;
            border-radius: 0 !important;
            box-shadow: none !important;
            outline: none !important;
            background-color: transparent !important;
            transition: border-color 0.3s ease-in-out !important;
        }

        .form-control.line-input:focus {
            border-bottom: 2px solid #007bff !important;
            background-color: transparent !important;
            box-shadow: none !important;
        }

        .form-label {
            font-weight: bold !important;
        }

        textarea.form-control.line-input {
            resize: vertical !important;
        }
    </style>
    <!-- header & mobile header -->

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper b-title">
            <div class="container log-in">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Signup</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <?php if (Auth::access('Supper_admin' || 'Admin')): ?>
                                        <li><a href="<?= ROOT ?>/dashboard">Dashboard</a></li>
                                    <?php else: ?>
                                        <li><a href="<?= ROOT ?>/">Home</a></li>
                                    <?php endif; ?>
                                        <li class="active" aria-current="page">Signup</li>
                                </ul>
                            </nav>
                        </div>
                        <?php if(!empty($errors)) : ?>
                            <div class="col-md alert alert-warning text-center alert-dismissible fade show m-3 p-1">
                               <strong>Error - </strong> Please fix the errors below!!
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <div class="account-dashboard">
        <div class="container d-flex align-items-center justify-content-center">
            <div class="row justify-content-center w-100">
                <div class="col-md-8">
                    <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                        <div class="tab-pane fade show active" id="account-details">
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form shadow-lg p-4 border-0 rounded">

                                        <?php if (!empty($errors)): ?>
                                            <div class="col-md alert alert-warning text-center alert-dismissible fade show m-3 p-1 msg">
                                                <strong>Error:</strong>
                                                <ul class="m-0 p-0" style="list-style: none;">
                                                    <?php foreach ($errors as $error): ?>
                                                        <li><?= esc($error) ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>

                                        <form onsubmit="validate(event, this)" method="post" enctype="multipart/form-data">
                                            <div class="text-center">
                                                <label>
                                                    <img src="<?=ROOT?>/images/dp.png" class="col-md-12 img-fluid shadow-lg p-3 mb-5 bg-body rounded-circle" style="cursor: pointer; width: 100px; height: 100px;">
                                                    <input style="display: none;" onchange="display_image(this, this.files[0])" type="file" name="image" class="add_product_6">
                                                </label>
                                            </div>

                                            <hr class="pt-1">

                                            <div class="input-radio pt-3">
                                                <div class="default-form-box mb-20">
                                                    <label>Gender</label>
                                                    <span class="custom-radio">
                                                        <input type="radio" value="Male" name="gender"> Male
                                                    </span>
                                                    <span class="custom-radio">
                                                        <input 
                                                            type="radio" 
                                                            value="Female" 
                                                            name="gender"
                                                        > 
                                                        Female
                                                    </span>

                                                    <?php if (Auth::access('Supper_admin')) : ?>
                                                        <label class="pt-4">Role</label>
                                                        <span class="custom-radio">
                                                            <input 
                                                                type="radio" 
                                                                value="Supper_admin"
                                                                name="role"
                                                            > 
                                                            Super Admin
                                                        </span>
                                                        <span class="custom-radio">
                                                            <input 
                                                                type="radio" 
                                                                value="Admin" 
                                                                name="role"
                                                            > 
                                                            Admin
                                                        </span>

                                                    <?php elseif (Auth::access('Admin')): ?>
                                                        <label class="pt-4">Role</label>
                                                        <span class="custom-radio">
                                                            <input 
                                                                type="radio" 
                                                                value="Admin" 
                                                                name="role"
                                                            > 
                                                            Admin
                                                        </span>

                                                    <?php else: ?>
                                                        <!-- Hide the customer radio but still select it -->
                                                        <input 
                                                            type="hidden" 
                                                            value="Customer" 
                                                            name="role" 
                                                            checked
                                                        >
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <br><hr class="pt-1">

                                            <div class="row">
                                                <div class="col-md-6 default-form-box mb-20">
                                                    <label>First Name</label>
                                                    <input 
                                                        value="<?=get_var('name')?>" type="text" 
                                                        name="name" 
                                                        id="name" 
                                                        class="form-control line-input"
                                                    >
                                                </div>
    
                                                <div class="col-md-6 default-form-box mb-20">
                                                    <label>Last Name</label>
                                                    <input 
                                                        value="<?=get_var('surname')?>" type="text" 
                                                        id="surname" 
                                                        name="surname" 
                                                        class="form-control line-input"
                                                    >
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 default-form-box mb-20">
                                                    <label>Email</label>
                                                    <input 
                                                        value="<?=get_var('email')?>" type="email" 
                                                        name="email" 
                                                        id="email" 
                                                        class="form-control line-input"
                                                    >
                                                </div>

                                                <div class="col-md-6 default-form-box mb-20">
                                                    <label>Birthdate</label>
                                                    <input 
                                                        value="<?=get_var('birthday')?>" type="date" 
                                                        name="birthday" 
                                                        class="form-control line-input"
                                                    >
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 default-form-box mb-20" style="position: relative;">
                                                    <label>Password</label>
                                                    <input 
                                                        value="<?=get_var('password')?>" type="password" 
                                                        name="password" 
                                                        id="password" 
                                                        class="form-control line-input"
                                                        style="padding-right: 30px;"
                                                    >

                                                    <span 
                                                        class="toggle-password" 
                                                        style="position: absolute; top: 35px; right: 20px; cursor: pointer; user-select:none;"
                                                    >
                                                        👁️
                                                    </span>
                                                </div>

                                                <div class="col-md-6 default-form-box mb-20" style="position: relative;">
                                                    <label>Confirm Password</label>
                                                    <input 
                                                        value="<?=get_var('password2')?>" type="password" 
                                                        name="password2" 
                                                        id="password2" 
                                                        class="form-control line-input"
                                                        style="padding-right: 30px;"
                                                    >

                                                    <span 
                                                        class="toggle-password" 
                                                        style="position: absolute; top: 35px; right: 20px; cursor: pointer; user-select:none;"
                                                    >
                                                        👁️
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="save_button mt-3">
                                                <button class="btn btn-md btn-block btn-black-default-hover" type="submit">Save</button>
                                            </div>

                                            <p class="text-center pt-4">Already have an account? <a href="<?=ROOT?>/login">Log in instead!</a></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Message Box -->
    <div id="toast" style="
        display:none;
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: #ff4d4d;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        z-index: 9999;
        font-weight: bold;">
    </div>

    <script>
        let image_added = false;

        function showToast(message) {
            const toast = document.getElementById("toast");
            toast.textContent = message;
            toast.style.display = "block";
            setTimeout(() => toast.style.display = "none", 3000);
        }

        function display_image(element, file) {
            let allowed = ['jpeg','jpg','png','webp','gif'];
            let ext = file.name.split(".").pop();

            if (allowed.includes(ext.toLowerCase())) {
                let img = element.parentNode.querySelector("img");
                img.src = URL.createObjectURL(file);
                image_added = true;
            } else {
                showToast("Only image files allowed: " + allowed.join(", "));
                image_added = false;
            }
        }

        function validate(e, form) {
            e.preventDefault();

            const name = document.getElementById("name").value.trim();
            const surname = document.getElementById("surname").value.trim();
            const email = document.getElementById("email").value.trim();
            const pw = document.getElementById("password").value;
            const pw2 = document.getElementById("password2").value;

            if (!image_added) {
                showToast("Please upload a valid image.");
                return;
            }

            if (pw !== pw2) {
                showToast("Passwords do not match.");
                return;
            }

            if (!name || !surname || !email) {
                showToast("All Fields are required.");
                return;
            }

            localStorage.setItem("name", name);
            localStorage.setItem("email", email);

            form.submit();
        }

        document.querySelectorAll('.toggle-password').forEach(function(el) {
            el.addEventListener('click', function() {
                // Find the related input field before this span
                const input = this.previousElementSibling;
                if (input.type === "password") {
                    input.type = "text";
                    this.textContent = '🙈';  // change icon when showing password
                } else {
                    input.type = "password";
                    this.textContent = '👁️';  // revert icon
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const nameInput = document.getElementById("name");
            const emailInput = document.getElementById("email");
            const pw1 = document.getElementById("password");
            const pw2 = document.getElementById("password2");

            if (localStorage.getItem("name")) {
                nameInput.value = localStorage.getItem("name");
            }
            if (localStorage.getItem("email")) {
                emailInput.value = localStorage.getItem("email");
            }

            pw2.addEventListener("input", function () {
                if (pw1.value !== pw2.value) {
                    pw2.style.border = "1px solid red";
                } else {
                    pw2.style.border = "1px solid green";
                }
            });
        });
    </script>

<?php $this->view('includes/footer'); ?> 