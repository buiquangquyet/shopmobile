<h4 style="margin-top: 20px"> search </h4>
<form action="frontend/home/search" method="get">
    <ul>
        <li><span class="fiel-search"> Tìm kiếm theo tên</span></li>
        <li><input type="text" name="titlesearch" value="" placeholder="Tìm theo tên"></li>
        <li><span class="fiel-search"> Tìm kiếm theo khoảng giá</span></li>
        <li>
            <select name="priceMin">
                <?php for($i=0; $i<=20; $i++){?>
                    <option value="<?php echo $i*1000000?>"><?php echo number_format($i*1000000);?></option>
                <?php } ?>
            </select>
            <span class="fiel-search"> đồng</span>
        </li>
        <li><span class="fiel-search"> đến </span></li>
        <li>
            <select name="priceMax">
                <?php for($i=0; $i<=50; $i=$i+2){?>
                    <option value="<?php echo $i*1000000?>"><?php echo number_format($i*1000000);?></option>
                <?php } ?>
            </select>
            <span class="fiel-search"> đồng</span>
        </li>
        <li>
            <span class="fiel-search"> Thực thi </span>
            <input class="btn btn-default" type="submit" value="search" name="search">
        </li>
    </ul>
</form>