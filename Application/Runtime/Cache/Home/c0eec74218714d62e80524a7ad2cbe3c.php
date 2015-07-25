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
<div class="container" style="margin-top: 100px">
    <h1 class="center-block" style="text-align: center">欢迎使用</h1>
    <h1 class="text-success" style="text-align: center">好身体</h1>
    <form method="post" action="">
        <div class="row">
            <div class="col-lg-1 col-lg-offset-4"><label for="username">账号：</label></div>
            <div class="col-lg-3"><input class="form-control" name="username" type="text" placeholder="请输入用户名" id="username"></div>
        </div>
        <div class="row">
            <div class="col-lg-1 col-lg-offset-4"><label for="password">密码：</label></div>
            <div class="col-lg-3"><input class="form-control" name="password" type="password" placeholder="请输入密码" id="password"></div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-lg-offset-4"><input class="form-control btn-primary" type="submit" value="登录"></div>
            <div class="col-lg-2"><input class="form-control btn-success" type="button" value="注册"></div>
        </div>
    </form>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/hst/Public/js/bootstrap.min.js"></script>
</body>
</html>