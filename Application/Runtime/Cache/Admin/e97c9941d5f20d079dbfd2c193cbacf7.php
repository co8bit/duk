<?php if (!defined('THINK_PATH')) exit();?>
<div class="container" style="margin-top: 40px">
    <div class="row">
        <div class="col-md-3 sidebar">
            
        </div>
        

        <div class="col-md-6 offset1">
            <form action="<?php echo U("Provider/addStandardProjectLib");?>" method="post" >
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