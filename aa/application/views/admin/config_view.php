<div id="middle">
<?$config=$this->user_model->get_config();?>
 <script>
$(function() {
    var index = 'key_tab';
    var dataStore = window.sessionStorage;
    try {
        var oldIndex = dataStore.getItem(index);
    } catch(e) {
        var oldIndex = 0;
    }
    $('#tabs').tabs({
        active : oldIndex,
        activate : function( event, ui ){
            var newIndex = ui.newTab.parent().children().index(ui.newTab);
            dataStore.setItem( index, newIndex ) 
        }
    }); 
}); (jQuery)

function new_group(znach)
{
$('#'+znach).css('display','block');
}
//звкрытия окна добавления встречи
function new_group_close(znach)
{
    $('#'+znach).css('display','none');
}

</script>

<!-- окна для создания групп доступа, отделов и должностей-->
<div id="new_group" style="display: none;">
<table width="100%" cellspacing="0" cellpadding="0">
<tr>
<td style="vertical-align: top;">
<table>
<tr class="vstr1 otkz">
<td height="23">Наименование Группы</td>
<td><input type="text" name="group_name" class="add" style="width: 450px;" ></td>
</tr>
<tr class="vstr1 otkz">
<td height="23">Описание</td>
<td>
<textarea name="group_desc" style="margin: 0px; height: 110px; width: 450px;resize: none;"></textarea>
</td>
</tr>
  <tr class="vstr1 otkz">
  <td height="23">Врач</td>
  <td></td>
  </tr>
</table>
</td>
</tr>
<tr><td colspan="2"><input name="edit_ok" type="button" onclick="save_group('group')" value="Сохранить" class="buttons"><input type="button" onclick="new_group_close('new_group')" value="Отмена" class="buttons"></td></tr>
</table>
</div>
<!--*****-->
<div id="new_otdel" style="display: none;">
<table width="100%" cellspacing="0" cellpadding="0">
<tr>
<td style="vertical-align: top;">
<table>
<tr class="vstr1 otkz">
<td height="23">Наименование Отдела</td>
<td><input type="text" name="name_otdel" class="add" style="width: 450px;" ></td>
</tr>
<tr class="vstr1 otkz">
<td height="23">Описание</td>
<td>
<textarea name="desc_otdel" style="margin: 0px; height: 110px; width: 450px;resize: none;"></textarea>
</td>
</tr>
  <tr class="vstr1 otkz">
  <td height="23">Врач</td>
  <td></td>
  </tr>
</table>
</td>
</tr>
<tr><td colspan="2"><input name="edit_ok" type="button" onclick="save_group('otdel')" value="Сохранить" class="buttons"><input type="button" onclick="new_group_close('new_otdel')" value="Отмена" class="buttons"></td></tr>
</table>
</div>
<!--****-->
<div id="new_doljn" style="display: none;">
<table width="100%" cellspacing="0" cellpadding="0">
<tr>
<td style="vertical-align: top;">
<table>
<tr class="vstr1 otkz">
<td height="23">Наименование Должности</td>
<td><input type="text" name="name_doljn" class="add" style="width: 450px;" ></td>
</tr>
<tr class="vstr1 otkz">
<td height="23">Описание</td>
<td>
</td>
</tr>
  <tr class="vstr1 otkz">
  <td height="23">Врач</td>
  <td></td>
  </tr>
</table>
</td>
</tr>
<tr><td colspan="2"><input name="edit_ok" type="button" onclick="save_group('doljn')" value="Сохранить" class="buttons"><input type="button" onclick="new_group_close('new_doljn')" value="Отмена" class="buttons"></td></tr>
</table>
</div>

<div id="tabs">
<ul>
<li><a href="#tabs-1">Основные</a></li>
<li><a href="#tabs-2">Телемаркетинг первичка</a></li>
<li><a href="#tabs-3">Сервис телемаркетинг</a></li>
<!--<li><a href="#tabs-4">Группы доступа</a></li>
<li><a href="#tabs-5">Отделы</a></li>
<li><a href="#tabs-6">Должности</a></li>-->
<li><a href="#tabs-7">Информ. Сообщения</a></li>
<!--<li><a href="#tabs-5">Прочее</a></li>
<li><a href="#tabs-5">Прочее</a></li>
<li><a href="#tabs-5">Прочее</a></li>
<li><a href="#tabs-5">Прочее</a></li>
<li><a href="#tabs-5">Прочее</a></li>-->
</ul>
<div id="tabs-1">
<p>В разработке</p>
</div>


<div id="tabs-2">
<table border="0" celspacing="0" celpadding="0" width="500">
<tr>
<td>Выделение встреч цветом на телемаркетинге</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('color_tm')" type="checkbox" id="slideThree1" name="color_tm" <?if($config['color_tm']=='on'){echo 'checked';}?> />
      <label for="slideThree1"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>
<tr>
<td>Выделение встреч цветом на ресепшене</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('color_resep')" type="checkbox" id="slideThree2" name="color_resep" <?if($config['color_resep']=='on'){echo 'checked';}?> />
      <label for="slideThree2"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>
<tr>
<td>Возможность установить статус "отказ от встречи"</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('otkz_vstr_tm')" type="checkbox" id="slideThree3" name="otkz_vstr_tm" <?if($config['otkz_vstr_tm']=='on'){echo 'checked';}?> />
      <label for="slideThree3"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>
<tr>
<td>Возможность удалять встречи</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('del_vstr_tm')" type="checkbox" id="slideThree4" name="del_vstr_tm" <?if($config['del_vstr_tm']=='on'){echo 'checked';}?> />
      <label for="slideThree4"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>
<?/*
<tr>
<td>Возможность добавлять встречи на ресепшене</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('add_vstr_rtm')" type="checkbox" id="slideThree5" name="add_vstr_rtm" <?if($config['add_vstr_rtm']=='on'){echo 'checked';}?> />
      <label for="slideThree5"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>
<tr>
<td>Возможность добавлять перезвон на ресепшене</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('add_prvn_rtm')" type="checkbox" id="slideThree6" name="add_prvn_rtm" <?if($config['add_prvn_rtm']=='on'){echo 'checked';}?> />
      <label for="slideThree6"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>
<tr>
<td>Возможность добавлять клиента на ресепшене</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('edit_vstr_tm')" type="checkbox" id="slideThree7" name="edit_vstr_tm" <?if($config['edit_vstr_tm']=='on'){echo 'checked';}?> />
      <label for="slideThree7"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>
*/?>
</table>
</div>


<div id="tabs-3">
<table border="0" celspacing="0" celpadding="0" width="500">
<tr>
<td>Выделение встреч цветом на телемаркетинге</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('color_serv_tm')" type="checkbox" id="slideThree8" name="color_serv_tm" <?if($config['color_serv_tm']=='on'){echo 'checked';}?> />
      <label for="slideThree8"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>
<tr>
<tr>
<td>Выделение встреч цветом на ресепшене</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('color_serv_resep')" type="checkbox" id="slideThree9" name="color_serv_resep" <?if($config['color_serv_resep']=='on'){echo 'checked';}?> />
      <label for="slideThree9"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>
<tr>
<td>Выделение встреч цветом у врачей</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('color_serv_doc')" type="checkbox" id="slideThree10" name="color_serv_doc" <?if($config['color_serv_doc']=='on'){echo 'checked';}?> />
      <label for="slideThree10"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>
<tr>
<td>Возможность добавлять встречи на ресепшене</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('add_vstr_rserv')" type="checkbox" id="slideThree11" name="add_vstr_rserv" <?if($config['add_vstr_rserv']=='on'){echo 'checked';}?> />
      <label for="slideThree11"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>
<tr>
<td>Возможность добавлять клиента на ресепшене</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('add_kl_rserv')" type="checkbox" id="slideThree12" name="add_kl_rserv" <?if($config['add_kl_rserv']=='on'){echo 'checked';}?> />
      <label for="slideThree12"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>
<tr>
<td>Возможность добавлять клиента у врача</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('add_kl_doc')" type="checkbox" id="slideThree13" name="add_kl_doc" <?if($config['add_kl_doc']=='on'){echo 'checked';}?> />
      <label for="slideThree13"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>
<tr>
<td>Возможность добавлять врача на ресепшене</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('add_doc_rserv')" type="checkbox" id="slideThree14" name="add_doc_rserv" <?if($config['add_doc_rserv']=='on'){echo 'checked';}?> />
      <label for="slideThree14"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>
<tr>
<td>Возможность просматривать процедуры на ресепшене</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('view_proc_rserv')" type="checkbox" id="slideThree15" name="view_proc_rserv'" <?if($config['view_proc_rserv']=='on'){echo 'checked';}?> />
      <label for="slideThree15"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>
<tr>
<td>Возможность добавлять процедуры на ресепшене</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('add_proc_rserv')" type="checkbox" id="slideThree16" name="add_proc_rserv" <?if($config['add_proc_rserv']=='on'){echo 'checked';}?> />
      <label for="slideThree16"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>
<tr>
<td>Возможность удалять процедуры на ресепшене</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('del_proc_rserv')" type="checkbox" id="slideThree17" name="del_proc_rserv" <?if($config['del_proc_rserv']=='on'){echo 'checked';}?> />
      <label for="slideThree17"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>
<tr>
<td>Возможность включать и отключать процедуры на ресепшене</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('sost_proc_rserv')" type="checkbox" id="slideThree18" name="sost_proc_rserv" <?if($config['sost_proc_rserv']=='on'){echo 'checked';}?> />
      <label for="slideThree18"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>

</table>

</div>

<!--<div id="tabs-4">

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList">
<thead>
<tr>
<td width="30%">Наименование Категории</td>
<td width="70%">Описание</td>
</tr>
</thead>
<tbody>
<?
$group_assets=$this->user_model->get_group_assets('group');
foreach($group_assets as $assets):
?>
<tr>
<td><?=$assets['group_name'];?></td>
<td><?=$assets['group_desc'];?></td>
</tr>
<?endforeach;?>
</tbody>
</table>
<div style="text-align: center;"><input type="button" value="Добавить новую группу" onclick="new_group('new_group')" class="buttons" /></div>

</div>-->

<div id="tabs-7">

<table width="500" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td>Состояние</td>
<td>
    <!-- .slideThree -->
    <div class="slideThree">  
      <input onchange="configuration('sost_msg')" type="checkbox" id="slideThree19" name="sost_msg" <?if($config['sost_msg']=='on'){echo 'checked';}?> />
      <label for="slideThree19"></label>
    </div>
    <!-- end .slideThree -->
</td>
</tr>
<tr>
<td>Текст сообщения:</td>
<td><textarea name="text_msg" style="width: 400px; height: 65px; resize: none; padding: 2px;"><?if($config['text_msg']!=''){echo $config['text_msg'];}?></textarea></td>
</tr>
<tr>
<td>Цвет фона:</td>
<td>
<select name="color_bg_msg">
<option value="1" <?if($config['color_bg_msg']=='1'){echo 'selected';}?>>Зеленый</option>
<option value="2" <?if($config['color_bg_msg']=='2'){echo 'selected';}?>>Желтый</option>
<option value="3" <?if($config['color_bg_msg']=='3'){echo 'selected';}?>>Красный</option>
</select>
</td>
</tr>
</table>
<div style="text-align: center;"><input type="button" value="Сохранить" onclick="safe_info_msg()" class="buttons" /></div>

</div>

<!--<div id="tabs-6">

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableList">
<thead>
<tr>
<td width="30%">Наименование Должности</td>
<td width="70%">Описание</td>
</tr>
</thead>
<tbody>
<?
$group_assets=$this->user_model->get_group_assets('doljn');
foreach($group_assets as $assets):
?>
<tr>
<td><?=$assets['name_doljn'];?></td>
<td></td>
</tr>
<?endforeach;?>
</tbody>
</table>
<div style="text-align: center;"><input type="button" value="Добавить новую должность" onclick="new_group('new_doljn')" class="buttons" /></div>

</div>-->

</div>

</div>