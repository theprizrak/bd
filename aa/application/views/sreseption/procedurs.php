<div id="middle">

<table width="100%">
<?$configs=$this->auth_lib->config_site(); // настройки сайта
if($configs['add_proc_rserv']=='on'){?><tr><td style="text-align: center;"><input type="button" onclick="new_proc_sresep()" value="Добавить процедуру" class="buttons" /></td></tr><?}?>
</table>
<table width="100%" class="tableList" border="1" cellspacing="0" cellpadding="0">
<thead>
<tr>
<!--<td style="width: 4%;">№</td>-->
<td style="width: 55%;text-align: left;">Название процедуры</td>
<td style="width: 10%;">Время выполнения</td>
<td style="width: 15%;">Состояние</td>
<td style="width: 15%;">Удалить</td>
</tr>
</thead>
<tbody>
<?foreach($proc as $item):?>
<tr id="<?=$item['id'];?>">
<!--<td><?=$item['id'];?></td>-->
<td style="text-align: left;"><?=$item['name_proc'];?></td>
<td style="text-align: center;"><input name="time<?=$item['id'];?>" value="<?=$item['time'];?>" onblur="safe_time(<?=$item['id'];?>)"></td>
<td style="padding-left: 15px;" class="check<?=$item['id'];?>">
<?if($configs['sost_proc_rserv']=='on'){?>
<section title=".slideThree">
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="proc_state(<?=$item['id'];?>)" type="checkbox" id="slideThree<?=$item['id'];?>" name="check<?=$item['id'];?>" <?if($item['state']=='on'){echo 'checked';}?> />
      <label for="slideThree<?=$item['id'];?>"></label>
    </div>
    <!-- end .slideThree -->
  </section>
<?}?>
</td>
<td><?if($configs['del_proc_rserv']=='on'){?><input onclick="del_proc_sresep(<?=$item['id'];?>)" type="button" class="del_proc" /><?}?></td>
</tr>

<?endforeach;?>
</tbody>
</table>
</div>