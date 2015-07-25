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
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <td>套餐名称</td>
                            <td><input name="name" type="text" class="form-control" value="$name"/></td>
                        </tr>
                        <tr>
                            <td>套餐分类</td>
                            <td><input name="name" type="text" class="form-control" value="$type"/></td>
                        </tr>
                        <tr>
                            <td>购买后体检周期</td>
                            <td><input name="name" type="text" class="form-control" value="$timeline"/></td>
                        </tr>
                        <tr>
                            <td>体检注意事项</td>
                            <td><input name="name" type="text" class="form-control" value="$notice"/></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <tr>
                        <th>序号</th>
                        <th width="80">体检项目</th>
                        <th width="50">价格</th>
                        <th width="80">所属大类</th>
                        <th width="280">意义</th>
                        <th>性别</th>
                        <th>婚姻状况</th>
                        <th>操作</th>
                    </tr>
                    <tr>
                        <td>${id}</td>
                        <td>${name}</td>
                        <td>${price}</td>
                        <td>${type}</td>
                        <td>${content}</td>
                        <td><input type="radio" checked="${sex}"/>男<input type="radio"/>女</td>
                        <td><input type="radio" checked="${marriage}"/>未婚<input type="radio"/>已婚</td>
                        <td><input type="button" value="删除"/></td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-md-10">
                        <table class="table">
                            <tr>
                                <th>体检项目</th>
                                <th width="50">价格</th>
                                <th>所属大类</th>
                                <th>意义</th>
                                <th>性别</th>
                                <th>婚姻状况</th>
                            </tr>
                            <tr>
                                <td><select>
                                    <option>从常用</option>
                                </select></td>
                                <td><input type="text" width="50"/></td>
                                <td><select>
                                    <option>从常用</option>
                                </select></td>
                                <td><textarea></textarea></td>
                                <td><input type="radio"/>男<input type="radio"/>女</td>
                                <td><input type="radio"/>未婚<input type="radio"/>已婚</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-2"><input type="button" value="新增"/></div>
                </div>
                <div class="row">

                    <div class="col-md-5 col-md-offset-3">
                        <input type="button" value="创建" class="btn"/>
                    </div>

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