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
        echo '<br>登录：User/sign：
            <form action="'.U("User/login").'" method="post" >
                用户名:<input type="text" name="username" value=""/>
                密码:<input type="text" name="password" value=""/>
                <input type="submit" value="提交" >
            </form><br>
        ';

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

       

        echo '<br>User/follow:
            <form action="'.U("User/follow").'" enctype="multipart/form-data" method="post" >
                要关注的人的uid:<input type="text" name="toUid" value=""/>
                <input type="submit" value="提交" >
            </form><br>
        ';
         echo '<br>User/unfollow:
            <form action="'.U("User/unfollow").'" enctype="multipart/form-data" method="post" >
                要取消关注的人的uid:<input type="text" name="toUid" value=""/>
                <input type="submit" value="提交" >
            </form><br>
        ';
         echo '<br>User/isFollow:
            <form action="'.U("User/isFollow").'" enctype="multipart/form-data" method="post" >
                要查询的人的uid:<input type="text" name="toUid" value=""/>
                <input type="submit" value="提交" >
            </form><br>
        ';
         echo '<br>User/userFollowList:
            <form action="'.U("User/userFollowList").'" enctype="multipart/form-data" method="post" >
                要查询的人的uid:<input type="text" name="toUid" value=""/>
                <input type="submit" value="提交" >
            </form><br>
        ';

        echo '<br>Question/collectq:
            <form action="'.U("Question/collectq").'" enctype="multipart/form-data" method="post" >
                要收藏的qid:<input type="text" name="qid" value=""/>
                <input type="submit" value="提交" >
            </form><br>
        ';
        echo '<br>Question/questionFollowList:
            <form action="'.U("Question/questionFollowList").'" enctype="multipart/form-data" method="post" >
                要查询的人的uid:<input type="text" name="toUid" value=""/>
                <input type="submit" value="提交" >
            </form><br>
        ';
    }
}