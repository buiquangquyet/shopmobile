<?php
// echo'<pre>';
// print_r($infocategory);
// echo '</pre>';
?>
<form class="col-lg-12" method="post" action="<?php echo ITQ_BASE_URL;?>backend/category/editcategory/<?php echo $infocategory['id'];?>">
    <ul>
        <?php echo common_showerror(validation_errors());?>
    </ul>
    <table class="col-lg-7">

        <tr>
            <td class="col-lg-3"><label>Tiêu đề chuyên mục:</label></td>
            <td><input class="form-control" type="text" name="title" value="<?php echo isset($infocategory['title'])?$infocategory['title']:''; ?>"></td>
        </tr>
        <tr>
            <td class="col-lg-3">Chuyên mục cha:</td>
            <td>
                <select class="col-lg-9" name="parentid">
                    <?php
                        if(isset($listcategory) && count($listcategory)){ foreach($listcategory as $key => $value){?>
                                <option value="<?php echo $value['id'];?>" <?php if($infocategory['parentid']==$value['id']){ echo 'selected';}else{echo '';}?> ><?php echo $value['title'];?></option>
                     <?php
                            }
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="col-lg-3"> Upload ảnh đại diện </td>
            <td> <input id="xFilePath" name="image" type="text" size="45" value="<?php echo isset($infocategory['image'])?$infocategory['image']:''; ?>" /><input type="button" value="Browse Server" onclick="BrowseServer();" /></td>
        </tr>
        <tr>
            <td class="col-lg-3"> Description:</td>
            <td> <textarea class="ckeditor" name="description"><?php echo isset($infocategory['description'])?$infocategory['description']:''; ?></textarea> </td>
        </tr>
    </table>
    <table class="col-lg-5">
        <tr>
            <td class="col-lg-3"> Meta-title:</td>
            <td><input class="form-control" type="text" name="meta-title" value="<?php echo isset($infocategory['meta-title'])?$infocategory['meta-title']:''; ?>"></td>
        </tr>
        <tr>
            <td class="col-lg-3"> Meta-keywords:</td>
            <td><input class="form-control" type="text" name="meta-keywords" value="<?php echo isset($infocategory['meta-keywords'])?$infocategory['meta-keywords']:''; ?>"></td>
        </tr>
        <tr>
            <td class="col-lg-3"> Meta-description:</td>
            <td><input type="text" class="form-control" name="meta-description" value="<?php echo isset($infocategory['meta-description'])?$infocategory['meta-description']:''; ?>"></td>
        </tr>
        <tr>
            <td class="col-lg-3"> Nguồn:</td>
            <td><input type="text" class="form-control" name="source" value="<?php echo isset($infocategory['source'])?$infocategory['source']:''; ?>"></td>
        </tr>
        <tr>
            <td class="col-lg-3"> alias:</td>
            <td><input type="text" class="form-control" name="alias" value="<?php echo isset($infocategory['alias'])?$infocategory['alias']:''; ?> " title="Không nên sửa mục này" readonly="readonly"></td>
        </tr>
        <tr>
            <td class="col-lg-3"> route:</td>
            <td><input type="text" class="form-control" name="route" value="<?php echo isset($infocategory['route'])?$infocategory['route']:''; ?>" title="Không nên sửa mục này" readonly="readonly"></td>
        </tr>

        <tr>
            <td class="col-lg-3"> kiểu thêm : </td>
            <td>
                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="style" id="optionsRadios1" value="1" checked="">Chèn vào cuối chuyên mục
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="style" id="optionsRadios2" value="0">Chèn vào đầu chuyên mục
                        </label>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="col-lg-3"> Lọai tin</td>
            <td>
                <select class="col-lg-9" name="type_category">
                    <?php if(isset($listtype) && count($listtype)){foreach($listtype as $key=>$value){?>
                        <option value="<?php echo $value['id']?>" <?php if($infocategory['type_category']==$value['id'] ){echo 'selected';}?>> <?php echo $value['title']?> </option>
                    <?php   }   }   ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="col-lg-3"> Thực thi:</td>
            <td> <input  class="btn btn-default" type="submit" name="submit" value="submit"><button type="reset" class="btn btn-default">Reset Button</button></td>
        </tr>
        
    </table>
</form>


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
