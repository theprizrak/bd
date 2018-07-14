<script type="text/javascript">
function perezzzzvon()
{
   var el=$('select[name="perezvon_tm"]').val();
   if(el==1)
   { $('.Sel1').fadeIn(300); }
   else
   { $('.Sel1').fadeOut(300); }
}

function vstrrre()
{
   var el=$('select[name="vstrecha"]').val();
   if(el==1)
   { $('.vstr1').fadeIn(300); }
   else
   { $('.vstr1').fadeOut(300); }
}
function otkazvstr()
{
   var el=$('select[name="otkaz_tm"]').val();
   if(el==1)
   { $('.Sel2').fadeIn(300);$('.otkz').fadeOut(300);}
   else
   { $('.Sel2').fadeOut(300);$('.otkz').fadeIn(300);}
}

</script>
<div id="middle">
<form action="/telemarketing" method="post" name="add_klients" id="jform">
<table width="50%" border="0" cellspacing="0" cellpadding="0">
<input type="text" name="date_dobav" class="add" value="<?=date('d.m.Y');?>" style="width: 1px;height: 1px;display: none;">
<input type="text" name="who_user" class="add" value="tm" style="width: 1px;height: 1px;display: none;">

  <tr>
    <td width="33%" height="23">Фамилия</td>
    <td width="67%">
    <input type="text" name="family" id="family" class="add" value="<?=set_value('family');?>" >
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Имя</td>
    <td width="67%">
    <input type="text" name="name" id="name" class="add" value="<?=set_value('name');?>" >
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Отчество</td>
    <td width="67%">
    <input type="text" name="lastname" id="lastname" class="add" value="<?=set_value('lastname');?>" >
   </td>
  </tr>
    <tr>
    <td width="33%" height="23">Возраст</td>
    <td width="67%">
    <input type="text" name="vozrast" id="vozrast" maxlength="2" class="add" value="<?=set_value('vozrast');?>" >
   </td>
  </tr>
  <tr>
    <td height="23">Телефон</td>
    <td><input type="text" name="phone" id="phone" onblur="phones()" class="add tel" value="<?=set_value('phone');?>" ></td>
  </tr>
    <tr>
    <td height="23">Доп. Телефон</td>
    <td><input type="text" name="dop_phone" id="dop_phone" class="add tel" value="<?=set_value('dop_phone');?>" ></td>
  </tr>
  <tr>
    <td height="23">Статус клиента</td>
    <td>
    <select name="status" class="select">
    <option value="0" <?php echo set_select('status', '0', TRUE); ?>>Лояльный</option>
    <option value="1"<?php echo set_select('status', '1'); ?>>Негатив</option>
    </select>
    </td>
    </tr>
    <tr>
    <td height="23">Отказ от встречи</td>
    <td>
    <select name="otkaz_tm" class="select" onchange="otkazvstr()">
    <option value="0" <?php echo set_select('otkaz_tm', '0', TRUE); ?>>Нет</option>
    <option value="1" <?php echo set_select('otkaz_tm', '1'); ?>>Да</option>
    </select>
    </td>
  </tr>
  <tr class="Sel2" style="display: none; background: #EDF3A8;">
    <td height="23">Причина отказа</td>
    <td><textarea name="prichotkaza_tm" cols="30" rows="6" style="resize: none;border: 1px solid #ccc;"><?=set_value('prichotkaza_tm');?></textarea></td>
  </tr>
  </tr>
    <tr style="background: #A8F3AE;" class="otkz">
    <td height="23" >Встреча</td>
    <td>
    <select name="vstrecha" class="select" onchange="vstrrre()">
    <option value="0" <?php echo set_select('vstrecha', '0', TRUE); ?>>Нет</option>
    <option value="1" <?php echo set_select('vstrecha', '1'); ?>>Да</option>
    </select>
    </td>
  </tr>
  <tr class="vstr1 otkz" style="display: none; background: #A8F3AE;">
    <td height="23">Дата встречи</td>
    <td><input type="text" name="date_vstr" class="add datepicker" value="<?=set_value('date_vstr');?>" ></td>
  </tr>
    <tr class="vstr1 otkz" style="display: none; background: #A8F3AE;"> 
    <td height="23">Время встречи</td>
    <td><input type="text" name="time_vstr" id="time_vstr" onblur="timevstrs()" class="add time" value="<?=set_value('time_vstr');?>" ></td>
  </tr>
  </tr>
    <tr class="vstr1 otkz" style="display: none; background: #A8F3AE;"> 
    <td height="23">Комментарий к встречи</td>
    <td><textarea name="comments" style="resize: none;border: 1px solid #ccc;"><?=set_value('comments');?></textarea></td>
  </tr>
  <tr class="vstr1 otkz" style="display: none; background: #A8F3AE;">
    <td height="23">Тип процедуры</td>
    <td>
    <select name="type_procedur" class="select">
    <option value="" selected="selected">&nbsp;</option>
 	<option value="СПА Лицо">СПА Лицо</option>
    <option value="СПА Тело">СПА Тело</option>
    <option value="СПА Волосы">СПА Волосы</option>
  </select>
    </td>
  </tr>
  <tr style="background: #EDF3A8;" class="otkz">
    <td height="23">Перезвон</td>
    <td>
    <select name="perezvon_tm" class="select" onchange="perezzzzvon()">
    <option value="0" <?php echo set_select('perezvon_tm', '0', TRUE); ?>>Нет</option>
    <option value="1" <?php echo set_select('perezvon_tm', '1'); ?>>Да</option>
    </select>
    </td>
  </tr>
  <tr class="Sel1" style="display: none; background: #EDF3A8;">
    <td height="23">Дата звонка</td>
    <td><input type="text" name="date_perezvon" class="add datepicker" value="<?=set_value('date_perezvon');?>" ></td>
  </tr>
  <tr class="Sel1" style="display: none; background: #EDF3A8;">
    <td height="23">Время звонка</td>
    <td><input type="text" name="time_perezvon" id="time_perezvon" onblur="timeperez()" class="add time" value="<?=set_value('time_perezvon');?>" ></td>
  </tr>
  <tr class="Sel1" style="display: none; background: #EDF3A8;">
    <td height="23">Тема звонка</td>
    <td><input type="text" name="tema_perezvon" class="add" value="<?=set_value('tema_perezvon');?>" ></td>
  </tr>
  <tr class="Sel1" style="display: none; background: #EDF3A8;">
    <td height="23">Коментарий</td>
    <td><textarea name="comment_perezvon" cols="30" rows="6" style="resize: none;border: 1px solid #ccc;"><?=set_value('comment_perezvon');?></textarea></td>
  </tr>
  <tr>
    <td width="33%" height="23">Предварительное подтверждение</td>
    <td width="67%">
    <input type="text" name="predpod" id="predpod'" class="add" value="<?=set_value('predpod');?>" >
   </td>
  <tr>
    <td height="23">&nbsp;</td>
    <td><input type="text" name="user" class="add" value="<? echo $this->session->userdata('family')." ".$this->session->userdata('name');?>" readonly style="visibility:hidden;width: 1px;height: 1px;"></td>
  </tr>
</table>
<input type="button" value="Сохранить" onclick="addClient()" class="buttons">
<input name="add_ok" type="submit" id="add_okkk" style="display: none;" value="Сохранить"  class="buttons">
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