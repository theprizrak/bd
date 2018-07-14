<script type="text/javascript">
//сохранение смены косметолога
function updatesotrd(id){
    var smena=$("select[name=procedura"+id+"]").val();
      $.ajax({
         type: "POST",
         url: "add_smena",
         data: {"ids": id, "smena": smena, "smena_ok": 'smena_ok'},
         cache: false,
         success: function(status){
            var status1="<div id='resp'>Сохранено</div>";
            var status2="<div id='resp'>Ошибка</div>";
             if(status == 0){
                $(".info"+id+"").addClass('respSucces');
                $(".info"+id+"").html(status1).fadeIn(1000).delay(1500).fadeOut(800);  
             }
             else if(status == 1){
                $(".info"+id+"").addClass('respError');
                $(".info"+id+"").html(status2).fadeIn(1000).delay(1500).fadeOut(800);   
             }                                              
             }
          });
          return false;                     
}
</script>

<div id="middle">

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList" id="sortTable">
    <thead>
  <tr>
    <th width="50%">ФИО</th>
    <th width="50%">Смена</th>

  </tr>
  </thead>
  <tbody>
  <?foreach ($kosmetolog as $klientus):?>
  <tr>
    <td style="text-align: left;"><?=$klientus['family'].' '.$klientus['name'].' '.$klientus['lastname'];?></td>
    <td style="text-align: center;">
    <select name="procedura<?=$klientus['id'];?>" class="select" onchange="updatesotrd(<?=$klientus['id'];?>)">
    <option value="1" <?if($klientus['smena']==1){echo 'selected';};?>>Первая смена</option>
    <option value="2" <?if($klientus['smena']==2){echo 'selected';};?>>Вторая смена</option>
    <option value="3" <?if($klientus['smena']==3){echo 'selected';};?>>Обе смены</option>
    </select>
    </td>
  </tr>
    <tr>
    <td colspan="2" class="info<?=$klientus['id'];?>" style="text-align: сenter;"></td>
  </tr>
  <? endforeach;?>
  </tbody>
  </table>

</div>