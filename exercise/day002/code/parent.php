<?php
   /*
   class Father{
      public function __construct(){
	     echo 'this is father';
	  }

   }
  class Son extends Father{
      public function __construct(){
		 //parent 关键字
         parent::__construct();  //调用父类的构造方法
	     echo 'this is son';
	  }
  }
  */
  //$son=new Son;

    //定义一个商品类
   
	 //引入DB类
    
	 include 'DB.class.php';
   
    //模块化编程，一张表代表一个模块，也可以称之为一个类

	class Goods extends DB{   
		 private $table;
	    public function __construct($arr){
			parent::__construct($arr);  //使用父类的构造方法来完成数据库的初始化及连接操作
		    $this->table='goods';
		}
	  
	    //增加数据的方法
		public function insert($goods_name){
		   $sql="insert into {$this->table} values(null,'$goods_name')";
		   $this->db_insert($sql);
		}
	
	}

     //先实例化商品类对象

	 $goods=new Goods(['database'=>'book']);
	 $goods_name='苹果';
	 $goods->insert($goods_name);


