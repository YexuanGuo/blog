<?php
return array(
    //'配置项'=>'配置值'
    'DB_TYPE' =>  'mysql',
    'DB_HOST' =>'127.0.0.1',
    'DB_USER' =>'root',
    'DB_PWD' =>'',
    'DB_NAME' =>'moe_data_center',
    'DB_PORT' =>'3306',
    'DB_PREFIX'=>'t_moe_',
    'USER_AUTH_KEY'=>'userInfo',
    'URL_MODEL'=>1,
    'URL_ROUTER_ON'=>true,
    'URL_CASE_INSENSITIVE' => true,
//    'TMPL_CACHE_ON'   => false, //关闭静态页面缓存
//    'HTML_CACHE_ON'   => false,
//    'APP_DEBUG'=>false,
//    'DB_FIELD_CACHE'=>false,
//    'HTML_CACHE_ON'=>false,
    'URL_ROUTE_RULES'=>array(
        'article/:id'               => 'Index/article',
    ),
);