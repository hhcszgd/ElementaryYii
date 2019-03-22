<html>
<head>

    <title>学生信息管理系统</title>
</head>

<script>
    function doDel(id) {
        if (confirm("确定删除吗")) {
            window.location='action.php?action=del&id=' + id ;
        }
        // alert(id);
    }
</script>

<body>
<center>

    <?php include "menu.php"; ?>
    <h3>浏览学生信息</h3>
    <table width="666" border="1">
        <tr>
            <th>id</th>
            <th>姓名</th>
            <th>性别</th>
            <th>身高</th>
            <th>简介</th>
            <th>操作</th>
        </tr>
        <?php
        //1.连接数据库
        try{
            $pdo = new \PDO('mysql:host=localhost;dbname=ddtest','root','Swift_2018');
            $pdo->setAttribute(\PDO::ATTR_ERRMODE , \PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $exception){
            die('database connecting failure' . $exception->getMessage());
        }
        //2.执行sql查询,并解析与遍历
        $sql = 'select * from student';
        foreach ($pdo->query($sql) as $row){
            echo "<tr>";
            echo "<td align='center'> {$row['id']} </td>";
            echo "<td align='center'> {$row['name']} </td>";
            echo "<td align='center'> {$row['sex']} </td>";
            echo "<td align='center'> {$row['height']} </td>";
            echo "<td > {$row['introduce']} </td>";
            echo "<td align='center'> 
                        <a href='javascript:doDel({$row["id"]})'>删除</a>
                        <a href='edit.php?id={$row["id"]}'>修改</a>
                    </td>";
            echo "</tr>";
        }
        print_r($pdo);
        ?>
    </table>
</center>


</body>
</html>