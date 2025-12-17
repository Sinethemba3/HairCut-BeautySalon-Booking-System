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
        <div class="row" style="padding-left: 8%; padding-right: 8%;">
            <!-- User Quick Action Form -->
            <div class="col-md-12">
                <div class="user-actions accordion" data-aos="fade-up" data-aos-delay="0">
                    <h3>
                        <i class="fa fa-users" aria-hidden="true"></i>
                        HAIRDRESSING - <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_login" aria-expanded="true">Click here to select service</a>
                    </h3>
                    <br>
                    <div id="checkout_login" class="collapse" data-parent="#checkout_login">
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Hairdressing' && $row->name == 'Mizani'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount">
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
                                    <?php if($row->service == 'Hairdressing' && $row->name == 'Olive Oil'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount">
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
                                    <?php if($row->service == 'Hairdressing' && $row->name == 'Afika M Hair Care'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount">
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
                                    <?php if($row->service == 'Hairdressing' && $row->name == 'Extra (Own Hair)'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount">
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
                                    <?php if($row->service == 'Hairdressing' && $row->name == 'Mizani After Care'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount">
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
                <div class="user-actions accordion" data-aos="fade-up" data-aos-delay="0">
                    <h3>
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                        WIG BAR - <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_login1" aria-expanded="true">Click here to view Price list</a>
                    </h3>
                    <br>
                    <div id="checkout_login1" class="collapse" data-parent="#checkout_login1">
                         <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Wig Bar' && $row->name == 'Wig Services'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount">
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
                                    <?php if($row->service == 'Wig Bar' && $row->name == 'Installation'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount">
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
                                    <?php if($row->service == 'Wig Bar' && $row->name == 'Wig Treat'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount">
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
                                    <?php if($row->service == 'Wig Bar' && $row->name == 'Wig Colouring'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount">
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
                                    <?php if($row->service == 'Wig Bar' && $row->name == 'Weaving'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount">
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
                                    <?php if($row->service == 'Wig Bar' && $row->name == 'Wig Blowave, Iron, & Curling'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount">
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
                <div class="user-actions accordion" data-aos="fade-up" data-aos-delay="0">
                    <h3>
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        PLAITS & BRAIDS - <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_login2" aria-expanded="true">Click here to view Price list</a>
                    </h3>
                    <br>
                    <div id="checkout_login2" class="collapse" data-parent="#checkout_login2">
                        <!-- ...:::: Start Compare Section:::... -->
                        <div class="compare-section">
                            <?php if (!empty($rows)): ?>
                                <?php foreach ($rows as $row): ?>
                                    <?php if($row->service == 'Plaits & Braids' && $row->name == 'Take Off'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount">
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
                                    <?php if($row->service == 'Plaits & Braids' && $row->name == 'Natural Plaits (Excl Extentions)'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount">
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
                                    <?php if($row->service == 'Plaits & Braids' && $row->name == 'Hair'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount">
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
                                    <?php if($row->service == 'Plaits & Braids' && $row->name == 'Microbonding'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount">
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
                                    <?php if($row->service == 'Plaits & Braids' && $row->name == 'Hair Accessories'){ ?>
                                        <div class="panel-default">
                                            <label class="checkbox-default pb-4" for="services_" style="width: 35%;">
                                                <input type="checkbox" value="<?=$row->service_name?>" name="services_" id="services_">
                                                <span><?=$row->service_name?></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-default pb-4" for="amount">
                                                <input type="checkbox" value="<?=$row->price1?>" name="amount" id="amount">
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

        <div data-aos="fade-up" data-aos-delay="0" style="padding-left: 8%; padding-bottom: 50px;">
            <a href="javascript:void(0);" class="btn btn-lg icon-space-left">
                <button type="submit" class="d-flex align-items-center text-white" style="background: #FFB6C1; padding: 10px 25px; border-radius: 35px; min-width: 120px; letter-spacing: .1em; font-weight: 400; font-size: 0.9rem; text-align: center;"> continue<i class="ion-ios-arrow-thin-right"></i></button>
            </a>
        </div>
    </form>

    <?php $this->view('includes/footer'); ?>
  </body>
</html>