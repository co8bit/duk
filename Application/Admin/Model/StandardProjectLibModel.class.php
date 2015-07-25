<?php
namespace Admin\Model;
use Think\Model;

class StandardProjectLibModel extends Model
{

	/**
	 * 自动验证
	 */
	protected $_validate = array(
		array('one','require','一级类别必须！'), 
		array('name','require','项目名称必须！'), 
		array('english','require','英文简名必须！'), 
		array('checkItem','require','检查项目必须！'), 
		array('linchuang','require','临床意义必须！'), 
		array('remark','require','备注必须！'), 
		array('price','require','单价必须！'), 

		array('name','','项目名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
		array('price','number','价钱必须为数字！',0),
	);

}
?>