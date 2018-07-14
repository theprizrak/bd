     var timer_user;
    function update_timer_user() {
        if (timer_user) // если таймер уже был, сбрасываем
            clearTimeout(timer_user);
        timer_user = setTimeout(function () {
            update_user();
        }, 30000);
        update_timer_user();
    }
   var timer_mail;
    function update_timer_mail() {
        if (timer_mail) // если таймер уже был, сбрасываем
            clearTimeout(timer_mail);
        timer_mail = setTimeout(function () {
            update_mail();
        }, 10000);
        update_timer_mail();
    }


function change_user_chat(id_user,name_user)
{
    $('#id_in').val(id_user);
    $('#user_in').val(name_user);
    $('#sendmessendg_chat').css('display','block');
    $('#sendmessendg_chat_inactive').css('display','none');
    update_mail();
}

function update_user()
{
$.ajax({
 type: "POST",
 url: "/chat/get_user_list",
 data: {},
 cache: false,
 success: function(status){
     if(status == 1){
       // alert(status);
    }
     else{
        var status = JSON.parse(status);
        var user_in=$('#user_out').val();
        var q="'";
       //['+status[i]["otdel"]+']
        $("#userlist_chat").empty();
        for(i=0;i<status.length;i++)
        {
        if(user_in!=status[i]["name"]){
        $("#userlist_chat").append(
        '<div style="border-bottom: 1px solid #D36E6E;padding: 2px;margin-top: 2px;"><a class="change_user" onclick="change_user_chat('+q+status[i]["id_user"]+q+','+q+status[i]["name"]+q+')">'+status[i]["name"]+'</a></div>'
        );
        }
        }
        $('#send_msg_loader').css('display','none');
        $('#textarea_msg_loader').css('display','none');
        update_timer_user();
        }                                              
     }    
  }); 
    
}

function update_mail()
{
    //$('#textarea_msg_loader').css('display','block');
    var id_user=$('#id_in').val();
    var user_in=$('#user_in').val();
    var id_user_out=$('#id_out').val();
        $("#textarea_chat").empty();
        $.ajax({
         type: "POST",
         url: "/chat/get_mail_user",
         data: {"load_msg": "load_msg", "id_user_in": id_user, "user_in": user_in, "id_user_out": id_user_out},
         cache: false,
         success: function(status){
            //alert(status);
             if(status == 1){
               // alert(status);
            }
             else{
                var status = JSON.parse(status);
                for(i=status.length-1;i>=0;i--)
                {
                    if(status[i]["id_in"]==id_user){var cls="_in";}else{var cls="_out";}
                $("#textarea_chat").append(
                '<div id="im_user'+status[i]["id"]+'" class="im_user'+cls+'"><div class="name_chat_user">'+status[i]["user_out"]+'</div><div class="date_chat_user">'+status[i]["date"]+' '+status[i]["time"]+'</div><div class="msg_chat_user">'+status[i]["messeg"]+'</div></div>'
                );
                }
                $('#textarea_msg_loader').css('display','none');
                $("#textarea_chat").scrollTop(99999);
                update_timer_mail();
                }                                             
             }    
          });
    
}

function send_messeg()
{
    //$('#sendmessendg_chat').css('display','none');
    $('#send_msg_loader').css('display','block');
    var id_user_in=$('#id_in').val();
    var user_in=$('#user_in').val();
    var id_user_out=$('#id_out').val();
    var user_out=$('#user_out').val();
    var chat_msg=$('#chat_msg').val();
    //alert(id_user_in+' '+user_in+' '+id_user_out+' '+user_out+' '+chat_msg);
    
    $.ajax({
         type: "POST",
         url: "/Chat/chat_ajax",
         data: {"send_msg": "send_msg", "id_user_in": id_user_in, "user_in": user_in, "id_user_out": id_user_out, "user_out": user_out, "chat_msg": chat_msg},
         cache: false,
         success: function(status){
             var messageResp = new Array('План успешно установлен','Ошибка при установки плана');
             var resultStat = messageResp[Number(status)];
             if(status == 0){
                update_mail();
                $('#send_msg_loader').css('display','none');
                $('#chat_msg').val('');
            }
             else if(status == 1){
                /*jVal.errors = true;
                $('input[name=add_ok]').attr('disabled',true);
                phoneInfo.removeClass('correct').addClass('error').html('X ← Данный номер телефона уже зарегистрирован в базе').show();
                ele.removeClass('normal').addClass('wrong');
                alert('Данный номер телефона уже зарегистрирован в базе');*/
                alert(status);
                }                                              
             }
          });
          
}

function open_chat()
{
    update_user();
    $("#middle_chat").show('blind');//.css('display','block');
}
function close_chat()
{
    clearTimeout(timer_user);
    clearTimeout(timer_mail);
    $("#middle_chat").hide('blind');//.css('display','none');
}
/*
    Чат для пользователей
    http://codediscuss.ru/blogs/14-ajax-chat-na-php-i-mysql
*/
/*
$(function(){
    var chat = $('#chat')[0]; // Окно чата
    var form = $('#chat-form')[0]; // форма
    
    // вешаем обработчик на отправку формы
    $('#chat-form').submit(function(event){
        
        // поле ввода
        var text = $(form).find('input[type="text"]');

        // выключаем форму пока не пришел ответ
        $(form).find('input').attr("disabled", true);
        
        // отправка сообщения
        update(text);
        
        // что бы форма не перезагружала страницу
        return false;
    });
    
    function update(text) {
        // что шлём
        var send_data = { last_id: $(chat).attr('data-last-id') };
        if (text)
            send_data.text = $(text).val();
        // шлём запрос
        $.post(
            'ajax.php',
            send_data, // отдаём скрипту данные
            function (data) {
                // ссылка пришла?
                if (data && $.isArray(data)) {
                    $(data).each(function (k) {
                        // формируем наше сообщение
                        var msg = $('<div>' + data[k].created + ': ' + data[k].text + '</div>');
                        // и цепляем его к чату
                        $(chat).append(msg);
                        // если ласт ид меньше пришедшего
                        if (parseInt($(chat).attr('data-last-id')) < data[k].id)
                            // запоминаем новый ласт ид
                            $(chat).attr('data-last-id', data[k].id);
                    });
                    
                    // если это отправка, то при получении ответа, включаем форму
                    if (text) {
                        // вклчюаем форму
                        $(form).find('input').attr("disabled", false);
                        // и очищаем текст
                        $(text).val('');
                    }

                    // прокрутка
                    $(chat).scrollTop(chat.scrollHeight);

                    // обновим таймер 
                    update_timer();
                }
            },
            'JSON' // полученные данные рассматривать как JSON объект
        );
    }

    // что бы при загрузке получить данные в чат, вызываем сразу апдейт
    update();
    
    // что бы окно чата обновлялось раз в 5 секунд, прицепим таймер
    var timer;
    function update_timer() {
        if (timer) // если таймер уже был, сбрасываем
            clearTimeout(timer);
        timer = setTimeout(function () {
            update();
        }, 5000);
    }
    update_timer();
});*/