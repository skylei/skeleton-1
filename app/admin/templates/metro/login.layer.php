<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title><?php echo isset($title) ? $title : '后台管理系统' ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link href="<?php echo $this->res("metro/assets/global/plugins/font-awesome/css/font-awesome.min.css") ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->res("metro/assets/global/plugins/simple-line-icons/simple-line-icons.min.css") ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->res("metro/assets/global/plugins/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->res("metro/assets/global/plugins/uniform/css/uniform.default.css") ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->res("metro/assets/admin/pages/css/login.css") ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->res("metro/assets/global/css/components.css") ?>" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->res("metro/assets/global/css/plugins.css") ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->res("metro/assets/admin/layout/css/layout.css") ?>" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="<?php echo $this->res("metro/assets/admin/layout/css/themes/darkblue.css") ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->res("metro/assets/admin/layout/css/custom.css") ?>" rel="stylesheet" type="text/css"/>
</head>

<body class="login">
<div class="menu-toggler sidebar-toggler">
</div>

<div class="logo">
    <a href="<?php echo $this->link() ?>">
        <img src="<?php echo $this->res("metro/assets/global/img/logo.png") ?>" style="width:260px;" alt="cross php framework logo"/>
    </a>
</div>

<div class="content" style="margin:1px auto;">
    <?php
    echo isset($content)?$content:'';
    if ($this->data['status'] != 1) {
        $this->notice($this->data['status']);
    }
    ?>
</div>
<div class="copyright">
    2014 - 2015 © CPC.
</div>

<!--[if lt IE 9]>
<script src="<?php echo $this->res('metro/assets/global/plugins/respond.min.js') ?>"></script>
<script src="<?php echo $this->res('metro/assets/global/plugins/excanvas.min.js') ?>"></script>
<![endif]-->

<script src="<?php echo $this->res("metro/assets/global/plugins/jquery.min.js") ?>" type="text/javascript"></script>
<script src="<?php echo $this->res("metro/assets/global/plugins/jquery-migrate.min.js") ?>" type="text/javascript"></script>

<script src="<?php echo $this->res("metro/assets/global/plugins/bootstrap/js/bootstrap.min.js") ?>" type="text/javascript"></script>
<script src="<?php echo $this->res("metro/assets/global/plugins/jquery.blockui.min.js") ?>" type="text/javascript"></script>
<script src="<?php echo $this->res("metro/assets/global/plugins/jquery.cokie.min.js") ?>" type="text/javascript"></script>
<script src="<?php echo $this->res("metro/assets/global/plugins/uniform/jquery.uniform.min.js") ?>" type="text/javascript"></script>
<script src="<?php echo $this->res("metro/assets/global/plugins/jquery-validation/js/jquery.validate.min.js") ?>" type="text/javascript"></script>

<script src="<?php echo $this->res("metro/assets/global/scripts/metronic.js") ?>" type="text/javascript"></script>
<script src="<?php echo $this->res("metro/assets/admin/layout/scripts/layout.js") ?>" type="text/javascript"></script>
<script src="<?php echo $this->res("metro/assets/admin/pages/scripts/login.js") ?>" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo $this->res("js/cp.js") ?>"></script>
<script type="text/javascript" src="<?php echo $this->res("lib/artDialog/jquery.artDialog.js?skin=green") ?>"></script>
<script type="text/javascript" src="<?php echo $this->res("lib/artDialog/plugins/iframeTools.js") ?>"></script>
<script>
    jQuery(document).ready(function() {
        Metronic.init();
        Layout.init();
        Login.init();
    });
</script>
</body>
</html>
