<?
function rotate_date($date)
{
$d1=explode('-',$date);
$norm_dates= $d1[2].'.'.$d1[1].'.'.$d1[0];
return $norm_dates;
}
?>