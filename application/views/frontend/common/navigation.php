<div class="header_bottom">
    <div class="menu">
        <ul>
            <?php
            $listMenu = $this->model_frontend->getMenu();
            if(is_array($listMenu)){
                foreach($listMenu as $key =>$value){
                    echo '<li><a href="'.$value['alias'].'-'.$value['type_category'].'-'.$value['id'].'.html">'.$value['title'].'</a></li>';
                }
            }
            ?>
            <div class="clear"></div>
        </ul>
    </div>
    <div class="clear"></div>
</div>