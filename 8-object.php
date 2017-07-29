<?php
 //方法的访问控制 
class MyClass
{
    // 声明一个公有的构造函数
    public function __construct() { }

    // 声明一个公有的方法
    public function MyPublic() {
    	echo "公有方法";
    }

    // 声明一个受保护的方法
    protected function MyProtected() { 
    	echo "受保护方法";
    }

    // 声明一个私有的方法
    private function MyPrivate() { 
    	echo "私有方法";
    }

    // 此方法为公有
    function Foo()
    {
        $this->MyPublic();
        $this->MyProtected();
        $this->MyPrivate();
    }
}

$myclass = new MyClass;
// $myclass->MyPublic(); //公有方法
// $myclass->MyProtected(); //致命错误 Fatal error: Call to protected method MyClass::MyProtected() from context ''
// $myclass->MyPrivate(); //致命错误   Fatal error: Call to private method MyClass::MyPrivate() from context '' 
$myclass->Foo(); // 公有，受保护，私有都可以执行
echo "<br><h3>公有方法能被外部访问，而受保护和私有的方法不能被外部访问</h3>";

class MyClass2 extends MyClass
{
    // 此方法为公有
    function Foo2()
    {
        $this->MyPublic();
        $this->MyProtected();
        $this->MyPrivate(); // 这行会产生一个致命错误
    }
}

$myclass2 = new MyClass2;
$myclass2->MyPublic(); //"公有方法"
// $myclass2->Foo2(); // 公有的和受保护的都可执行，但私有的不行会报出Fatal error: Call to private method MyClass::MyPrivate() from context 'MyClass2'
echo "<hr><h3>受保护和私有的方法不能用类外来访问,需要调用类里的公开方法再来访问这些方法。从上面可以看出子类能继承父类中公开和受保护的方法而<span style='color:red'>私有方法不能被继承</span>下来</h3>";
 ?>