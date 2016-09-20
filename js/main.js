$(document).ready(function () {
    $('.bxslider').bxSlider();

    $(window).scrollTop(0);
});

jQuery.validator.addMethod("lettersonly", function (value, element) {
    return this.optional(element) || /^[a-zА-Я0-9\s]+$/i.test(value);
}, "Имя автора должно состоять только из букв и цифр");

function highlihtElement(element) {
    var id_attr = "#" + $(element).attr("id") + "1";
    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    $(id_attr).removeClass('glyphicon-ok').addClass('glyphicon-remove');
}

function unHighlihtElement(element) {
    var id_attr = "#" + $(element).attr("id") + "1";
    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    $(id_attr).removeClass('glyphicon-remove').addClass('glyphicon-ok');
}

function errorPlacementElement(error, element) {
    if (element.length) {
        error.insertAfter(element);
    } else {
        error.insertAfter(element);
    }
}

$("#form_record").validate({
    rules: {
        inputName: {
            required: true,
            minlength: 3,
            maxlength: 30,
            lettersonly: true,
        },
        inputText: {
            required: true,
        },
    },
    messages: {
        inputName: {
            required: "Имя автора должно быть пустым",
            minlength: "Имя автора должно состоять более чем из 3 символов",
            maxlength: "Имя автора не может быть длиннее 30 символов",
        },
        inputText: "Введите текст публикации",
    },
    highlight: highlihtElement,
    unhighlight: unHighlihtElement,
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: errorPlacementElement
});

$("#form_comment").validate({
    rules: {
        inputName: {
            required: true,
            minlength: 3,
            maxlength: 30,
            lettersonly: true,
        },
        inputText: {
            required: true,
        },
    },
    messages: {
        inputName: {
            required: "Имя автора должно быть пустым",
            minlength: "Имя автора должно состоять более чем из 3 символов",
            maxlength: "Имя автора не может быть длиннее 30 символов",
        },
        inputText: "Введите текст комментария",
    },
    highlight: highlihtElement,
    unhighlight: unHighlihtElement,
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: errorPlacementElement
});

$("#form_record button").attr('tableName', 'record');
$("#form_comment button").attr('tableName', 'comments');

function mySubmitHandler(e) {
    var formName = $(e).attr('target').id;
    var isvalidate;

    isvalidate = $("#" + formName).valid();

    if (isvalidate) {
        e.preventDefault();

        var inputParams;
        switch ($("#" + formName + " button").attr('tableName')) {
            case 'record' :
                inputParams = {name: $("#inputName").val(), text: $("#inputText").val(), table_name: "record"};
                break;
            case 'comments' :
                inputParams = {
                    id_record: $("#id_record").text(),
                    name: $("#inputName").val(),
                    text: $("#inputText").val(),
                    table_name: "comments"
                };
                break;
        }

        $.post(
            'db_insert.php',
            inputParams,
            function (data) {

                if (data === "OK") {
                    location.reload();
                }
                else {
                    var result = data.split(";");
                    window.location.replace("error.php?db_table_write_error=" + result[0] + "&sql=" + result[1]);
                }
            });
    }
}

$("#form_record").on('submit', mySubmitHandler);

$("#form_comment").on('submit', mySubmitHandler);

