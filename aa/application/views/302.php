<html>
<head>
<title>Ошибка 404: Страничка не найдена</title>
<script src="<?= base_url();?>js/jquery-1.9.1.js"></script>
<style>
body
{
background: #9B9B9B;
margin: 0;
}
</style>
<script language="JavaScript" type="text/javascript">
/*
timer();
var n=5;
function timer ()
{
if(n==-1){
stop();
}
else
{
$("#timeout").html(n);
n--;
setTimeout( 'timer()', 1000 ); 
setTimeout( 'redir()', 6000 ); 
}
}
function redir(){ 
location="<?=base_url().$_COOKIE["redirect"];?>"; 
} */
</script>
</head>
<body>
<div style="width: 560px; margin: 10% auto 0px; height: 200px; background: none repeat scroll 0% 0% rgb(255, 255, 255); padding: 10px; border-radius: 8px; box-shadow: 0px 0px 15px rgb(0, 0, 0);">
<p></p>
<p style="text-align: center; margin: 0px; color: rgb(59, 195, 212); font-size: 31px;">УПС :) <span style="color:red;font-size: 60px;">302</span></p>
<p style="text-align: center; margin: 0px; color: rgb(59, 195, 212); font-size: 31px;">СТРАНИЧКА НЕ НАЙДЕНА</p>
<p style="text-align: center; margin: 0px;">сейчас вы будете перенаправлены, ожидайте! <span id="timeout" style="color:red;"></span><img src="<?=base_url();?>images/pre.gif" style="width: 22px;" /></p>
<span id="timeout" style="color:red;"></span>
</div>
</body>
</html>