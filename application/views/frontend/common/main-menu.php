<div class="top-header">
    <div class="wrap">
        <!----start-logo---->
        <div class="logo">
            <a href="trang-chu.html"><img src="public/template/frontend/images/logo.png" title="logo" /></a>
        </div>
        <!----end-logo---->
        <!----start-top-nav---->
        <div class="top-nav">
            <ul>
                <?php   $listMenuNav=$this->model_frontend->getMenu();
                if(isset($listMenuNav) && count($listMenuNav)){foreach($listMenuNav as $key=>$value){?>
                    <li><a href="<?php echo $value['alias'].'-'.$value['type_category'].'-'.$value['id']?>.html"><?php echo $value['title']?></a></li>
                <?php    }  }   ?>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>