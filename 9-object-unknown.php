<?php 
// 类中方法的调用
class Bar 
{
    public function test() {
        var_dump($this);
        $this->testPrivate();
        $this->testPublic();
        
    }

    protected function testProtected() {
        echo "Bar::protected\n";
    }
    
    private function testPrivate() {
        echo "Bar::testPrivateaaaa\n";
    }
}

class Foo extends Bar 
{
    public function testPublic() {
        echo "Foo::testPublic\n";
    }
    
    private function testPrivate() {
        echo "Foo::testPrivatexixi\n";
    }
}

// 继承了父类中的公开和受保护的属性和方法
$myFoo = new foo();   //类名不区分大小写
$myFoo->test(); 
// Bar::testPrivate 
// Foo::testPublic
/*我猜想的:子类继承了父类的方法,当子类访问不在本身的方法会去父类中找，子类的指针会指向父类然后会先在父类的方法中找，找到就调用，找不到再返回子类中调用*/
?> 
