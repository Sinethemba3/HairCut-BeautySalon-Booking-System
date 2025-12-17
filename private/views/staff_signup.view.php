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
                                    <li><a href="<?=ROOT?>/dashboard">Home</a></li>
                                    <li><a href="javascript:void(0)">Pages</a></li>
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

    <!-- ...:::: Start Account Dashboard Section:::... -->
    <div class="account-dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#account-details" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">Account details</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                        <div class="tab-pane fade show active" id="account-details">
                            <h3>Account details </h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form onsubmit="validate(event, this)" method="post" action="" enctype="multipart/form-data">
                                            <p>Already have an account? <a href="<?=ROOT?>/login">Log in instead!</a></p>
                                            <label>
                                                <img src="<?=ROOT?>/images/dp.png" class="col-md-12 img-fluid shadow-lg p-3 mb-5 bg-body rounded-circle" style="cursor: pointer; width: 110px; height: 100px;" >
                                                <input style="display: none;" onchange="display_image(this, this.files[0])" type="file" name="image"  class="add_product_6">
                                                <script>
                                                    
                                                    function display_image(element, file)
                                                    {
                                                        let allowed = ['jpeg','jpg','png','webp','gif'];
                                                        let ext = file.name.split(".").pop();

                                                        if(allowed.includes(ext.toLowerCase()))
                                                        {
                                                            let img = element.parentNode.querySelector("img");
                                                            img.src = URL.createObjectURL(file);

                                                            image_added = true;
                                                        }else{

                                                            alert("Only image of this type allowed: "+ allowed.toString());
                                                            image_added = false;
                                                        }
                                                    }

                                                </script>
                                            </label>

                                            <div class="row input-radio">
                                                <div class="default-form-box mb-20">
                                                    <label>Gender</label>
                                                    <?php if(!empty($errors['gender'])) : ?>
                                                        <div class="text-danger">
                                                            <?=$errors['gender']?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <span class="custom-radio">
                                                        <input type="radio" value="Male" name="gender"> Male
                                                    </span>
                                                    <span class="custom-radio">
                                                        <input type="radio" value="Female" name="gender"> Female
                                                    </span>
                                                </div> 
                                                <div class="default-form-box mb-20">
                                                    <label>Role</label>
                                                    <?php if(!empty($errors['role'])) : ?>
                                                        <div class="text-danger">
                                                            <?=$errors['role']?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <span class="custom-radio">
                                                        <input type="radio" value="Staff" name="role"> Staff
                                                    </span>
                                                </div> 
                                            </div> 

                                            <br class="clearfix">

                                            <div class="default-form-box pb-3 mb-20">
                                                <label for="occupation" style="font-size: 0.8rem;">Occupation/ Department</label>
                                                <select value="<?=get_var('occupation')?>" class="country_option nice-select wide form-control line-input" name="occupation" id="occupation" style="font-size: 0.8rem;" required>
                                                    <option  <?=get_select('occupation', 'Beauty')?> value="Beauty">Beauty</option>
                                                    <option  <?=get_select('occupation', 'Hair')?> value="Hair">Hair</option>
                                                </select>
                                            </div>
                                            <br><br>
                                            <div class="default-form-box pb-3 mb-20">
                                                <label for="branch" style="font-size: 0.8rem;">Branch</label>
                                                <select value="<?=get_var('branch')?>" class="country_option nice-select wide form-control line-input" name="branch" id="branch" style="font-size: 0.8rem;" required>
                                                    <option  <?=get_select('branch', 'East London')?> value="East London">East London</option>
                                                    <option  <?=get_select('branch', 'Mthatha')?> value="Mthatha">Mthatha</option>
                                                </select>
                                            </div>
                                            <br><br>
                                            <div class="default-form-box mb-20">
                                                <label style="font-size: 0.8rem;">First Name</label>
                                                <?php if(!empty($errors['name'])) : ?>
                                                    <div class="text-danger">
                                                        <?=$errors['name']?>
                                                    </div>
                                                <?php endif; ?>
                                                <input class="form-control line-input" value="<?=get_var('name')?>" type="text" name="name" style="font-size: 0.8rem;">
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label style="font-size: 0.8rem;">Last Name</label>
                                                <?php if(!empty($errors['surname'])) : ?>
                                                    <div class="text-danger">
                                                        <?=$errors['surname']?>
                                                    </div>
                                                <?php endif; ?>
                                                <input class="form-control line-input" value="<?=get_var('surname')?>" type="text" name="surname" style="font-size: 0.8rem;">
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label style="font-size: 0.8rem;">Email</label>
                                                <?php if(!empty($errors['email'])) : ?>
                                                    <div class="text-danger">
                                                        <?=$errors['email']?>
                                                    </div>
                                                <?php endif; ?>
                                                <input class="form-control line-input" value="<?=get_var('email')?>" type="email" name="email" style="font-size: 0.8rem;">
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label style="font-size: 0.8rem;">Password</label>
                                                <?php if(!empty($errors['password'])) : ?>
                                                    <div class="text-danger">
                                                        <?=$errors['password']?>
                                                    </div>
                                                <?php endif; ?>
                                                <input class="form-control line-input" value="<?=get_var('password')?>" type="password" name="password" style="font-size: 0.8rem;">
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label style="font-size: 0.8rem;">Confirm Password</label>
                                                <?php if(!empty($errors['password2'])) : ?>
                                                    <div class="text-danger">
                                                        <?=$errors['password2']?>
                                                    </div>
                                                <?php endif; ?>
                                                <input class="form-control line-input"value="<?=get_var('password2')?>" type="password" name="password2" style="font-size: 0.8rem;">
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label style="font-size: 0.8rem;">Birthdate</label>
                                                <?php if(!empty($errors['birthday'])) : ?>
                                                    <div class="text-danger">
                                                        <?=$errors['birthday']?>
                                                    </div>
                                                <?php endif; ?>
                                                <input class="form-control line-input"value="<?=get_var('birthday')?>" type="date" name="birthday" style="font-size: 0.8rem;">
                                            </div>
                                            <span class="example" style="font-size: 0.8rem;">
                                                (E.g.: 05/31/1970)
                                            </span>
                                            <div class="save_button mt-3">
                                                <button class="btn btn-md btn-black-default-hover" type="submit">Save</button>
                                            </div>
                                        </form>
                                        <script>
                                            var image_added = false;

                                            function validate(e,form)
                                            {
                                                e.preventDefault();

                                                if(!image_added){
                                                    alert("please add a valid image");
                                                    return;
                                                }

                                                form.submit();
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Account Dashboard Section:::... -->

    <!-- Start Footer Section -->
    <?php $this->view('includes/footer'); ?>
    <!-- End Footer Section -->
</body>

</html>