<? if($this->session->userdata('otdel')=='Телемаркетинг первички (Тм1)'){?>
<div class="<?if(isset($_COOKIE["today_zvon"]) && $_COOKIE["today_zvon"]=="today_zvon_open"){echo "today_zvon_open";}else{echo "today_zvon_close";}?>" id="today_zvon">
<div class="text_vert" onclick="todayZvon();">Сегодняшние перезвоны</div>
<div class="today_zvon_table">
<table class="tableList" border="0" cellpadding="0" cellspacing="0" width="100%">
<thead>
<tr>
<td>ФИО</td>
<td>Тема</td>
<td>Комментарий</td>
<td>Дата</td>
<td>Время</td>
</tr>
</thead>
<tbody>
<?
$zvon=$this->telemarket_model->get_zvon_today($this->session->userdata('user_id'));
if(count($zvon)!=0){
foreach($zvon as $zvon_tables):
$fio_kl=$this->telemarket_model->edit_klients($zvon_tables['id_client']);
?>
<tr  class="clickable" data-href="/telemarketing/edit?id=<?=$zvon_tables['id_client'];?>">
<td><?=$fio_kl['family'].' '.$fio_kl['name'].' '.$fio_kl['lastname'];?></td>
<td><?=$zvon_tables['tema_perezvon'];?></td>
<td><?=$zvon_tables['comment_perezvon'];?></td>
<td><?=$zvon_tables['date_perezvon'];?></td>
<td><?=$zvon_tables['time_perezvon'];?></td>
</tr>
<?endforeach;
}
else
{
?>
<tr>
<td colspan="5">На сегодня у вас не назначено ни одного перезвона</td>
</tr>
<?}?>
</tbody>
</table>


</div>
</div>
<?}?>

<div id="footer"> Copyright © PO  2014  Все права защищены. Копирование запрещено <a href="/admin/form">Связаться с разработчиками</a> Разработка PACR<div class="version">Версия 3.01.15</div></div>
</div>
<script>update_timer_mail_ok();</script>
</body>
</html>