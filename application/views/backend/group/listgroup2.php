<?php
//echo '<pre>';
//print_r($listgroup);
//echo '</pre>';
?>
<div class="col-lg-10">
    <h2>Danh Sách nhóm</h2>
    <form action="" method="get">
        <input type="hidden" name="sort_field" value="<?php echo $sort['field'];?>"/>
        <input type="hidden" name="sort_value" value="<?php echo $sort['value'];?>"/>
        <input class="" type="text" name="txtsearch" value="<?php echo isset($search)?$search:'';?>"/>
        <input  class="" type="submit" name="buttonsearch"/>
    </form>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th><a href="<?php echo ITQ_BASE_URL.'backend/group/listgroup2/'.$page.'?sort_field=id&sort_value='.get_sort2($sort['value']);?>"> ID </a></th>
                <th>Nhóm</th>
                <th><a href="<?php echo ITQ_BASE_URL.'backend/group/listgroup2/'.$page.'?sort_field=total&sort_value='.get_sort2($sort['value']);?>"> Số lượng thành viên </a></th>
                <th><a href="<?php echo ITQ_BASE_URL.'backend/group/listgroup2/'.$page.'?sort_field=usercreate&sort_value='.get_sort2($sort['value']);?>"> nguoi tao </a></th>
                <th><a href="<?php echo ITQ_BASE_URL.'backend/group/listgroup2/'.$page.'?sort_field=created&sort_value='.get_sort2($sort['value']);?>"> Thời gian tạo </a></th>
                <th>người cập nhật</th>
                <th><a href="<?php echo ITQ_BASE_URL.'backend/group/listgroup2/'.$page.'?sort_field=update&sort_value='.get_sort2($sort['value']);?>"> thời gian cập nhật </a></th>
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
                    <td style="text-align: center"><a href="<?php ITQ_BASE_URL?>backend/group/delete/<?php echo$value['id']?>" title="xóa" onclick="return confirm('bạn chắc chắn xóa nhóm. bạn lưu ý khi xóa nhóm thì các thành viên trong nhớm đều bị xóa theo <?php echo $value['title'];?>')"><i class="fa fa-times"></i></a></td>
                </tr>
            <?php }     } ?>
            </tbody>
        </table>
        <section class="pagination">
            <ul class="pagination"><?php echo $this->pagination->create_links();?></ul>
        </section>


    </div>
</div>
