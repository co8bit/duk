<?php
namespace Admin\Controller;
use Think\Controller;

class ProviderController extends Controller
{
    protected function _initialize()
    {
        header("Content-Type:text/html; charset=utf-8");
        $this->uid      =       session("uid");
        empty($this->uid) && $this->error("非法登录",U("Index/index"));
    }

    public function addStandardProjectLib()
    {
    	if (IS_POST)
    	{
    		$dbStandardProjectLib	=	D("StandardProjectLib");
    		if($dbStandardProjectLib->create())
    		{
				$result = $dbStandardProjectLib->add(); // 写入数据到数据库
				if($result)
				{
					$this->success("新增成功");
					exit();
				}
			}
			$this->error($dbStandardProjectLib->getError());
    	}
    	else
        	$this->display();
    }
}