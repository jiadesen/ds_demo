<?php
//添加商品分类操作
function addCate()
{
  $arr = $_POST;
  if (insert("shop_cate", $arr)) {
    $mes = "分类添加成功!<br/><a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看分类</a>";
  } else {
    $mes = "分类添加失败!<br/><a href='addCate.php'>重新添加</a>|<a href='listCate.php'>查看分类</a>";
  }
  return $mes;
}

//查看商品分类列表
function getCateById($id)
{
  $sql = "SELECT id,cName FROM shop_cate WHERE id={$id}";
  return fetchOne($sql);
}

//修改商品分类
function editCate($where)
{
  $arr = $_POST;
  if (update("shop_cate", $arr, $where)) {
    $mes = "修改成功!<br/><a href='listCate.php'>查看商品分类列表</a>";
  } else {
    $mes = "修改失败!<br/><a href='listCate.php'>重新修改</a>";
  }
  return $mes;
}

//删除商品分类的操作
function delCate($id)
{
  if (delete("shop_cate", "id={$id}")) {
    $mes = "删除成功!<br/><a href='listCate.php'>查看商品分类列表</a>";
  } else {
    $mes = "删除失败!<br/><a href='listCate.php'>重新删除</a>";
  }
  return $mes;
}

//得到所有商品分类
function getAllCate()
{
  $sql = "select id,cName from shop_cate";
  $rows = fetchAll($sql);
  return $rows;
}