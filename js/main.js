$(document).ready(function () {
    $('.bxslider').bxSlider();
});

jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-zА-Я0-9\s]+$/i.test(value);
}, "Имя автора должно состоять только из букв и цифр");

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
    highlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        $(id_attr).removeClass('glyphicon-ok').addClass('glyphicon-remove');
    },
    unhighlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        $(id_attr).removeClass('glyphicon-remove').addClass('glyphicon-ok');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function (error, element) {
        if(element.length) {
            error.insertAfter(element);
        } else {
            error.insertAfter(element);
        }
    }
});

$("#form_record").on('submit', function(e){
    var isvalidate=$("#form_record").valid();
    if(isvalidate)
    {
        e.preventDefault();
        alert("record form valid. add data to db");
    }
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
    highlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        $(id_attr).removeClass('glyphicon-ok').addClass('glyphicon-remove');
    },
    unhighlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        $(id_attr).removeClass('glyphicon-remove').addClass('glyphicon-ok');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function (error, element) {
        if(element.length) {
            error.insertAfter(element);
        } else {
            error.insertAfter(element);
        }
    }

});

$("#form_comment").on('submit', function(e){
    var isvalidate=$("#form_comment").valid();
    if(isvalidate)
    {
        e.preventDefault();
        alert("comment form valid. add data to db");
    }
});