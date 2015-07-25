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
        else
            $this->display();
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
        if (IS_POST)
        {
            $dbUser = D("User");
            $data["name"]      =       I('param.username',"");
            $data["pwd"]       =       I('param.password',"");
            empty($data["name"]) && exit("error");
            empty($data["pwd"]) && exit("error");

            //判断用户名是否重复
            $tmpResult  =   $dbUser->where(array("name"=>$data["name"]))->find();
            if ( !empty($tmpResult) )
                exit("error");

            $userId = $dbUser->add($data);
            if(empty($userId))//添加失败
            {
                exit("error");
            }
            else
            {
                $data["uid"]    =   $userId;
                $this->setSession($data);
                exit("true");
            }  
        }
        else
            $this->display();
        
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

}