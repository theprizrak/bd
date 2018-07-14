$(function() {
		var offset = $("#pagination").offset();
		var topPadding = 5;
		$(window).scroll(function() {
			if ($(window).scrollTop() > offset.top) {
				$("#pagination").stop().attr('class', 'pagination_scroll').animate({marginTop: $(window).scrollTop() - offset.top + topPadding});
			}
			else {$("#pagination").stop().removeClass('pagination_scroll').animate({marginTop: 0});};});
});

function todayZvon()
{
if($.cookie('today_zvon')=="" || $.cookie('today_zvon')=="today_zvon_close")
{
$('#today_zvon').removeClass('today_zvon_close').addClass('today_zvon_open');
// Создать куку
$.cookie('today_zvon', 'today_zvon_open', { expires: 1 });
//sessionStorage['today_zvon'] = 'today_zvon_open';
}
else
{
$('#today_zvon').removeClass('today_zvon_open').addClass('today_zvon_close');
// Создать куку
$.cookie('today_zvon', 'today_zvon_close', { expires: 1 });
//sessionStorage['today_zvon'] = 'today_zvon_close';
}
}

function safe_info_msg()
{
var text_msg=$('textarea[name=text_msg]').val();
var color_bg_msg=$('select[name=color_bg_msg]').val();
$.ajax({
         type: "POST",
         url: "http://37.143.14.70/admin/safe_info_msg",
         data: {"safe_info_msg": "safe_info_msg", "text_msg": text_msg, "color_bg_msg": color_bg_msg},
         cache: false,
         success: function(status){
             var messageResp = new Array('Сохранено','Ошибка. Обратитесь к системному администратору');
             var resultStat = messageResp[Number(status)];
           if(status == 0){
$('#preloader').css('display','none'); 
$('#blackFon').css('display','none');
$('#info').text(resultStat).show('blind').delay(200).fadeOut(800);
}
else if(status == 1){
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
$('#info').text(resultStat).show('blind').delay(500).fadeOut(800);
}
                        
             }
          });

}

function info(info,s){
if(s==0){$('#info').text(info).show('blind').delay(1500).fadeOut(800);}
else{$('#info').text(info).show('blind').delay(1500).fadeOut(800);}
}

function phones(){
    $('body').append('<div id="phoneInfo" class="info"></div>');
    var number=$("input[name=phone]").val();
    var phoneInfo = $('#phoneInfo');
    var ele = $('#phone');
    var pos = ele.offset();
   phoneInfo.css({
            top: pos.top-3,
            left: pos.left+ele.width()+15
            });
            if(number!='')
            {
      $.ajax({
         type: "POST",
         url: "http://37.143.14.70/telemarketing/no_number",
         data: {"number": number, "nonumber": 'nonumber'},
         cache: false,
         success: function(status){
             var messageResp = new Array('План успешно установлен','Ошибка при установки плана');
             var resultStat = messageResp[Number(status)];
             if(status == 0){
                $('input[name=add_ok]').attr('disabled',false);
                phoneInfo.removeClass('error').addClass('correct').html('√').show();
                ele.removeClass('wrong').addClass('normal');
                jVal.errors = false;
            }
             else if(status == 1){
                jVal.errors = true;
                $('input[name=add_ok]').attr('disabled',true);
                phoneInfo.removeClass('correct').addClass('error').html('X ← Данный номер телефона уже зарегистрирован в базе').show();
                ele.removeClass('normal').addClass('wrong');
                alert('Данный номер телефона уже зарегистрирован в базе');
                }                                              
             }
          });
          }                  
}
function timevstrs(){
            $('body').append('<div id="timevstr" class="info"></div>');
            var timevstr = $('#timevstr');
            var ele = $('#time_vstr');
            var pos = ele.offset();
            timevstr.css({
                    top: pos.top-3,
                    left: pos.left+ele.width()+15
            });
                var mask = ele.val();
            	mask = mask.split( ":" );
            		if ( mask[0] > 23 || mask[1] > 60 ) {
          		    jVal.errors = true;
                    $('input[name=add_ok]').attr('disabled',true);
                    timevstr.removeClass('correct').addClass('error').html('← Некорректно указанно время').show();
                    ele.removeClass('normal').addClass('wrong');
            		} else {
            		  $('input[name=add_ok]').attr('disabled',false);
                    timevstr.removeClass('error').addClass('correct').html('√').show();
                    ele.removeClass('wrong').addClass('normal');
                    jVal.errors = false
            		}
}
function timeperez(){
            $('body').append('<div id="timeperez" class="info"></div>');
            var timeperez = $('#timeperez');
            var ele = $('#time_perezvon');
            var pos = ele.offset();
            timeperez.css({
                    top: pos.top-3,
                    left: pos.left+ele.width()+15
            });
                var mask = ele.val();
            	mask = mask.split( ":" );
            		if ( mask[0] > 24 || mask[1] > 60 ) {
          		    jVal.errors = true;
                    $('input[name=add_ok]').attr('disabled',true);
                    timeperez.removeClass('correct').addClass('error').html('← Некорректно указанно время').show();
                    ele.removeClass('normal').addClass('wrong');
            		} else {
            		  $('input[name=add_ok]').attr('disabled',false);
                    timeperez.removeClass('error').addClass('correct').html('√').show();
                    ele.removeClass('wrong').addClass('normal');
                    jVal.errors = false
            		}
}

function addClient(){
    var form = document.getElementById("jform");
    var vstr=$('select[name=vstrecha]').val();
    var perz=$('select[name=perezvon_tm]').val();
    var names=$('input[name=name]').val();
    var lastnames=$('input[name=lastname]').val();
    var familys=$('input[name=family]').val();
    var otkazvstr=$('select[name=otkaz_tm]').val();


    if(names=='' || lastnames=='' || familys=='')
    {
      alert("Пожалуйста, укажите фамилию, имя или отчество клиента!");
      exit();  
    }
    else
    {
        if(otkazvstr==1)
        {
            $("#add_okkk").click();
        }
        else
        {
            if(vstr==1)
            {
                var vstr_date_vstr=$('input[name=date_vstr]').val();
                var vstr_time_vstr=$('input[name=time_vstr]').val();
                var vstr_type_procedur=$('select[name=type_procedur]').val();
                var phone=$('input[name=phone]').val();
                if(vstr_date_vstr=="")
                {
                    alert("Вы не указали дату встречи");
                    exit();
                }
                else if(vstr_time_vstr=="")
                {
                    alert("Вы не указали время встречи");
                    exit();
                }
                else if(vstr_type_procedur=="")
                {
                    alert("Вы не указали процедуру");
                    exit();
                }
                else if(phone=="")
                {
                    alert("Вы не указали номер телефона");
                    exit();
                } 
                else 
                {
                   $("#add_okkk").click();
                }
            }
            else if(perz==1)
            {
                var perz_date_perezvon=$('input[name=date_perezvon]').val();
                var perz_time_perezvon=$('input[name=time_perezvon]').val();
                var perz_tema_perezvon=$('input[name=tema_perezvon]').val();
                
                if(perz_date_perezvon=="")
                {
                    alert("Вы не указали дату перезона");
                    exit();
                }
                else if(perz_time_perezvon=="")
                {
                    alert("Вы не указали время перезвона");
                    exit();
                }
                else if(perz_tema_perezvon=="")
                {
                    alert("Вы не указали тему перезвона");
                    exit();
                }
                else 
                {
                    $("#add_okkk").click();
                }
            }
            else
            {
                alert("Пожалуйста, укажите встречу или перезвон!");
                exit();
            }
        }
    }
    
}
//сохранение клиента на телемаркетинге сервиса
function safeklientkredit()
{
var input=$('#add_klients').serialize();
var id=$('input[name=id]').val();
//alert(input);
$('#blackFon').css('display','block');
$('#preloader').css('display','block');
$.ajax({
type: "POST",
url: "kredit",
data: input,
cache: false,
success: function(status){
//alert(status);
var messageResp = new Array('Клиент успешно сохранен','Ошибка. Возможно заполнены не все поля');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#preloader').css('display','none');
//$('#blackFon').css('display','none');
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
setTimeout("window.location = '/kredit/all_dog?id="+id+"'", 2000)
//$("#ok"+id+"").fadeOut(200); 
//$(".pod_oks"+id+"").text('Подтверждено').show('blind'); 
}
else if(status == 1){
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
}
}
});
}
//сохранение клиента на ресепшене сервиса
function safeklientsresep(id)
{
var family=$('input[name=family]').val();
var name=$('input[name=name]').val();
var lastname=$('input[name=lastname]').val();
var brichday=$('input[name=brichday]').val();
var vozrast=$('input[name=vozrast]').val();
var status=$('select[name=status]').val();
var phone=$('input[name=phone]').val();

//alert(family+' '+name+' '+lastname+' '+brichday+' '+vozrast+' '+status+' '+phone+' '+id);

$('#blackFon').css('display','block');
$('#preloader').css('display','block');
$.ajax({
type: "POST",
url: "/sreseption/safe_vstr",
data: {"id": id, "family": family, "name": name, "lastname": lastname, "brichday": brichday, "vozrast": vozrast, "status": status, "phone": phone, "safe_sresep": 'safe_sresep'},
cache: false,
success: function(status){
var messageResp = new Array('Сохранено','Ошибка. Обратитесь к Администратору');
var resultStat = messageResp[Number(status)];
//alert(status);
if(status == 0){
$('#preloader').css('display','none');
//$('#blackFon').css('display','none');
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
setTimeout("window.location = '/sreseption/edit?id="+id+"'", 2000)
}
else if(status == 1){
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
}
else if(status == 2){
alert(resultStat);
}
}
});
}
//Подтверждающий телемаркетинг

/*function perezzzzvon()
{
   var el=$('select[name="perezvon"]').val();
   if(el==1)
   { $('.Sel1').fadeIn(300); }
   else
   { $('.Sel1').fadeOut(300); }
}*/

/*function vstrrre()
{
   var el=$('select[name="vstrecha"]').val();
   if(el==1)
   { $('.vstr1').fadeIn(300); }
   else
   { $('.vstr1').fadeOut(300); }
}*/
function newvstr()
{
$('<tr><td><input type="text" name="date_vstr" id="dpicker" onclick="dpicker()" class="vstr add1 datepicker2" value="" ></td><td><input type="text" name="time_vstr" class="add1 time" value="" ></td><td><select name="type_procedur" class="select1"><option value="" selected="selected">&nbsp;</option><option value="СПА Волосы">СПА Волосы</option><option value="СПА Лицо">СПА Лицо</option><option value="СПА Волосы">СПА Волосы</option></select></td><td><input name="user" type="text" class="add1" value="<?=$us;?>" readonly="readonly"></td><td><select name="office" class="select1"><option value="Офис 1">Офис 1</option><option value="Офис 2">Офис 2</option></select></td><td colspan="6">Комментарий: <input type="text" name="comments" style="border: 1px solid #ccc;  border-radius: 3px;  padding: 2px;  width: 560px;" value=""></td></tr>'
).appendTo("#newvstr");
$('.ss1').css('height', 0);
$('.Sel1').fadeIn(100);
$('#avst').fadeOut(100);
$('#azvon').fadeOut(100);
}
function newzvon()
{
$('<tr><td><input type="text" name="date_perezvon" class="add1 datepicker" value=""></td><td><input type="text" name="time_perezvon" class="add1 time" value=""></td><td><input type="text" name="tema_perezvon" id="time" class="add1" value=""></td><td><textarea name="comment_perezvon" cols="30" rows="6" style="resize: none;border: 1px solid #ccc;"></textarea></td></tr>'
).appendTo("#newzvon");
$('.ss2').css('height', 0);
$('#azvon').fadeOut(100);
$('#avst').fadeOut(100);
}

function otkazvstr()
{
   var el=$('select[name="otkaz"]').val();
   if(el==1)
   { $('.Sel2').fadeIn(300);$('.otkz').fadeOut(300);}
   else
   { $('.Sel2').fadeOut(300);$('.otkz').fadeIn(300);}
}
function otkazvstr_ptel()
{
   var el=$('select[name="otkaz_tm"]').val();
   if(el==1)
   { $('.Sel2').fadeIn(300);$('.otkz').fadeOut(300);}
   else
   { $('.Sel2').fadeOut(300);$('.otkz').fadeIn(300);}
}
function otkzvstr()
{
   var el=$('select[name="otkz_vstr"]').val();
   if(el==1)
   { $('.otkz_vstr').fadeOut(300);}
   else
   { $('.otkz_vstr').fadeIn(300);$('.qwe').fadeOut(300);}
}
function pod_ok(id,date,st)
{
var dd=$("input[name=dd"+date+"]").val();
var tt=$("input[name=tt"+date+"]").val();
var uu=$("input[name=uu"+date+"]").val();
if(st==1){var infos="Подтверждено";}
if(st==2){var infos="Н.Д";}
if(st==3){var infos="Перенос";}

if(st==1){var resultinfo="Встреча подтверждена";}
if(st==2){var resultinfo="Установлен статус Н.Д";}
if(st==3){var resultinfo="Встреча перенесена";}

if(dd=='' || tt=='' || uu=='')
{alert('Не указана Дата встречи, Время встречи или Сотрудник!');}
else
{
$('#blackFon').css('display','block');
$('#preloader').css('display','block');
$.ajax({
type: "POST",
url: "pod_ok",
data: {"id": id, "dd": dd, "tt": tt, "uu": uu, "pod_ok": 'pod_ok', "st": st},
cache: false,
success: function(status){
var messageResp = new Array('Встреча подтверждена','Ошибка. Обратитесь к администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#info').text(resultinfo).show('blind').delay(1500).fadeOut(800);
//$("#ok"+date+"").fadeOut(200);
$("input[name=ok"+date+"]").attr("style","display:none");
$("input[name=ok"+date+"]").attr("style","display:none");
$("input[name=ok"+date+"]").attr("style","display:none");

$("input[name=dd"+date+"]").removeAttr("style").attr("readonly","readonly");
$("input[name=tt"+date+"]").removeAttr("style").attr("readonly","readonly");
$("select[name=tpr"+date+"]").removeAttr("style").attr("disabled","disabled");
$("input[name=safe"+date+"]").attr("style","display: none"); 

$(".pod_oks"+date+"").text(infos).show('blind'); 
$('#preloader').css('display','none'); 
$('#blackFon').css('display','none');
}
else if(status == 1){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
}
//$("#resp"+id+"").text(resultStat).show().delay(1500).fadeOut(800);                                               
}
});
}
return false;               
}


function dpicker()
{
$('$dpicker').datepicker(
{
changeMonth: true,
changeYear: true,
yearRange: "c-60:+0"
}
); 
 
}
// делегированно назначаем событие для нового блока
/*$('#newvstr').on('click', '.datepicker2', function () {
     datepicker(
    {
      changeMonth: true,
      changeYear: true,
      yearRange: "c-60:+0"
    }
    );
});*/

//=======================================

/* Телемаркетинг */

//сохрвнение встречи
function savevstr()
{
var date_vstr=$('input[name=date_vstr]').val();
var time_vstr=$('input[name=time_vstr]').val();
var proc_vstr=$('select[name=type_procedur]').val();
var otkz=$('select[name=otkaz]').val();
var otkz_com=$('input[name=prichotkaza]').val();
if(otkz==0)
{
if(date_vstr=="")
{
    alert('Вы не указали дату встречи');
    exit();
}
if(time_vstr=="")
{
    alert('Вы не указали время встречи');
    exit();
}
if(proc_vstr=="")
{
    alert('Вы не указали процедуру');
    exit();
}
else
{
$('#blackFon').css('display','block');
$('#preloader').css('display','block');
var a=$('#newadd').length;
if(a==1){var b="#newadd";}else{var b="#newadd"+a+"";}
var ids=$('input[name=id]').val();
var date_vstr=$('input[name=date_vstr]').val();
var time_vstr=$('input[name=time_vstr]').val();
var type_procedur=$('select[name=type_procedur]').val();
var office=$('select[name=office]').val();
var user=$('input[name=user]').val();
var comments=$('input[name=comments]').val();
var otkaz=$('select[name=otkaz]').val();
var prichotkaza=$('textarea[name=prichotkaza]').val();
$.ajax({
type: "POST",
url: "/telemarketing/save_vstr_przv",
data: {save_vstr: 'save_vstr', id: ids, date_vstr:date_vstr, time_vstr:time_vstr, type_procedur:type_procedur, office:office, user:user, comments:comments, otkaz:otkaz, prichotkaza:prichotkaza},
cache: false,
success: function(status){
//alert(status);
var messageResp = new Array('Встреча успешно сохранена','Ошибка. Обратитесь к системному администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#preloader').css('display','none'); 
//$('#blackFon').css('display','none');
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
//$(b).fadeOut(200);
//$(".Sel1").fadeOut(200);
//$(".Sel3").fadeOut(200);
//$('.ss1').css('height', 40);
//$('#avst').attr('style','display:inline');
//$('<tr><td><input type="text" class="add1" value="'+date_vstr+'" readonly="readonly"></td><td><input type="text" class="add1" value="'+time_vstr+'" readonly="readonly"></td><td><input type="text" class="add1" value="'+type_procedur+'" readonly="readonly"></td><td><input type="text" class="add1" value="'+user+'" readonly="readonly"></td><td><input type="text" class="add1" value="" readonly="readonly"></td><td><input type="text" class="add1" value="'+office+'" readonly="readonly"></td><td><input type="text" class="add1" value="0" readonly="readonly"></td><td><input type="text" class="add1" value="" readonly="readonly"></td><td><input type="text" class="add1" value="'+prichotkaza+'" readonly="readonly"></td><td><textarea style="resize: none;border: 1px solid #ccc;">'+comments+'</textarea></td><td><input type="text" class="add1" value="Нет" readonly="readonly"></td></tr>').prependTo("#newvstr");
setTimeout("window.location = '/telemarketing/edit?id="+ids+"'", 2000);
}
else if(status == 1){
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
}
}
});
}
 }
 else
 {
$('#blackFon').css('display','block');
$('#preloader').css('display','block');
var ids=$('input[name=id]').val();
var dates=new Date();
var d=dates.getDate();
var m=dates.getMonth()+1;
var y=dates.getUTCFullYear();
var date_vstr=d+'.'+m+'.'+y;
var otkaz=$('select[name=otkaz]').val();
var prichotkaza=$('textarea[name=prichotkaza]').val();
var office=$('select[name=office]').val();
var user=$('input[name=user]').val();
$.ajax({
type: "POST",
url: "/telemarketing/save_vstr_przv",
data: {save_vstr: 'save_vstr', id: ids, date_vstr:date_vstr,office:office, user:user, comments:comments, otkaz:otkaz, prichotkaza:prichotkaza},
cache: false,
success: function(status){
//alert(status);
var messageResp = new Array('Встреча успешно сохранена','Ошибка. Обратитесь к системному администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#preloader').css('display','none'); 
$('#blackFon').css('display','none');
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$(b).fadeOut(200);
$(".Sel1").fadeOut(200);
$(".Sel3").fadeOut(200);
//$('.ss1').css('height', 40);
//$('#avst').attr('style','display:inline');
$('<tr style="background: #FF0303;"><td><input type="text" class="add1" value="'+date_vstr+'" readonly="readonly"></td><td><input type="text" class="add1" value="" readonly="readonly"></td><td><input type="text" class="add1" value="" readonly="readonly"></td><td><input type="text" class="add1" value="'+user+'" readonly="readonly"></td><td><input type="text" class="add1" value="" readonly="readonly"></td><td><input type="text" class="add1" value="'+office+'" readonly="readonly"></td><td><input type="text" class="add1" value="0" readonly="readonly"></td><td><input type="text" class="add1" value="" readonly="readonly"></td><td><input type="text" class="add1" value="'+prichotkaza+'" readonly="readonly"></td><td><textarea style="resize: none;border: 1px solid #ccc;">'+comments+'</textarea></td><td><input type="text" class="add1" value="Нет" readonly="readonly"></td></tr>').prependTo("#newvstr");
}
else if(status == 1){
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
}
}
});
    
 }
 
 
}

//сохранение встречи на сервисе телемаркетинга
function savesvstr()
{
var date_vstr=$('input[name=date_vstr]').val();
var time_vstr=$('input[name=time_vstr]').val();
var proc_vstr=$('input[name=sproc]').val();
var otkz=$('select[name=otkaz]').val();
var text_prichotkaza=$('input[name=text_prichotkaza]').val();

if(otkz==0)
{
if(date_vstr=="")
{
    alert('Вы не указали дату встречи');
    exit();
}
if(time_vstr=="")
{
    alert('Вы не указали время встречи');
    exit();
}
if(proc_vstr=="")
{
    alert('Вы не указали процедуры');
    exit();
}
else
{
$('#blackFon').css('display','block');
$('#preloader').css('display','block');
var ids=$('input[name=id]').val();
var date_vstr=$('input[name=date_vstr]').val();
var time_vstr=$('input[name=time_vstr]').val();
var sproc=$('select[name=sproc]').val();
var user=$('input[name=user]').val();
var doctor=$('select[name=doctor]').val();
var otkaz=$('select[name=otkaz]').val();
var text_prichotkaza=$('textarea[name=text_prichotkaza]').val();


$.ajax({
type: "POST",
url: "/stelemarketing/save_svstr",
data: {save_svstr: 'save_svstr', id: ids, date_vstr:date_vstr, time_vstr:time_vstr, sproc:sproc, user:user, doctor:doctor, otkaz:otkaz, text_prichotkaza:text_prichotkaza},
cache: false,
success: function(status){
//alert(sproc);   
//alert(status);

var messageResp = new Array('Встреча успешно сохранена','Ошибка. Обратитесь к системному администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#preloader').css('display','none'); 
//$('#blackFon').css('display','none');
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
setTimeout("window.location = '/stelemarketing/edit?id="+ids+"'", 2000)

}
else if(status == 1){
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
}
}
});
}

 }
 //отказ от встречи сервис телемаркетинг
 else
 {
     
$('#blackFon').css('display','block');
$('#preloader').css('display','block');
var ids=$('input[name=id]').val();
var dates=new Date();
var d=dates.getDate();
var m=dates.getMonth();
var y=dates.getUTCFullYear();
var date_vstr=y+'-'+m+'-'+d;
var user=$('input[name=user]').val();
var otkaz=$('select[name=otkaz]').val();
var text_prichotkaza=$('textarea[name=text_prichotkaza]').val();

$.ajax({
type: "POST",
url: "/stelemarketing/save_svstr",
data: {save_svstr: 'save_svstr',otkz_vstr:'otkz_vstr', id: ids, date_vstr:date_vstr, user:user, otkaz:otkaz, text_prichotkaza:text_prichotkaza},
cache: false,
success: function(status){
//alert(sproc);   
//alert(status);

var messageResp = new Array('Встреча успешно сохранена','Ошибка. Обратитесь к системному администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#preloader').css('display','none'); 
//$('#blackFon').css('display','none');
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
setTimeout("window.location = '/stelemarketing/edit?id="+ids+"'", 2000)

}
else if(status == 1){
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
}
}
});
}
      
 } 

//сохранение встречи на сервисе ресепшена
function savesvstr_sresep()
{
var date_vstr=$('input[name=date_vstr]').val();
var time_vstr=$('input[name=time_vstr]').val();
var proc_vstr=$('input[name=sproc]').val();
var otkz=$('select[name=otkaz]').val();
var text_prichotkaza=$('input[name=text_prichotkaza]').val();

if(otkz==0)
{
if(date_vstr=="")
{
    alert('Вы не указали дату встречи');
    exit();
}
if(time_vstr=="")
{
    alert('Вы не указали время встречи');
    exit();
}
if(proc_vstr=="")
{
    alert('Вы не указали процедуры');
    exit();
}
else
{
$('#blackFon').css('display','block');
$('#preloader').css('display','block');
var ids=$('input[name=id]').val();
var date_vstr=$('input[name=date_vstr]').val();
var time_vstr=$('input[name=time_vstr]').val();
var sproc=$('select[name=sproc]').val();
var user=$('input[name=user]').val();
var doctor=$('select[name=doctor]').val();
var otkaz=$('select[name=otkaz]').val();
var text_prichotkaza=$('textarea[name=text_prichotkaza]').val();


$.ajax({
type: "POST",
url: "/stelemarketing/save_svstr",
data: {save_svstr: 'save_svstr', id: ids, date_vstr:date_vstr, time_vstr:time_vstr, sproc:sproc, user:user, doctor:doctor, otkaz:otkaz, text_prichotkaza:text_prichotkaza},
cache: false,
success: function(status){
//alert(sproc);   
//alert(status);

var messageResp = new Array('Встреча успешно сохранена','Ошибка. Обратитесь к системному администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#preloader').css('display','none'); 
//$('#blackFon').css('display','none');
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
setTimeout("window.location = '/sreseption/edit?id="+ids+"'", 2000)

}
else if(status == 1){
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
}
}
});
}

 }
  //отказ от встречи сервис ресепшена
 else
 {
     
$('#blackFon').css('display','block');
$('#preloader').css('display','block');
var ids=$('input[name=id]').val();
var dates=new Date();
var d=dates.getDate();
var m=dates.getMonth();
var y=dates.getUTCFullYear();
var date_vstr=y+'-'+m+'-'+d;
var user=$('input[name=user]').val();
var otkaz=$('select[name=otkaz]').val();
var text_prichotkaza=$('textarea[name=text_prichotkaza]').val();

$.ajax({
type: "POST",
url: "/stelemarketing/save_svstr",
data: {save_svstr: 'save_svstr',otkz_vstr:'otkz_vstr', id: ids, date_vstr:date_vstr, user:user, otkaz:otkaz, text_prichotkaza:text_prichotkaza},
cache: false,
success: function(status){
//alert(sproc);   
//alert(status);

var messageResp = new Array('Встреча успешно сохранена','Ошибка. Обратитесь к системному администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#preloader').css('display','none'); 
//$('#blackFon').css('display','none');
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
setTimeout("window.location = '/stelemarketing/edit?id="+ids+"'", 2000)

}
else if(status == 1){
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
}
}
});
}
      
 } 

//сохрвнение звонка
function newpzvon()
{
var a=$('#newprzadd').length;
if(a==1){var b="#newprzadd";}else{var b="#newprzadd"+a+"";}
var ids=$('input[name=id]').val();
var date_perezvon=$('input[name=date_perezvon]').val();
var time_perezvon=$('input[name=time_perezvon]').val();
var tema_perezvon=$('input[name=tema_perezvon]').val();
var comment_perezvon=$('textarea[name=comment_perezvon]').val();

if(date_perezvon=="")
{
    alert('Вы не указали дату перезвона');
    exit();
}
if(time_perezvon=="")
{
    alert('Вы не указали время перезвона');
    exit();
}
/*if(tema_perezvon=="")
{
    alert('Вы не указали тему');
}*/
else
{
$('#blackFon').css('display','block');
$('#preloader').css('display','block');
$.ajax({
type: "POST",
url: "/telemarketing/save_vstr_przv",
data: {save_przv: 'save_przv', id: ids, date_perezvon:date_perezvon, time_perezvon:time_perezvon, tema_perezvon:tema_perezvon, comment_perezvon:comment_perezvon},
cache: false,
success: function(status){
//alert(status);
var messageResp = new Array('Перезвон успешно добавлен','Ошибка. Обратитесь к системному администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#preloader').css('display','none'); 
$('#blackFon').css('display','none');
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$(b).fadeOut(200);
$(".Selp").fadeOut(200);
//$("#svst").fadeOut(200);
//$('.ss1').css('height', 40);
//$('#avst').attr('style','display:inline');
$('<tr><td><input type="text" class="add" value="'+date_perezvon+'" readonly="readonly"></td><td><input type="text" class="add" value="'+time_perezvon+'" readonly="readonly"></td><td><input type="text" class="add" value="'+tema_perezvon+'" readonly="readonly"></td><td><textarea cols="30" rows="6" style="resize: none;border: 1px solid #ccc;" readonly="readonly">'+comment_perezvon+'</textarea></td></tr>').prependTo("#newzvon");
}
else if(status == 1){
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
}
}
});
}
 
}

//включение и отключение процедур
function proc_state(id)
{
    //var proc_states = $("select[name=check"+id+"]").val();
    var proc = $("input[name=check"+id+"]").prop("checked");
    if(proc==true){proc_states='on';}else{proc_states='off';}
   //alert(proc_states);

$('#blackFon').css('display','block');
$('#preloader').css('display','block');
$.ajax({
type: "POST",
url: "/admin/procedurs",
data: {save_proc: 'save_proc', id: id, proc: proc_states},
cache: false,
success: function(status){
var messageResp = new Array('Сохранено','Ошибка. Обратитесь к системному администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#preloader').css('display','none'); 
$('#blackFon').css('display','none');
$('#info').text(resultStat).show('blind').delay(500).fadeOut(800);
}
else if(status == 1){
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
$('#info').text(resultStat).show('blind').delay(500).fadeOut(800);
}
}
});
}

//сохранение времени выполнения процедуры 
function safe_time(id)
{
var time=$("input[name=time"+id+"]").val();

$('#blackFon').css('display','block');
$('#preloader').css('display','block');
$.ajax({
type: "POST",
url: "/admin/procedurs",
data: {save_time: 'save_time', id: id, time: time},
cache: false,
success: function(status){
//alert(status);
var messageResp = new Array('Сохранено','Ошибка. Обратитесь к системному администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#preloader').css('display','none'); 
$('#blackFon').css('display','none');

//$('#'+id+'').animate({"background":"#81EB8A",}, 500);

//$('#'+id+'').attr("style","background:rgba(196, 242, 224, 1);");
//setTimeout("window.location = '/ptelemarketing/edit?id="+id_client+"'", 2000)
//setTimeout("$('#"+id+"').removeAttr('style')",1500);
//document.getElementById('#'+id+'').style.background = '196, 242, 224, 1';
//setTimeout(document.getElementById('#'+id+'').style.background = '',1500)

//$('#'+id+'').style('background:#400000').delay(1500).removeAttr("style");

//$('#info').text(resultStat).show('blind').delay(500).fadeOut(800);
}
else if(status == 1){
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
//$('#info').text(resultStat).show('blind').delay(500).fadeOut(800);
}
}
});
}

//добавление процедуры в админке
function new_proc()
{
    var new_proc = prompt('Введите название процедуры');
    if(new_proc!=null)
    {
        $('#blackFon').css('display','block');
        $('#preloader').css('display','block');
        $.ajax({
        type: "POST",
        url: "/admin/procedurs",
        data: {add_proc: 'add_proc', new_proc: new_proc},
        cache: false,
        success: function(status){
        var messageResp = new Array('Сохранено','Ошибка. Обратитесь к системному администратору');
        var resultStat = messageResp[Number(status)];
        if(status == 0){
        $('#preloader').css('display','none'); 
        $('#blackFon').css('display','none');
        window.location = '/admin/procedurs';
        }
        else if(status == 1){
        $('#preloader').css('display','none');
        $('#blackFon').css('display','none'); 
        alert(resultStat);
        }
        }
        });   
    }
}
//добавление процедуры на сервисе ресепшена
function new_proc_sresep()
{
    var new_proc = prompt('Введите название процедуры');
    if(new_proc!=null)
    {
        $('#blackFon').css('display','block');
        $('#preloader').css('display','block');
        $.ajax({
        type: "POST",
        url: "/sreseption/procedurs",
        data: {add_proc: 'add_proc', new_proc: new_proc},
        cache: false,
        success: function(status){
        var messageResp = new Array('Сохранено','Ошибка. Обратитесь к системному администратору');
        var resultStat = messageResp[Number(status)];
        if(status == 0){
        $('#preloader').css('display','none'); 
        $('#blackFon').css('display','none');
        window.location = '/sreseption/procedurs';
        }
        else if(status == 1){
        $('#preloader').css('display','none');
        $('#blackFon').css('display','none'); 
        alert(resultStat);
        }
        }
        });   
    }
}
//удаление процедуры в админке
function del_proc(id)
{
    var ok=confirm('Вы действительно хотите удалить эту процедуру?');
    if(ok==true)
    {
        $('#blackFon').css('display','block');
        $('#preloader').css('display','block');
        $.ajax({
        type: "POST",
        url: "/admin/procedurs",
        data: {del_proc: 'del_proc', id: id},
        cache: false,
        success: function(status){
        var messageResp = new Array('Сохранено','Ошибка. Обратитесь к системному администратору');
        var resultStat = messageResp[Number(status)];
        if(status == 0){
        $('#preloader').css('display','none'); 
        $('#blackFon').css('display','none');
        window.location = '/admin/procedurs';
        }
        else if(status == 1){
        $('#preloader').css('display','none');
        $('#blackFon').css('display','none'); 
        alert(resultStat);
        }
        }
        });   
    }
}
//удаление процедуры на сервисе ресепшена
function del_proc_sresep(id)
{
    var ok=confirm('Вы действительно хотите удалить эту процедуру?');
    if(ok==true)
    {
        $('#blackFon').css('display','block');
        $('#preloader').css('display','block');
        $.ajax({
        type: "POST",
        url: "/sreseption/procedurs",
        data: {del_proc: 'del_proc', id: id},
        cache: false,
        success: function(status){
        var messageResp = new Array('Сохранено','Ошибка. Обратитесь к системному администратору');
        var resultStat = messageResp[Number(status)];
        if(status == 0){
        $('#preloader').css('display','none'); 
        $('#blackFon').css('display','none');
        window.location = '/sreseption/procedurs';
        }
        else if(status == 1){
        $('#preloader').css('display','none');
        $('#blackFon').css('display','none'); 
        alert(resultStat);
        }
        }
        });   
    }
}
//==================================
//подтверждение операций
function ok_oper(name)
{
var stat=confirm('Вы подтверждаете операцию: '+name+'?');
if(stat==true)
{
$("#ok_opers").click();
}
}

//подтверждение удаления клиента из бд
function del_kl_oper(name)
{
var stat=confirm('Вы подтверждаете операцию: '+name+'?');
if(stat==true)
{
var otkz=prompt("Укажите причину удаления клиента");
if(otkz!=null)
{

var idus=$("input[name=idus]").val();
//var user=$("input[name=user]").val();

$('#blackFon').css('display','block');
$('#preloader').css('display','block');
$.ajax({
type: "POST",
url: "/admin/del_ok_klients",
data: {"idus": idus, "otkz": otkz, "del_ok": 'del_ok'},
cache: false,
success: function(status){
alert(status);
var messageResp = new Array('Клиент Удален','Ошибка. Обратитесь к администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none'); 
//$('#blackFon').css('display','none');
setTimeout("window.location = '/admin/klients'", 2000)
}
else if(status == 1){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
}                                             
}
});

//$("#ok_opers").click();
}
}
}

/*вычисление возраста клиента и подставление в поле*/
/*function brich_day()
{
var brich_day=$('input[name="brichday"]').val();
var d=new Date();
var dday=d.getDate();
var mmon=d.getMonth()+1;
var yyear=d.getUTCFullYear();
var brich_day=brich_day.split('.');
var ss=yyear-brich_day[2];
if(mmon>=brich_day[1] && dday>=brich_day[0])
{}
else {ss=ss-1;}
}
alert(ss);
}*/
/*==========*/

/*сохранение встречи после редактирования на подтверждающем телемаркетинге*/
function edit_vstr(date)
{
$("input[name=ok"+date+"]").removeAttr("style");
$("input[name=ok"+date+"]").removeAttr("style");
$("input[name=ok"+date+"]").removeAttr("style");

$("input[name=dd"+date+"]").removeAttr("readonly").attr("style","border: 1px solid rgb(245, 0, 0);");
$("input[name=tt"+date+"]").removeAttr("readonly").attr("style","border: 1px solid rgb(245, 0, 0);");
$("select[name=tpr"+date+"]").removeAttr("disabled").attr("style","border: 1px solid rgb(245, 0, 0);");
$("input[name=safe"+date+"]").removeAttr("style");          
}
function safe_ok(id,id_client,date,st)
{
$("input[name=dd"+date+"]").removeAttr("style").attr("readonly","readonly");
$("input[name=tt"+date+"]").removeAttr("style").attr("readonly","readonly");
$("select[name=tpr"+date+"]").removeAttr("style").attr("disabled","disabled");
$("input[name=safe"+date+"]").attr("style","display: none"); 

var dd=$("input[name=dd"+date+"]").val();
var tt=$("input[name=tt"+date+"]").val();
var uu=$("input[name=uu"+date+"]").val();
var tpr=$("select[name=tpr"+date+"]").val();

if(dd=='' || tt=='' || uu=='')
{alert('Не указана Дата встречи, Время встречи или Сотрудник!');}
else
{
$('#blackFon').css('display','block');
$('#preloader').css('display','block');
$.ajax({
type: "POST",
url: "safe_ok",
data: {"id": id,"id_client": id_client, "dd": dd, "tt": tt, "uu": uu, "tpr": tpr, "safe_ok": 'safe_ok'},
cache: false,
success: function(status){
var messageResp = new Array('Встреча изменена','Ошибка. Обратитесь к администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none'); 
//$('#blackFon').css('display','none');
setTimeout("window.location = '/ptelemarketing/edit?id="+id_client+"'", 2000)
}
else if(status == 1){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
}                                             
}
});
}
return false;
}
function safe_ok_tm(id,id_client,date,st)
{
$("input[name=dd"+date+"]").removeAttr("style").attr("readonly","readonly");
$("input[name=tt"+date+"]").removeAttr("style").attr("readonly","readonly");
$("select[name=tpr"+date+"]").removeAttr("style").attr("disabled","disabled");
$("input[name=safe"+date+"]").attr("style","display: none"); 

var dd=$("input[name=dd"+date+"]").val();
var tt=$("input[name=tt"+date+"]").val();
var uu=$("input[name=uu"+date+"]").val();
var tpr=$("select[name=tpr"+date+"]").val();

if(dd=='' || tt=='' || uu=='')
{alert('Не указана Дата встречи, Время встречи или Сотрудник!');}
else
{
$('#blackFon').css('display','block');
$('#preloader').css('display','block');
$.ajax({
type: "POST",
url: "safe_ok",
data: {"id": id,"id_client": id_client, "dd": dd, "tt": tt, "uu": uu, "tpr": tpr, "safe_ok": 'safe_ok'},
cache: false,
success: function(status){
var messageResp = new Array('Встреча изменена','Ошибка. Обратитесь к администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none'); 
//$('#blackFon').css('display','none');
setTimeout("window.location = '/telemarketing/edit?id="+id_client+"'", 2000)
}
else if(status == 1){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
}                                             
}
});
}
return false;
}

/*отказ от встречи на подтверждающем телемаркетинге*/
function otkz_vstr(id,id_client)
{
var otkz=prompt("Укажите причину отказа");
  
if(otkz!=null)
{
$('#blackFon').css('display','block');
$('#preloader').css('display','block');
$.ajax({
type: "POST",
url: "safe_ok",
data: {"id": id, "otkaz": otkz, "otkz_ok": 'otkz_ok'},
cache: false,
success: function(status){
var messageResp = new Array('Установлен статус - Отказ от встречи','Ошибка. Обратитесь к администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none'); 
//$('#blackFon').css('display','none');
setTimeout("window.location = '/ptelemarketing/edit?id="+id_client+"'", 2000)
}
else if(status == 1){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
}                                             
}
});
}
return false;
}

/*отказ от встречи на телемаркетинге */
function otkz_vstr_tm(id,id_client)
{
var otkz=prompt("Укажите причину отказа");
  
if(otkz!=null)
{
$('#blackFon').css('display','block');
$('#preloader').css('display','block');
$.ajax({
type: "POST",
url: "safe_vstr",
data: {"id": id, "otkaz": otkz, "otkz_ok": 'otkz_ok'},
cache: false,
success: function(status){
var messageResp = new Array('Сохранено','Ошибка. Обратитесь к администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none'); 
//$('#blackFon').css('display','none');
setTimeout("window.location = '/telemarketing/edit?id="+id_client+"'", 2000)
}
else if(status == 1){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
}                                             
}
});
}
return false;
}

/*удаление встречи на телемаркетинге*/
function del_vstr_tm(id,id_client)
{
var otkz=prompt("Укажите причину удаление встречи");
  
if(otkz!=null)
{
$('#blackFon').css('display','block');
$('#preloader').css('display','block');
$.ajax({
type: "POST",
url: "safe_ok",
data: {"id": id, "otkaz": otkz, "otkz_ok": 'otkz_ok'},
cache: false,
success: function(status){
var messageResp = new Array('Встреча удалена','Ошибка. Обратитесь к администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none'); 
//$('#blackFon').css('display','none');
setTimeout("window.location = '/telemarketing/edit?id="+id_client+"'", 2000)
}
else if(status == 1){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
}                                             
}
});
}
return false;
}
/*удаление встречи в админке*/
function del_vstr_admin(id,id_client,usersss)
{
var otkz=prompt("Укажите причину удаление встречи");
  
if(otkz!=null)
{
$('#blackFon').css('display','block');
$('#preloader').css('display','block');
$.ajax({
type: "POST",
url: "del_vstr_adm",
data: {"id": id, "otkaz": otkz, "otkz_ok": 'otkz_ok', "usersss": usersss},
cache: false,
success: function(status){
//alert(status);
var messageResp = new Array('Встреча удалена','Ошибка. Обратитесь к администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none'); 
//$('#blackFon').css('display','none');
setTimeout("window.location = '/admin/view_klients?id="+id_client+"'", 2000)
}
else if(status == 1){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
}                                             
}
});
}
return false;
}

/*отказ от встречи на сервисе ресепшена*/
function otkz_vstr_sresep(id,id_client)
{
var otkz=prompt("Укажите причину отказа");
  
if(otkz!=null)
{
$('#blackFon').css('display','block');
$('#preloader').css('display','block');
$.ajax({
type: "POST",
url: "safe_vstr",
data: {"id": id, "otkaz": otkz, "otkz_ok": 'otkz_ok'},
cache: false,
success: function(status){
var messageResp = new Array('Сохранено','Ошибка. Обратитесь к администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none'); 
//$('#blackFon').css('display','none');
setTimeout("window.location = '/sreseption/edit?id="+id_client+"'", 2000)
}
else if(status == 1){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
}                                             
}
});
}
return false;
}

//сохранение встречи на сервисе ресепшена
function safevstrsresep(id_proc)
{
var id_client=$("input[name=id]").val();
var date_vstr=$("input[name=date_vstr"+id_proc+"]").val();
var time_vstr=$("input[name=time_vstr"+id_proc+"]").val();
var klient_go=$("select[name=klient_go"+id_proc+"]").val();
var procedura=$("select[name=procedura"+id_proc+"]").val();
var old_doctor=$("input[name=old_doctor"+id_proc+"]").val();
var doctor=$("select[name=doctor"+id_proc+"]").val();
//alert(id_proc+klient_go+procedura+old_doctor+doctor);
if(date_vstr=='' && time_vstr=='')
{alert('Вы не указали дату или время встречи');}
else
{
$('#blackFon').css('display','block');
$('#preloader').css('display','block');
$.ajax({
type: "POST",
url: "safe_vstr",
data: {"id_proc": id_proc, "date_vstr": date_vstr, "time_vstr": time_vstr, "klient_go": klient_go, "procedura": procedura, "old_doctor": old_doctor, "doctor": doctor, "safe_vstr": 'safe_vstr'},
cache: false,
success: function(status){
var messageResp = new Array('Сохранено','Ошибка. Обратитесь к администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none'); 
//$('#blackFon').css('display','none');
setTimeout("window.location = '/sreseption/edit?id="+id_client+"'", 2000)
}
else if(status == 1){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
}                                             
}
});
return false;
}
}

//добавление встречи на сервисе ресепшена
function addvstrsresep()
{
var id_client=$("input[name=id]").val();
var date_vstr=$("input[name=date_vstr]").val();
var time_vstr=$("input[name=time_vstr]").val();
var sproc=$("select[name=sproc]").val();
var user=$("input[name=user]").val();
var doctor=$("select[name=doctor]").val();
//alert(id_client+date_vstr+time_vstr+sproc+user+doctor);

if(date_vstr=='')
{alert('Укажите дату встречи');exit();}
else if(time_vstr=='')
{alert('Укажите время встречи');exit();}
else
{
$('#blackFon').css('display','block');
$('#preloader').css('display','block');
$.ajax({
type: "POST",
url: "add_vstr",
data: {"id_client": id_client, "date_vstr": date_vstr, "time_vstr": time_vstr, "sproc": sproc, "user": user, "doctor": doctor, "add_vstr": 'add_vstr'},
cache: false,
success: function(status){
var messageResp = new Array('Сохранено','Ошибка. Обратитесь к администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none'); 
//$('#blackFon').css('display','none');
setTimeout("window.location = '/sreseption/edit?id="+id_client+"'", 2000)
}
else if(status == 1){
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
}                                             
}
});
return false;
}
}

function scroll_filter()
{
document.cookie = "sost_filter=1;";
$(".filter_resep").attr("style","right: -174px;");
//$_SESSION("sost_filter")=1;
}
function print_sresep(id_proc)
{   
var id_proc=$("input[name=id_proc]").val();
var family=$("input[name=family]").val();
var name=$("input[name=name]").val();
var lastname=$("input[name=lastname]").val();
var brichday=$("input[name=brichday]").val();
var vozrast=$("input[name=vozrast]").val();
var status=$("select[name=status]").val();
var phone=$("input[name=phone]").val();
var user=$("input[name=user]").val();

$.ajax({
type: "POST",
url: "karta",
data: {"id_proc": id_proc, "family": family, "name": name, "lastname": lastname, "brichday": brichday, "vozrast": vozrast, "status": status, "user": user, "phone": phone, "one_print":"one_print"},
cache: false,
});
return false;
}


function form_otch(id,sost)
{
if(sost==1){
var date_ot='<form action="/admin/otchet_kl" method="get" name="date_ot"><input name="id" style="width:1px;height:1px;display:none;" value="'+id+'"><input name="date1" class="datepicker" type="text"><input name="date2" class="datepicker" type="text"><input type="submit" value="Составить отчет"/><input type="button" value="Отмена" onclick="form_otch('+0+','+0+')"/></form>';
$('#blackFon').css('display','block'); 
$('#date_ot').css('display','block').html(date_ot).show('blind');
$('.datepicker').datepicker();
//$(".numdeerskl"+id+"").appendTo('<tr><td colspan="5" style="text-align: center;">11</td></tr>');
}
else
{
$('#blackFon').css('display','none'); 
$('#date_ot').css('display','none');
}
}

function date_proc(state)
{
date_vstr=$('input[name=date_vstr]').val();
doctor=$('select[name=doctor]').val();
if(date_vstr!='')
{
$('select[name=sproc]').removeAttr("disabled");

if(state==2){$('select[name=doctor]').removeAttr("disabled");}

if(date_vstr!='' && doctor!='')
{

$('#blackFon').css('display','block');
$('#preloader').css('display','block');

$.ajax({
type: "POST",
url: "get_time",
data: {"date_vstr": date_vstr, "doctor": doctor, "get_time": 'get_time'},
cache: false,
success: function(status){

$(".time_proc > tbody").empty();
if(status == 1){
$('#info').text('У '+doctor+' на '+date_vstr+' не назначено ни одной встречи').show('blind').delay(2500).fadeOut(800);
$('#preloader').css('display','none');
$('#blackFon').css('display','none');
}  
else{
//$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
$('#preloader').css('display','none'); 
$('#blackFon').css('display','none');
var res = JSON.parse(status);
//alert(res.length);

for(i=0;i<res.length;i++)
{
$(".time_proc > tbody").append('<tr><td>'+i+'</td><td>'+res[i]["time_vstr"]+'</td><td>'+res[i]["sproc"]+'</td></tr>');
//alert('<tr><td>'+i+'</td><td>'+res[i]["time_vstr"]+'</td><td>'+res[i]["sproc"]+'</td></tr>');
}

}
                                           
}
});
return false;
}

}
}

//сохранение рекомендаций у врачей
function save_recom()
{
var ids=Number($("input[name=id]").val());
var dates=new Date();
var d=dates.getDate();
var m=dates.getMonth();
var y=dates.getUTCFullYear();
var date_recom=y+'-'+m+'-'+d;
var id_doctor=Number($("input[name=id_doctor]").val());
var name_doctor=$("input[name=name_doctor]").val();
var recomendation=$('textarea[name=recomendation]').val();
var contraindications=$('textarea[name=contraindications]').val();

if(recomendation==" " && contraindications==" ")
{
    alert('Укажите рекомендации или противопоказания для клиента');
    exit();
}
else
{
$('#blackFon').css('display','block');
$('#preloader').css('display','block');

//alert(ids+' '+date_recom+' '+id_doctor+' '+name_doctor+' '+recomendation+' '+contraindications);
$.ajax({
type: "POST",
url: "/doctor/save_recom",
data: {save_recom: 'save_recom',"id_client":ids, "date_recom": date_recom, "id_doctor":id_doctor, "name_doctor":name_doctor, "recomendation":recomendation, "contraindications":contraindications},
cache: false,
success: function(status){  
//alert(status);

var messageResp = new Array('Назначения прописаны','Ошибка. Обратитесь к системному администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#preloader').css('display','none'); 
//$('#blackFon').css('display','none');
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
setTimeout("window.location = '/doctor/edit?id="+ids+"'", 2000)

}
else if(status == 1){
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
}
}
});
}

}

//сохранение рекомендаций у врачей
function update_recom()
{
var id_recom=$("input[name=id_recom]").val();
var ids=$("input[name=id]").val();
var dates=new Date();
var d=dates.getDate();
var m=dates.getMonth();
var y=dates.getUTCFullYear();
var date_recom=y+'-'+m+'-'+d;
var id_doctor=$("input[name=id_doctor]").val();
var name_doctor=$("input[name=name_doctor]").val();
var recomendation=$('textarea[name=recomendation'+id_recom+']').val();
var contraindications=$('textarea[name=contraindications'+id_recom+']').val();

if(recomendation==" " || contraindications==" ")
{
    alert('Укажите рекомендации или противопоказания для клиента');
    exit();
}
else
{
$('#blackFon').css('display','block');
$('#preloader').css('display','block');

//alert(id_recom+' '+ids+' '+date_recom+' '+id_doctor+' '+name_doctor+' '+recomendation+' '+contraindications);
$.ajax({
type: "POST",
url: "/doctor/save_recom",
data: {update_recom: 'update_recom',"id_recom":id_recom,"id_client":ids, "date_recom": date_recom, "id_doctor":id_doctor, "name_doctor":name_doctor, "recomendation":recomendation, "contraindications":contraindications},
cache: false,
success: function(status){  
//alert(status);

var messageResp = new Array('Назначения прописаны','Ошибка. Обратитесь к системному администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#preloader').css('display','none'); 
//$('#blackFon').css('display','none');
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
setTimeout("window.location = '/doctor/edit?id="+ids+"'", 2000)
}
else if(status == 1){
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
}
}
});

}

}

//включение и отключение настроек сайта
function configuration(name)
{
    //var proc_states = $("select[name=check"+id+"]").val();
    var conf= $("input[name="+name+"]").prop("checked");
    if(conf==true){conf_states='on';}else{conf_states='off';}
   //alert(proc_states);

/*$('#blackFon').css('display','block');
$('#preloader').css('display','block');*/
$.ajax({
type: "POST",
url: "/admin/config",
data: {save_conf: 'save_conf', "name_conf": name, "conf_states": conf_states},
cache: false,
success: function(status){
var messageResp = new Array('Сохранено','Ошибка. Обратитесь к системному администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#preloader').css('display','none'); 
$('#blackFon').css('display','none');
$('#info').text(resultStat).show('blind').delay(200).fadeOut(800);
}
else if(status == 1){
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
$('#info').text(resultStat).show('blind').delay(500).fadeOut(800);
}
}
});
}

//сохранение группы доступа в админке
function save_group(znach)
{
//alert(znach);
if(znach=='group')
{
var group_name=$('input[name=group_name]').val();
var group_desc=$('textarea[name=group_desc]').val();
}
else if(znach=='otdel')
{
var group_name=$('input[name=name_otdel]').val();
var group_desc=$('textarea[name=desc_otdel]').val();
}
else if(znach=='doljn')
{
var group_name=$('input[name=name_doljn]').val();
var group_desc='';
}
if(znach=='group' && group_name=="")
{
    alert('Введите наименование группы доступа');
    exit();
}
else if(znach=='otdel' && group_name=="")
{
    alert('Введите наименование отдела');
    exit();
}
else if(znach=='doljn' && group_name=="")
{
    alert('Введите наименование должности');
    exit();
}
else
{
$('#blackFon').css('display','block');
$('#preloader').css('display','block');

$.ajax({
type: "POST",
url: "/admin/save_groups",
data: {"save_group":"save_group","group_name":group_name,"group_desc":group_desc,"znach":znach},
cache: false,
success: function(status){
//alert(sproc);   
//alert(status);

var messageResp = new Array('Сохранено','Ошибка. Обратитесь к системному администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#preloader').css('display','none'); 
//$('#blackFon').css('display','none');
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
setTimeout("window.location = '/admin/config'", 2000)

}
else if(status == 1){
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
$('#info').text(resultStat).show('blind').delay(1500).fadeOut(800);
}
}
});
} 
 } 

//включение и отключение доступа пользователю к сайту
function disable_user(name)
{
    //var proc_states = $("select[name=check"+id+"]").val();
    var id_user=$("input[name=id_user]").val();
    var conf= $("input[name=dostup]").prop("checked");
    if(conf==true){conf_states='on';}else{conf_states='off';}
   //alert(proc_states);

/*$('#blackFon').css('display','block');
$('#preloader').css('display','block');*/
$.ajax({
type: "POST",
url: "/admin/disable_user",
data: {disable_user: 'disable_user', "id_user": id_user, "conf_states": conf_states},
cache: false,
success: function(status){
var messageResp = new Array('Сохранено','Ошибка. Обратитесь к системному администратору');
var resultStat = messageResp[Number(status)];
if(status == 0){
$('#preloader').css('display','none'); 
$('#blackFon').css('display','none');
$('#info').text(resultStat).show('blind').delay(200).fadeOut(800);
}
else if(status == 1){
$('#preloader').css('display','none');
$('#blackFon').css('display','none'); 
$('#info').text(resultStat).show('blind').delay(500).fadeOut(800);
}
}
});
}
 
//удаляем сессию пользователя
function del_sess(id_ses)
{
    var ok=confirm('Вы действительно хотите прервать работу данного пользователя на сайте?');
    if(ok==true)
    {
        $('#blackFon').css('display','block');
        $('#preloader').css('display','block');
        $.ajax({
        type: "POST",
        url: "/admin/users_online",
        data: {del_sess_user: 'del_sess_user', "id_ses": id_ses},
        cache: false,
        success: function(status){
        var messageResp = new Array('Выполнено','Ошибка. Обратитесь к системному администратору');
        var resultStat = messageResp[Number(status)];
        if(status == 0){
        $('#preloader').css('display','none'); 
        setTimeout("window.location = '/admin/users_online'", 2000)
        }
        else if(status == 1){
        $('#preloader').css('display','none');
        $('#blackFon').css('display','none'); 
        $('#info').text(resultStat).show('blind').delay(500).fadeOut(800);
        }
        }
        });
  
    }

}