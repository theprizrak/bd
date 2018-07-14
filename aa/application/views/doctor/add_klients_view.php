<div id="middle">
<form action="/doctor" method="post" name="add_klients" id="jform">
<table width="50%" border="0" cellspacing="0" cellpadding="0">
<input type="text" name="date_dobav" class="add" value="<?=date('Y-m-d');?>" style="width: 1px;height: 1px;display: none;">
<input type="text" name="who_user" class="add" value="serv" style="width: 1px;height: 1px;display: none;">

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
    <tr style="background: #A8F3AE;" class="otkz">
    <td height="23" colspan="2">

<input type="text" name="id_doctor" style="width: 0px;height: 0px;display: none;" value="<?=$this->session->userdata('user_id');?>" readonly>
<table width="100%" cellspacing="0" cellpadding="0">
<tr>
<td style="width:50%;text-align:center;"><b>Рекомендации</b></td>
<td style="width:50%;text-align:center;"><b>Противопоказания</b></td>
</tr>
<tr>
<td width="40%" style="vertical-align: top;">
<textarea name="recomendation" class="doc_textarea"></textarea>
</td>
<td width="60%" style="vertical-align: top;">
<textarea name="contraindications" class="doc_textarea"></textarea>
</td>
</tr>
</table>

   </td>
   </tr>
  <tr><td><input type="text" name="user" class="add" value="<? echo $this->session->userdata('family')." ".$this->session->userdata('name');?>" readonly style="visibility:hidden;width: 1px;height: 1px;"></td>
  </tr>
</table>
<!--<input type="button" value="Сохранить" onclick="addClient()" class="buttons">-->
<input name="add_ok" type="submit" id="add_okkk" value="Сохранить"  class="buttons">
</form>
</div>