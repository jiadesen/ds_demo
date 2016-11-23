SET NAMES UTF8;
DROP DATABASE IF EXISTS shop;
/*CREATE DATABASE IF NOT EXISTS shop;*/
CREATE DATABASE shop
  CHARSET = UTF8;
USE shop;
/*管理员表*/
CREATE TABLE shop_admin (
  id       INT PRIMARY KEY AUTO_INCREMENT, #TINYINT ，字段类型，如果设置为UNSIGNED类型，只能存储从0到255的整数,不能用来储存负数。
  username VARCHAR(20), #管理员登录名
  password VARCHAR(32), #管理员登录密码
  email    VARCHAR(50)#邮箱
);
#添加默认管理员
INSERT INTO shop_admin VALUES
  (NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@163.com');
/*商品分类表*/
CREATE TABLE shop_cate (
  id    INT PRIMARY KEY AUTO_INCREMENT,
  cName VARCHAR(50) #分类名称
);
/*商品表*/
CREATE TABLE shop_pro (
  id      INT PRIMARY KEY AUTO_INCREMENT,
  pName   VARCHAR(50), #商品名称
  pSn     VARCHAR(50), #商品货号
  pNum    INT UNSIGNED    DEFAULT 1, #商品数量，默认1
  mPrice  DECIMAL(10, 2), #商品市场价格，10位整数，2位小数
  sPrice  DECIMAL(10, 2), #商城售价
  pDesc   TEXT, #商品简介
  pImg    VARCHAR(50), #商品图片
  pubTime INT UNSIGNED, #上架时间(整型存储方便计算)
  isShow  TINYINT(1)      DEFAULT 1, #商品是否在卖(默认1表示在卖)
  isHot   TINYINT(1)      DEFAULT 0, #商品是否热卖(刚上架默认0不热卖)
  cId     SMALLINT UNSIGNED #商品分类标识
);
/*用户表*/
CREATE TABLE shop_user (
  id       INT PRIMARY KEY       AUTO_INCREMENT,
  username VARCHAR(20),
  password VARCHAR(32),
  sex      ENUM ("男", "女", "保密") DEFAULT "保密",
  face     VARCHAR(50), #用户头像
  regTime  INT UNSIGNED #注册时间
);
/*相册表*/
CREATE TABLE shop_img (
  id        INT PRIMARY KEY AUTO_INCREMENT,
  pid       INT UNSIGNED, #商品id
  albumPath VARCHAR(50) #商品图片路径
);