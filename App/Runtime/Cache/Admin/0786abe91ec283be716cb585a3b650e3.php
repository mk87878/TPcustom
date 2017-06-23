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
        <ul class="nav nav-tabs" id="nav_tabs">
            <li ><a href="/index.php?s=/Admin/News/index" >内容管理</a></li>
            <li ><a href="/index.php?s=/Admin/News/sort_index">分类管理</a></li>
            <li class="active"><a href="javascript:;">介绍设置</a></li>
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
        <form role="form" method="post" action="">


    <div class="row">
        <div class="col-md-7">
            <label>栏目介绍</label>
            <textarea name="description" cols="30" rows="5"  class="form-control" placeholder="300字以内" maxlength="300"> <?php echo ($_intro["description"]); ?></textarea>

            <p class="help-block">栏目介绍,展示于首页板块介绍.</p>
        </div>
    </div>




    <div class="row">
        <div class="form-group">
            <label class="col-md-12 control-label" style="line-height: 30px">栏目头部图片:</label>
            <div class="col-md-5 st-overhidex">
                <input id="file_upload" type="file" multiple="true">
                <?php if($_intro['thumb']!=''){ ?>
                <img id="upload_org_code_img" src="<?php echo ($_intro["thumb"]); ?>" height="150">
                <?php }else{ ?>
                <img style="display: none" id="upload_org_code_img" src="" height="150">
                <?php } ?>
                <input id="file_upload_image" name="thumb" type="hidden" multiple="true"
                       value="<?php echo ($_intro["thumb"]); ?>">
                <p class="help-block">请上传 1120px * 243px 大小的图片（或者倍数图片）</p>

            </div>
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

<script>
    var SCOPE = {
        'ajax_upload_mp4_url': '/index.php?s=/Admin/Upload/uploadifymp4',
        'ajax_upload_image_url': '/index.php?s=/Admin/Upload/uploadifyimage',
        'ajax_upload_swf': '/Public/static/uploadify/uploadify.swf'
    };

</script>
<!-- JavaScript -->

</body>
</html>

<!-- /footer -->
<script src="/Public/static/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/Public/static/uploadify/uploadify.css">

<script>
    /**
     * 图片上传功能
     */
    $('#file_upload').uploadify({
        'swf': SCOPE.ajax_upload_swf,
        'uploader': SCOPE.ajax_upload_image_url,
        'buttonText': '上传图片',
        'fileTypeDesc': 'Image Files',
        'fileObjName': 'img_file',
        //允许上传的文件后缀
        'fileTypeExts': '*.gif; *.jpg; *.png',
        'onUploadSuccess': function (file, data, response) {
            // response true ,false
            if (response) {
                var obj = JSON.parse(data); //由JSON字符串转换为JSON对象

//                console.log(data);
                $('#' + file.id).find('.data').html(' 上传完毕');

                $("#upload_org_code_img").attr("src", obj.data);
                $("#file_upload_image").attr('value', obj.data);
                $("#upload_org_code_img").show();
            } else {
                alert('上传失败');
            }
        },
    });

    /**
     * mp4上传功能
     */
    $('#mp4_upload').uploadify({
        'swf': SCOPE.ajax_upload_swf,
        'uploader': SCOPE.ajax_upload_mp4_url,
        'buttonText': '上传mp4视频',
//        'fileTypeDesc': 'Image Files',
        'fileObjName': 'mp4_file',
        //允许上传的文件后缀
        'fileTypeExts': '*.mp4',
        'onUploadSuccess': function (file, data, response) {
            // response true ,false
            if (response) {
                var obj = JSON.parse(data); //由JSON字符串转换为JSON对象

//                console.log(data);
                $('#' + file.id).find('.data').html(' 上传完毕');

                $("#upload_org_code_mp4").attr("src", obj.data);
                $("#file_upload_mp4").attr('value', obj.data);
                $("#upload_org_code_mp4").show();
            } else {
                alert('上传失败');
            }
        },
    });

</script>
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
                dialog.success(data.msg,document.URL);
            } else {
                dialog.error(data.msg);
            }
        }
    });

</script>