<form role="form" method="post" action="">
    <?php
    echo validation_errors();//show ra lỗi validation nếu có
    ?>

    <div class="form-group">
        <label>Tên đăng nhập</label>
        <input class="form-control" type="text" disabled value="<?php echo isset($username)?$username:""?>">
        <p class="help-block">Tên đăng nhập là cố định không được thay đổi, bạn chỉ có thể đổi mật khẩu</p>
    </div>
    <div class="form-group">
        <label>Mật khẩu cũ</label>
        <input class="form-control" type="password" placeholder="Mật khẩu cũ" value="" name="oldpass">
    </div>

    <div class="form-group">
        <label>Mật khẩu mới</label>
        <input class="form-control"type="password" placeholder="Mật khẩu mới" value="" name="newpass">
    </div>
    <div class="form-group">
        <label>Xác thực lại mật khẩu mới</label>
        <input class="form-control" type="password" placeholder="Xác thực lại mật khẩu mới" value="" name="passauth">
    </div>


    <input type="submit" class="btn btn-default" value="Submit Button" name="editpass"/>
    <button type="reset" class="btn btn-default">Reset Button</button>
</form>