<?php
//1.连接数据库
try{
    $pdo = new \PDO('mysql:host=localhost;dbname=ddtest','root','Swift_2018');
    $pdo->setAttribute(\PDO::ATTR_ERRMODE , \PDO::ERRMODE_EXCEPTION);
}catch (\PDOException $exception){
    die('database connecting failure' . $exception->getMessage());
}
//2.执行sql查询,并解析与遍历

switch ($_GET['action']){
    case 'add'://增加操作
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $height = $_POST['height'];
        $introduce = $_POST['introduce'];
        echo $name . $sex . $height . $introduce ;
        $sql = "insert into student values (null ,'{$name}' , '{$sex}' , '{$height}' , '{$introduce}')";
        $rowCount = $pdo->exec($sql);
        if ($rowCount > 0){
//            echo "success";
            echo "<script> alert('增加成功');window.location='index.php';</script>>";
        }else{
//            echo "failure";
            echo "<script> alert('增加失败');window.history.back();</script>>";
        }
        break;
    case 'del'://增加操作
        $id = $_GET['id'];

        $sql = "delete from student where id = {$id}";
        $rowCount = $pdo->exec($sql);
        header("Location:index.php");
        break;

    case 'edit'://增加操作
        $id = $_POST['id'];

        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $height = $_POST['height'];
        $introduce = $_POST['introduce'];
        $sql = "update student set name = '{$name }', height= '{$height}',introduce ='{$introduce}' where id = '{$id}'";
        $rowCount = $pdo->exec($sql);
        if ($rowCount > 0){
//            echo "success";
            echo "<script> alert('修改成功');window.location='index.php';</script>>";
        }else{
//            echo "failure";
            echo "<script> alert('修改失败');window.history.back();</script>>";
        }
//        header("Location:index.php");
        break;
}