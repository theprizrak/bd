    //отправка сообщения по нажатию клавиш ctrl+enter
    function SendComment(e) {
    e = e || window.event;
    if (e.keyCode == 13 && e.ctrlKey) {
       send_messeg();
    };
   };
    
    //функция обновления списка пользователей каждые 30 сек.
    var timer_user;
    function update_timer_user() {
        if (timer_user) // если таймер уже был, сбрасываем
            clearTimeout(timer_user);
        timer_user = setTimeout(function () {
            update_user();
        }, 30000);
        update_timer_user();
    }
    //функция обновления списка сообщений каждые 10 сек.
   var timer_mail;
    function update_timer_mail() {
        if (timer_mail) // если таймер уже был, сбрасываем
            clearTimeout(timer_mail);
        timer_mail = setTimeout(function () {
            update_mail();
        }, 10000);
        update_timer_mail();
    }
    //пздц уже не соображаю как жто рабоатает
    //функция проверки новых сообшений 
    var timer_mail_ok;
    function update_timer_mail_ok() {
        if (timer_mail_ok) // если таймер уже был, сбрасываем
            clearTimeout(timer_mail_ok);
        timer_mail_ok = setTimeout(function () {
            
            //newpm();
            var id_user_out=$('#id_out').val();
            $.ajax({
            type: "POST",
            url: "http://37.143.14.70/chat/get_all_count_mail_ok",
            data: {"id_user_out":id_user_out},
            cache: false,
            success: function(status){
                //alert(status);
             if(status!=0){$('#chat_ajax').css('background','url(/images/newpm.gif)');}
             else{$('#chat_ajax').css('background','url(/images/pm.png)');}                                         
            }    
            }); 
        }, 3000);
        update_timer_mail_ok();
    }
    
function newpm()
{
var id_user_out=$('#id_out').val();
$.ajax({
type: "POST",
url: "http://37.143.14.70/chat/get_all_count_mail_ok",
data: {"id_user_out":id_user_out},
cache: false,
success: function(status){
    //alert(status);
 if(status!=0){$('#chat_ajax').css('background','url(/images/newpm.gif)');}
 else{$('#chat_ajax').css('background','url(/images/pm.png)');}                                         
}    
}); 
update_timer_mail_ok(); 
}

function msg_ok()
{
var id_user_in=$('#id_in').val();
var id_user_out=$('#id_out').val();
$.ajax({
 type: "POST",
 url: "http://37.143.14.70/chat/mail_ok",
 data: {"id_user_in":id_user_in,"id_user_out":id_user_out},
 cache: false,
 success: function(status){
     if(status == 1){$('#pm'+id_user_in+'').css('display','none');}                                         
     }    
  });
 update_user();
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
var id_user_out=$('#id_out').val();
$.ajax({
 type: "POST",
 url: "http://37.143.14.70/chat/get_user_list",
 data: {"id_user_out":id_user_out},
 cache: false,
 success: function(status){
    //alert(status['query']);
     if(status == 1){
       // alert(status);
    }
     else{
        var status = JSON.parse(status);
        var user_in=$('#user_out').val();
        var q="'";
        $("#userlist_chat").empty();
        for(i=0;i<status.length;i++)
        {
        if(user_in!=status[i]["name"]){
            
        $("#userlist_chat").append(
        '<div style="border-bottom: 1px solid #D36E6E;padding: 2px;margin-top: 2px;"><a class="change_user" onclick="change_user_chat('+q+status[i]["id_user"]+q+','+q+status[i]["name"]+q+')">'+status[i]["name"]+'</a><div class="newpm" id="pm'+status[i]["id_user"]+'"></div></div>'
        );
        
           /* var id_user='';
            var id_user=status[i]["id_user"];
     $.ajax({
     type: "POST",
     url: "http://37.143.14.70/chat/get_count_mail_ok",
     data: {"id_user_out":id_user_out,"id_user_in":id_user},
     cache: false,
     success: function(status2){
      if(status2!=0){$('#pm'+status[i]["id_user"]).css('display','inline-block').html('+'+status2);}
      }    
      }); */
  
        }
        }
        $('#send_msg_loader').css('display','none');
        $('#textarea_msg_loader').css('display','none');
        count_new_mail();
        update_timer_user();
        }                                          
     }    
  }); 
}

function count_new_mail()
{
 var id_user_out=$('#id_out').val();

 $.ajax({
 type: "POST",
 url: "http://37.143.14.70/chat/get_user_list",
 data: {"id_user_out":id_user_out},
 cache: false,
 success: function(status){
     if(status == 1){
    }
     else{
        var status = JSON.parse(status);
        //alert (status.length);
        for(i=0;i<status.length;i++)
        {
             var id_user='';
             var id_user=status[i]["id_user"];
             //alert(id_user);
             $.ajax({
             type: "POST",
             url: "http://37.143.14.70/chat/get_count_mail_ok",
             data: {"id_user_out":id_user_out,"id_user_in":id_user},
             cache: false,
             success: function(status_count){
                //alert(status_count);
              if(status_count!=0){$('#pm'+id_user).css('display','inline-block').html('+'+status_count);}
              }    
              }); 
        }
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
        $.ajax({
         type: "POST",
         url: "http://37.143.14.70/chat/get_mail_user",
         data: {"load_msg": "load_msg", "id_user_in": id_user, "user_in": user_in, "id_user_out": id_user_out},
         cache: false,
         success: function(status){
            //alert(status);
             if(status == 1){
                $("#textarea_chat").html('<p><b>Сообщений нет</b></p>');
               // alert(status);
            }
             else{
                var status = JSON.parse(status);
               $("#textarea_chat").empty();       
               for(i=status.length-1;i>=0;i--)
                {
                if(status[i]["id_in"]==id_user){var cls="_in";}else{var cls="_out";}
                $("#textarea_chat").append(
                '<div id="im_user'+status[i]["id"]+'" class="im_user'+cls+'"><div class="name_chat_user">'+status[i]["user_out"]+'</div><div class="date_chat_user">'+status[i]["date"]+' '+status[i]["time"]+'</div><div class="msg_chat_user">'+status[i]["messeg"]+'</div></div>'
                
                //'<tr><td width="270">'+status[i]["user_in"]+'</td><td>'+status[i]["date"]+' '+status[i]["time"]+'</td></tr><tr><td colspan="2">'+status[i]["messeg"]+'</td></tr>'
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
         url: "http://37.143.14.70/chat/chat_ajax",
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
                }                                              
             }
          });
          
}

function open_chat()
{
    //$('#sendmessendg_chat').css('display','block');
    //$('#send_msg_loader').css('display','block');
    update_user();
    $("#middle_chat").show('blind');//.css('display','block');
}
function close_chat()
{
    clearTimeout(timer_user);
    clearTimeout(timer_mail);
    $("#middle_chat").hide('blind');//.css('display','none');
}