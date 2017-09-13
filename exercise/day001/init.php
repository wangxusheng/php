<?php
// 项目初始化操作
header('Content-type:text/html;charset=utf-8');
// 开启session
session_start();

// 设置默认时区
date_default_timezone_set('PRC');

include 'config.php';

// 指定一个前台路径，规范路径写法，这里如果 不明白为什么写，后面你就知道了
// 由于 \ 只能用在window上，win上 \ /不区分
// 而Linux只能用 /
// dirname 获取路径的目录部分
define('PATH',str_replace('\\','/',dirname(__FILE__)).'/');
// 定义一个url地址，方便后面通过http去访问 
// http://localhost/project/admin/
// http  $_SERVER['REQUEST_SCHEME']
// loaclhost $_SERVER['HTTP_HOST']
//var_dump($_SERVER);exit;
define('URL',$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/cms/');
//var_dump(URL);EXIT;
//var_dump(PATH);exit;
// 天龙八步 第一二步
$link = mysqli_connect(HOST,USER,PWD) or die('连接数据库失败');

// 三
mysqli_select_db($link,DB);

// 四
mysqli_set_charset($link,CHAR);

//include PATH.'init.php';
// C:/wamp/www/project/function.php
include PATH.'function.php';
//var_dump(imgUrl('test'));exit;





