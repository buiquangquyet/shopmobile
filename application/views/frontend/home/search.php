<?php
//print_r($listProduct);
?>
<div class="wrap">
    <div class="content_top">
        <div class="heading">
            <h1>Search</h1>
        </div>
        <div class="see">

        </div>
        <div class="clear"></div>
    </div>
    <div class="bq-content">
        <?php if(isset($listProduct) && count($listProduct)){foreach($listProduct as$key =>$value){
            ?>
        <div class="grid_1_of_4 images_1_of_4">
            <a href="<?php echo $value['link'];?>"><img src="<?php echo $value['image']?>" alt="<?php echo $value['title']?>"></a>
            <h2><?php echo $value['title']?></h2>
            <div class="price-details">
                <div class="price-number">
                    <p><span class="rupees"><?php echo number_format($value['price']);?>đ</span></p>
                </div>
                <div class="add-cart">
                    <h4><a href="<?php echo $value['cart']?>">Add to Cart</a></h4>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <?php   }   }   ?>
    </div>
    <!--bq-content-->
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
<section class="clear"></section>
</div>

<section class="pagination">
    <ul class="pagination"><?php echo $this->pagination->create_links();?></ul>
</section>