<?
if(isset($_GET['date'])){$date=$_GET['date'];}else{$date=0;};
?>
<div id="middle">
<p style="font-size: 14px;"><b>Выбрать другую дату: <input type="button" class="datepicker" onchange="window.location = '/admin/otchet_proc?date='+this.value" value="<?if(isset($_GET['date'])){echo $_GET['date'];}?>" /></b></p>
<div id="print_otch">
<p style="font-size: 16px;"><b>Статистика за <?if(isset($_GET['date'])){echo $_GET['date'];}else{echo date("Y-m-d");}?></b></p>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<thead>
<tr>
<td></td>
<td>Назначено</td>
<!--<td>Пройдено</td>-->
<td>Отказано</td>
<td>Перезвонов</td>
</tr>
</thead>
<tbody>
<tr>
<td>Всего:</td>
<td><?echo count($this->user_model->get_nazn_today($date));?></td>
<!--<td><?echo count($this->user_model->get_proi_today($date));?></td>-->
<td><?echo count($this->user_model->get_otkz_today($date));?></td>
<td><?echo count($this->user_model->get_przvn_today($date));?></td>
</tr>
</tbody>
</table>
</div>
<script type="text/javascript">
function print_otch()
{
pr = document.getElementById('print_otch').innerHTML;
prs = "<?=$_SERVER['REQUEST_URI']?>";
newWin=window.open('','printWindow','Toolbar=0,Location=0,Directories=0,Status=0,Menubar=0,Scrollbars=0,Resizable=0'); 
newWin.document.open(pr);  
document.write(pr);
window.print(pr);
newWin.window.close();
location.href=prs;
}
</script>
</div>