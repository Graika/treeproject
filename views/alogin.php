<?php include 'views/layouts/header.php';
if(isset($err) && $err == 1) { echo "<div><b>Неправильный логин или пароль</b></div>"; } ?>
    <form action="" method="post" style="width: 100%; text-align: center;">
        <input type="text" name="login" placeholder="Логин"><br>
        <input type="password" name="password" placeholder="Пароль"><br><br>
        <input type="submit" name="submit">
    </form>
<?php include 'views/layouts/footer.php'; ?>