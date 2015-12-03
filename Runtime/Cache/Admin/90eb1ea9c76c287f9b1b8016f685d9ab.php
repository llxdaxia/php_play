<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>select</title>
</head>
<body>
<p>查询的数据</p>

<table>
    <tr>
        <td>
            <?php echo ($result["name"]); ?>
        </td>
    </tr>
</table>
<br/>
"<?php echo ($result["password"]); ?>"
</body>
</html>