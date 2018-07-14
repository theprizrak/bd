<div id="middle">
<form action="/admin/users" method="post" name="find_users">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40%">Введите фамилию сотрудника</td>
    <td width="22%"><input name="family" type="text" value="<?if(isset($_POST['family']) && $_POST['family']!=''){echo $_POST['family'];}?>"></td>
    <td width="37%" align="left"><input name="find_ok" type="submit" value="Найти"></td>
  </tr>
</table>
</form>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList sortTable">
  <thead>
  <tr>
    <th width="36%">ФИО</th>
    <th width="32%">Должность</th>
	<th width="32%">Отдел</th>
  </tr>
  </thead>
  <tbody>
   <?php 
   if (isset($_COOKIE["info"]) && $_COOKIE["info"]==1){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Пользователь успешно сохранен</strong>
    </div>
    ';
   }
   if (isset($_COOKIE["info"]) && $_COOKIE["info"]==2){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Пользователь успешно удален</strong>
    </div>
    ';
   }
   if (isset($_COOKIE["info"]) && $_COOKIE["info"]==3){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Пользователь успешно добавлен</strong>
    </div>
    ';
   }
   if (isset($_COOKIE["info"]) && $_COOKIE["info"]==4){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Пользователь не добавлен</strong>
    </div>
    ';
   }
    if (count($users)==0){
    echo '
<div id="dialog" title="Инфо">
<strong>Пользователь не найден!</strong>
</div>
    ';
   }
   else {
   foreach ($users as $user):

   ?>
  <tr data-href="/admin/view_users?id=<?=$user['id'];?>">
    <td style="text-align: left;"><?=$user['family'];?>&nbsp;<?=$user['name'];?>&nbsp;<?=$user['lastname'];?></td>
    <td><?=$user['doljn'];?></td>
    <td><?=$user['otdel'];?></td>
  </tr>
    <?php endforeach; }?>
    <? echo $this->pagination->create_links();?>
    </tbody>
</table>
</div>