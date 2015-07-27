<?php
$dataproduct = json_decode($cartdata['dataproduct']);
//echo '<pre>';
//print_r($dataproduct);
//echo '</pre>';
?>
<div id="page-wrapper" style="min-height: 724px">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <ul>
                        </ul>
                        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer">
                                <tr>
                                    <td class="col-lg-3">Tên KH</td>
                                    <td><?php echo $cartdata['fullname']?></td>
                                </tr>
                                <tr>
                                    <td class="col-lg-3">Email</td>
                                    <td><?php echo $cartdata['email']?></td>
                                </tr>
                                <tr>
                                    <td class="col-lg-3">Điện thoại</td>
                                    <td><?php echo $cartdata['telephone']?></td>
                                </tr>
                                <tr>
                                    <td class="col-lg-3">Địa chỉ</td>
                                    <td><?php echo $cartdata['address']?></td>
                                </tr>
                                <tr>
                                    <td class="col-lg-3">Thanh toán</td>
                                    <td><?php echo $cartdata['pay']?></td>
                                </tr>
                                <tr>
                                    <td class="col-lg-3">Yêu cầu</td>
                                    <td><?php echo $cartdata['order']?></td>
                                </tr>
                                <tr>
                                    <td class="col-lg-3">Tổng số sản phẩm</td>
                                    <td><?php echo $cartdata['totalitem']?></td>
                                </tr>
                                <tr>
                                    <td class="col-lg-3">Tổng tiền</td>
                                    <td><?php echo number_format($cartdata['totalmoney'])?>đ</td>
                                </tr>
                                <tr>
                                    <td class="col-lg-3">Thời gian</td>
                                    <td><?php echo $cartdata['time']?></td>
                                </tr>
                                <tr>
                                    <td class="col-lg-3">IP đặt hàng</td>
                                    <td><?php echo $cartdata['ip']?></td>
                                </tr>
                                <tr>
                                    <td class="col-lg-3">trạng thái</td>
                                    <td><a href="<?php ITQ_BASE_URL?>backend/cart/editstatus/<?php echo $cartdata['id'].'/'.changeStatus($cartdata['status'])?>"><?php echo ($cartdata['status']==1)?'<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-remove" style="color:red;"></i>';?></a></td>
                                </tr>
                                <?php foreach($dataproduct as $key=>$value){?>
                                <tr>
                                    <td class="col-lg-3">Tên sản phẩm :<?php $title = $this->Mitq_product->get_Title_Byid($value->id); echo $title['title'];?></td>
                                    <td>
                                        <table border="1">
                                            <tr>
                                                <td>số lượng
                                                    <table>
                                                        <tr>
                                                            <td><?php echo $value->qty;?></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td>đơn giá
                                                    <table>
                                                        <tr>
                                                            <td><?php echo  number_format($value->price);?></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td>Tiền
                                                    <table>
                                                        <tr>
                                                            <td><?php echo number_format($value->subtotal);?></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td>
                                                    <img style="width: 100px" src="<?php echo $value->image;?>"/>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>

                                </tr>
                                <?php } ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>