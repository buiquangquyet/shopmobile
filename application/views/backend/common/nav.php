<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="backend/home/index">Hệ thống Quản trị</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> - <?php $user = $this->my_auth->check(); echo isset($user['fullname'])?$user['fullname']:"";?>  <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="backend/account/changeinfouser" title="Thông tin cá nhân"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="backend/account/changepassuser" title="Đổi mật khẩu"><i class="fa fa-fw fa-gear"></i> Change Pass</a>
                </li>
                <li>
                    <a href="backend/auth/logout" title="Đăng xuất"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items-->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="<?php ITQ_BASE_URL?>backend/config/index/" title="cấu hình hệ thống"><i class="fa fa-cogs"></i> Cấu hình</a>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo1" title="Quản lý người dùng"><i class="fa fa-fw fa fa-users"></i> Quản lý người dùng <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo1" class="collapse">
                    <li>
                        <a href="<?php ITQ_BASE_URL?>backend/user/listuser" title="Hiển thị danh sách người dùng"><i class="fa fa-list-alt"></i> Hiển thị danh sách</a>
                    </li>
                    <li>
                        <a href="<?php ITQ_BASE_URL?>backend/user/created" title="Thêm mới người dùng"><i class="glyphicon glyphicon-plus"></i> Thêm người dùng</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="glyphicon glyphicon-star"></i> Phân quyền các nhóm <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo2" class="collapse">
					<li>
                        <a href="<?php ITQ_BASE_URL?>backend/group/listgroup2/1?sort_field=id&sort_value=asc"><i class="glyphicon glyphicon-list"></i> Danh sách nhóm</a>
                    </li>
                    <li>
                        <a href="<?php ITQ_BASE_URL?>backend/group/addgroup"><i class="fa fa-plus-circle"></i> Thêm nhóm</a>
                    </li>
<!--                    <li>-->
<!--                        <a href="--><?php //ITQ_BASE_URL?><!--backend/group/listgroup"><i class="glyphicon glyphicon-list"></i> Danh sách nhóm</a>-->
<!--                    </li>-->

                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#category"><i class="fa fa-bars"></i> Quản trị chuyên mục <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="category" class="collapse">
                    <li>
                        <a href="<?php ITQ_BASE_URL?>backend/category/listcategory"><i class="glyphicon glyphicon-list"></i> Danh sách chuyên mục</a>
                    </li>
					<li>
						<a href="<?php ITQ_BASE_URL?>backend/category/addcategory"><i class="fa fa-plus-circle"></i> Thêm chuyên mục</a>
					</li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#product"><i class="fa fa-list-alt"></i> Quản trị sản phẩm <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="product" class="collapse">
                    <li>
                        <a href="<?php ITQ_BASE_URL?>backend/product/listproduct"><i class="glyphicon glyphicon-list"></i> Danh sách sản phẩm</a>
                    </li>
                    <li>
                        <a href="<?php ITQ_BASE_URL?>backend/product/addproduct"><i class="fa fa-plus-circle"></i> Thêm Sản phẩm</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#type"><i class="fa fa-globe"></i> Quản trị Thuộc tính <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="type" class="collapse">
                    <li>
                        <a href="<?php ITQ_BASE_URL?>backend/type/listtype"><i class="glyphicon glyphicon-list"></i> Danh sách Thuộc tính</a>
                    </li>
                    <li>
                        <a href="<?php ITQ_BASE_URL?>backend/type/addtype"><i class="fa fa-plus-circle"></i> Thêm Thuộc tính</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#note"><i class="glyphicon glyphicon-bookmark"></i> Quản trị bài đăng <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="note" class="collapse">
                    <li>
                        <a href="<?php ITQ_BASE_URL?>backend/note/listnote"><i class="glyphicon glyphicon-list"></i> Danh sách bài đăng</a>
                    </li>
                    <li>
                        <a href="<?php ITQ_BASE_URL?>backend/note/addnote"><i class="fa fa-plus-circle"></i> Thêm bài đăng</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#customs"><i class="glyphicon glyphicon-bookmark"></i> Quản trị Banner <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="customs" class="collapse">
                    <li>
                        <a href="<?php ITQ_BASE_URL?>backend/banner/listbanner"><i class="glyphicon glyphicon-list"></i> Danh sách Banner</a>
                    </li>
                    <li>
                        <a href="<?php ITQ_BASE_URL?>backend/banner/addbanner"><i class="fa fa-plus-circle"></i> Thêm Banner</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php ITQ_BASE_URL?>backend/contact/listcontact" data-toggle="collapse" data-target="#contact"><i class="glyphicon glyphicon-bookmark"></i> ý kiến </a>
            </li>
            <li>
                <a href="<?php ITQ_BASE_URL?>backend/cart/listcart" data-toggle="collapse" data-target="#contact"><i class="glyphicon glyphicon-shopping-cart"></i> Đơn hàng </a>
            </li>
        </ul>
    </div>
</nav>