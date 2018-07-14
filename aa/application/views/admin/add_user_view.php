<div id="middle">

<?php 
   if ($doljn=="Массажист" || $doljn=="Парикмахер" || $doljn=="Диагност" || $doljn=="Старший диагност" || $doljn=="Косметолог" ){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Сотруднику с должностью "'.$doljn.'" нельзя дать доступ к базе</strong>
    </div>
    ';
   }
    //создаем логин для пользователя
    if($otdel=='Телемаркетинг первички (Тм1)' && $doljn=="Оператор" || $doljn=="Старший оператор" || $doljn=="Подтверждающий оператор" || $doljn=="Рук-ль тм1")
    {
    $uslog='tm'.$id;
   }
   elseif($otdel=='Сервис' && $doljn=="Оператор" || $doljn=="Старший оператор" || $doljn=="Рук-ль сервиса")
   {
    $uslog='sv'.$id;
   }
   elseif($otdel=='Сервис' && $doljn=="Врач")
   {
    $uslog='doc'.$id;
   }
   elseif($otdel=='Сервис' && $doljn=="Администратор Сервис")
   {
    $uslog='srp'.$id;
   }
   elseif($otdel=='Кредитный' && $doljn=="Кредитный эксперт" || $doljn=="Старший кредитный эксперт")
   {
    $uslog='kr'.$id;
   }
   elseif($doljn=="Администратор (ресепшен)")
   {
    $uslog='rp'.$id;
   }
   elseif($otdel=='АУП' && $doljn=="IT" || $doljn=="Администратор (ресепшен)" || $doljn=="Бухгалтер" || $doljn=="Контролёр" || $doljn=="Директор" || $doljn=="Юрист")
   {
    $uslog='adm'.$id;
   }
   //генерируем пароль
   $string = random_string('alnum', 7);
   ?>
<form action="/admin/users" method="post" name="add_sotrudnik">
<input type="text" name="id_user" value="<?=$id;?>" style="width:0;height:0;display:none;" readonly>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="33%" height="23">Логин</td>
    <td width="67%">
    <input type="text" name="username" class="add" value="<?=$uslog;?>" >
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Пароль</td>
    <td width="67%">
    <input type="text" name="pass" id="pass" class="add" value="<?=$string;?>" >
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Фамилия</td>
    <td width="67%">
    <input type="text" class="add" value="<?=$family;?>" readonly>
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Имя</td>
    <td width="67%">
    <input type="text" class="add" value="<?=$name;?>" readonly>
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Отчество</td>
    <td width="67%">
    <input type="text" class="add" value="<?=$lastname;?>" readonly>
   </td>
  </tr>
    <tr>
    <td height="23">Должность</td>
    <td>
  <input type="text" class="add" value="<?=$doljn;?>" readonly>
    </td>
  </tr>
  <tr>
    <td height="23">Отдел</td>
    <td>
       <input type="text" class="add" value="<?=$otdel;?>" readonly>
    </td>
  </tr>
</table>
<?if ($doljn=="Массажист" || $doljn=="Парикмахер" || $doljn=="Диагност" || $doljn=="Старший диагност" || $doljn=="Юрист"){
    echo '';
   }
   else 
   {
    echo '<input name="add_users_ok" type="submit" value="Сохранить" class="buttons">';
   }?>

</form>
<strong><?=form_error('username');?></strong>
<strong><?=form_error('pass');?></strong>
</div>