//DELETING A FORM WITH A LINK
// restful.init($('.rest-delete'));
// $(document).ready(function () {
//
//     var restful = {
//         init: function (elem) {
//             elem.on('click', function (e) {
//                 self = $(this);
//                 e.preventDefault();
//
//                 if (confirm('Are you sure?')) {
//                     $.ajax({
//                         url: self.attr('href'),
//                         method: 'DELETE',
//                         success: function (data) {
//                             self.parent('li').remove();
//                         },
//                         error: function (data) {
//                             alert("Error while deleting.");
//                             console.log(data);
//                         }
//                     });
//                 }
//                 ;
//             })
//         },
//     }
//
//     restful.init($('.rest-delete'));
// });

$(function() {
    $( ".hasDatePicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
});

function displayOverlay(text) {
    $("<table id='overlay'><tbody><tr><td>" + text + "</td></tr></tbody></table>").css({
        "position": "fixed",
        "top": "0px",
        "left": "0px",
        "width": "100%",
        "height": "100%",
        "background-color": "rgba(0,0,0,.5)",
        "z-index": "10000",
        "vertical-align": "middle",
        "text-align": "center",
        "color": "#fff",
        "font-size": "40px",
        "font-weight": "bold",
        "cursor": "wait"
    }).appendTo("body");
}

function removeOverlay() {
    $("#overlay").remove();
}

$(function () {
    $('a[title]').tooltip();
    var i = 0;
    $('.btn-submit').on('click', function (e) {
        var formname = $(this).attr('name');
        var tabname = $(this).attr('href');
        if ($('#' + formname)[0].checkValidity()) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: $("form:eq(" + i + ") input[name=hidden_type]").val(),
                dataType: 'JSON',
                data: $("form:eq(" + i + ")").serialize(),
                beforeSend: function () {
                    displayOverlay("Loading...");
                },
                success: function (data) {
                    removeOverlay();
                    $("p").remove();
                    $('span[class^="help-block"]').remove();
                    $(".form-group").removeClass("has-error");
                    $(".input-group").removeClass("has-error");

                    if (data.success) {
                        $('ul.nav li a[href="' + tabname + '"]').parent().removeClass('disabled');
                        $('ul.nav li a[href="' + tabname + '"]').trigger('click');
                        i++;
                    } else {
                        $.each(data.errors, function (index, error) {
                            $("#" + index).addClass("has-error");
                            if (index != 'gender') {
                                $("#" + index).append("<span class='help-block'>" + error + '</span>');
                            }
                            console.log(data);
                        })
                    }
                }
            });
        }
    });

    $('.btn-skip').on('click', function (e) {
        $('ul.nav li a[href="' + $(this).attr('href') + '"]').parent().removeClass('disabled');
        $('ul.nav li a[href="' + $(this).attr('href') + '"]').trigger('click');
    });

    $('ul.nav li').on('click', function (e) {
        if ($(this).hasClass('disabled')) {
            e.preventDefault();
            return false;
        }
    });
});

$(document).ready(function(){
    $(".collapse").on("hide.bs.collapse", function () {
        $(this).siblings('.panel-heading').find('.icon').html('<span class="glyphicon glyphicon-chevron-up"></span>');
    });
    $(".collapse").on("show.bs.collapse", function () {
        $(this).siblings('.panel-heading').find('.icon').html('<span class="glyphicon glyphicon-chevron-down"></span>');
    });
});


$('#toggle-accordion').click(function () {

    if ($(this).html().indexOf("Expand All") >= 0) {

        $('.panel-collapse:not(".in")')
            .collapse('show');

        $(this).html($(this).html().replace('Expand All', 'Collapse All'));
    }

    else {

        $('.panel-collapse.in')
            .collapse('hide');
        $(this).html($(this).html().replace('Collapse All', 'Expand All'));
    }

});

$('#toggle-permissions').click(function () {

    if ($(this).data('toggled') == "deselected") {

        $('#accordion').find(':checkbox').each(function () {
            this.checked = true;
        });

        $(this).data('toggled', "selected");

        $(this).find('.fa').removeClass('fa-square-o').addClass('fa-check-square-o');
    }

    else {

        $('#accordion').find(':checkbox').each(function () {
            this.checked = false;
        });

        $(this).data('toggled', "deselected");
        $(this).find('.fa').addClass('fa-square-o').removeClass('fa-check-square-o');
    }

});