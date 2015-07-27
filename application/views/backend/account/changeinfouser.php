<form role="form" method="post" action="">
    <?php
    echo validation_errors();//show ra lỗi validation nếu có
    ?>

    <div class="form-group">
        <label>Tên đăng nhập</label>
        <input class="form-control" type="text" disabled value="<?php echo isset($username)?$username:""?>">
        <p class="help-block">Tên đăng nhập là cố định không được thay đổi bạn chỉ có thể đổi các thông tin khác</p>
    </div>
    <div class="form-group">
        <label>Tên đầy đủ</label>
        <input class="form-control" placeholder="tên đầy đủ" value="<?php echo isset($fullname)?$fullname:""?>" name="fullname">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input class="form-control" placeholder="email" value="<?php echo isset($email)?$email:""?>" name="email">
    </div>

    <div class="form-group">
        <label>File input</label>
        <input type="file">
    </div>

    <input type="submit" class="btn btn-default" value="Submit Button" name="editinfo"/>
    <button type="reset" class="btn btn-default">Reset Button</button>
</form>