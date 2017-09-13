<?php
// 公共的函数库

// 跳转函数
/*
	@param string $msg 


	return .. 
*/
function redirect($msg="提交成功",$url='',$time=3) {
	echo '<div style="width:600px;text-align:center;height:150px;line-height:150px;font-size:24px;margin:60px auto;border:2px solid yellow">' . $msg . '</div>';

	if ($url == '') {
		$url = $_SERVER['HTTP_REFERER'];
	}

	echo '<meta http-equiv="refresh" content="' . $time . ';url=' . $url . '">';
	exit;
}

/*
	专门用于查询的函数
	@param string $sql sql语句
	return array/boolean
*/
function query($link,$sql='') {
	if ($sql == '') {
		redirect('请输入sql语句');
	}
	$result = mysqli_query($link,$sql);
	//var_dump($link);exit;
	if ($result && mysqli_affected_rows($link)) {

		$user_list = [];
		while($row = mysqli_fetch_assoc($result)) {
			$user_list[] = $row;
			
		}
		// 如果是一维数组，则直接返回，不需要再输入 [0]
		if (count($user_list) == 1) {
			return $user_list[0];
		}
		// 将结果遍历的数组返回
		return $user_list; 

	} else {
		// 如果失败返回false
		return false;
	}
}
/*
	专门用户增删改 的函数
*/
function execute($link,$sql='') {
	if ($sql == '') {
		redirect('请输入sql语句');
	}
	$result = mysqli_query($link,$sql);
	//var_dump($link);exit;
	if ($result && mysqli_affected_rows($link)) {

		// 如果你 insert 有自增id的话 返回改自增id
		if(mysqli_insert_id($link)) {
			return mysqli_insert_id($link);
		}
		// 如果是  更新 或者 删除操作则返回影响行数
		return mysqli_affected_rows($link);
		

	} else {
		// 如果失败返回false
		return false;
	}
}
/*
	文件上传
	返回图片名
*/
function upload($name='file',$save_path='./upload/',$allow_type=['image','text']) {
if ($_FILES[$name]['error'] > 0) {
	$error[] = [];
	switch ($_FILES[$name]['error']) {
		case '1':
			$error[1] = '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值';
			break;
		case '2':
			$error[2] = '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值';
			break;
		case '3':
			$error[3] = '文件只有部分被上传';
			break;
		case '4':
			$error[4] = '没有文件上传';
			break;
		case '6':
			$error[6] = '找不到临时文件目录';
			break;
		case '7':
			$error[7] = '文件写入失败';

	}
	return $error;

}
}

// 处理图片名函数
// @param string $result 图片名
// 返回改图片的资源地址

function imgUrl($result) {
	if (empty($result)) {
		redirect('请出入图片名');
	}

	//var_dump(PATH);exit;
	$save_path = PATH;
	$save_path .= './uploads/';
	$save_path .= substr($result,0,4).'/';
	$save_path .= substr($result,4,2).'/';
	$save_path .= substr($result,6,2).'/';
	$save_path .= $result;
	return $save_path;
}