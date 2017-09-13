<?php
header('Content-type:text/html;charset=utf-8');
class Person{
	public $name;
	public $sex;
	public function __construct($name,$sex){
		$this->name = $name;
		$this->sex = $sex;
	}
	public function __destruct(){
		echo "再见".$this->name."<br>";
	}
}
$person1 = new Person("张三","男");
$person2 = new Person("李四","女");
$person2 = null;
$person3 = new Person("王五","男");

?>