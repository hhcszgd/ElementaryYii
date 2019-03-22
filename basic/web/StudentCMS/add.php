<html>
<head>

    <title>学生信息管理系统</title>
</head>


<body>
<center>

    <?php include "menu.php"; ?>
    <h3>增加学生信息</h3>
<!--    //这里取action时用get方式,因为是拼到链接后连的-->
    <form action="action.php?action=add" method="post">
        <table width="333" >
            <tr>
                <td>姓名</td>
                <td><input type="text" name="name" /></td>
            </tr>
            <tr>
                <td>姓别</td>
                <td>
                    <input type="radio" name="sex" value="1" />男
                    <input type="radio" name="sex" value="0" />女
                </td>

            </tr>
            <tr>
                <td>身高</td>
                <td><input type="text" name="height" /></td>
            </tr>
            <tr>
                <td>简介</td>
                <td><input type="text" name="introduce" /></td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="submit" value="增加" />
                    <input type="reset" value="重置" />
                </td>
            </tr>

        </table>
    </form>

</center>


</body>
</html>