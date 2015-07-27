<?php
//print_r($listProduct);
?>
<div class="wrap">
    <div class="content">
        <div class="content-grids">
            <div align="left" style="min-height:800px;">
                <div id="cart_wrapper" align="center">
                    <form action="" id="cart_form" name="cart_form">
                        <div class="cart-info"> </div>
                        <div class="cart-total">
                            <b>Tổng số sản phẩm:<?php echo $this->cart->total_items(); ?> &nbsp&nbsp&nbsp </b> <span> Thành tiền: <?php echo number_format($this->cart->total()); ?>đ</span>
                            <input type="hidden" name="total-hidden-charges" id="total-hidden-charges" value="0">
                        </div>
                        <button type="submit" id="Submit">CheckOut</button>
                    </form>
                </div>
                <div id="wrap" align="center">
                    <a id="show_cart" href="javascript:void(0)">Xem Giở hàng - Danh mục : <?php echo $title; ?></a>
                <ul>
                    <?php   if(isset($listProduct) && count($listProduct)){foreach($listProduct as $key =>$value){?>
                        <li id="<?php echo $key+1?>">
                            <img src="<?php echo $value['image']?>" class="items" alt="">
                            <br clear="all">
                            <div><a href="<?php echo $value['link']?>"><?php echo $value['title']?></a> </div>
                        </li>
                        <!-- Detail Boxes for above four li -->
                        <div class="detail-view" id="detail-<?php echo $key+1?>">
                            <div class="close" align="right">
                                <a href="javascript:void(0)">x</a>
                            </div>
                            <img src="<?php echo $value['image']?>" class="detail_images" alt="">
                            <div class="detail_info">
                                <label class="item_name"><?php echo $value['title']?></label>
                                <p>
                                    <?php echo $value['description']?>
                                    <span class="price">Giá bán <?php echo number_format($value['price'])?>đ</span><br>
                                    <a class="add-to-cart-button" href="them-vao-gio-hang/<?php echo $value['alias'].'/'.$value['id'].'.html'?>" style="padding: 5px">Add to Cart</a>
                                </p>
                            </div>
                        </div>
                    <?php   }   }   ?>
                    <br clear="all">
                </ul>
                <br clear="all">
                </div>
                <!--#wrap-->
                <div class="content-sidebar">
                    <h4>Categories</h4>
                    <ul>
                        <?php
                        if(isset($catRightProduct) && count($catRightProduct)){ foreach($catRightProduct as $key=>$value){?>
                            <li><a href="<?php echo $value['link'];?>"><?php echo $value['title']?></a></li>
                        <?php } }   ?>
                    </ul>
                </div>
                <section class="pagination">
                    <ul class="pagination"><?php echo $this->pagination->create_links();?></ul>
                </section>
            </div>
        </div>
        <!--content-grids-->
    </div>
</div>
<section class="clear"></section>