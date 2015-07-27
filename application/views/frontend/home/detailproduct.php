<?php
echo '<pre>';
//print_r($infoproduct);
//print_r($listcategoryProduct);
echo '</pre>';
?>
<?php
$parentid = $this->Mitq_category->getParentidById($catid);
$parentid= $parentid['parentid'];
function findrt($listcategory,$parentid=0){
    $myarr = '';
    if($parentid==0){
        return 0;
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
$myarr = findrt($listcategoryProduct,$infoproduct['categoryid']);
$myarr  = explode('/',$myarr);
foreach ($myarr as $key => $value) {
    $breatcame[$key] = $this->model_frontend->getCategoryByID($value);
}
foreach ($breatcame as $key => $value) {
    if(!empty($breatcame[$key]['alias'])){
        $breatcame[$key]['link'] = $value['alias'].'-'.$value['type_category'].'-'.$value['id'].'.html';
    }else{
        $breatcame[$key]['link']='#';
        $breatcame[$key]['title']='Trang Chủ';
    }
}
sort($breatcame);
?>

<div class="wrap">
    <div class="content">
        <div class="bq-content">
            <div class="details-page">
                <div class="back-links">
                    <ul>
                        <?php foreach($breatcame as $key=>$value){?>
                        <li><a href="<?php echo $value['link']?>"><?php echo $value['title']?></a><img src="public/template/frontend/images/arrow.png" alt=""></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="detalis-image">
                <ul id="etalage">
                    <?php   if(isset($imagesproduct) && count($imagesproduct)){foreach($imagesproduct as $key=>$value){ ?>
                        <li>
                            <img class="etalage_thumb_image" src="<?php echo $value['url']?>" />
                            <img class="etalage_source_image" src="<?php echo $value['url']?>" title="This is an optional description." />
                        </li>
                    <?php   }   }   ?>
                </ul>

            </div>
            <div class="detalis-image-details">
                <div class="details-categories">
                    <ul>
                        <li><h3>Category:</h3></li>
                        <li class="active1"><a href="#"><span>Nokia Mobiles</span></a></li>
                        <li><a href="#">HTC Mobiles</a></li>
                        <li><a href="#">Iphone Mobiles</a></li>
                        <li><a href="#">Zen Mobiles</a></li>
                    </ul>
                </div><br>
                <div class="brand-value">
                    <h3><?php echo $infoproduct['title']?></h3>
                    <div class="left-value-details">
                        <ul>
                            <li>Price:</li>
                            <li><span><?php echo number_format($infoproduct['priceold']) ?></span></li>
                            <li><h5><?php echo number_format($infoproduct['price'])?>đ</h5></li>
                            <br>
                            <li><p>Not rated</p></li>
                        </ul>
                    </div>
                    <div class="right-value-details">
                        <a href="#">Instock</a>
                        <p>No reviews</p>
                    </div>
                    <div class="clear"> </div>
                </div>
                <div class="brand-history">
                    <h3>Description :</h3>
                    <p><?php echo $infoproduct['description']?></p>
                    <a href="them-vao-gio-hang/<?php echo $infoproduct['alias'].'/'.$infoproduct['id'].'.html'?>">Addcart</a>
                </div>
                <div class="share">
                    <ul>

                    </ul>
                </div>
                <div class="clear"> </div>
            </div>
            <div class="clear"> </div>
            <div class="menu_container">
                <p class="menu_head">About Product<span class="plusminus">+</span></p>
                <div class="menu_body" style="display: none;">
                    <p><?php echo $infoproduct['content']?></p>
                </div>
                <p class="menu_head">About Product<span class="plusminus">+</span></p>
                <div class="menu_body" style="display: none;">
                    <p>theonlytutorials.com is providing a great varitey of tutorials and scripts to use it immediate on any project!</p>
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
    </div>
    <section class="clear"></section>
</div>
