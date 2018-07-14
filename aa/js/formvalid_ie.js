$(document).ready(function(){
        jVal = {
            /*фамилия*/
            'family' : function() {
                $('body').append('<div id="familyInfo" class="info"></div>');
                var familyInfo = $('#familyInfo');
                var ele = $('#family');
                var pos = ele.offset();
                familyInfo.css({
                            top: pos.top-3,
                            left: pos.left+ele.width()+15
                            });
                var pp = "/^[а-яА-Я]*$/";
                if(!pp.test(ele.val()))
                {
                jVal.errors = true;
                $('input[name=add_ok]').attr('disabled',true);
                familyInfo.removeClass('correct').addClass('error').html('← Не корректно введена фамилия. Можно использовать только русские буквы!').show();
                ele.removeClass('normal').addClass('wrong');
                }
                else {
                if(ele.val().length < 4) {
                jVal.errors = true;
                $('input[name=add_ok]').attr('disabled',true);
                familyInfo.removeClass('correct').addClass('error').html('← Минимум 4 символов').show();
                ele.removeClass('normal').addClass('wrong');
                } else {
                $('input[name=add_ok]').attr('disabled',false);
                familyInfo.removeClass('error').addClass('correct').html('√').show();
                ele.removeClass('wrong').addClass('normal');
                jVal.errors = false;
                }
                    }
            },
            /*имя*/
            'name' : function() {
                $('body').append('<div id="nameInfo" class="info"></div>');
                var nameInfo = $('#nameInfo');
                var ele = $('#name');
                var pos = ele.offset();
                nameInfo.css({
                            top: pos.top-3,
                            left: pos.left+ele.width()+15
                            });
                var pp = "/^[а-яА-Я]*$/";
                if(!pp.test(ele.val()))
                {
                jVal.errors = true;
                $('input[name=add_ok]').attr('disabled',true);
                nameInfo.removeClass('correct').addClass('error').html('← Не корректно введено имя. Можно использовать только русские буквы!').show();
                ele.removeClass('normal').addClass('wrong');
                }
                else {
                if(ele.val().length < 3) {
                jVal.errors = true;
                $('input[name=add_ok]').attr('disabled',true);
                nameInfo.removeClass('correct').addClass('error').html('← Минимум 3 символов').show();
                ele.removeClass('normal').addClass('wrong');
                } else {
                $('input[name=add_ok]').attr('disabled',false);
                nameInfo.removeClass('error').addClass('correct').html('√').show();
                ele.removeClass('wrong').addClass('normal');
                jVal.errors = false;
                }
                    }
            },
            /*отчество*/
            'lastname' : function() {
                $('body').append('<div id="lastnameInfo" class="info"></div>');
                var lastnameInfo = $('#lastnameInfo');
                var ele = $('#lastname');
                var pos = ele.offset();
                lastnameInfo.css({
                            top: pos.top-3,
                            left: pos.left+ele.width()+15
                            });
                var pp = "/^[а-яА-Я]*$/";
                if(!pp.test(ele.val()))
                {
                jVal.errors = true;
                $('input[name=add_ok]').attr('disabled',true);
                lastnameInfo.removeClass('correct').addClass('error').html('← Не корректно введено отчество. Можно использовать только русские буквы!').show();
                ele.removeClass('normal').addClass('wrong');
                }
                else {
                if(ele.val().length < 3) {
                jVal.errors = true;
                $('input[name=add_ok]').attr('disabled',true);
                lastnameInfo.removeClass('correct').addClass('error').html('← Минимум 3 символов').show();
                ele.removeClass('normal').addClass('wrong');
                } else {
                $('input[name=add_ok]').attr('disabled',false);
                lastnameInfo.removeClass('error').addClass('correct').html('√').show();
                ele.removeClass('wrong').addClass('normal');
                jVal.errors = false;
                }
                    }
            },
            /*возраст*/
            'vozrast' : function() {
                $('body').append('<div id="vozrastInfo" class="info"></div>');
                var vozrastInfo = $('#vozrastInfo');
                var ele = $('#vozrast');
                var pos = ele.offset();
                vozrastInfo.css({
                            top: pos.top-3,
                            left: pos.left+ele.width()+15
                            });
                var pp = "/^[0-9]*$/";
                if(!pp.test(ele.val()))
                {
                jVal.errors = true;
                $('input[name=add_ok]').attr('disabled',true);
                vozrastInfo.removeClass('correct').addClass('error').html('← Не корректно введен возраст. Можно использовать только цифры!').show();
                ele.removeClass('normal').addClass('wrong');
                }
                else {
                if(ele.val().length < 1) {
                jVal.errors = true;
                $('input[name=add_ok]').attr('disabled',true);
                vozrastInfo.removeClass('correct').addClass('error').html('← Минимум 1 символов').show();
                ele.removeClass('normal').addClass('wrong');
                } else {
                $('input[name=add_ok]').attr('disabled',false);
                vozrastInfo.removeClass('error').addClass('correct').html('√').show();
                ele.removeClass('wrong').addClass('normal');
                jVal.errors = false;
                }
                    }
            },
            
            /*Кнопка отправить*/
            'sendIt' : function (){
            if(!jVal.errors) {
                    $('#jform').submit();
                   }
                }
        };
        
/*==============================================*/
        
       $('#send').click(function (){
            if(jVal.errors==false) {
    var number=$("input[name=phone]").val();
   if($("input[name=dop_phone]").val()!=''){var number2=$("input[name=dop_phone]").val();}
    //if(number2){alert(number2);} 
      $.ajax({
         type: "POST",
         url: "http://46.254.18.98/telemarketing/no_number",
         data: {"number": number, "nonumber": 'nonumber'},
         cache: false,
         success: function(status){
             var messageResp = new Array('План успешно установлен','Ошибка при установки плана');
             var resultStat = messageResp[Number(status)];
             if(status == 0){
                alert("нет такого");
                jVal.errors = false; 
                /*$("#resp"+id+"").addClass('respSucces');
                $("#resp"+id+"").text(resultStat).show().delay(1500).fadeOut(800); */ 
             }
             else if(status == 1){
                alert("что то есть");  
                jVal.errors = false; 
             }
             //$("#resp"+id+"").text(resultStat).show().delay(1500).fadeOut(800);                                               
             }
          });
          //return false;   
          jVal.errors = false;                    
                    
}
            
                /*var obj = $.browser.webkit ? $('body') : $('html');
                obj.animate({ scrollTop: $('#jform').offset().top }, 750, function (){
                        jVal.errors = false;
                        jVal.fullName();
                        jVal.birthDate();
                        jVal.gender();
                        jVal.vehicle();
                        jVal.email();
                        jVal.about();
                        jVal.sendIt();
                });
                return false;*/
        });
        $('#family').change(jVal.family);
        $('#name').change(jVal.name);
        $('#lastname').change(jVal.lastname);
        $('#vozrast').change(jVal.vozrast);
        $('#timevstr').change(jVal.timevstr);
       
});