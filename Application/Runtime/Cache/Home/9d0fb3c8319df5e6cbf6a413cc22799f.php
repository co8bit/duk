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
<div class="container" style="margin-top: 40px">
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
        <div class="col-md-6 offset1">
            <div>
                <select>
                    <option>科室检查</option>
                    <option>三大常规</option>
                    <option>实验室检查</option>
                    <option>心理检测</option>
                    <option>医技检查</option>
                    <option>中医体检</option>
                    <option>基因检测</option>
                    <option>报告及其他</option>
                </select>
            </div>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th width="30">序号</th>
                        <th width="60">项目名称</th>
                        <th width="50">英文简名</th>
                        <th width="80">检查项目</th>
                        <th>临床意义</th>
                        <th>备注</th>
                        <th width="50">单价</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <form action='<?php echo U("Provider/projectLib");?>' method="post" >
                                <input type="hidden" name="uplid" value="<?php echo ($vo["uplid"]); ?>">
                                <td style="text-align: center;vertical-align: middle"><?php echo ($key+1); ?></td>
                                <td style="text-align: center;vertical-align: middle"><?php echo ($vo["name"]); ?></td>
                                <td><input name="english" type="text" class="form-control" value="<?php echo ($vo["english"]); ?>"/></td>
                                <td><input name="checkItem" type="text" class="form-control" value="<?php echo ($vo["checkItem"]); ?>"/></td>
                                <td><input name="linchuang" type="text" class="form-control" value="<?php echo ($vo["linchuang"]); ?>"/></td>
                                <td><input name="remark" type="text" class="form-control" value="<?php echo ($vo["remark"]); ?>"/></td>
                                <td><input name="price" type="text" class="form-control" value="<?php echo ($vo["price"]); ?>"/></td>
                                <td><input type="submit" value="保存修改" ></td>
                            </form>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>>
                </tbody>
            </table>
        </div>

        <div class="col-md-6 offset1">
            <form action="<?php echo U("Provider/addUserProjectLibItem");?>" method="post" >
                一级类别：<input name="one" type="text" class="form-control"/>
                项目名称：<input name="name" type="text" class="form-control"/>
                英文简名：<input name="english" type="text" class="form-control"/>
                检查项目：<input name="checkItem" type="text" class="form-control"/>
                临床意义：<input name="linchuang" type="text" class="form-control"/>
                备注：<input name="remark" type="text" class="form-control"/>
                单价：<input name="price" type="text" class="form-control"/>
                <input type="submit" value="新增" >
            </form><br>
        </div>

    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/hst/Public/js/bootstrap.min.js"></script>
</body>
</html>