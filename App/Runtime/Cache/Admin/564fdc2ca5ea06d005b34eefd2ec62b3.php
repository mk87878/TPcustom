<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?php $_web_config = F('web_config'); if($_web_config){ $titles = $meta_title.'-'.$_web_config['title'].'后台管理'; $title = $_web_config['title'].'后台管理'; $web_name = $_web_config['title'].'后台管理系统'; }else{ $titles = $meta_title.'-后台管理'; $title = '后台管理'; $web_name = '后台管理系统'; } ?>
        <?php echo ($meta_title ? $titles : $title); ?>
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
        <a class="navbar-brand" href="<?php echo U('Index/index');?>"><?php echo ($web_name); ?></a>
    </div>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav side-sub-menu">
            <li><a href="<?php echo U('Index/index');?>"><i class="fa fa-dashboard"></i> 首页</a></li>
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
        <div class="row">
    <div class="col-lg-12">
        <h1> <?php echo ($meta_title ? $meta_title : '管理'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo U('Index/index');?>"><i class="icon-dashboard fa fa-dashboard"></i> 首页</a></li>
            <li class="active"><i class="icon-file-alt fa fa-edit"></i> <?php echo ($meta_title ? $meta_title : '管理'); ?></li>
        </ol>

    </div>
</div><!-- /.row --><!-- /.row -->
        <form role="form" method="post" action="">

            <div class="row">
                <div class="col-md-7">
                    <label>站点名称</label>
                    <input name="title" type="text" class="form-control" value="<?php echo ($_web_config["title"]); ?>">
                    <p class="help-block">站点的名称将显示在网页的标题处.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <label>站点描述</label>
                    <input  value="<?php echo ($_web_config["description"]); ?>" name="description" type="text" class="form-control">
                    <p class="help-block">站点描述将显示在网页代码的头部.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <label>站点关键词</label>
                    <input value="<?php echo ($_web_config["keywords"]); ?>" name="keywords" type="text" class="form-control">
                    <p class="help-block">请以英文半角逗号 "," 分割多个关键字.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <label>公司名称</label>
                    <input value="<?php echo ($_web_config["company"]); ?>" name="company" type="text" class="form-control">
                    <!--<p class="help-block">请以英文半角逗号 "," 分割多个关键字.</p>-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <label>站点备案号</label>
                    <input value="<?php echo ($_web_config["id_number"]); ?>" name="id_number" type="text" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <label>邮箱</label>
                    <input  value="<?php echo ($_web_config["email"]); ?>" name="email" type="text" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <label>大概地址</label>
                    <input  value="<?php echo ($_web_config["address"]); ?>" name="address" type="text" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <label>详细地址</label>
                    <input  value="<?php echo ($_web_config["address_detail"]); ?>" name="address_detail" type="text" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <label>传真</label>
                    <input  value="<?php echo ($_web_config["fax"]); ?>" name="fax" type="text" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <label>电话</label>
                    <input  value="<?php echo ($_web_config["phone"]); ?>" name="phone" type="text" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <label>电话服务时间</label>
                    <input  value="<?php echo ($_web_config["phone_time"]); ?>" name="phone_time" type="text" class="form-control">
                    <p class="help-block">例:周一~周五, 8:00 - 20:00</p>

                </div>
            </div>


            <div class="ow st-margintop15">
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
    highlight_subnav("/index.php?s=/Admin/Basic/index");
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
                dialog.success(data.msg,document.URL);
            } else {
                dialog.error(data.msg);
            }
        }
    });

</script>