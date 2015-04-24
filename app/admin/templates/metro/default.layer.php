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
    <link href="<?php echo $this->res("metro/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css") ?>" rel="stylesheet" type="text/css"/>

    <link href="<?php echo $this->res("metro/assets/global/css/components.css") ?>" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->res("metro/assets/global/css/plugins.css") ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->res("metro/assets/admin/layout/css/layout.css") ?>" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="<?php echo $this->res("metro/assets/admin/layout/css/themes/darkblue.css") ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->res("metro/assets/admin/layout/css/custom.css") ?>" rel="stylesheet" type="text/css"/>
</head>

<body class="page-header-fixed page-quick-sidebar-over-content">
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner">
        <div class="page-logo">
            <img src="<?php echo $this->res("metro/assets/global/img/logo.png") ?>" style="width:60px;float:left;" alt="cross php framework logo"/>
            <a href="<?php echo $this->link('panel') ?>">
                cpc
            </a>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="username username-hide-on-mobile">
					admin </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="<?php echo $this->link('main:logout') ?>">
                                <i class="icon-key"></i> 退出 </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="clearfix">
</div>
<div class="page-container">
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="sidebar-toggler-wrapper" style="padding-bottom: 8px;">
                    <div class="sidebar-toggler">
                    </div>
                </li>

                <?php
                $controller = strtolower($this->controller);
                $controller_name = '';
                $action_name = '';
                foreach($this->getAllMenu() as $m) {
                    $icon_name = ! empty($m['icon']) ? $m['icon'] : 'home';
                    $child_node_num = count($m['child_menu']);
                    if ($child_node_num > 0) {
                        if ($controller == $m['link']) {
                            $controller_name = $m['name'];
                            $tpl = '<li class="active open"><a href="javascript:;">
                                    <i class="icon-%s" ></i><span class="title" >%s</span><span class="selected"></span><span class="arrow open" ></span>
                                    </a ><ul class="sub-menu">';
                        } else {
                            $tpl = '<li><a href="javascript:;">
                                    <i class="icon-%s" ></i><span class="title" >%s</span> <span class="arrow" ></span>
                                    </a ><ul class="sub-menu">';
                        }

                        printf($tpl, $icon_name, $m['name']);
                        foreach($m['child_menu'] as $mu) {
                            if ($mu['link'] == $this->action) {
                                $action_name = $mu['name'];
                                printf('<li class="active"><a href="%s">%s</a></li>', $this->link("{$m['link']}:{$mu['link']}"), $mu['name']);
                            } else {
                                printf('<li><a href="%s">%s</a></li>', $this->link("{$m['link']}:{$mu['link']}"), $mu['name']);
                            }
                        }
                        echo '</ul></li>';
                    } else {
                        if ($controller == $m['link']) {
                            $controller_name = $m['name'];
                            printf('<li class="active open"><a href="%s"><i class="icon-%s" ></i><span class="title">%s</span><span class="selected"></span></a></li>', $this->link($m['link']), $icon_name, $m['name']);
                        } else {
                            printf('<li><a href="%s"><i class="icon-%s" ></i><span class="title">%s</span></a></li>', $this->link($m['link']), $icon_name, $m['name']);
                        }
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            Widget settings form goes here
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn blue">Save changes</button>
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="theme-panel hidden-xs hidden-sm">
                <div class="toggler">
                </div>
                <div class="toggler-close">
                </div>
                <div class="theme-options">
                    <div class="theme-option theme-colors clearfix">
						<span>
						THEME COLOR </span>
                        <ul>
                            <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default">
                            </li>
                            <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue">
                            </li>
                            <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue">
                            </li>
                            <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey">
                            </li>
                            <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light">
                            </li>
                            <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2">
                            </li>
                        </ul>
                    </div>
                    <div class="theme-option">
						<span>
						Layout </span>
                        <select class="layout-option form-control input-sm">
                            <option value="fluid" selected="selected">Fluid</option>
                            <option value="boxed">Boxed</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						Header </span>
                        <select class="page-header-option form-control input-sm">
                            <option value="fixed" selected="selected">Fixed</option>
                            <option value="default">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						Top Menu Dropdown</span>
                        <select class="page-header-top-dropdown-style-option form-control input-sm">
                            <option value="light" selected="selected">Light</option>
                            <option value="dark">Dark</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						Sidebar Mode</span>
                        <select class="sidebar-option form-control input-sm">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						Sidebar Menu </span>
                        <select class="sidebar-menu-option form-control input-sm">
                            <option value="accordion" selected="selected">Accordion</option>
                            <option value="hover">Hover</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						Sidebar Style </span>
                        <select class="sidebar-style-option form-control input-sm">
                            <option value="default" selected="selected">Default</option>
                            <option value="light">Light</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						Sidebar Position </span>
                        <select class="sidebar-pos-option form-control input-sm">
                            <option value="left" selected="selected">Left</option>
                            <option value="right">Right</option>
                        </select>
                    </div>
                    <div class="theme-option">
						<span>
						Footer </span>
                        <select class="page-footer-option form-control input-sm">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                </div>
            </div>
            <h3 class="page-title">
                <?php
                    if ($controller_name) {
                        echo $controller_name;
                    }
                    if ($action_name) {
                        printf('  <small>%s</small>', $action_name);
                    }
                ?>
            </h3>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if ($this->data['status'] != 1) {
                        $this->notice($this->data['status']);
                    }
                    echo isset($content)?$content:'';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-footer">
    <div class="page-footer-inner">
        2014 &copy; CPC
        <img src="<?php echo $this->res("metro/assets/global/img/logo.png") ?>" style="width:17px;float:left;" alt="cross php framework logo"/>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>

<!--[if lt IE 9]>
<script src="<?php echo $this->res('metro/assets/global/plugins/respond.min.js') ?>"></script>
<script src="<?php echo $this->res('metro/assets/global/plugins/excanvas.min.js') ?>"></script>
<![endif]-->
<script src="<?php echo $this->res("metro/assets/global/plugins/jquery.min.js") ?>" type="text/javascript"></script>
<script src="<?php echo $this->res("metro/assets/global/plugins/jquery-migrate.min.js") ?>" type="text/javascript"></script>

<script src="<?php echo $this->res("metro/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js") ?>" type="text/javascript"></script>
<script src="<?php echo $this->res("metro/assets/global/plugins/bootstrap/js/bootstrap.min.js") ?>" type="text/javascript"></script>
<script src="<?php echo $this->res("metro/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js") ?>" type="text/javascript"></script>
<script src="<?php echo $this->res("metro/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js") ?>" type="text/javascript"></script>
<script src="<?php echo $this->res("metro/assets/global/plugins/jquery.blockui.min.js") ?>" type="text/javascript"></script>
<script src="<?php echo $this->res("metro/assets/global/plugins/jquery.cokie.min.js") ?>" type="text/javascript"></script>
<script src="<?php echo $this->res("metro/assets/global/plugins/uniform/jquery.uniform.min.js") ?>" type="text/javascript"></script>
<script src="<?php echo $this->res("metro/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js") ?>" type="text/javascript"></script>

<script src="<?php echo $this->res("metro/assets/global/scripts/metronic.js") ?>" type="text/javascript"></script>
<script src="<?php echo $this->res("metro/assets/admin/layout/scripts/layout.js") ?>" type="text/javascript"></script>
<script src="<?php echo $this->res("metro/assets/admin/layout/scripts/quick-sidebar.js") ?>" type="text/javascript"></script>
<script src="<?php echo $this->res("metro/assets/admin/layout/scripts/demo.js") ?>" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo $this->res("js/cp.js") ?>"></script>
<script type="text/javascript" src="<?php echo $this->res("lib/artDialog/jquery.artDialog.js?skin=green") ?>"></script>
<script type="text/javascript" src="<?php echo $this->res("lib/artDialog/plugins/iframeTools.js") ?>"></script>

<script>
    jQuery(document).ready(function() {
        Metronic.init();
        Layout.init();
        Demo.init();
    });
</script>
</body>
</html>
