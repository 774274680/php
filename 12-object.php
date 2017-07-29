<?php 
// 范围解析操作符简单地说是一对冒号，可以用于访问静态成员、方法和常量，还可以用于覆盖类中的成员和方法。 
//当在类的外部访问这些静态成员、方法和常量时，必须使用类的名字。 


class MyClass {
	// 设置一个常量
    const CONST_VALUE = 'PHP';
    function test($parent){
    	echo self::CONST_VALUE.$parent;
    }
}
$my1=new MyClass();

// echo $my1->CONST_VALUE;  报错  Notice: Undefined property: MyClass::$CONST_VALUE

// 类外访问常量
echo MyClass::CONST_VALUE;   //PHP

class OtherClass extends MyClass
{
    public static $my_static = 'static var';

    public static function doubleColon() {
    	//访问父类中的常量
        echo parent::CONST_VALUE . "\n";
        //类里访问静态变量
        echo self::$my_static . "\n";
        //访问子类中的常量
        echo self::CONST_VALUE."\n";
    }
    //子类与父类中继承下来的方法名相同时,参数个数要一致并且子类覆盖父类的方法
    function test($num2){
    	// 但仍然可以调用已被覆盖的方法
    	parent::test("parent");
    	echo self::CONST_VALUE."$num2";
    }
}
$other1=new OtherClass();
// echo $other1->my_static;  报错  Strict standards: Accessing static property OtherClass::$my_static as non static

// 类外访问静态属性
echo OtherClass::$my_static;  //static var
//类外访问静态方法
OtherClass::doubleColon();   //PHP static var PHP
echo "<h3>由这里可以看出父类的常量可以被继承下来</h3>";

$other1->test("haha");  //PHPparentPHPhaha
 ?>