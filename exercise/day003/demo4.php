<?php
class Person{
	private $name;
	private $sex;
	private function __set($propertyName,$propertyValue){
		$this->$propertyname = $propertyValue;
	}
	private function __get($propertyName){
		return $this->$propertyName;
	}
}
$person1 = new Person();
$person1->name = "李四";
$person1->sex = "女";
echo $person1->name;
echo $person1->age;

?>