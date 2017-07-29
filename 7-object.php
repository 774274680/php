<?php 
// 属性的访问控制
class MyClass
{
    public $public = 'Public';
    protected $protected = 'Protected';
    private $private = 'Private';

    function printHello()
    {
        echo $this->public;
        echo $this->protected;
        echo $this->private;
    }
}

$obj = new MyClass();
echo $obj->public; // public
// echo $obj->protected; //Fatal error: Cannot access protected property MyClass::$protected  致命错误(不能访问受保护的属性)
// echo $obj->private; // 这行也会产生一个致命错误   Fatal error: Cannot access private property MyClass::$private(不能访问私有属性) 
// $obj->printHello(); //依次输出Public、Protected 和 Private
echo "<h3>受保护的和私有的属性不能被类外部访问,只能在类中的公开方法进行访问</h3>";

class MyClass2 extends MyClass
{
    // 可以对 public 和 protected 进行重定义，但 private 而不能
    protected $protected = 'Protected2';

    function printHello()
    {
        echo $this->public;
        echo $this->protected;
        echo $this->private;
    }
}
$obj2 = new MyClass2();
echo $obj2->public; // public
// echo $obj2->protected; //致命错误  Fatal error: Cannot access protected property MyClass2::$protected
// echo $obj2->private; // 未定义 private   Notice: Undefined property: MyClass2::$private

$obj2->printHello(); // 输出 Public、Protected2 和 Notice: Undefined property: MyClass2::$private
echo "<br>";
echo "<hr><h3>说明子类能继承父类中的公开和受保护的属性</h3>";
 ?>