# About This Demo

    哈哈哈，当然不是我这种初涉前端的菜鸟级选手能“啪”出来的啦==、
    项目来源：http://www.imooc.com/learn/148
    没错，跟着大神“啪”！加深对php的理解。面向过程，无处不在的封装思想。
    后台php语言到学一些地方可能会卡住，但是不要灰心，
    理清思路很关键！ 欢迎依旧在路上的同胞们pull或者clone，另外你你你的star，嘿嘿嘿~
    我的慕课账号： http://www.imooc.com/u/3606069  
    
# 更新记录 

> ### ds_demo_v1.0 : 2016/11/20 

- 完成主要前台页面的编写

> ### ds_demo_v2.0 : 2016/11/22 

- 后台初步搭建，实现后台管理员管理模块的功能(发现重大bug，`已移除`)。

> ### de_demo_v2.1 : 2016/11/23 

- 完成了`管理员管理`模块和`商品分类`模块的`添加`、`修改`和`删除`操作，去除目前为止所有php文件中的一些无用代码。

- 更新`shop.sql`文件，添加一个默认管理员账户，user->admin;password->admin，修复一些并不影响执行的错误。

- 修复`mysql.func.php`中数据库更新操作函数中的错误，顺带些许代码优化。

>### de_demo_v2.2 : 2016/11/24 

- 更新`shop.sql`文件。

- 修正函数库`lib`文件夹下`mysql.func.php`文件中的`insert()`方法，抛弃`getInsertId()`方法。

- 引入最新`KindEditor 4.1.1`网页文档编辑器插件。

- 完成`商品管理`模块所有功能。

- 为后台页面控制条中的`首页`和`刷新`添加实际功能。

>### de_demo_v2.3 : 2016/11/25

- `(创新)`更新`shop.sql`文件。为管理员表添加了`supAdmin`字段，区分超级管理员和普通管理员。

- `(创新)`为`管理员管理`模块添加一层判断逻辑，只有超级管理员才有权限对管理员数据库进行增、删、改。

- 更新`mysql.func.php`,修复当商品列表为空时`fetchAll()`方法提示`Notice: Undefined variable: rows in...`

- 加`@`前缀忽略性解决：`Notice: Trying to get property of non-object in...`等几个类似错误。

- 对所有php页面的检查优化。

>### de_demo_v2.4 : 2016/11/27

- 这次更新已经脱离视频教程，使用前端技术完成前台部分。

- 更新`shop.sql`文件。简化了`shop_user`表，仅保留`id`,`username`,`password`和`email`。

- `(创新)`使用jquery实现异步提交注册信息，`sign_in.js`中被注释搁置，文件`data/user_register.php`接收并处理请求。

- `(创新)`使用原生AJAX实现异步的POST提交注册信息，默认使用，文件`data/user_register_ys_ajax.php`接收并处理请求。

- `(创新)`对用户输入的各项表单添加简单的验证规则(仅添加了位数验证规则，并没有加入正则进行内容验证)。

- `(创新)`为`用户名`输入框添加原生AJAX发起异步get请求，验证是否重名。

- 又消灭掉两个`Notice`...

- 已知`bug`，在中文输入法下填写`用户名`输入框，当在没有确认输入汉子的情况下使输入框失去焦点浏览器弹出警告`未知的响应数据`。

- 上述`bug`已解决！`错误原因`：在`用户名`输入框中使用中文输入法，没有确认选择文字，而直接使输入框失去焦点时，会提交类似这样的数据：`a's'd'f`，注意其中的`'`，没错，就是单引号引起的错误，最可恨的是这还是英文单引号！直接导致sql查询语句错误！
  `解决办法`：加入正则！(骚年，忘记偷懒这个词吧...)在`data/check_name.php`中加入正则判断逻辑，接收到数据后先进行正则匹配，不匹配终止查询操作并返回给客户端信息，匹配才进行数据库查询是否重名的操作。


`未完待续...`

# 开发环境
    windows 10 专业版 x64
    
    Webstorm 2016.2.3(64)
    
    Phpstorm 2016.2.2(64)
    
    XAMPP 集成软件
    
# 开发过程中遇到的问题

## 关于sql文件的编写

我并没有完全按照老师的方法编写sql文件，但是要保证数据库表结构不能变。

## 对数据库操作的一些问题

因为视频录制时间较早，我对函数库 lib 文件夹下的 mysql.func.php 文件中封装的对数据库的一系列操作函数进行了更新，功能不变，但依然有改进空间。

# 后期展望

king老师的这个教程是php全栈开发，毕竟还是学前端的，计划到前端使用AJAX,JSON等前段必备技能完成与后台的交互。

# 最后

动动小手，star到手==、
