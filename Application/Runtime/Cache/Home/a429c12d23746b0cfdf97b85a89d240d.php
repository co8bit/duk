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
                        <th>项目名称</th>
                        <th>项目人数</th>
                        <th>项目金额</th>
                        <th>启动时间</th>
                        <th>竞标截止日</th>
                        <th>竞标底价</th>
                        <th>标书价格</th>
                        <th>购买标书竞价</th>
                        <th>中标价</th>
                    </tr>
                    <tr>
                        <td><?php echo ($name); ?></td>
                        <td><?php echo ($people); ?></td>
                        <td><?php echo ($price); ?></td>
                        <td><?php echo ($starttime); ?></td>
                        <td><?php echo ($endtime); ?></td>
                        <td><?php echo ($stoptime); ?></td>
                        <td><?php echo ($price); ?></td>
                        <td><?php echo ($priceon); ?></td>
                        <td><?php echo ($priceget); ?></td>
                    </tr>
                </table>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span>总金额：</span><span><?php echo ($pricetotal); ?></span>
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