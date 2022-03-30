<?php

class AjaxController
{
    public function actionAdd_object() {
        $fields = $_POST;
        if(empty(trim($fields['name']))) {
            echo "err_name";
            return true;
        }
        if(Site::createObject($fields["name"], $fields["desc"], $fields['parent'])) echo 1;
        else echo 0;
        return true;
    }

    public function actionGet_info() {
        $id = $_POST['id'];
        echo json_encode(Site::getObjectInfo($id));
        return true;
    }

    public function actionEdit_object() {
        $fields = $_POST;
        if(empty(trim($fields['name']))) {
            echo "err_name";
            return true;
        }
        if(Site::editObject($fields['id'], $fields['name'], $fields['desc'], $fields['parent'])) echo 1;
        else echo 0;
        return true;
    }

    public function actionDelete_object() {
        $id = $_POST["id"];
        $res = Site::deleteObject($id);
        print_r($res);
        return true;
    }

    public function actionGet_tree() {
        Site::printTree(null);
        return true;
    }

    public function actionGet_list() {
        Site::printOptions(null);
        return true;
    }

    public function actionPrint_childs() {
        Site::getRoots($_POST['id']);
        return true;
    }
}