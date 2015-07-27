<?php
//print_r($infocart);
?>
<section class="wrap">
    <form action="" method="post">
        <table border="1">
            <thead>
            <tr>
                <th>id</th>
                <th>Xóa</th>
                <th>Tên</th>
                <th>số lượng</th>
                <th>giá</th>
                <th>Tổng con</th>
            </tr>
            </thead>
            <tbody>
            <?php    if(isset($infocart) && count($infocart)){foreach($infocart as $key =>$value){ ?>
                <tr>
                    <td><?php echo $value['id']?></td>
                    <td><a href="xoa-san-pham/<?php echo $value['rowid']?>.html">Xóa</a></td>
                    <td><?php echo $value['title']?></td>
                    <td><?php echo $value['qty']?></td>
                    <td><?php echo number_format($value['price']);?></td>
                    <td><?php echo number_format($value['subtotal']);?></td>
                </tr>
            <?php }   }  ?>
            <tr>
                <td colspan="6">
                    <ul>
                        <li> Tổng số mặt hàng: <?php echo number_format($totalitem);?></li>
                        <li> Tổng số tiền: <?php echo number_format($totalmoney);?></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="2">Tên quý khách</td>
                <td colspan="4"><input type="text" name="fullname" value=""></td>
            </tr>
            <tr>
                <td colspan="2">Thư điện tử</td>
                <td colspan="4"><input type="text" name="email" value=""></td>
            </tr>
            <tr>
                <td colspan="2">Số Điện Thoại</td>
                <td colspan="4"><input type="text" name="telephone" value=""></td>
            </tr>
            <tr>
                <td colspan="2">Địa chỉ</td>
                <td colspan="4"><input type="text" name="address" value=""></td>
            </tr>
            <tr>
                <td colspan="2">yêu cầu thêm</td>
                <td colspan="4"><textarea name="order" rows="5"></textarea></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="3"> đặt hàng :<input type="submit" name="submit" value="Gửi đặt hàng"></td>
                <td colspan="2"></td>
            </tr>
            </tbody>
        </table>
    </form>
</section>