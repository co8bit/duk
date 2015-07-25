<?php
namespace Home\Controller;
use Think\Controller;

class ProviderController extends Controller
{
    protected $uid    =   null;

    protected function _initialize()
    {
        header("Content-Type:text/html; charset=utf-8");
        $this->uid      =       session("uid");
        empty($this->uid) && $this->error("非法登录",U("Index/index"));
    }

    /**
     * 显示项目库页面、修改其中一项
     */
    public function projectLib()
    {
        $dbUserProjectLib   =   D("UserProjectLib");

        if (IS_POST)
        {//修改一项
            if($dbUserProjectLib->create())
            {
                $dbUserProjectLib->ownUid   =   $this->uid;
                $result = $dbUserProjectLib->save(); // 写入数据到数据库
                if($result)
                {
                    $this->success("修改成功");
                    exit();
                }
            }
            $this->error($dbUserProjectLib->getError());
        }
        else
        {//显示项目库页面
            $tmp =  $dbUserProjectLib->getUserProjectLib($this->uid);
            $this->assign("list",$tmp);
            $this->display();
        }
    }


     /**
     * 添加项目库的一项
     */
    public function addUserProjectLib()
    {
        $dbUserProjectLib   =   D("UserProjectLib");

        if($dbUserProjectLib->create())
        {
            $dbUserProjectLib->ownUid   =   $this->uid;
            $result = $dbUserProjectLib->add(); // 写入数据到数据库
            if($result)
            {
                $this->success("新增成功");
                exit();
            }
        }
        $this->error($dbUserProjectLib->getError());
    }


    public function personal()
    {
        $this->display();
    }
}