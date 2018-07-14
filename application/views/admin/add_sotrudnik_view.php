<script>
function vibor_doljn()
{
    var vibor_doljn=$('select[name=otdel]').val();
    //alert(vibor_doljn);
    if(vibor_doljn=='Телемаркетинг первички (Тм1)')
    { $('.serv').fadeOut(300); $('.kred').fadeOut(300); $('.aups').fadeOut(300); $('.tm').fadeIn(300); }
    else if(vibor_doljn=='Сервис')
    { $('.tm').fadeOut(300); $('.kred').fadeOut(300); $('.aups').fadeOut(300); $('.serv').fadeIn(300); }
    else if(vibor_doljn=='Кредитный')
    { $('.serv').fadeOut(300); $('.tm').fadeOut(300); $('.aups').fadeOut(300); $('.kred').fadeIn(300); }
    else if(vibor_doljn=='АУП')
    { $('.serv').fadeOut(300); $('.kred').fadeOut(300); $('.tm').fadeOut(300); $('.aups').fadeIn(300); }
}

</script>
<div id="middle">

<form action="/admin" method="post" name="add_sotrudnik">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="33%" height="23">Фамилия</td>
    <td width="67%">
    <input type="text" name="family" class="add" value="<?=set_value('family');?>" >
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Имя</td>
    <td width="67%">
    <input type="text" name="name" class="add" value="<?=set_value('name');?>" >
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Отчество</td>
    <td width="67%">
    <input type="text" name="lastname" class="add" value="<?=set_value('lastname');?>" >
   </td>
  </tr>
  <tr>
    <td height="23">Дата Рождения</td>
    <td><input type="text" name="date_rozd" class="add datepicker" value="<?=set_value('date_rozd');?>" ></td>
  </tr>
  <tr>
    <td height="23">Телефон</td>
    <td><input type="text" name="phone" class="add tel" value="<?=set_value('phone');?>" ></td>
  </tr>
  
  <tr>
    <td height="23">Отдел</td>
    <td>
      <select name="otdel" class="select" onchange="vibor_doljn()">
 	<option value="Телемаркетинг первички (Тм1)">Телемаркетинг первички (Тм1)</option>
    <option value="Сервис">Сервис</option>
    <option value="Кредитный">Кредитный</option>
    <option value="АУП">АУП</option>
  </select>
    </td>
  </tr>
    <tr>
    <td height="23">Должность</td>
    <td>
  <select name="doljn" class="select">
  <option class="tm" disabled>Телемаркетинг первички (Тм1)</option>
 	<option class="tm" value="Оператор">Оператор</option>
    <option class="tm" value="Старший оператор">Старший оператор</option>
    <option class="tm" value="Подтверждающий оператор">Подтверждающий оператор</option>
    <option class="tm" value="Рук-ль тм1">Рук-ль тм1</option>
    
    <option class="serv" style="display: none;" disabled>Сервис</option>
    <option class="serv" style="display: none;" value="Массажист">Массажист</option>
    <option class="serv" style="display: none;" value="Парикмахер">Парикмахер</option>
    <option class="serv" style="display: none;" value="Косметолог">Косметолог</option>
    <option class="serv" style="display: none;" value="Диагност">Диагност</option>
    <option class="serv" style="display: none;" value="Врач">Врач</option>
    <option class="serv" style="display: none;" value="Старший диагност">Старший диагност</option>
    <option class="serv" style="display: none;" value="Оператор сервиса">Оператор сервиса</option>
    <option class="serv" style="display: none;" value="Старший оператор">Старший оператор</option>
    <option class="serv" style="display: none;" value="Администратор Сервис">Администратор Сервис</option>
    <option class="serv" style="display: none;" value="Рук-ль сервиса">Рук-ль сервиса</option>
    
    <option class="kred" style="display: none;" disabled>Кредитный</option>
    <option class="kred" style="display: none;" value="Кредитный эксперт">Кредитный эксперт</option>
    <option class="kred" style="display: none;" value="Старший кредитный эксперт">Старший кредитный эксперт</option>
    
    <option class="aups" style="display: none;" disabled>АУП</option>
    <option class="aups" style="display: none;" value="IT">IT</option>
    <option class="aups" style="display: none;" value="Администратор (ресепшен)">Администратор (ресепшен)</option>
    <option class="aups" style="display: none;" value="Бухгалтер">Бухгалтер</option>
    <option class="aups" style="display: none;" value="Контролёр">Контролёр</option>
    <option class="aups" style="display: none;" value="Директор">Директор</option>
    <option class="aups" style="display: none;" value="Юрист">Юрист</option>
  </select>
    </td>
  </tr>
</table>
<input name="add_sotrudnik_ok" type="submit" value="Сохранить">
</form>
<strong><?=form_error('family');?></strong>
<strong><?=form_error('name');?></strong>
<strong><?=form_error('lastname');?></strong>
<strong><?=form_error('phone');?></strong>
<strong><?=form_error('date_vstr');?></strong>
<strong><?=form_error('user');?></strong>
</div>