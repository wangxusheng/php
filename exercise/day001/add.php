<?php
include('init.php');

	$title = isset($_POST['title']) ? $_POST['title'] : '';

	$content = isset($_POST['content']) ? $_POST['content'] : '';
	// echo $content;die;
	$author = isset($_POST['author']) ? $_POST['author'] : '';
	$news_cate = isset($_POST['news_cate']) ? $_POST['news_cate'] : '';
	// echo $news_cate;die;
	$add_time = time();

	$sql = "insert into news values(null,'$title','$content','$author','$add_time','$news_cate')";
	$add_sql = execute($link,$sql);

	$news_res = "select n.*,c.cate_name from news n,news_cate c where n.id='{$add_sql}' ";
		  

	// var_dump($news_res);exit;
	$news_add_res = query($link,$news_res);
	// var_dump($news_add_res);exit;
	if($news_add_res){
		echo json_encode($news_add_res);

	}
