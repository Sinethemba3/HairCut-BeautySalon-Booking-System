<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr style="font-size: 0.8rem;">
            <th>Image</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr style="font-size: 0.8rem;">
            <th>Image</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
    <?php if (!empty($rows)):?>
        <?php foreach($rows as $row):?>
        <tr style="font-size: 0.8rem;">
            <td>
                <img src="<?=get_image($row->image)?>" alt="contact-img" title="contact-img" class="me-2 rounded-circle me-3" height="35" width="35">
                <p class="m-0 d-inline-block align-middle font-16">
                    <a href="" class="text-body"><?=esc($row->services)?></a>
                    <br>
                    <span class="text-warning fa fa-star" style="font-size: 10px;"></span>
                    <span class="text-warning fa fa-star" style="font-size: 10px;"></span>
                    <span class="text-warning fa fa-star" style="font-size: 10px;"></span>
                    <span class="text-warning fa fa-star" style="font-size: 10px;"></span>
                    <span class="text-warning fa fa-star" style="font-size: 10px;"></span>
                </p>
            </td>
            <td><?=get_date($row->date)?></td>
            <td class="font-w300">
                <a href="<?=ROOT?>/our_services/edit/<?=$row->id?>" title="click to edit"><i class="fas fa-edit" aria-hidden="true"></i></a> |
                <a href="<?=ROOT?>/our_services/delete/<?=$row->id?>" class="action-icon"> <i class="fa fa-trash text-danger"></i></a>
            </td>
        </tr>
        <?php endforeach;?>
    <?php endif;?>
    </tbody>
</table>