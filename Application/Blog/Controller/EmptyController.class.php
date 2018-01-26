<?php
/**
 * Created by PhpStorm.
 * User: guoyexuan
 * Date: 2018/1/26
 * Time: 下午6:38
 */

namespace Blog\Controller;
use Blog\Library\BaseController;
class EmptyController extends BaseController
{
    /**
     * 空控制器
     * __call
     */
    public function index()
    {
        $this->display('404/index');
    }
}