<?php
//echo '<pre>';
//var_dump($checklist);
//var_dump(is_array($checklist)) ;
//echo '</pre>';
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Sửa đổi thông tin sản phẩm
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
                                <td><input class="form-control" type="text" name="title" value="<?php echo$infoProduct['title'] ?>"></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3">Danh mục chính:</td>
                                <td class="col-lg-9">
                                    <select class="col-lg-9" name="categoryid">
                                        <?php if(isset($listcategory) && count($listcategory)){ foreach($listcategory as $key => $value){?>
                                            <option value="<?php echo $value['id'];?>" <?php if($value['id']==$infoProduct['categoryid']){echo 'selected';}?>> <?php echo $value['title'];?></option>
                                        <?php   } }    ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-3">Danh mục sản phẩm:</td>
                                <td>
                                <?php
                                if(isset($listcategory) && count($listcategory)){ foreach($listcategory as $key => $value){?>
                                    <input type="checkbox" name="category[<?php echo $value['id'];?>]" value="<?php echo $value['id'];?>" <?php if(is_array($checklist)){foreach($checklist as $value1){if ($value['id']==$value1){echo 'checked';}   }  }?> ><?php echo $value['title'];?><br>
                                <?php   } }    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-3">Ảnh sản phẩm </td>
                                <td> <input id="xFilePath" name="image" type="text" size="45" value="<?php echo $infoProduct['image']?>"/><input type="button" value="Browse Server" onclick="BrowseServer();" /></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3">Tóm tắt sản phẩm </td>
                                <td> <textarea class="ckeditor" rows="4" name="description"><?php echo $infoProduct['description']?></textarea> </td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Nội dung sản phẩm:</td>
                                <td> <textarea class="ckeditor" name="content"><?php echo $infoProduct['content']?></textarea> </td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Giá hiện tại:</td>
                                <td><input class="form-control" type="text" name="price" value="<?php echo $infoProduct['price']?>"></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Giá cũ:</td>
                                <td><input class="form-control" type="text" name="priceold" value="<?php echo $infoProduct['priceold']?>"></td>
                            </tr>

                            <tr>
                                <td class="col-lg-3"> Chủng loại:</td>
                                <td>
                                    <select name="type-id" class="col-lg-9">
                                        <?php if(isset($listtype)  &&  count($listtype)){foreach ($listtype as $key => $value) {?>
                                            <option value="<?php echo $value['id']?>" <?php if($value['id'] == $infoProduct['type-id'] ){echo 'selected';}?>> - <?php echo $value['title']?></option>
                                        <?php   }   } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> alias:</td>
                                <td><input class="form-control" type="text" name="alias" value="<?php echo $infoProduct['alias']?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> route:</td>
                                <td><input class="form-control" type="text" name="route" value="<?php echo $infoProduct['route']?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Meta-title:</td>
                                <td><input class="form-control" type="text" name="meta-title" value="<?php echo $infoProduct['meta-title']?>"></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Meta-keyword:</td>
                                <td><input class="form-control" type="text" name="meta-keywords" value="<?php echo $infoProduct['meta-keywords']?>"></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Meta-description:</td>
                                <td><input type="text" class="form-control" name="meta-description" value="<?php echo $infoProduct['meta-description']?>"></td>
                            </tr>
                            <tr>
                                <td class="col-lg-3"> Thực thi:</td>
                                <td> <input  class="btn btn-default" type="submit" name="submit" value="Gửi nội dung">
                                    <button type="reset" class="btn btn-default">Reset Button</button>
                                </td>
                            </tr>
                            <tr>
                                <td> Ảnh sản phẩm</td>
                                <td>
                                    <ul>
                                        <?php if(isset($imagesProduct) && count($imagesProduct)){foreach($imagesProduct as $key=>$value){?>
                                        <li><input id="xFilePath<?php echo $key+1?>" name="images[]" type="text" size="45" value="<?php echo $value['url']?>"/><input type="button" value="Browse Server" onclick="BrowseServer<?php echo $key+1?>();" />  </li>
                                        <?php } } ?>
                                        <i id="content-images"></i>
                                        <li><button type="button" class="btn btn-default navbar-btn" id="images">Thêm ảnh chi tiết</button></li>
                                    </ul>
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
    var i =<?php echo count($imagesProduct);?>;
    $(document).ready(function(){
        $('#images').click(function(){
            i =i+1;
            if(i<=10){
                $('#content-images').after('<li>  <input id="xFilePath'+i+'" name="images[]" type="text" size="45" /><input type="button" value="Browse Server" onclick="BrowseServer'+i+'();" /> </li>');
            }else{
                alert('Tối đa 10 ảnh sản phẩm');
            }
        })
    })
</script>