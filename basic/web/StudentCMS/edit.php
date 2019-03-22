<html>
<head>

    <title>学生信息管理系统</title>
</head>


<body>
<center>

    <?php include "menu.php";
    //1.连接数据库
    try{
        $pdo = new \PDO('mysql:host=localhost;dbname=ddtest','root','Swift_2018');
        $pdo->setAttribute(\PDO::ATTR_ERRMODE , \PDO::ERRMODE_EXCEPTION);
    }catch (\PDOException $exception){
        die('database connecting failure' . $exception->getMessage());
    }

    $sql = "select * from student where id ={$_GET['id']}";
    $stmt = $pdo->query($sql);
    if ($stmt->rowCount() > 0 ){
        $stus = $stmt->fetch(\PDO::FETCH_ASSOC);
    }else{die("没有相应的信息");}
    ?>
    <h3>修改学生信息</h3>
    <!--    //这里取action时用get方式,因为是拼到链接后连的-->
    <form action="action.php?action=edit" method="post">
        <input type="hidden" name="id" value="<?php echo $stus['id']; ?>" />
        <table width="333" >
            <tr>
                <td>姓名</td>
                <td><input type="text" name="name" value="<?php echo$stus['name'] ?>" /></td>
            </tr>
            <tr>
                <td>姓别</td>
                <td>
<!--                    <input type="radio" name="sex" value="1" checked />男-->
                    <input type="radio" name="sex" value="1"  <?php echo $stus['sex'] == 1 ? 'checked' : '' ?>/>男
                    <input type="radio" name="sex" value="0" <?php echo ($stus['sex'] == 0) ? 'checked' : '' ?> />女
                </td>

            </tr>
            <tr>
                <td>身高</td>
                <td><input type="text" name="height"  value="<?php echo$stus['height'] ?>" /></td>
            </tr>
            <tr>
                <td>简介</td>
                <td><input type="text" name="introduce"  value="<?php echo$stus['introduce'] ?>" /></td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="submit" value="修改" />
                    <input type="reset" value="重置" />
                </td>
            </tr>

        </table>
    </form>

</center>


</body>
</html>