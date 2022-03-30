<?php include 'views/layouts/header.php'; ?>
<div class="first_cont">
    <div class="tree_index">
        <?php Site::getRoots(NULL); ?>
    </div>
    <div class="description_index">
        <div>Описание объекта</div>
        <div class="desctext"></div>
    </div>
</div>
<?php include 'views/layouts/footer.php'; ?>