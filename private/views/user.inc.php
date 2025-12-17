<?php $image =  get_image($row->image, $row->gender); ?>
<div class="col-md-3 col-auto pt-2" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="0">
    <div class="small-box bg-white text-center pt-2">
        <img class="rounded-circle border border-dark" src="<?=$image?>"  width="150px" height="150px" alt="">
        <div class="card-body">
            <small class="card-text float-left">
                <?=$row->name?>&nbsp;<?=$row->surname?>
            </small>
            <p class="card-text float-left">
                <?=ucwords(str_replace("_", " ", $row->role))?>
            </p>
            <br><br><br>
                <a href="<?=ROOT?>/profile/<?=$row->user_id?>" class="btn btn-sm btn-primary float-left text-white"> 
                    More
                </a>
                &nbsp;&nbsp;&nbsp;
                <?php if(!isset($_GET['select'])) :?>
                    <button name="selected" value="<?=$row->user_id?>" class="btn btn-sm btn-danger float-right text-white"> 
                        Add
                    </button>
                <?php endif; ?>
        </div>
    </div>
</div>