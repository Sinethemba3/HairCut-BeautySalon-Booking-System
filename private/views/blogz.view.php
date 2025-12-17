<?php $this->view('includes/admin_header'); ?>
<!-- header & mobile header -->

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

                <!-- header & mobile header -->
                <?php $this->view('includes/headers'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Blog</h6>
                            <a href="<?=ROOT?>/blogz/add">
                                <button class="btn btn-sm btn-info float-right">Add Blog Content</button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="font-size: 0.8rem;">
                                            <th>Video</th>
                                            <th>Blog name</th>
                                            <th>Uploaded by</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr style="font-size: 0.8rem;">
                                            <th>Video</th>
                                            <th>Blog name</th>
                                            <th>Uploaded by</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php if(!empty($rows)):?>
									    <?php foreach($rows as $row):?>
                                        <tr style="font-size: 0.8rem;">
                                            <td>
                                                <video src="<?=$row->video; ?>" alt="contact-img" title="blog-video" class="me-2 rounded-circle me-3" height="40" width="40" autoplay loop muted></video>
                                                <p class="m-0 d-inline-block align-middle font-16">
                                                    <span class="text-warning fa fa-star" style="font-size: 10px;"></span>
                                                    <span class="text-warning fa fa-star" style="font-size: 10px;"></span>
                                                    <span class="text-warning fa fa-star" style="font-size: 10px;"></span>
                                                    <span class="text-warning fa fa-star" style="font-size: 10px;"></span>
                                                    <span class="text-warning fa fa-star" style="font-size: 10px;"></span>
                                                </p>
                                            </td>
                                            <td><?=esc($row->blog_name)?></td>
                                            <td><?=esc($row->uploaded_by)?></td>
                                            <td><?=esc($row->description)?></td>
                                            <td><?=get_date($row->date)?></td>
                                            <td class="table-action">
                                                <a href="<?=ROOT?>/blogz/edit/<?=$row->id?>" class="action-icon"> <i class="fa fa-eye"></i></a> |
                                                <a href="<?=ROOT?>/blogz/delete/<?=$row->id?>" class="action-icon"> <i class="fa fa-trash text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; else:?>
                                            <tr class="text-danger">
                                                <td colspan="6" class="text-center">
                                                    Sorry, we couldn't find what you were looking for.
                                                </td>
                                            </tr>  
                                        <?php endif;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

<!-- footer & mobile footer -->
<?php $this->view('includes/admin_footer'); ?>
<!-- footer & mobile footer -->
