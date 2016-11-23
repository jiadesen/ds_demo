# About This Demo

    哈哈哈，当然不是我这种初涉前端的菜鸟级选手能“啪”出来的啦==、
    
    项目来源：http://www.imooc.com/learn/148
    
    没错，跟着大神“啪”！加深对php的理解，无处不在的封装思想。
    
    后台php语言到学一些地方可能会卡住，但是不要灰心，理清思路很关键！
    
    欢迎依旧在路上的同胞们pull或者clone，另外你你你的star，嘿嘿嘿~ 
    
    我的慕课账号：http://www.imooc.com/u/3606069
    
# 更新记录 

> ### ds_demo_v1.0 : 2016/11/22 

- 后台初步搭建，实现后台管理员管理模块的功能(发现重大bug，`已移除`)。

> ### de_demo_v1.1 : 2016/11/23 

- 完成了`管理员管理`模块和`商品分类`模块的`添加`、`修改`和`删除`操作，去除目前为止所有php文件中的一些无用代码。

- 更新`shop.sql`文件，添加一个默认管理员账户，user->admin;password->admin，修复一些并不影响执行的错误(但是在 localhost/phpmyadmin 中执行sql语句，数据表中存在 password 的位置依然有错误提示，将所有的 password 改为 pwd 或其它形式的简写错误提示消失)。

- 修复 mysql.func.php 中数据库更新操作函数中的错误，顺带些许代码优化。

>### de_demo_v1.3 : 2016/11/24 

- 更新`shop.sql`文件。

- 修正函数库`lib`文件夹下`mysql.func.php`文件中的`insert()`方法，抛弃`getInsertId()`方法。

- 引入最新`KindEditor 4.1.1`网页文档编辑器插件。

- 完成`商品管理`模块所有功能。

- 为后台页面控制条中的`首页`和`刷新`添加实际功能。


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
