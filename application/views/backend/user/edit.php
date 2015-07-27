<ul>
<?php echo common_showerror(validation_errors());?>
</ul>
<?php

?>

<form class="col-lg-10"  action="backend/user/edit/<?php echo $info['id']?>" method="post" >
    <div class="col-lg-7">
        <label>Thay đổi thông tin: <?php echo htmlspecialchars($info['username'])?></label>
    </div>
    <div class="col-lg-3">
        <label>Lựa chọn nhóm</label>
        <select class="col-lg-12" name="groupid">
        <?php foreach($optiongroup as $key => $value){?>
            <option value="<?php echo $value['id']?>" <?php if($info['groupid']==$value['id']){echo 'selected';}?>><?php echo $value['title'];?></option>
        <?php }?>
        </select>
    </div>
    <div class="col-lg-7">
        <label>Email</label>
        <input class="form-control" type="email" name="email" value="<?php echo isset($_post['email'])?htmlspecialchars($_post['email']):$info['email']?>" placeholder="địa chỉ hòm thư điện tử">
    </div>
    <div class="col-lg-7">
        <label>Full name</label>
        <input class="form-control" type="text" name="fullname" value="<?php echo isset($_post['fullname'])?htmlspecialchars($_post['fullname']):$info['fullname']?>" placeholder="tên đầy đủ">
    </div>
    <div class="col-lg-5">
        <label class="col-lg-12">thực thi</label>
        <input type="submit" name="edit" value="edit">
        <button type="reset" class="">Reset Button</button>
    </div>
</form>