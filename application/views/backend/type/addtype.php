<?php
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Bảng thêm thuộc tính
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <ul>
                        <?php echo common_showerror(validation_errors());?>
                    </ul>
                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <form method="post" action="">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer">
                                <tr>
                                    <td class="col-lg-3">Thêm loại(thuộc tính sản phẩm)</td>
                                    <td><input class="form-control" type="text" name="title" value=""></td>
                                </tr>
                                <tr>
                                    <td class="col-lg-3">Thực thi</td>
                                    <td><input type="submit" name="submit" value="submit"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.panel -->
    </div>
</div>