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
                            <td>公司名称</td>
                            <td><input name="name" type="text" class="form-control" value="<?php echo ($corpname); ?>"/></td>
                        </tr>
                        <tr>
                            <td>所属行业</td>
                            <td><input name="type" type="text" class="form-control" value="<?php echo ($workin); ?>"/></td>
                        </tr>
                        <tr>
                            <td>公司性质</td>
                            <td>
                                <input name="property" type="text" class="form-control" value="<?php echo ($worktype); ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>公司地址</td>
                            <td>
                                <input name="destination" type="text" class="form-control" value="<?php echo ($destination); ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>公司网站</td>
                            <td>
                                <input name="webpage" type="text" class="form-control" value="<?php echo ($website); ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>公司账户</td>
                            <td>
                                <input name="acount" type="text" class="form-control" value="<?php echo ($account); ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>开户行</td>
                            <td>
                                <input name="beginacount" type="text" class="form-control" value="<?php echo ($accountbank); ?>"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6"><p>${time}日通过审核</p></div>
                    <div class="col-md-6"><input type="button" class="btn" value="修改"/></div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-md-offset-1"><input type="button" class="btn" value="授权书下载"/></div>
                    <div class="col-md-2 col-md-offset-1"><input type="button" class="btn" value="授权书上传"/></div>
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