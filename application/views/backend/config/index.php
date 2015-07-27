<?php
echo $group;
    $arr = array(
        'seo'=>'SEO',
        'frontend'=>'trang chủ',
        'contact'=>'Thông tin liên hệ',
    );
echo '<ul class="itq-config">';
foreach($arr as $key=>$value){
    echo '<li'.(($group == $key)?'class="active"':'') .'><a href="backend/config/index/'.$key.'" title="Cấu hình'.$value.'">'.$value.'</a></li>';
}
echo '</ul>';
?>

<form method="post" action="" class="col-lg-8">
    <section class="main-panel main-panel-single">
        <header>Thông tin chung</header>
            <?php if(isset($_config) && count($_config)){ foreach($_config as $keyConfig => $valConfig){ ?>
                <?php if($valConfig['type'] == 'text'){ ?>
                    <label class="col-lg-12">
                        <p><?php echo $valConfig['label']?>:</p>
                        <input class="col-lg-12" type="text" name="<?php echo $valConfig['keyword'];?>" value="<?php echo common_valuepost(isset($_post[$valConfig['keyword']])?$_post[$valConfig['keyword']]:$valConfig['value']);?>"  />
                    </label>
                <?php } else if($valConfig['type'] == 'textarea'){ ?>
                    <label class="col-lg-12">
                        <p><?php echo $valConfig['label']?>:</p>
                        <textarea class="form-control" name="<?php echo $valConfig['keyword'];?>" ><?php echo common_valuepost(isset($_post[$valConfig['keyword']])?$_post[$valConfig['keyword']]:$valConfig['value']);?></textarea>
                    </label>
                <?php } else if($valConfig['type'] == 'editor'){ ?>
                    <label class="col-lg-12">
                        <p><?php echo $valConfig['label']?>:</p>
                        <textarea name="<?php echo $valConfig['keyword'];?>" class="ckeditor"><?php echo common_valuepost(isset($_post[$valConfig['keyword']])?$_post[$valConfig['keyword']]:$valConfig['value']);?></textarea>
                    </label>
                <?php } else if($valConfig['type'] == 'radio'){ ?>
                    <section class="checkbox-radio">
                        <p><?php echo $valConfig['label']?>:</p>
                        <section class="group">
                            <label style="margin-bottom: 0px;"><input type="radio" name="<?php echo $valConfig['keyword'];?>" value="1" <?php echo (($valConfig['value'] == 1)?'checked="checked"':'');?> /><span>Có</span></label>
                            <label style="margin-bottom: 0px;"><input type="radio" name="<?php echo $valConfig['keyword'];?>" value="0" <?php echo (($valConfig['value'] == 0)?'checked="checked"':'');?> /><span>Không</span></label>
                        </section>
                    </section>
                <?php } ?>
            <?php } } ?>
            <section class="action">
                <p class="label">Thao tác:</p>
                <section class="group">
                    <input type="submit" name="change" value="Thay đổi"/>
                    <input type="reset" value="Làm lại"/>
                </section>
            </section>
    </section><!-- .main-panel -->
</form>

