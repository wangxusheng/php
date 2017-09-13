<?php
class DB{
	//声明一个私有的，静态的成员属性$obj;
	private static $obj = null;
	//私有构造方法，只能在类的 内部实例化对象
	private function __construct(){
		echo "链接数据库成功<br>";
	}
	//通过此静态方法才能获取本类的对象
	public static function getInstance(){
		//如果本类中的$obj为空，说明还没有被实例化过
		if(is_null(self::$obj)){
			// 实例化本类对象
			self::$obj = new self();
			// 返回本类的对象
			return self::$obj;
		}
	}
	// 执行sql语句完成对数据库的操作
	public function query($sql){
		echo $sql;
	}
}
$db = DB:;getInstance();
// 只能用静态方法getInstance()去获取db类的对象
$db = query("select * from user");
// 访问对象中的成员


?>