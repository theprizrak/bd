<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PACR-CRM</title>
<link href="<?= base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?= base_url();?>css/jquery-ui.css">
<script src="<?= base_url();?>js/ajax_chat.js"></script>
<script src="<?= base_url();?>js/jquery-1.9.1.js"></script>
<script src="<?= base_url();?>js/jquery.tablesorter.min.js"></script>
<script src="<?= base_url();?>js/jquery-ui.js"></script>
<script src="<?= base_url();?>js/jquery.ui.datepicker-ru.js"></script>
<script src="<?= base_url();?>js/jquery.inputmask.js"></script>
<script src="<?= base_url();?>js/jquery.validate.js"></script>
<script src="<?= base_url();?>js/jquery-cookies.js"></script>
<?
/*global $configs;
$configs = $this->auth_lib->config_site();*/
if (strstr(strtolower($_SERVER['HTTP_USER_AGENT']), "msie")) 
{ 
// выводим страницу для internet explorer 
?>
<script src="<?= base_url();?>js/formvalid_ie.js"></script>
<?
} 
else 
{ 
// если другой браузер 
?>
<script src="<?= base_url();?>js/formvalid.js"></script>
<?
} 
/* 
<![if IE]>  
<script src="<?= base_url();?>js/formvalid_ie.js"></script>
<![endif]>
<![if !IE]>  
<script src="<?= base_url();?>js/formvalid.js"></script>
<![endif]>  
*/
?>
<script src="<?= base_url();?>js/script.js"></script>
  <script>
$(function() {  
$( "#dialog" ).dialog({
position: { my: "center top", at: "center top+100"},
buttons: {
Ok: function() {
$( this ).dialog( "close" );
}
}
});
});


</script>
<script>
$(document).ready(function() {
//update_timer_mail_ok();
$(".tel").inputmask("+7(999)999-99-99");
$(".time").inputmask("99:99");
$(".plan").inputmask("999");
$(".pseria").inputmask("99 99");
$(".pnomer").inputmask("999999");
$(".numberhome").inputmask("8(8442) 99-99-99");

$(function() {
    $( ".datepicker" ).datepicker(
    {
      changeMonth: true,
      changeYear: true,
      yearRange: "c-60:+0",
      //dateFormat: "yy-mm-dd"
    }
    );
  });
  
jQuery( function($) {
$('tbody tr[data-href]').addClass('clickable').click( function() {
window.location = $(this).attr('data-href');
}).find('a').hover( function() {
$(this).parents('tr').unbind('click');
}, function() {
$(this).parents('tr').click( function() {
window.location = $(this).attr('data-href');
});
});
});

// метод find возвращает ссылку (а), которая является 
// потомком  строки (tbody tr[data-href])
// у метода hover два события  mouseenter и mouseleave -
// по первому кликабельность ссылки включается 
//(через удаление всех событий для строки - unbind)
// по второму выключается 
    { 
        $(".sortTable").tablesorter(); 
    } 

});
</script>

</head>
<body>
<div id="middle_chat">
<div id="chat" data-last-id="0">
<div id="close_chat" onclick="close_chat()"></div>
<div id="textarea_msg_loader" style="display: none;"><img src="<?=base_url();?>images/pre.gif" style="width: 32px;" /></div>
<div id="textarea_chat"></div>
<div id="userlist_chat">
<!--
<?
$query=$this->db->get('session');
$query=$query->result_array(); 
foreach($query as $user_list):
?>
<div style="border-bottom: 1px solid #D36E6E;padding: 2px;margin-top: 2px;"><a class="change_user" onclick="change_user_chat('<?=$user_list["id_user"];?>','<?=$user_list["name"];?>')"><?=$user_list['name'];?> [<?=$user_list['otdel'];?>]</a></div>
<? endforeach;?>
-->
</div>
<div id="sendmessendg_chat_inactive">
<p>Что бы написать сообщение выберете пользователя в списке</p>
</div>
<div id="sendmessendg_chat" style="display: none;">
<div id="send_msg_loader" style="display: none;"><img src="<?=base_url();?>images/pre.gif" style="width: 32px;" /></div>
<form id="chat-form">
    <input type="text" value="<?=$this->session->userdata('user_id');?>" id="id_out" name="id_out" style="width: 1px;height: 1px;display: none;"/>
    <input type="text" value="<?=$this->session->userdata('family').' '.$this->session->userdata('name');?>" id="user_out" name="user_out" style="width: 1px;height: 1px;display: none;"/>
    <input type="text" value="" id="id_in" name="id_in" style="width: 1px;height: 1px;display: none;"/>
    <input type="text" value="" id="user_in" name="user_in" style="width: 1px;height: 1px;display: none;"/>
    <textarea id="chat_msg" onclick="msg_ok()" onkeydown="SendComment(event)"></textarea>
    <input type="button" onclick="send_messeg()" value="написать" class="buttons_otch"/>
</form>
</div>

</div>

</div>

<div id="blackFon" style="display: none;"><div id="preloader" style="display: none;"><img src="<?=base_url();?>images/pre.gif" /></div></div>
<div id="info" style="display: none;"></div>
<div id="date_ot" style="display: none;"></div>
<?include "filter.php";?>