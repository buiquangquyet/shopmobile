<?php if(isset($CatBoder) && count($CatBoder)){?>
<div class="header_slide">
    <div class="header_bottom_left">
        <div class="categories">
            <ul>
                <h3>Categories</h3>
                <?php foreach($CatBoder as $value){?>
                <li><a href="<?php echo $value['alias'].'-'.$value['type_category'].'-'.$value['id'].'.html'?>" title="<?php echo $value['title']?>"><?php echo $value['title']?></a></li>
                <?php } ?>

            </ul>
        </div>
    </div>
    <div class="header_bottom_right">
        <div class="slider">
            <div id="owl-demo" class="owl-carousel">
                <?php if(isset($Banner)){
                    foreach($Banner['note'] as $key=>$value){
                        ?>
                        <div class="item">
                            <figure class='home-slide'>
                                <img src="<?php echo $value['image']?>" alt="<?php echo $value['title']?>"/>
                                <section class="mark"></section>
                                <figcaption>
                                    <h3 class="h3-slide"><?php echo $value['title'];?></h3>
                                    <a class="slide-note" href="<?php echo $value['link']?>"> Xem chi tiết </a>
                                </figcaption>
                            </figure>
                        </div>
                    <?php
                    }
                }?>
                <?php if(isset($Banner)){
                    foreach($Banner['product'] as $key=>$value){
                        ?>
                        <div class="item">
                            <figure class='home-slide'>
                                <img src="<?php echo $value['image']?>" alt="The Last of us">
                                <figcaption>
                                    <h3 class="h3-slide"><?php echo $value['title'];?></h3>
                                    <span class="slide"><?php echo $value['description'];?></span>
                                    <a class="slide-note" href="<?php echo $value['link']?>"> Xem chi tiết </a>
                                </figcaption>   
                            </figure>   
                        </div>
                    <?php
                    }
                }?>
            </div>
            <div class="clear"></div>
        </div>
        <section class="sidebar-right">
            <h3 class="h3-search"> Tìm Kiếm </h3>
            <section class="search-right">
                <form action="frontend/home/search" method="get">
                    <ul>
                        <li><span class="fiel-search"> Tìm kiếm theo tên</span></li>
                        <li><input type="text" name="titlesearch" value="" placeholder="Tìm theo tên"></li>
                        <li><span class="fiel-search"> Tìm kiếm theo khoảng giá</span></li>
                        <li>
                            <select name="priceMin">
                                <?php for($i=0;$i<=50; $i++){?>
                                    <option value="<?php echo $i*1000000;?>"><?php echo ($i==0)?$i:number_format($i.'000000'); ?></option>
                                <?php }?>
                            </select>
                            <span class="fiel-search"> đồng</span>
                        </li>
                        <li><span class="fiel-search"> đến </span></li>
                        <li>
                            <select name="priceMax">
                                <?php for($i=0;$i<=50; $i++){?>
                                    <option value="<?php echo $i*1000000;?>"><?php echo ($i==0)?$i:number_format($i.'000000'); ?></option>
                                <?php }?>
                            </select>
                            <span class="fiel-search"> đồng</span>
                        </li>
                        <li>
                            <span class="fiel-search"> Thực thi </span>
                            <input class="btn btn-default" type="submit" value="search" name="search">
                        </li>
                    </ul>
                </form>
            </section>
            <!--search-right-->
            <h3 class="h3-search"> Thống kê truy cập </h3>
            <section class="view-info">
                <ul>
                    <li><span class="fiel-search"> Số lượt đang truy cập </span></li>
                    <li><span class="fiel-search"> <?php echo $countUserOnline; ?> </span></li>
                    <li><span class="fiel-search"> Tổng Số lượt đang truy cập </span></li>
                    <li><span class="fiel-search"> <?php print_r($countUserView); ?> </span></li>
                    <section class="clear"></section>
                </ul>
                <section class="clear"></section>
            </section>
            <section class="clear"></section>
            <!--view-info-->
        </section>
        <!-- clo-right -->
        <section class="clear"></section>
    </div>
    <div class="clear"></div>
</div>
<?php }else{echo '';}?>