<?$configs=$this->auth_lib->config_site(); // настройки сайта?>
<div id="left">
<?if($configs['sost_msg']=="on"){?><div style="width:100%;background:<?if($configs['color_bg_msg']==1){echo "green";}elseif($configs['color_bg_msg']==2){echo "#FFC600";}elseif($configs['color_bg_msg']==3){echo "red";}?>;color:#fff;text-size:20px;text-align:center;"><?=$configs['text_msg'];?></div><?}?>
<div id="left_console">
<a onclick="open_chat()" title="Чат" id="chat_ajax" />&nbsp;</a>
<? if($this->session->userdata('doljn')=='IT'){?>
<a href="/admin/users_online" title="Пользователи онлайн" class="uonline" />&nbsp;</a>
<a href="/admin/config" title="Настройки" class="gear" />&nbsp;</a>
<?}?>
<span class="user">
<?
$users_name=preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $this->session->userdata('family'))." ".preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $this->session->userdata('name'));
echo $users_name;?>
</span>
<a href="<?=base_url();?>welcome/logout" title="Выход" class="exit" /></a>
</div>
<ul id="cssmenu" >
<?
/*телемаркетинг*/
if($this->session->userdata('otdel')=='Телемаркетинг первички (Тм1)' && $this->session->userdata('doljn')=="Оператор" || $this->session->userdata('doljn')=="Старший оператор" || $this->session->userdata('doljn')=="Рук-ль тм1")
{
?>
<li class="selected"><a href="/telemarketing">Список контактов</a></li>
<li><a href="/telemarketing/add">Добавить встречу/перезвон</a></li>
<?}
/*=========*/
/*подтверждающий*/
elseif($this->session->userdata('otdel')=='Телемаркетинг первички (Тм1)' && $this->session->userdata('doljn')=="Подтверждающий оператор")
{?>
<li class="selected"><a href="/ptelemarketing">Список контактов</a></li>
<?}
/*ресепшен*/
elseif($this->session->userdata('doljn')=="Администратор (ресепшен)")
{?>
<li><a href="/reseption">Список клиентов</a></li> 
<li><a href="/admin/add_smena">Добавить смену косметологу</a></li>
<?}
/*===========*/

/*Сервис*/
/*телемаркетинг и руководитель*/
elseif($this->session->userdata('otdel')=='Сервис' && $this->session->userdata('doljn')=="Оператор сервиса" || $this->session->userdata('doljn')=="Старший оператор" || $this->session->userdata('doljn')=="Рук-ль сервиса")
{

?>
<li class="selected"><a href="/stelemarketing">Список клиентов</a></li>
<li><a href="/stelemarketing/add">Добавить встречу</a></li>
<?
}
/*ресепшен*/
elseif($this->session->userdata('otdel')=='Сервис' && $this->session->userdata('doljn')=="Администратор Сервис")
{

?>
<li class="selected"><a href="/sreseption">Список клиентов</a></li>
<?if($configs['add_kl_rserv']=='on'){?><li><a href="/sreseption/add">Добавить клиента</a></li><?}?>
<?if($configs['add_doc_rserv']=='on'){?><li><a href="/sreseption/add_doctor">Добавить врача</a></li><?}?>
<?if($configs['view_proc_rserv']=='on'){?><li><a href="/sreseption/procedurs">Процедуры</a></li><?}?>
<?
}
/*врачи*/
elseif($this->session->userdata('otdel')=='Сервис' && $this->session->userdata('doljn')=="Врач")
{

?>
<li class="selected"><a href="/doctor">Список клиентов</a></li>
<?if($configs['add_kl_doc']=='on'){?><li class="selected"><a href="/doctor/add">Добавить клиента</a></li><?}?>
<?
}
/*=============*/
/*Кредитный*/
elseif($this->session->userdata('otdel')=='Кредитный' && $this->session->userdata('doljn')=="Кредитный эксперт" || $this->session->userdata('doljn')=="Старший кредитный эксперт")
{?>
<li><a href="/kredit">Список клиентов</a></li>
<li><a href="/kredit/new_dog">Новый договор</a></li>
<?
}
/*=================*/
/*АУП*/
elseif($this->session->userdata('otdel')=='АУП' && $this->session->userdata('doljn')=="IT" || $this->session->userdata('doljn')=="Бухгалтер" || $this->session->userdata('doljn')=="Контролёр" || $this->session->userdata('doljn')=="Директор")
{
?>
<li><a href="/admin/klients">Список клиентов</a></li>
<li><a href="/admin">Список сотрудников</a></li>
<li><a href="/admin/users">Список пользователей</a></li>
<li><a href="/admin/telemarketologs">Список телемаркетологов</a></li>
<li><a href="/admin/add_sotrudnik">Добавить сотрудника</a></li>
<li><a href="/admin/add_users">Добавить пользователя</a></li>
<li><a href="/admin/add_smena">Добавить смену косметологу</a></li>
<?/*для должности IT загрузка клиентской базы*/
/*if($this->session->userdata('doljn')=='IT'){?>
<li><a href="/admin/import"><div class="img"style="float: left;margin-top: -4;"><img src="<?= base_url();?>images/klients.png" width="30" height="30"/></div>Загрузить клиентскую базу</a></li><?}
/*=================*/
}
if($this->session->userdata('doljn')=='Рук-ль тм1')
{
?>
<!--<li><a href="/admin/plan">Посмотреть план</a></li>-->
<li><a href="/admin/add_plan">Назначить план сотрудникам</a></li>
<li><a href="/admin/otchet_proc">Отчет</a></li>
<li><a href="/admin/telemarketologs">Отчет по сотрудникам</a></li>
 
<?} 
/*============*/
/*для должности IT просмотр истории*/
if($this->session->userdata('doljn')=='IT'){?>
<li><a href="/admin/procedurs">Процедуры</a></li>
<li><a href="/admin/history">Лог</a></li>

<li >
 <a>Отчеты</a>
 <ul>
 <li><a href="/admin/otchet_doc">Отчет по врачам</a></li>
 <li><a href="/admin/otchet_all">Отчет за период</a></li>
 <li><a href="/admin/otchet_vstr">Отчет по встречам</a></li>
 </ul>
 </li>

</li>
<!--<li><a href="/admin/moduls">Модули</a></li>-->
<!--<li><a href="/admin/config">Настройки</a></li>-->
<?}
/*=================*/
?>
<!--<li><a href="<?=base_url();?>welcome/logout">Выход</a></li>-->
<li style="float: right; margin: 0px 2px; padding: 5px 2px 0px 2px;">
<div style="display: inline-block; color: rgb(255, 255, 255); text-shadow: 1px 1px 1px rgb(0, 0, 0); font-size: 13px;">
</div></li>
</ul>

</div>