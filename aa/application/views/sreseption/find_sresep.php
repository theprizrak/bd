<br />
<div id="table">
<form action="/sreseption/find" method="post" name="find_klient"><div class="one findklient">Введите номер контакта<br><input placeholder="Введите номер телефона" name="phone" class="tel" type="text" value="<?if(isset($_POST['phone']) && $_POST['phone']!=''){echo $_POST['phone'];}?>"><br> <input class="buttons_fil" name="find_tel_ok" type="submit" value="Найти"></div></form>
<form action="/sreseption/find" method="post" name="find_klient">
<div class="tre findklient">Введите фамилию или Имя контакта<br><input placeholder="Введите ФИО клиента" name="fioname" type="text" value="<?if(isset($_POST['fioname']) && $_POST['fioname']!=''){echo $_POST['fioname'];}?>"><br><input class="buttons_fil" name="find_fioname_ok" type="submit" value="Найти"></div>
</form>
<?/*<form action="/sreseption/find" method="post" name="find_klient"><div class="tu findklient">Введите фамилию клиента<br><input name="family" type="text" value="<?if(isset($_POST['family']) && $_POST['family']!=''){echo $_POST['family'];}?>"><br><input class="buttons_fil" name="find_ok" type="submit" value="Найти"></div></form>
<form action="/sreseption/find" method="post" name="find_klient"><div class="tre findklient">Введите Имя контакта<br><input name="name" type="text" value="<?if(isset($_POST['name']) && $_POST['name']!=''){echo $_POST['name'];}?>"><br><input class="buttons_fil" name="find_ok" type="submit" value="Найти"></div></form>
*/?>
</div>
<form action="/sreseption/find" method="post" name="find_klient">
<table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="9%">Сортировать по дате</td>
    <td width="9%"><input placeholder="Начальная дата" name="date1" class="datepicker" type="text" value="<?if(isset($_POST['date1']) && $_POST['date1']!=''){echo $_POST['date1'];}?>"></td>
    <td width="9%"><input placeholder="Конечнеая дата" name="date2" class="datepicker" type="text" value="<?if(isset($_POST['date2']) && $_POST['date2']!=''){echo $_POST['date2'];}?>"></td>
    <td width="3%"></td>  
  </tr>
  <tr>
    <td width="9%">и времени</td>
    <td width="9%"><input placeholder="Начальное время" name="time1" class="time" type="text" value="<?if(isset($_POST['time1']) && $_POST['time1']!=''){echo $_POST['time1'];}?>"></td>
    <td width="9%"><input placeholder="Конечное время" name="time2" class="time" type="text" value="<?if(isset($_POST['time2']) && $_POST['time2']!=''){echo $_POST['time2'];}?>"></td>
    <td width="3%" align="left"><input class="buttons_fil" name="sortdate_ok" type="submit" value="ОК"></td>  
  </tr>
</table>
</form>
<hr>
<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span style="width: 15px;height: 15px;display: inline-block;margin-right: 2px;background: #A8F3AE;">&nbsp;</span><a href="?filter=time_proc">Ожидают процедуру</a></span></td>
    <td><span style="width: 15px;height: 15px;display: inline-block;margin-right: 2px;background: #BFABEB;">&nbsp;</span><span><a href="?filter=in_proc">На процедуре</a></span></td>
    <td><span style="width: 15px;height: 15px;display: inline-block;margin-right: 2px;background: #EDF3A8;">&nbsp;</span><span><a href="?filter=perezv">Перезвон</a></span></td>
    <td><span style="width: 15px;height: 15px;display: inline-block;margin-right: 2px;background: #FFA0A0;">&nbsp;</span><span><a href="?filter=otkaz">Отказ</a></span></td>
    <td><span style="width: 15px;height: 15px;display: inline-block;margin-right: 2px;background: #648D67;">&nbsp;</span><span><a href="?filter=good">Прошёл</a></span></td>
    <?if(isset($_GET['filter']) && $_GET['filter']!=''){?><td><span><a href="<?="http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];?>" class="buttons">Сбросить фильтер</a></span></td><?}?>
  </tr>
</table>
<?
if($this->session->userdata('doljn')=="Администратор Сервис")
{?>
<div id="filter" class="filter_resep"><div id="fil_scroll"><img src="/images/pointer.png" style="width: 28px;" /></div>
<a href="/sreseption/klient_today" class="buttons_fil">Печать</a><br />
<a href="/sreseption/doc_print" class="buttons_fil">Процедуры для врачей</a>
</div>
<?}?>