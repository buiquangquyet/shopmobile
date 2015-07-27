<form method="post" action="">
    <div class="col-lg-6">
        <input type="text" class="col-lg-6" name="txtsearch" value="<?php echo isset($like)?$like:'';?>">
        <input type="submit" class="col-lg-2" name="search" value="search">
    </div>
</form>

<div class="col-lg-12">
    <h2>Danh sách user </h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>Sửa</th>
                <th>Tên đăng nhập</th>
                <th>Tên đầy đủ</th>
                <th>Group</th>
                <th>Email</th>
                <th>Người Khởi tạo</th>
                <th>Thời gian khởi tạo</th>
                <th>Thời gian cập nhật</th>
                <th>Xóa</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($listuser as $key=>$value){?>
                <tr>
                    <td><?php echo $value['id']?></td>
                    <td><a href="<?php ITQ_BASE_URL?>backend/user/edit/<?php echo $value['id']?>" title="cập nhận thông tin user" ><i class="fa fa-pencil-square-o"></i></a></td>
                    <td><?php echo $value['username']?></td>
                    <td><?php echo $value['fullname']?></td>
                    <td><?php echo $value['title']?></td>
                    <td><?php echo $value['email']?></td>
                    <td><?php echo $value['usercreat']?></td>
                    <td><?php echo $value['creattime']?></td>
                    <td><?php echo $value['updatetime']?></td>
                    <td><a href="<?php ITQ_BASE_URL?>backend/user/delete/<?php echo $value['id']?>" title="xóa user" onclick="return confirm('Bạn có chắc chắn xóa?');"><i class="fa fa-times"></i></a></td>
                </tr>
            <?php }?>
            </tbody>
        </table>
        <section class="pagination">
            <ul class="pagination"><?php echo $this->pagination->create_links();?></ul>
        </section>
    </div>
</div>
