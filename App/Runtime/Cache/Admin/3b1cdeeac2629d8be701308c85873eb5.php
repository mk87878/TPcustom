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


        <div class="row" style="padding-bottom: 10px">
            <div class="col-md-12">
                <a href="<?php echo U('add');?>" class="btn btn-primary">增加</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="4%">#</th>
                            <th>首页轮播名称</th>
                            <th>连接</th>

                            <th width="10%">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($_banner)): $i = 0; $__LIST__ = $_banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$_lk): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($key+1+$_page); ?></td>
                                <td><?php echo ($_lk["name"]); ?></td>
                                <td><?php echo ($_lk["url"]); ?></td>

                                <td>
                                    <a href="/index.php?s=/Admin/Banner/edit&id=<?php echo ($_lk["id"]); ?>">编辑</a>
                                    <a href="javascript:void(0)" class="delete text-danger"
                                       attr-id="<?php echo ($_lk["id"]); ?>" attr-message="删除">
                                        删除
                                    </a>


                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>




    </div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->

<script>
    var SCOPE = {
        'set_status_url': '/index.php?s=/Admin/<?php echo (CONTROLLER_NAME); ?>/del',
    }
</script>
<!-- JavaScript -->

</body>
</html>

<!-- /footer -->

<script>
    highlight_subnav("/index.php?s=/Admin/<?php echo (CONTROLLER_NAME); ?>/index");
</script>


<script>
    /**
     * 删除操作JS
     */
    $('.delete').on('click', function () {
        var id = $(this).attr('attr-id');
        var a = $(this).attr("attr-a");
        var msg = $(this).attr("attr-message");
        var url = SCOPE.set_status_url;

        data = {};
        data['id'] = id;


        layer.open({
            type: 0,
            title: '是否提交？',
            btn: ['是', '否'],
            icon: 3,
            closeBtn: 2,
            content: "是否确定" + msg,
            scrollbar: true,
            yes: function () {
                // 执行相关跳转
                todelete(url, data);
            },

        });

    });
</script>