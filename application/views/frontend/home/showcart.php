<?php
//echo '<pre>';
//print_r($infocart);
//print_r($totalmoney);
//echo '</pre>';
?>

<section class="wrap">
        <header><h2 title="gian hàng">Gian hàng</h2></header>
        <form action="frontend/home/updatecart" method="post">
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Xóa</th>
                        <th>Tên</th>
                        <th>ảnh đại diện</th>
                        <th>số lượng</th>
                        <th>giá</th>
                        <th>Tổng con</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(isset($infocart)  &&  count($infocart)){foreach($infocart as $key=>$value){?>
                    <tr>
                        <td class="td-cart"><?php echo $value['id']?></td>
                        <td class="td-cart"><a href="xoa-san-pham/<?php echo $value['rowid']?>.html">Xóa</a></td>
                        <td class="td-cart"><?php echo $value['name']?></td>
                        <td><img style="width: 100px; height: 100px; border: 2px solid #EF3B24" src="<?php echo $value['image']?>"></td>
                        <td class="td-cart"><input class="txt-cart" type="text" name="data[<?php echo $value['rowid'];?>]" value="<?php echo $value['qty'];?>"></td>
                        <td class="td-cart"><?php echo number_format($value['price']);?></td>
                        <td class="td-cart"><?php echo number_format($value['subtotal']);?></td>
                    </tr>
                <?php   }  }    ?>
                    <tr>
                        <td colspan="3"><a class="del-all" href="xoa-gio-hang.html" title="Xóa hết cả giỏ hàng" onclick="confirm(Xóa cả giỏ hàng)"> Xóa giỏ hàng </a></td>
                        <td colspan="2"> Tính lại :<input type="submit" name="submit" value="Tạm tính"></td>
                        <td colspan="2"><a class="pay-all" href="thanh-toan.html" title="Vào thanh toán"> Thanh toán </a></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <section class="detail-pay">
            <ul>
                <li> Tổng số mặt hàng: <?php echo number_format($totalitem);?></li>
                <li> Tổng số tiền: <?php echo number_format($totalmoney);?></li>
            </ul>
        </section>
    </section>