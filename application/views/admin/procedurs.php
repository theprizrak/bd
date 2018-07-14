<div id="middle">

<table width="100%">
<tr><td style="text-align: center;"><input type="button" onclick="new_proc()" value="Добавить процедуру" class="buttons" /></td></tr>
</table>
<table width="100%" class="tableList" border="1" cellspacing="0" cellpadding="0">
<thead>
<tr>
<!--<td style="width: 4%;">№</td>-->
<td style="width: 65%;text-align: left;">Название процедуры</td>
<td style="width: 15%;">Состояние</td>
<td style="width: 15%;">Удалить</td>
</tr>
</thead>
<tbody>
<?foreach($proc as $item):?>
<tr>
<!--<td><?=$item['id'];?></td>-->
<td style="text-align: left;"><?=$item['name_proc'];?></td>
<td style="padding-left: 15px;" class="check<?=$item['id'];?>">
  <section title=".slideThree">
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="proc_state(<?=$item['id'];?>)" type="checkbox" id="slideThree<?=$item['id'];?>" name="check<?=$item['id'];?>" <?if($item['state']=='on'){echo 'checked';}?> />
      <label for="slideThree<?=$item['id'];?>"></label>
    </div>
    <!-- end .slideThree -->
  <?/*</section> ммоожжнноо ууддааллииттьь
 <select onchange="proc_state(<?=$item['id'];?>)" name="check<?=$item['id'];?>">
 <option value="on" <?if($item['state']=='on'){echo "selected";};?>>ВКЛ</option>
  <option value="off" <?if($item['state']=='off'){echo "selected";};?>>ВЫКЛ</option>
 </select>*/?>
  
</td>
<td><input onclick="del_proc(<?=$item['id'];?>)" type="button" class="del_proc" />
</tr>

<?endforeach;?>
</tbody>
</table>
</div>