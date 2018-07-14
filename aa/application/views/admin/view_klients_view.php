<?
$users_name=preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $this->session->userdata('family'))." ".preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $this->session->userdata('name'));
?>
<div id="middle">
<form action="/admin/klients" method="post" name="add_klients">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<input type="text" name="idus" class="add" value="<?=$id;?>" style="width: 1px;height: 1px;visibility: hidden;" readonly>
  <tr>
    <td width="33%" height="23">Фамилия</td>
    <td width="67%">
    <input type="text" name="family" class="add" value="<?=$family;?>" readonly>
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Имя</td>
    <td width="67%">
    <input type="text" name="name" class="add" value="<?=$name;?>" readonly>
   </td>
  </tr>
  <tr>
    <td width="33%" height="23">Отчество</td>
    <td width="67%">
    <input type="text" name="lastname" class="add" value="<?=$lastname;?>" readonly>
   </td>
  </tr>
  <tr>
    <td height="23">Телефон</td>
    <td><input type="text" name="phone" class="add" value="<?=$phone;?>" readonly></td>
  </tr>
  <tr>
    <td height="23">Статус клиента</td>
    <td><input type="text" name="status" class="add" value="<? if($status==0){ echo'Лояльный';}else{echo'Негатив';}?>" readonly></td>
  </tr>
    <tr>
    <td height="23">Сотрудник</td>
    <td><input type="text" name="user" class="add" value="<?=$user;?>" readonly></td>
  </tr>
<?if($otkaz_tm==1 || $otkaz_serv==1){?>
<tr style="background: #FFA0A0;">
    <td height="23">Причина отказа</td>
    <td><textarea name="text_prichotkaza" cols="30" rows="6" style="resize: none;border: 1px solid #ccc;" readonly><?if($otkaz_tm==1){echo $prichotkaza_tm;}elseif($otkaz_serv==1){echo $prichotkaza_serv;}?></textarea></td>
  </tr>
  <?}else if(!empty($klientss_vstr)){
    ?>
    <tr>
  <td colspan="2">
    <table class="vstr1" style="background: #A8F3AE;padding: 0 10px;"  width="100%" border='0' cellspacing="0" cellpadding="0">
    <thead>
    <tr>
    <td></td>
    <td>Дата встречи</td>
    <td>Время встречи</td>
    <td>На процедуру</td>
	<td>Косметолог</td>
	<td>Банк</td>
	<td>Номер договора</td>
	<td>Сумма</td>
    </tr>
    </thead>
    <tbody id="newvstr">
    <?if($klientss_vstr!=0)
    {
        foreach($klientss_vstr as $klientus_vstr):
        $last_dog=$this->user_model->get_last_dog($id);
        ?>
        <tr>
        <td><?if($klientus_vstr['otkaz']==0){?><div class="edit_vstr"><img title="Удалить встречу" src="<?= base_url();?>/images/otkz.png" width="20" height="20" onclick="del_vstr_admin('<?=$klientus_vstr['id'];?>','<?=$id;?>','<?=$users_name;?>')" style="cursor: pointer;"/></div><?}?></td>
        <td><input type="text" class="add" value="<?=$this->user_model->rotate_date2($klientus_vstr['date_vstr']);?>" readonly="readonly"></td>
        <td><input type="text" class="add" value="<?=$klientus_vstr['time_vstr'];?>" readonly="readonly"></td>
        <td><input type="text" class="add" value="<?if(isset($klientus_vstr['sproc']) && $klientus_vstr['sproc']!=""){echo $klientus_vstr['sproc'];}if(isset($klientus_vstr['type_procedur']) && $klientus_vstr['type_procedur']!=''){echo $klientus_vstr['type_procedur'];}?>" readonly="readonly"></td>
		<td><input type="text" class="add" value="<?=$klientus_vstr['kosmetolog'];?>" readonly="readonly"></td>
		<td><input type="text" class="add" value="<?if(!empty($last_dog)){echo $last_dog['bank'];}?>" readonly="readonly"></td>
		<td><input type="text" class="add" value="<?if(!empty($last_dog)){echo $last_dog['number_dog'];}?>" readonly="readonly"></td>
		<td><input type="text" class="add" value="<?if(!empty($last_dog)){echo $last_dog['summa'];}?>" readonly="readonly"></td>
        </tr>
        <?
        endforeach;
    }?>
    </tbody>
    </table>
  </td>
  </tr>
  <? }
   if($perezvon_tm==1 || $perezvon_serv==1){
    ?>  
  <tr class="otkz otkz_vstr"<?if($otkaz_tm==1 || $otkaz_serv==1){echo'style="display:none;"';}?>>
  <td colspan="2">
    <table style="background: #EDF3A8;padding: 0 0px;"  width="100%" border='0' cellspacing="0" cellpadding="0">
    <thead>
    <tr>
    <td>Дата звонка</td>
    <td>Время звонка</td>
    <td>Тема звонка</td>
	<td>Коментарий</td>
    </tr>
    </thead>
    <tbody id="newvstr">
    <?if($klientss_zvon!=0)
    {
        foreach($klientss_zvon as $klientus_zvon):
        $last_dog=$this->user_model->get_last_dog($id);
        ?>
        <tr>
        <td><input type="text" class="add" value="<?=$this->user_model->rotate_date2($klientus_zvon['date_perezvon']);?>" readonly="readonly"></td>
        <td><input type="text" class="add" value="<?=$klientus_zvon['time_perezvon'];?>" readonly="readonly"></td>
        <td><input type="text" id="time" class="add" value="<?=$klientus_zvon['tema_perezvon'];?>" readonly="readonly"></td>
        <td><textarea cols="30"  style="resize: none;border: 1px solid #ccc;" readonly="readonly"><?=$klientus_zvon['comment_perezvon'];?></textarea></td>
        </tr>
        <?
        endforeach;
    }?>
    </tbody>
    </table>
  </td>
  </tr>

  
  <? }?>
</table>
<a href="javascript:javascript:history.go(-1)"><input name="edit_ok" type="button" value="Вернуться назад" class="buttons"></a>
<? if($this->session->userdata('doljn')=='IT'){?><input name="del_ok" id="ok_opers" type="submit" value="" class="buttons" style="display:none;"><input type="button" value="Удалить клиента" class="buttons" onclick="del_kl_oper('Удаление клиента')"><?}?>
</form>
</div>