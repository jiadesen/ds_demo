SET NAMES UTF8;
DROP DATABASE IF EXISTS shop;
/*CREATE DATABASE IF NOT EXISTS shop;*/
CREATE DATABASE shop
  CHARSET = UTF8;
USE shop;

/*管理员表*/
CREATE TABLE shop_admin (
  id       INT PRIMARY KEY AUTO_INCREMENT, #TINYINT ，字段类型，如果设置为UNSIGNED类型，只能存储从0到255的整数,不能用来储存负数。
  username VARCHAR(16) BINARY, #管理员登录名
  password VARCHAR(50), #管理员登录密码
  email    VARCHAR(32), #邮箱
  supAdmin ENUM ("是", "否") DEFAULT "否" #最高级管理员标识，值为1时允许对管理员账户进行增、删、改操作，默认值为0
);
#添加默认管理员
INSERT INTO shop_admin VALUES
  (NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@163.com', '是'),
  (NULL, 'jiadesen', '10b065d12b81e50c0b402c0c5847e301', 'jiadesen@163.com', '否'),
  (NULL, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@163.com', '否');

/*商品分类表*/
CREATE TABLE shop_cate (
  id    INT PRIMARY KEY AUTO_INCREMENT,
  cName VARCHAR(32) #分类名称
);
#添加默认商品分类
INSERT INTO shop_cate VALUES
  (NULL, '手机'),
  (NULL, '数码'),
  (NULL, '家用电器'),
  (NULL, '精品家具'),
  (NULL, '美食专区'),
  (NULL, '服装专区'),
  (NULL, 'test');

/*商品表*/
CREATE TABLE shop_pro (
  id      INT PRIMARY KEY AUTO_INCREMENT,
  pName   VARCHAR(64), #商品名称
  pSn     VARCHAR(10), #商品货号
  pNum    INT UNSIGNED    DEFAULT 1, #商品数量，默认1
  mPrice  DECIMAL(10, 2), #商品市场价格，10位整数，2位小数
  sPrice  DECIMAL(10, 2), #商城售价
  pDesc   TEXT, #商品简介
  pubTime INT UNSIGNED, #上架时间(整型存储方便计算)
  isShow  TINYINT(1)      DEFAULT 1, #商品是否在卖(默认1表示在卖)
  isHot   TINYINT(1)      DEFAULT 0, #商品是否热卖(刚上架默认0不热卖)
  cId     SMALLINT UNSIGNED #商品分类标识
);
# INSERT INTO shop_pro VALUES
#   (NULL, '','','','','','');

/*用户表*/
CREATE TABLE shop_user (
  id       INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(20) BINARY,
  password VARCHAR(32),
  email    VARCHAR(32)
);

/*相册表*/
CREATE TABLE shop_album (
  id        INT PRIMARY KEY AUTO_INCREMENT,
  pid       INT UNSIGNED, #商品id
  albumPath VARCHAR(64) #商品图片路径
);