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
                <tr>
                    <th>名次</th>
                    <th>投标机构</th>
                    <th>时间</th>
                    <th>价格</th>
                    <th>服务</th>
                    <th>医护团队</th>
                    <th>设备</th>
                    <th>资质</th>
                    <th>总得分</th>
                    <th>标书详情</th>
                </tr>
                <tr>
                    <td>
                        <?php echo ($id); ?>
                    </td>
                    <td>
                        <?php echo ($name); ?>
                    </td>
                    <td>
                        <?php echo ($time); ?>
                    </td>
                    <td>
                        <?php echo ($price); ?>
                    </td>
                    <td>
                        <?php echo ($service); ?>
                    </td>
                    <td>
                        <?php echo ($medicalteam); ?>
                    </td>
                    <td>
                        <?php echo ($device); ?>
                    </td>
                    <td>
                        <?php echo ($quality); ?>
                    </td>
                    <td>
                        <?php echo ($total); ?>
                    </td>
                    <td>
                        <input type="button" class="btn" value="查看"/>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/hst/Public/js/bootstrap.min.js"></script>
</body>
</html>