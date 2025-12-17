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
                        <div class="container">
                            <?php if ($row): ?>
                                <h6 class="text-uppercase text-dark">User Message:</h6>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="hidden" name="id" value="">
                                    <div class="form-group">
                                        <label for="contact-name">Name</label>
                                        <input type="text" value="<?=get_var('name', $row[0]->name)?>" class="form-control" placeholder="Email from" required>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="contact-message">Message</label>
                                        <textarea class="form-control" rows="4" placeholder="Compose email" required><?=get_var('message', $row[0]->message)?></textarea>
                                    </div>

                                    <div class="modal-footer">
                                    </div>
                                </div> 
                            </div>
                            
                            <h6 class="text-uppercase">Admin Reply:</h6>
                            <div class="row">
                                <div class="col-sm-6">
                                    <form method="post" id="frmContactus">
                                        <input type="hidden" name="id" value="">
                                        <div class="form-group">
                                            <label for="contact-email text-dark">User Email</label>
                                            <input type="email" value="<?=get_var('email', $row[0]->email)?>" name="email" class="form-control" placeholder="Email from" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="contact-message">Your Message</label>
                                            <textarea class="form-control" name="reply" rows="4" placeholder="Compose email" required></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="submit" data-dismiss="modal">Reply</button>
                                            <a href="<?=ROOT?>/messages">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            </a>
                                        </div>

                                        <!-- hidden values -->
                                        <input type="hidden" value="<?=$row[0]->name?>" name="name">
                                            
                                        <input type="hidden" value="<?=$row[0]->subject?>" name="subject">
                                    
                                        <input type="hidden" value="<?=$row[0]->message?>" name="message">
                                        <!-- hidden values -->
                                    </form>
                                </div> 
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            
<!-- footer & mobile footer -->
<?php $this->view('includes/admin_footer'); ?>
<!-- footer & mobile footer -->
