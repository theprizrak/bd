<div id="middle">
<form action="/telemarketing" method="post" name="add_klients" id="jform">
<table width="100%" border="0" cellspacing="0" id="kredit">
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
<td width="33%" height="23">Дата рождения</td>
<td width="67%">
<input type="text" name="datarochde"  class="add datepicker" value="<?=set_value('datarochde',$datarochde);?>" >
</td>
</tr>
<tr>
<td width="33%" height="23">Место рождения</td>
<td width="67%">
<input type="text" name="dmestorochd" class="add" value="<?=set_value('dmestorochd',$dmestorochd);?>" >
</td>
</tr>
<tr>
<td width="33%" height="23">Паспорт серия</td>
<td width="67%">
<input type="text" name="pasportseriya" class="add pseria" value="<?=set_value('pasportseriya',$pasportseriya);?>" >
</td>
</tr>
<tr>
<td width="33%" height="23">№</td>
<td width="67%">
<input type="text" name="pasportnumer" class="add pnomer" value="<?=set_value('pasportnumer',$pasportnumer);?>" >
</td>
</tr>
<tr>
<td width="33%" height="23">Выдан</td>
<td width="67%">
<input type="text" name="pasportvidan" class="add" value="<?=set_value('pasportvidan',$pasportvidan);?>" >
</td>
</tr>
<tr>
<td width="33%" height="23">Дата выдачи</td>
<td width="67%">
<input type="text" name="pasportvidandata" class="add datepicker" value="<?=set_value('pasportvidandata',$pasportvidandata);?>" >
</td>
</tr>
<tr>
<td width="33%" height="23">Тел. дом</td>
<td width="67%">
<input type="text" name="teldom" class="add numberhome" value="<?=set_value('teldom',$teldom);?>" >
</td>
</tr>
<tr>
<td width="33%" height="23">Тел. Рабочий</td>
<td width="67%">
<input type="text" name="telrab" class="add numberhome" value="<?=set_value('telrab',$telrab);?>" >
</td>
</tr>
<tr>
    <td width="33%" height="23">Банк</td>
    <td width="67%">
    <input type="text" name="bank" class="add" value="<?=set_value('bank',$bank);?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Номер договора</td>
    <td width="67%">
    <input type="text" name="number_dog" class="add" value="<?=set_value('number_dog',$number_dog);?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Дата заключения договора</td>
    <td width="67%">
    <input type="text" name="date_dog" class="add datepicker" value="<?=set_value('date_dog',$date_dog);?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Цена товара</td>
    <td width="67%">
    <input type="text" name="summa" class="add" value="<?=set_value('summa',$summa);?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Вид продукта</td>
    <td width="67%">
    <input type="text" name="produkt" class="add" value="<?=set_value('produkt',$produkt);?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Срок платежа</td>
    <td width="67%">
    <input type="text" name="srok_kred" class="add" value="<?=set_value('srok_kred',$srok_kred);?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Дата первого платежа</td>
    <td width="67%">
    <input type="text" name="date_kred" class="add datepicker" value="<?=set_value('date_kred',$date_kred);?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Сумма в месяц</td>
    <td width="67%">
    <input type="text" name="summa_mount" class="add" value="<?=set_value('summa_mount',$summa_mount);?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Сумма первого взноса</td>
    <td width="67%">
    <input type="text" name="first_vznos" class="add" value="<?=set_value('first_vznos',$first_vznos);?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Сумма кредита</td>
    <td width="67%">
    <input type="text" name="summa_kred" class="add" value="<?=set_value('summa_kred',$summa_kred);?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Расторгнуто с банком</td>
    <td width="67%">
    <input type="text" name="off_bonk" class="add" value="<?=set_value('off_bonk',$off_bonk);?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Комментарий</td>
    <td width="67%">
    <input type="text" name="comments" class="add" value="<?=set_value('comments',$comments);?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Адресс проживания</td>
    <td width="67%">
    <input type="text" name="mesto_proz" class="add" value="<?=set_value('mesto_proz',$mesto_proz);?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Адресс проживания по прописке</td>
    <td width="67%">
    <input type="text" name="mesto_prop" class="add" value="<?=set_value('mesto_prop',$mesto_prop);?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">Продавец обеспечивает</td>
    <td width="67%">
    <input type="text" name="prodobespech" class="add" value="<?=set_value('prodobespech',$prodobespech);?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">В течении</td>
    <td width="67%">
    <input type="text" name="srokproced" class="add" value="<?=set_value('srokproced',$srokproced);?>" >
   </td>
</tr>
<tr>
    <td width="33%" height="23">ФИО оператора</td>
    <td width="67%">
    <input type="text" name="user" class="add" value="<?=$klient_vstr['user'];?>" readonly>
   </td>
</tr>
<tr>
    <td width="33%" height="23">ФИО косметолога</td>
    <td width="67%">
    <input type="text" name="kosmetolog" class="add" value="<?=$klient_vstr['kosmetolog'];?>" readonly>
   </td>
</tr>
</table>
<input name="add_ok" type="submit" value="Сохранить" class="buttons">
</form>
<strong><?=form_error('family');?></strong>
<strong><?=form_error('name');?></strong>
<strong><?=form_error('lastname');?></strong>
<strong><?=form_error('status');?></strong>
<strong><?=form_error('vstrecha');?></strong>
<strong><?=form_error('vozrast');?></strong>
<strong><?=form_error('phone');?></strong>
<strong><?=form_error('dop_phone');?></strong>
<strong><?=form_error('date_vstr');?></strong>
<strong><?=form_error('time_vstr');?></strong>
<strong><?=form_error('type_procedur');?></strong>
<strong><?=form_error('perezvon');?></strong>
<strong><?=form_error('date_perezvon');?></strong>
<strong><?=form_error('time_perezvon');?></strong>
<strong><?=form_error('tema_perezvon');?></strong>
<strong><?=form_error('comment_perezvon');?></strong>
</div>