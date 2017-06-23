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
        <ul class="nav nav-tabs" id="nav_tabs">
            <li class="active"><a href="javascript:;" >内容管理</a></li>
            <li ><a href="/index.php?s=/Admin/News/sort_index">分类管理</a></li>
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


            <div class="row">
                <div class="col-md-9 pull-left">
                    <a href="/index.php?s=/Admin/News/add" class="btn btn-primary">增加</a>
                </div>
                <div class="col-md-3 pull-right">
                    <div class="form-group input-group">
                        <input id="search_input" type="text" class="form-control" value="<?php echo ($_search["search_input"]); ?>"
                               placeholder="请输入名称搜索">
                        <span class="input-group-btn">
                  <button class="btn btn-default" id="search_btn" onclick="search()" type="button"><i
                          class="fa fa-search"></i></button>
                </span>
                    </div>
                </div>



            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="4%">#</th>
                                <th>名称</th>
                                <th class="col-md-2">发布时间</th>
                                <th width="10%">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($_tds)): $i = 0; $__LIST__ = $_tds;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$_td): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($key+1+$_page); ?></td>
                                    <td><?php echo ($_td["title"]); ?></td>
                                    <td><?php echo (date('Y-m-d H:i',$_td["time"])); ?></td>
                                    <td>
                                        <a href="/index.php?s=/Admin/News/edit&id=<?php echo ($_td["id"]); ?>">编辑</a>
                                        <a href="javascript:void(0)" class="delete text-danger"
                                           attr-id="<?php echo ($_td["id"]); ?>" attr-message="删除">
                                            删除
                                        </a>

                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class=" clearfix col-md-7 pull-right">
                    <ul class='pagination pull-right' style="margin: 0">
                        <?php echo ($_pages); ?>
                    </ul>
                </div>
            </div>


    </div><!-- /#page-wrapper -->


</div><!-- /#wrapper -->

<script>
    var SCOPE = {
        'set_status_url': '/index.php?s=/Admin/News/del',
    }
</script>
<!-- JavaScript -->

</body>
</html>

<!-- /footer -->

<script>
    highlight_subnav("/index.php?s=/Admin/News/index");
</script>

<script>
    function search() {
        var input = $('#search_input').val();
        window.location.href = '/index.php?s=/Admin/News/index/search_input/' + input;
    }
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