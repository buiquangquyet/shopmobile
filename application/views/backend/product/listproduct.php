<?php
//echo '<pre>';
//print_r($listproduct);
//echo '</pre>';
//die;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <span>Bản sản phẩm</span>
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
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/product/listproduct/'.$page.'?sort_field=id&sort_value='.get_sort2($sort['value']);?>"> ID </a></th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/product/listproduct/'.$page.'?sort_field=title&sort_value='.get_sort2($sort['value']);?>"> Tên Sp </a></th>
                    <th>Loại</th>
                    <th>Banner</th>
                    <th>Cạnh</th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/product/listproduct/'.$page.'?sort_field=order&sort_value='.get_sort2($sort['value']);?>"> vị trí </a></th>
                    <th>Màu</th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/product/listproduct/'.$page.'?sort_field=price&sort_value='.get_sort2($sort['value']);?>"> Giá </a></th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/product/listproduct/'.$page.'?sort_field=priceold&sort_value='.get_sort2($sort['value']);?>"> Giá cũ </a></th>
                    <th>Ảnh</th>
                    <th>Sp tốt</th>
                    <th>Sp mới</th>
                    <th>Công bố</th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/product/listproduct/'.$page.'?sort_field=view&sort_value='.get_sort2($sort['value']);?>">lượt xem</a></th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/product/listproduct/'.$page.'?sort_field=userid-created&sort_value='.get_sort2($sort['value']);?>">Người nhập</a></th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/product/listproduct/'.$page.'?sort_field=creattime&sort_value='.get_sort2($sort['value']);?>">Thời gian nhập</a></th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/product/listproduct/'.$page.'?sort_field=userid-update&sort_value='.get_sort2($sort['value']);?>">Người cập nhật</a></th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/product/listproduct/'.$page.'?sort_field=updatetime&sort_value='.get_sort2($sort['value']);?>">Thời gian cập nhật</a></th>
                    <th><i>Xóa</i></th>
                </tr>
                </thead>
                <tbody>
                <form action="backend/product/editorder" method="post">
                <?php if(isset($listproduct) && count($listproduct)){ foreach($listproduct as $key=>$value){?>
                        <tr class="gradeA odd">
                            <td class="sorting_1"><a href="backend/product/editproduct/<?php echo $value['id']?>"> <?php echo $value['id']?></a> </td>
                            <td class="sorting_1"><?php echo $value['title']?></td>
                            <td class="sorting_1"><?php if(isset($value['type-title'])){echo $value['type-title'];}else{echo '';}?></td>
                            <td class="sorting_1"><a href="<?php ITQ_BASE_URL?>backend/product/editis_banner/<?php echo $value['id'].'/'.changeStatus($value['is_banner'])?>"><?php echo ($value['is_banner']==1)?'<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-remove" style="color:red;"></i>';?></a></td>
                            <td class="sorting_1"><a href="<?php ITQ_BASE_URL?>backend/product/editis_right/<?php echo $value['id'].'/'.changeStatus($value['is_right'])?>"><?php echo ($value['is_right']==1)?'<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-remove" style="color:red;"></i>';?></a></td>
                            <td class="sorting_1"><input type="text" name="<?php echo $value['id']?>" value="<?php echo $value['order']?>" size="2"></td>
                            <td class="sorting_1"><?php echo $value['color']?></td>
                            <td class="sorting_1"><?php echo number_format($value['price']);?></td>
                            <td class="sorting_1"><?php echo number_format($value['priceold']);?></td>
                            <td class="sorting_1"><img style="width: 100px" src="<?php echo $value['image']?>"/></td>
                            <td class="sorting_1"><a href="<?php ITQ_BASE_URL?>backend/product/editbestbuy/<?php echo $value['id'].'/'.changeStatus($value['buy-best'])?>"><?php echo ($value['buy-best']==1)?'<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-remove" style="color:red;"></i>';?></a></td>
                            <td class="sorting_1"><a href="<?php ITQ_BASE_URL?>backend/product/editnew/<?php echo $value['id'].'/'.changeStatus($value['new'])?>"><?php echo ($value['new']==1)?'<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-remove" style="color:red;"></i>';?></a></td>
                            <td class="sorting_1"><a id="editpublish"  href="#" alt="<?php ITQ_BASE_URL?>backend/product/editpublish/<?php echo $value['id'].'/'.changeStatus($value['publish'])?>"><?php my_string::getIcon($value['publish'])?></a></td>
                            <td class="sorting_1"><?php echo $value['view']?></td>
                            <td class="sorting_1"><?php echo $value['fullname-created'];?> </td>
                            <td class="sorting_1"><?php echo $value['creattime']?></td>
                            <td class="sorting_1"><?php echo $value['fullname-updated'];?> </td>
                            <td class="sorting_1"><?php echo $value['updatetime']?></td>
                            <td class="sorting_1"><a href="backend/product/deleteproduct/<?php echo$value['id'];?>" onclick="return confirm('bạn chắc chắn xóa sản phẩm')">Xóa</a></td>
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