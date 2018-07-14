<div id="filter">
<a href="javascript:javascript:history.go(-1)"><input name="edit_ok" type="button" value="Вернуться" class="buttons_fil"></a>
<input type="submit" value="Печать" class="buttons_fil"  onClick="print_otch()"/>
</div>
<div id="middle">
<?
        $query=$this->user_model->acs($_GET['id'],$_GET['date1'],$_GET['date2']);
        $querys=$this->user_model->get_proc();
?>
<div id="print_otch">
<p><b style="font-size: 20px;padding-left: 40px;">За период: <?if(isset($_GET['date1']) && isset($_GET['date2'])){echo "c ".$_GET['date1']." по ".$_GET['date2'];}?></b></p>
        <table border="1" cellspacing="0" cellpadding="0" width="600px">
		<tr>
		<td style="text-align: center;font-weight: bold;">Название процедуры</td>
		<td style="text-align: center;font-weight: bold;">Кол-во</td>
		</tr>
        <?
        $all=0;
        foreach($querys as $items){?>
        <tr>
		
        <td style="width:500px; padding:2px"><?=$items['name_proc'];?></td>
        <td style="width: 100px;text-align: center;">
        <?
        $i=0;
        foreach($query as $item){
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
        <td style="text-align: center;font-weight: bold;">Итого</td>
        <td style="text-align: center;font-weight: bold;"><?=$all;?></td>
        </tr>
        </table>
</div>

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