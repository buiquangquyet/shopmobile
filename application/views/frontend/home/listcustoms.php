<div class="portfolio-container" id="columns">
    <h1><?php echo $title;?></h1>
    <ul class="masoned" style="position: relative; height: 777px;">
        <?php if(isset($listCustoms) && count($listCustoms)){foreach($listCustoms as $key => $value){?>
        <li class="one-fourth" style="">
            <p>
                <a href="<?php echo $value['link']?>" class="portfolio-item-preview" title="Scream" rel="prettyPhoto"><img src="<?php echo $value['image']?>" alt="<?php echo $value['title']?>" width="210" height="145" class="portfolio-img pretty-box" style="opacity: 1;"></a>
            </p>
            <h4><a href="#">Worpdress Design</a></h4>

            <p>
                Lorem ipsum dolor sit amet, tollite fit manibus individuationis omnibus civitas ad quia.
            </p>
        </li>
        <?php   }   }   ?>
    </ul>
    <!--END ul-->
</div>
