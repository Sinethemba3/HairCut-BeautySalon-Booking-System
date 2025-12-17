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
                        <form onsubmit="validate(event, this)" method="post" enctype="multipart/form-data" class="add_product_1" >
                            <h3 class="fw-400 text-center pb-2"> 
                                Add Blog Content <i class=" fa fa-video text-info rounded-circle"></i>
                            </h3>
                            <?php if(!empty($errors)) : ?>
                                <div class="col-md alert alert-warning text-center alert-dismissible fade show m-3 p-1 msg">
                                    <strong>Error - </strong> Please fix the errors below!!
                                </div>
                            <?php endif; ?>

                            <div class="text-center" >
                                <label>
                                    <?php if(!empty($errors['video'])):?>
                                        <div style="color: red;"><?=$errors['video']?></div>
                                    <?php endif;?>
                                    <video src="<?=ROOT?>/assets/images/blog/vid2.mp4" class="col-md-12 img-fluid shadow-lg p-3 mb-5 bg-body rounded-circle" style="cursor: pointer; width: 110px; height: 110px;" autoplay loop muted></video>
                                    <input type="file" name="video" style="display: none;" onchange="display_image(this, this.files[0])" class="add_product_6">
                                    <script>
                                        function display_image(element, file)
                                        {
                                            let allowed = ['mp4'];
                                            let ext = file.name.split(".").pop();

                                            if(allowed.includes(ext.toLowerCase()))
                                            {
                                                let video = element.parentNode.querySelector("video");
                                                video.src = URL.createObjectURL(file);

                                                image_added = true;
                                            }else{

                                                alert("Only video of this type allowed: "+ allowed.toString());
                                                image_added = false;
                                            }
                                        }
                                    </script>
                                </label>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="" style="font-size: 0.8rem;" >Blog Name:</label>
                                    <?php if(!empty($errors['blog_name'])):?>
                                        <div style="color: red;"><?=$errors['blog_name']?></div>
                                    <?php endif;?>
                                    <input value="<?=get_var('blog_name')?>" placeholder="" type="text" name="blog_name" class="form-control" style="font-size: 0.8rem;">
                                </div>
                                
                                <div class="form-group col-md">
                                    <label class="" style="font-size: 0.8rem;" >Description: </label>
                                    <?php if(!empty($errors['description'])):?>
                                        <div style="color: red;"><?=$errors['description']?></div>
                                    <?php endif;?>
                                    <textarea class="form-control form-control-sm" name="description" id="description" cols="30" rows="10" style="font-size: 0.8rem;"></textarea>
                                </div>
                            </div>

                            <div class="pb-4 pt-2">
                                <a href="<?=ROOT?>/blogz">
                                    <button type="button" class="btn btn-md btn-secondary" style="font-size: 0.8rem;" >Cancel</button>
                                </a>
                                <button type="submit" class="btn btn-md btn-primary" style="font-size: 0.8rem;" >Create</button>
                            </div>
                        </form>
                        <script>
                            
                            var image_added = false;

                            function validate(e,form)
                            {
                                e.preventDefault();

                                if(!image_added){
                                    alert("please add a valid video");
                                    return;
                                }

                                form.submit();
                            }

                        </script>
                    </div> 
                </div> 
            </div>   
            <!-- /.container-fluid -->
        </div>

<!-- footer & mobile footer -->
<?php $this->view('includes/admin_footer'); ?>
<!-- footer & mobile footer -->
