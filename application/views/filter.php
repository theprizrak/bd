<?
/*телемаркетинг*/
if($this->session->userdata('otdel')=='Телемаркетинг первички (Тм1)' && $this->session->userdata('doljn')=="Оператор" || $this->session->userdata('doljn')=="Старший оператор" || $this->session->userdata('doljn')=="Рук-ль тм1")
{
?>
<div id="filter">
<div id="fil_scroll"><img src="/images/pointer.png" style="width: 28px;" /></div>
<a href="/telemarketing/vstr" class="buttons_fil">Встречи</a><br />
<a href="/telemarketing/przn" class="buttons_fil">Перезвон</a>
</div>
<?}
/*подтверждающий телемаркетинг*/
elseif($this->session->userdata('otdel')=='Телемаркетинг первички (Тм1)' && $this->session->userdata('doljn')=="Подтверждающий оператор")
{
?>
<div id="filter">
<div id="fil_scroll"><img src="/images/pointer.png" style="width: 28px;" /></div>
<a href="/ptelemarketing/vstr" class="buttons_fil">Встречи</a><br />
<a href="/ptelemarketing/przn" class="buttons_fil">Перезвон</a>
</div>
<?}
/*ресепшен*/
elseif($this->session->userdata('doljn')=="Администратор (ресепшен)")
{/*?>
<div id="filter" class="filter_resep"><div id="fil_scroll" onclick="scroll_filter()">></div>
<a href="" class="buttons_fil">Ожидают</a>
<a href="" class="buttons_fil">На процедуре</a>
проверка не обращать внимания</div>
<?*/}
?>

