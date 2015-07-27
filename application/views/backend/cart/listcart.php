
<div class="panel panel-default">
    <div class="panel-heading">
        <span>Bản đơn hàng</span>
        <form method="get" action="" style="float: right;">
            <input type="hidden" name="sort_field" value="<?php echo $sort['field'];?>"/>
            <input type="hidden" name="sort_value" value="<?php echo $sort['value'];?>"/>
            <span>Tìm Kiếm</span><input type="text" aria-controls="dataTables-example" name="txtsearch" value="<?php echo isset($search)?$search:'';?>">
            <input class="" type="submit" name="buttonsearch">
        </form>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
                <thead>
                <tr role="row">
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/cart/listcart/'.$page.'?sort_field=id&sort_value='.get_sort2($sort['value']);?>"> No </a></th>
                    <th>Tên KH</th>
                    <th>email</th>
                    <th>Điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>thanh toán</th>
                    <th>yêu cầu</th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/cart/listcart/'.$page.'?sort_field=totalitem&sort_value='.get_sort2($sort['value']);?>"> số lượng </a></th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/cart/listcart/'.$page.'?sort_field=totalmoney&sort_value='.get_sort2($sort['value']);?>"> tổng tiền </a></th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/cart/listcart/'.$page.'?sort_field=time&sort_value='.get_sort2($sort['value']);?>"> thời gian </a></th>
                    <th>ip</th>
                    <th><a href="<?php echo ITQ_BASE_URL.'backend/cart/listcart/'.$page.'?sort_field=status&sort_value='.get_sort2($sort['value']);?>"> Trạng thái </a></th>
                    <th><i>Xóa</i></th>
                </tr>
                </thead>
                <tbody>
                <?php if(isset($listcart) && count($listcart)){foreach($listcart as $key=>$value){?>
                    <tr>
                        <td><a href="backend/cart/detail/<?php echo $value['id']?>"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><?php echo $value['fullname'];?></td>
                        <td><?php echo $value['email'];?></td>
                        <td><?php echo $value['telephone'];?></td>
                        <td><?php echo $value['address'];?></td>
                        <td><?php echo $value['pay'];?></td>
                        <td><?php echo $value['order'];?></td>
                        <td><?php echo $value['totalitem'];?></td>
                        <td><?php echo number_format($value['totalmoney']);?></td>
                        <td><?php echo $value['time'];?></td>
                        <td><?php echo $value['ip'];?></td>
                        <td><a href="<?php ITQ_BASE_URL?>backend/cart/editstatus/<?php echo $value['id'].'/'.changeStatus($value['status'])?>"><?php echo ($value['status']==1)?'<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-remove" style="color:red;"></i>';?></a></td>
                        <td><a href="backend/cart/del/<?php echo $value['id']?>" onclick="confirm('Xóa yêu giỏ hàng')">Xóa</a></td>
                    </tr>
                <?php   }   }   ?>

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