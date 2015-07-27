<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thêm ảnh - slide - banner
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
                                <td class="col-lg-3"><label>Tiêu đề:</label></td>
                                <td><input class="form-control" type="text" name="title" value=""></td>
                            </tr>

                            <tr>
                                <td class="col-lg-3">Ảnh đại diện: </td>
                                <td> <input id="xFilePath" name="image" type="text" size="45" /><input type="button" value="Browse Server" onclick="BrowseServer();" /></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3">Link liên kết: </td>
                                <td><input class="form-control" type="text" name="link" value=""></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3">Division</td>
                                <td>
                                    <select class="form-control" name="division">
                                        <?php for($i = 1;$i<=5; $i++){?>
                                        <option value="<?php echo $i?>"><?php echo $i?></option>
                                        <?php }?>
                                    </select>
                                </td>
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