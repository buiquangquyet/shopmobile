<div class="panel panel-default">
    <div class="panel-heading">
        danh sách thuộc tính
    </div>
    <div class="panel-body">
        <div class="col-lg-6">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>image</th>
                    <th>title</th>
                    <th>phân cấp</th>
                    <th>Delete</th>

                </tr>
                </thead>
                <tbody>
                <?php if(isset($listBanner)  &&  count($listBanner)){foreach($listBanner as $key=>$value){?>
                    <tr>
                        <td><a href="backend/banner/editbanner/<?php echo $value['id']?>"> Sửa</a></td>
                        <td><img src="<?php echo $value['image']?>"style="max-width:640px; height: 200px" alt="<?php echo $value['title']?>"></td>
                        <td><?php echo $value['title']?></td>
                        <td><?php echo $value['division']?></td>
                        <td><a href="backend/banner/deletebanner/<?php echo $value['id']?>" onclick="return confirm('bạn chắc chắn xóa')"> Xóa</a></td>
                    </tr>
                <?php   }  }?>
                </tbody>
            </table>
        </div>
    </div>
</div>