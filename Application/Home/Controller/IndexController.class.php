<?php
namespace Home\Controller;
use Think\Controller;

require_once(APP_PATH."/Home/Conf/MyConfigINI.php");


class IndexController extends Controller 
{
	protected function _initialize()
    {
        header("Content-Type:text/html; charset=utf-8");
        // $this->uid      =       session("uid");
        // empty($this->uid) && $this->error("=.=你知道的太多了，biu",U("Index/login"));
        // if ($this->uid > 4)
        //     exit("=.=你知道的太多了，biu");
    }
    
    public function index()
    {
        echo '<br>注册：User/sign：
            <form action="'.U("User/sign").'" method="post" >
                用户名:<input type="text" name="username" value=""/>
                密码:<input type="text" name="password" value=""/>
                <input type="submit" value="提交" >
            </form><br>
        ';
        echo '<br>测试User/setUserInfo:
            <form action="'.U("User/setUserInfo").'" enctype="multipart/form-data" method="post" >
                uid:<input type="text" name="uid" value="1"/>
                content:<input type="text" name="content" value="15213"/>
                file:<input type="file" name="logoPic" />
                <input type="submit" value="提交" >
            </form><br>
        ';
        echo '<br>测试User/setUserInfoLogo:
            <form action="'.U("User/setUserInfoLogo").'" enctype="multipart/form-data" method="post" >
                uid:<input type="text" name="uid" value="1"/>
                file:<input type="file" name="logoPic" />
                <input type="submit" value="提交" >
            </form><br>
        ';

        echo APP_PATH."<br>";
        echo _UPLOADPATH;


        echo '<br>测试Activity/create：
            <form action="'.U("Activity/create").'" enctype="multipart/form-data" method="post" >
                file:<input type="file" name="logoPic" />
                <input type="submit" value="提交" >
            </form><br>
        ';
        echo '<br>测试Activity/edit:
            <form action="'.U("Activity/edit").'" enctype="multipart/form-data" method="post" >
                mode:<input type="text" name="mode" value="2"/>
                sid:<input type="text" name="aid" value="2"/>
                file:<input type="file" name="logoPic" />
                <input type="submit" value="提交" >
            </form><br>
        ';
        
        echo '<br>测试活动名单导出：
            <form action="'.U("Activity/createActivityUserExcel").'" method="post" >
                aid:<input type="text" name="aid" value="1"/>
                <input type="submit" value="下载" >
            </form><br>
        ';
    }
}