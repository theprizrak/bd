<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stelemarket_model extends CI_Model
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

// список всех клиентов для сервиса телемаркетинга и ресепшена
// используется
     function get_klients_serv_tel($userrrrs,$num,$offset) {
        $this->db->where('who_user','serv');
        $this->db->where('user',$userrrrs);
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('klients',$num,$offset);
        return $query->result_array();  
	 }
// список всех клиентов для сервиса телемаркетинга и ресепшена по пользователю
// используется
     function get_klients_serv_tel_user($userrrrs) {
        $this->db->where('who_user','serv');
        $this->db->where('user',$userrrrs);
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }
// клиент для сервиса ресепшена при печати карточки
     function get_klients_serv_karta($id) {
        //$this->db->where('who_user','serv');
        $this->db->where('id',$id);
        $query = $this->db->get('klients'); 
        return $query->row_array(); 
	 }
// клиент для сервиса ресепшена при печати карточки
     function get_klients_serv_karta_all() {
        $this->db->where('id',$id);
        $query = $this->db->get('klients'); 
        return $query->row_array(); 
	 }
     // клиент для сервиса ресепшена при печати карточки
     function get_vstr_serv_karta_all() {
        $this->db->where('date_vstr',date('Y-m-d'));
        $this->db->where('old_vstr',1);
        $this->db->where('otkaz',0);
        $this->db->order_by("time_vstr", "asc");
        $query = $this->db->get('vstrechi'); 
        return $query->result_array();  
	 }
     
     //добавляем клиента и встречу клиента в базу на сервисе-телемаркетинге
     function serv_add_klient() 
	 {
        $data = array();
		foreach ($this->rules_lib->serv_add_klients_rules as $item)
        {
            $fname = $item['field'];
            $data[$fname] = $this->input->post($fname);                        
        } 
        $data['family']=preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $data['family'] );
        $data['lastname']=preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $data['lastname'] );
        $data['name']=preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $data['name'] );
        $this->db->insert('klients',$data);   
        
        $id_client = mysql_insert_id();

        $datas = array();
		foreach ($this->rules_lib->vstr_klients_stel_rules as $item)
        {
            $fname = $item['field'];
            $datas[$fname] = $this->input->post($fname);                        
        }
        $datas['date_vstr'] = $this->rotate_date($datas['date_vstr']);
        if($datas['vstrecha']==1)
        {
        $datas['id_client']=$id_client;
        $datas['old_vstr']=1;
        $datas['who_vstr']='serv';
        $datas['date_add']=date("Y-m-d");
        $datas['id_user']=$this->session->userdata('user_id');
        unset($datas['vstrecha']);
        $this->db->insert('vstrechi',$datas);
        }
	 }

      //поиск клиента в сервисе телемаркетинге по номеру телефона
	 function find_klients_stelemarket($phone) {
	    $this->db->where('who_user','serv');
		$this->db->where('phone',$phone);
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }
	 //Поиск по имени в сервисе телемаркетинге
	 /*function find_klients_name_stelemarket($name) {
	    $this->db->where('who_user','serv');
		$this->db->where('name',$name);
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }
      //поиск клиента в сервисе телемаркетинге по фамилии
	 function find_klients_fam_stelemarket($family) {
	    $this->db->where('who_user','serv');
		$this->db->where('family',$family);
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }*/
          	 //Поиск по фамилии и имени
	 function find_klients_fioname_stelemarket($name) {
	    if(strrpos($name, ' '))
        {
        $fioname=explode(' ',$name);
		$this->db->where('name',$fioname[0]);
        $this->db->or_where('name',$fioname[1]);
        $this->db->where('family',$fioname[0]);
        $this->db->or_where('family',$fioname[1]);
        }
	    else
        {
        $this->db->or_where('name',$name);
        $this->db->or_where('family',$name);  
        }
        $this->db->where('who_user','serv');
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }
     //сохраняем данные клиента после редактирования на сервисе-телемаркетиннге
	 function update_serv_tel_klients($data) {
	    $id=$data['id'];
        $users=$data['user'];
        $data = array();
		foreach ($this->rules_lib->edit_klients_serv_tel_rules as $item)
        {
            $fname = $item['field'];
            $data[$fname] = $this->input->post($fname);                        
        }
	    $izm = $this->edit_klients($id);
	 if(mb_strtolower($izm['family'])==mb_strtolower($data['family']) || mb_strtolower($izm['name'])==mb_strtolower($data['name']) || mb_strtolower($izm['lastname'])==mb_strtolower($data['lastname'])){}
        else{
        $izmenenie='ФИО изменено';
        $izmeneno_na=$data['family'].' '.$data['name'].' '.$data['lastname'];
        $izmenil=$this->session->userdata('family')." ".$this->session->userdata('name');
        $prichina='';
        $this->user_model->history($id,$izmenenie,$izmeneno_na,$izmenil,$prichina);
	       }
        $this->db->where('id',$id);
		$this->db->update('klients', $data);

  }
  //аякс запрос на сохранение встречи на сервисе телемаркетинга
  function add_svstr($data)
  {
        $id=$data['id'];
        $datay = array();
        if(isset($data['otkz_vstr']))
        {
        $datay['date_vstr']=$data['date_vstr'];
        $datay['user']=$data['user'];
        $datay['otkaz']=$data['otkaz'];
        $datay['who_vstr']='serv';
        $datay['text_prichotkaza']=$data['text_prichotkaza'];
        $datay['id_client']=$id;
        $datay['id_user']=$this->session->userdata('user_id');   
        }
        else
        {
        $datay['date_vstr']=$this->rotate_date($data['date_vstr']);
        $datay['time_vstr']=$data['time_vstr'];
        $datay['sproc']=$data['sproc'];
        $datay['doctor']=$data['doctor'];
        $datay['user']=$data['user'];
        $datay['otkaz']=$data['otkaz'];
        $datay['who_vstr']='serv';
        $datay['date_add']=date("Y-m-d");
        $datay['text_prichotkaza']=$data['text_prichotkaza'];
        $datay['id_client']=$id;
        $datay['id_user']=$this->session->userdata('user_id');
        }
        $this->db->insert('vstrechi', $datay);
        return TRUE;
  }
 //аякс запрос на сохранение перезвона**
    function add_przv($data)
  {
        $id=$data['id'];
        $datay = array();
        $datay['date_perezvon']=$data['date_perezvon'];
        $datay['time_perezvon']=$data['time_perezvon'];
        $datay['tema_perezvon']=$data['tema_perezvon'];
        $datay['comment_perezvon']=$data['comment_perezvon'];
        $datay['user']=$data['user'];

        $datay['id_client']=$id;
        $datay['id_user']=$this->session->userdata('user_id');
        $this->db->insert('zvonki', $datay);
        $this->db->where('id',$id);
        $this->db->set('perezvon',1);
	$this->db->update('klients');
        return TRUE;
  }
       //получение списка включенных процедур
     function get_proc()
     {
        $this->db->where('state','on');
        $query=$this->db->get('proceduri');
        return $query->result_array(); 
     }
 	// список встреч клиентов для сотрудника телемаркетинга**
     function get_klients_vstr_tel($id,$num,$offset) {
        $this->db->where('id_client',$id);
        $this->db->where('who_vstr','serv');
        //$this->db->where('ok',1);
        //$this->db->where('otkaz',0);
        //$this->db->where('id_client',$id);
        
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('vstrechi',$num,$offset);
        return $query->result_array();  
	 }
      	// список встреч клиентов для сотрудника телемаркетинга**
     function get_klients_vstr_tel_pag($id) {
        $this->db->where('id_client',$id);
        $this->db->where('who_vstr','serv');
        //$this->db->where('ok',1);
        //$this->db->where('otkaz',0);
        //$this->db->where('id_client',$id);
        
        //$this->db->order_by("id", "desc"); 
        $query = $this->db->get('vstrechi');
        return $query->result_array();  
	 }
 	// встреча клиента для сотрудника сервиса ресепшена при печати карты клиента
     function get_klients_vstr_karta($id) {
        $this->db->where('id',$id);
        //$this->db->where('ok',1);
        //$this->db->where('otkaz',0);
        //$this->db->where('id_client',$id);
        
        //$this->db->order_by("id", "desc"); 
        $query = $this->db->get('vstrechi');
        return $query->row_array(); 
	 }

           //получаем данные для редактирования клиента на ресепшене
	 function edit_klients($id) {
		$this->db->where('id',$id);
        $query = $this->db->get('klients');
        return $query->row_array();  
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
		// список всех клиентов в сортировке по дате на сервисе телемаркетинге
     function get_klients_sortdate($num,$offset,$userrrrs) {
        $date1= $this->rotate_date($this->input->post('date1'));
        $date2= $this->rotate_date($this->input->post('date2'));
        $time1= $this->input->post('time1');
        $time2= $this->input->post('time2');
        if($time1=='' && $time2=='')
        {$where = "date_vstr BETWEEN '".$date1."' AND '".$date2."'";}
        else{$where = "date_vstr BETWEEN '".$date1."' AND '".$date2."' AND `time_vstr` BETWEEN '".$time1."' AND '".$time2."'";}
        $this->db->order_by("time_vstr", "asc");
        $this->db->where($where);
       // $this->db->where('user',$userrrrs);
        $this->db->where('old_vstr',1);
        //$this->db->where('who_vstr','serv');
        $query = $this->db->get('vstrechi',$num,$offset);
        return $query->result_array();  
	 }
	 // список всех клиентов в сортировке по дате для сервиса ресепшена**
     function get_klients_sortdate_sresep($num,$offset,$userrrrs) {
        $date1= $this->rotate_date($this->input->post('date1'));
        $date2= $this->rotate_date($this->input->post('date2'));
        $time1= $this->input->post('time1');
        $time2= $this->input->post('time2');
        if($time1=='' && $time2=='')
        {$where = "date_vstr BETWEEN '".$date1."' AND '".$date2."'";}
        else{$where = "date_vstr BETWEEN '".$date1."' AND '".$date2."' AND `time_vstr` BETWEEN '".$time1."' AND '".$time2."'";}
        $this->db->order_by("time_vstr", "asc");
        $this->db->where($where);
        // $this->db->where('user',$userrrrs);
        //$this->db->where('old_vstr',1);
        $this->db->where('who_vstr','serv');
        $query = $this->db->get('vstrechi',$num,$offset);
        return $query->result_array();  
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
     	// последняя назначеная встреча клиента для сотрудника ресепшена**
     function get_klients_vstr_resep($id) {
        //$this->db->where('ok',1);
        $this->db->where('id_client',$id);
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query = $this->db->get('vstrechi');
        return $query->row_array();  
	 }
// сортировка клиентов для каждого сотрудника телемаркетинга по встречам**
     function get_klients_tel_v($userrrrs) {
        //$this->db->where('id_client',$id);
        $this->db->where('who_user','serv');
        $this->db->where('user',$userrrrs);
        $this->db->where('otkaz',0);
        $this->db->where('prodacha',0);
        //$this->db->where('procedura',0);
        //$this->db->where('otkaz','');
        //$this->db->where('perezvon',0);
        //$this->db->where('procedura',1);
        //$this->db->order_by("id", "desc"); 
        //$this->db->limit(1);
        $query = $this->db->get('vstrechi');
        return $query->result_array();  
	 }
     		// сортировка клиентов для каждого сотрудника телемаркетинга по перезвонам**
     function get_klients_tel_p($userrrrs) {
        //$this->db->where('id_client',$id);
        //$this->db->where('user',$userrrrs);
        $this->db->where('who_user','serv');
        $this->db->where('sostoyalsya',0);
        //$this->db->where('prodacha',0);
        //$this->db->where('procedura',0);
        //$this->db->where('otkaz','');
        //$this->db->where('perezvon',0);
        //$this->db->where('procedura',1);
        //$this->db->order_by("id", "desc"); 
        //$this->db->limit(1);
        $query = $this->db->get('zvonki');
        return $query->result_array();  
	 }
     // список всех клиентов конкретного сотрудника в сортировке по дате для подтверждающего телемаркетинга
     //используется
     function get_klients_stel($userrrrs,$id) {
        $this->db->where('who_user','serv'); 
        $this->db->where('user',$userrrrs);
        $this->db->where('id',$id);
        $this->db->where('otkaz_serv',0);
        $query = $this->db->get('klients');
        return $query->row_array();  
	 }
  // список всех клиентов сервиса ресепшена в сортировке по дате
  //?? тупое описание надо поменять определив его назначение
  //используется
     function get_klients_sresep($userrrrs,$id) {
        $this->db->where('id',$id);
        $this->db->where('otkaz_serv',0);
        $query = $this->db->get('klients');
        return $query->row_array();  
	 }

     	// список звонков клиентов для сотрудника телемаркетинга**
     function get_klients_zvon_tel($id) {
        $this->db->where('id_client',$id);
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('zvonki');
        return $query->result_array();  
	 }
          	// список звонков клиентов для сотрудника телемаркетинга**
     function add_doctor_sresep() {
        foreach ($this->rules_lib->add_doctor_rules as $item)
        {
            $fname = $item['field'];
            $dataf[$fname] = $this->input->post($fname);                        
        }
        $this->db->insert('doctor', $dataf); 
	 }
          //получаем список докторов которые на работе
     function get_doctor() {
        //$date=date('H');
		/*$this->db->where('otdel','Сервис');
        $this->db->where('doljn','Косметолог');
        if($date<15)
        {$this->db->where('smena','1');}
        else
        {$this->db->where('smena','2');}
        $this->db->or_where('smena','3');*/
        $this->db->where('rabota','0');
        
        $query = $this->db->get('doctor');
        return $query->result_array();  
	 }
  //получаем список всех докторов
     function get_all_doctor() {
        //$date=date('H');
		/*$this->db->where('otdel','Сервис');
        $this->db->where('doljn','Косметолог');
        if($date<15)
        {$this->db->where('smena','1');}
        else
        {$this->db->where('smena','2');}
        $this->db->or_where('smena','3');*/
        //$this->db->where('rabota','0');
        
        $query = $this->db->get('doctor');
        return $query->result_array();  
	 }
     
       //сохранение встречи на ресепшене сервиса
     function safe_vstr($id_proc,$date_vstr,$time_vstr,$klient_go,$procedura,$doctor) {        
        $this->db->where('id',$id_proc);
        $this->db->set('date_vstr',$this->rotate_date($date_vstr));
        $this->db->set('time_vstr',$time_vstr);
        $this->db->set('klient_go',$klient_go);
        $this->db->set('procedura',$procedura);
        $this->db->set('doctor',$doctor);                                        
        $this->db->update('vstrechi');
        return TRUE;  
	 }          

           //добавление встречи на ресепшене сервиса
     function add_vstr($id_client,$date_vstr,$time_vstr,$sproc,$user,$doctor) {       
        $data['id_client']=$id_client;
        $data['date_vstr']=$this->rotate_date($date_vstr);
        $data['time_vstr']=$time_vstr;
        $data['sproc']=$sproc;
        $data['user']=$user;
        $data['doctor']=$doctor;
        $data['id_user']=$this->session->userdata('user_id');                              
        $this->db->insert('vstrechi',$data);
        return TRUE;  
	 }
     //аякс запрос на сохранение клиента на сервисе телемаркетинга
  function save_klient_sresep($id)
  {
        $datae = array();
        //edit_klients_sresep_rules
        foreach ($this->rules_lib->edit_klients_rules as $item)
        {
            $fname = $item['field'];
            $datae[$fname] = $this->input->post($fname);                        
        }
        if($datae['brichday']!=''){$datae['brichday'] = $this->rotate_date($datae['brichday']);}
        
            $izm = $this->edit_klients($id);
    	       if(mb_strtolower($izm['family'])!=mb_strtolower($datae['family']) || mb_strtolower($izm['name'])!=mb_strtolower($datae['name']) || mb_strtolower($izm['lastname'])!=mb_strtolower($datae['lastname'])){
                $izmenenie='ФИО изменено';
                $izmeneno_na=$datae['family'].' '.$datae['name'].' '.$datae['lastname'];
                $izmenil=$this->session->userdata('family')." ".$this->session->userdata('name');
                $prichina='';
                $this->user_model->history($id,$izmenenie,$izmeneno_na,$izmenil,$prichina);
                }
            
        $this->db->where('id',$id);
	    $this->db->update('klients', $datae);
        return TRUE;
  }
     //отказ от встречи клиента на сервисе ресепшена
     function update_otkz($id,$otkaz) 
	 {
	    $this->db->where('id',$id);
        $this->db->set('text_prichotkaza',$otkaz);
        $this->db->set('otkaz',1);
        $this->db->update('vstrechi');
        return TRUE;        
	 } 
     //получаем список назначенных процедур на определенное время на сервисе телемаркетинга
     function get_time($date,$doctor) 
	 {
	$this->db->where('date_vstr',$this->rotate_date($date));
	$this->db->where('doctor',$doctor);
        $this->db->order_by("time_vstr", "asc"); 
        $query = $this->db->get('vstrechi');
        return $query->result_array();    
	 } 
     
     // последняя назначеная втреча клиента на сервисе ресепшен
     function get_klients_vstr_resep1($num,$offset,$filter) {
        //$this->db->where('ok',1);
        //$this->db->where('id_client',$id);
        $date=date("d-m-Y");
        if($filter=='time_proc')
        {$this->db->where('procedura ',1);}
        elseif($filter=='in_proc')
        {$this->db->where('procedura',2);}
        elseif($filter=='good')
        {$this->db->where('procedura',3);}
        else{}
        /*$this->db->where('procedura !='3');*/
        $this->db->where('date_vstr >=',$date);
        $this->db->where('otkaz',0);
        $this->db->where('who_vstr','serv');
        $this->db->order_by("id", "desc");
        //$this->db->limit(1);
        $query = $this->db->get('vstrechi',$num,$offset);
        return $query->result_array();  
	 }
    // сервисе ресепшен для пагинации
     function get_klients_vstr_resep_pag() {
        $date=date("d-m-Y");
        $this->db->where('procedura !=',3);
        $this->db->where('date_vstr >=',$date);
        $this->db->where('otkaz',0);
        $this->db->where('who_vstr','serv');
        $this->db->order_by("id", "desc");
        $query = $this->db->get('vstrechi');
        return $query->result_array();  
	 }
 	// последняя назначеная встреча клиента
     function get_klients_vstr($id) {
        //$this->db->where('ok',1);
        $this->db->where('id_client',$id);
        $this->db->where('who_vstr','serv');
        //$this->db->where('otkaz',0);
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query = $this->db->get('vstrechi');
        return $query->row_array();  
	 }
		// клиент для сервиса ресепшена**
     function get_klients_sresep1($id_client) {
        //$date=date('d.m.Y');
        //$this->db->order_by("time_vstr", "asc");
        /*$this->db->where('perezvon',0);
        $this->db->where('otkaz','');
        $this->db->where('otkazon',0);*/
        //$this->db->where('date_vstr',$date);
        //$this->db->where('who_user','serv');
        //$this->db->order_by("id", "desc");
        $this->db->where('id',$id_client);
        $query = $this->db->get('klients');
        return $query->row_array();  
        //return $query->result_array();  
	 }

}