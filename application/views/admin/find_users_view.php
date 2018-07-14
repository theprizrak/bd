<div id="middle">
<form action="/admin/add_users" method="post" name="find_sotrud">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40%">Введите фамилию сотрудника</td>
    <td width="22%"><input name="family" type="text" value="<?if(isset($_POST['family']) && $_POST['family']!=''){echo $_POST['family'];}?>"></td>
    <td width="37%" align="left"><input name="find_ok" type="submit" value="Найти"></td>
  </tr>
  <tr>
    <td width="100%" colspan="3" style="color: #992E2E;font-size: 12px;">Чтобы добавить пользователя найдите его через поиск.</td>
  </tr>
</table>
</form>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList">
  <thead>
  <tr>
    <td width="26%">ФИО</td>
    <td width="15%">Телефон</td>
    <td width="15%">Дата Рождения</td>
    <td width="12%">Должность</td>
	<td width="12%">Отдел</td>
    <td width="10%">&nbsp;</td>
  </tr>
  </thead>
  <tbody id="sotrud">
   <?php 
   if ($info==1){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Сотрудник успешно добавлен</strong>
    </div>
    ';
   }
    if (count($sotrudnik)==0){
    echo '
<div id="dialog" title="Инфо">
<strong>Сотрудник не найден!</strong>
</div>
    ';
   }
   else if ($sotrudnik!=0) {
   foreach ($sotrudnik as $sotrudniks):

   ?>
  <tr>
    <td><?=$sotrudniks['family'];?>&nbsp;<?=$sotrudniks['name'];?>&nbsp;<?=$sotrudniks['lastname'];?></td>
    <td><?=$sotrudniks['phone'];?></td>
    <td><?=$sotrudniks['date_rozd'];?></td>
    <td><?=$sotrudniks['doljn'];?></td>
    <td><?=$sotrudniks['otdel'];?></td>
	<td><a href="/admin/add_users?id=<?=$sotrudniks['id'];?>">Разрешить Доступ</a></td>
  </tr>
    <?php endforeach; }?>
    <? echo $this->pagination->create_links();?>
    </tbody>
</table>
</div>