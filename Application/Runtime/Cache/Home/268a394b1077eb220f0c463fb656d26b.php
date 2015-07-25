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
<div class="container" style="margin-top: 50px">
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
        <div class="col-md-9">
            <div class="row">
                <table class="table">
                    <tr>
                        <th>序号</th>
                        <th>名称</th>
                        <th>创建日期</th>
                        <th>操作</th>
                    </tr>
                    <tr>
                        <td>${id}</td>
                        <td>$[name}</td>
                        <td>${time}</td>
                        <td><input type="button" class="btn" value="选择"/></td>
                    </tr>
                </table>
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