<ul>
<?php echo common_showerror(validation_errors());?>
</ul>
<?php
//echo '<pre>';
//print_r($info);
//echo '</pre>';
?>

<form class="col-lg-10"  action="backend/user/created" method="post" >
    <div class="col-lg-7">
        <label>Username</label>
        <input class="form-control" type="text" name="username" value="<?php echo isset($info['username'])?htmlspecialchars($info['username']):''?>" placeholder="username">
    </div>
    <div class="col-lg-3">
        <label>Lựa chọn nhóm</label>
        <select class="col-lg-12" name="group">
        <?php foreach($optiongroup as $key => $value){?>
            <option value="<?php echo $value['id'];?>"><?php echo $value['title'];?></option>
        <?php }?>
        </select>
    </div>
    <div class="col-lg-7">
        <label>Password</label>
        <input class="form-control" type="password" name="password" value="<?php echo isset($info['password'])?htmlspecialchars($info['password']):''?>" placeholder="mật khẩu">
    </div>

    <div class="col-lg-7">
        <label>Nhập lại password</label>
        <input class="form-control" type="password" name="repassword" value="<?php echo isset($info['repassword'])?htmlspecialchars($info['repassword']):''?>" placeholder="nhập lại mật khẩu">
    </div>
    <div class="col-lg-7">
        <label>Email</label>
        <input class="form-control" type="email" name="email" value="<?php echo isset($info['email'])?htmlspecialchars($info['email']):''?>" placeholder="địa chỉ hòm thư điện tử">
    </div>
    <div class="col-lg-7">
        <label>Full name</label>
        <input class="form-control" type="text" name="fullname" value="<?php echo isset($info['fullname'])?htmlspecialchars($info['fullname']):''?>" placeholder="tên đầy đủ">
    </div>
    <div class="col-lg-5">
        <label class="col-lg-12">thực thi</label>
        <input type="submit" name="Save" value="Save"/>
        <button type="reset" class="btn btn-default">Reset Button</button>
        <section class="clear"></section>
    </div>

</form>