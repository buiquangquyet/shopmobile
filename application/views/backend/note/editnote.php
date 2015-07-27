<?php
//echo '<pre>';
//print_r($checked);
//echo '</pre>';
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Sửa đổi thông tin Bài đăng
            </div>
            <ul>
                <?php echo common_showerror(validation_errors());?>
            </ul>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <form method="post" action="" enctype="multipart/form-data">
                        <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
                            <tr>
                                <td class="col-lg-3"><label>Tên sản phẩm:</label></td>
                                <td><input class="form-control" type="text" name="title" value="<?php echo$infoNote['title'] ?>"></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3">Danh mục chính bài đăng:</td>
                                <td>
                                    <select class="col-lg-9" name="category-id">
                                        <?php if(isset($related) && count($related)){ foreach($related as $key => $value){?>
                                            <option value="<?php echo $value['id'];?>"<?php if($value['id']==$infoNote['category-id']){echo 'selected';}?>> <?php echo $value['title'];?></option>
                                        <?php   } }    ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-3">Danh mục liên quan:</td>
                                <td>
                                    <?php if(isset($related) && count($related)){ foreach($related as $key => $value){?>
                                        <input type="checkbox" name="category[<?php echo $value['id'];?>]" value="<?php echo $value['id'];?>" <?php if(is_array($checked)){foreach($checked as  $value1){if ($value['id']==$value1['category_id']){echo 'checked';}   }  }?> ><?php echo $value['title']?><br/>
                                    <?php   } }    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-3">Ảnh sản phẩm </td>
                                <td> <input id="xFilePath" name="image" type="text" size="45" value="<?php echo $infoNote['image']?>"/><input type="button" value="Browse Server" onclick="BrowseServer();" /></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3">Tóm tắt sản phẩm </td>
                                <td> <textarea class="form-control" rows="4" name="description"><?php echo $infoNote['description']?></textarea> </td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Nội dung sản phẩm:</td>
                                <td> <textarea class="ckeditor" name="content"><?php echo $infoNote['content']?></textarea> </td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> alias:</td>
                                <td><input class="form-control" type="text" name="alias" value="<?php echo $infoNote['alias']?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> route:</td>
                                <td><input class="form-control" type="text" name="route" value="<?php echo $infoNote['route']?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Meta-title:</td>
                                <td><input class="form-control" type="text" name="meta-title" value="<?php echo $infoNote['meta-title']?>"></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Meta-keyword:</td>
                                <td><input class="form-control" type="text" name="meta-keywords" value="<?php echo $infoNote['meta-keywords']?>"></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Meta-description:</td>
                                <td><input type="text" class="form-control" name="meta-description" value="<?php echo $infoNote['meta-description']?>"></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Thực thi:</td>
                                <td> <input  class="btn btn-default" type="submit" name="submit" value="Gửi nội dung">
                                    <button type="reset" class="btn btn-default">Reset Button</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<script type="text/javascript">

    function BrowseServer(){
        var finder = new CKFinder();
        finder.basePath = '../';	// The path for the installation of CKFinder (default = "/ckfinder/").
        finder.selectActionFunction = SetFileField;
        finder.popup();
    }
    function SetFileField( fileUrl ){
        document.getElementById( 'xFilePath','image' ).value = fileUrl;
    }
</script>