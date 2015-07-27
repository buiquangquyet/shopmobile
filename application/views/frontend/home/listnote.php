<div class="wrap">
    <div class="bq-content">
        <div class="content-grids">
            <div class="blog">
                <div class="blog-grid">
                    <h4>Blog</h4>
                    <?php   if(isset($listNote) && count($listNote)){foreach($listNote as $key =>$value){?>
                    <div class="blog-grid-header">
                        <h3><?php echo $value['title'];?></h3>
                        <ul>
                            <li><img src="public/template/frontend/images/cal.png" alt=""><a href="#"><?php echo $value['creattime']?></a></li>
                            <li><img src="public/template/frontend/images/admin.png" alt=""><a href="#">Admin</a></li>
                        </ul>
                    </div>
                    <div class="image group">
                        <div class="grid images_3_of_1">
                            <img src="<?php echo $value['image']?>">
                        </div>
                        <div class="grid span_2_of_3">
                            <p><?php echo $value['description']?></p>
                            <div class="button"><span><a href="<?php echo $value['link'];?>">Read More</a></span></div>
                        </div>
                    </div>
                    <?php   }   }   ?>
                </div>
            </div>
        </div>
    </div>

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
    <div class="clear"> </div>
</div>