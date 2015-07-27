<div class="col-lg-10">
    <h2>Basic Table</h2>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Sửa</th>
                <th>Nhóm</th>
                <th>số lượng thành viên</th>
                <th>Người tạo</th>
                <th>Thời gian tạo</th>
                <th>người cập nhật</th>
                <th>Thời gian cập nhật</th>
                <th>xóa</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if(isset($listgroup) && count($listgroup)){foreach($listgroup as $key=>$value){?>
            <tr>
                <td><a href="<?php ITQ_BASE_URL?>backend/group/edit/<?php echo$value['id']?>" title="sửa nhóm"><i class="fa fa-pencil-square-o"></i></td>
                <td><?php echo$value['title']?></td>
                <td style="text-align: center"><?php echo$value['total']?></td>
                <td style="text-align: center"><?php echo$value['usercreate']?></td>
                <td style="text-align: center"><?php echo$value['created']?></td>
                <td style="text-align: center"><?php echo$value['userupdate']?></td>
                <td style="text-align: center"><?php echo$value['update']?></td>
                <td style="text-align: center"><a href="<?php ITQ_BASE_URL?>backend/group/delete/<?php echo$value['id']?>" title="xóa" onclick="return confirm('bạn chắc chắn xóa nhóm <?php echo $value['title'];?>')"><i class="fa fa-times-circle-o"></i></a></td>
            </tr>
            <?php }     } ?>
            </tbody>
        </table>
        <ul class="pagination"><?php echo $this->pagination->create_links();?></ul>

    </div>
</div>
