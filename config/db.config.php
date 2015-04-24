<?php

/**
 * mysql
 */
$mysql_link = array(
    'host' => '127.0.0.1',
    'port' => '3306',
    'user' => 'root',
    'pass' => '123456',
    'charset' => 'utf8',
);

/**
 * redis
 */
$redis_link = array(
    'host' => '127.0.0.1',
    'port' => 6379,
    'auth' => '',
    'timeout' => 2.5
);

$sql_lite = array(

);

#默认数据库配置
$db = $mysql_link;
$db['name'] = 'test';

$sql_lite_test = $sql_lite;
$sql_lite_test['dsn'] = 'sqlite:../../db/sql.db';

return array(
    'mysql' => array(
        'db' => $db,
    ),

    'default'   =>  array('mysql' => 'db')
);


