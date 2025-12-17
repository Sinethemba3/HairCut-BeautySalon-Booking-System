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
                        <h3 class="breadcrumb-title">Login</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?=ROOT?>/">Home</a></li>
                                    <li><a href="<?=ROOT?>/">Shop</a></li>
                                    <li class="active" aria-current="page">Login</li>
                                </ul>
                            </nav>
                        </div>
                        <!-- </?php if(!empty($errors)) : ?>
                            <div class="col-md alert alert-warning text-center alert-dismissible fade show m-3 p-1">
                               <strong>Error - </strong> Please fix the errors below!!
                            </div>
                        </?php endif; ?> -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->
    
   <!-- ...:::: Start Customer Login Section :::... -->
    <div class="customer-login">
        <div class="container d-flex align-items-center justify-content-center">
            <div class="row justify-content-center w-100">
                <div class="col-lg-5 col-md-8 col-sm-10">
                    <div class="account_form shadow-lg p-4 border-0 rounded" data-aos="fade-up" data-aos-delay="0">
                        <form method="post" action="">
                            <!-- Custom Alert Container (bottom right) -->
                            <div id="custom-alert-container" style="
                                position: fixed;
                                bottom: 20px;
                                right: 20px;
                                z-index: 9999;
                                display: flex;
                                flex-direction: column;
                                gap: 10px;
                                align-items: flex-end;
                            "></div>

                            <div class="text-center mb-4">
                                <?php 
                                    if (!empty($uniqueSalons)):
                                        foreach ($uniqueSalons as $row):
                                            $image =  fetch_images($row->image ?? '');
                                ?>
                                    <a href="<?=ROOT?>/home">
                                        <img src="<?= $image ?>" height="50" width="50" alt="">
                                    </a>
                                <?php endforeach; endif;?>
                                <h3 class="auth-title mt-3" style="color: #333;">Log In</h3>
                                <p class="auth-subtitle text-muted">Enter your credentials to access your account.</p>
                            </div>

                            <!-- Email Field -->
                            <div class="default-form-box">
                                <input 
                                    value="<?= get_var('email') ?>" 
                                    type="text" 
                                    name="email" 
                                    id="login-email" 
                                    class="form-control line-input" 
                                    autocomplete="email" 
                                    placeholder="Email"
                                >
                            </div>

                            <!-- Password Field with Toggle -->
                            <div class="default-form-box position-relative">
                                <input 
                                    value="<?= get_var('password') ?>" 
                                    type="password" 
                                    name="password" 
                                    id="login-password" 
                                    class="form-control line-input" 
                                    autocomplete="password" 
                                    placeholder="Password"
                                >

                                <span 
                                    id="toggle-password" 
                                    style="position: absolute; top: 15px; right: 10px; cursor: pointer; user-select:none;"
                                    >
                                    👁️
                                </span>
                            </div>

                            <!-- Remember Me & Submit -->
                            <div class="login_submit ">
                                <button class="btn btn-md btn-block btn-black-default-hover mb-4" type="submit">Login</button>
                                
                                <label class="checkbox-default mb-4" for="remember">
                                    <input type="checkbox" id="remember" name="remember">
                                    <span>Remember me</span>
                                </label>
                            </div>

                            <hr class="clear-fix">

                            <div class="text-center mt-4">
                                <p class="text-muted">Don't have an account? <a href="<?= ROOT ?>/signup" style="color: #2563eb;">Sign up</a>.</p>
                                <p><a href="<?= ROOT ?>/forgot_password" style="color: #2563eb;">Forgot password?</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->

    <style>
        /* Custom Alert Styles for toast bottom-right */
        .custom-alert {
            background-color: #f8d7da;
            border: 1px solid #f5c2c7;
            color: #842029; 
            padding: 15px 20px;
            border-radius: 5px;
            min-width: 280px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            font-weight: 600;
            cursor: pointer;

            /* Start hidden for fade-in */
            opacity: 0;
            transform: translateY(20px);
            animation: slideIn 0.5s forwards;
        }
        .custom-alert.hide {
            animation: slideOut 0.5s forwards;
        }

        @keyframes slideIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes slideOut {
            to {
                opacity: 0;
                transform: translateY(20px);
            }
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const emailField = document.getElementById("login-email");
            const passwordField = document.getElementById("login-password");
            const rememberCheckbox = document.getElementById("remember");

            // Load saved credentials
            if (localStorage.getItem("rememberMe") === "true") {
                emailField.value = localStorage.getItem("email") || "";
                passwordField.value = localStorage.getItem("password") || "";
                rememberCheckbox.checked = true;
            }

            // Save or clear on submit, but only if no validation error
            document.querySelector("form").addEventListener("submit", function (e) {
                // Basic client-side validation: prevent submission & show toast if empty
                if (!emailField.value.trim()) {
                    e.preventDefault();
                    showAlert("Please enter your username or email.");
                    return;
                }
                if (!passwordField.value) {
                    e.preventDefault();
                    showAlert("Please enter your password.");
                    return;
                }

                // Save to localStorage if "Remember me" checked
                if (rememberCheckbox.checked) {
                    localStorage.setItem("email", emailField.value);
                    localStorage.setItem("password", passwordField.value);
                    localStorage.setItem("rememberMe", "true");
                } else {
                    localStorage.removeItem("email");
                    localStorage.removeItem("password");
                    localStorage.setItem("rememberMe", "false");
                }
            });

            // Show/hide password toggle
            document.getElementById("toggle-password").addEventListener("click", function () {
                const passInput = document.getElementById("login-password");
                if (passInput.type === "password") {
                    passInput.type = "text";
                    this.textContent = "🙈";
                } else {
                    passInput.type = "password";
                    this.textContent = "👁️";
                }
            });

            // If there are PHP errors, show them as custom alerts
            <?php if (!empty($errors['email'])): ?>
                showAlert(`<?= addslashes($errors['email']) ?>`);
            <?php endif; ?>

            <?php if (!empty($errors['password'])): ?>
                showAlert(`<?= addslashes($errors['password']) ?>`);
            <?php endif; ?>

            // Function to create and show alerts
            function showAlert(message) {
                const container = document.getElementById('custom-alert-container');
                const alert = document.createElement('div');
                alert.className = 'custom-alert';
                alert.textContent = message;

                // Click to dismiss immediately
                alert.addEventListener('click', () => {
                    alert.classList.add('hide');
                    setTimeout(() => alert.remove(), 500);
                });

                container.appendChild(alert);

                // Auto-dismiss after 4 seconds with fade out animation
                setTimeout(() => {
                    alert.classList.add('hide');
                    setTimeout(() => alert.remove(), 500);
                }, 4000);
            }
        });
    </script>

<!-- Start Footer Section -->
<?php $this->view('includes/footer'); ?>