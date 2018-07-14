<? $us=$this->session->userdata('family')." ".$this->session->userdata('name');
$configs=$this->auth_lib->config_site(); // настройки сайта 
//постраничная навигация по встречам
//$this->load->view('pagination_vstr.php');
include ('pagination_vstr.php');
$config['per_page'] = $configs['num_vstr_przvn'];
$config['base_url'] = base_url().'/ptelemarketing/edit';
$config['total_rows'] = count($this->user_model->get_klients_vstr_tel1_pag($id));
$this->pagination->initialize($config);
?>
<div id="middle">
<form action="/telemarketing" method="post" name="add_klients">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<input type="text" name="id" class="add" value="<?=$id;?>" readonly style="visibility:hidden;width: 1px;height: 1px;">
<input type="text" name="date_dobav" class="add" value="<?=date('d.m.Y');?>" style="width: 1px;height: 1px;display: none;">
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
    <td width="33%" height="23">Возраст</td>
    <td width="67%">
    <input type="text" class="add" value="<?=set_value('vozrast',$vozrast);?>">
   </td>
  </tr>
  <tr>
    <td height="23">Телефон</td>
    <td><input type="text" name="phone" class="add tel" value="<?=set_value('phone',$phone);?>" ></td>
  </tr>
  <tr>
    <td height="23">Статус клиента</td>
    <td>
    <select name="status" class="select">
    <option value="0" <?php if($status==0){echo 'selected="selected"';} ?><?php echo set_select('status', '0', TRUE); ?>>Лояльный</option>
    <option value="1" <?php if($status==1){echo 'selected="selected"';} ?><?php echo set_select('status', '1'); ?>>Негатив</option>
    </select>
    </td>
  </tr>
  <?php if($otkaz_tm==1){?>
  <tr class="qwe" style="background: #E62A2A;">
    <td height="23">Отказ</td>
    <td>
    <select name="otkaz_tm" class="select" onchange="otkazvstr_ptel()">
    <option value="0" <?php if($otkaz_tm==0){echo 'selected="selected"';} ?><?php echo set_select('otkaz_tm', '0', TRUE); ?>>Нет</option>
    <option value="1" <?php if($otkaz_tm==1){echo 'selected="selected"';} ?><?php echo set_select('otkaz_tm', '1'); ?>>Да</option>
    </select>
    </td>
  </tr>
  <?}?>
    <tr style="background: #A8F3AE;<?if($otkaz_tm==1){echo"display:none;";}?>" class="otkz_vstr">
    <td height="23" style="font-size: 18px;">Встреча</td>
    <td>
    <!--<select name="vstrecha" class="select" onchange="vstrrre()">
    <option value="0" <?php if($vstrecha==0){echo 'selected="selected"';} ?><?php echo set_select('vstrecha', '0', TRUE); ?>>Нет</option>
    <option value="1" <?php if($vstrecha==1){echo 'selected="selected"';} ?><?php echo set_select('vstrecha', '1'); ?>>Да</option>
    </select>-->
    </td>
  </tr>
  <tr class="otkz_vstr"<?if($otkaz_tm==1){echo'style="display:none;"';}?>>
  <td colspan="2">
  
    <table class="vstr1" style="background: #A8F3AE;padding: 0 0px;<?//if($vstrecha==0){echo"display:none;";}?>"  width="100%" border='0' cellspacing="0" cellpadding="0">
    <thead>
    <tr>
    <td colspan="10"><?=$this->pagination->create_links();?></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td>Дата встречи</td>
    <td>Время встречи</td>
    <td>На процедуру</td>
    <td>Сотрудник</td>
    <td>Офис</td>
    <td>Перенос</td>
    <td>Статус</td>
    <td></td>
    <td></td>
    </tr>
    </thead>
    <tbody id="newvstr">
    <?
    $klientss_vstr = $this->user_model->get_klients_vstr_tel1($id,$config['per_page'],$this->uri->segment(3));
    if($klientss_vstr!=0)
    {
        foreach($klientss_vstr as $klientus_vstr):
        ?>
        <tr <?if($klientus_vstr['otkaz']==1){echo'style="background: #FF0303;"';}?>>
        <td><?if($klientus_vstr['sproc']==""){if($klientus_vstr['otkaz']==0){?><div class="edit_vstr"><img title="Редактировать встречу" src="<?= base_url();?>/images/edit_vstr.png" width="20" height="20" onclick="edit_vstr('<?=$klientus_vstr['date_vstr'];?>')" style="cursor: pointer;"/></div><?}}?></td>
        <td><?if($klientus_vstr['otkaz']==0){?><div class="edit_vstr"><img title="Отказ от встречи" src="<?= base_url();?>/images/otkz.png" width="20" height="20" onclick="otkz_vstr('<?=$klientus_vstr['id'];?>','<?=$id;?>')" style="cursor: pointer;"/></div><?}?></td>
        <td><input type="text" class="add1 datepicker edit<?=$klientus_vstr['date_vstr'];?>" name="dd<?=$klientus_vstr['date_vstr'];?>" value="<?=$this->user_model->rotate_date2($klientus_vstr['date_vstr']);?>" readonly="readonly"></td>
        <td><input type="text" class="add1 time edit<?=$klientus_vstr['date_vstr'];?>" name="tt<?=$klientus_vstr['date_vstr'];?>" value="<?=$klientus_vstr['time_vstr'];?>" readonly="readonly"></td>
        <td>
        <?if($klientus_vstr['sproc']!=""){echo $klientus_vstr['sproc'];}else{?>
        <select name="tpr<?=$klientus_vstr['date_vstr'];?>" class="select1" disabled="disabled">
        <option value="" <?if($klientus_vstr['type_procedur']==""){echo 'selected="selected"';}?>>&nbsp;</option>
        <option value="СПА Волосы" <?if($klientus_vstr['type_procedur']=="СПА Волосы"){echo 'selected="selected"';}?>>СПА Волосы</option>
        <option value="СПА Лицо" <?if($klientus_vstr['type_procedur']=="СПА Лицо"){echo 'selected="selected"';}?>>СПА Лицо</option>
        <option value="СПА Тело" <?if($klientus_vstr['type_procedur']=="СПА Тело"){echo 'selected="selected"';}?>>СПА Тело</option>
        </select>
        <?}?>
        </td>
        <td><input type="text" class="add1" name="uu<?=$klientus_vstr['date_vstr'];?>" value="<?=$klientus_vstr['user'];?>" readonly="readonly"></td>
        <td><input type="text" class="add1" value="<?=$klientus_vstr['office'];?>" readonly="readonly"></td>
        <td><input type="text" class="add1" value="<?=$klientus_vstr['perenos'];?>" readonly="readonly"></td>
        <td class="pod_oks<?=$klientus_vstr["date_vstr"];?>">
        <?
        if($klientus_vstr['ok']==1){echo "Подтверждено";}
        elseif($klientus_vstr['ok']==2){echo "Н.Д";}
        elseif($klientus_vstr['ok']==3){echo "Перенос";}
        ?>
        </td>
        <td>
        <?if($klientus_vstr['otkaz']==0){?>
        <input <?if($klientus_vstr['ok']!=0){echo 'style="display:none;"';}?> type="button" name="ok<?=$klientus_vstr["date_vstr"];?>" class="add1 podtv" value="Подтвердить" onclick="pod_ok('<?=$id;?>','<?=$klientus_vstr["date_vstr"];?>','1')">
        <input <?if($klientus_vstr['ok']!=0){echo 'style="display:none;"';}?> type="button" name="ok<?=$klientus_vstr["date_vstr"];?>" class="add1 podtv" value="Н.Д" onclick="pod_ok('<?=$id;?>','<?=$klientus_vstr["date_vstr"];?>','2')">
        <input <?if($klientus_vstr['ok']!=0){echo 'style="display:none;"';}?> type="button" name="ok<?=$klientus_vstr["date_vstr"];?>" class="add1 podtv" value="Перенос" onclick="pod_ok('<?=$id;?>','<?=$klientus_vstr["date_vstr"];?>','3')">
        <?}?>
        </td>
        <td>
        <?if($klientus_vstr['otkaz']==0){?>
        <input type="button" name="safe<?=$klientus_vstr["date_vstr"];?>" class="add1 podtv" value="Сохранить" onclick="safe_ok('<?=$klientus_vstr['id'];?>','<?=$id;?>','<?=$klientus_vstr["date_vstr"];?>')" style="display: none;">
        <?}?>
        </td>
	</tr>
        <?
        endforeach;
    }?>
    <tr>
    <td colspan="10"><?=$this->pagination->create_links();?></td>
    </tr>
    </tbody>
    </table>
  </td>
  </tr>
  <tr class="Sel1" style="display: none; background: #F16C6C;">
    <td height="23">Отказ от встречи</td>
    <td>
    <select name="otkaz" class="select" onchange="otkazvstr()">
    <option value="0" <?php echo set_select('otkaz', '0', TRUE); ?>>Нет</option>
    <option value="1" <?php echo set_select('otkaz', '1'); ?>>Да</option>
    </select>
    </td>
  </tr>
  <tr class="Sel2" style="display: none; background: #EDF3A8;">
    <td height="23">Причина отказа</td>
    <td><textarea name="prichotkaza" cols="30" rows="6" style="resize: none;border: 1px solid #ccc;"><?=set_value('prichotkaza');?></textarea></td>
  </tr>
  
  <tr style="background: #EDF3A8;<?if($otkaz_tm==1){echo'display:none;';}?>" class="otkz otkz_vstr">
    <td height="23" style="font-size: 18px;">Перезвон</td>
    <td>
    <!--<select name="perezvon" class="select" onchange="perezzzzvon()">
    <option value="0" <?php if($perezvon==0){echo 'selected="selected"';} ?><?php echo set_select('perezvon', '0', TRUE); ?>>Нет</option>
    <option value="1" <?php if($perezvon==1){echo 'selected="selected"';} ?><?php echo set_select('perezvon', '1'); ?>>Да</option>
    </select>-->
    </td>
  </tr>
  
  <tr class="otkz otkz_vstr"<?if($otkaz_tm==1){echo'style="display:none;"';}?>>
  <td colspan="2">
    <table class="Sel1" style="background: #EDF3A8;padding: 0 0px;"  width="100%" border='0' cellspacing="0" cellpadding="0">
    <thead>
    <tr>
    <td>Дата звонка</td>
    <td>Время звонка</td>
    <td>Тема звонка</td>
    <td>Коментарий</td>
    </tr>
    </thead>
    <tbody id="newzvon">
    <?if($klientss_zvon!=0)
    {
        foreach($klientss_zvon as $klientus_zvon):
        ?>
        <tr>
        <td><input type="text" class="add datepicker" value="<?=$this->user_model->rotate_date2($klientus_zvon['date_perezvon']);?>" readonly="readonly"></td>
        <td><input type="text" class="add time" value="<?=$klientus_zvon['time_perezvon'];?>" readonly="readonly"></td>
        <td><input type="text" id="time" class="add" value="<?=$klientus_zvon['tema_perezvon'];?>" readonly="readonly"></td>
        <td><textarea name="comment_perezvon" cols="30" rows="6" style="resize: none;border: 1px solid #ccc;"><?=$klientus_zvon['comment_perezvon'];?></textarea></td>
        </tr>
        <?
        endforeach;
    }?>
    </tbody>
    </table>

  </td>
  </tr>

</table>
<a href="javascript:javascript:history.go(-1)"><input name="edit_ok" type="button" value="Вернуться назад" class="buttons"></a>
<!--<a href="/ptelemarketing"><input name="edit_ok" type="button" value="Вернуться назад" class="buttons"></a>-->
</form>

</div>