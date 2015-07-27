<script type="text/javascript">
    $(document).ready(function($){
        $('#mega-menu-tut').dcMegaMenu({
            rowItems: '3',
            speed: 'fast'
        });
    });
</script>

<div class="top-header">
    <div class="wrap">
        <!----start-logo---->
        <div class="logo">
            <a href="trang-chu.html"><img src="public/template/frontend/images/logo.png" title="logo"></a>
        </div>
        <!----end-logo---->
        <!----start-top-nav---->
        <div class="dcjq-mega-menu">
            <ul id="mega-menu-tut" class="menu">
                <?php   $listMenuNav=$this->model_frontend->getMainMenu();?>
                <?php if(isset($listMenuNav) && count($listMenuNav)){   foreach($listMenuNav as $key1=>$value1){if($value1['is-menu']==1){?>
                <li class=""><a href="<?php echo $value1['url']?>"><?php echo $value1['title']?></a>
                    <div class="sub-container mega" style="left: 0px; top: 40px; z-index: 1000;">
                        <ul class="sub" style="display: none;">
                        <?php foreach ($listMenuNav as $key2 => $value2){ if($value2['parentid']==$value1['id']){?>
                            <div class="row" style="">
                                <li id="menu-item-1" class="mega-unit mega-hdr" style=" background: url(<?php echo $value2['image'];?>) no-repeat 91% 32%;background-size: 130px 154px;">
                                    <a href="<?php echo $value2['url']?>" class="mega-hdr-a" style="height: 16px;"><?php echo $value2['title']?></a>
                                    <ul>
                                        <?php foreach($listMenuNav as $key3=> $value3){if($value3['parentid']==$value2['id']){?>
                                            <li><a href="<?php echo $value3['url']?>"><?php echo $value3['title']?></a></li>
                                        <?php   }   }   ?>
                                    </ul>
                                </li>
                            </div>
                        <?php  }   }?>
                        </ul>
                    </div>
                </li>
                <?php   }    }  };  ?>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php
//print_r($listMenuNav);
?>