# Hashing
Bcrypt,Argon不可逆哈希加密,从laravel的： illuminate/hashing  包中提取出来,用于php 比如hyperf框架，其它非框架也可以

## 基本使用

1、 下载包
```bash
composer require wll/hash
```

2、 发布配置生成文件:config/autoload/hashing.php
```bash
bin/hyperf.php vendor:publish wll/hash
```

3、 开始使用 - 授权控制器中写
```bash

use Wll\Hash\Hashing\HashHyperfServiceProvider;		//hyperf 中使用
//use Wll\Hash\Hashing\HashLaravelServiceProvider;  //laravel 中使用 然当也可以用app()方式调用
//use Wll\Hash\Hashing\HashPhpServiceProvider;		//php 中使用

 public function index(){	
 
	$hashHyperfServiceProvider=new HashHyperfServiceProvider();
	$hash=$hashHyperfServiceProvider->register();
	
	//生成加密密码
	$pass=$hash->make('123456');
	
	//验证密码是否正确
	if ($hash->check('123456', $pass)) {
	   // 密码匹配正确…  
	   $data['state']='密码匹配正确';
	}
	$data['pass']=$pass;
	
	return $data; 
}
