<?php
/**
 * Created by PhpStorm.
 * User: guoyexuan
 * Date: 2018/1/4
 * Time: 下午10:26
 */

namespace Blog\Library;
use Think\Controller;

class BaseController extends Controller
{

    protected $userInfo = array();
    protected $userModel;

    protected  function _initialize()
    {
        $this->assign(array(
            'category'   =>D('Article')->getArticleCategoryToHomePage(),    //首页分类
            'hotArticle' =>D('Article')->getHotArticleToHomePage(),
        ));
    }

    public function _empty()
    {
        exit('404 not found!');
    }

    /**
     * @return mixed
     */
    public function getControllerName()
    {
        $pinfo = explode('/',$_SERVER['PATH_INFO']);
        return $pinfo[0];
    }


    /**
     * @return mixed
     * getCurd
     */
    public function _formatCurd()
    {
        $server = $_SERVER;
        $server_url = strstr($server['REQUEST_URI'],'?',true);
        if($server_url)
        {
            $curd = explode('/',$server_url)[3];   //default 4
        }
        else
        {
            $curd = explode('/',$server['REQUEST_URI'])[3];
        }
        return $curd;
    }


    /**
     * @return string
     * 获取除去域名的Action URI
     */
    public function getUrlAction()
    {
        return CONTROLLER_NAME.'/'.ACTION_NAME.'/'.$this->_formatCurd();
    }

    /**
     * @return mixed
     * 获取请求Method
     */
    public function getRequestMethod()
    {
        return I('server.REQUEST_METHOD');
    }


    /**
     * @param $obj
     * @return array|void
     * 对象转数组
     */
    public function object_to_array($obj)
    {
        $obj = (array)$obj;
        foreach ($obj as $k => $v)
        {
            if(gettype($v) == 'resource')
            {
                return;
            }
            if (gettype($v) == 'object' || gettype($v) == 'array')
            {
                $obj[$k] = (array)self::object_to_array($v);
            }
        }
        return $obj;
    }

}