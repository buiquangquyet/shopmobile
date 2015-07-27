<form class="form-signin" method="post" action="">
    <h2 class="form-signin-heading">Đăng Ký Thành Viên</h2>
    <?php echo common_showerror(validation_errors());?>
    <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo isset($_post['username'])?common_valuepost($_post['username']):''?>">
    <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo isset($_post['password'])?common_valuepost($_post['password']):''?>">
    <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo isset($_post['email'])?common_valuepost($_post['email']):''?>">
    <input type="submit" name="register" value="Tạo Mới" class="btn btn-lg btn-primary btn-block"/>
</form>
<nav class="login">
    <ul>
        <li><a href="<?php echo ITQ_BASE_URL;?>backend/auth/index" title="Về trang chủ">Về Trang Chủ</a></li>
    </ul>
</nav>
<footer>
    <span> Copyright &copy; <?php echo gmdate('Y');?> by <a href="http://www.itq.vn" title="thiết kế Website, dịch vụ SEO" target="_blank">ITQ</a></span>
</footer>