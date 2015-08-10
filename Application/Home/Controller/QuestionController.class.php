<?php
namespace Home\Controller;
use Think\Controller;

require_once(APP_PATH."/Home/Conf/MyConfigINI.php");

class QuestionController extends Controller
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



	protected $uid = null;



	protected function _initialize()
    {
        header("Content-Type:text/html; charset=utf-8");
        $this->uid		=		session("uid");
        empty($this->uid) && exit("error");
    }

    

    /**
     * 整理二维数组中的json格式，以使得ajaxReturn可以进行正常的含json嵌套的输出
     * @param  array[][] $data 要被整理的数据
     * @return array[][] 整理完成的数据
     */
    protected function trimForAjax($data = null)
    {
        foreach ($data as $key1=>$value1)
        {
            foreach ($data[$key1] as $key2=>$value2)
            {
                if ( ($key2 == "tag") || ($key2 == "check") || ($key2 == "participant") || ($key2 == "comment") )
                {
                    $data[$key1][$key2]     =   json_decode($value2,true);
                }
            }
        }

        return $data;
    }

    /**
    * 查询某个活动
    * @param int qid
    * @return error 错误
    * @return ReturnJson 返回数据
    */
    public function queryOne()
    {
        $dbQuestion = D("Question");

        $dbQuestion->field("qid")->create(I('param.'));

        $result    =   $dbQuestion->where(array("qid"=>$dbQuestion->qid))->find();
        $result["tag"] = json_decode($result["tag"],true);
        $this->ajaxReturn($result);
    }


    /**
     * 查询所有未完成的活动;
     * @param int page 当前的页数
     * @return error "" page过大或没有此类活动
     * @return json 活动内容，形如：
     *         {
     *             "pageTotalNum":2,//总页数
     *             "content":[ //具体的内容
     *                 {},//一个活动
     *                 {}
     *             ]
     *         }
     */
    public function queryAll()
    {
        $dbQuestion     =   D("Question");

        $page   =   I("param.page",1);
        
        $condition  =   "state=0";

        $scheduleCount = $dbQuestion->where($condition)->count();
        $scheduleTotalPageNum   =   ceil($scheduleCount / _Question_PAGE_NUM);

        if ($page > $scheduleTotalPageNum)
            exit("error");

        $result     =   $dbQuestion->where($condition)->order("createTime")->limit(($page-1) * _Question_PAGE_NUM,_Question_PAGE_NUM)->select();

        $tmp    =   null;
        $tmp["pageTotalNum"] = $scheduleTotalPageNum;
        $tmp["content"]    =   $this->trimForAjax($result);
        $this->ajaxReturn($tmp);
    }


    /**
     * 查询私戳用户列表
     * @param int page 当前的页数
     * @param int userPageNum 每页用户数量,默认为6
     * @return error "" page过大或没有此类用户
     * @return json 用户信息，形如：
     *         {
     *             "pageTotalNum":2,//总页数
     *             "content":[ //具体的内容
     *                 {},//一个用户
     *                 {}
     *             ]
     *         }
     */
    public function queryUser()
    {
        $queryUser     =   D("User");

        $page   =   I("param.page",1);
        $userPageNum  =   I("param.userPageNum",_User_PAGE_NUM);;
        
        $condition  =   "state=0";

        $UserCount = $queryUser->where($condition)->count();
        $UserTotalPageNum   =   ceil($UserCount / $userPageNum);

        if ($page > $UserTotalPageNum)
            exit("error");

        $result     =   $queryUser->where($condition)->order("uid")->limit(($page-1) * $userPageNum,$userPageNum)->select();

        $tmp    =   null;
        $tmp["pageTotalNum"] = $UserTotalPageNum;
        $tmp["content"]    =   $this->trimForAjax($result);
        $this->ajaxReturn($tmp);
    }



    /**
     * 创建一个活动
     * @param 多个参数，名称参考returnJson,但是形式是post
     * @return true "" 成功
     *         其他任何东西 "" 失败
     *         error "" 非法操作
     */
    public function create()
    {
        $dbQuestion     =   D("Question");
        $data   =   null;

        $dbQuestion->field("title,createTime,content")->create(I('param.'));
        $dbQuestion->uid =  $this->uid;
        $dbQuestion->tag = I('param.tag',"null",false);
        $dbQuestion->state = 0;

        //TODO:自动补全和验证
        // if (!$dbQuestion->tagValidateRules($dbQuestion->tag))
        //     exit("error");


        $tmp    =   $dbQuestion->add();
        if(empty($tmp))//添加失败
        {
            echo "false";
        }
        else
        {
            echo "true";
        }
    }



    /**
     * 修改一个活动
     * @param 多个参数，名称参考returnJson,但是形式是post; 
     * @param int mode 模式，为1修改活动（不改logo），为2是修改活动（改logo）
     * @return true "" 成功
     *         其他任何东西 "" 失败
     *         error "" 非法操作
     */
    public function edit()
    {
        $dbQuestion     =   D("Question");
        $data   =   null;

        $dbQuestion->field("qid,title,createTime,content")->create(I('param.'));
        $dbQuestion->uid =  $this->uid;
        $dbQuestion->tag = I('param.tag',"null",false);
        
        $mode   =   I("param.mode",0);
        if ((int)$mode == 2)
        {
            $upload = new \Think\Upload($this->UPLOADCONFIG);// 实例化上传类
            $info   =   $upload->upload();
            if(!$info)
            {// 上传错误提示错误信息
                exit($upload->getError());
            }
            else
            {// 上传成功获取上传文件信息    
                // dump($info);
                $dbQuestion->logoPic = $info["logoPic"]['savepath'].$info["logoPic"]['savename'];
            }
        }

        // if (!$dbQuestion->tagValidateRules($dbQuestion->tag))
        //     exit("error");

        $tmp    =   null;
        $tmp = $dbQuestion->save();
        if( ($tmp === null) || ($tmp === false) )
        {
            echo "false";
        }
        else
        {
            echo "true";
        }
    }


    /**
     * 删除一个活动
     * @param int qid
     * @return bool "" 是否成功
     */
    public function delete()
    {
        $dbQuestion     =   D("Question");

        $dbQuestion->field("qid")->create(I('param.'));
        if ($dbQuestion->where(array("uid"=>$this->uid,"qid"=>$dbQuestion->qid))->delete())
            exit("true");
        else
            exit("false");
    }





    /**
     * 给当前用户的当前活动添加一个标签（作为组织者进行）
     * @param int qid
     * @param string tag 新增的标签
     * @return bool "" 是否成功
     */
    public function addTag()
    {
        $dbQuestion     =   D("Question");

        $dbQuestion->field("qid")->create(I('param.'));
        $data["tag"]      =   I("param.tag",null);

        // if (!$dbQuestion->tagValidateRules($data))//TODO:去除重复tag的检查
        //     exit("error");

        
        $tmp    =   M("Question")->where(array("uid"=>$this->uid,"qid"=>$dbQuestion->qid))->find();
        $tmp["tag"]   =   json_decode($tmp["tag"],true);
        if ($tmp["tag"] === null)
            $tmp["tag"] = array($data["tag"]);
        else
            array_push($tmp["tag"],$data["tag"]);
        $tmp2   =   null;
        $tmp2   =   json_encode($tmp["tag"]);

        $tmp3   =   $dbQuestion->save(array("uid"=>$this->uid,"qid"=>$dbQuestion->qid,"tag"=>$tmp2));
        if ( ($tmp3 === null) || ($tmp3 === false) )
            exit("false");
        else
            exit("true");
    }


    /**
     * 当前用户的当前活动修改标签（作为组织者进行）
     * @param int qid
     * @param ReturnJson_tag tag 全部的标签列表
     * @return bool "" 是否成功
     * @return error "" 出错
     */
    public function editTag()
    {
        $dbQuestion     =   D("Question");

        $dbQuestion->field("qid")->create(I('param.'));
        $dbQuestion->tag = I('param.tag',"null",false);
        if (!$dbQuestion->tagValidateRules($dbQuestion->tag))
            exit("error");

        $tmp    =   $dbQuestion->save(array("uid"=>$this->uid,"qid"=>$dbQuestion->qid,"tag"=>$dbQuestion->tag));
        if ( ($tmp === null) || ($tmp === false) )
            exit("false");
        else
            exit("true");
    }



    /**
     * 给当前用户的当前活动添加一个评论
     * @param int qid
     * @param int uid 谁发表的评论
     * @param string content 内容
     * @return bool "" 是否成功
     */
    public function addComment()
    {
        $dbQuestion     =   D("Question");

        $dbQuestion->field("qid,content,uid")->create(I('param.'));
        $data["date"]      =   date("Y-m-d H:i:s");

        $tmp    =   M("Question")->where(array("qid"=>$dbQuestion->qid))->find();
        $tmp["comment"]   =   json_decode($tmp["comment"],true);
        if ($tmp["comment"] === null)
            $tmp["comment"] = array(array("content"=>$dbQuestion->content,"date"=>$data["date"],"uid"=>$dbQuestion->uid));
        else
            array_push($tmp["comment"],array("content"=>$dbQuestion->content,"date"=>$data["date"],"uid"=>$dbQuestion->uid));
        $tmp2   =   null;
        $tmp2   =   json_encode($tmp["comment"]);

        $tmp3   =   $dbQuestion->save(array("qid"=>$dbQuestion->qid,"comment"=>$tmp2));
        if ( ($tmp3 === null) || ($tmp3 === false) )
            exit("false");
        else
            exit("true");
    }


    /**
     * 修改全部评论，注意是全部，因为区分不出来修改第几个评论
     * @param int qid
     * @param ReturJson_comment comment 全部评论的json
     * @return bool "" 是否成功
     * @return error "" 错误
     */
    public function editComment()
    {
        $dbQuestion     =   D("Question");

        $dbQuestion->field("qid")->create(I('param.'));
        $comment = I('param.comment',"null",false);
        // if (!$dbQuestion->commentValidateRules($check))
        //     exit("error");

        $tmp    =   $dbQuestion->save(array("qid"=>$dbQuestion->qid,"comment"=>$comment));
        if ( ($tmp === null) || ($tmp === false) )
            exit("false");
        else
            exit("true");
    }





    /**
     * 赞一下
     * 做了两件事：
     *     1.给question表的qid行的zan+1
     *     2.给user表的uid行的zanTable添加一个qid
     * @param int qid
     * @return bool "" 是否成功
     */
    public function zan()
    {
        $dbQuestion     =   D("Question");
        $dbUser     =   D("User");
        $dbQuestion->field("qid")->create(I("param."));

        //TODO:检查一个用户一次
        //TODO:一致性
        if (!$dbQuestion->where(array("qid"=>$dbQuestion->qid))->setInc("zan"))
            exit("false");

        $tmp    =   $dbUser->where(array("uid"=>$this->uid))->find();
        $tmp["zanTable"]   =   json_decode($tmp["zanTable"]);
        if ($tmp["zanTable"] === null)
            $tmp["zanTable"] = array((int)$dbQuestion->qid);
        else
            array_push($tmp["zanTable"],(int)$dbQuestion->qid);
        $tmp2   =   null;
        $tmp2   =   json_encode($tmp["zanTable"]);

        $tmp3   =   $dbUser->save(array("uid"=>$this->uid,"zanTable"=>$tmp2));
        if ( ($tmp3 === null) || ($tmp3 === false) )
            exit("false");
        else
            exit("true");
    }


    /**
     * 回复帖子id为qid的帖子
     * @param int qid
     * @param string content 回复的内容
     * @return "true,false"
     */
    public function reply()
    {
        $dbQreply     =   D("Qreply");
        $data   =   null;

        $dbQreply->field("content,qid")->create(I('param.'));
        $dbQreply->createTime = date("Y-m-d H:i:s");
        $dbQreply->uid =  $this->uid;
        $dbQreply->zan =  0;

        $tmp    =   $dbQreply->add();
        if(empty($tmp))//添加失败
        {
            echo "false";
        }
        else
        {
            echo "true";
        }
    }

    /**
     * 返回一个帖子的所有回复
     * @param int qid 要查询的帖子的qid 
     * @return json 格式如下：
     * [{"qrid":"1","uid":"1","qid":"1","createTime":"2015-08-10 17:26:24","content":"asdasdas","zan":"0"},{"qrid":"2","uid":"1","qid":"1","createTime":"2015-08-10 17:27:57","content":"dasd435345","zan":"0"}]
     */
    public function queryReply()
    {
        $dbQreply     =   D("Qreply");
        $data   =   null;

        $qid    =   I('param.qid',null);

        $data     =   $dbQreply->where(array("qid"=>$qid))->order("qrid")->select();

        
        $this->ajaxReturn($data);

    }


    /**
     * 收藏帖子id为qid的帖子
     * @param int qid
     * @return "true,false"
     * @return "error_over" 关注关系已存在
     * @return "error_sql" sql语句执行错误
     */
    public function collectq()
    {
        $dbCollectq     =   D("Collectq");
        $data   =   null;

        $dbCollectq->field("qid")->create(I('param.'));
        $dbCollectq->createTime = date("Y-m-d H:i:s");
        $dbCollectq->uid =  $this->uid;

        $re     =   $dbCollectq->where(array("uid"=>$this->uid,"qid"=>$dbCollectq->qid))->select();
        if ($re !== null)
            exit("error_over");
        if ($re === false)
            exit("error_sql");


        $tmp    =   $dbCollectq->add();
        if(empty($tmp))//添加失败
        {
            echo "false";
        }
        else
        {
            echo "true";
        }
    }


    /**
     * 查询toUid的用户的关注问题列表。
     * @param int toUid 要查询的用户的uid
     * @return json 关注的qid的列表，如["2","3"]，代表关注了qid为2、3的帖子。
     * @return "null" 该用户没有关注任何帖子
     * @return "error_sql" 查询出错
     */
    public function questionFollowList()
    {
        $dbCollectq   =   D("Collectq");

        $toUid  =   I('param.toUid');

        $data     =   $dbCollectq->where(array("uid"=>$toUid))->select();
        if ($data === false)
            exit("error_sql");

        $re     =   null;
        $i   =   0;
        foreach ($data as $key1=>$value1)
        {
            foreach ($data[$key1] as $key2=>$value2)
            {
                if ( ($key2 == "qid") )
                {
                    $re[$i++] = $value2;
                }
            }
        }

        $this->ajaxReturn($re);
    }

}