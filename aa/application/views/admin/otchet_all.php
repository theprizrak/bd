<?
$d=date("d");
$m=date("m");
$m3=date("m")-1;
$y=date("Y");
$date2_0=date("d")-1;
$date2='0'.$date2_0.'.'.date("m.Y");
$date3='01.0'.$m3.'.'.$y;

$lastday=$this->user_model->getLastDayOfMonth($y.'-0'.$m3.'-'.$d);
$date4=$lastday.'.0'.$m3.'.'.$y;
if(!empty($_GET))
{?>
<div id="filter">
<a href="javascript:javascript:history.go(-1)"><input name="edit_ok" type="button" value="Вернуться" class="buttons_fil"></a>
<input type="submit" value="Печать" class="buttons_fil"  onClick="print_otch()"/>
</div>
<?}?>
<div id="middle">
<form method="get">
<input name="date1" class="datepicker" type="text" <?if(isset($_GET['date1']) && $_GET['date1']!=''){echo 'value="'.$_GET['date1'].'"';}?>>
<input name="date2" class="datepicker" type="text" <?if(isset($_GET['date2']) && $_GET['date2']!=''){echo 'value="'.$_GET['date2'].'"';}?>>
<input type="submit" value="Составить отчет"/>
</form>
<a href="?date1=<?=date("d.m.Y");?>&date2=<?=date("d.m.Y");?>">Сегодня</a>
<a href="?date1=<?=$date2;?>&date2=<?=$date2;?>">Вчера</a>
<a href="">За неделю</a>
<a href="?date1=<?=date("01.m.Y");?>&date2=<?=date("t.m.Y");?>">За месяц</a>
<a href="?date1=<?=$date3;?>&date2=<?=$date4;?>">За предыдущий месяц</a>
<hr /><br>
<?if(!empty($_GET))
{
    $querys=$this->user_model->get_proc();
    $que=$this->user_model->asd($_GET['date1'],$_GET['date2']);
?>
<div id="print_otch">
        <table border="1" cellspacing="0" cellpadding="0" width="600px">
		<tr>
		<td style="text-align: center;font-weight: bold;">Название процедуры</td>
		<td style="text-align: center;font-weight: bold;">Кол-во</td>
		</tr>
        <?
        $all=0;
        foreach($querys as $items){?>
        <tr>
        <td><?=$items['name_proc'];?></td>
        <td>
        <?
        $i=0;
        foreach($que as $item){
            $a=explode(';',$item['sproc']);
            foreach($a as $b){
                if($items['name_proc']==$b)
                {
                    if($i==0)
                    {$i++;}
                    else
                    {$i++;}
                }
            }
        }
        if($i!=0)
        {echo $i;}
         if($all==0)
         {$all=$i;}
         else{$all=$all+$i;}
        ?>
        </td>
        </tr>
        <?}?>
        <tr>
        <td>Итого</td>
        <td><?=$all;?></td>
        </tr>
        </table>
</div>
<?      
}
?>
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