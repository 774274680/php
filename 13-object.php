<?php 
// static   静态属性和静态方法
class Foo
{
	// 静态属性
    public static $my_static = 'foo';     //更改修饰符得到的结果会不一样的

    public function staticValue() {
    	//类里访问静态属性
        return self::$my_static;
    }

    public static function aStaticMethod() {
        echo "Foo中的静态方法";
    }
}


class Bar extends Foo
{
    public function fooStatic() {
    	// 访问父类的静态属性
        return parent::$my_static;
    }
}

//类外通过 类名::$静态变量 访问公开的静态属性 ,受保护的静态属性是不能这样访问的 
print Foo::$my_static . "\n";      //foo

$foo = new Foo();
//调用类公开方法来访问静态属性 
print $foo->staticValue() . "\n";  //foo
// print $foo->my_static;    //报错 Strict standards: Accessing static property Foo::$my_static as non static

// 类外通过 对象::$静态变量 访问公开的静态属性 ,受保护的静态属性是不能这样访问的
print $foo::$my_static . "\n";   //foo

//类名不区分大小写
$classname = 'foo';
print $classname::$my_static . "\n"; //foo  PHP 5.3.0之后可以动态调用  访问公开的静态属性 ,受保护的静态属性是不能这样访问的

//静态属性被继承下来了     访问公开的静态属性 ,受保护的静态属性是不能这样访问的
print Bar::$my_static . "\n";   //foo   

$bar = new Bar();
// 子类调用公开方法来访问父类中的静态属性(受保护和公开的都行,私有不行)
print $bar->fooStatic() . "\n";  //foo

echo "<hr>";

Foo::aStaticMethod();   //Foo中的静态方法
$foo->aStaticMethod();  //Foo中的静态方法
$classname = 'foo';
$classname::aStaticMethod(); //Foo中的静态方法   As of PHP 5.3.0
 ?>