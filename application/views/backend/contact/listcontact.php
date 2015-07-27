<div id="page-wrapper" style="min-height: 724px">
    <div class="panel panel-default">
        <div class="panel-heading">
            danh sách ý kiến khách hàng
        </div>
        <div class="panel-body">
            <div class="col-lg-6">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Delete</th>
                        <th>email</th>
                        <th>tên</th>
                        <th>số điện thoại</th>
                        <th>Comment</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($listContact) && count($listContact)){foreach($listContact as $key=>$value){?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><a href="backend/contact/deletecontact/<?php echo $value['id']?>" onclick="return confirm('bạn chắc chắn xóa ý kiến khách hàng')"> Xóa</a></td>
                        <td><?php echo $value['email'];?></td>
                        <td><?php echo $value['name'];?></td>
                        <td><?php echo $value['telephone'];?></td>
                        <td><?php echo $value['contact'];?></td>
                    </tr>
                    <?php }     } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>