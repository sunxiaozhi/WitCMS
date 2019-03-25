/*
Navicat MySQL Data Transfer

Source Server         : aliyun
Source Server Version : 50636
Source Host           : 47.105.93.243:3306
Source Database       : witcms

Target Server Type    : MYSQL
Target Server Version : 50636
File Encoding         : 65001

Date: 2019-03-25 10:39:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for wit_admin
-- ----------------------------
DROP TABLE IF EXISTS `wit_admin`;
CREATE TABLE `wit_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '用户名',
  `auth_key` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '邮箱',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='后台用户表';

-- ----------------------------
-- Records of wit_admin
-- ----------------------------
INSERT INTO `wit_admin` VALUES ('1', 'sxz_admin', 'yVHSJ0y1TUcDeHpVsL0ahTqFRk97onax', '$2y$13$CG1LfPxgnzOB0T9vOkMwK.rZeqK/mHJ9if9JC1rshlNhg/UOs7cEW', null, '1129535445@qq.com', '10', '1518405548', '1543824954');

-- ----------------------------
-- Table structure for wit_article
-- ----------------------------
DROP TABLE IF EXISTS `wit_article`;
CREATE TABLE `wit_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `category_id` int(11) unsigned NOT NULL COMMENT '文章分类',
  `sub_title` varchar(255) NOT NULL DEFAULT '' COMMENT '副标题',
  `abstract` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '文章图片',
  `content` text NOT NULL COMMENT '文章内容',
  `is_recommend` tinyint(2) DEFAULT '0' COMMENT '是否推荐 0不推荐 1推荐',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `page_views` int(11) unsigned DEFAULT '0' COMMENT '浏览量',
  `type` tinyint(2) DEFAULT '0' COMMENT '类型 0文章 1单页',
  `seo_title` varchar(255) DEFAULT '' COMMENT 'seo标题',
  `seo_keywords` varchar(255) DEFAULT '' COMMENT 'seo关键词',
  `seo_description` varchar(255) DEFAULT '' COMMENT 'seo描述',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of wit_article
-- ----------------------------
INSERT INTO `wit_article` VALUES ('1', 'Hi，你好', '1', 'Hi，你好', 'Hi，你好', '', '**Hi，**你好，欢迎访问小站！！！', '0', '0', '1', '130', '0', 'Hi，你好', 'Hi，你好', 'Hi，你好', '1543241704', '1545804590');
INSERT INTO `wit_article` VALUES ('2', 'PHP PSR 代码规范基本介绍', '6', 'PHP PSR 代码规范基本介绍', 'PSR是PHP Standard Recommendation的简写，即PHP推荐标准。\r\n', '', 'PSR是PHP Standard Recommendation的简写，即PHP推荐标准。\r\n\r\n目前通过的规范有\r\n\r\n> PSR-0(Autoloading Standard)    \r\n> PSR-1(Basic Coding Standard)    \r\n> PSR-2(Coding Style Guide)    \r\n> PSR-3(Logger Interface)    \r\n> PSR-4(Improved Autoloading)    \r\n\r\nPSR不是PHP官方标准，而是从如Zend、Symfony2等知名PHP项目中提炼出来的一系列标准，目前有越来越多的社区项目加入并遵循该标准。\r\n\r\nPHP FIG（Framework Interoperability Group）框架可互用性小组是制定PSR开发规范的组织。他们的目的在于以最低程度的限制制定一个统一的标准，让各个框架遵循统一的编码规范。\r\n\r\n> PSR-0（自动加载规范）  \r\n\r\nPSR-0(Autoloading Standard)类自动加载规范，该规范现已废弃（Deprecated），它将由PSR-4替代。\r\n\r\n* 一个完全合格的命名空间和类名必须遵循以下结构 \"\\VendorName\\Namespace\\ClassName\"\r\n\r\n*  每个命名空间必须有顶级的命名空间\"VendorName\"\r\n\r\n* 每个命名空间可以有任意多个子命名空间\r\n\r\n* 每个命名空间在被文件系统加载时必须被转换为操作系统路径分隔符 (DIRECTORY_SEPARATOR)\r\n\r\n* 每个\"_\"字符在\"类名\"中被转换为DIRECTORY_SEPARATOR。而在 PSR-4 中使用下划线没有任何特殊含义\r\n\r\n* 符合命名标准的命名空间和类名必须以\".php\"结尾来加载文件\r\n\r\n* 命名空间和类名可以由大小写字母组成，但必须对大小写敏感以保证多系统兼容性\r\n\r\n> PSR-1（基本代码规范）  \r\n\r\nPSR-1(Basic Coding Standard)基本代码规范，用以确保共享的PHP代码间具有较高程度的技术互通性。\r\n\r\n* PHP代码源文件必须以 <?php 或 <?= 标签开始\r\n\r\n* PHP代码源文件必须使用不带 BOM 的 UTF-8 编码\r\n\r\n* 一个源文件建议只用作定义类、函数、常量等声明，或者其他产生从属效应的操作（如：输出信息，修改配置文件等）\r\n\r\n* 命名空间以及类必须符合 PSR 的自动加载规范：PSR-0 或 PSR-4\r\n\r\n* 类的命名必须遵循 StudlyCaps 大写开头的驼峰式命名规范\r\n\r\n* 类中的常量所有字母都必须大写，单词间用下划线分隔\r\n\r\n* 方法名必须符合 camelCase 式的小写开头驼峰式命名规范\r\n\r\n```\r\nBOM(byte order mark)是 Unicode 标准的一部分，通常用于标记纯文本字节序(byte order)，使得文本处理程序能够识别读入的文件使用的 Unicode 编码（UTF-8、UTF-16、UTF-32）。\r\n\r\n从属效应是指仅仅通过包含文件，不直接声明类、函数和常量而执行的逻辑操作。一份PHP源文件应该要么就只包含不产生从属效应的定义操作，要么就包含只会产生从属效应的逻辑操作，切勿同时包含两者。\r\n```\r\n\r\n> PSR-2（代码风格规范）  \r\n\r\nPSR-2(Coding Style Guide)代码风格规范，通过制定一系列规范化PHP代码的规则，以减少因代作者码风格不同而造成的阅读不便。\r\n\r\n* 代码必须遵循 PSR-1 中的编码规范\r\n\r\n* 代码必须使用4个空格来进行缩进，而非制表符(TAB)\r\n\r\n* 建议每行代码字符数保持在80个以内，理论上不可多于120个，但不做硬性限制\r\n\r\n* 每个 namespace 命名空间语句和use声明语句块后面必须插入一个空白行\r\n\r\n* 类的左花括号 \"{\" 必须写在声明后自成一行，右花括号 \"}\"也必须在类主体下自成一行\r\n\r\n* 方法的左花括号 \"{\" 必须放在声明后自成一行，右花括号 \"}\" 也必须于主体下自成一行\r\n\r\n* 类的属性和方法必须添加访问修饰符（private、protected、public），abstract 以及 final 必须声明在访问修饰符之前，而 static 必须声明在访问修饰符之后（例：final public static）\r\n\r\n* 在控制结构关键字的后面必须有一个空格，而调用方法或函数时一定不能有（控制结构：if-else、switch-case、try-catch、while、foreach ...）\r\n\r\n* 控制结构的左花括号 \"{\" 必须跟其处于同一行，右花括号 \"}\" 必须在控制结构主体之后自成一行\r\n\r\n* 控制结构的开始左括号之后，和结束右括号之前都不可以有空格\r\n\r\n> PSR-3（日志接口规范）  \r\n\r\nPSR-3(Logger Interface)日志接口规范，主要目的是为了让日志类库通过接收一个 LoggerInterface 对象来记录日志信息。\r\n\r\n* LoggerInterface 接口对外定义了八个方法，分别用来记录 RFC 5424 中定义的八个等级的日志：debug、info、notice、warning、error、critical、alert、emergency\r\n\r\n* 第九个方法 log()，第一个参数为记录等级。可使用一个预先定义的等级常量作为参数来调用此方法，必须与直接调用以上八个方法具有相同的效果。如果传入的等级常量没有预先定义，则必须抛出 psr\\Log\\InvalidArgumentException 类型的异常。不推荐使用自定义的日志等级，除非你非常确定当前类库对其有所支持。\r\n\r\n> PSR-4（自动加载优化规范）  \r\n\r\nPSR-4(Improved Autoloading)本规范是关于自动载入对应类的相关规范，是 PSR-0 自动加载规范的补充。\r\n\r\n* 此处的“类”是一个泛称，它包含类、接口、traits 以及其他类似的结构\r\n\r\n* 完全限定类名需要遵循以下结构：<命名空间>(<子命名空间>)*<类名>\r\n\r\n```\r\n完全限定类名必须要有一个顶级命名空间，被称为 \"vendor namespace\"；\r\n\r\n完全限定类名可以有一个或多个子命名空间；\r\n\r\n完全限定类名必须有一个终止类名；\r\n\r\n完全限定类名中任意一部分中的下划线都没有特殊含义；\r\n\r\n完全限定类名可以由任意大小写字母组成；\r\n\r\n完全限定类名必须以大小写敏感的方式引用；\r\n```\r\n\r\n* 当根据完整的类名载入相应的文件时：\r\n\r\n```\r\n完全限定类名中，连续的一个或几个子命名空间构成的命名空间前缀（不包括顶级命名空间的分隔符），至少对应着至少一个基础目录；\r\n\r\n紧接命名空间前缀后的子命名空间必须与相应的”文件基目录“相匹配，其中的命名空间分隔符将作为目录分隔符；\r\n\r\n终止类名对应一个以 .php结尾的文件，文件名必须和终止类名大小写匹配；\r\n```\r\n\r\n* 自动加载器（autoloader）的实现不能抛出异常，不可引发任一级别错误，也不应该有返回值', '1', '0', '1', '109', '0', 'PHP PSR 代码规范基本介绍', 'PHP PSR', 'PHP PSR 代码规范基本介绍', '1545803127', '1550208475');
INSERT INTO `wit_article` VALUES ('3', 'MySQL5.6的编译安装', '4', 'MySQL5.6的编译安装', 'MySQL5.6的编译安装', '', '创建软件存放目录\r\n```bash\r\nmkdir /home/soft/\r\ncd /home/soft/\r\n```\r\n\r\n卸载Centos7自带的mariadb\r\n\r\n```bash\r\nyum -y remove maria*\r\n\r\nrm /etc/my.cnf\r\n```\r\n\r\n下载mysql5.6的源码包\r\n```bash\r\nwget https://dev.mysql.com/get/Downloads/MySQL-5.6/mysql-5.6.40.tar.gz\r\n```\r\n\r\n解压mysql5.6的源码包\r\n```bash\r\ntar zxvf mysql-5.6.40.tar.gz\r\n```\r\n\r\n依赖包\r\n```bash\r\nyum -y install gcc gcc-c++ ncurses-devel bison bison-devel perl perl-devel autoconf\r\n```\r\n\r\n安装cmake\r\n```\r\nyum -y install cmake\r\n```\r\n\r\n添加MySQL运行账户和组\r\n\r\n```bash\r\ngroupadd mysql\r\nuseradd -s /sbin/nologin -M -g mysql mysql\r\n```\r\n\r\n编译mysql\r\n\r\n```bash\r\ncmake . -DCMAKE_INSTALL_PREFIX=/usr/local/mysql \\\r\n-DSYSCONFDIR=/etc \\\r\n-DWITH_MYISAM_STORAGE_ENGINE=1 \\\r\n-DWITH_INNOBASE_STORAGE_ENGINE=1 \\\r\n-DWITH_PARTITION_STORAGE_ENGINE=1 \\\r\n-DWITH_FEDERATED_STORAGE_ENGINE=1 \\\r\n-DEXTRA_CHARSETS=all \\\r\n-DDEFAULT_CHARSET=utf8mb4 \\\r\n-DDEFAULT_COLLATION=utf8mb4_general_ci \\\r\n-DWITH_EMBEDDED_SERVER=1 \\\r\n-DENABLED_LOCAL_INFILE=1 \\\r\n```\r\n\r\n```bash\r\nmake && make install\r\n```\r\n\r\n修改文件夹权限\r\n```bash\r\nchown -R root:mysql /usr/local/mysql/\r\n\r\nchown -R mysql:mysql /usr/local/mysql/data/\r\n```\r\n\r\n拷贝配置文件my.cnf\r\n```bash\r\ncp /usr/local/mysql/support-files/my-default.cnf /etc/my.cnf\r\n\r\nvi /etc/my.cnf\r\n[mysqld]\r\nbasedir = /usr/local/mysql\r\ndatadir = /usr/local/mysql/data\r\nport = 3306\r\n# server_id = .....\r\nsocket = /tmp/mysql.sock\r\n```\r\n\r\n初始化数据库\r\n```bash\r\n/usr/local/mysql/scripts/mysql_install_db --defaults-file=/etc/my.cnf --basedir=/usr/local/mysql --datadir=/usr/local/mysql/data --user=mysql\r\n```\r\n\r\n设置成开机启动\r\n```bash\r\ncp /usr/local/mysql/support-files/mysql.server /etc/init.d/mysqld\r\n\r\nchmod 755 /etc/init.d/mysqld\r\n\r\nchkconfig mysqld on\r\n```\r\n\r\n设置mysql环境变量\r\n```bash\r\nvi /etc/profile\r\n添加：\r\nexport PATH=$PATH:/usr/local/mysql/bin\r\n\r\nsource /etc/profile\r\n```\r\n\r\n初始化MySQL及相关安全选项配置\r\n\r\n```bash\r\nmysql_secure_installation\r\n```\r\n\r\n开启3306端口\r\n```bash\r\nfirewall-cmd --permanent --add-port=3306/tcp\r\n\r\nfirewall-cmd --reload\r\n```\r\n\r\n配置192.168.20.65可以通过root:123456访问数据库\r\n\r\n```bash\r\nGRANT ALL PRIVILEGES ON *.* to \'root\'@\'192.168.20.65\' IDENTIFIED BY \'123456\' WITH GRANT OPTION;\r\n```\r\n\r\n从mysql数据库中的授权表重新载入权限\r\n\r\n```bash\r\nflush privileges;\r\n```', '1', '0', '1', '54', '0', 'MySQL5.6的编译安装', 'MySQL5.6的编译安装', 'MySQL5.6的编译安装', '1550201141', '1550207321');
INSERT INTO `wit_article` VALUES ('4', 'PHP中的抽象类（abstract class）和接口（interface）', '3', 'PHP中的抽象类（abstract class）和接口（interface）', 'PHP中的抽象类（abstract class）和接口（interface）', '', '#### 一、 抽象类abstract class\r\n\r\n1.抽象类是指在**class前加了abstract关键字且存在抽象方法（在类方法function关键字前加了 abstract关键字）的类。**\r\n\r\n2.抽象类不能被直接实例化。抽象类中只定义（或部分实现）子类需要的方法。子类可以通过继承抽象类并通过实现抽象类中的所有抽象方法，使抽象类具体化。\r\n\r\n3.如果子类需要实例化，前提是它实现了抽象类中的所有抽象方法。如果子类没有全部实现抽象类中的所有抽象方法，那么该子类也是一个抽象类，必须在class前面加上abstract关键字，并且不能被实例化。\r\n\r\n```php\r\nabstract class A  \r\n{  \r\n    /** 抽象类中可以定义变量 */  \r\n    protected $value1 = 0;  \r\n    private $value2 = 1;  \r\n    public $value3 = 2;  \r\n    /** 也可以定义非抽象方法 */  \r\n    public function my_print()  \r\n    {  \r\n        echo \"hello,world/n\";  \r\n    }  \r\n    /** \r\n     * 大多数情况下，抽象类至少含有一个抽象方法。抽象方法用abstract关键字声明，其中不能有具体内容。 \r\n     * 可以像声明普通类方法那样声明抽象方法，但是要以分号而不是方法体结束。也就是说抽象方法在抽象类中不能被实现，也就是没有函数体“{some codes}”。 \r\n     */  \r\n    abstract protected function abstract_func1();  \r\n    abstract protected function abstract_func2();  \r\n}  \r\nabstract class B extends A  \r\n{  \r\n    public function abstract_func1()  \r\n    {  \r\n       echo \"implement the abstract_func1 in class A/n\";  \r\n    }  \r\n    /** 这么写在zend studio 8中会报错*/  \r\n    //abstract protected function abstract_func2();  \r\n}  \r\nclass C extends B  \r\n{  \r\n    public function abstract_func2()  \r\n    {  \r\n       echo \"implement the abstract_func2 in class A/n\";  \r\n    }  \r\n}  \r\n```\r\n\r\n4.如果像下面这样创建了一个继承自A的子类B ，但是不实现抽象方法abstract_func():\r\n\r\n```php\r\nClass B extends A{};\r\n```\r\n\r\n那么程序将出现以下错误：\r\n```php\r\nFatal error: Class B contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (A::abstract_func)  \r\n```\r\n\r\n5.如果B实现了抽象方法abstract_func() ，那么B中abstract_func()方法的访问控制不能比A中 abstract_func()的访问控制更严格，也就是说：\r\n\r\n(1)如果A中abstract_func()声明为public，那么B中abstract_func()的声明只能是public，不能是protected或private。\r\n\r\n(2)如果A中abstract_func()声明为protected，那么B中abstract_func()的声明可以是public或 protected ，但不能是private。\r\n\r\n(3)如果A中abstract_func()声明为private，嘿嘿，不能定义为private哦！（Fatal error : Abstract function A::abstract_func() cannot be declared private）。\r\n\r\n#### 二、 接口interface\r\n\r\n1.抽象类提供了具体实现的标准，而接口则是纯粹的模版。接口只定义功能，而不包含实现的内容。接口用关键字interface来声明。\r\n\r\n2.**interface是完全抽象的，只能声明方法，而且只能声明public的方法，不能声明private及protected的方法，不能定义方法体，也不能声明实例变量**。然而，interface却可以声明常量变量 。但将常量变量放在interface中违背了其作为接口的作用而存在的宗旨，也混淆了interface与类的不同价值。如果的确需要，可以将其放在相应的abstract class或Class中。\r\n\r\n```php\r\ninterface iA  \r\n{  \r\n    const AVAR=3;  \r\n    public function iAfunc1();  \r\n    public function iAfunc2();  \r\n}\r\n\r\necho iA:: AVAR;\r\n```\r\n\r\n3.任何实现接口的类都要实现接口中所定义的所有方法\r\n```php\r\nclass E implements iA  \r\n{  \r\n    public function iAfunc1(){echo \"in iAfunc1\";}  \r\n    public function iAfunc2(){echo \"in iAfunc2\";}  \r\n}\r\n```\r\n\r\n否则该类必须声明为abstract。\r\n```php\r\nabstract class E implements iA{}\r\n```\r\n\r\n4.一个类可以在声明中使用implements关键字来实现某个接口。这么做之后，实现接口的具体过程和继承一个仅包含抽象方法的抽象类是一样的。**一个类可以同时继承一个父类和实现任意多个接口**。extends子句应该在implements子句之前。PHP只支持继承自一个父类，因此extends关键字后只能跟一个类名。\r\n\r\n```php\r\ninterface iB  \r\n{  \r\n    public function iBfunc1();  \r\n    public function iBfunc2();  \r\n}  \r\nclass D extends A implements iA,iB  \r\n{  \r\n    public function abstract_func1()  \r\n    {  \r\n       echo \"implement the abstract_func1 in class A/n\";  \r\n    }  \r\n    public function abstract_func2()  \r\n    {  \r\n       echo \"implement the abstract_func2 in class A/n\";  \r\n    }  \r\n    public function iAfunc1(){echo \"in iAfunc1\";}  \r\n    public function iAfunc2(){echo \"in iAfunc2\";}  \r\n    public function iBfunc1(){echo \"in iBfunc1\";}  \r\n    public function iBfunc2(){echo \"in iBfunc2\";}  \r\n}  \r\n   \r\nclass D extends B implements iA,iB  \r\n{  \r\n    public function abstract_func1()  \r\n    {  \r\n       parent::abstract_func1();  \r\n       echo \"override the abstract_func1 in class A/n\";  \r\n    }  \r\n    public function abstract_func2()  \r\n    {  \r\n       echo \"implement the abstract_func2 in class A/n\";  \r\n    }  \r\n    public function iAfunc1(){echo \"in iAfunc1\";}  \r\n    public function iAfunc2(){echo \"in iAfunc2\";}  \r\n    public function iBfunc1(){echo \"in iBfunc1\";}  \r\n    public function iBfunc2(){echo \"in iBfunc2\";}  \r\n} \r\n```\r\n\r\n5.接口不可以实现另一个接口，但可以继承多个\r\n\r\n```php\r\ninterface iC extends iA,iB{}  \r\nclass F implements iC  \r\n{  \r\n    public function iAfunc1(){echo \"in iAfunc1\";}  \r\n    public function iAfunc2(){echo \"in iAfunc2\";}  \r\n    public function iBfunc1(){echo \"in iBfunc1\";}  \r\n    public function iBfunc2(){echo \"in iBfunc2\";}  \r\n}\r\n```\r\n\r\n#### 三、抽象类和接口的异同\r\n\r\n##### 1.相同点：\r\n\r\n(1)两者都是抽象类，都不能实例化。\r\n\r\n(2)interface实现类及abstract class的子类都必须要实现已经声明的抽象方法。\r\n\r\n##### 2.不同点：\r\n(1)interface需要实现，要用implements，而abstract class需要继承，要用extends。\r\n\r\n(2)一个类可以实现多个interface ，但一个类只能继承一个abstract class 。\r\n\r\n(3)interface强调特定功能的实现，而abstract class强调所属关系。\r\n\r\n(4)尽管interface实现类及abstract class的子类都必须要实现相应的抽象方法，但实现的形式不同。interface中的每一个方法都是抽象方法，都只是声明的(declaration, 没有方法体 )，实现类必须要实现。而abstract class的子类可以有选择地实现。这个选择有两点含义：\r\n\r\n* a) abstract class 中并非所有的方法都是抽象的，只有那些冠有 abstract 的方法才是抽象的，子类必须实现。那些没有 abstract 的方法，在 abstract class 中必须定义方法体；\r\n\r\n* b) abstract class的子类在继承它时，对非抽象方法既可以直接继承，也可以覆盖；而对抽象方法，可以选择实现，也可以留给其子类来实现，但此类必须也声明为抽象类。既是抽象类，当然也不能实例化。\r\n\r\n(5)abstract class是interface与 class的中介。 abstract class在interface及class中起到了承上启下的作用。一方面，abstract class 是抽象的，可以声明抽象方法，以规范子类必须实现的功能；另一方面，它又可以定义缺省的方法体，供子类直接使用或覆盖。另外，它还可以定义自己的实例变量，以供子类通过继承来使用。\r\n\r\n(6)接口中的抽象方法前不用也不能加abstract关键字，默认隐式就是抽象方法，也不能加final 关键字来防止抽象方法的继承。而抽象类中抽象方法前则必须加上abstract表示显示声明为抽象方法。\r\n\r\n(7)**接口中的抽象方法默认是public的，也只能是public的，不能用private，protected修饰符修饰。而抽象类中的抽象方法则可以用public，protected来修饰，但不能用private**。\r\n\r\n##### 3. interface 的应用场合\r\n\r\n(1)类与类之间需要特定的接口进行协调，而不在乎其如何实现。\r\n\r\n(2)作为能够实现特定功能的标识存在，也可以是什么接口方法都没有的纯粹标识。\r\n\r\n(3)需要将一组类视为单一的类，而调用者只通过接口来与这组类发生联系。\r\n\r\n(4)需要实现特定的多项功能，而这些功能之间可能完全没有任何联系。\r\n\r\n##### 4. abstract class 的应用场合\r\n\r\n一句话，在既需要统一的接口，又需要实例变量或缺省的方法的情况下，就可以使用它。最常见的有：\r\n\r\n(1)定义了一组接口，但又不想强迫每个实现类都必须实现所有的接口。可以用abstract class定义一组方法体，甚至可以是空方法体，然后由子类选择自己所感兴趣的方法来覆盖。\r\n\r\n(2)某些场合下，只靠纯粹的接口不能满足类与类之间的协调，还必需类中表示状态的变量来区别不同的关系。 abstract的中介作用可以很好地满足这一点。\r\n\r\n(3)规范了一组相互协调的方法，其中一些方法是共同的，与状态无关的，可以共享的，无需子类分别实现；而另一些方法却需要各个子类根据自己特定的状态来实现特 定的功能 。', '0', '0', '1', '11', '0', 'PHP中的抽象类（abstract class）和接口（interface）', 'PHP中的抽象类（abstract class）和接口（interface）', 'PHP中的抽象类（abstract class）和接口（interface）', '1552981147', '1552981294');

-- ----------------------------
-- Table structure for wit_article_category
-- ----------------------------
DROP TABLE IF EXISTS `wit_article_category`;
CREATE TABLE `wit_article_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '父类id',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '别名',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '备注',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='文章分类表';

-- ----------------------------
-- Records of wit_article_category
-- ----------------------------
INSERT INTO `wit_article_category` VALUES ('1', '0', '说说', '说说', '0', '说说', '1543241704', '1545702388');
INSERT INTO `wit_article_category` VALUES ('2', '0', 'PHP', 'PHP', '0', 'PHP', '1543913681', '1545701659');
INSERT INTO `wit_article_category` VALUES ('3', '2', 'PHP基础', 'PHP基础', '0', 'PHP基础', '1543913701', '1545701692');
INSERT INTO `wit_article_category` VALUES ('4', '0', 'MySQL', 'MySQL', '0', 'MySQL', '1545701151', '1545701539');
INSERT INTO `wit_article_category` VALUES ('5', '0', 'Nginx', 'Nginx', '0', 'Nginx', '1545717633', '1545717633');
INSERT INTO `wit_article_category` VALUES ('6', '2', 'PHP进阶', 'PHP进阶', '0', 'PHP进阶', '1545803035', '1545803035');
INSERT INTO `wit_article_category` VALUES ('7', '0', '设计模式', '设计模式', '0', '设计模式', '1552027786', '1552027786');

-- ----------------------------
-- Table structure for wit_article_content
-- ----------------------------
DROP TABLE IF EXISTS `wit_article_content`;
CREATE TABLE `wit_article_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章内容id',
  `article_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文章id',
  `content` text NOT NULL COMMENT '文章内容',
  PRIMARY KEY (`id`),
  KEY `article_id_index` (`article_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章内容表';

-- ----------------------------
-- Records of wit_article_content
-- ----------------------------

-- ----------------------------
-- Table structure for wit_article_tag
-- ----------------------------
DROP TABLE IF EXISTS `wit_article_tag`;
CREATE TABLE `wit_article_tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '名称',
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '别名',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '备注',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='文章标签表';

-- ----------------------------
-- Records of wit_article_tag
-- ----------------------------
INSERT INTO `wit_article_tag` VALUES ('1', '说说', '说说', '0', '说说', '1543241704', '1545717457');
INSERT INTO `wit_article_tag` VALUES ('2', 'PHP', 'PHP', '0', 'PHP', '1543913609', '1545803072');
INSERT INTO `wit_article_tag` VALUES ('3', 'MySQL', 'MySQL', '0', '', '1550201141', '1550201199');

-- ----------------------------
-- Table structure for wit_article_tag_relation
-- ----------------------------
DROP TABLE IF EXISTS `wit_article_tag_relation`;
CREATE TABLE `wit_article_tag_relation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `article_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文章id',
  `tag_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '标签id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='文章标签映射表';

-- ----------------------------
-- Records of wit_article_tag_relation
-- ----------------------------
INSERT INTO `wit_article_tag_relation` VALUES ('21', '1', '1');
INSERT INTO `wit_article_tag_relation` VALUES ('23', '3', '3');
INSERT INTO `wit_article_tag_relation` VALUES ('31', '2', '2');
INSERT INTO `wit_article_tag_relation` VALUES ('36', '4', '2');

-- ----------------------------
-- Table structure for wit_auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `wit_auth_assignment`;
CREATE TABLE `wit_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `auth_assignment_user_id_idx` (`user_id`),
  CONSTRAINT `wit_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `wit_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='给用户分配权限的表';

-- ----------------------------
-- Records of wit_auth_assignment
-- ----------------------------
INSERT INTO `wit_auth_assignment` VALUES ('普通管理员', '1', '1533776565');
INSERT INTO `wit_auth_assignment` VALUES ('普通管理员', '20', '1533716031');

-- ----------------------------
-- Table structure for wit_auth_item
-- ----------------------------
DROP TABLE IF EXISTS `wit_auth_item`;
CREATE TABLE `wit_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `wit_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `wit_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='生成许可表';

-- ----------------------------
-- Records of wit_auth_item
-- ----------------------------
INSERT INTO `wit_auth_item` VALUES ('#', '2', '', '#', null, '1522050422', '1522050852');
INSERT INTO `wit_auth_item` VALUES ('admin/index', '2', '', 'admin/index', null, '1522049871', '1522050852');
INSERT INTO `wit_auth_item` VALUES ('article/index', '2', '', 'article/index', null, '1522050419', '1522050852');
INSERT INTO `wit_auth_item` VALUES ('backend-menu/index', '2', '', 'backend-menu/index', null, '1522050419', '1522050852');
INSERT INTO `wit_auth_item` VALUES ('frontend-menu/index', '2', '', 'frontend-menu/index', null, '1522050419', '1522050852');
INSERT INTO `wit_auth_item` VALUES ('rabc/index', '2', '', 'rabc/index', null, '1522050414', '1522050852');
INSERT INTO `wit_auth_item` VALUES ('user/index', '2', '', 'user/index', null, '1522049871', '1522050852');
INSERT INTO `wit_auth_item` VALUES ('普通管理员', '1', '普通管理员', null, null, '1521783127', '1522052221');
INSERT INTO `wit_auth_item` VALUES ('测试', '1', '测试', null, null, '1533712861', '1533712861');
INSERT INTO `wit_auth_item` VALUES ('超级管理员', '1', '拥有所有权限', null, null, '1521783127', '1552012895');

-- ----------------------------
-- Table structure for wit_auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `wit_auth_item_child`;
CREATE TABLE `wit_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `wit_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `wit_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `wit_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `wit_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='给用户分配许可的表';

-- ----------------------------
-- Records of wit_auth_item_child
-- ----------------------------
INSERT INTO `wit_auth_item_child` VALUES ('超级管理员', '#');
INSERT INTO `wit_auth_item_child` VALUES ('超级管理员', 'admin/index');
INSERT INTO `wit_auth_item_child` VALUES ('超级管理员', 'article/index');
INSERT INTO `wit_auth_item_child` VALUES ('超级管理员', 'backend-menu/index');
INSERT INTO `wit_auth_item_child` VALUES ('超级管理员', 'frontend-menu/index');
INSERT INTO `wit_auth_item_child` VALUES ('超级管理员', 'rabc/index');
INSERT INTO `wit_auth_item_child` VALUES ('超级管理员', 'user/index');

-- ----------------------------
-- Table structure for wit_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `wit_auth_rule`;
CREATE TABLE `wit_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='权限规则表';

-- ----------------------------
-- Records of wit_auth_rule
-- ----------------------------
INSERT INTO `wit_auth_rule` VALUES ('#', 0x4F3A32333A226261636B656E645C6D6F64656C735C4175746852756C65223A343A7B733A343A226E616D65223B733A313A2223223B733A33303A22006261636B656E645C6D6F64656C735C4175746852756C65005F72756C65223B723A313B733A393A22637265617465644174223B693A313532323034393530333B733A393A22757064617465644174223B693A313532323035303835323B7D, '1522049503', '1522050852');
INSERT INTO `wit_auth_rule` VALUES ('admin/index', 0x4F3A32333A226261636B656E645C6D6F64656C735C4175746852756C65223A343A7B733A343A226E616D65223B733A31313A2261646D696E2F696E646578223B733A33303A22006261636B656E645C6D6F64656C735C4175746852756C65005F72756C65223B723A313B733A393A22637265617465644174223B693A313532323034393837313B733A393A22757064617465644174223B693A313532323035303835323B7D, '1522049871', '1522050852');
INSERT INTO `wit_auth_rule` VALUES ('article/index', 0x4F3A32333A226261636B656E645C6D6F64656C735C4175746852756C65223A343A7B733A343A226E616D65223B733A31333A2261727469636C652F696E646578223B733A33303A22006261636B656E645C6D6F64656C735C4175746852756C65005F72756C65223B723A313B733A393A22637265617465644174223B693A313532323035303431393B733A393A22757064617465644174223B693A313532323035303835323B7D, '1522050419', '1522050852');
INSERT INTO `wit_auth_rule` VALUES ('backend-menu/index', 0x4F3A32333A226261636B656E645C6D6F64656C735C4175746852756C65223A343A7B733A343A226E616D65223B733A31383A226261636B656E642D6D656E752F696E646578223B733A33303A22006261636B656E645C6D6F64656C735C4175746852756C65005F72756C65223B723A313B733A393A22637265617465644174223B693A313532323035303431393B733A393A22757064617465644174223B693A313532323035303835323B7D, '1522050419', '1522050852');
INSERT INTO `wit_auth_rule` VALUES ('frontend-menu/index', 0x4F3A32333A226261636B656E645C6D6F64656C735C4175746852756C65223A343A7B733A343A226E616D65223B733A31393A2266726F6E74656E642D6D656E752F696E646578223B733A33303A22006261636B656E645C6D6F64656C735C4175746852756C65005F72756C65223B723A313B733A393A22637265617465644174223B693A313532323035303431393B733A393A22757064617465644174223B693A313532323035303835323B7D, '1522050419', '1522050852');
INSERT INTO `wit_auth_rule` VALUES ('rabc/index', 0x4F3A32333A226261636B656E645C6D6F64656C735C4175746852756C65223A343A7B733A343A226E616D65223B733A31303A22726162632F696E646578223B733A33303A22006261636B656E645C6D6F64656C735C4175746852756C65005F72756C65223B723A313B733A393A22637265617465644174223B693A313532323035303431343B733A393A22757064617465644174223B693A313532323035303835323B7D, '1522050414', '1522050852');
INSERT INTO `wit_auth_rule` VALUES ('user/index', 0x4F3A32333A226261636B656E645C6D6F64656C735C4175746852756C65223A343A7B733A343A226E616D65223B733A31303A22757365722F696E646578223B733A33303A22006261636B656E645C6D6F64656C735C4175746852756C65005F72756C65223B723A313B733A393A22637265617465644174223B693A313532323034393635383B733A393A22757064617465644174223B693A313532323035303835323B7D, '1522049658', '1522050852');

-- ----------------------------
-- Table structure for wit_comments
-- ----------------------------
DROP TABLE IF EXISTS `wit_comments`;
CREATE TABLE `wit_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `article_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章id',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `status` smallint(2) unsigned NOT NULL DEFAULT '0' COMMENT '评论的状态 0未审 1通过 2未通过',
  `content` text NOT NULL COMMENT '评论内容',
  `created_at` int(10) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论表';

-- ----------------------------
-- Records of wit_comments
-- ----------------------------

-- ----------------------------
-- Table structure for wit_config
-- ----------------------------
DROP TABLE IF EXISTS `wit_config`;
CREATE TABLE `wit_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '配置说明',
  `group` varchar(20) NOT NULL DEFAULT 'basic' COMMENT '配置分组 basic email',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置类型 ',
  `value` text COMMENT '配置值',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '配置值',
  `remark` varchar(100) NOT NULL DEFAULT '' COMMENT '配置说明',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '状态 0不显示 1显示',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`),
  KEY `type` (`type`),
  KEY `group` (`group`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='网站配置表';

-- ----------------------------
-- Records of wit_config
-- ----------------------------
INSERT INTO `wit_config` VALUES ('1', 'WEB_SITE_TITLE', '网站标题', '1', '1', '技术之路', '', '网站标题前台显示标题', '0', '1', '1378898976', '1538272395');
INSERT INTO `wit_config` VALUES ('2', 'WEB_SITE_DESCRIPTION', '网站描述', 'basic', '2', '内容管理框架', '', '网站搜索引擎描述', '1', '1', '1378898976', '1538272395');
INSERT INTO `wit_config` VALUES ('3', 'WEB_SITE_KEYWORD', '网站关键字', '0', '2', '技术之路<br>\r\n记录技术路上的点点滴滴<br>\r\n分享技术路上的所见所得', '', '网站搜索引擎关键字', '8', '1', '1378898976', '1538272395');
INSERT INTO `wit_config` VALUES ('4', 'WEB_SITE_CLOSE', '关闭站点', 'basic', '4', '1', '0:关闭,1:开启', '站点关闭后其他用户不能访问，管理员可以正常访问', '1', '0', '1378898976', '1463024280');
INSERT INTO `wit_config` VALUES ('10', 'WEB_SITE_ICP', '网站备案号', 'basic', '1', '沪ICP备12007941号-2', '', '设置在网站底部显示的备案号，如“沪ICP备12007941号-2', '9', '1', '1378900335', '1538272395');
INSERT INTO `wit_config` VALUES ('11', 'DATA_BACKUP_PATH', '数据库备份路径', 'basic', '1', '/storage/web/database/', '', '路径必须以 / 结尾', '3', '1', '1379053380', '1476448404');

-- ----------------------------
-- Table structure for wit_file
-- ----------------------------
DROP TABLE IF EXISTS `wit_file`;
CREATE TABLE `wit_file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `md5_file` varchar(255) NOT NULL DEFAULT '' COMMENT '文件md5',
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '文件路径',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wit_file
-- ----------------------------
INSERT INTO `wit_file` VALUES ('5', '20181120/goods_de27864656c7384e33f6949ee714f7ef.jpg', '20181120/goods_de27864656c7384e33f6949ee714f7ef.jpg');

-- ----------------------------
-- Table structure for wit_friend_link
-- ----------------------------
DROP TABLE IF EXISTS `wit_friend_link`;
CREATE TABLE `wit_friend_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '友情链接id',
  `name` varchar(255) NOT NULL COMMENT '友情链接名字',
  `image` varchar(255) DEFAULT NULL COMMENT '友情链接图片',
  `url` varchar(255) DEFAULT NULL COMMENT '友情链接网址',
  `target` varchar(255) NOT NULL DEFAULT '_blank' COMMENT '跳转方式',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='友情链接表';

-- ----------------------------
-- Records of wit_friend_link
-- ----------------------------
INSERT INTO `wit_friend_link` VALUES ('1', '百度', '', 'https://www.baidu.com', '_blank', '1', '1', '1468303882', '1538100981');
INSERT INTO `wit_friend_link` VALUES ('2', '谷歌', '', 'https://www.google.com', '_blank', '0', '0', '222', '1543296900');

-- ----------------------------
-- Table structure for wit_menu
-- ----------------------------
DROP TABLE IF EXISTS `wit_menu`;
CREATE TABLE `wit_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单id',
  `name` varchar(255) NOT NULL COMMENT '菜单名称',
  `parent_id` int(10) unsigned DEFAULT '0' COMMENT '父id',
  `route` varchar(255) NOT NULL COMMENT '路由',
  `icon` varchar(255) DEFAULT NULL COMMENT '图标样式',
  `type` tinyint(1) DEFAULT '0' COMMENT '菜单类型 0 后台菜单 1前台菜单',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态 0不显示 1显示',
  `is_absolute_url` tinyint(1) DEFAULT '0' COMMENT '是否是绝对地址',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='菜单表';

-- ----------------------------
-- Records of wit_menu
-- ----------------------------
INSERT INTO `wit_menu` VALUES ('1', '仪表盘', '0', 'site/index', 'fa fa-dashboard', '0', '1', '1', '0', '1521970930', '1538978644');
INSERT INTO `wit_menu` VALUES ('2', '用户管理', '0', 'user/index', 'fa fa-users', '0', '0', '0', '0', '1521970961', '1538978821');
INSERT INTO `wit_menu` VALUES ('3', '权限管理', '0', '#', 'fa fa-lock', '0', '0', '1', '0', '1521970961', '1521971972');
INSERT INTO `wit_menu` VALUES ('4', '菜单管理', '0', '#', 'fa fa-bars', '0', '0', '1', '0', '1521971007', '1521971690');
INSERT INTO `wit_menu` VALUES ('5', '内容管理', '0', '#', 'fa fa-file', '0', '0', '1', '0', '1521970983', '1521971644');
INSERT INTO `wit_menu` VALUES ('6', '友情链接', '0', 'friend-link/index', 'fa fa-link', '0', '0', '1', '0', '1521971227', '1521973122');
INSERT INTO `wit_menu` VALUES ('8', '管理员', '3', 'admin/index', 'fa fa-id-badge', '0', '0', '1', '0', '1521971313', '1533107632');
INSERT INTO `wit_menu` VALUES ('9', '角色', '3', 'rabc/index', 'fa fa-th-large', '0', '0', '1', '0', '1521972025', '1521972048');
INSERT INTO `wit_menu` VALUES ('10', '后台菜单', '4', 'backend-menu/index', 'fa fa-map', '0', '0', '1', '0', '1521972100', '1533108290');
INSERT INTO `wit_menu` VALUES ('11', '前台菜单', '4', 'frontend-menu/index', 'fa fa-map-o', '0', '0', '1', '0', '1521972134', '1533108306');
INSERT INTO `wit_menu` VALUES ('12', '文章管理', '5', 'article/index', 'fa fa-edit', '0', '0', '1', '0', '1521972263', '1533108167');
INSERT INTO `wit_menu` VALUES ('13', '首页', '0', 'article/index', 'fa fa-map', '1', '0', '0', '0', '1533193393', '1545701213');
INSERT INTO `wit_menu` VALUES ('14', '文章分类', '5', 'article-category/index', 'fa fa-folder-open', '0', '0', '1', '0', '1533611643', '1536892649');
INSERT INTO `wit_menu` VALUES ('15', 'PHP', '0', '#', '', '1', '0', '1', '0', '1536568679', '1543912167');
INSERT INTO `wit_menu` VALUES ('16', 'PHP基础', '15', 'article/index?cid=3', '', '1', '0', '1', '0', '1536568723', '1545701724');
INSERT INTO `wit_menu` VALUES ('17', '文章标签', '5', 'article-tag/index', 'fa fa-tags', '0', '0', '1', '0', '1536892002', '1536892658');
INSERT INTO `wit_menu` VALUES ('18', '系统设置', '0', '#', 'fa fa-cog', '0', '1', '1', '0', '1538277338', '1538978628');
INSERT INTO `wit_menu` VALUES ('19', '配置管理', '18', 'config/index', 'fa fa-wrench', '0', '0', '1', '0', '1538277546', '1538278620');
INSERT INTO `wit_menu` VALUES ('20', '网站设置', '18', 'config/index', 'fa fa-clipboard', '0', '0', '0', '0', '1538277583', '1538287661');
INSERT INTO `wit_menu` VALUES ('21', '说说', '0', 'article/index?cid=1', '', '1', '99', '1', '0', '1543912287', '1545723358');
INSERT INTO `wit_menu` VALUES ('22', 'MySQL', '0', 'article/index?cid=4', '', '1', '0', '1', '0', '1545701743', '1545701743');
INSERT INTO `wit_menu` VALUES ('23', 'Nginx', '0', 'article/index?cid=5', '', '1', '0', '1', '0', '1545717683', '1545717683');
INSERT INTO `wit_menu` VALUES ('24', 'PHP进阶', '15', 'article/index?cid=6', '', '1', '0', '1', '0', '1545803670', '1545803670');
INSERT INTO `wit_menu` VALUES ('25', '设计模式', '0', 'article/index?cid=7', '', '1', '0', '1', '0', '1552027840', '1552027840');

-- ----------------------------
-- Table structure for wit_migration
-- ----------------------------
DROP TABLE IF EXISTS `wit_migration`;
CREATE TABLE `wit_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wit_migration
-- ----------------------------
INSERT INTO `wit_migration` VALUES ('m000000_000000_base', '1518405199');
INSERT INTO `wit_migration` VALUES ('m130524_201442_init', '1518405203');
INSERT INTO `wit_migration` VALUES ('m140506_102106_rbac_init', '1519788294');
INSERT INTO `wit_migration` VALUES ('m170907_052038_rbac_add_index_on_auth_assignment_user_id', '1519788294');

-- ----------------------------
-- Table structure for wit_user
-- ----------------------------
DROP TABLE IF EXISTS `wit_user`;
CREATE TABLE `wit_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '用户名',
  `auth_key` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '邮箱',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='前台用户表';

-- ----------------------------
-- Records of wit_user
-- ----------------------------
INSERT INTO `wit_user` VALUES ('1', 'sxz123', 'uTZwVSzBGd5g2LK8UxhhU2TIES6F-M_E', '$2y$13$VD9jg6bYCaczMVqQwveGBOAU7FCsDlDzmxc.emKLzrEcL6yQRfijq', null, '1129535445@qq.com', '10', '1518405548', '1518405548');
