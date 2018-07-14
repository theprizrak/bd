<br />
<div id="table">
<form action="/telemarketing/find" method="post" name="find_klient"><div class="one findklient">Введите номер контакта<br><input placeholder="Введите номер телефона" name="phone" class="tel" type="text" value="<?if(isset($_POST['phone']) && $_POST['phone']!=''){echo $_POST['phone'];}?>"><br> <input class="buttons_fil" name="find_ok" type="submit" value="Найти"></div></form>
<form action="/telemarketing/find" method="post" name="find_klient">
<div class="tre findklient">Введите фамилию или Имя контакта<br><input placeholder="Введите ФИО клиента" name="fioname" type="text" value="<?if(isset($_POST['fioname']) && $_POST['fioname']!=''){echo $_POST['fioname'];}?>"><br><input class="buttons_fil" name="find_fioname_ok" type="submit" value="Найти"></div>
</form>

<?/*
<form action="/telemarketing/find" method="post" name="find_klient"><div class="tu findklient">Введите фамилию контакта<br><input name="family" type="text" value="<?if(isset($_POST['family']) && $_POST['family']!=''){echo $_POST['family'];}?>"><br><input class="buttons_fil" name="find_fam_ok" type="submit" value="Найти"></div></form>
<form action="/telemarketing/find" method="post" name="find_klient"><div class="tre findklient">Введите Имя контакта<br><input name="name" type="text" value="<?if(isset($_POST['name']) && $_POST['name']!=''){echo $_POST['name'];}?>"><br><input class="buttons_fil" name="find_name_ok" type="submit" value="Найти"></div></form>
*/?>
</div>
<form action="/telemarketing/find" method="post" name="find_klient">
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
  <tr>
  <td colspan="4" style="text-align: center;">Сортировать по:
  <select name="type_sort">
  <option value="vstr" <?if(isset($_POST['type_sort']) && $_POST['type_sort']=='vstr'){echo 'selected="selected"';}?>>Встречам</option>
  <option value="prvn" <?if(isset($_POST['type_sort']) && $_POST['type_sort']=='prvn'){echo 'selected="selected"';}?>>Перезвонам</option>
  </select>
  </td>
  </tr>
</table>
</form>
<hr>
<table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span style="width: 15px;height: 15px;display: inline-block;margin-right: 2px;background: #A8F3AE;">&nbsp;</span>Ожидают процедуру</span></td>
    <td><span style="width: 15px;height: 15px;display: inline-block;margin-right: 2px;background: #EDF3A8;">&nbsp;</span><span>Перезвон</span></td>
    <td><span style="width: 15px;height: 15px;display: inline-block;margin-right: 2px;background: #FFA0A0;">&nbsp;</span><span>Отказ</span></td>
	<td><span style="width: 15px;height: 15px;display: inline-block;margin-right: 2px;background: rgba(100, 141, 103, 0.62);">&nbsp;</span><span>Прошёл</span></td>
  </tr>
</table>