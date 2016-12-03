<?php
//数据库操作配置文件(对注释掉的旧代码进行改进)
/**
 * 连接数据库
 * @return resource
 */
function connect()
{
  $link = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_DBNAME, DB_PORT);
  mysqli_set_charset($link, DB_CHARSET);
//  检测连接
  if ($link->connect_error) {
    die("连接失败：" . $link->connect_error);
  }
  return $link;
}

/**
 * 记录插入的操作
 * @param string $table
 * @param array $array
 * @return number
 */
function insert($table, $array)
{
  $conn = connect();
  $keys = "" . join(",", array_keys($array));
  $vals = "'" . join("','", array_values($array)) . "'";
//  $sql = "insert {$table}($keys) values({$vals})";
  $sql = "INSERT INTO {$table} ({$keys})VALUES ({$vals})";
//  mysqli_query($sql);
  if ($conn->query($sql) === true) {
//    echo "数据插入成功";
//    return true;
    return mysqli_insert_id($conn);
  } else {
    echo "Error:" . $sql . "<br>" . $conn->error;
    return $sql;
  }
}

//update shop_admin set username='shop' where id=1
/**
 * 数据库更新操作
 * @param string $table
 * @param array $array
 * @param string $where
 * @return number
 */
function update($table, $array, $where = null)
{
  $str = "";
  foreach ($array as $key => $val) { //$key即为要修改的值
    if ($str == null) {
      $sep = "";
    } else {
      $sep = ",";
    }
    $str .= $sep . $key . "='" . $val . "'";
//    echo $cName . "<br/>";
  }
  $sql = "UPDATE {$table} SET {$str} " . ($where == null ? null : " where " . $where);
//  echo $sql . "<br/>";
//  echo $where . "<br/>";
  $result = mysqli_query(connect(), $sql);
  return $result; //存在的问题，没有阻止更新到一个数据库中存在的值
}

/**
 * 删除操作
 * @param string $table
 * @param string $where
 * @return number
 */
function delete($table, $where = null)
{
  mysqli_set_charset(connect(), 'utf8');
  mysqli_select_db(connect(), "$table");
  $where = ($where == null ? null : " where " . $where);
  $sql = "DELETE FROM $table {$where}";
  $res = mysqli_query(connect(), $sql);
  return $res;
}

/**
 *查找操作，得到一条记录
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchOne($sql)
{
  $result = mysqli_query(connect(), $sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      return $row;
    }
  } else {
    echo "未查询到数据";
  }
//  $row = mysqli_fetch_array($result, $result_type);
//  return $row;
}


/**
 * 查找操作，得到结果集中所有记录
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchAll($sql, $result_type = MYSQLI_ASSOC)
{
  $rows = []; // 定义$rows为空数组解决商品列表为空时：Notice: Undefined variable: rows in C:\xampp\htdocs\ds_demo_v1.3\lib\mysql.func.php on line 124
  $conn = connect();
  $result = $conn->query($sql);
  if (@$result->num_rows > 0) { // 加@前缀解决：Notice: Trying to get property of non-object in C:\xampp\htdocs\ds_demo_v1.3\lib\mysql.func.php on line 116
    //输出每行数据
    while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
    }
  } else {
    echo "未查询到结果";
  }
  return $rows;
}

/**
 * 获取结果集中的记录条数
 * @param unknown_type $sql
 * @return number
 */
function getResultNum($sql)
{
//  $result = mysqli_query($sql);
//  return mysql_num_rows($result);
  $conn = connect();
  $result = $conn->query($sql);
  $totalRows = $result->num_rows;
  return $totalRows;
}

/**
 *查找操作，得到指定表中的指定值
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function getResultVal($table, $id)
{
  $conn = connect();
}