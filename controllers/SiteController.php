<?php

class SiteController {
    public function actionIndex() {
        $title = "Главная";
        require_once(ROOT . '/views/index.php');
        return true;
    }

    public function actionAdmin() {
        if($_SESSION['alogin']) {
            $title = "Главная";
            $objs = Site::getObjects();
            $roots = Site::getChilds(null);
            require_once(ROOT . '/views/admin.php');
        } else {
            header("Location: /");
        }
        return true;
    }

    public function actionLogin() {
        if(isset($_POST["submit"])) {
            $user = Site::getUserByLogin($_POST['login']);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            if(isset($user->password)) {
                if (password_verify($_POST['password'], $user->password)) {
                    $_SESSION["alogin"] = true;
                    header("Location: /admin");
                } else {
                    $err = 1;
                }
            } else $err = 1;
        }
        require_once(ROOT . '/views/alogin.php');
        return true;
    }

    public function actionLogout() {
        $_SESSION["alogin"] = false;
        header("Location: /");
        return true;
    }
}
