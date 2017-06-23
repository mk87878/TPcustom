<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html>
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
      <div class="col-md-12">
        <h1>首页</h1>
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-dashboard"></i> 首页</li>
        </ol>

      </div>
    </div><!-- /.row -->

    <div class="row">

      <div class="col-md-3">
        <div class="panel panel-success">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-file-text-o fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-text">赛事指引文章数</p>
                <p class="announcement-heading"><?php echo ($_count["guide"]); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-file-text-o fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-text">赛事新闻文章数</p>
                <p class="announcement-heading"><?php echo ($_count["news"]); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-file-video-o fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-text">赛事视频数</p>
                <p class="announcement-heading"><?php echo ($_count["live"]); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>



      <div class="col-md-3">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-users fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-text">合作伙伴数</p>
                <p class="announcement-heading"><?php echo ($_count["partner"]); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>



  </div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->


<!-- JavaScript -->

</body>
</html>

<!-- /footer -->

<script type="text/javascript">
  highlight_subnav("<?php echo U('Index/index');?>");
</script>