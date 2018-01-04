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
        //待优化,先写上
        $data = $this->join('t_moe_category ON t_moe_article.category_id = t_moe_category.id')->join('t_moe_operation_account ON t_moe_article.create_by = t_moe_operation_account.Fid')
            ->field('t_moe_article.id as article_id,t_moe_article.title,t_moe_article.sort as article_sort,t_moe_article.create_at,
            t_moe_article.content,t_moe_category.name as article_category_name,t_moe_operation_account.Fnickname as create_by')
            ->limit(1,6)->where('1=1')->order('create_at desc')->select();
        //test
        //foreach ($data as $k=>$v)
        //{
        //    unset($data[$k]['content']);
        //}

        //print_R($data);
        return $data;
    }

    /**
     * @param $id
     * @return array|false|mixed|\PDOStatement|string|Model
     * 获取文章详情
     */
    public function getArticleDetailById($id)
    {
        $map['t_moe_article.id'] = $id;

        $data = $this->join('t_moe_category ON t_moe_article.category_id = t_moe_category.id')->join('t_moe_operation_account ON t_moe_article.create_by = t_moe_operation_account.Fid')
            ->field('t_moe_article.id as article_id,t_moe_article.title,t_moe_article.sort as article_sort,t_moe_article.create_at,
            t_moe_article.content,t_moe_category.name as article_category_name,t_moe_operation_account.Fnickname as create_by')
            ->limit(1,6)->where($map)->order('create_at desc')->find();
        return $data;
    }
}