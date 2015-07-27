<?php
echo '<pre>';
//print_r($CatHome);
echo '</pre>';
?>
<!--start-image-slider---->
<div class="wrap">
    <div class="image-slider">
        <!-- Slideshow 1 -->
        <ul class="rslides" id="slider1">
            <?php if(count($banner) && isset($banner)){foreach($banner as $key =>$value){?>
            <li><a href="<?php echo $value['link']?>"><img src="<?php echo $value['image']?>" style="height: 405px" alt="<?php echo $value['title']?>"></a></li>
            <?php   }   }   ?>
        </ul>
        <!-- Slideshow 2 -->
    </div>
    <!--End-image-slider---->
</div>
<div class="clear"> </div>
<div class="wrap">
    <div class="content">
            <div class="top-3-grids">
                <div class="section group">
                    <?php
                    if(isset($gird) && count($gird)){foreach($gird as $key =>$value){?>
                        <div class="grid_1_of_3 images_1_of_3">
                            <a href="<?php echo $value['link']?>"><img class="gird" src="<?php echo $value['image'];?>"></a>
                            <h3><?php echo $value['title']?> </h3>
                        </div>
                    <?php } }   ?>
                </div>
            </div>
            <section class="bq-content">
                <?php if(isset($CatHome) && count($CatHome)){foreach($CatHome as $key=>$value){?>
                    <div class="content-grids">
                        <h4><?php echo $value['title']?></h4>
                        <div class="section group">
                            <?php   if(isset($value['listProduct']) && count($value['listProduct'])){ foreach($value['listProduct'] as $key1=>$value1){?>
                                <div class="grid_1_of_4 images_1_of_4 products-info">
                                    <img src="<?php echo $value1['image']?>">
                                    <a href="san-pham/<?php echo $value1['alias'].'/'.$value1['id'].'.html'?>"><?php echo $value1['title']?></a>
                                    <h3><?php echo number_format($value1['price']);?>đ</h3>
                                    <ul>
                                        <li><a  class="cart" href="them-vao-gio-hang/<?php echo $value1['alias'].'/'.$value1['id'].'.html'?>"> </a></li>
                                        <li><a  class="i" href="san-pham/<?php echo $value1['alias'].'/'.$value1['id'].'.html'?>"> </a></li>
                                    </ul>
                                </div>
                            <?php   }   }   ?>
                        </div>
                    </div>
                <?php } } ?>
            </section><!--bq-content-->
        <div class="content-sidebar">
            <h4>Categories</h4>
            <ul>
                <?php
                if(isset($catRightProduct) && count($catRightProduct)){ foreach($catRightProduct as $key=>$value){?>
                <li><a href="<?php echo $value['link'];?>"><?php echo $value['title']?></a></li>
                <?php } }   ?>
            </ul>
            <?php $this->load->view('frontend/common/search');?>
        </div>
    </div>
    <div class="clear"> </div>
</div>
