# About This Demo

    哈哈哈，当然不是我这种前端小司机能“啪”出来的啦==、
    项目来源：http://www.imooc.com/learn/148
    没错，跟着大神“啪”！加深对php的理解。面向过程，无处不在的封装思想。
    后台php语言到学一些地方可能会卡住，但是不要灰心，
    理清思路很关键！ 欢迎依旧在路上的同胞们pull或者clone，另外你你你的star，嘿嘿嘿~
    教程属于整站PHP开发，使用PHP完成后台主要功能以后，脱离教程，独立使用前端技术完成前台部分的开发。
    我的慕课账号： http://www.imooc.com/u/3606069  

# 开发环境
    
    windows 10 专业版 x64
    
    Webstorm 2016.2.3(64)
    
    Phpstorm 2016.3(64)
    
    XAMPP 集成软件
    
# 更新记录 

> ### ds_demo_v1.0 : 2016/11/20 

- 完成主要前台页面的编写

> ### ds_demo_v2.0 : 2016/11/22 

- 后台初步搭建，实现后台管理员管理模块的功能(发现重大bug，`已移除`)。

> ### ds_demo_v2.1 : 2016/11/23 

- 完成了`管理员管理`模块和`商品分类`模块的`添加`、`修改`和`删除`操作，去除目前为止所有php文件中的一些无用代码。

- 更新`shop.sql`文件，添加一个默认管理员账户，`user`->`admin`;`password`->`admin`，修复一些并不影响执行的错误。

- 修复`mysql.func.php`中数据库更新操作函数中的错误，顺带些许代码优化。

>### ds_demo_v2.2 : 2016/11/24 

- 更新`shop.sql`文件。

- 修正函数库`lib`文件夹下`mysql.func.php`文件中的`insert()`方法，抛弃`getInsertId()`方法。

- 引入最新`KindEditor 4.1.1`网页文档编辑器插件。

- 完成`商品管理`模块所有功能。

- 为后台页面控制条中的`首页`和`刷新`添加实际功能。

>### ds_demo_v2.3 : 2016/11/25

- `(创新)`更新`shop.sql`文件。为管理员表添加了`supAdmin`字段，区分超级管理员和普通管理员。

- `(创新)`为`管理员管理`模块添加一层判断逻辑，只有超级管理员才有权限对管理员数据库进行增、删、改。

- 更新`mysql.func.php`,修复当商品列表为空时`fetchAll()`方法提示`Notice: Undefined variable: rows in...`

- 加`@`前缀忽略性解决：`Notice: Trying to get property of non-object in...`等几个类似错误。

- 对所有php页面的检查优化。

>### ds_demo_v2.4 : 2016/11/27

- 这次更新已经脱离视频教程，使用前端技术完成前台部分。

- 更新`shop.sql`文件。简化了`shop_user`表，仅保留`id`,`username`,`password`和`email`。

- `(创新)`使用jquery实现异步提交注册信息，`js/sign_in.js`中被注释搁置，文件`data/user_register_jq_ajax.php`接收信息并返回`json字符串`。

- `(创新)`使用原生AJAX实现异步的POST提交注册信息，文件`data/user_register_ys_ajax.php`接收信息并返回`text字符串`。

- `(创新)`对用户输入的各项表单添加简单的验证规则(仅添加了位数验证规则，并没有加入正则进行内容验证)。

- `(创新)`为`用户名`输入框添加原生AJAX发起异步get请求，验证是否重名。

- 又消灭掉两个`Notice`...

- 已知`bug`：在中文输入法下填写`用户名`输入框，当在没有确认输入汉子的情况下使输入框失去焦点浏览器弹出警告`未知的响应数据`。

- 上述`bug`已解决！`错误原因`：在`用户名`输入框中使用中文输入法，没有确认选择文字，而直接使输入框失去焦点时，会提交类似这样的数据：`a's'd'f`，注意其中的`'`，没错，就是单引号引起的错误，最可恨的是这还是英文单引号！直接导致sql查询语句错误！
  `解决办法`：加入正则！(骚年，忘记偷懒这个词吧...)在`data/check_name.php`中加入正则判断逻辑，接收到数据后先进行正则匹配，不匹配终止查询操作并返回给客户端信息，匹配才进行数据库查询是否重名的操作，此方法同样防止了`' or 1=1 #`这样的`sql注入漏洞`。
  
>### ds_demo_v2.5 : 2016/11/28

- `(创新)`使用jquery实现异步提交登录信息，`js/login.js`中被注释搁置，文件`data/user_login_jq_ajax.php`接收信息并返回`text字符串`。

- `(创新)`使用原生AJAX实现异步提交登录信息，文件`data/user_login_ys_ajax.php`接收信息并返回`json字符串`。前台处理返回信息时，注意需要将`json字符串`使用`eval('('+jsonData+')')`方法转换为`json对象`。

- `(创新)`用户登录成功后，自动跳转到商城首页，右上角显示当前登录的用户名称。

- `(创新)`为登录页中的`自动登录`添加实际功能。功能描述：当用户`不勾选`自动登录时，将登录的用户名保存在`sessionStorage['loginName']`中，当用户`勾选`了自动登录时，将登录的用户名保存在`localStorage['loginName']`中，当用户点击退出按钮时，同时清空这两个值。

- `更新`已知`bug`：在登陆时提交类似这样的数据：`a's'd'f`会报语法错误，依然是其中的英文单引号捣的鬼，`解决`：加入正则验证。

- `更新`已知`bug`：使用正确的用户名和密码进行登录，登录名大小写都能成功登录。`解决`：更新`shop.sql`文件，为`管理员表`和`用户表`中的`username`添加`BINARY`属性，使查询操作区分大小写。

>### ds_demo_v2.6 : 2016/11/28

- 实现后台对用户账户的管理(增、删、改)。

- 为后台登录信息处理文件`admin/doLogin.php`中接收到的用户名，添加`$username = addslashes($username);`，防止`sql注入漏洞`。

- `更新`：在`ds_demo_v2.5`中使用了`eval('('+jsonData+')')`方法将json字符串转换为`json对象`，但是，eval在解析字符串时，会执行该字符串中的代码（这样的后果是相当恶劣的），所以，在代码中使用eval是很危险的，特别是用它执行第三方的JSON数据时（其中可能包含恶意代码），因此，改为使用JSON.parse()方法解析json字符串，该方法可以捕捉JSON中的语法错误，并允许你传入一个函数，用来过滤或转换解析结果。 

`未完待续...`
    
# 开发过程中遇到的问题

## 关于sql文件的编写

我并没有完全按照老师的方法编写sql文件，但是要保证数据库表结构不能变。

## 对数据库操作的一些问题

因为视频录制时间较早，我对函数库 lib 文件夹下的 mysql.func.php 文件中封装的对数据库的一系列操作函数进行了更新，功能不变，但依然有改进空间。

# 后期展望

king老师的这个教程是php全栈开发，毕竟还是学前端的，计划到前端使用AJAX,JSON等前段必备技能完成与后台的交互。

# 最后

动动小手，star到手==、
