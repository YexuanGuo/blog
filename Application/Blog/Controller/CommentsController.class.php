<?php
/**
 * Created by PhpStorm.
 * User: guoyexuan
 * Date: 2018/1/22
 * Time: 下午3:07
 */

namespace Blog\Controller;
use Blog\Library\BaseController;
class CommentsController extends BaseController
{
    public function article()
    {
        if(IS_POST)
        {
            switch ($this->_formatCurd())
            {
                case 'comment':
                    $field = I('post.');
                    $res = D('Comments')->comment_to_article($field);
                    if($res)
                    {
                        $this->ajaxReturn(array('code'=>200,'msg'=>'success'),'JSON');
                    }
                    else
                    {
                        $this->ajaxReturn(array('code'=>500,'msg'=>'fail'),'JSON');
                    }
                    break;
                case 'reply':
                    print_R($_REQUEST);
                    break;
            }
        }
    }
}