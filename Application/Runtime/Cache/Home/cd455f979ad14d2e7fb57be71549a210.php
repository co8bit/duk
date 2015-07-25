<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>机构信息维护</title>

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
    <li role="presentation"><a href="">个人信息管理</a></li>
    <li role="presentation"><a href="#">机构信息维护</a></li>
</ul>
<ul class="nav bs-docs-sidenav">项目库
    <li role="presentation"><a href="#">项目库</a></li>
</ul>
<ul class="nav bs-docs-sidenav">服务
    <li role="presentation"><a href="#">发布服务</a></li>
</ul>
<ul class="nav bs-docs-sidenav">投标
    <li role="presentation"><a href="#">查看标书</a></li>
    <li role="presentation"><a href="#">查看已买标书</a></li>
    <li role="presentation"><a href="#">中标管理</a></li>
</ul>
<ul class="nav bs-docs-sidenav">数据中心
    <li role="presentation"><a href="#">推广</a></li>
    <li role="presentation"><a href="#">服务管理</a></li>
    <li role="presentation"><a href="#">排期</a></li>
</ul>
        </div>
        <div class="col-md-9">
            <h4>邀请码：${invitecode}</h4>
            <div class="row">
                <table class="table">
                    <tr>
                        <th>序号</th>
                        <th>用户名</th>
                        <th>折扣</th>
                        <th>是否兑现</th>
                    </tr>
                    <tr>
                        <td><?php echo ($id); ?></td>
                        <td><?php echo ($username); ?></td>
                        <td><?php echo ($discount); ?></td>
                        <td><?php echo ($cash); ?></td>
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