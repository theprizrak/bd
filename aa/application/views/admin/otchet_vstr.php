<?if(!empty($_GET))
{?>
<div id="filter">
<a href="javascript:javascript:history.go(-1)"><input name="edit_ok" type="button" value="Вернуться" class="buttons_fil"></a>
<input type="submit" value="Печать" class="buttons_fil"  onClick="print_otch()"/>
</div>
<?}
$doc=$this->user_model->get_all_users();
?>
<div id="middle">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<thead>
<tr>
<td>ФИО</td>
<td>Назначено</td>
<td>Пройдено</td>
<td>Отказано</td>
<td>Продано</td>
</tr>
</thead>
<tbody>
<?foreach($doc as $doctors):?>
<tr>
<td><?=$doctors["family"].' '.$doctors["name"];?></td>
<td><?$nazn=$this->user_model->get_nazn_users($doctors["family"],$doctors["name"]);echo count($nazn);?></td>
<td><?$proi=$this->user_model->get_proi_users($doctors["family"],$doctors["name"]);echo count($proi);?></td>
<td><?$otkz=$this->user_model->get_otkz_users($doctors["family"],$doctors["name"]);echo count($otkz);?></td>
<td><?$prod=$this->user_model->get_prod_users($doctors["family"],$doctors["name"]);echo count($prod);?></td>
</tr>
<?endforeach;?>
</tbody>
</table>
<?if(!empty($_GET))
{
    $querys=$this->user_model->get_proc();
    $que=$this->user_model->ads($_GET['doctor'],$_GET['date1'],$_GET['date2']);
?>
<div id="print_otch">
<p><b style="font-size: 20px;padding-left: 40px;"><?if(isset($_GET['doctor'])){echo $_GET['doctor'];}?></b></p>
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