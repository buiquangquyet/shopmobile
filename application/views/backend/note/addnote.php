<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thêm Bài đăng
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <form method="post" action="">
                        <ul>
                            <?php echo common_showerror(validation_errors());?>
                        </ul>
                        <table class="table table-striped table-bordered table-hover dataTable no-footer">

                            <tr>
                                <td class="col-lg-3"><label>Tên bài đăng:</label></td>
                                <td><input class="form-control" type="text" name="title" value=""></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3">Danh mục chính bài đăng:</td>
                                <td>
                                    <select class="col-lg-9" name="category-id">
                                        <?php if(isset($listcategory) && count($listcategory)){ foreach($listcategory as $key => $value){?>
                                            <option value="<?php echo $value['id'];?>"> <?php echo $value['title'];?></option>
                                        <?php   } }    ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-3">Danh mục liên quan:</td>
                                <td>
                                <?php if(isset($listcategory) && count($listcategory)){ foreach($listcategory as $key => $value){?>
                                    <input type="checkbox" name="category[<?php echo $value['id'];?>]" value="<?php echo $value['id'];?>"> <?php echo $value['title'];?><br>
                                <?php   } }    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-3">Ảnh đại diện bài đăng: </td>
                                <td> <input id="xFilePath" name="image" type="text" size="45" /><input type="button" value="Browse Server" onclick="BrowseServer();" /></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3">Tóm tắt: </td>
                                <td> <textarea class="form-control" rows="4" name="description"></textarea> </td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Nội dung:</td>
                                <td> <textarea class="ckeditor" name="content"></textarea> </td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Meta-title:</td>
                                <td><input class="form-control" type="text" name="meta-title" value=""></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Meta-keyword:</td>
                                <td><input class="form-control" type="text" name="meta-keywords" value=""></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Meta-description:</td>
                                <td><input type="text" class="form-control" name="meta-description" value=""></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Thực thi:</td>
                                <td> <input  class="btn btn-default" type="submit" name="submit" value="submit"><button type="reset" class="btn btn-default">Reset Button</button></td>
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