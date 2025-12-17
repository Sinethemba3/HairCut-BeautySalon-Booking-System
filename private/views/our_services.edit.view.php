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
                                <form  onsubmit="validate(event, this)"method="post" id="frmContactus">
                                    <div class="text-center" >
                                        <label>
                                            <?php $image =  get_image($row[0]->image); ?>
                                            <img src="<?=$image?>" class="col-md-12 img-fluid shadow-lg p-3 mb-5 bg-body rounded-circle" style="cursor: pointer; width: 110px; height: 100px;" >
                                            <input type="file" name="image" onchange="display_image(this, this.files[0])" style="display: none;">
                                            <script>
                                                
                                                function display_image(element, file)
                                                {
                                                    let allowed = ['jpeg', 'jpg', 'png', 'webp', 'gif', 'png', 'svg', 'file'];
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

                                    <div class="mt-sm-0 mt-3 text-sm-end">
                                        <input type="hidden" name="id" value="">
                                        <div class="form-group">
                                            <label for="contact-name">Service name</label>
                                            <input type="text" value="<?=get_var('services', $row[0]->services)?>" name="services" class="line-input form-control col-md-4" placeholder="Email from" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit" data-dismiss="modal">Update</button>
                                            <a href="<?=ROOT?>/our_services/<?=$row[0]->user_id?>">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            </a>
                                        </div>
                                    </div> 
                                </form>
                                
                                <?php endif; ?>
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
            <!-- End of Main Content -->
        </div>
        
<!-- footer & mobile footer -->
<?php $this->view('includes/admin_footer'); ?>
<!-- footer & mobile footer -->
