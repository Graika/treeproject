<?php

class Site {
    public static function createObject($name, $desc, $parent) {
        $capsule = dbCon::connect();
        if ($parent == "0") $parent = NULL;
        return $capsule::table("tree")->insert(array([
            'name' => $name,
            'description' => $desc,
            'parent' => $parent,
        ]));
    }

    public static function editObject($id, $name, $desc, $parent) {
        $capsule = dbCon::connect();
        return $capsule::table("tree")->where("id", "=", $id)->update([
            'name' => $name,
            'description' => $desc,
            'parent' => $parent,
        ]);
    }

    public static function deleteObject($id) {
        $capsule = dbCon::connect();
        return $capsule::table("tree")->where("id", "=", $id)->delete();
    }
    
    public static function getObjects() {
        $capsule = dbCon::connect();
        return $capsule::table("tree")->get();
    }

    public static function hasChilds($id) {
        $capsule = dbCon::connect();
        return $capsule::table("tree")->where("parent", "=", $id)->exists();
    }

    public static function getChilds($id) {
        $capsule = dbCon::connect();
        return $capsule::table("tree")->where("parent", "=", $id)->get();
    }

    public static function printTree($id) {
        $childs = self::getChilds($id);
        foreach ($childs as $child) {
            echo "<div class='tree'>";
                echo "<a href='".$child->id."'>".$child->name."</a>";
                self::printTree($child->id);
            echo "</div>";
        }
    }

    public static function printOptions($id) {
        $objs = Site::getObjects(); ?>
        <option value="0">Корневной объект</option>
        <?php foreach ($objs as $obj) { ?>
            <option value="<?=$obj->id?>"><?=$obj->name?></option>
        <?php }
    }

    public static function getObjectInfo($id) {
        $capsule = dbCon::connect();
        return $capsule::table("tree")->where("id", "=", $id)->first();
    }

    public static function getRoots($id) {
        $childs = self::getChilds($id);
        foreach ($childs as $child) {
            echo "<div class='tree'>";
            echo "<a class='infolink' href='".$child->id."'>".$child->name."</a>";
            if(Site::hasChilds($child->id)) echo " <a style='text-decoration: none; color: red;' href='".$child->id."' class='tree_plus'>±</a>";
            echo "</div>";
        }
    }

    public static function getUserByLogin($login) {
        $capsule = dbCon::connect();
        return $capsule::table("users")->where("login", "=", $login)->first();
    }
}