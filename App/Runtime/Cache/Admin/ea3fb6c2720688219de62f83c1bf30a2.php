<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?php $title = $meta_title.'-黄金联赛后台管理'; ?>
        <?php echo ($meta_title ? $title : '黄金联赛后台管理'); ?>
    </title>

    <!-- Bootstrap core CSS -->
    <link href="/Public/Admin/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="/Public/Admin/css/sb-admin.css" rel="stylesheet">
    <link href="/Public/Admin/css/admin_style.css" rel="stylesheet">
    <link rel="stylesheet" href="/Public/Admin/font-awesome/css/font-awesome.min.css">
    <script src="/Public/Admin/js/jquery-1.10.2.js"></script>
    <script src="/Public/static/dialog/layer.js"></script>
    <script src="/Public/Admin/js/bootstrap.min.js"></script>
    <script src="/Public/static/dialog.js"></script>
    <script src="/Public/static/labkr.js"></script>
</head>
<body>


<div id="wrapper">

    <!-- Sidebar -->
    <?php $navs = D("Menu")->getAdminMenus(); if(!session('adminUser')) { $this->redirect('/admin/User/login'); } $_adminUser = session('adminUser'); ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">菜单</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo U('Index/index');?>">黄金联赛后台管理系统</a>
    </div>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav side-sub-menu">
            <li><a href="<?php echo U('Index/index');?>"><i class="fa fa-dashboard"></i> 首页</a></li>
            <!--<li><a href="#"><i class="fa fa-bar-chart-o"></i> 菜单</a></li>-->
            <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navs): $mod = ($i % 2 );++$i;?><li><a href="/index.php?s=/Admin/<?php echo ($navs['url']); ?>"> <?php echo ($navs["icon"]); ?> <?php echo ($navs["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>

        <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo ($_adminUser["username"]); ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo U('User/profile');?>"><i class="fa fa-user"></i> 密码修改</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo U('User/loginout');?>"><i class="fa fa-power-off"></i> 注销</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>

    <div id="page-wrapper">
        <ul class="nav nav-tabs">
            <li ><a href="/index.php?s=/Admin/News/index">内容管理</a></li>
            <li class="active"><a href="javascript:;">分类管理</a></li>
            <li ><a href="/index.php?s=/Admin/News/intro">介绍设置</a></li>
        </ul>
        <div class="row">
    <div class="col-lg-12">
        <h1> <?php echo ($meta_title ? $meta_title : '管理'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo U('Index/index');?>"><i class="icon-dashboard fa fa-dashboard"></i> 首页</a></li>
            <li class="active"><i class="icon-file-alt fa fa-edit"></i> <?php echo ($meta_title ? $meta_title : '管理'); ?></li>
        </ol>

    </div>
</div><!-- /.row --><!-- /.row -->
        <form role="form" method="post" >
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        <label>分类名称</label>
                        <input name="sort_name" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        <label>分类英文名称</label>
                        <input name="sort_en" class="form-control">
                    </div>
                </div>
            </div>



            <div class="row st-margintop15">
                <div class="col-md-12">
                    <button class="btn btn-primary loading-btn" type="submit"><span  class="glyphicon glyphicon-floppy-disk"></span>保存</button>

                </div>
            </div>
        </form>







    </div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->

<!-- JavaScript -->

</body>
</html>

<!-- /footer -->

<script>
    highlight_subnav("/index.php?s=/Admin/News/index");
</script>

<script>
    $("form").submit(function () {
        var self = $(this);
        lab_loading('.loading-btn');
        $.post(self.attr("action"), self.serialize(), success, "json");
        return false;

        function success(data) {
            lab_endLoading('.loading-btn');
            if (data.status == 1) {
                dialog.success(data.msg,data.data);
            } else {
                dialog.error(data.msg);
            }
        }
    });

</script>