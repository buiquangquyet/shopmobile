<form class="form-signin" method="post" action="">
    <h2 class="form-signin-heading">Lấy Lại thông tin hệ thống</h2>
    <ul class="error">
        <?php echo common_showerror(validation_errors());?>
    </ul>

    <input type="email" class="form-control" placeholder="email" name="email" value="<?php echo isset($_post['email'])?common_valuepost($_post['email']):''?>">

    <input type="submit" name="forgot" value="forgot" class="btn btn-lg btn-primary btn-block"/>
</form>
<nav class="login">
    <ul>
        <li><a href="#" title="Về trang chủ">Về Trang Chủ</a></li>
        <li><a href="<?php echo ITQ_BASE_URL;?>backend/auth/login" title="Về đăng nhập">Về đăng nhập</a></li>
    </ul>
</nav>
<footer>
    <span> Copyright &copy; <?php echo gmdate('Y');?> by <a href="http://www.itq.vn" title="thiết kế Website, dịch vụ SEO" target="_blank">ITQ</a></span>
</footer>