<?php
class A
{
  // final修饰的方法不可以被覆盖
  final function test($arg1){
    echo "A test";
  }
}
class B extends A{
  function see_parent(){
    parent::test();   //访问父类定义的方法
  } 
}
$b=new B();
$b->see_parent();
?> 