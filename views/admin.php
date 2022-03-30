<?php include 'views/layouts/header.php'; ?>

<div class="first_cont">
    <div class="tree_block">
        <?php Site::printTree(NULL); ?>
    </div>
    <div class="tree_infoblock">
        <div class="add_block">
            <div>Добавление объекта</div>
            <form action="" method="post" id="object_form">
                <input name="name" placeholder="Имя объекта">
                <textarea name="desc" placeholder="Описание"></textarea>
                <select name="parent">
                    <option value="0">Корневной объект</option>
                    <?php foreach ($objs as $obj) { ?>
                        <option value="<?=$obj->id?>"><?=$obj->name?></option>
                    <?php } ?>
                </select>
                <button>Добавить</button>
            </form>
        </div>
        <div class="edit_block">
            <div>Редактирование объекта</div>
            <button id="gotoadd">Добавить новый объект</button>
            <form action="" method="post" id="object_edit">
                <input name="id" type="hidden">
                <input name="name" type="text" placeholder="Имя объекта">
                <textarea name="desc" placeholder="Описание"></textarea>
                <select name="parent">
                    <option value="0">Корневной объект</option>
                    <?php foreach ($objs as $obj) { ?>
                        <option value="<?=$obj->id?>"><?=$obj->name?></option>
                    <?php } ?>
                </select>
                <button id="edit_obj">Редактировать</button>
            </form>
            <button id="delete_obj">Удалить</button>
        </div>
        <div class="description">
            <div>Описание объекта</div>
            <div class="desctext"></div>
        </div>
    </div>
</div>

<?php include 'views/layouts/footer.php'; ?>