<?php
$group_arr = array(
    'Đăng nhập' => array(
        'backend/auth/login' => 'Đăng nhập',
    ),
    'trang chủ' => array(
        'backend/home' => 'trang chủ',
        'backend/home/index' => 'trang chủ',
    ),
    'Tài khoản' => array(
        'backend/account' => 'Tài khoản',
        'backend/account/changeInfoUser' => 'Thay đổi thông tin',
        'backend/account/changePassUser' => 'Thay đổi mật khẩu',
    ),
    'Cấu hình' => array(
        'backend/config' => 'Cấu hình',
        'backend/config/index' => 'Cấu hình chung',
    ),

    'Bài viết' => array(
        'backend/note' => 'Bài viết',
        'backend/note/listnote' => 'Xem danh sách bài viết',
        'backend/note/item' => 'Xem bài viết',
        'backend/note/addnote' => 'Thêm bài viết',
        'backend/note/editnote' => 'Sửa bài viết',
        'backend/note/editnew' => 'Chuyển trang thái (mới)',
        'backend/note/editpublish' => 'Chuyển trang thái (công bố)',
        'backend/note/editis_banner' => 'Chuyển trang thái (banner)',
        'backend/note/editis_right' => 'Chuyển trang thái (cạnh)',
        'backend/note/editorder' => 'Chuyển thứ tự (cạnh)',
    ),
    'Thành viên' => array(
        'backend/user' => 'Thành viên',
        'backend/user/listuser' => 'danh sách thành viên',
        'backend/user/created' => 'Thêm thành viên',
        'backend/user/edit' => 'Sửa thành viên',
        'backend/user/delete' => 'Xóa thành viên',
    ),
    'Nhóm'=>array(
        'backend/group/addgroup' => 'Thêm thành viên',
        'backend/group/listgroup2' => 'Danh sách nhóm thành viên',
        'backend/group/edit' => 'Sửa nhóm thành viên',
        'backend/group/delete' => 'Xóa nhóm thành viên',
    ),
    'Sản Phẩm'=>array(
        'backend/product/addproduct' => 'Thêm sản phẩm',
        'backend/product/listproduct' => 'Danh sách sản phẩm',
        'backend/product/editproduct' => 'Sửa sản phẩm',
        'backend/product/deleteproduct' => 'Xóa sản phẩm',
        'backend/product/deleteimages' => 'Xóa ảnh sản phẩm',
        'backend/product/editpublish' => 'chuyển trạng thái(công bố)',
        'backend/product/editnew' => 'chuyển trạng thái(mới)',
        'backend/product/editbestbuy' => 'chuyển trạng thái(mua nhiều)',
        'backend/product/editis_banner' => 'chuyển trạng thái(banner)',
        'backend/product/editis_right' => 'chuyển trạng thái(Cạnh)',
        'backend/product/editorder' => 'chuyển thứ tự(trước sau)',
    ),
    'Thuộc tính - Loại'=>array(
        'backend/type/addtype' => 'Thêm loại',
        'backend/type/listtype' => 'Danh sách loại',
        'backend/type/edittype' => 'Sửa loại',
        'backend/type/deletetype' => 'Xóa nhóm loại',
    ),
    'Danh mục'=>array(
        'backend/category/addcategory' => 'Thêm danh mục',
        'backend/category/listcategory' => 'Danh sách danh mục',
        'backend/category/editcategory' => 'Sửa danh mục',
        'backend/category/deletecategory' => 'Xóa danh mục',
        'backend/category/editshowhome' => 'chuyển trạng thái(ra trang chủ)',
        'backend/category/editshowgrid' => 'chuyển trạng thái(nổi bật)',
        'backend/category/editshowright' => 'chuyển trạng thái(Bên phải)',
        'backend/category/editshowpublish' => 'chuyển trạng thái(công bố)',
    ),
    'ý kiến khách hàng'=>array(
        'backend/contact/listcontact' => 'danh sách ý kiến',
        'backend/contact/deleteContact' => 'xóa ý kiến khách hàng',
    ),
    'Đơn hàng'=>array(
        'backend/cart/listcart' => 'danh sách đơn hàng',
        'backend/cart/editstatus' => 'Chuyển trạng thái(đơn hàng)',
        'backend/cart/detail' => 'chi tiết đơn hàng',
        'backend/cart/del' => 'xóa đơn hàng',
    ),

);
?>
    <form method="post" action="">

    <?php echo common_showerror(validation_errors()); ?>
        <div class="col-lg-12">
            <label class="col-lg-12" for="inputSuccess">Tiêu đề</label>
            <input type="text" class="col-lg-6" id="inputSuccess" name="title" value="<?php echo common_valuepost(isset($_post['title'])?$_post['title']:'');?>">
        </div>
        <section class="checkbox-radio">
            <span>Trạng thái:</span>
            <section class="group">
                <label><input type="radio" name="allow" value="1" <?php echo common_valuepost(isset($_post['allow'])?(($_post['allow'] == 1)?'checked="checked"':''):'');?> /><span>Cho phép</span></label>
                <label><input type="radio" name="allow" value="0" <?php echo common_valuepost(isset($_post['allow'])?(($_post['allow'] == 0)?'checked="checked"':''):'');?>/><span>Không cho phép</span></label>
            </section>
        </section>
        <section class="checkbox-radio">
            <section>
                <?php if(isset($group_arr) && count($group_arr)){ foreach($group_arr as $keyGroup => $valGroup){ ?>
                    <fieldset style="border: 1px solid; margin-bottom: 5px">
                        <label style="color:#ff0709; width: 100px;font-size: 17px"><?php echo $keyGroup;?>:</label>
                        <?php if(isset($valGroup) && count($valGroup)){ foreach($valGroup as $keyItem => $valItem){ ?>
                            <label><input type="checkbox" name="group[]" value="<?php echo $keyItem;?>" /><span><?php echo $valItem;?></span></label>
                        <?php } } ?>
                    </fieldset>
                <?php } } ?>
            </section>
        </section>
        <div class="col-lg-5">
            <label>thực thi</label>
            <input type="submit" name="save" value="Save" />
            <button type="reset" class="btn btn-default">Reset Button</button>
        </div>
    </form>