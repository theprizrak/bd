<div id="middle">
<form action="/admin" method="post" name="add_sotrudnik">
<input type="text" name="id" class="add" value="<?=$id;?>" readonly style="visibility:hidden;width: 1px;height: 1px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="33%" height="23">Фамилия</td>
    <td width="67%">
    <input type="text" name="family" class="add" value="<?=set_value('family',$family);?>" >
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Имя</td>
    <td width="67%">
    <input type="text" name="name" class="add" value="<?=set_value('name',$name);?>" >
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Отчество</td>
    <td width="67%">
    <input type="text" name="lastname" class="add" value="<?=set_value('lastname',$lastname);?>" >
   </td>
  </tr>
  <tr>
    <td height="23">Дата Рождения</td>
    <td><input type="text" name="date_rozd" class="add datepicker" value="<?=set_value('date_rozd',$this->user_model->rotate_date2($date_rozd));?>" ></td>
  </tr>
  <tr>
    <td height="23">Телефон</td>
    <td><input type="text" name="phone" class="add tel" value="<?=set_value('phone',$phone);?>" ></td>
  </tr>
  <tr>
    <td height="23">Отдел</td>
    <td>
      <select name="otdel" class="select">
 	<option <? if($otdel=='Телемаркетинг первички (Тм1)'){echo 'selected';}?> value="Телемаркетинг первички (Тм1)">Телемаркетинг первички (Тм1)</option>
    <option <? if($otdel=='Сервис'){echo 'selected';}?> value="Сервис">Сервис</option>
    <option <? if($otdel=='Кредитный'){echo 'selected';}?> value="Кредитный">Кредитный</option>
    <option <? if($otdel=='АУП'){echo 'selected';}?> value="АУП">АУП</option>
  </select>
    </td>
  </tr>
    <tr>
    <td height="23">Должность</td>
    <td>
  <select name="doljn" class="select">
  <? if($doljn==''){echo 'selected';}?>
  <option disabled>Телемаркетинг первички (Тм1)</option>
 	<option <? if($doljn=='Оператор'){echo 'selected';}?> value="Оператор">Оператор</option>
    <option <? if($doljn=='Старший оператор'){echo 'selected';}?> value="Старший оператор">Старший оператор</option>
    <option <? if($doljn=='Подтверждающий оператор'){echo 'selected';}?> value="Подтверждающий оператор">Подтверждающий оператор</option>
    <option <? if($doljn=='Рук-ль тм1'){echo 'selected';}?> value="Рук-ль тм1">Рук-ль тм1</option>
    <option disabled>Сервис</option>
    <option <? if($doljn=='Массажист'){echo 'selected';}?> value="Массажист">Массажист</option>
    <option <? if($doljn=='Парикмахер'){echo 'selected';}?> value="Парикмахер">Парикмахер</option>
    <option <? if($doljn=='Диагност'){echo 'selected';}?> value="Диагност">Диагност</option>
    <option <? if($doljn=='Старший диагност'){echo 'selected';}?> value="Старший диагност">Старший диагност</option>
    <option <? if($doljn=='Оператор сервиса'){echo 'selected';}?> value="Оператор сервиса">Оператор сервиса</option>
    <option <? if($doljn=='Старший оператор'){echo 'selected';}?> value="Старший оператор">Старший оператор</option>
    <option <? if($doljn=='Администратор Сервис'){echo 'selected';}?> value="Администратор Сервис">Администратор Сервис</option>
    <option <? if($doljn=='Рук-ль сервиса'){echo 'selected';}?> value="Рук-ль сервиса">Рук-ль сервиса</option>
    <option disabled>Кредитный</option>
    <option <? if($doljn=='Кредитный эксперт'){echo 'selected';}?> value="Кредитный эксперт">Кредитный эксперт</option>
    <option <? if($doljn=='Старший кредитный эксперт'){echo 'selected';}?> value="Старший кредитный эксперт">Старший кредитный эксперт</option>
    <option disabled>АУП</option>
    <option <? if($doljn=='IT'){echo 'selected';}?> value="IT">IT</option>
    <option <? if($doljn=='Администратор (ресепшен)'){echo 'selected';}?> value="Администратор (ресепшен)">Администратор (ресепшен)</option>
    <option <? if($doljn=='Бухгалтер'){echo 'selected';}?> value="Бухгалтер">Бухгалтер</option>
    <option <? if($doljn=='Контролёр'){echo 'selected';}?> value="Контролёр">Контролёр</option>
    <option <? if($doljn=='Директор'){echo 'selected';}?> value="Директор">Директор</option>
    <option <? if($doljn=='Юрист'){echo 'selected';}?> value="Юрист">Юрист</option>
  </select>
    </td>
  </tr>
</table>
<input name="edit_sotrudnik_ok" type="submit" value="Сохранить" class="buttons">
<input name="del_sotrudnik_ok" type="submit" id="ok_opers" value="" class="buttons" style="display: none;"><input type="button" value="Удалить сотрудника" class="buttons" onclick="ok_oper('Удаление сотрудника')">
</form>
<strong><?=form_error('family');?></strong>
<strong><?=form_error('name');?></strong>
<strong><?=form_error('lastname');?></strong>
<strong><?=form_error('phone');?></strong>
<strong><?=form_error('doljn');?></strong>
<strong><?=form_error('otdel');?></strong>
</div>