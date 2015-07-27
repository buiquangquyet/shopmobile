<?php
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thêm Sản Phẩm
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <form class="col-lg-12" method="post" action="" enctype="multipart/form-data">
                        <ul>
                            <?php echo common_showerror(validation_errors());?>
                        </ul>
                        <table class="col-lg-12">
                            <tr>
                                <td class="col-lg-3"><label>Tên sản phẩm:</label></td>
                                <td><input class="form-control" type="text" name="title" value=""></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3">Danh mục chính:</td>
                                <td class="col-lg-3">
                                    <select class="col-lg-9" name="categoryid">
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
                                <td class="col-lg-3">Ảnh sản phẩm </td>
                                <td> <input id="xFilePath" name="image" type="text" size="45" /><input type="button" value="Browse Server" onclick="BrowseServer();" /></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3">Tóm tắt sản phẩm </td>
                                <td> <textarea class="ckeditor" rows="4" name="description"></textarea> </td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Nội dung sản phẩm:</td>
                                <td> <textarea class="ckeditor" name="content"></textarea> </td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Giá hiện tại:</td>
                                <td><input class="form-control" type="text" name="price" value=""></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Giá cũ:</td>
                                <td><input class="form-control" type="text" name="priceold" value=""></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Ảnh chi tiết:</td>
                                <td class="col-lg-9">
                                    <ul>
                                        <li id="content-images">ảnh</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>thêm ảnh</td>
                                <td><button type="button" class="btn btn-default navbar-btn" id="images">Thêm ảnh chi tiết</button></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Chủng loại:</td>
                                <td>
                                    <select name="type-id" class="col-lg-9">
                                        <?php if(isset($listtype)  &&  count($listtype)){foreach ($listtype as $key => $value) {?>
                                            <option value="<?php echo $value['id']?>"> - <?php echo $value['title']?></option>
                                        <?php   }   } ?>
                                    </select>
                                </td>
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
<script>
    var i =0;
    $(document).ready(function(){
        $('#images').click(function(){
            i =i+1;
            if(i<=10){
                $('#content-images').after('<li><i>'+'ảnh thứ '+i+'  </i><input id="xFilePath'+i+'" name="images[]" type="text" size="45" /><input type="button" value="Browse Server" onclick="BrowseServer'+i+'();" /> </li>');
            }else{
                alert('Tối đa 10 ảnh sản phẩm');
            }
        })
    })
</script>