<?php $this->view('includes/header'); ?>
   
    <!-- Start Offcanvas Addcart Section -->
    <div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div>
        <!-- End Offcanvas Header -->

        <!-- Start  Offcanvas Addcart Wrapper -->
        <div class="offcanvas-add-cart-wrapper">
            <h4 class="offcanvas-title">Shopping Cart</h4>
            <?php if(!empty($CART)):?>
                <?php foreach($CART as $item):?>
                    <ul class="offcanvas-cart">
                        <li class="offcanvas-cart-item-single">
                            <div class="offcanvas-cart-item-block">
                                <a href="#" class="offcanvas-cart-item-image-link">
                                    <img src="<?=get_image($item['row']->image)?>" alt="" class="offcanvas-cart-image">
                                </a>
                                <div class="offcanvas-cart-item-content">
                                    <a href="#" class="offcanvas-cart-item-link"><?=esc($item['row']->name)?></a>
                                    <div class="offcanvas-cart-item-details">
                                        <span class="offcanvas-cart-item-details-quantity"><?=$item['qty']?> x </span>
                                        <span class="offcanvas-cart-item-details-amount">R<?=number_format($item['row']->price, 2) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="offcanvas-cart-item-delete text-right">
                                <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </li>
                    </ul>
                    <div class="offcanvas-cart-total-amount">
                        <span class="offcanvas-cart-total-price-text">Subtotal:</span>
                        <span class="offcanvas-cart-total-price-value">R<?=number_format($item['qty'] * $item['row']->price, 2) ?></span>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
            <ul class="offcanvas-cart-action-button">
                <li><a href="<?=ROOT?>/cart" class="btn btn-block btn-green">View Cart</a></li>
                <li><a href="<?=ROOT?>/checkout" class=" btn btn-block btn-green mt-5">Checkout</a></li>
            </ul>
        </div>
        <!-- End  Offcanvas Addcart Wrapper -->

    </div>
    <!-- End  Offcanvas Addcart Section -->

    <!-- Start Offcanvas Mobile Menu Section -->
    <div id="offcanvas-wishlish" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div>
        <!-- ENd Offcanvas Header -->

        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-wishlist-wrapper">
            <h4 class="offcanvas-title">Wishlist</h4>
            <ul class="offcanvas-wishlist">
                <li class="offcanvas-wishlist-item-single">
                    <div class="offcanvas-wishlist-item-block">
                        <a href="#" class="offcanvas-wishlist-item-image-link">
                            <img src="<?=ROOT?>/assets/images/product/default/home-1/default-1.jpg" alt="" class="offcanvas-wishlist-image">
                        </a>
                        <div class="offcanvas-wishlist-item-content">
                            <a href="#" class="offcanvas-wishlist-item-link">Car Wheel</a>
                            <div class="offcanvas-wishlist-item-details">
                                <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                                <span class="offcanvas-wishlist-item-details-amount">R49.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-wishlist-item-delete text-right">
                        <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </li>
                <li class="offcanvas-wishlist-item-single">
                    <div class="offcanvas-wishlist-item-block">
                        <a href="#" class="offcanvas-wishlist-item-image-link">
                            <img src="<?=ROOT?>/assets/images/product/default/home-2/default-1.jpg" alt="" class="offcanvas-wishlist-image">
                        </a>
                        <div class="offcanvas-wishlist-item-content">
                            <a href="#" class="offcanvas-wishlist-item-link">Car Vails</a>
                            <div class="offcanvas-wishlist-item-details">
                                <span class="offcanvas-wishlist-item-details-quantity">3 x </span>
                                <span class="offcanvas-wishlist-item-details-amount">R500.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-wishlist-item-delete text-right">
                        <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </li>
                <li class="offcanvas-wishlist-item-single">
                    <div class="offcanvas-wishlist-item-block">
                        <a href="#" class="offcanvas-wishlist-item-image-link">
                            <img src="<?=ROOT?>/assets/images/product/default/home-3/default-1.jpg" alt="" class="offcanvas-wishlist-image">
                        </a>
                        <div class="offcanvas-wishlist-item-content">
                            <a href="#" class="offcanvas-wishlist-item-link">Shock Absorber</a>
                            <div class="offcanvas-wishlist-item-details">
                                <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                                <span class="offcanvas-wishlist-item-details-amount">R350.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-wishlist-item-delete text-right">
                        <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </li>
            </ul>
            <ul class="offcanvas-wishlist-action-button">
                <li><a href="<?=ROOT?>/wish_list" class="btn btn-block btn-green">View wishlist</a></li>
            </ul>
        </div>
        <!-- End Offcanvas Mobile Menu Wrapper -->

    </div>
    <!-- End Offcanvas Mobile Menu Section -->

    <!-- Start Offcanvas Search Bar Section -->
    <div id="search" class="search-modal">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-lg btn-green">Search</button>
        </form>
    </div>
    <!-- End Offcanvas Search Bar Section -->

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Select Services</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?=ROOT?>/home">Home</a></li>
                                    <li class="active" aria-current="page">Select Services</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <form method="post" action="">
        <div style="padding-left: 8%; padding-bottom: 50px;">
            <a href="javascript:void(0);" class="btn btn-lg icon-space-left">
                <button type="submit" class="d-flex align-items-center text-white" style="background: #FFB6C1; padding: 10px 25px; border-radius: 35px; min-width: 120px; letter-spacing: .1em; font-weight: 400; font-size: 0.9rem; text-align: center;"> continue<i class="ion-ios-arrow-thin-right"></i></button>
            </a>
        </div>

        <div class="row" style="padding-left: 8%; padding-right: 8%;">
            <!-- User Quick Action Form -->
            <div class="col-md-12">
                <div class="user-actions accordion">
                    <h3>
                        <i class="fa fa-users" aria-hidden="true"></i>
                        NAILS - <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_login" aria-expanded="true">Click here to select service</a>
                    </h3>
                    <br>
                    <div id="checkout_login" class="collapse" data-parent="#checkout_login">
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Nails' && $row->name == 'Gel Nails'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name ?>" name="services_" id="services_">
                                                <span><?=$row->service_name ?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_">
                                                <input type="checkbox" value="<?=$row->price1 ?>" name="amount" id="amount_">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                            <?php else: ?>
                                <div class="pb-4">
                                    <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Nails' && $row->name == 'Repair'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_1" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name ?>" name="services_" id="services_1">
                                                <span><?=$row->service_name ?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_1">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_1">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Nails' && $row->name == 'Ladies Manicure'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_2" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_2">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_2">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_2">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Nails' && $row->name == 'Ladies Pedicure'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_3" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_3">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_3">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_3">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Nails' && $row->name == 'Male Grooming'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_4" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_4">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_4">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_4">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Nails' && $row->name == 'Express Hands & Feet'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_5" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_5">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_5">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_5">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                    </div>
                </div>
            </div>
            <!-- User Quick Action Form -->
        </div>

        <div class="row" style="padding-left: 8%; padding-right: 8%;">
            <!-- User Quick Action Form -->
            <div class="col-md-12">
                <div class="user-actions accordion">
                    <h3>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        FACE & BODY - <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_login1" aria-expanded="true">Click here to view Price list</a>
                    </h3>
                    <br>
                    <div id="checkout_login1" class="collapse" data-parent="#checkout_login1">
                         <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Face & Body' && $row->name == 'Facial Therapy'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_6" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_6">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_6">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_6">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                         <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Face & Body' && $row->name == 'Body Therapy'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_7" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_7">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_7">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_7">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                         <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Face & Body' && $row->name == 'Waxing'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_8" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_8">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_8">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_8">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                         <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Face & Body' && $row->name == 'Eyebrows & Lashes'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_9" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_9">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_9">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_9">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                         <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Face & Body' && $row->name == 'Threading'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_10" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_10">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_10">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_10">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                         <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Face & Body' && $row->name == 'Semi Permanent Make-up'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_11" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_11">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_11">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_11">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                         <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Face & Body' && $row->name == 'Make-up'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_12" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_12">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_12">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_12">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                         <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Face & Body' && $row->name == 'Make-up Products'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_13" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_13">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_13">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_13">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                    </div>
                </div>
            </div>
            <!-- User Quick Action Form -->
        </div>

        <div class="row" style="padding-left: 8%; padding-right: 8%;">
            <!-- User Quick Action Form -->
            <div class="col-md-12">
                <div class="user-actions accordion">
                    <h3>
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        PACKAGES - <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_login2" aria-expanded="true">Click here to view Price list</a>
                    </h3>
                    <br>
                    <div id="checkout_login2" class="collapse" data-parent="#checkout_login2">
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Packages' && $row->name == 'De-Congestion Treatment'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_14" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_14">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_14">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_14">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Packages' && $row->name == 'Body Waxing Delux'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_15" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_15">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_15">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_15">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Packages' && $row->name == 'Express Treatment'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_16" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_16">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_16">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_16">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Packages' && $row->name == 'Afika M Luxury Treat'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_17" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_17">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount_17" id="amount_17">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Packages' && $row->name == 'Birthday Package'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_18" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_18">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_18">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_18">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Packages' && $row->name == 'Bestie Package (2 People)'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_19" id="services_19">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_19">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_19">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Packages' && $row->name == 'Couples Treatments (2 People)'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_20" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_20">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_20">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_20">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Packages' && $row->name == 'Coporate Packages (Silver Package)'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_21" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_21">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_21">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_21">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Packages' && $row->name == 'Coporate Packages (Gold Package)'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_22" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_22">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_22">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_22">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                    </div>
                </div>
            </div>
            <!-- User Quick Action Form -->
        </div>
        
        <div class="row" style="padding-left: 8%; padding-right: 8%;">
            <!-- User Quick Action Form -->
            <div class="col-md-12">
                <div class="user-actions accordion">
                    <h3>
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        KIDDIES - <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_login3" aria-expanded="true">Click here to view Price list</a>
                    </h3>
                    <br>
                    <div id="checkout_login3" class="collapse" data-parent="#checkout_login3">
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Kiddies' && $row->name == 'Massages'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_23" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_23">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_23">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_23">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Kiddies' && $row->name == 'Mini Manis & Pedis'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_24" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_24">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_24">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_24">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Kiddies' && $row->name == 'Natural Make-up'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_25" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_25">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_25">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_25">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                    </div>
                </div>
            </div>
            <!-- User Quick Action Form -->
        </div>

        <div class="row" style="padding-left: 8%; padding-right: 8%;">
            <!-- User Quick Action Form -->
            <div class="col-md-12">
                <div class="user-actions accordion">
                    <h3>
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        ELDERLY - <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_login4" aria-expanded="true">Click here to view Price list</a>
                    </h3>
                    <br>
                    <div id="checkout_login4" class="collapse" data-parent="#checkout_login4">
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Elderly' && $row->name == 'Elderly Mondays'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_26" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_26">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount_26">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount_26">
                                                <span>R<?=number_format($row->price1, 2)?></span>
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                                                
                                    <?php } ?>
                            
                                <?php endforeach;?>
                                <?php else: ?>
                                    <div class="pb-4">
                                        <h3 class="text-danger text-center text-uppercase pb-4"> Sorry we couldn't find what you were looking for.</h3>
                                    </div>
                            <?php endif;?>
                        </div> <!-- ...:::: Start Compare Section:::... -->
                    </div>
                </div>
            </div>
            <!-- User Quick Action Form -->
        </div>
    </form>

    <?php $this->view('includes/footer'); ?>
  </body>
</html>