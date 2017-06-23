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
                    <div class="form-group">
                        <label>友链网站名</label>
                        <input name="name" value="<?php echo ($_link["name"]); ?>" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label>友链连接</label>
                    <textarea class="form-control" name="url" placeholder="http://" ><?php echo ($_link["url"]); ?></textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label  class="col-md-12 control-label" >缩略图:</label>
                    <div class="col-md-5 st-overhidex" >
                        <input id="file_upload"  type="file" multiple="true" >
                        <img  id="upload_org_code_img" src="<?php echo ($_link["img"]); ?>" height="150">
                        <input id="file_upload_image" name="img" type="hidden" multiple="true" value="<?php echo ($_link["img"]); ?>">
                    </div>
                </div>
            </div>
            <!--<div class="row">-->
                <!--<div class="form-group">-->
                    <!--<label  class="col-md-12 control-label" >缩略图hover:</label>-->
                    <!--<div class="col-md-5 st-overhidex" >-->
                        <!--<input id="file_upload_hover"  type="file" multiple="true" >-->
                        <!--<img  id="upload_org_code_img_hover" src="<?php echo ($_link["hover"]); ?>" height="150">-->
                        <!--<input id="file_upload_image_hover" name="hover" type="hidden" multiple="true" value="">-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->





            <div class="row st-margintop15">
                <div class="col-md-12">
                    <input type="hidden" name="id" value="<?php echo ($_link["id"]); ?>">
                    <button class="btn btn-primary loading-btn" type="submit"><span  class="glyphicon glyphicon-floppy-disk"></span>保存</button>

                </div>
            </div>
        </form>


    </div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->
<script>
    var SCOPE = {
        'simditor_img_upload' : '/index.php?s=/Admin/Upload/simditoruploadimage',
        'ajax_upload_image_url' : '/index.php?s=/Admin/Upload/uploadifyimage',
        'ajax_upload_swf' : '/Public/static/uploadify/uploadify.swf'
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
<link rel="stylesheet" type="text/css" href="/Public/static/simditor/styles/simditor.css" />
<script type="text/javascript" src="/Public/static/simditor/scripts/module.js"></script>
<script type="text/javascript" src="/Public/static/simditor/scripts/hotkeys.js"></script>
<script type="text/javascript" src="/Public/static/simditor/scripts/uploader.js"></script>
<script type="text/javascript" src="/Public/static/simditor/scripts/simditor.js"></script>

<script>
    var toolbar = ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', '|', 'ol', 'ul', 'blockquote', 'table', '|', 'link', 'hr', 'image', '|', 'indent', 'outdent', 'alignment'];

    var editor = new Simditor({
        textarea: $('#editor'),
        //optional options
        placeholder: '这里输入内容...',
        toolbar: toolbar, //工具栏
        defaultImage: 'Public/static/simditor/images/image.png', //编辑器插入图片时使用的默认图片
        upload: {
            url: SCOPE.simditor_img_upload, //文件上传的接口地址
            params: null, //键值对,指定文件上传接口的额外参数,上传的时候随文件一起提交
            fileKey: 'fileDataFileName', //服务器端获取文件数据的参数名
            connectionCount: 3,
            leaveConfirm: '正在上传文件'
        }
    });
</script><!-- /footer -->

<script>
    highlight_subnav("/index.php?s=/Admin/<?php echo (CONTROLLER_NAME); ?>/index");
</script>

<script>
    /**
     * 图片上传功能

    $('#file_upload_hover').uploadify({
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

                console.log(data);
                $('#' + file.id).find('.data').html(' 上传完毕');

                $("#upload_org_code_img_hover").attr("src", obj.data);
                $("#file_upload_image_hover").attr('value', obj.data);
                $("#upload_org_code_img_hover").show();
            } else {
                alert('上传失败');
            }
        },
    });
     */

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