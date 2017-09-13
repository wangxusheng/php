<?php
//得到一个类的对象方式
include 'DB.class.php';
//直接获取对象的方式
$db = new DB();
//赋值的方式 是同一个对象
$db1 = &$db;
//克隆的方式 是新一个对象
$db2=clone $db;

//对象的 比较，类成员一致且编号也必须一致
var_dump($db==$db1);//true
var_dump($db===$db1);//true
var_dump($db===$db2);//false
var_dump($db==$db2);//true
?>