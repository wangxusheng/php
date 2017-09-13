<?php
    header('content-type:text/html;charset=utf-8');
    //封装数据库操作类
	 class  DB{
	      //定义常用的属性  
		  private $host;
		  private $port;
		  private $user;
		  private $password;
		  private $charset;
		  private $database;
	     
		 //定义一个构造方法进行初始化设置
		 /*
           @parameter1  $arr=array()  数组里面保存数据库里面相应属性的内容  $arr=['host'=>'localhost','port'=>3306,'user'=>'root','password'=>'root','charset'=>'utf8','database'=>'cms']
		 */

		  public function __construct($arr=array()){
		       $this->host=isset($arr['host'])?  $arr['host'] : 'localhost';
		       $this->port=isset($arr['port'])?  $arr['port'] : '3306';
		       $this->user=isset($arr['user'])?  $arr['user'] : 'root';
		       $this->password=isset($arr['password'])?  $arr['password'] : 'root';
		       $this->charset=isset($arr['charset'])?  $arr['charset'] : 'utf8';
		       $this->database=isset($arr['database'])?  $arr['database'] : 'cms';
               //调用连接数据库的方法
			   $this->db_connect();
			   //调用设置字符集的方法
			   $this->db_charset();
			   //调用选择数据库的方法
			   $this->db_database();


		  }

        //连接数据库的方法  原则:在内部能用私有或者受保护的尽量 尽量不让此方法暴露在类的外部，保证类的完整性及安全
		 
		private function db_connect(){
		      @$link=mysql_connect($this->host.":".$this->port,$this->user,$this->password);
              if(!$link){
			     echo '数据库连接失败<br>';
			     echo '错误编号是'.mysql_errno().'<br>';
                 echo  '错误信息是'.iconv('gbk','utf-8',mysql_error());
				 exit;
			  }
		 }
      
	    //设置字符编码

		 private function db_charset(){

			 $this->db_query("set names {$this->charset}");
			/*
		    $res=mysql_query("set names {$this->charset}");
			if(!$res){
			     echo 'sql语句执行失败<br>';
			     echo '错误编号是'.mysql_errno().'<br>';
                 echo  '错误信息是'.iconv('gbk','utf-8',mysql_error());
				 exit;
			  }
			*/
		 
		 }

		 //选择数据库

		private function db_database(){
			$this->db_query("use {$this->database}");
			/*
		     $res=mysql_query("use {$this->database}");
		     if(!$res){
			     echo 'sql语句执行失败<br>';
			     echo '错误编号是'.mysql_errno().'<br>';
                 echo  '错误信息是'.iconv('gbk','utf-8',mysql_error());
				 exit;
			  }
			 */
		 }
         
         /*
            //执行sql语句的方法  每条SQL语句在执行过程中都可能因为sql语句有误而导致执行失败
			@param1  $sql  要执行的sql语句
			@return  $res   写操作返回bool类型 ，读操作返回结果集资源或者bool类型的false
		 */

		  private function db_query($sql){
		      $res=mysql_query($sql);
		      if(!$res){
			     echo 'sql语句执行失败<br>';
			     echo '错误编号是'.mysql_errno().'<br>';
                 echo  '错误信息是'.iconv('gbk','utf-8',mysql_error());
				 exit;
			  }
		     return $res;
		  }

		  /* 
		    插入数据操作方法
            @param1 $sql  要执行的sql语句
			@return  $id  返回执行自增ID
		  */

		  protected function db_insert($sql){
			 /*
		     $res=mysql_query($sql);   //mysql_query()执行正确的sql语句
			 if(!$res){
			     echo 'sql语句执行失败<br>';
			     echo '错误编号是'.mysql_errno().'<br>';
                 echo  '错误信息是'.iconv('gbk','utf-8',mysql_error());
				 exit;
			  }
			 */
			 if($this->db_query($sql)){
			    //获取自增ID
				 $id=mysql_insert_id();
				 return $id;
			 }  
		  }
        
	    /*
			* 删除操作
			* @param1  $sql  要删除的sql语句
            * @return  $rows  受影响的行数
		*/
        protected function db_delete($sql){
		   $res=$this->db_query($sql);
		   if($res){
		      //获取受影响的行数
		      $rows=mysql_affected_rows();
			  return $rows;
		   }
		
		}

        /*
			* 修改操作
			* @param1  $sql  要删除的sql语句
            * @return  $rows  受影响的行数
		*/
       protected function db_update($sql){
		   $res=$this->db_query($sql);
		   if($res){
		      //获取受影响的行数
		      $rows=mysql_affected_rows();
			  return $rows;
		   }
		
		}

        /*
           *  查询一条结果
           * @parameter1  $sql  查询的语句
		   * @return  $result   返回的一维关联数组
		*/

		 protected function db_selectOne($sql){
		   $res=$this->db_query($sql);
		   if($res){
		      $result=mysql_fetch_assoc($res);
		      return $result;
		   }
		}

		/*
           *  查询多条结果
           * @parameter1  $sql  查询的语句
		   * @return  $arr   返回的二维关联数组
		*/

		 protected function db_selectAll($sql){
		 	$arr=[];
		   $res=$this->db_query($sql);
		   if($res){
		      while($row=mysql_fetch_assoc($res)){
			     $arr[]=$row;
			  }
             return $arr;
		   }
		} 
      //这是类的结束
	 }
   
	 //$db=new DB();
	 //var_dump($db);
	 //$db->db_connect();
	 //$db->db_charset();
	 //$db->db_database();