$(function () {
    BASE = $('link[rel="canonical"]').attr('href');
    HOME = "https://www.advocaciadeempresas.com.br/";
    CaptVisitor();
    CaptEmail();

    var $myCarousel = $('.autoplay');

    $myCarousel.slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 730,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 720,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 580,
                settings: {
                    slidesToShow: 2
                }
            }
        ]
    });

    $myCarousel.on('breakpoint', function (event, slick, breakpoint) {
        console.log('breakpoint ' + breakpoint);
    });

    $('#form_modal_create').submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var action = $(this).attr('action');
        jQueryForm(action, form);
    });
    $('#form_modal_login').submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var action = $(this).attr('action');
        jQueryForm(action, form);
    });
    $('#form_modal_comment').submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var action = $(this).attr('action');
        jQueryForm(action, form);
    });
    $('#form_modal_pass').submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var action = $(this).attr('action');
        jQueryForm(action, form);
    });
    $('#form_modal_news').submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var action = $(this).attr('action');
        jQueryForm(action, form);
    });

    $(".like").click(function (e) {
        e.preventDefault();
        alert(1);
        $('.like').attr("disabled", "disabled");

        var codigo = this.id;
        var split_id = codigo.split("_");
        var text = split_id[0];
        var postid = split_id[1];
        var type = 0;
        if (text === "like") {
            type = 1;
        } else {
            type = 0;
        }

        $.ajax({
            url: '../_models/manager.php?action=' + text,
            type: 'post',
            data: {postid: postid, type: type},
            dataType: 'json',
            success: function (data) {

                if (data.erro === true) {
                    $("#" + data.notify).text(data.number);
                    $('.like').attr('id', '' + data.type + '');
                    $('.like').css('color', '#d7594a');
                    $('.like').removeAttr("disabled");
                } else {
                    $("#" + data.notify).text(data.number);
                    $('.like').attr('id', '' + data.type + '');
                    $('.like').css('color', '#777777');
                    $('.like').removeAttr("disabled");
                }
            }
        });
    });


    function CaptVisitor() {
        var modal_login = $('#modal_form_login');
        $('.login_entrar').click(function (e) {
            e.preventDefault();
            $('.modal_login_div').show();
            modal_login.show().animate({'opacity': '1'}, 200, function () {
                $('.modal_login_div').animate({'margin-top': '100px', 'opacity': '1'}, 400);

            });
        });

        $('.create_lg').click(function (e) {
            e.preventDefault();
            $('#form_modal_login, #form_modal_pass').hide().animate({'opacity': '0'}, 200, function () {
                $('#form_modal_create').show().animate({'opacity': '1'}, 400);
                $('.create_lg').hide();
                $('.pass_lg').show();
                $('.ancor_lg').show();
            });
        });

        $('.pass_lg').click(function (e) {
            e.preventDefault();
            $('#form_modal_login, #form_modal_create').hide().animate({'opacity': '0'}, 200, function () {
                $('#form_modal_pass').show().animate({'opacity': '1'}, 400);
                $('.pass_lg').hide();
                $('.create_lg').show();
                $('.ancor_lg').show();
            });
        });

        $('.ancor_lg').click(function (e) {
            e.preventDefault();
            $('#form_modal_create, #form_modal_pass').hide().animate({'opacity': '0'}, 200, function () {
                $('#form_modal_login').show().animate({'opacity': '1'}, 400);
                $('.ancor_lg').hide();
                $('.pass_lg').show();
                $('.create_lg').show();
            });
        });

        $('#formModal').submit(function (e) {
            (e).preventDefault();
            if ($('#inpNomeModal').val() === '') {
                $('.notfy_nome').html('<span class="mal_span"><span class="icon-sad"></span>Insira seu nome!</span>');
                return false;
            } else {
                $('.notfy_nome').html('');
            }
            if ($('#inpEmailModal').val() === '') {
                $('.notfy_email').html('<span class="mal_span"><span class="icon-sad"></span>Insira seu e-mail!</span>');
                return false;
            } else if (!ValidarEmail($('#inpEmailModal').val())) {
                $('.notfy_email').html('<span class="mal_span"><span class="icon-sad"></span>Informe um e-mail válido!</span>');
                return false;
            } else {
                return true;
            }
        });
        $('.close').click(function () {
            $('.modal_login_div').animate({'margin-top': '-100px', 'opacity': '0'}, 200, function () {
                modal_login.animate({'opacity': '0'}, 400, function () {
                    modal_login.hide();
                });
            });
        });
    }


    $('.facebook a').click(function () {
        var share = 'https://www.facebook.com/sharer/sharer.php?u=';
        window.open(share + BASE, "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, width=660, height=400");
        return false;
    });

    $(".nav_menu_area_ancor").hover(
            function () {
                $('ul.main_header_content_nav_menu_area').show();
            },
            function () {
                $('ul.main_header_content_nav_menu_area').hide();
            }
    );

//    MENU MOBILE
    $('.content_mobile').on('click', function () {
        $('.ul_sub_mobile').toggleClass('ds_none');
        $(this).toggleClass('content_mobile_active');
    });

//    VALIDAR EMAIL
    function ValidarEmail(email) {
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return filter.test(email);
    }

//    CAPTURAR EMAIL
    function CaptEmail() {
        var modal_email = $('#modal_form_news');
        $('.btn_news').click(function (e) {
            e.preventDefault();
            $('.modal_news_div').show();
            modal_email.show().animate({'opacity': '1'}, 200, function () {
                $('.modal_news_div').animate({'margin-top': '100px', 'opacity': '1'}, 400);
            });
        });

        $('.close').click(function () {
            $('.modal_news_div').animate({'margin-top': '-100px', 'opacity': '0'}, 200, function () {
                modal_email.animate({'opacity': '0', 'display': 'none'}, 400, function () {
                    modal_email.hide();
                });
            });
        });
    }

//    MOSTRAR PERFIL
    Adv();
    function Adv() {
        var modal_adv = $('.section_adv');
        var adv = null;
        $('.adv_info').click(function (e) {
            e.preventDefault();
            adv = $(this).data('adv');

            $('.adv_' + adv).show().animate({'opacity': '1'}, 200, function () {
                $('.div_adv').animate({'margin-top': '100px', 'opacity': '1'}, 400);
            });
        });

        $('.close').click(function () {
            $('.div_adv').animate({'margin-top': '-100px', 'opacity': '0'}, 200, function () {
                modal_adv.animate({'opacity': '0', 'display': 'none'}, 400, function () {
                    modal_adv.hide();
                });
            });
        });
    }


    setTimeout(function () {
        $('.main_header_content_article_btn').animate({'opacity': '1'}, 400);
    }, 4000);


    function jQueryForm(action, form, codigo = null) {
        var intp = $('.inpt-null');
        var btn = $('.button_submit_' + action).html();

        intp.removeClass('vazio');

        if ($('.msg_notify').length) {
            $('.msg_notify').remove();
        }

        var per = $('.processing');
        form.ajaxSubmit({
            url: HOME + '_models/manager.php?action=' + action,
            type: 'POST',
            dataType: 'json',
            beforeSubmit: function () {
                $('.button_submit_' + action).attr("disabled", "disabled").addClass('form-btn-create').html("<img src='//advocaciadeempresas.com.br/images/carregando.gif' width='15'/> Carregando");
            },
            uploadProgress: function (event, position, total, percent) {
                per.fadeIn("fast");
                per.width(percent + "%");


                if (form.find(".load").length) {
                    form.find(".load b").text(percent + "%");
                } else {
                    $('.button_submit_' + action).html("<span class='load'><b>" + percent + "%</b></span> Carregando");
                }
            },
            success: function (data) {
                if (data.reset === true) {
                    form.trigger("reset");
                }
                if (data.rows === true) {
                    $(".remove-row").parent('div').remove();
                }
                if (data.reload === true) {
                    window.location.reload();
                }
                if (data.erro === true) {
                    $('.notify_site').html('<div class="msg_notify">' + data.notify + '</div>');
                } else {
                    $('.notify_site').html('<div class="msg_notify">' + data.notify + '</div>');
                }
                if (data.com.length) {
                    alert("Seu comentário será respondindo!");
                    $('#form_modal_comment').remove();
                }
            },
            complete: function () {
                window.setTimeout(function () {
                    per.width('0%');
                    $('.load').remove();
                    $('.button_submit_' + action).removeAttr("disabled").removeClass('form-btn-create').html(btn);
                }, 10);
            }
        });
    }
});
