<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>编辑更新</title>
</head>
<body>
<FORM method="post" action="/php/index.php/Admin/Form/update">
    用户名：<INPUT type="text" name="title" value="<?php echo ($result["name"]); ?>"><br/>
    密码：<TEXTAREA name="content" rows="5" cols="45"><?php echo ($result["password"]); ?></TEXTAREA><br/>
    <INPUT type="hidden" name="id" value="<?php echo ($result["id"]); ?>">
    <INPUT type="submit" value="提交">
</FORM>
</body>
</html>