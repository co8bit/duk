<?php
namespace Home\Controller;
use Think\Controller;

require_once(APP_PATH."/Home/Conf/MyConfigINI.php");

class UserController extends Controller
{
    /**
     * 上传文件的配置数组
     * @var array
     */
    protected $UPLOADCONFIG = array(    
        'maxSize'    =>    3145728,
        'rootPath'   =>    _UPLOADPATH,
        'savePath'   =>    '/Uploads/',    
        'saveName'   =>    array('uniqid',''),    
        'exts'       =>    array('jpg', 'png', 'jpeg'),    
        'autoSub'    =>    true,    
        'subName'    =>    array('date','Ymd'),
    );


    protected function _initialize()
    {
        //parent::_initialize();
        header("Content-Type:text/html; charset=utf-8");
        $this->uid      =       session("uid");
        // empty($this->uid) && exit("error");
    }
    

    /**
     * 登录好后设置session
     * @param array $data 要设置session所需要的信息数组
     */
    protected function setSession($data)
    {
        session('userName',$data['name']);
        session("uid",$data["uid"]);
    }

    /**
     * 用户登录函数
     * @param username,password
     * @return true,false
     */
    public function login()
    {
        if (IS_POST)
        {
            $userName           =       I('param.username',"");
            $userPassword       =       I('param.password',"");
            empty($userName) && exit("用户名为空");
            empty($userPassword) && exit("密码为空");
            
            if ( $result = D("User")->login($userName,$userPassword) )
            {
                //设置session
                $this->setSession($result);
                exit("true");
                // $this->success("登录成功",U("User/index"));
            }
            else
            {
                // $this->error("登录失败");
                exit("false");
            }
        }
    }
    


    /**
     * 用户退出函数
     * @return true,false
     */
    public function logout()//安全退出
    {
        //判断session是否存在
        if (!session('?uid'))
        {
            // $this->error("退出失败");
            exit("false");
        }
    
        //删除session
        session('userName',null);
        session('uid',null);
    
        //再次判断session是否存在
        if ( session('?uid') )
            exit("false");
            // $this->error("退出失败");
        else
            // $this->success("退出成功",U("Index/index"));
            exit("true");
    }

    /**
     * 注册函数
     * @param string $userName 用户名
     * @param string $userPassword 密码
     * @return true,false,error
     */
    public function sign()
    {
        
            $dbUser = D("User");
            $data["name"]      =       I('param.username',"");
            $data["realName"]   =      I('param.realName',$data['name']);
            $data["pwd"]       =       I('param.password',"");
            $data["mail"]      =       I('param.mail',"");
            $data["tag"]       =       '["'.I('param.tag',"").'"]';
            empty($data["name"]) && $this->error("用户名为空，请重试");
            empty($data["pwd"]) && $this->error("密码为空，请重试");

            //判断用户名是否重复
            $tmpResult  =   $dbUser->where(array("name"=>$data["name"]))->find();
            if ( !empty($tmpResult) )
                $this->error("用户名重复，请重试");

            $userId = $dbUser->add($data);
            if(empty($userId))//添加失败
            {
                $this->error("注册失败，请重试");
            }
            else
            {
                $data["uid"]    =   $userId;
                $this->setSession($data);
                $this->success("注册成功",'../../Public/html/');
            } 
        
    }

    /**
     * 获得用户uid
     * @return int uid
     */
    public function getUid()
    {
        exit(session("uid"));
    }

    /**
     * 得到用户的信息
     * @param int uid
     * @return json 用户信息，为数据库中的一行
     *         如：{"uid":"1","name":"wbx@wbx.com","pwd":"wbx","realName":"","logoPic":"","phone":"","address":""}
     * @return false "" 失败
     * @return error "" uid非法
     */
    public function getUserInfo()
    {
        $dbUser     =   D("User");

        $uid    =   I("param.uid");
        if (!$dbUser->uidValidateRules($uid))
            exit("error");

        $this->ajaxReturn($dbUser->getUserInfo($uid));
    }


    /**
     * 修改用户信息（没有修改头像）
     * @param json 用户信息，为数据库中的一行；不能修改name
     *         如：{"uid":"1","pwd":"wbx","realName":"","logoPic":"","phone":"","address":""}
     * @return bool "" 是否成功
     * @return error "" uid非法
     */
    public function editUserInfo()
    {
        $dbUser     =   D("User");

        $dbUser->field("uid,pwd,realName,content,logoPic,concernProblem,concernUser,tag")->create(I('param.'));
        if ($dbUser->save())
            exit("true");
        else
            exit("false");
    }


    /**
     * 设置用户信息（必须同时上传头像）
     * @param 表单 用户信息，为数据库中的一行；不能修改name
     *         如：{"uid":"1","pwd":"wbx","realName":"","logoPic":"","phone":"","address":""}
     * @return bool "" 是否成功
     * @return error "" uid非法
     */
    public function setUserInfo()
    {
        $dbUser     =   D("User");

        $dbUser->field("uid,pwd,realName,content,logoPic,concernProblem,concernUser,tag")->create(I('param.'));

        $upload = new \Think\Upload($this->UPLOADCONFIG);// 实例化上传类
        $info   =   $upload->upload();
        if(!$info)
        {// 上传错误提示错误信息
            exit($upload->getError());
        }
        else
        {// 上传成功获取上传文件信息    
            $dbUser->logoPic = $info["logoPic"]['savepath'].$info["logoPic"]['savename'];
        }

        if ($dbUser->save())
            exit("true");
        else
            exit("false");
    }


    /**
     * 设置用户头像（必须上传头像）
     * @param int uid
     * @param file 头像文件
     * @return bool "" 是否成功
     * @return error "" uid非法
     */
    public function setUserInfoLogo()
    {
        $dbUser     =   D("User");

        $dbUser->field("uid")->create(I('param.'));

        $upload = new \Think\Upload($this->UPLOADCONFIG);// 实例化上传类
        $info   =   $upload->upload();
        if(!$info)
        {// 上传错误提示错误信息
            exit($upload->getError());
        }
        else
        {// 上传成功获取上传文件信息    
            $dbUser->logoPic = $info["logoPic"]['savepath'].$info["logoPic"]['savename'];
        }

        if ($dbUser->save())
            exit("true");
        else
            exit("false");
    }


    /**
     * 关注toUid用户
     * @param int toUid 要关注的用户的uid
     * @return "error_over" 关注关系已存在
     * @return "error_sql" sql语句执行错误
     * @return "true"  成功
     */
    public function follow()
    {
        $dbFollow   =   D("Follow");

        $toUid  =   I('param.toUid');

        $re     =   $dbFollow->where(array("from_uid"=>$this->uid,"to_uid"=>$toUid))->select();
        if ($re !== null)
            exit("error_over");
        if ($re === false)
            exit("error_sql");

        $data   =   null;
        $data   =   array("from_uid"=>$this->uid,"to_uid"=>$toUid,"createTime"=>date("Y-m-d H:i:s"));
        $re     =   null;
        $re     =   $dbFollow->add($data);
        if( ($re == null) || ($re == false) )
            exit("error_sql");
        else
            exit("true");
    }


    /**
     * 取消关注toUid用户
     * @param int toUid 要取消关注的用户的uid
     * @return "error_no" 关注关系不存在
     * @return "error_sql" sql语句执行错误
     * @return "true"  成功
     */
    public function unfollow()
    {
        $dbFollow   =   D("Follow");

        $toUid  =   I('param.toUid');

        $re     =   $dbFollow->where(array("from_uid"=>$this->uid,"to_uid"=>$toUid))->select();
        if ($re === null)
            exit("error_no");
        if ($re === false)
            exit("error_sql");

        $data   =   null;
        $data   =   array("from_uid"=>$this->uid,"to_uid"=>$toUid);
        $re     =   null;
        $re     =   $dbFollow->where($data)->delete();
        if( ($re == null) || ($re == false) )
            exit("error_sql");
        else
            exit("true");
    }

    /**
     * 是否关注了toUid用户
     * @param int toUid 要查询的用户uid
     * @return "true,false" 是，否
     * @return "error_sql" sql语句执行错误
     */
    public function isFollow()
    {
        $dbFollow   =   D("Follow");

        $toUid  =   I('param.toUid');

        $re     =   $dbFollow->where(array("from_uid"=>$this->uid,"to_uid"=>$toUid))->select();
        if ($re === null)
            exit("false");
        if ($re === false)
                exit("error_sql");
        exit("true");
    }

    /**
     * 查询toUid的用户的关注用户列表。
     * @param int toUid 要查询的用户的uid
     * @return json 关注的uid的列表，如["2","3","4","5"]，代表关注了uid为2、3、4、5的用户。
     * @return "null" 该用户没有关注任何人
     * @return "error_sql" 查询出错
     */
    public function userFollowList()
    {
        $dbFollow   =   D("Follow");

        $toUid  =   I('param.toUid');

        $data     =   $dbFollow->where(array("from_uid"=>$toUid))->select();
        if ($data === false)
            exit("error_sql");

        $re     =   null;
        $i   =   0;
        foreach ($data as $key1=>$value1)
        {
            foreach ($data[$key1] as $key2=>$value2)
            {
                if ( ($key2 == "to_uid") )
                {
                    $re[$i++] = $value2;
                }
            }
        }

        $this->ajaxReturn($re);
    }

}