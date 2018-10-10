/*
Navicat MySQL Data Transfer

Source Server         : phpstudy_mysql
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : witcms

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-10-10 16:36:17
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
INSERT INTO `wit_admin` VALUES ('1', 'admin', 'fVXR19v5dMVRub2Hy06h4f_e8Mn1ocVq', '$2y$13$257Eh6dhyfkSL76iinsQJ.Z/OTE1rgca7b/9aThY1CH6lDLSL072.', null, '1129535445@qq.com', '10', '1518405548', '1533716711');

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
  `content` text NOT NULL COMMENT '文章内容',
  `is_recommend` tinyint(2) DEFAULT '0' COMMENT '是否推荐 0不推荐 1推荐',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `type` tinyint(2) DEFAULT '0' COMMENT '类型 0文章 1单页',
  `seo_title` varchar(255) DEFAULT '' COMMENT 'seo标题',
  `seo_keywords` varchar(255) DEFAULT '' COMMENT 'seo关键词',
  `seo_description` varchar(255) DEFAULT '' COMMENT 'seo描述',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of wit_article
-- ----------------------------
INSERT INTO `wit_article` VALUES ('44', '测试文章', '3', '测试文章副标题', '测试文章摘要水电费水电费水电费水电费是的发送到水电费水电费所发生的水电费沙发斯蒂芬舒服舒服沙发斯蒂芬所发生的发送放松放松发送的发顺分发送发顺分舒服舒服所发生的防守打法舒服舒服是否是沙发斯蒂芬是所发生的飞', '<p style=\"margin-left: 20px;\">干豆腐干豆腐电饭锅电饭锅电饭锅d</p><p><strong>豆腐干豆腐</strong></p><p style=\"margin-left: 20px;\">电饭锅电饭锅梵蒂冈地方 电饭锅</p>', '1', '12', '1', '0', '1233', '444', '55555', '1533533945', '1537339774');
INSERT INTO `wit_article` VALUES ('45', 'YIi2基础-事件', '3', '打的', 'dadas', '<h1>事件（Event）<a href=\"http://www.digpage.com/event.html#event\" title=\"Permalink to this headline\"></a></h1><p>使用事件，可以在特定的时点，触发执行预先设定的一段代码，事件既是代码解耦的一种方式，也是设计业务流程的一种模式。现代软件中，事件无处不在，比如，你发了个微博，触发了一个事件，导致关注你的人，看到了你新发出来的内容。对于事件而言，有这么几个要素：</p><ul><li>这是一个什么事件？一个软件系统里，有诸多事件，发布新微博是事件，删除微博也是一种事件。</li><li>谁触发了事件？你发的微博，就是你触发的事件。</li><li>谁负责监听这个事件？或者谁能知道这个事件发生了？服务器上处理用户注册的模块，肯定不会收到你发出新微博的事件。</li><li>事件怎么处理？对于发布新微博的事件，就是通知关注了你的其他用户。</li><li>事件相关数据是什么？对于发布新微博事件，包含的数据至少要有新微博的内容，时间等。</li></ul><h2>Yii中与事件相关的类<a href=\"http://www.digpage.com/event.html#yii\" title=\"Permalink to this headline\"></a></h2><p>Yii中，事件是在&nbsp;yii\\base\\Component&nbsp;中引入的，注意，&nbsp;yii\\base\\Object&nbsp;不支持事件。所以，当你需要使用事件时，请从&nbsp;yii\\base\\Component&nbsp;进行继承。同时，Yii中还有一个与事件紧密相关的&nbsp;yii\\base\\Event&nbsp;，他封装了与事件相关的有关数据，并提供一些功能函数作为辅助:</p><table><tbody><tr><td><pre> 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25 26 27 28 29 30 31 32 33 34</pre></td><td><pre>class Event extends Object\r\n{    public $name;               // 事件名    public $sender;             // 事件发布者，通常是调用了 trigger() 的对象或类。    public $handled = false;    // 是否终止事件的后续处理    public $data;               // 事件相关数据\r\n    private static $_events = [];\r\n    public static function on($class, $name, $handler, $data = null,        $append = true)    {        // ... ...        // 用于绑定事件handler    }\r\n    public static function off($class, $name, $handler = null)    {        // ... ...        // 用于取消事件handler绑定    }\r\n    public static function hasHandlers($class, $name)    {        // ... ...        // 用于判断是否有相应的handler与事件对应    }\r\n    public static function trigger($class, $name, $event = null)    {        // ... ...        // 用于触发事件    }\r\n}</pre></td></tr></tbody></table><h2>事件handler<a href=\"http://www.digpage.com/event.html#handler\" title=\"Permalink to this headline\"></a></h2><p>所谓事件handler就是事件处理程序，负责事件触发后怎么办的问题。从本质上来讲，一个事件handler就是一段PHP代码，即一个PHP函数。对于一个事件handler，可以是以下的形式提供：</p><ul><li>一个PHP全局函数的函数名，不带参数和括号，光秃秃的就一个函数名。如&nbsp;trim&nbsp;，注意，不是&nbsp;trim($str)&nbsp;也不是&nbsp;trim()&nbsp;。</li><li>一个对象的方法，或一个类的静态方法。如&nbsp;$person-&gt;sayHello()&nbsp;可以用为事件handler，但要改写成以数组的形式，&nbsp;[$person,&nbsp;&#39;sayHello&#39;]&nbsp;，而如果是类的静态方法，那应该是&nbsp;[&#39;namespace\\to\\Person&#39;,&nbsp;&#39;sayHello&#39;]&nbsp;。</li><li>匿名函数。如&nbsp;function&nbsp;($event)&nbsp;{&nbsp;...&nbsp;}</li></ul><p>但无论是何种方式提供，一个事件handler必须具有以下形式:</p><pre>function ($event) {    // $event 就是前面提到的 yii\\base\\Event\r\n}</pre><p>也就是只有长得像上面这样的，才可以作为事件handler。</p><p>还有一点容易犯错的地方，就是对于类自己的成员函数，尽管在调用&nbsp;on()&nbsp;进行绑定时，看着这个handler是有效的，因此，有的小伙伴就写成这样了&nbsp;$this-&gt;on(EVENT_A,&nbsp;&#39;publicMethod&#39;)&nbsp;，但事实上，这是一个错误的写法。以字符串的形式提供handler，只能是PHP的全局函数。这是由于handler的调用是通过&nbsp;call_user_func()&nbsp;来实现的。因此，handler的形式，与&nbsp;call_user_func()&nbsp;的要求是一致的。这将在&nbsp;<a href=\"http://www.digpage.com/event.html#id6\">事件的触发</a> 中介绍。</p><h2>事件的绑定与解除<a href=\"http://www.digpage.com/event.html#id2\" title=\"Permalink to this headline\"></a></h2><h3>事件的绑定<a href=\"http://www.digpage.com/event.html#id3\" title=\"Permalink to this headline\"></a></h3><p>有了事件handler，还要告诉Yii，这个handler是负责处理哪种事件的。这个过程，就是事件的绑定， 把事件和事件handler这两个蚂蚱绑在一根绳上，当事件跳起来的时候，就会扯动事件handler啦。</p><p>yii\\base\\Component::on()&nbsp;就是用来绑定的，很容易就猜到，&nbsp;yii\\base\\Component::off()&nbsp;就是用来解除的。对于绑定，有以下形式:</p><table><tbody><tr><td><pre> 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15</pre></td><td><pre>$person = new Person;\r\n\r\n// 使用PHP全局函数作为handler来进行绑定\r\n$person-&gt;on(Person::EVENT_GREET, &#39;person_say_hello&#39;);\r\n\r\n// 使用对象$obj的成员函数say_hello来进行绑定\r\n$person-&gt;on(Person::EVENT_GREET, [$obj, &#39;say_hello&#39;]);\r\n\r\n// 使用类Greet的静态成员函数say_hello进行绑定\r\n$person-&gt;on(Person::EVENT_GREET, [&#39;app\\helper\\Greet&#39;, &#39;say_hello&#39;]);\r\n\r\n// 使用匿名函数\r\n$person-&gt;on(Person::EVENT_GREET, function ($event) {    echo &#39;Hello&#39;;\r\n});</pre></td></tr></tbody></table><p>事件的绑定可以像上面这样在运行时以代码的形式进行绑定，也可以在配置中进行绑定。 当然，这个配置生效的过程其实也是在运行时的。原理可以参见&nbsp;<a href=\"http://www.digpage.com/configuration.html#configuration\"><em>配置项（Configuration）</em></a> 部分的内容。</p><p>上面的例子只是简单的绑定了事件与事件handler，如果有额外的数据传递给handler，可以使用&nbsp;yii\\base\\Component::on()&nbsp;的第三个参数。这个参数将会写进&nbsp;Event&nbsp;的相关数据字段，即属性&nbsp;data&nbsp;。如:</p><table><tbody><tr><td><pre>1 2\r\n3 4\r\n5 6\r\n7</pre></td><td><pre>$person-&gt;on(Person::EVENT_GREET, &#39;person_say_hello&#39;, &#39;Hello World!&#39;);\r\n\r\n// &#39;Hello World!&#39; 可以通过 $event访问。\r\nfunction person_say_hello($event)\r\n{    echo $event-&gt;data;                // 将显示 Hello World!\r\n}</pre></td></tr></tbody></table><p>yii\\base\\Component&nbsp;维护了一个handler数组，用来保存绑定的handler:</p><table><tbody><tr><td><pre> 1 2 3 4 5 6 7 8 9 10 11 12 13</pre></td><td><pre>// 这个就是handler数组\r\nprivate _events = [];\r\n\r\n// 绑定过程就是将handler写入_event[]\r\npublic function on($name, $handler, $data = null, $append = true)\r\n{    $this-&gt;ensureBehaviors();    if ($append || empty($this-&gt;_events[$name])) {        $this-&gt;_events[$name][] = [$handler, $data];    } else {        array_unshift($this-&gt;_events[$name], [$handler, $data]);    }\r\n}</pre></td></tr></tbody></table><h3>保存handler的数据结构<a href=\"http://www.digpage.com/event.html#id4\" title=\"Permalink to this headline\"></a></h3><p>从上面代码我们可以了解两个方向的内容，一是&nbsp;$_event[]&nbsp;的数据结构，二是绑定handler的逻辑。</p><p>从handler数组&nbsp;$_evnet[]&nbsp;的结构看，首先他是一个数组，保存了该Component的所有事件handler。 该数组的下标为事件名，数组元素是形为一系列&nbsp;[$handler,&nbsp;$data]&nbsp;的数组，如&nbsp;<a href=\"http://www.digpage.com/event.html#img-event\"><em>$_event[]数组的数据结构示意图</em></a> 所示。</p><p><img data-fr-image-pasted=\"true\" alt=\"$_event[]数组的数据结构示意图\" src=\"http://www.digpage.com/_images/event.png\" data-bd-imgshare-binded=\"1\" class=\"fr-fic fr-dii\"></p><p>$_event[]数组的数据结构示意图</p><p>在事件的绑定逻辑上，按照以下顺序：</p><ul><li>参数&nbsp;$append&nbsp;是否为&nbsp;true&nbsp;。为&nbsp;true&nbsp;表示所要绑定的事件handler要放在&nbsp;$_event[]&nbsp;数组的最后面。这也是默认的绑定方式。</li><li>参数&nbsp;$append&nbsp;是否为&nbsp;false&nbsp;。表示handler要放在数组的最前面。这个时候，要多进行一次判定。</li><li>如果所有绑定的事件还没有已经绑定好的handler，也就是说，将要绑定的handler是第一个，那么无论&nbsp;$append&nbsp;是否是&nbsp;true&nbsp;，该handler必然是第一个元素，也是最后一个元素。</li><li>如果&nbsp;$append&nbsp;为&nbsp;false&nbsp;，且要绑定的事件已经有了handler，那么，就将新绑定的事件插入到数组的最前面。</li></ul><p>handler在&nbsp;$event[]&nbsp;数组中的位置很重要，代表的是执行的先后顺序。这个在&nbsp;<a href=\"http://www.digpage.com/event.html#id7\">多个事件handler的顺序</a> 中会讲到。</p><h3>事件的解除<a href=\"http://www.digpage.com/event.html#id5\" title=\"Permalink to this headline\"></a></h3><p>在解除时，就是使用&nbsp;unset()&nbsp;函数，处理&nbsp;$_event[]&nbsp;数组的相应元素。&nbsp;yii\\base\\Component::off()&nbsp;如下所示:</p><table><tbody><tr><td><pre> 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25 26 27</pre></td><td><pre>public function off($name, $handler = null)\r\n{    $this-&gt;ensureBehaviors();    if (empty($this-&gt;_events[$name])) {        return false;    }\r\n    // $handler === null 时解除所有的handler    if ($handler === null) {        unset($this-&gt;_events[$name]);        return true;    } else {        $removed = false;\r\n        // 遍历所有的 $handler        foreach ($this-&gt;_events[$name] as $i =&gt; $event) {            if ($event[0] === $handler) {                unset($this-&gt;_events[$name][$i]);                $removed = true;            }        }        if ($removed) {            $this-&gt;_events[$name] = array_values($this-&gt;_events[$name]);        }        return $removed;    }\r\n}</pre></td></tr></tbody></table><p>要留意以下几点：</p><ul><li>当&nbsp;$handler&nbsp;为&nbsp;null&nbsp;时，表示解除&nbsp;$name&nbsp;事件的所有handler。</li><li>在解除&nbsp;$handler&nbsp;时，将会解除所有的这个事件下的&nbsp;$handler&nbsp;。虽然一个handler多次绑定在同一事件上的情况不多见，但这并不是没有，也不是没有意义的事情。在特定的情况下，确实有一个handler多次绑定在同一事件上。因此在解除时，所有的&nbsp;$handler&nbsp;都会被解除。而且没有办法只解除其中的一两个。</li></ul><h2>事件的触发<a href=\"http://www.digpage.com/event.html#id6\" title=\"Permalink to this headline\"></a></h2><p>事件的处理程序handler有了，事件与事件handler关联好了，那么只要事件触发了，handler就会按照设计的路子走。事件的触发，需要调用&nbsp;yii\\base\\Component::trigger()</p><table><tbody><tr><td><pre> 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25 26 27 28 29</pre></td><td><pre>public function trigger($name, Event $event = null)\r\n{    $this-&gt;ensureBehaviors();    if (!empty($this-&gt;_events[$name])) {        if ($event === null) {            $event = new Event;        }        if ($event-&gt;sender === null) {            $event-&gt;sender = $this;        }        $event-&gt;handled = false;        $event-&gt;name = $name;\r\n        // 遍历handler数组，并依次调用        foreach ($this-&gt;_events[$name] as $handler) {            $event-&gt;data = $handler[1];\r\n            // 使用PHP的call_user_func调用handler            call_user_func($handler[0], $event);\r\n            // 如果在某一handler中，将$evnet-&gt;handled 设为true，            // 就不再调用后续的handler            if ($event-&gt;handled) {                return;            }        }    }    Event::trigger($this, $name, $event);   // 触发类一级的事件\r\n}</pre></td></tr></tbody></table><p>以&nbsp;yii\\base\\Application&nbsp;为例，他定义了两个事件，&nbsp;EVENT_BEFORE_REQUEST&nbsp;EVENT_AFTER_REQUEST&nbsp;分别在处理请求的前后触发:</p><table><tbody><tr><td><pre> 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25 26 27 28 29 30 31 32 33 34 35 36 37 38 39 40</pre></td><td><pre>abstract class Application extends Module\r\n{    // 定义了两个事件    const EVENT_BEFORE_REQUEST = &#39;beforeRequest&#39;;    const EVENT_AFTER_REQUEST = &#39;afterRequest&#39;;\r\n    public function run()    {        try {\r\n            $this-&gt;state = self::STATE_BEFORE_REQUEST;\r\n            // 先触发EVENT_BEFORE_REQUEST            $this-&gt;trigger(self::EVENT_BEFORE_REQUEST);\r\n            $this-&gt;state = self::STATE_HANDLING_REQUEST;\r\n            // 处理Request            $response = $this-&gt;handleRequest($this-&gt;getRequest());\r\n            $this-&gt;state = self::STATE_AFTER_REQUEST;\r\n            // 处理完毕后触发EVENT_AFTER_REQUEST            $this-&gt;trigger(self::EVENT_AFTER_REQUEST);\r\n            $this-&gt;state = self::STATE_SENDING_RESPONSE;            $response-&gt;send();\r\n            $this-&gt;state = self::STATE_END;\r\n            return $response-&gt;exitStatus;\r\n        } catch (ExitException $e) {\r\n            $this-&gt;end($e-&gt;statusCode, isset($response) ? $response : null);            return $e-&gt;statusCode;\r\n        }    }\r\n}</pre></td></tr></tbody></table><p>上面的代码，不用全部去读懂。只要注意是怎么定义事件，怎么触发事件的就可以了。</p><p>对于事件的定义，提倡使用const 常量的形式，可以避免写错。&nbsp;trigger(&#39;Hello&#39;)&nbsp;和&nbsp;trigger(&#39;hello&#39;)&nbsp;可是不同的事件哦。原因在于handler数组下标，就是事件名。 而PHP里数组下标是区分大小写的。所以，用类常量的方式，可以避免这种头疼的问题。</p><p>在触发事件时，可以把与事件相关的数据传递给所有的handler。比如，发布新微博事件:</p><table><tbody><tr><td><pre> 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15</pre></td><td><pre>// 定义事件的关联数据\r\nclass MsgEvent extend yii\\base\\Event\r\n{    public $dateTime;   // 微博发出的时间    public $author;     // 微博的作者    public $content;    // 微博的内容\r\n}\r\n\r\n// 在发布新的微博时，准备好要传递给handler的数据\r\n$event = new MsgEvent;\r\n$event-&gt;title = $title;\r\n$event-&gt;author = $auhtor;\r\n\r\n// 触发事件\r\n$msg-&gt;trigger(Msg::EVENT_NEW_MESSAGE, $event);</pre></td></tr></tbody></table><p>注意这里数据的传入，与使用&nbsp;on()&nbsp;绑定handler时传入数据方法的不同。在&nbsp;on()&nbsp;中，使用一个简单变量，传入，并在handler中通过&nbsp;$event-&gt;data&nbsp;进行访问。这个是在绑定时确定的数据。而有的数据是没办法在绑定时确定的，如发出微博的时间。这个时候，就需要在触发事件时提供其他的数据了。也就是上面这段代码使用的方法了。这两种方法，一种用于提供绑定时的相关数据，一种用于提供事件触发时的数据，各有所长，互相补充。你可要一碗水端平，不要厚此薄彼了。</p><h2>多个事件handler的顺序<a href=\"http://www.digpage.com/event.html#id7\" title=\"Permalink to this headline\"></a></h2><p>使用&nbsp;yii\\base\\Component::on()&nbsp;可以为各种事件绑定handler，也可以为同一事件绑定多个handler。假如，你是微博系统的技术人员，刚开始的时候，你指定新发微博的事件handler就是通知关注者有新的内容发布了。现在，你不光要保留这个功能，你还要通知微博中@到的所有人。这个时候，一种做法是直接在原来的handler末尾加上新的代码，以处理这个新的需要。另一个方法，就是再写一个handler，并绑定到这个事件上。从易于维护的角度来讲，第二种方法是比较合理的。前一种方法由于修改了原来正常使用的代码，可能会影响原来的正常功能。同时，如果一直有新的需求，那么很快这个handler就会变得很杂，很大。所以，建议使用第二种方法。</p><p>Yii中是支持这种一对多的绑定的。那么，在一个事件触发时，哪个handler会被先执行呢？各handler之间总有一个先后问题吧。这个可能不同的编程语言、不同的框架有不同的实现方式。有的语言是以堆栈的形式来保存handler，可能会以后绑定上去的事件先执行的方式运作。这种方式的好处是编码的人权限大些，可以对事件进行更改、拦截、中止，移花接木、偷天换日、无中生有，各种欺骗后面的handler。而Yii是使用数组来保存handler的，并按顺序执行这些handler。这意味着一般框架上预设的handler会先执行。但是不要以为Yii的事件handler就没办法偷天换日了，要使后加上的事件handler先运行，只需在调用&nbsp;yii\\base\\Component::on()&nbsp;进行绑定时，将第四个参数设为&nbsp;$append&nbsp;设为&nbsp;false&nbsp;那么这个handler就会被放在数组的最前面了，它就会被最先执行，它也就有可能欺骗后面的handler了。</p><p>为了加强安全生产，国家安监局对某个煤矿进行监管，一旦发生矿难，他们会收到报警，这就是一个事件和一个handler:</p><table><tbody><tr><td><pre> 1 2 3 4 5 6 7 8 9 10 11</pre></td><td><pre>$coal-&gt;on(Coal::EVENT_DISASTER, [$government, &#39;onDisaster&#39;]);\r\n\r\nclass Government extend yii\\base\\Component\r\n{    ... ...\r\n    public function onDisaster($event)    {        echo &#39;DISASTER! from &#39; . $event-&gt;sender;    }\r\n}</pre></td></tr></tbody></table><p>由于煤矿自身也要进行管理，所以，政府允许煤矿可以编写自己的handler对矿难进行处理。 但是，这个小煤窑的老板，你有张良计，我有过墙梯，对于发生矿难这一事件编写了一个handler专门用于瞒报:</p><table><tbody><tr><td><pre> 1 2 3 4 5 6 7 8 9 10 11 12 13</pre></td><td><pre>// 第四个参数设为false，使得该handler在整个handler数组中处于第一个\r\n$coal-&gt;on(Coal::EVENT_DISASTER, [$baddy, &#39;onDisaster&#39;], null, false);\r\n\r\ncalss Baddy extend yii\\base\\Component\r\n{    ... ...\r\n    public function onDisaster($event)    {        // 将事件标记为已经处理完毕，阻止后续事件handler介入。        $event-&gt;handled = true;    }\r\n}</pre></td></tr></tbody></table><p>坏人不可怕，会编程的坏人才可怕。我们要阻止他，所以要把绑定好的handler解除。这个解除是绑定的逆向过程，在实质上，就是把对应的handler从handler数组中删除。使用&nbsp;yii\\base\\Component::off()&nbsp;就能删除:</p><table><tbody><tr><td><pre> 1 2 3 4 5 6 7 8 9 10 11 12 13 14</pre></td><td><pre>// 删除所有EVENT_DISASTER事件的handler\r\n$coal-&gt;off(Coal::EVENT_DISASTER);\r\n\r\n// 删除一个PHP全局函数的handler\r\n$coal-&gt;off(Coal::EVENT_DISASTER, &#39;global_onDisaster&#39;);\r\n\r\n// 删除一个对象的成员函数的handler\r\n$coal-&gt;off(Coal::EVENT_DISASTER, [$baddy, &#39;onDisaster&#39;]);\r\n\r\n// 删除一个类的静态成员函数的handler\r\n$coal-&gt;off(Coal::EVENT_DISASTER, [&#39;path\\to\\Baddy&#39;, &#39;static_onDisaster&#39;]);\r\n\r\n// 删除一个匿名函数的handler\r\n$coal-&gt;off(Coal::EVENT_DISASTER, $anonymousFunction);</pre></td></tr></tbody></table>', '1', '2', '1', '0', 'dasd', 'dad', 'dad', '1536718630', '1537926397');
INSERT INTO `wit_article` VALUES ('46', '其请求无', '3', '戚薇戚薇戚薇', 'qwrqweqwe', '<p>戚薇戚薇戚薇</p>', '1', '3', '1', '0', 'dasd', '绕弯儿', 'werwer', '1537146094', '1537339778');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='文章分类表';

-- ----------------------------
-- Records of wit_article_category
-- ----------------------------
INSERT INTO `wit_article_category` VALUES ('1', '0', 'php', 'php', '0', 'www', '1468293958', '0');
INSERT INTO `wit_article_category` VALUES ('2', '0', 'mysql', 'mysql', '3', '1313', '1468293965', '1537340502');
INSERT INTO `wit_article_category` VALUES ('3', '0', 'javascript', 'javascript', '0', '', '1468293974', '1533621262');
INSERT INTO `wit_article_category` VALUES ('4', '2', 'mysql优化', 'mysql优化', '1', '', '1537340518', '1537340518');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='文章标签表';

-- ----------------------------
-- Records of wit_article_tag
-- ----------------------------
INSERT INTO `wit_article_tag` VALUES ('1', 'php', 'php', '0', 'www', '1468293958', '1468293958');
INSERT INTO `wit_article_tag` VALUES ('2', 'java', 'java', '3', '1313', '1468293965', '1533621214');
INSERT INTO `wit_article_tag` VALUES ('3', 'javascript', 'javascript', '0', '', '1468293974', '1533621262');
INSERT INTO `wit_article_tag` VALUES ('4', '3543', '5345', '3', '4534543', '1536893860', '1536893860');
INSERT INTO `wit_article_tag` VALUES ('5', '3543', '5345', '3', '4534543', '1536893891', '1536893891');
INSERT INTO `wit_article_tag` VALUES ('6', '1', '1', '0', '', '1537145042', '1537145042');
INSERT INTO `wit_article_tag` VALUES ('7', '2', '2', '0', '', '1537145042', '1537145042');
INSERT INTO `wit_article_tag` VALUES ('8', '3', '3', '0', '', '1537145042', '1537145042');
INSERT INTO `wit_article_tag` VALUES ('9', '37', '37', '0', '', '1537145049', '1537145049');
INSERT INTO `wit_article_tag` VALUES ('10', '嗯嗯嗯', '嗯嗯嗯', '0', '', '1537146094', '1537146094');
INSERT INTO `wit_article_tag` VALUES ('11', '456456', '456456', '0', '', '1537341502', '1537341502');

-- ----------------------------
-- Table structure for wit_article_tag_relation
-- ----------------------------
DROP TABLE IF EXISTS `wit_article_tag_relation`;
CREATE TABLE `wit_article_tag_relation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `article_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文章id',
  `tag_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '标签id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COMMENT='文章标签映射表';

-- ----------------------------
-- Records of wit_article_tag_relation
-- ----------------------------
INSERT INTO `wit_article_tag_relation` VALUES ('35', '44', '6');
INSERT INTO `wit_article_tag_relation` VALUES ('36', '44', '7');
INSERT INTO `wit_article_tag_relation` VALUES ('37', '44', '9');
INSERT INTO `wit_article_tag_relation` VALUES ('38', '46', '10');
INSERT INTO `wit_article_tag_relation` VALUES ('41', '45', '11');

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
INSERT INTO `wit_auth_item` VALUES ('超级管理员', '1', '拥有所有权限', null, null, '1521783127', '1522054534');

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
INSERT INTO `wit_config` VALUES ('1', 'WEB_SITE_TITLE', '网站标题', 'basic', '1', '内容管理框架', '', '网站标题前台显示标题', '0', '1', '1378898976', '1538272395');
INSERT INTO `wit_config` VALUES ('2', 'WEB_SITE_DESCRIPTION', '网站描述', 'basic', '2', '内容管理框架', '', '网站搜索引擎描述', '1', '1', '1378898976', '1538272395');
INSERT INTO `wit_config` VALUES ('3', 'WEB_SITE_KEYWORD', '网站关键字', 'basic', '2', 'WitCMS', '', '网站搜索引擎关键字', '8', '1', '1378898976', '1538272395');
INSERT INTO `wit_config` VALUES ('4', 'WEB_SITE_CLOSE', '关闭站点', 'basic', '4', '1', '0:关闭,1:开启', '站点关闭后其他用户不能访问，管理员可以正常访问', '1', '0', '1378898976', '1463024280');
INSERT INTO `wit_config` VALUES ('10', 'WEB_SITE_ICP', '网站备案号', 'basic', '1', '沪ICP备12007941号-2', '', '设置在网站底部显示的备案号，如“沪ICP备12007941号-2', '9', '1', '1378900335', '1538272395');
INSERT INTO `wit_config` VALUES ('11', 'DATA_BACKUP_PATH', '数据库备份路径', 'basic', '1', '/storage/web/database/', '', '路径必须以 / 结尾', '3', '1', '1379053380', '1476448404');

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
INSERT INTO `wit_friend_link` VALUES ('2', '谷歌', '', 'https://www.google.com', '_blank', '0', '1', '222', '1537929017');

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
  `created_at` int(10) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(10) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='菜单表';

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
INSERT INTO `wit_menu` VALUES ('13', '首页', '0', 'article/index', 'fa fa-map', '1', '0', '0', '0', '1533193393', '1537845876');
INSERT INTO `wit_menu` VALUES ('14', '文章分类', '5', 'article-category/index', 'fa fa-folder-open', '0', '0', '1', '0', '1533611643', '1536892649');
INSERT INTO `wit_menu` VALUES ('15', 'PHP', '0', 'article/index', '', '1', '0', '1', '0', '1536568679', '1536568679');
INSERT INTO `wit_menu` VALUES ('16', 'PHP知识', '15', 'article/index', '', '1', '0', '1', '0', '1536568723', '1536568723');
INSERT INTO `wit_menu` VALUES ('17', '文章标签', '5', 'article-tag/index', 'fa fa-tags', '0', '0', '1', '0', '1536892002', '1536892658');
INSERT INTO `wit_menu` VALUES ('18', '系统设置', '0', '#', 'fa fa-cog', '0', '1', '1', '0', '1538277338', '1538978628');
INSERT INTO `wit_menu` VALUES ('19', '配置管理', '18', 'config/index', 'fa fa-wrench', '0', '0', '1', '0', '1538277546', '1538278620');
INSERT INTO `wit_menu` VALUES ('20', '网站设置', '18', 'config/index', 'fa fa-clipboard', '0', '0', '0', '0', '1538277583', '1538287661');

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
