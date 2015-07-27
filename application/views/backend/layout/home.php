<!DOCTYPE html>
<html lang="vi" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo isset($seo['description'])?$seo['description']:"";?>">
    <meta name="author" content="<?php echo isset($seo['keyword'])?$seo['keyword']:'';?>">
    <base href="<?php echo ITQ_BASE_URL;?>"/>
    <link rel="icon" href="upload/config/icon-backend.png"/>
    <title><?php echo isset($seo['title'])?$seo['title']:'';?></title>
    <!--char-->
    <link href="public/template/backend/css/examples.css" rel="stylesheet" type="text/css">

    <link href="public/template/backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/template/backend/css/sb-admin.css" rel="stylesheet">
    <link href="public/template/backend/css/plugins/morris.css" rel="stylesheet">
    <script src="public/template/backend/js/jquery.js"></script>
    <link href="public/template/backend/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="public/template/backend/plugin/ckeditor/ckeditor.js"></script>
	<script src="public/template/backend/plugin/ckeditor/ckfinder/ckfinder.js" type="text/javascript"></script>


    <script language="javascript" type="text/javascript" src="public/template/backend/js/plugins/flot/jquery.flot.js"></script>
    <script language="javascript" type="text/javascript" src="public/template/backend/js/plugins/flot/jquery.flot.categories.js"></script>


    <style>
        table tr td{
            padding:3px;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <?php $this->load->view('backend/common/nav',isset($data)?$data:null)?>
        <div id="page-wrapper" style="min-height: 724px">
            <?php $this->load->view($template,isset($data)?$data:null);?>
        </div>
    </div>

    <script src="public/template/backend/js/my_js.js"></script>
    <script src="public/template/backend/js/bootstrap.min.js"></script>
    <script src="public/template/backend/js/plugins/morris/raphael.min.js"></script>
    <script src="public/template/backend/js/plugins/morris/morris.min.js"></script>
    <script src="public/template/backend/js/plugins/morris/morris-data.js"></script>



</body>

</html>