<div id="middle">
<form action="/admin/users" method="post" name="add_klients">
<input type="text" name="id_user" value="<?=$id;?>" style="width:0;height:0;display:none;" readonly>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="33%" height="23">Доступ к сайту</td>
    <td width="67%">
    <!-- .slideThree -->
    <div class="slideThree1">  
        <input onchange="disable_user()" type="checkbox" id="slideThree" name="dostup" <?if($dostup=='on'){echo 'checked';}?> />
        <label for="slideThree"></label>
    </div>
    <!-- end .slideThree -->
   </td>
  </tr>
<tr>
    <td width="33%" height="23">Логин</td>
    <td width="67%">
    <input type="text"class="add" value="<?=set_value('username',$username);?>" readonly>
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Пароль</td>
    <td width="67%">
    <input type="text" name="pass" class="add" value="<?=set_value('pass',$pass);?>" >
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Фамилия</td>
    <td width="67%">
    <input type="text" class="add" value="<?=set_value('family',$family);?>" readonly>
	
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Имя</td>
    <td width="67%">
    <input type="text" class="add" value="<?=set_value('name',$name);?>" readonly>
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Отчество</td>
    <td width="67%">
    <input type="text" class="add" value="<?=set_value('lastname',$lastname);?>" readonly>
   </td>
  </tr>
</table>
<input name="edit_users_ok" type="submit" value="Сохранить" class="buttons">
<input name="del_users_ok" type="submit" value="" class="buttons" id="ok_opers" style="display: none;"><input type="button" value="Удалить пользователя" class="buttons" onclick="ok_oper('Удаление пользователя')">
</form>
</div>