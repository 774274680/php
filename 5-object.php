<?php 
// 构造函数
	class Person{
		// 创建新对象时会调用此方法.可以进行初始化工作
		function __construct() {
	       print "构造函数开始初始化工作\n";
	    }
	}
	class student extends Person{
		// 如果子类没定义构造函数而父类定义了,那么子类会继承父类的构造函数
		function __construct() {
	       print "我自己创建的构造函数会覆盖父亲继承下来的构造函数\n";
	       // 调用父类的构造函数
	       parent::__construct();
	    }
	}
	class Dog{
		function Dog(){
			print "PHP5中如果没有构造函数,就会调用与类名同样的函数";
		}
	}

	$p1=new Person();   //构造函数开始初始化工作

	$st1=new student();  //我自己创建的构造函数会覆盖父亲继承下来的构造函数   构造函数开始初始化工作

	$dog1=new Dog();    //如果没有构造函数,就会调用与类名同样的函数
 ?>