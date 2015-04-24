#Skeleton

[CrossPHP Framework](http://git.oschina.net/ideaa/crossphp "CrossPHP") 的骨架 

### 安装方法
先使用 `git clone` 代码到本地web目录

	git clone https://git.oschina.net/ideaa/skeleton.git

进入cmd命令行模式下,使用[composer](https://getcomposer.org/ "composer")安装依赖

	cd skeleton
	composer install

待安装完后, 通过浏览器输入地址 `http://127.0.0.1/skeleton/htdocs/web` 来访问默认的web页面了   

### 使用说明

skeleton的app目录下包含两个项目 `web` 和 `admin`
		
	   app
		|-web
		|-admin
  
`web` 是项目的主要工作目录, 只包含了一个简单的展示性页面. 项目的代码主要集中在这里.     
`admin` 是一个小型的后台管理系统, 包含登录, 密码管理, 密保卡管理, 简单的角色权限管理系统以及一个根据你的类和方法自动生成菜单的智能菜单系统. 在正常使用前请先打开`config\db.config.php`配置您的数据库, 并导入`sql\admin\back.sql`文件.  

在使用中有任何问题欢迎加入我们的QQ群120801063
