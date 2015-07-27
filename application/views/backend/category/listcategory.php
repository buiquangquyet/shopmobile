<?php
?>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách chuyên mục
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
                        <thead>
                        <tr role="row">
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Danh mục cha</th>
                            <th>loai tin</th>
                            <th>trang chủ</th>
                            <th>Trên</th>
                            <th>Cạnh</th>
                            <th>Công bố</th>
                            <th>Người tạo</th>
                            <th>Thời gian khỏi tạo</th>
                            <th>Người cập nhật</th>
                            <th>Thời gian cập nhật</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($listcategory) && count($listcategory) && is_array($listcategory)){foreach($listcategory as $key=>$value){?>
                        <tr class="gradeA odd">
                            <td><a href="<?php ITQ_BASE_URL?>backend/category/editcategory/<?php echo $value['id']?>" title='Thay đổi thông tin chuyên mục'><?php echo $value['id'];?></a></td>
                            <td><?php echo $value['title'];?></td>
                            <td><?php echo $value['parent'];?></td>
                            <td><?php echo $value['type_category'];?></td>
                            <td><a href="<?php ITQ_BASE_URL?>backend/category/editshowhome/<?php echo $value['id'].'/'.changeStatus($value['is-home'])?>"><?php echo ($value['is-home']==1)?'<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-remove" style="color:red;"></i>';?></a></td>
                            <td><a href="<?php ITQ_BASE_URL?>backend/category/editshowgrid/<?php echo $value['id'].'/'.changeStatus($value['is-grid'])?>"><?php echo ($value['is-grid']==1)?'<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-remove" style="color:red;"></i>';?></a></td>
                            <td><a href="<?php ITQ_BASE_URL?>backend/category/editshowright/<?php echo $value['id'].'/'.changeStatus($value['is-right'])?>"><?php echo ($value['is-right']==1)?'<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-remove" style="color:red;"></i>';?></a></td>
                            <td><a href="<?php ITQ_BASE_URL?>backend/category/editshowpublish/<?php echo $value['id'].'/'.changeStatus($value['publish'])?>"><?php echo ($value['publish']==1)?'<i class="glyphicon glyphicon-ok"></i>':'<i class="glyphicon glyphicon-remove" style="color:red;"></i>';?></a></td>
                            <td><?php echo $value['usercreat'];?></td>
                            <td><?php echo $value['created'];?></td>
                            <td><?php echo isset($this->Mitq_category->getUserUpdateById($value['userid-updated'])['fullname'])?$this->Mitq_category->getUserUpdateById($value['userid-updated'])['fullname']:'Chưa ai cập nhật';?> </td>
                            <td><?php echo $value['updated'];?></td>
                            <td><a href="<?php echo ITQ_BASE_URL?>backend/category/deletecategory/<?php echo $value['id'];?>" title="xóa chuyên mục" onclick="return confirm('bạn chắc chắn xóa chuyên mục')"><i>Xóa</i></a></td>
                        </tr>
                        <?php   }   }   ?>
                        </tbody>
                    </table>
                    <section class="pagination">
                        <ul class="pagination"><?php echo $this->pagination->create_links();?></ul>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
