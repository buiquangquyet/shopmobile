<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $seo['description']?>">
    <meta name="keyword" content="<?php echo $seo['keyword']?>">
    <meta name="author" content="<?php echo $seo['title']?>">
    <base href="<?php echo ITQ_BASE_URL;?>"/>
    <link rel="icon" href="upload/config/ci-logo.jpg"/>
    <title>Login Manager System</title>
    <link href="public/template/backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/template/backend/css/login-style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <?php $this->load->view($template,isset($data)?$data:null);
    ?>
</div>
</body>
</html>
