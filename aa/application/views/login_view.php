<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRM PACR - Вход</title>
<link href="<?= base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?= base_url();?>css/jquery-ui.css">
<script src="<?= base_url();?>js/jquery-1.9.1.js"></script>
<script src="<?= base_url();?>js/jquery-ui.js"></script>
  <script>
$(function() {
$( "#dialog" ).dialog({
buttons: {
Ok: function() {
$( this ).dialog( "close" );
}
}
});

$( "#dialog1" ).dialog({
buttons: {
Ok: function() {
$( this ).dialog( "close" );
}
}
});
});
</script>
</head>
<body>
<div id="body_login">
<div id="logopacr" >
	<img src="/images/pacr.png" style="width: 200px;margin-left: 50px;">
</div>
<div id="login">
<? 
if (isset($_COOKIE["info"]) && $_COOKIE["info"]==1){
echo '
<div id="dialog" title="Инфо">
<strong>Неверно введены данные</strong>
</div>
';
}
if (isset($_COOKIE["info"]) && $_COOKIE["info"]==2){
echo '
<div id="dialog" title="Инфо">
<strong>Под данным логином уже работают на сайте</strong>
</div>
';
}
if (isset($_COOKIE["info"]) && $_COOKIE["info"]==3){
echo '
<div id="dialog" title="Инфо">
<strong>Вы не зарегистрированны в системе, или доступ вам запрещен</strong>
</div>
';
}
$pass_error=form_error('pass');
if (isset($pass_error)&&$pass_error!=''){
echo '
<div id="dialog1" title="Инфо">
<strong>'.$pass_error.'</strong>
</div>
';
}
$user_error=form_error('username');
if (isset($user_error)&&$user_error!=''){
echo '
<div id="dialog" title="Инфо">
<strong>'.$user_error.'</strong>
</div>
';
}
?>
Вход в систему:
<form action="<?= base_url();?>" method="post" name="login_form">
<div id="logins">
<div id="username"><span class="name_log"></span><input name="username" type="text" value="<?=set_value('username');?>" placeholder="Логин"></div>
<div id="password"><span class="name_log"></span><input name="pass" type="password" placeholder="Пароль"></div>
<div id="log_button"><input name="login_ok" id="login_ok" type="submit" value="Войти"></div>
</div>
</form>
</div>

</div>

</body>
</html>