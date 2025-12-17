<?php $this->view('includes/admin_header'); ?>
<!-- header & mobile header -->

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- header & mobile header -->
        <?php $this->view('includes/headers'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="card col-md-12 shadow-lg p-3 mb-5 bg-body rounded">
                <div class="container col-md">
                    <div class="row">
                        <?php if ($row): ?>
                            <div class="col-sm-12">
                                <form  onsubmit="validate(event, this)"method="post" id="frmContactus" enctype="multipart/form-data">
                                    <div class="text-center" >
                                        <label>
                                            <?php $image =  get_image($row[0]->image, $row[0]->gender); ?>
                                            <img src="<?=$image?>" class="col-md-12 img-fluid shadow-lg p-3 mb-5 bg-body rounded-circle" style="cursor: pointer; width: 110px; height: 100px;" >
                                            <input type="file" name="image" onchange="display_image(this, this.files[0])" style="display: none;">
                                            <script>
                                                
                                                function display_image(element, file)
                                                {
                                                    let allowed = ['jpeg', 'jpg', 'png', 'webp', 'gif', 'png'];
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
                                    </div>

                                    <div class="row ">
                                        <div class="form-group col-md-6">
                                            <label for="lname" style="font-size: 0.8rem;"> Name</label>
                                            <input style="font-size: 0.8rem;" class="line-input form-control" type="text" name="name" id="name" value="<?=get_var('name', $row[0]->name)?>" placeholder="Enter Name">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="lname" style="font-size: 0.8rem;"> Surname</label>
                                            <input style="font-size: 0.8rem;" class="line-input form-control" type="text" name="surname" id="surname" value="<?=get_var('surname', $row[0]->surname)?>" placeholder="Enter Surname">
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="form-group col-md-6">
                                            <label for="lname" style="font-size: 0.8rem;"> Email</label>
                                            <input style="font-size: 0.8rem;" class="line-input form-control" type="email" name="email" id="email" value="<?=get_var('email', $row[0]->email)?>" placeholder="Enter Email">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="lname" style="font-size: 0.8rem;"> Gender</label>
                                            <input style="font-size: 0.8rem;" class="line-input form-control" type="text" name="gender" id="gender" value="<?=get_var('gender', $row[0]->gender)?>" placeholder="Enter password">
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="form-group col-md-6">
                                            <label for="lname" style="font-size: 0.8rem;"> User type</label>
                                            <input style="font-size: 0.8rem;" class="line-input form-control" type="text" name="user_type" id="user_type" value="<?=ucwords(str_replace("_", " ", $row[0]->role))?>" placeholder="Enter Email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="lname" style="font-size: 0.8rem;"> Birthday</label>
                                            <input style="font-size: 0.8rem;" class="line-input form-control" type="text" name="user_type" id="user_type" value="<?=get_var('birthday', $row[0]->birthday)?>" placeholder="Enter Email">
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="form-group col-md-6">
                                            <label for="lname" style="font-size: 0.8rem;"> Password</label>
                                            <input style="font-size: 0.8rem;" class="line-input form-control" type="password" name="password" id="password" value="" placeholder="Enter password">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="lname" style="font-size: 0.8rem;"> Confirm Password</label>
                                            <input style="font-size: 0.8rem;" class="line-input form-control" type="password" name="password2" id="password2" value="" placeholder="Confirm password">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit" data-dismiss="modal">Update</button>
                                        <a href="<?=ROOT?>/admins/<?=$row[0]->user_id?>">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        <?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
                    <!-- End of Main Content -->
                    
<!-- footer & mobile footer -->
<?php $this->view('includes/admin_footer'); ?>
<!-- footer & mobile footer -->