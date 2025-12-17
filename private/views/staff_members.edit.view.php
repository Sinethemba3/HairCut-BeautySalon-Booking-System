<?php $this->view('includes/admin_header'); ?>
<!-- header & mobile header -->
<link href="<?=ROOT?>/assets/css/icons.min.css" rel="stylesheet" type="text/css">
<link href="<?=ROOT?>/assets/css/validate.css" rel="stylesheet" type="text/css">

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
                            <form onsubmit="validate(event, this)" method="post" id="frmContactus" enctype="multipart/form-data"
                                class="needs-validation" novalidate="">
                                <div class="text-center">
                                    <label>
                                        <?php $image =  get_image($row[0]->image, $row[0]->gender); ?>
                                        <img src="<?=$image?>"
                                            class="col-md-12 img-fluid shadow-lg p-3 mb-5 bg-body rounded-circle"
                                            style="cursor: pointer; width: 110px; height: 100px;">
                                        <input type="file" name="image" onchange="display_image(this, this.files[0])"
                                            style="display: none;">
                                        <script>
                                        function display_image(element, file) {
                                            let allowed = ['jpeg', 'jpg', 'png', 'webp', 'gif', 'png'];
                                            let ext = file.name.split(".").pop();

                                            if (allowed.includes(ext.toLowerCase())) {
                                                let img = element.parentNode.querySelector("img");
                                                img.src = URL.createObjectURL(file);

                                                image_added = true;
                                            } else {

                                                alert("Only image of this type allowed: " + allowed.toString());
                                                image_added = false;
                                            }
                                        }
                                        </script>
                                    </label>
                                </div>

                                <div class="row ">
                                    <div class="form-group col-md-6">
                                        <label style="font-size: 0.8rem;" class="form-label" for="validationCustom01"> Name</label>
                                        <input style="font-size: 0.8rem;" class="line-input form-control" type="text" name="name" id="validationCustom01"
                                            value="<?=get_var('name', $row[0]->name)?>" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label style="font-size: 0.8rem;" class="form-label" for="validationCustom02"> Surname</label>
                                        <input style="font-size: 0.8rem;" class="line-input form-control" type="text" name="surname" id="validationCustom02"
                                            value="<?=get_var('surname', $row[0]->surname)?>" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="form-group col-md-6">
                                        <label style="font-size: 0.8rem;" class="form-label" for="validationCustom03"> Email</label>
                                        <input style="font-size: 0.8rem;" class="line-input form-control" type="email" name="email" id="validationCustom03"
                                            value="<?=get_var('email', $row[0]->email)?>" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label style="font-size: 0.8rem;" class="form-label" for="validationCustom04"> Gender</label>
                                        <input style="font-size: 0.8rem;" class="line-input form-control" type="text" name="gender" id="validationCustom04"
                                            value="<?=get_var('gender', $row[0]->gender)?>" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="form-group col-md-6">
                                        <label style="font-size: 0.8rem;" class="form-label" for="validationCustom05"> User type</label>
                                        <input style="font-size: 0.8rem;" class="line-input form-control" type="text" name="user_type" id="validationCustom05"
                                            value="<?=get_var('role', $row[0]->role)?>" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label style="font-size: 0.8rem;" class="form-label" for="validationCustom06"> Occupation</label>
                                        <input style="font-size: 0.8rem;" class="line-input form-control" type="text" name="occupation"
                                            id="validationCustom06"
                                            value="<?=get_var('occupation', $row[0]->occupation)?>" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="row ">
                                    <div class="form-group col-md-6">
                                        <label style="font-size: 0.8rem;" class="form-label" for=""> Password</label>
                                        <input class="line-input form-control" type="password" name="password" id="" value="" required>
                                        <div class="valid-feedback">
                                            Invalid
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label style="font-size: 0.8rem;" class="form-label" for=""> Password2</label>
                                        <input class="line-input form-control" type="password" name="password2" id="" value="" required>
                                        <div class="valid-feedback">
                                            Invalid
                                        </div>
                                    </div>
                                </div> -->

                                <div class="row ">
                                    <div class="form-group col-md-6">
                                        <label style="font-size: 0.8rem;" class="form-label" for="validationCustom09"> Birthday</label>
                                        <input style="font-size: 0.8rem;" class="line-input form-control" type="text" name="birthday" id="validationCustom09"
                                            value="<?=get_var('birthday', $row[0]->birthday)?>" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label style="font-size: 0.8rem;" class="form-label" for="validationCustom10"> Branch</label>
                                        <input style="font-size: 0.8rem;" class="line-input form-control" type="text" name="branch" id="validationCustom10"
                                            value="<?=get_var('branch', $row[0]->branch)?>" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="pt-1 pb-1 text-dark text-uppercase">
                                    <p style="font-size: 0.8rem;">working/off days</p>
                                    <div class="range range-lg-center">
                                        <div class="cell-lg-10">
                                            <div class="range range-sm-center range-md-left range-30">
                                                <div class="cell-sm-8 cell-md-6">
                                                    <div class="thumbnail-option">
                                                        <div class="thumbnail-option-body">
                                                            <!-- ...::::Start Size2 row:::... -->
                                                            <div class="row pb-4">
                                                                <div class="col-lg-12 pt-2 pb-0"
                                                                    style="display: flex; margin: 0; font-size: 0.8rem;">
                                                                    <?php if ($row[0]->monday == 'mo') { ?>
                                                                    <div class="p-1">
                                                                        <a href="javascript:void(0);">
                                                                            <span
                                                                                style="text-align:center; font-size: 0.8rem; background: #efefef; padding: 14px;"><?=$row[0]->monday ?></span>
                                                                        </a>
                                                                    </div>
                                                                    <?php } elseif($row[0]->monday == 'off') { ?>
                                                                    <div class="p-1">
                                                                        <a href="javascript:void(0);">
                                                                            <span
                                                                                style="text-align:center; font-size: 0.8rem; background: #ffbc00; padding: 14px;"><?=$row[0]->monday ?></span>
                                                                        </a>
                                                                    </div>
                                                                    <?php } else { ?>

                                                                    <?php } ?>


                                                                    <?php if ($row[0]->tuesday == 'tu') { ?>
                                                                    <div class="p-1">
                                                                        <a href="javascript:void(0);">
                                                                            <span
                                                                                style="text-align:center; font-size: 0.8rem; background: #efefef; padding: 14px;"><?=$row[0]->tuesday ?></span>
                                                                        </a>
                                                                    </div>
                                                                    <?php } elseif($row[0]->tuesday == 'off') { ?>
                                                                    <div class="p-1">
                                                                        <a href="javascript:void(0);">
                                                                            <span
                                                                                style="text-align:center; font-size: 0.8rem; background: #ffbc00; padding: 14px;"><?=$row[0]->tuesday ?></span>
                                                                        </a>
                                                                    </div>
                                                                    <?php } else { ?>

                                                                    <?php } ?>

                                                                    <?php if ($row[0]->wednesday == 'we') { ?>
                                                                    <div class="p-1">
                                                                        <a href="javascript:void(0);">
                                                                            <span
                                                                                style="text-align:center; font-size: 0.8rem; background: #efefef; padding: 14px;"><?=$row[0]->wednesday ?></span>
                                                                        </a>
                                                                    </div>
                                                                    <?php } elseif($row[0]->wednesday == 'off') { ?>
                                                                    <div class="p-1">
                                                                        <a href="javascript:void(0);">
                                                                            <span
                                                                                style="text-align:center; font-size: 0.8rem; background: #ffbc00; padding: 14px;"><?=$row[0]->wednesday ?></span>
                                                                        </a>
                                                                    </div>
                                                                    <?php } else { ?>

                                                                    <?php } ?>

                                                                    <?php if ($row[0]->thursday == 'th') { ?>
                                                                    <div class="p-1">
                                                                        <a href="javascript:void(0);">
                                                                            <span
                                                                                style="text-align:center; font-size: 0.8rem; background: #efefef; padding: 14px;"><?=$row[0]->thursday ?></span>
                                                                        </a>
                                                                    </div>
                                                                    <?php } elseif($row[0]->thursday == 'off') { ?>
                                                                    <div class="p-1">
                                                                        <a href="javascript:void(0);">
                                                                            <span
                                                                                style="text-align:center; font-size: 0.8rem; background: #ffbc00; padding: 14px;"><?=$row[0]->thursday ?></span>
                                                                        </a>
                                                                    </div>
                                                                    <?php } else { ?>

                                                                    <?php } ?>

                                                                    <?php if ($row[0]->friday == 'fr') { ?>
                                                                    <div class="p-1">
                                                                        <a href="javascript:void(0);">
                                                                            <span
                                                                                style="text-align:center; font-size: 0.8rem; background: #efefef; padding: 14px;"><?=$row[0]->friday ?></span>
                                                                        </a>
                                                                    </div>
                                                                    <?php } elseif($row[0]->friday == 'off') { ?>
                                                                    <div class="p-1">
                                                                        <a href="javascript:void(0);">
                                                                            <span
                                                                                style="text-align:center; font-size: 0.8rem; background: #ffbc00; padding: 14px;"><?=$row[0]->friday ?></span>
                                                                        </a>
                                                                    </div>
                                                                    <?php } else { ?>

                                                                    <?php } ?>

                                                                    <?php if ($row[0]->saturday == 'st') { ?>
                                                                    <div class="p-1">
                                                                        <a href="javascript:void(0);">
                                                                            <span
                                                                                style="text-align:center; font-size: 0.8rem; background: #efefef; padding: 14px;"><?=$row[0]->saturday ?></span>
                                                                        </a>
                                                                    </div>
                                                                    <?php } elseif($row[0]->saturday == 'off') { ?>
                                                                    <div class="p-1">
                                                                        <a href="javascript:void(0);">
                                                                            <span
                                                                                style="text-align:center; font-size: 0.8rem; background: #ffbc00; padding: 14px;"><?=$row[0]->saturday ?></span>
                                                                        </a>
                                                                    </div>
                                                                    <?php } else { ?>

                                                                    <?php } ?>

                                                                    <?php if ($row[0]->sunday == 'sn') { ?>
                                                                    <div class="p-1">
                                                                        <a href="javascript:void(0);">
                                                                            <span
                                                                                style="text-align:center; font-size: 0.8rem; background: #efefef; padding: 14px;">
                                                                                <?=$row[0]->sunday ?></span>
                                                                        </a>
                                                                    </div>
                                                                    <?php } elseif($row[0]->sunday == 'off') { ?>
                                                                    <div class="p-1">
                                                                        <a href="javascript:void(0);">
                                                                            <span
                                                                                style="text-align:center; font-size: 0.8rem; background: #ffbc00; padding: 14px;">
                                                                                <?=$row[0]->sunday ?></span>
                                                                        </a>
                                                                    </div>
                                                                    <?php } else { ?>

                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <!-- ...::::End Size2 row:::... -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <i class="mdi mdi-calendar mr-2 text-success"></i>
                                        <select style="font-size: 0.8rem;" name="monday" value="<?=get_var('monday')?>" id="monday"
                                            class="line-input form-control custom-select" required>
                                            <option value="" disabled="" selected="">Monday</option>
                                            <option style="color: red;" <?=get_select('monday', 'mo')?> value="mo">
                                                Working</option>
                                            <option style="color: red;" <?=get_select('monday', 'off')?> value="off">
                                                Off-Day</option>
                                        </select>
                                        <div class="invalid-feedback">Invalid</div>
                                    </div>
                                    <div class="form-group col-md-3 ">
                                        <i class="mdi mdi-calendar mr-2 text-success"></i>
                                        <select style="font-size: 0.8rem;" name="tuesday" value="<?=get_var('tuesday')?>" id="tuesday"
                                            class="line-input form-control custom-select" required>
                                            <option value="" disabled="" selected="">Tuesday</option>
                                            <option style="color: red;" <?=get_select('tuesday', 'tu')?> value="tu">
                                                Working</option>
                                            <option style="color: red;" <?=get_select('tuesday', 'off')?> value="off">
                                                Off-Day</option>
                                        </select>
                                        <div class="invalid-feedback">Invalid</div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <i class="mdi mdi-calendar mr-2 text-success"></i>
                                        <select style="font-size: 0.8rem;" name="wednesday" value="<?=get_var('wednesday')?>" id="wednesday"
                                            class="line-input form-control custom-select" required>
                                            <option value="" disabled="" selected="">Wednesday</option>
                                            <option style="color: red;" <?=get_select('wednesday', 'we')?> value="we">
                                                Working</option>
                                            <option style="color: red;" <?=get_select('wednesday', 'off')?> value="off">
                                                Off-Day</option>
                                        </select>
                                        <div class="invalid-feedback">Invalid</div>
                                    </div>
                                    <div class="form-group col-md-3 ">
                                        <i class="mdi mdi-calendar mr-2 text-success"></i>
                                        <select style="font-size: 0.8rem;" name="thursday" value="<?=get_var('thursday')?>" id="thursday"
                                            class="line-input form-control custom-select" required>
                                            <option value="" disabled="" selected="">Thursday</option>
                                            <option style="color: red;" <?=get_select('thursday', 'th')?> value="th">
                                                Working</option>
                                            <option style="color: red;" <?=get_select('thursday', 'off')?> value="off">
                                                Off-Day</option>
                                        </select>
                                        <div class="invalid-feedback">Invalid</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <i class="mdi mdi-calendar mr-2 text-success"></i>
                                        <select style="font-size: 0.8rem;" name="friday" value="<?=get_var('friday')?>" id="friday"
                                            class="line-input form-control custom-select" required>
                                            <option value="" disabled="" selected="">Friday</option>
                                            <option style="color: red;" <?=get_select('friday', 'fr')?> value="fr">
                                                Working</option>
                                            <option style="color: red;" <?=get_select('friday', 'off')?> value="off">
                                                Off-Day</option>
                                        </select>
                                        <div class="invalid-feedback">Invalid</div>
                                    </div>
                                    <div class="form-group col-md-3 ">
                                        <i class="mdi mdi-calendar mr-2 text-success"></i>
                                        <select style="font-size: 0.8rem;" name="saturday" value="<?=get_var('saturday')?>" id="saturday"
                                            class="line-input form-control custom-select" required>
                                            <option value="" disabled="" selected="">Saturday</option>
                                            <option style="color: red;" <?=get_select('saturday', 'st')?> value="st">
                                                Working</option>
                                            <option style="color: red;" <?=get_select('saturday', 'off')?> value="off">
                                                Off-Day</option>
                                        </select>
                                        <div class="invalid-feedback">Invalid</div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <i class="mdi mdi-calendar mr-2 text-success"></i>
                                        <select style="font-size: 0.8rem;" name="sunday" value="<?=get_var('sunday')?>" id="sunday"
                                            class="line-input form-control custom-select" required>
                                            <option value="" disabled="" selected="">Sunday</option>
                                            <option style="color: red;" <?=get_select('sunday', 'sn')?> value="sn">
                                                Working</option>
                                            <option style="color: red;" <?=get_select('sunday', 'off')?> value="off">
                                                Off-Day</option>
                                        </select>
                                        <div class="invalid-feedback">Invalid</div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="submit" data-dismiss="modal">Update</button>
                                    <a href="<?=ROOT?>/staff/<?=$row[0]->user_id?>">
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Cancel</button>
                                    </a>
                                </div>
                            </form>

                            <?php endif; ?>
                            <script>
                            // var image_added = false;

                            // function validate(e,form)
                            // {
                            //     e.preventDefault();

                            //     if(!image_added){
                            //         alert("please add a valid image");
                            //         return;
                            //     }

                            //     form.submit();
                            // }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->

        <!-- footer & mobile footer -->
        <?php $this->view('includes/admin_footer'); ?>
        <!-- footer & mobile footer -->

        <script src="<?=ROOT?>/assets/js/vendor.min.js"></script>
        <script src="<?=ROOT?>/assets/js/app.min.js"></script>