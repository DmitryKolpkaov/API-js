<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>
<div style="color: red">
    <?php
    if (!empty($_GET['error'])){
        echo $_GET['error'];
    }
    ?>
</div>
<form method="post" action="token.php">
    <input name="client_id" placeholder="client_id" type="text">
    <input name="client_secret" placeholder="client_secret" type="text">
    <input name="code" placeholder="code" type="text">
    <input name="redirect_uri" placeholder="redirect_uri" type="text">
    <button type="submit">Отправить</button>
</form>

<script src="jquery-3.6.1.min.js" type="module"></script>
<script src="main.js" type="module"></script>
</body>

</html>