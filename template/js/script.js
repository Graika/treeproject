$(document).ready(function () {
    $(document).on("click", "form#object_form button", function () {
        let $data = $("form#object_form").serializeArray();
        $.ajax({
            type: "POST",
            url: "/ajax/add_object",
            data: $data,
            cache: false,
            success: function (response) {
                if (response == "err_name") {
                    alert("Поле 'Имя' не может быть пустым");
                }
                update_fs();
            }
        });
        return false;
    });

    $(document).on("click", ".tree_block .tree a", function () {
        let id = $(this).attr("href");
        $.ajax({
            type: "POST",
            url: "/ajax/get_info",
            data: { "id":id },
            dataType: 'json',
            cache: false,
            success: function (response) {
                if(response.description == "") $("div.desctext").text("Нет описания");
                else $("div.desctext").text(response.description);
                $("form#object_edit input[name='id']").val(response.id);
                $("form#object_edit input[name='name']").val(response.name);
                $("form#object_edit textarea").val(response.description);
                $("form#object_edit select").val(response.parent);
                $(".add_block").hide();
                $(".edit_block").show();
            }
        });
        return false;
    });

    $(document).on("click", "form button#edit_obj", function () {
        let $data = $("form#object_edit").serializeArray();
        $.ajax({
            type: "POST",
            url: "/ajax/edit_object",
            data: $data,
            cache: false,
            success: function (response) {
                if (response == "err_name") {
                    alert("Поле 'Имя' не может быть пустым");
                }
                update_fs();
            }
        });
        return false;
    });

    $(document).on("click", ".edit_block button#delete_obj", function () {
        let id = $("form#object_edit input[name='id']").val();
        $.ajax({
            type: "POST",
            url: "/ajax/delete_object",
            data: {"id":id},
            cache: false,
            success: function (response) {
                update_fs();
            }
        });
        return false;
    });

    $(document).on("click", "button#gotoadd", function () {
        $(".add_block").show();
        $(".edit_block").hide();
    });

    function get_tree() {
        $.ajax({
            type: "POST",
            url: "/ajax/get_tree",
            cache: false,
            success: function (response) {
                $("div.tree_block").html(response);
                get_list();
            }
        });
    }

    function get_list() {
        $.ajax({
            type: "POST",
            url: "/ajax/get_list",
            cache: false,
            success: function (response) {
                $("select").html(response);
            }
        });
    }

    function update_fs() {
        get_tree();
        $("#gotoadd").click();
    }

    $(document).on("click", "a.tree_plus", function () {
        if($(this).parent().find(".tree").length == 0) {
            let id = $(this).attr("href");
            let thiss = this;
            $.ajax({
                type: "POST",
                url: "/ajax/print_childs",
                data: {"id": id},
                cache: false,
                success: function (response) {
                    $(thiss).parent().html($(thiss).parent().html() + response);
                }
            });
        } else {
            $(this).parent().find(".tree").remove();
        }
        return false;
    });

    $(document).on("click", ".tree_index .tree a.infolink", function () {
        let id = $(this).attr("href");
        $.ajax({
            type: "POST",
            url: "/ajax/get_info",
            data: { "id":id },
            dataType: 'json',
            cache: false,
            success: function (response) {
                if(response.description == "") $("div.desctext").text("Нет описания");
                else $("div.desctext").text(response.description);
            }
        });
        return false;
    });
});