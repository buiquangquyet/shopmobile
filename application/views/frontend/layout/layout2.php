
<!DOCTYPE HTML>
<html>
<head>
    <title>Mobilestore</title>
    <meta charset="utf-8"/>
    <meta name="title" content="<?php echo  isset($meta_title)?$meta_title:'đồ ăn'; ?>">
    <meta name="author" content="<?php echo isset($meta_keywords)?$meta_keywords:'đồ án'; ?>">
    <meta name="keywords" content="<?php echo isset($meta_keywords)?$meta_keywords:'đồ án'; ?>" />
    <meta name="meta_description" content="<?php echo isset($meta_description)?$meta_description:'đồ án'; ?>">
    <base href="<?php echo ITQ_BASE_URL;?>"/>

    <script src="public/template/frontend/js/jquery-1.10.2.min.js"></script>
    <!--etalage-->
    <link rel="stylesheet" href="public/template/frontend/plugin/etalage/css/etalage.css">
    <script src="public/template/frontend/plugin/etalage/js/jquery.etalage.min.js"></script>

    <link href="public/template/frontend/css/style.css" rel="stylesheet" type="text/css"  media="all" />
    <link href="public/template/frontend/css/style1.css" rel="stylesheet" type="text/css"  media="all" />
    <link href='public/template/frontend/css/apis.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="public/template/frontend/css/responsiveslides.css">

    <script src="public/template/frontend/js/responsiveslides.min.js"></script>
    <script src="public/template/frontend/js/myjs.js"></script>

    <script type="text/javascript" src="public/template/frontend/js/jquery.livequery.js"></script>

    <link href="public/template/frontend/css/menu.css" rel="stylesheet" type="text/css"  media="all" />
    <script src="public/template/frontend/js/jquery.hoverIntent.minified.js"></script>
    <script src="public/template/frontend/js/jquery.dcmegamenu.1.3.1.js"></script>

    <script>
        jQuery(document).ready(function($){
            $('#etalage').etalage({
                thumb_image_width: 330,
                thumb_image_height: 400,
                source_image_width: 620,
                source_image_height: 800,
                show_hint: true,
                click_callback: function(image_anchor, instance_id){
                    alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                }
            });
            $('.dropdownlist').change(function(){
                etalage_show( $(this).find('option:selected').attr('class') );
            });
        });
    </script>
</head>
<body>
<div class="wrap">
    <!----start-Header---->
    <div class="header">
        <div class="clear"> </div>
        <div class="header-top-nav">
            <ul>
                <li><a href="#">Register</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#">Develivery</a></li>
                <li><a href="#">Checkout</a></li>
                <li><a href="#">My account</a></li>
                <li><a href="#"><span>shopingcart&nbsp;&nbsp;: </span></a><lable> &nbsp;noitems</lable></li>
            </ul>
        </div>
        <div class="clear"> </div>
    </div>
</div>
<div class="clear"> </div>
<?php $this->load->view('frontend/common/megamenu')?>
<!----End-top-nav---->
<!----End-Header---->
<!--content-->
<?php $this->load->view($template,isset($data)?$data:NULL)?>
<!--end content-->
<?php $this->load->view('frontend/common/footer')?>
</body>
</html>

