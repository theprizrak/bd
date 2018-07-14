<script type="text/javascript">
function updatesotrd(id){
    var ids=$("input[name=id"+id+"]").val();
    var plan=$("input[name=plan"+id+"]").val();
      $.ajax({
         type: "POST",
         url: "add_plan",
         data: {"ids": ids, "plan": plan, "plan_ok": 'plan_ok'},
         cache: false,
         success: function(status){
             var messageResp = new Array('План успешно установлен','Ошибка при установки плана');
             var resultStat = messageResp[Number(status)];
             if(status == 0){
                $("#resp"+id+"").addClass('respSucces');
                $("#resp"+id+"").text(resultStat).show().delay(1500).fadeOut(800);  
             }
             else if(status == 1){
                $("#resp"+id+"").addClass('respError');
                $("#resp"+id+"").text(resultStat).show().delay(1500).fadeOut(800);  
             }
             //$("#resp"+id+"").text(resultStat).show().delay(1500).fadeOut(800);                                               
             }
          });
          return false;                        
}
</script>
<div id="middle">
<form action="/admin/find" method="post" name="find_klient">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40%">Введите фамилию сотрудника</td>
    <td width="22%"><input name="family" type="text"></td>
    <td width="37%" align="left"><input name="find_ok" type="submit" value="Найти"></td>
  </tr>
</table>
</form>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList">
  <thead>
  <tr>
    <td>ФИО</td>
    <td>&nbsp;</td>
    <td>План</td>
  </tr>
  </thead>
  <tbody>
  <?php 
   if ($info==1){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Сотрудник успешно добавлен</strong>
    </div>
    ';
   }
   if ($info==2){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Сотрудник успешно отредактирован</strong>
    </div>
    ';
   }
   if ($info==3){
    echo '
    <div id="dialog" title="Инфо">
    <strong>Сотрудник успешно удален</strong>
    </div>
    ';
   }
    if (count($sotrudnik)==0){
    echo '
<div id="dialog" title="Инфо">
<strong>Сотрудник не найден!</strong>
</div>
    ';
   }
   else {
   foreach ($sotrudnik as $sotrudniks):

   ?>
  <tr>
    <td style="text-align: left;width: 280px;" class="names"><?=$sotrudniks['family'];?>&nbsp;<?=$sotrudniks['name'];?>&nbsp;<?=$sotrudniks['lastname'];?></td>
    <td style="width: 290px;"><div id="resp<?=$sotrudniks['id'];?>"></div></td>
    <td style="width: 220px;">
    <form action="" method="post" name="plan<?=$sotrudniks['id'];?>">
    <input type="text" name="id<?=$sotrudniks['id'];?>" value="<?=$sotrudniks['id'];?>" hidden="hidden" style="width: 1px;height: 1px;"/>
    <input name="plan<?=$sotrudniks['id'];?>" class="plan" type="text" maxlength="3" value="<?=$sotrudniks['plan'];?>"/>
    <input name="submit" id="plan_ok<?=$sotrudniks['id'];?>" type="button" value="OK" onClick="updatesotrd(<?=$sotrudniks['id'];?>)"/>
    </form>
    </td>
  </tr>
    <?php endforeach; }?>
    <? echo $this->pagination->create_links();?>
    </tbody>
</table>
</div>