<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Telemarket_model extends CI_Model
{
//переводим дату в формат yy-mm-dd
function rotate_date($datess)
{
if(strrpos($datess, '.'))
{
$d1=explode('.',$datess);
$norm_dates= $d1[2].'-'.$d1[1].'-'.$d1[0];
return $norm_dates;   
}
/*else
{
return $datess;    
}*/
}

//проверяем существует ли телефон в базе++
//удалить
    function no_number($number) {
        $this->db->where('phone',$number);
        $this->db->or_where('dop_phone',$number);
        $query=$this->db->get('klients');
        return $query->result_array();
	 }
     //план
     //выбираем клиентов добавленых за сегодня пользователем
     function get_plan_klients($family,$name) 
	 {
	    $date=date('Y-m-d');
        $user=$family.' '.$name;
        $this->db->where('date_dobav',$date);
        $this->db->where('user',$user);
        $this->db->from('klients');
        $querys1 = $this->db->count_all_results();
        
        $this->db->where('date_add',$date);
        $this->db->where('user',$user);
        $this->db->from('vstrechi');
        $querys2 = $this->db->count_all_results();
        
        $this->db->where('date_add',$date);
        $this->db->where('user',$user);
        $this->db->from('zvonki');
        $querys3 = $this->db->count_all_results();
        
        $querys=$querys1+$querys2+$querys3;
        
        return $querys;        
	 }
    //выбираем назначенный план на сегодня сотруднику
     function get_plan_sotrud($family,$name) 
	 {
	    $this->db->select('plan');
        $this->db->where('family',$family);
        $this->db->where('name',$name);
        $query =$this->db->get('sotrudnik');
        return $query->row_array();         
	 }
    
		// список всех клиентов
        //delete
     function get_klients($num,$offset) {
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('klients',$num,$offset);
        return $query->result_array();  
	 }
     		// список всех клиентов для ресепшена
            //используется
     function get_klients_resep($num,$offset) {
        $this->db->where('who_user','tm');
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('klients',$num,$offset);
        return $query->result_array();  
	 }
		// список всех клиентов для телемаркетинга и ресепшена
        //используется
     function get_klients_tel($userrrrs,$num,$offset) {
        $this->db->where('who_user','tm');
        //$this->db->where('user',$userrrrs);
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('klients',$num,$offset);
        return $query->result_array();  
	 }
	// список всех клиентов для телемаркетинга и ресепшена для пагинации
     function get_klients_tel_pag($userrrrs) {
        $this->db->where('who_user','tm');
        //$this->db->where('user',$userrrrs);
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }
     // выборка клиентов которые ожидают процедуру для ресепшена
        function get_klients_resep_proc_1() {
        $this->db->where('who_user','tm');
        //$this->db->where('user',$userrrrs);
        //$this->db->where('id',$id);
        $this->db->where('perezvon',0);
        $this->db->where('otkz_vstr',0);
        $this->db->where('procedura',1);
        //$this->db->order_by("id", "desc"); 
        $query = $this->db->get('klients');
        return $query->row_array();  
	 }
     // выборка клиентов которые ожидают процедуру для ресепшена
        function get_klients_resep_proc2() {
        $this->db->where('who_user','tm');
        //$this->db->where('user',$userrrrs);
        //$this->db->where('id',$id);
        $this->db->where('perezvon',0);
        $this->db->where('otkz_vstr',0);
        $this->db->where('procedura',2);
        //$this->db->order_by("id", "desc"); 
        $query = $this->db->get('klients');
        return $query->row_array();  
	 }

     // выборка клиентов которым назначена встреча для телемаркетинга
     //используется
     function get_klients_allvstr_tel($userrrrs,$id) {
        $this->db->where('who_user','tm');
        $this->db->where('id',$id);
        $this->db->where('perezvon',0);
        $this->db->where('otkz_vstr',0);
        $query = $this->db->get('klients');
        return $query->row_array();  
	 }
     // выборка клиентов которым назначен перезвон для телемаркетинга
     function get_klients_tel_prvn($userrrrs,$id) {
        $this->db->where('who_user','tm');
        //$this->db->where('user',$userrrrs);
        $this->db->where('id',$id);
        //$this->db->where('perezvon',1);
        $this->db->where('otkz_vstr',0);
        //$this->db->order_by("id", "desc"); 
        $query = $this->db->get('klients');
        return $query->row_array();  
	 }
     // выборка клиентов которым назначен перезвон для телемаркетинга
     //используется
     function get_klients_tel3($userrrrs,$id) {
        $this->db->where('who_user','tm');
        $this->db->where('id',$id);
        $this->db->where('perezvon_tm ',1);
        $query = $this->db->get('klients');
        return $query->row_array();  
	 }
    // список встреч клиентов для сотрудника телемаркетинга
     function get_klients_vstr_tel($id,$num,$offset) {
        $this->db->where('id_client',$id);
        $this->db->where('who_vstr','tm');
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('vstrechi',$num,$offset);
        return $query->result_array();  
	 }
         // список встреч клиентов для сотрудника телемаркетинга
     function get_klients_vstr_tel_pag($id) {
        $this->db->where('id_client',$id);
        $this->db->where('who_vstr','tm');
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('vstrechi');
        return $query->result_array();  
	 }
     	// список звонков клиентов для сотрудника телемаркетинга
     function get_klients_zvon_tel($id) {
        $this->db->where('id_client',$id);
        $this->db->order_by("id", "desc");
        $this->db->limit(8);
        $query = $this->db->get('zvonki');
        return $query->result_array();  
	 }
     	// последняя назначеная встреча клиента для сотрудника ресепшена++ 
     function get_klients_vstr_resep($id) {
        //$this->db->where('ok',1);
        $this->db->where('id_client',$id);
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query = $this->db->get('vstrechi');
        return $query->row_array();  
	 }
     	// последняя назначеная встреча клиента для сотрудника ресепшена
     function get_klients_vstr_resep1($id) {
        //$this->db->where('ok',1);
        $this->db->where('id_client',$id);
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query = $this->db->get('vstrechi');
        return $query->row_array();  
	 }
          	// последняя назначеная встреча клиента для сотрудника ТМ
     function get_klients_vstr_tm($id) {
        //$this->db->where('ok',1);
        $this->db->where('id_client',$id);
        $this->db->where('who_vstr','tm');
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query = $this->db->get('vstrechi');
        return $query->row_array();  
	 }
     	// последняя назначеный перезвон клиента для сотрудника ресепшена
     function get_klients_prvn_resep($id) {
        //$this->db->where('ok',1);
        $this->db->where('id_client',$id);
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query = $this->db->get('zvonki');
        return $query->row_array();  
	 }
     
		// сортировка клиентов для каждого сотрудника телемаркетинга по встречам
     function get_klients_tel_v($userrrrs,$num,$offset) {
        //$this->db->where('id_client',$id);
        //$this->db->where('who_user','tm');
        if($this->session->userdata('doljn')!='Рук-ль тм1')
		{
			$this->db->where('user',$userrrrs);
		}
        $this->db->where('otkaz',0);
        $this->db->where('old_vstr',1);
        $this->db->where('prodacha',0);
        $this->db->where('date_vstr',date('Y-m-d'));
        //$this->db->where('procedura',0);
        //$this->db->where('otkaz','');
        //$this->db->where('perezvon',0);
        //$this->db->where('procedura',1);
        //$this->db->order_by("id", "desc"); 
        //$this->db->limit(1);
        $query = $this->db->get('vstrechi',$num,$offset);
        return $query->result_array();  
	 }
		// сортировка клиентов для каждого сотрудника телемаркетинга по встречам для пагинации
     function get_klients_tel_v_pag($userrrrs) {
        if($this->session->userdata('doljn')!='Рук-ль тм1')
		{
			$this->db->where('user',$userrrrs);
		}
        $this->db->where('otkaz',0);
        $this->db->where('old_vstr',1);
        $this->db->where('prodacha',0);
        $this->db->where('date_vstr',date('Y-m-d'));
        $query = $this->db->get('vstrechi');
        return $query->result_array();  
	 }
    // сортировка клиентов для каждого сотрудника телемаркетинга по перезвонам
     function get_klients_tel_p($userrrrs,$num,$offset) {
        //$this->db->where('id_client',$id);
		if($this->session->userdata('doljn')!='Рук-ль тм1')
		{
			$this->db->where('user',$userrrrs);
		}
        //$this->db->where('who_user','tm');
        $this->db->where('sostoyalsya',0);
		$this->db->where('date_perezvon',date('Y-m-d'));
        //$this->db->where('prodacha',0);
        //$this->db->where('procedura',0);
        //$this->db->where('otkaz','');
        //$this->db->where('perezvon',0);
        //$this->db->where('procedura',1);
        //$this->db->order_by("id", "desc"); 
        //$this->db->limit(1);
        $query = $this->db->get('zvonki',$num,$offset);
        return $query->result_array();  
	 }
    // сортировка клиентов для каждого сотрудника телемаркетинга по перезвонам для пагинации
     function get_klients_tel_p_pag($userrrrs) {
		if($this->session->userdata('doljn')!='Рук-ль тм1')
		{
			$this->db->where('user',$userrrrs);
		}
        $this->db->where('sostoyalsya',0);
		$this->db->where('date_perezvon',date('Y-m-d'));
        $query = $this->db->get('zvonki');
        return $query->result_array();  
	 }
     
     	// сортировка клиентов для каждого сотрудника телемаркетинга по встречам
     function get_klients_ptel_v() {
        //$this->db->where('user',$userrrrs);
        $this->db->where('otkaz',0);
        $this->db->where('prodacha',0);
        $query = $this->db->get('vstrechi');
        return $query->result_array();  
	 }
    // сортировка клиентов для каждого сотрудника телемаркетинга по перезвонам
     function get_klients_ptel_p() {
        $this->db->where('sostoyalsya',0);
        $query = $this->db->get('zvonki');
        return $query->result_array();  
	 }
     
		// список всех клиентов в сортировке
     function get_klients_sort($num,$offset) {
        $this->db->limit($num,$offset);
        $this->db->order_by("fio", "asc"); 
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }
		// список всех клиентов в сортировке по дате++
     function get_klients_sortdate($num,$offset,$userrrrs) {
        //$this->db->where('who_user','tm');
        $date1= $this->rotate_date($this->input->post('date1'));
        $date2= $this->rotate_date($this->input->post('date2'));
        $time1= $this->input->post('time1');
        $time2= $this->input->post('time2');
        $type_sort= $this->input->post('type_sort');

        if($type_sort=='vstr')
        {
        if($time1=='' && $time2=='')
        {$where = "date_vstr BETWEEN '".$date1."' AND '".$date2."'";}
        else{$where = "date_vstr BETWEEN '".$date1."' AND '".$date2."' AND `time_vstr` BETWEEN '".$time1."' AND '".$time2."'";}
        $this->db->order_by("id", "desc");
        $this->db->where($where);
        //$this->db->where('user',$userrrrs);
        $this->db->where('old_vstr',1);
        $query = $this->db->get('vstrechi',$num,$offset);
        return $query->result_array(); 
        }

        if($type_sort=='prvn')
        {
        if($time1=='' && $time2=='')
        {$where = "date_perezvon BETWEEN '".$date1."' AND '".$date2."'";}
        else{$where = "date_perezvon BETWEEN '".$date1."' AND '".$date2."' AND `time_perezvon` BETWEEN '".$time1."' AND '".$time2."'";}
        $this->db->order_by("id", "desc");
        $this->db->where($where);
        $this->db->where('user',$userrrrs);
        $query = $this->db->get('zvonki',$num,$offset);
        return $query->result_array(); 
        } 
	 }
		// список всех клиентов в сортировке по дате для пагинации
     function get_klients_sortdate_pag($userrrrs) {
        //$this->db->where('who_user','tm');
        $date1= $this->rotate_date($this->input->post('date1'));
        $date2= $this->rotate_date($this->input->post('date2'));
        $time1= $this->input->post('time1');
        $time2= $this->input->post('time2');
        if($time1=='' && $time2=='')
        {$where = "date_vstr BETWEEN '".$date1."' AND '".$date2."'";}
        else{$where = "date_vstr BETWEEN '".$date1."' AND '".$date2."' AND `time_vstr` BETWEEN '".$time1."' AND '".$time2."'";}
        $this->db->order_by("id", "desc");
        $this->db->where($where);
        $this->db->where('user',$userrrrs);
        $this->db->where('old_vstr',1);
        $query = $this->db->get('vstrechi');
        return $query->result_array();  
	 }
		// список всех клиентов в сортировке по дате и времени
     function get_klients_psortdate($num,$offset,$userrrrs) {
        //$this->db->where('who_user','tm');
        $date1= $this->rotate_date($this->input->post('date1'));
        $date2= $this->rotate_date($this->input->post('date2'));
        $time1= $this->input->post('time1');
        $time2= $this->input->post('time2');
        if($time1=='' && $time2=='')
        {$where = "date_vstr BETWEEN '".$date1."' AND '".$date2."'";}
        else{$where = "date_vstr BETWEEN '".$date1."' AND '".$date2."' AND `time_vstr` BETWEEN '".$time1."' AND '".$time2."'";}
        $this->db->order_by("id", "desc");
        $this->db->where($where);
        //$this->db->where('user',$userrrrs);
        $this->db->where('old_vstr',1);
        $query = $this->db->get('vstrechi',$num,$offset);
        return $query->result_array();  
	 }
     //подтверждаем встречу клиента
     function update_pod_ok($id,$dd,$tt,$uu,$st) 
	 {
	$this->db->where('id_client',$id);
        $this->db->where('date_vstr',$this->rotate_date($dd));
        $this->db->where('time_vstr',$tt);
        $this->db->where('user',$uu);
        $this->db->set('ok',$st);
        $this->db->update('vstrechi');
        return TRUE;        
	 }
          //подтверждаем встречу клиента на подтверждалке
     function update_safe_ok($id,$id_client,$dd,$tt,$uu,$tpr) 
	 {
	    $this->db->where('id',$id);
        $this->db->where('id_client',$id_client);
        $this->db->set('date_vstr',$this->rotate_date($dd));
        $this->db->set('time_vstr',$tt);
        $this->db->set('type_procedur',$tpr);
        $this->db->set('ok',0);
        $this->db->update('vstrechi');
        return TRUE;        
	 } 
          //отказ от встречу клиента на подтверждалке
     function update_otkz($id,$otkaz) 
	 {
	$this->db->where('id',$id);
        $this->db->set('text_prichotkaza',$otkaz);
        $this->db->set('otkaz',1);
        $this->db->update('vstrechi');
        return TRUE;        
	 } 
          //удаление встречи клиента на телемаркетинге
     function del_vstr_tm($id,$otkaz) 
	 {
        $id_vstr=$this->user_model->get_vstr_his($id);
        $this->db->where('id',$id);
        //$this->db->set('text_prichotkaza',$otkaz);
        //$this->db->set('otkaz',1);
        $this->db->delete('vstrechi');

        $izmenenie='Удалена встреча';
        $izmeneno_na='';
        $izmenil=$this->session->userdata('family')." ".$this->session->userdata('name');
        $this->user_model->history($id_vstr['id_client'],$izmenenie,$izmeneno_na,$izmenil,$otkaz);

        return TRUE;        
	 } 
     //добавляем клиента в базу на телемаркетинге++
     function add_klient() 
	 {
        $data = array();
		foreach ($this->rules_lib->add_klients_rules as $item)
        {
            $fname = $item['field'];
            $data[$fname] = $this->input->post($fname);                        
        } 
        $data['date_dobav']=$this->rotate_date($data['date_dobav']);

        /*$data['family']=preg_replace( '/^(\S)(.*)$/u', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $data['family'] );
        $data['lastname']=preg_replace( '/^(\S)(.*)$/u', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $data['lastname'] );
        $data['name']=preg_replace( '/^(\S)(.*)$/u', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $data['name'] );*/
		
        $this->db->insert('klients',$data);   
        
        $this->db->where('family',$data['family']);
        $this->db->where('lastname',$data['lastname']);
        $this->db->where('name',$data['name']);

        $query = $this->db->get('klients');
        $query= $query->row_array();
        
        $datas = array();
		foreach ($this->rules_lib->vstr_klients_tel_rules as $item)
        {
            $fname = $item['field'];
            $datas[$fname] = $this->input->post($fname);                        
        }
        if($datas['vstrecha']==1)
        {
        $datas['date_vstr'] = $this->rotate_date($datas['date_vstr']);
        $datas['id_client']=$query['id'];
        $datas['old_vstr']=1;
        $datas['id_user']=$this->session->userdata('user_id');
        $datas['who_vstr']='tm';
		
		$datas['otkaz']=$datas['otkaz_tm'];
		$datas['prichotkaza']=$datas['prichotkaza_tm'];
		unset ($datas['otkaz_tm']);
		unset ($datas['prichotkaza_tm']);

        unset($datas['vstrecha']);
        $this->db->insert('vstrechi',$datas);
        }
        
        //******
        $datass = array();
		foreach ($this->rules_lib->zvon_klients_tel_rules as $item)
        {
            $fnames = $item['field'];
            $datass[$fnames] = $this->input->post($fnames);                        
        }
        if($datass['perezvon_tm']==1)
        {
        $datass['date_perezvon'] = $this->rotate_date($datass['date_perezvon']);
        $datass['id_client']=$query['id'];
        $datass['id_user']=$this->session->userdata('user_id');
        unset($datass['perezvon_tm']);
		
				/*unset ($data['perezvon_tm']);
				$data['perezvon']=$data['perezvon_tm'];*/
		
        $this->db->insert('zvonki',$datass);
        }
	 }
     //поиск клиента в телемаркетинге по номеру телефона
	 function find_klients_telemarket($phone) {
	    $this->db->where('who_user','tm');
		$this->db->where('phone',$phone);
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }
	 //Поиск по имени
	 /*function find_klients_name_telemarket($name) {
	    $this->db->where('who_user','tm');
		$this->db->where('name',$name);
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }*/
     	 //Поиск по фамилии и имени
	 function find_klients_fioname_telemarket($name) {
	    if(strrpos($name, ' '))
        {
        $fioname=explode(' ',$name);
		$this->db->like('name',$fioname[0]);
        $this->db->or_like('name',$fioname[1]);
        $this->db->like('family',$fioname[0]);
        $this->db->or_like('family',$fioname[1]);
        }
	    else
        {
        $this->db->or_like('name',$name);
        $this->db->or_like('family',$name);  
        }
        $this->db->where('who_user','tm');
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }
	 
      //поиск клиента в телемаркетинге по фамилии
	 /*function find_klients_fam_telemarket($family) {
	    $this->db->where('who_user','tm');
		$this->db->where('family',$family);
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }*/
     //поиск клиента на ресепшене по фамилии
	 function find_klients_reseption($family,$i) {
	   if($i==0)
       {$this->db->where('family',$family);}
       elseif($i==1)
       {$this->db->where('phone',$family);}
       elseif($i==2)
       {$this->db->where('name',$family);}
        $this->db->where('who_user','tm');  
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }

	 //поиск клиента на сервисе ресепшене по фамилии
	 function find_klients_sreseption($family,$i) {
	   if($i==0)
       {$this->db->where('family',$family);}
       elseif($i==1)
       {$this->db->where('phone',$family);}
       elseif($i==2)
       {$this->db->where('name',$family);}
        $this->db->where('who_user','tm');  
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }
      //получаем данные для редактирования клиента на ресепшене
	 function edit_klients($id) {
		$this->db->where('id',$id);
        $query = $this->db->get('klients');
        return $query->row_array();  
	 }
     //получаем список косметологов которые на работе
     function get_kosmet() {
        $date=date('H');
		$this->db->where('otdel','Сервис');
        $this->db->where('doljn','Косметолог');
        if($date<15)
        {$this->db->where('smena','1');}
        else
        {$this->db->where('smena','2');}
        $this->db->or_where('smena','3');
        $this->db->where('rabota','0');
        
        $query = $this->db->get('sotrudnik');
        return $query->result_array();  
	 }
	 	//сохраняем данные клиента после редактирования на ресепшене
	 function update_klients($data,$usersss) {
        $id=$data['id'];
        $date=$data['date'];
        $data = array();
		foreach ($this->rules_lib->edit_klients_rules as $item)
        {
            $fname = $item['field'];
            $data[$fname] = $this->input->post($fname);                        
        }
        
            $datass = array();
    		foreach ($this->rules_lib->edit_resep_vstr_klients_rules as $item)
            {
                $fname = $item['field'];
                $datass[$fname] = $this->input->post($fname);                        
            }
        
        if($datass['klient_go']==1)
          {
            $kosmetolog=$datass['kosmetolog'];
          }
        $old_kosmet=$datass['old_kosmet'];
        unset($datass['old_kosmet']);
        unset($datass['kosmetolog']);
        
        $izm = $this->edit_klients($id);
	if(mb_strtolower($izm['family'])!=mb_strtolower($data['family']) || mb_strtolower($izm['name'])!=mb_strtolower($data['name']) || mb_strtolower($izm['lastname'])!=mb_strtolower($data['lastname']))
    {
        $izmenenie='ФИО изменено';
        $izmeneno_na=$data['family'].' '.$data['name'].' '.$data['lastname'];
        $izmenil=$this->session->userdata('family')." ".$this->session->userdata('name');
        $prichina='';
        $this->user_model->history($id,$izmenenie,$izmeneno_na,$izmenil,$prichina);
    }
        //if($this->input->post('procedura')=='on'){$data['procedura']=1;}else{$data['procedura']=0;}
		$this->db->where('id',$id);
		$this->db->update('klients', $data);
          if($datass['klient_go']==1)
          {
            if($datass['procedura']==1 || $datass['procedura']==2 || $datass['procedura']==3)
            { $this->user_model->update_kosm($kosmetolog,$datass['procedura'],$old_kosmet); }
        $this->db->where('id_client',$id);
        $this->db->where('date_vstr',$this->rotate_date($date));
		$this->db->update('vstrechi', $datass);
         }
  
	 }
     //сохраняем данные клиента после редактирования на телемаркетиннге++
	 function update_tel_klients($data) {
	    $id=$data['id'];
        $data = array();
		foreach ($this->rules_lib->edit_klients_tel_rules as $item)
        {
            $fname = $item['field'];
            $data[$fname] = $this->input->post($fname);                        
        }
        $otkz_vstr=$this->input->post('otkaz_tm');
	    $izm = $this->edit_klients($id);
	    if(mb_strtolower($izm['family'])!=mb_strtolower($data['family']) || mb_strtolower($izm['name'])!=mb_strtolower($data['name']) || mb_strtolower($izm['lastname'])!=mb_strtolower($data['lastname']))
        {
        $izmenenie='ФИО изменено';
        $izmeneno_na=$data['family'].' '.$data['name'].' '.$data['lastname'];
        $izmenil=$this->session->userdata('family')." ".$this->session->userdata('name');
        $prichina='';
        $this->user_model->history($id,$izmenenie,$izmeneno_na,$izmenil,$prichina);
	    }
        
        $data['family']=preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $data['family'] );
        $data['lastname']=preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $data['lastname'] );
        $data['name']=preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $data['name'] );
        
        $this->db->where('id',$id);
        if(isset($otkz_vstr))
        {
          $this->db->set('otkaz_tm',1);  
        }
        //$this->db->set('klient_go',0);
        //$this->db->set('procedura',0);
		$this->db->update('klients', $data);
  }
  //аякс запрос на сохранение встречи++
  function add_vstr($data)
  {
        $id=$data['id'];
        
        $this->db->where('id_client',$id);
        $this->db->set('old_vstr',0);
		$this->db->update('vstrechi');
        
        $datay = array();
        $datay['date_vstr']=$this->rotate_date($data['date_vstr']);
        if(isset($data['time_vstr'])){$datay['time_vstr']=$data['time_vstr'];}
        if(isset($data['type_procedur'])){$datay['type_procedur']=$data['type_procedur'];}
        $datay['office']=$data['office'];
        $datay['user']=$data['user'];
        if(isset($data['comments'])){$datay['comments']=$data['comments'];}
        $datay['otkaz']=$data['otkaz'];
        $datay['prichotkaza']=$data['prichotkaza'];
        $datay['id_client']=$id;
        $datay['old_vstr']=1;
        $datay['who_vstr']='tm';
        $datay['id_user']=$this->session->userdata('user_id');
        $datay['date_add']=date("Y-m-d");
        $this->db->insert('vstrechi', $datay);
        $this->db->where('id',$id);
        $this->db->set('perezvon_tm',0);
        $this->db->set('otkaz_tm',$datay['otkaz']);
		$this->db->update('klients');
        return TRUE;
  }
  //аякс запрос на сохранение перезвона++
    function add_przv($data)
  {
        $id=$data['id'];
        $datay = array();
        $datay['date_perezvon']=$this->rotate_date($data['date_perezvon']);
        $datay['time_perezvon']=$data['time_perezvon'];
        $datay['tema_perezvon']=$data['tema_perezvon'];
        $datay['comment_perezvon']=$data['comment_perezvon'];
        $datay['user']=$data['user'];
        $datay['id_client']=$id;
        $datay['date_add']=date("Y-m-d");
        $datay['id_user']=$this->session->userdata('user_id');
        $this->db->insert('zvonki', $datay);
        $this->db->where('id',$id);
        $this->db->set('perezvon_tm',1);
		$this->db->update('klients');
        return TRUE;
  }
    //аякс запрос на сохранение перезвона++
    function edit_vozrast($data)
  {
        $id=$data['id'];
        $this->db->where('id',$id);
        $this->db->set('vozrast',$data['vozrast']);
		$this->db->update('klients');
        return TRUE;
  }


}