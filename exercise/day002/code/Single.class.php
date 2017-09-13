<?php
     include 'DB.class.php';
   //设计模式中的单例模式  在类的得到该类的唯一对象
     
     //定义类

	  class Single{
            //定义静态属性来保存生成的对象
			private static $obj;
	        //私有化构造方法
			private  function __construct(){
			}

		    //私有化克隆方法 
			private function __clone(){
			
			}

           //在类的内部产生对象的方法  又由于现在没有对象，只能使用类在外部来调用，必须是公有且静态
		    public  static function getSingle(){
			       //直接产生对象  new
                    
   //静态属性只会初始化一次，如果说第一次实例化后的对象保存在静态属性中，那下次再调用该方法时，
				//静态属性中已经存在了该对象，不再new新的对象，直接返回静态属性中保存的对象
                  
                   if(!(self::$obj instanceof self)){  //instanceof 判断当前的对象是否是属于当前类 
				      self::$obj=new self();
					  //self::$obj=new DB();
					  //self::$obj=new self();
				   } 
                    return self::$obj;
                  
				   /*
				   if(!is_object(self::$obj)){
				      self::$obj=new self();
				      //self::$obj=new DB();  //有可能产生的对象不是当前类的对象
				   }
				  
                   return self::$obj;
                    */ 

  
				  /*
				  if(is_object(self::$obj)){
				     return self::$obj;
				  }else{
				     self::$obj=new self();
					 return  self::$obj;
				  }
				  */
			}
	  }

	//$s=new Single();
	//$s1=new Single();
	//var_dump($s,$s1);   //new 出来的对象都是新的对象

	 //通过类名来获取对象

	  //$obj=Single::getSingle();
	  //$obj1=Single::getSingle();
	  //$obj2=Single::getSingle();
	  //$obj1=clone $obj;   //克隆出来的是一个新的对象

	  //var_dump($obj,$obj1,$obj2);