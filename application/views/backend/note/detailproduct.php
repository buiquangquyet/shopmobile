<section class="q-container">
    <section class="breadcrumb">
        <?php
        $parentid = $this->Mitq_category->getParentidById($catid);
        $parentid= $parentid['parentid'];
        function findrt($listcategory,$parentid=0){
            $myarr = '';
            if($parentid==1){
                return 1;
            }else{
                foreach($listcategory as $key=> $value){
                    if($parentid==$value['id']){
                        $myarr.=$value['id'].'/';
                        $myarr.=findrt($listcategory,$value['parentid']);
                        break;
                    }
                }
                return $myarr;
            }
        }
        $myarr = findrt($listcategory,$catid);
        $myarr  = explode('/',$myarr);
        sort ($myarr);
        ?>
        <ul>
            <?php foreach($myarr as $key=>$value){
                $info =  $this->Mitq_category->getTitlebyid($value);
                $title = $info['title'];
                ?>

            <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a rel="nofollow" href="<?php echo $info['type_category'].$info['id']?>" title="Đồ thờ cúng ngọc duyên" itemprop="url"><span itemprop="title"><?php if($info['id']==1){echo'Đồ thờ cúng Ngọc Duyên';}else{ echo $info['title'];} ?></span></a>
            </li>
            <li class="spacebar">»</li>
            <?php }?>
        </ul>
    </section>
    <section class="q-detail-product">
        <section class="q-slide">
            <div id="examples">
                <ul id="etalage">
                    <?php   if(isset($imagesproduct) && count($imagesproduct)){foreach( $imagesproduct as $key=>$value){?>
                    <li>
                        <a href="optionallink.html">
                            <img class="etalage_thumb_image" src="<?php echo $value['url']; ?>" />
                            <img class="etalage_source_image" src="<?php echo $value['url']; ?>" title="This is an optional description." />
                        </a>
                    </li>
                    <?php } }    ?>
                </ul>
            </div>
        </section>
        <!--q-slide-->
        <?php
            //echo '<pre>';
           //print_r($sameproduct);
            //echo '</pre>';
        ?>
        <section class="q-cost-product">
            <h3 class="title-product"> <?php echo $infoproduct['title'];?> </h3>
            <p class="price-product"> Giá bán: <?php echo number_format($infoproduct['price'])?>đ</p>
            <p class="priceold-product"> Giá cũ: <?php echo number_format($infoproduct['priceold'])?>đ</p>
            <p class="descript-product"><?php echo $infoproduct['description']?> </p>
            <a class="buy-product" href="frontend/home/buy/<?php echo $infoproduct['id'];?>">Mua Hàng</a>
        </section>
        <!--q-cost-product-->
        <section class="clear"></section>
    </section>
    <!--q-detail-product-->
    <section class="q-info-product">
        <div class="span12" style="width: 100%;margin-left: 0px">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#javascript">Nội dung</a></li>
                <li><a href="#HTML">Ý kiến khách hàng</a></li>
                <li><a href="#CSS">sản phẩm khác</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="javascript">
                    <?php echo $infoproduct['content'];?>
                </div>

                <div class="tab-pane" id="HTML">
                    Sơn Hải cam kết phục vụ:
                    1- Hàng hóa đảm bảo chất lượng, xuất xứ rõ ràng, đa dạng, phong phú với nhiều mức giá khác nhau.
                    2- Giá cả minh bạch, cạnh tranh nhất. Thông tin chi tiết về giá của tất cả sản phẩm xin truy cập website: dothosonhai.com.
                    3- Các sản phẩm đều được bảo hành. Thông tin chi tiết về thời hạn bảo hành của tất cả sản phẩm xin truy cập website: dothosonhai.com.
                    4- Trong thời gian 7 ngày sau ngày mua, khách hàng đổi hoặc trả lại hàng hóa còn nguyên trạng không bị khấu trừ tiền.
                    5- Vận chuyển miễn phí trong cự ly 20 km; hỗ trợ chuyển hàng toàn quốc (khách hàng trả phí vận chuyển).
                    Xin trân trọng cám ơn!
                </div>

                <div class="tab-pane" id="CSS">
                    <ul class="list-product">
                        <?php foreach($sameproduct as $key=>$value){?>
                        <li class="item-product">
                            <figure>
                                <a href="frontend/home/detailproduct/<?php echo $value['id'];?>"><img src="<?php echo $value['image'];?>"></a>
                                <a href="frontend/home/buy/<?php echo $infoproduct['id'];?>" class="addcart"><i class="fa fa-shopping-cart"></i></a>
                                <?php if($value['new']==1){echo '<span class="product-new"><img src="upload/images/New.gif"></span>';}?>
                                <?php if($value['buy-best']==1){echo '<span class="product-best">Bán chạy</span>';}?>
                                <figcaption>
                                    <h4 class="grow-15"> <?php echo $value['title'];?></h4>
                                    <p class="grow-13"> gia ban: <?php echo number_format($value['price']);?></p>
                                </figcaption>
                            </figure>
                        </li>
                        <?php   } ?>

                    </ul>

                </div>
            </div><!--End Tab Content-->
        </div>
        <section class="clear"></section>
    </section>
</section>
<!--q-container-->