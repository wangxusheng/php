<?php
include('init.php');
$sql = "select n.*,c.cate_name from news as n join news_cate as c where n.cate_id=c.cate_id";

$res = query($link,$sql);

$sql = "select * from news_cate";
$new_cate = query($link,$sql);


	$id = isset($_POST['id']) ? $_POST['id'] : ' ';
	// print_r($id);die();
	$sql = "delete from news where id=$id ";
	$del_sql = execute($link,$sql);
	// print_r($del_sql);die;
	if($del_sql){
		
		echo 'ok';
		return;
	}



	
include('demo.html');

?>