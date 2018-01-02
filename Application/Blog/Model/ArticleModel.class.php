<?php
/**
 * Created by PhpStorm.
 * User: guoyexuan
 * Date: 2018/1/2
 * Time: 下午10:04
 */
namespace Blog\Model;

use Think\Model;

class ArticleModel extends Model
{
    protected $tableName = 'article';

    /**
     * @return false|mixed|\PDOStatement|string|\think\Collection
     * 获取首页文章List
     * 待优化
     */
    public function getArticleToHomePage()
    {
        $data = $this->limit(1,6)->where('1=1')->order('create_at desc')->select();
        return $data;
    }

    /**
     * @param $id
     * @return array|false|mixed|\PDOStatement|string|Model
     * 获取文章详情
     */
    public function getArticleDetailById($id)
    {
        $map['id'] = $id;
        $data = $this->where($map)->find();
        return $data;
    }
}