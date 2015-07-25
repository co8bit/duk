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
            <div class="row">
                <table class="table">
                    <tr>
                        <th width="90">类别</th>
                        <th width="80">预约截止日（检前第几天截止预约）</th>
                        <th>截至时点</th>
                        <th width="80">购买后体检周期多少天</th>
                        <th>启动条件人数</th>
                        <th>延/改期次数</th>
                        <th>延/改期罚金</th>
                        <th width="80">退款规则第几次延期后触发</th>
                        <th>套餐详情</th>
                        <th width="200">项目状态</th>
                    </tr>
                    <tr>
                        <td>${name}</td>
                        <td>${stopdate}</td>
                        <td>${stoptime}</td>
                        <td>${timeline}</td>
                        <td>${minnum}</td>
                        <td>${changetime}</td>
                        <td>${changefee}</td>
                        <td>${aftertimes}</td>
                        <td>查看</td>
                        <td><input class="btn" type="button" value="上架"/><input class="btn" type="button" value="下架"/><input class="btn" type="button" value="删除"/></td>
                    </tr>
                </table>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span>总金额：</span><span>150</span>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <input class="btn" type="button" value="确认支付"/>
                </div>
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