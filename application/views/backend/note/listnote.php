<?php
//echo '<pre>';
//print_r($listnote);
//echo '</pre>';
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <span>Bản Bài Đăng</span>
        <form method="get" action="" style="float: right;">
            <input type="hidden" name="sort_field" value="<?php echo $sort['field'];?>"/>
            <input type="hidden" name="sort_value" value="<?php echo $sort['value'];?>"/>
            <span>Tìm Kiếm</span><input type="text" aria-controls="dataTables-example" name="txtsearch" value="<?php echo isset($search)?$search:'';?>">
            <input  class="" type="submit" name="buttonsearch"/>
        </form>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
                <thead>
                <tr role="row">
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/note/listnote/'.$page.'?sort_field=id&sort_value='.get_sort2($sort['value']);?>"> ID </a></th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/note/listnote/'.$page.'?sort_field=title&sort_value='.get_sort2($sort['value']);?>"> Tên bài đăng </a></th>
                    <th>Danh mục</th>
                    <th>Ảnh</th>
                    <th>Tóm tắt</th>
                    <th>bài đăng mới</th>
                    <th>cạnh</th>
                    <th>banner</th>
                    <th>order</th>
                    <th>Công bố</th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/note/listnote/'.$page.'?sort_field=view&sort_value='.get_sort2($sort['value']);?>">lượt xem</a></th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/note/listnote/'.$page.'?sort_field=userid-created&sort_value='.get_sort2($sort['value']);?>">Người nhập</a></th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/note/listnote/'.$page.'?sort_field=creattime&sort_value='.get_sort2($sort['value']);?>">Thời gian nhập</a></th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/note/listnote/'.$page.'?sort_field=userid-update&sort_value='.get_sort2($sort['value']);?>">Người cập nhật</a></th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/note/listnote/'.$page.'?sort_field=updatetime&sort_value='.get_sort2($sort['value']);?>">Thời gian cập nhật</a></th>
                    <th><i>Xóa</i></th>
                </tr>
                </thead>
                <tbody>
                <form method="post" action="backend/note/editorder">
                    <?php if(isset($listnote) && count($listnote)){ foreach($listnote as $key=>$value){?>
                        <tr class="gradeA odd">
                            <td class="sorting_1"><a href="backend/note/editnote/<?php echo $value['id']?>"> <?php echo $value['id']?></a> </td>
                            <td class="sorting_1"><?php echo $value['title']?></td>
                            <td class="sorting_1"><?php echo $value['category']?></td>
                            <td class="sorting_1"><img style="width: 100px" src="<?php echo $value['image']?>"/></td>
                            <td class="sorting_1"><?php echo $value['description']?></td>
                            <td class="sorting_1"><a href="<?php ITQ_BASE_URL?>backend/note/editnew/<?php echo $value['id'].'/'.changeStatus($value['new'])?>"><?php echo ($value['new']==1)?'<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-remove" style="color:red;"></i>';?></a></td>
                            <td class="sorting_1"><a href="<?php ITQ_BASE_URL?>backend/note/editis_right/<?php echo $value['id'].'/'.changeStatus($value['is_right'])?>"><?php echo ($value['is_right']==1)?'<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-remove" style="color:red;"></i>';?></a></td>
                            <td class="sorting_1"><a href="<?php ITQ_BASE_URL?>backend/note/editis_banner/<?php echo $value['id'].'/'.changeStatus($value['is_banner'])?>"><?php echo ($value['is_banner']==1)?'<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-remove" style="color:red;"></i>';?></a></td>
                            <td class="sorting_1"><input type="text" name="<?php echo $value['id']?>" value="<?php echo $value['order']?>" size="1"></td>
                            <td class="sorting_1"><a href="<?php ITQ_BASE_URL?>backend/note/editpublish/<?php echo $value['id'].'/'.changeStatus($value['publish'])?>"><?php echo ($value['publish']==1)?'<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-remove" style="color:red;"></i>';?></a></td>
                            <td class="sorting_1"><?php echo $value['view']?></td>
                            <td class="sorting_1"><?php echo $value['fullname-created']?> </td>
                            <td class="sorting_1"><?php echo $value['creattime']?></td>
                            <td class="sorting_1"><?php echo $value['fullname-updated'];?> </td>
                            <td class="sorting_1"><?php echo $value['updatetime']?></td>
                            <td class="sorting_1"><a href="backend/note/deletenote/<?php echo$value['id'];?>" onclick="return confirm('bạn chắc chắn xóa bài đăng')">Xóa</a></td>
                        </tr>
                    <?php }}?>
                    <tr>
                        <td><input type="submit" name="submit" value="submit"></td>
                    </tr>
                </form>

                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-6">
                    <div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all"><?php echo " Hiển thị từ ".($start+1)."đến $end trên tổng số $sumrows sản phẩm";?> </div>
                </div>
                <div class="col-sm-6">
                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                        <section class="pagination">
                            <ul class="pagination"><?php echo $this->pagination->create_links();?></ul>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.table-responsive -->
</div>
<!-- /.panel-body -->
</div>