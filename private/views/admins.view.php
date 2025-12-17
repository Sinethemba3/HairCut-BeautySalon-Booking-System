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
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Staff</h6>
                            <a href="<?=ROOT?>/signup">
                                <button class="btn btn-sm btn-info float-right">Add Staff</button>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="font-size: 0.8rem;">
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Role</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr style="font-size: 0.8rem;">
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Role</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php if(!empty($rows)):?>
									    <?php foreach($rows as $row):?>
                                        <tr style="font-size: 0.8rem;">
                                            <td>
                                                <img src="<?= fetch_image($row->image) ?>" alt="contact-img" title="contact-img" class="me-2 rounded-circle me-3" height="40" width="40">
                                            </td>
                                            <td><?=esc($row->name)?></td>
                                            <td><?=esc($row->surname)?></td>
                                            <td><?=esc($row->email)?></td>
                                            <td><?=esc($row->gender)?></td>
                                            <td><?=ucwords(str_replace("_", " ", $row->role))?></td>
                                            <td><?=get_date($row->date)?></td>
                                            <td class="font-w300">
                                                <a href="<?=ROOT?>/admins/edit/<?=$row->id?>" title="click to edit"><i class="fas fa-eye" aria-hidden="true"></i></a> |
                                                <a href="<?=ROOT?>/admins/delete/<?=$row->id?>" class="action-icon"> <i class="fa fa-trash text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
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
