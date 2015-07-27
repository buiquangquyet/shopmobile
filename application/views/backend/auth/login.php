<form class="form-signin" method="post" action="">
    <h2 class="form-signin-heading">Đăng nhập hệ thống</h2>
<!--    c1-->
<!--    <ul class="error">-->
<!--        --><?php //echo validation_errors(); ?>
<!--    </ul>-->
<!--    c2-->

    <?php echo common_showerror(validation_errors());?>
    <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo isset($_post['username'])?common_valuepost($_post['username']):''?>">
    <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo isset($_post['password'])?common_valuepost($_post['password']):''?>">
    <div class="checkbox">
        <label>
            <input type="checkbox" value="1" name="checkbox"> Remember me
        </label>
    </div>
    <input type="submit" name="login" value="login" class="btn btn-lg btn-primary btn-block"/>
</form>
<nav class="login">
    <ul>
        <li><a href="#" title="Về trang chủ">Về Trang Chủ</a></li>
        <li><a href="<?php echo ITQ_BASE_URL;?>backend/auth/forgot" title="Quên Mật Khẩu">Quên mật khẩu</a></li>
    </ul>
</nav>
<footer>
    <span> Copyright &copy; <?php echo gmdate('Y');?> by <a href="http://www.itq.vn" title="thiết kế Website, dịch vụ SEO" target="_blank">ITQ</a></span>
</footer>