<?php if (!defined('THINK_PATH')) exit();?>
<html>
    <title>测试读取数据</title>

<body>
<table>
    <tr>
        <td>用户id:</td>
        <td><?php echo ($result["id"]); ?></td>
    </tr>
    <tr>
        <td>用户名：</td>
        <td><?php echo ($result["name"]); ?></td>
    </tr>
    <tr>
        <td>密码：</td>
        <td><?php echo ($result["password"]); ?></td>
    </tr>
</table>

</body>
</html>