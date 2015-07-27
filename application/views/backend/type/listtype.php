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
                        <th>Delete</th>
                        <th>title</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(isset($listtype)  &&  count($listtype)){foreach($listtype as $key=>$value){?>
                    <tr>
                        <td><a href="backend/type/editType/<?php echo $value['id']?>"> Sửa</a></td>
                        <td><a href="backend/type/deleteType/<?php echo $value['id']?>" onclick="return confirm('bạn chắc chắn xóa thuộc tính')"> Xóa</a></td>
                        <td><?php echo $value['title']?></td>
                    </tr>
                <?php   }  }?>
                </tbody>
            </table>
        </div>
    </div>
</div>