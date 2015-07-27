<div class="wrap">
    <div class="content">
        <div class="about">
            <h4><?php echo $titleCate; ?></h4>
            <div class="section group">
                <div class="section group">
                    <div class="cont span_2_of_3">
                        <h3><?php echo $infoNote['title'];?></h3>
                        <p><?php echo $infoNote['description'];?></p>
                        <p><?php echo $infoNote['content'];?></p>
                    </div>
                    <div class="rsidebar span_1_of_3 about-frist">
                        <h3>Tin liên quan</h3>
                        <ul>
                            <?php if(isset($listNote) && count($listNote)){foreach($listNote as $key=>$value){?>
                            <li><a href="<?php echo $value['link']?>"><?php echo $value['title']?></a></li>
                            <?php } } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//print_r($listNote);
?>