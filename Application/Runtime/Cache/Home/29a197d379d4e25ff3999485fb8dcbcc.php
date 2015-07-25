<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>好身体</title>

    <!-- Bootstrap -->
    <link href="/hst/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .sidebar{background: #f5f5f5}
    </style>
</head>
<body>
<div class="container" style="margin-top: 60px">
    <div class="row">
        <div class="col-md-3 sidebar">
            <ul class="nav bs-docs-sidenav">基本信息
    <li role="presentation"><a href="personal">个人信息管理</a></li>
    <li role="presentation"><a href="corpinfo">企业信息及授权</a></li>
</ul>
<ul class="nav bs-docs-sidenav">招标管理
    <li role="presentation"><a href="castbiaoshu">发布招标</a></li>
    <li role="presentation"><a href="receivebiaoshu">接收标书</a></li>
    <li role="presentation"><a href="#">开标</a></li>
    <li role="presentation"><a href="#">体检准备</a></li>
</ul>
<ul class="nav bs-docs-sidenav">服务管理
    <li role="presentation"><a href="#">体检预约</a></li>
    <li role="presentation"><a href="#">到检查询</a></li>
</ul>
<ul class="nav bs-docs-sidenav">项目结算
</ul>
        </div>
        <div class="col-md-6 offset1">
            <table class="table table-responsive">
                <tbody>
                <tr>
                    <td>个人身份信息</td>
                </tr>
                <tr>
                    <td>姓名</td>
                    <td><input name="realName" type="text" class="form-control" value="<?php echo ($realName); ?>"/></td>
                </tr>
                <tr>
                    <td>身份证号</td>
                    <td><input name="idcard" type="text" class="form-control" value="<?php echo ($idcard); ?>"/></td>
                </tr>
                <tr>
                    <td>性别</td>
                    <td>
                        <input name="sex" type="text" class="form-control" value="<?php echo ($sex); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>婚否</td>
                    <td>
                        <input name="marrige" type="text" class="form-control" value="<?php echo ($marrige); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>手机号</td>
                    <td>
                        <input name="phone" type="text" class="form-control" value="<?php echo ($phone); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>座机</td>
                    <td>
                        <input name="phone2" type="text" class="form-control" value="<?php echo ($phone2); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>邮箱</td>
                    <td>
                        <input name="email" type="text" class="form-control" value="<?php echo ($email); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>上传手持身份证照片</td>
                    <td>
                        <input name="idcardPic" type="file" class="form-control"/>
                    </td>
                </tr>
                <tr>
                    <td>昵称</td>
                    <td>
                        <input name="nickname" type="text" class="form-control" value="<?php echo ($nickname); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>上传头像图片</td>
                    <td>
                        <input name="touxiang" type="file" class="form-control"/>
                    </td>
                </tr>
                <tr>
                    <td>个人职业信息</td>
                </tr>
                <tr>
                    <td>当前任职机构</td>
                    <td>
                        <input name="corp" type="text" class="form-control" value="<?php echo ($corp); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>职务</td>
                    <td>
                        <input name="career" type="text" class="form-control" value="<?php echo ($career); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>上传名片</td>
                    <td>
                        <input name="businessCard" type="file" class="form-control"/>
                    </td>
                </tr>
                <tr>
                    <td>现任机构工作年限</td>
                    <td>
                        <input name="workLimit" type="text" class="form-control" value="<?php echo ($workLimit); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>个人介绍</td>
                    <td>
                        <input name="introduction" type="text" class="form-control" value="<?php echo ($introduction); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>机构授权书</td>
                    <td>
                        <input name="corpBook" type="file" class="form-control"/>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-6"><p><?php echo ($time); ?>通过审核</p></div>
                <div class="col-md-6"><input type="button" class="btn" value="修改"/></div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/hst/Public/js/bootstrap.min.js"></script>
</body>
</html>