<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
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

//переводим дату в формат dd.mm.yy
function rotate_date2($date2)
{
//if(strrpos($date2, '-'))
//{
$d1=explode('-',$date2);
$norm_dates= $d1[2].'.'.$d1[1].'.'.$d1[0];
return $norm_dates;
//}
/*else
{
return $date;    
}*/
}

    // клиенты
    
    //проверяем существует ли телефон в базе
    //используется
    function no_number($number) {
        $this->db->where('phone',$number);
        $this->db->or_where('dop_phone',$number);
        $query=$this->db->get('klients');
        return $query->result_array();
	 }
    
		// список всех клиентов
        //используется
     function get_klients($num,$offset) {
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('klients',$num,$offset);
        return $query->result_array();  
	 }
     		// список всех клиентов для ресепшена**
       //удалить
     function get_klients_resep($num,$offset) {
        $this->db->where('who_user','tm');
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('klients',$num,$offset);
        return $query->result_array();  
	 }
    // список всех клиентов для ресепшена для пагинации
    // используется
     function get_klients_resep_pag() {
        $this->db->where('who_user','tm');
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }
    // список всех клиентов для кредитного
    //используется
     function get_klients_kredit($num,$offset) {
        $date=date('d.m.Y');
        $this->db->where('perezvon',0);
        //$this->db->where('who_user','tm');
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('klients',$num,$offset);
        return $query->result_array();  
	 }
		// список всех клиентов для телемаркетинга и ресепшена
        //удалить
     function get_klients_tel($userrrrs,$num,$offset) {
        $this->db->where('who_user','tm');
        $this->db->where('user',$userrrrs);
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('klients',$num,$offset);
        return $query->result_array();  
	 }
     		// список всех клиентов для ресепшена**
            //delete
     function get_klients_sresep($num,$offset) {
        $this->db->where('who_user','serv');
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('klients',$num,$offset);
        return $query->result_array();  
	 }
		// список всех клиентов для сервиса телемаркетинга++
        //удалить
     function get_klients_serv_tel($userrrrs,$num,$offset) {
        $this->db->where('who_user','serv');
        $this->db->where('user',$userrrrs);
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('klients',$num,$offset);
        return $query->result_array();  
	 }
     	// список всех клиентов для подтверждающего телемаркетинга
        //используется
     function get_klients_ptel($userrrrs,$num,$offset) {
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('klients',$num,$offset);
        return $query->result_array();  
	 }
     // список всех клиентов для ресепшена телемаркетинга
     //используется
     function get_klients_rtel($userrrrs,$id) {
        $this->db->where('id',$id);
        $this->db->where('perezvon',0);
        $query = $this->db->get('klients');
        return $query->row_array();  
	 }
     // список всех клиентов для подтверждающего телемаркетинга
     //удалить
     function get_klients_tel3($userrrrs,$id) {
        $this->db->where('id',$id);
        $this->db->where('perezvon',1);
        $query = $this->db->get('klients');
        return $query->row_array();  
	 }
     	// список встреч клиентов для сотрудника телемаркетинга**
     function get_klients_vstr_tel($id) {
        $this->db->where('id_client',$id);
        //$this->db->where('ok',1);
        $this->db->where('otkaz',0);
        //$this->db->where('id_client',$id);
        
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('vstrechi');
        return $query->result_array();  
	 }
      	// список встреч клиентов для сотрудника подтверждающего телемаркетинга
     function get_klients_vstr_tel1($id,$num,$offset) {
        $this->db->where('id_client',$id);
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('vstrechi',$num,$offset);
        return $query->result_array();  
	 }
           	// список встреч клиентов для сотрудника подтверждающего телемаркетинга
     function get_klients_vstr_tel1_pag($id) {
        $this->db->where('id_client',$id);
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('vstrechi');
        return $query->result_array();  
	 }
     	// список звонков клиентов для сотрудника телемаркетинга**
     function get_klients_zvon_tel($id) {
        $this->db->where('id_client',$id);
        $this->db->order_by("id", "desc");
        $this->db->limit(8);
        $query = $this->db->get('zvonki');
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
     	// последняя назначеная встреча клиента для сотрудника ресепшена**
     function get_klients_vstr_resep1($id) {
        //$this->db->where('ok',1);
        $this->db->where('id_client',$id);
        //$this->db->where('otkaz',0);
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query = $this->db->get('vstrechi');
        return $query->row_array();  
	 }
     
		// сортировка клиентов для каждого сотрудника телемаркетинга по встречам**
     function get_klients_tel_v($userrrrs) {
        //$this->db->where('id_client',$id);
        $this->db->where('who_user','tm');
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
        $this->db->where('who_user','tm');
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
     
		// список всех клиентов в сортировке**
     function get_klients_sort($num,$offset) {
        $this->db->limit($num,$offset);
        $this->db->order_by("fio", "asc"); 
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }
		// список всех клиентов в сортировке по дате**
     function get_klients_sortdate($num,$offset) {
        //$this->db->where('who_user','tm');
        $date1= $this->rotate_date($this->input->post('date1'));
        $date2= $this->rotate_date($this->input->post('date2'));
        $where = "date_vstr BETWEEN '".$date1."' AND '".$date2."'";
        $this->db->order_by("id", "desc");
        $this->db->where($where);
        $this->db->where('old_vstr',1);
        $query = $this->db->get('vstrechi',$num,$offset);
        return $query->result_array();  
	 }
     		// список всех клиентов в сортировке по дате для пагинации
     function get_klients_sortdate_pag() {
        //$this->db->where('who_user','tm');
        $date1= $this->rotate_date($this->input->post('date1'));
        $date2= $this->rotate_date($this->input->post('date2'));
        $where = "date_vstr BETWEEN '".$date1."' AND '".$date2."'";
        $this->db->order_by("id", "desc");
        $this->db->where($where);
        $this->db->where('old_vstr',1);
        $query = $this->db->get('vstrechi');
        return $query->result_array();  
	 }
     //подтверждаем встречу клиента**
     function update_pod_ok($id,$dd,$tt,$uu) 
	 {
	    $this->db->where('id_client',$id);
        $this->db->where('date_vstr',$dd);
        $this->db->where('time_vstr',$tt);
        $this->db->where('user',$uu);
        $this->db->set('ok',1);
        $this->db->update('vstrechi');
        return TRUE;        
	 }
     //добавляем клиента в базу на телемаркетинге**
     function add_klient() 
	 {
        $data = array();
		foreach ($this->rules_lib->add_klients_rules as $item)
        {
            $fname = $item['field'];
            $data[$fname] = $this->input->post($fname);                        
        } 
        $data['otkz_vstr']=$data['otkaz'];
        unset($data['otkaz']);

        $data['family']=preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $data['family'] );
        $data['lastname']=preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $data['lastname'] );
        $data['name']=preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $data['name'] );

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
        $datas['id_client']=$query['id'];
        $datas['id_user']=$this->session->userdata('user_id'); 
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
        if($datass['perezvon']==1)
        {
        $datass['id_client']=$query['id'];
        $datass['id_user']=$this->session->userdata('user_id'); 
        unset($datass['perezvon']);
        $this->db->insert('zvonki',$datass);
        }
             
	 }
     
      //добавляем клиента в базу на сервисе-телемаркетинге++
     function serv_add_klient() 
	 {
        $data = array();
		foreach ($this->rules_lib->serv_add_klients_rules as $item)
        {
            $fname = $item['field'];
            $data[$fname] = $this->input->post($fname);                        
        } 
        $this->db->insert('klients',$data);   
        
        $this->db->where('family',$data['family']);
        $this->db->where('lastname',$data['lastname']);
        $this->db->where('name',$data['name']);
        $query = $this->db->get('klients');
        $query= $query->row_array();
        
        $datas = array();
		foreach ($this->rules_lib->vstr_klients_stel_rules as $item)
        {
            $fname = $item['field'];
            $datas[$fname] = $this->input->post($fname);                        
        }
        if($datas['vstrecha']==1)
        {
        $datas['date_vstr'] = $this->rotate_date($datas['date_vstr']);
        $datas['id_client']=$query['id'];
        $datas['id_user']=$this->session->userdata('user_id'); 
        unset($datas['vstrecha']);
        
        $sproc=$datas['sproc'];
        $ads=count($sproc);
        $datas['sproc']='';
        $x=0;
        while ($x<$ads)
        {
            if($datas['sproc']=='')
            {
                $datas['sproc']=$sproc[$x];
            }
            else
            {
                $datas['sproc']=$datas['sproc'].';'.$sproc[$x];
            }
        $x++;
        }
        
        $this->db->insert('vstrechi',$datas);
        }
        
        //******
        $datass = array();
		foreach ($this->rules_lib->zvon_klients_tel_rules as $item)
        {
            $fnames = $item['field'];
            $datass[$fnames] = $this->input->post($fnames);                        
        }
        if($datass['perezvon']==1)
        {
        $datass['id_client']=$query['id'];
        $datass['id_user']=$this->session->userdata('user_id');
        unset($datass['perezvon']);
        $this->db->insert('zvonki',$datass);
        }
             
	 }
     
     //добавляем клиента в базу на сервисе телемаркетинга++
     function add_klient_stel() 
	 {
        $data = array();
		foreach ($this->rules_lib->add_klients_rules as $item)
        {
            $fname = $item['field'];
            $data[$fname] = $this->input->post($fname);                        
        } 
        $data['otkz_vstr']=$data['otkaz'];
        unset($data['otkaz']);
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
        $datas['id_client']=$query['id'];
        $datas['id_user']=$this->session->userdata('user_id');
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
        if($datass['perezvon']==1)
        {
        $datass['id_client']=$query['id'];
        $datass['id_user']=$this->session->userdata('user_id');
        unset($datass['perezvon']);
        $this->db->insert('zvonki',$datass);
        }
             
	 }
     
     
	 	 //поиск клиента в телемаркетинге по номеру телефона**
	 function find_klients_telemarket($phone) {
	    $this->db->where('who_user','tm');
		$this->db->where('phone',$phone);
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }
	 //Поиск по имени**
	 function find_klients_name_telemarket($name) {
	    $this->db->where('who_user','tm');
		$this->db->where('name',$name);
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }
	/*  //Поиск по ФИО**
	 function find_klients_fio_telemarket($fio) {
		$this->db->where('family','name','lastname',$fio);
        $query = $this->db->get('klients');
        return $query->result_array();  
	 } */
	 function find_klients_otch_telemarket ($otch)	{
	    $this->db->where('who_user','tm');
		$this->db->where('lastname', '$otch');
		$query = $this->db->get('klients');
        return $query->result_array();  
	 } 
	 //Конец поиска по ФИО
	 
      //поиск клиента в телемаркетинге по фамилии**
	 function find_klients_fam_telemarket($family) {
	    $this->db->where('who_user','tm');
		$this->db->where('family',$family);
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }
	 

        //поиск клиента в сервисе телемаркетинге по номеру телефона++
	 function find_klients_stelemarket($phone) {
	    $this->db->where('who_user','serv');
		$this->db->where('phone',$phone);
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }
	 //Поиск по имени в сервисе телемаркетинге++
	 function find_klients_name_stelemarket($name) {
	    $this->db->where('who_user','serv');
		$this->db->where('name',$name);
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }
	/*  //Поиск по ФИО в сервисе телемаркетинге++
	 function find_klients_fio_stelemarket($fio) {
		$this->db->where('family','name','lastname',$fio);
        $query = $this->db->get('klients');
        return $query->result_array();  
	 } */
	 function find_klients_otch_stelemarket ($otch)	{
	    $this->db->where('who_user','serv');
		$this->db->where('lastname', '$otch');
		$query = $this->db->get('klients');
        return $query->result_array();  
	 } 
	 //Конец поиска по ФИО
	 
      //поиск клиента в сервисе телемаркетинге по фамилии++
	 function find_klients_fam_stelemarket($family) {
	    $this->db->where('who_user','serv');
		$this->db->where('family',$family);
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }

	 //поиск клиента на ресепшене по фамилии**
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
	 //поиск клиента на ресепшене по фамилии по обоим отделам
	 function find_klients_kredit($family,$i) {
	   if($i==0)
       {$this->db->where('family',$family);}
       elseif($i==1)
       {$this->db->where('phone',$family);}
       elseif($i==2)
       {$this->db->where('name',$family);}
       elseif($i==3)
       {
        if(strrpos($family, ' '))
        {
        $fioname=explode(' ',$family);
		$this->db->where('name',$fioname[0]);
        $this->db->or_where('name',$fioname[1]);
        $this->db->where('family',$fioname[0]);
        $this->db->or_where('family',$fioname[1]);
        }
	    else
        {
        $this->db->or_where('name',$family);
        $this->db->or_where('family',$family);  
        }
       }
        //$this->db->where('who_user','tm');  
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }
     //поиск клиента в админке по фамилии
	 function find_klients_admins($family,$i) {
	   /*if($i==0)
       {$this->db->where('family',$family);}*/
       if($i==1)
       {$this->db->where('phone',$family);}
       elseif($i==3)
       {
        if(strrpos($family, ' '))
        {
        $fioname=explode(' ',$family);
		$this->db->like('name',$fioname[0]);
        $this->db->or_like('name',$fioname[1]);
        $this->db->like('family',$fioname[0]);
        $this->db->like('family',$fioname[1]);
        }
	    else
        {
        $this->db->or_like('name',$family);
        $this->db->or_like('family',$family);  
        }
       }
       /*elseif($i==2)
       {$this->db->where('name',$family);}*/
        //$this->db->where('who_user','tm');  
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }

	 //поиск клиента на сервисе ресепшене по фамилии**
	 function find_klients_sreseption($family,$i) {
	   if($i==0)
       {$this->db->where('family',$family);}
       elseif($i==1)
       {$this->db->where('phone',$family);}
       elseif($i==2)
       {$this->db->where('name',$family);}
        $this->db->where('who_user','serv');  
        $query = $this->db->get('klients');
        return $query->result_array();  
	 }
      //получаем данные для редактирования клиента на ресепшене**
      function edit_klients($id) {
	$this->db->where('id',$id);
        $query = $this->db->get('klients');
        return $query->row_array();  
	 }
      //получаем данные встречи для извлечения ФИО клиента и записи в историю
      function get_vstr_his($id) {
        $this->db->where('id',$id);
        $query = $this->db->get('vstrechi');
        return $query->row_array();  
	 }
     //получаем список косметологов которые на работе**
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
     /* удалить
	 	//сохраняем данные клиента после редактирования на ресепшене**
	 function update_klients($data,$usersss) {
        $id=$data['id'];
        $date=$this->rotate_date($data['date']);
        $data = array();
		foreach ($this->rules_lib->edit_klients_rules as $item)
        {
            $fname = $item['field'];
            $data[$fname] = $this->input->post($fname);                        
        }
        if(!empty($data['brichday'])){$data['brichday']= $this->rotate_date($data['brichday']);}
        
        $izm = $this->edit_klients($id);
	if(mb_strtolower($izm['family'])==mb_strtolower($data['family']) || mb_strtolower($izm['name'])==mb_strtolower($data['name']) || mb_strtolower($izm['lastname'])==mb_strtolower($data['lastname'])){}else{
        $izmenenie='Фамилия изменена';
        $izmeneno_na=$data['family'].' '.$data['name'].' '.$data['lastname'];
        $izmenil=$usersss;//;//$data['usersss'];
        $this->history($id,$izmenenie,$izmeneno_na,$izmenil);
	    }
        //if($this->input->post('procedura')=='on'){$data['procedura']=1;}else{$data['procedura']=0;}
		$this->db->where('id',$id);
		$this->db->update('klients', $data);
        
        $datass = array();
		foreach ($this->rules_lib->edit_resep_vstr_klients_rules as $item)
        {
            $fname = $item['field'];
            $datass[$fname] = $this->input->post($fname);                        
        }
        $old_kosmet=$datass['old_kosmet'];
        unset($datass['old_kosmet']);
        
        $proc=$datass['procedura'];
        $this->db->where('id_client',$id);
        $this->db->where('date_vstr',$date);
		$this->db->update('vstrechi', $datass);
        
        $kosmetolog=$datass['kosmetolog'];
        unset($datass['kosmetolog']);
        if($proc==1 || $proc==2 || $proc==3)
        { $this->update_kosm($kosmetolog,$proc,$old_kosmet); }
  
	 }
     
     */
     	//сохраняем данные клиента после редактирования на кредитном
	 function update_kred_klients($data) {
        $id=$data['id'];
        $date_vstr=$this->input->post('date_vstr');
        $time_vstr=$this->input->post('time_vstr');
        $prodacha=$this->input->post('prodacha');
        $data = array();
		foreach ($this->rules_lib->edit_kred_klients_rules as $item)
        {
            $fname = $item['field'];
            $data[$fname] = $this->input->post($fname);
        }
		$this->db->where('id',$id);
        if($data['brichday']!=''){$data['brichday'] = $this->rotate_date($data['brichday']);}
        if($data['date_vidan']!=''){$data['date_vidan'] = $this->rotate_date($data['date_vidan']);}

        /*$data['mesto_rozd']=$this->encrypt->encode( $data['mesto_rozd']);
        $data['ser_pasp']=$this->encrypt->encode($data['ser_pasp']);
        $data['nom_pasp']=$this->encrypt->encode($data['nom_pasp']);
        $data['date_vidan']=$this->encrypt->encode($data['date_vidan']);
        $data['vidan']=$this->encrypt->encode($data['vidan']);*/
        $this->db->update('klients', $data);
        
        $data_dog = array();
   	    foreach ($this->rules_lib->edit_kred_dog_klients_rules as $item)
        {
            $fname = $item['field'];
            $data_dog[$fname] = $this->input->post($fname);
        }
        if($data_dog['date_dog']!=''){$data_dog['date_dog'] = $this->rotate_date($data_dog['date_dog']);}
        $data_dog['date_vstr'] = $date_vstr;
        $data_dog['time_vstr'] = $time_vstr;
        /*
        $this->db->where('id_client',$id);
        $this->db->where('date_vstr',$date_vstr);
        $this->db->where('time_vstr',$time_vstr);
        $querus=$this->db->get('dogovora');
        $querus=$querus->row_array();

        if(isset($querus['id_client']))
        {
        $data_dog['id_client']=$id;
        $this->db->update('dogovora',$data_dog);
        }
        else
        {*/
        $data_dog['id_client']=$id;
        $this->db->insert('dogovora',$data_dog);
        //}
        // ставим значение продажа
        $this->db->where('id_client',$id);
        $this->db->where('date_vstr',$date_vstr);
        $this->db->where('time_vstr',$time_vstr);
        $this->db->set('prodacha',1);
        $this->db->update('vstrechi');
               
        return true;
        
	 }
     //сохраняем данные клиента после редактирования на телемаркетиннге**
	 function update_tel_klients($data) {
	    $id=$data['id'];
        $data = array();
		foreach ($this->rules_lib->edit_klients_tel_rules as $item)
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
        $this->history($id,$izmenenie,$izmeneno_na,$izmenil,$prichina);
	    }
        
        $data['otkz_vstr']=$data['otkaz'];
        unset($data['otkaz']);
        
        $data['family']=preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $data['family'] );
        $data['lastname']=preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $data['lastname'] );
        $data['name']=preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $data['name'] );
        
        $this->db->where('id',$id);
        $this->db->set('klient_go',0);
        $this->db->set('procedura',0);
		$this->db->update('klients', $data);
        
        /*$datasss = array();
		foreach ($this->rules_lib->zvon_klients_tel_rules as $item)
        {
            $fname = $item['field'];
            $datasss[$fname] = $this->input->post($fname);                        
        }
        if($datasss['perezvon']==1)
        {
        $datasss['id_client']=$id;
        $datasss['id_user']=$this->session->userdata('user_id');
        unset($data['perezvon']);
        //$this->db->where('id_client',$id);
		$this->db->insert('zvonki', $datasss);
        
        $this->db->where('id',$id);
        $this->db->set('perezvon',1);
		$this->db->update('klients');
        }*/
        
        /*$datay = array();
		foreach ($this->rules_lib->vstr_klients_tel_rules as $item)
        {
            $fname = $item['field'];
            $datay[$fname] = $this->input->post($fname);                        
        }
        if($datay['vstrecha']==1)
        {
        $datay['id_client']=$id;
        $datay['id_user']=$this->session->userdata('user_id');
        unset($data['vstrecha']);
        $this->db->insert('vstrechi', $datay);
        
        $this->db->where('id',$id);
        $this->db->set('perezvon',0);
		$this->db->update('klients');
        }*/
  }
  
  //сохраняем данные клиента после редактирования на сервисе-телемаркетиннге++
	 function update_serv_tel_klients($data) {
	    $id=$data['id'];
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
        $this->history($id,$izmenenie,$izmeneno_na,$izmenil,$prichina);
	    }
        
        $this->db->where('id',$id);
        //$this->db->set('klient_go',0);
        //$this->db->set('procedura',0);
		$this->db->update('klients', $data);
        
        foreach ($this->rules_lib->serv_tel_vstr_rules as $item)
        {
            $fname = $item['field'];
            $dataf[$fname] = $this->input->post($fname);                        
        }
        
        if(!empty($dataf['sproc']))
        {
        $sproc=$dataf['sproc'];
        $ads=count($sproc);
        $dataf['sproc']='';
        $x=0;
        while ($x<$ads)
        {
            if($dataf['sproc']=='')
            {
                $dataf['sproc']=$sproc[$x];
            }
            else
            {
                $dataf['sproc']=$dataf['sproc'].';'.$sproc[$x];
            }
        $x++;
        }
        }
        else
        {
            $dataf['sproc']=' ';
        }
        
        $dataf['id_client']=$id;
        $dataf['id_user']=$this->session->userdata('user_id');
        $this->db->insert('vstrechi', $dataf);
  }
  
  //аякс запрос на сохранение встречи**
  function add_vstr($data)
  {
    $id=$data['id'];
        $datay = array();
        $datay['date_vstr']=$data['date_vstr'];
        $datay['time_vstr']=$data['time_vstr'];
        $datay['type_procedur']=$data['type_procedur'];
        $datay['office']=$data['office'];
        $datay['user']=$data['user'];
        $datay['comments']=$data['comments'];
        $datay['otkaz']=$data['otkaz'];
        $datay['prichotkaza']=$data['prichotkaza'];
    
    
		/*foreach ($this->rules_lib->vstr_klients_tel_rules as $item)
        {
            $fname = $item['field'];
            $datay[$fname] = $this->input->post($fname);                        
        }*/
        $datay['id_client']=$id;
        $datay['id_user']=$this->session->userdata('user_id');
        $this->db->insert('vstrechi', $datay);
        $this->db->where('id',$id);
        $this->db->set('perezvon',0);
		$this->db->update('klients');
        return TRUE;
  }
  //аякс запрос на сохранение встречи на сервисе телемаркетинга++
  function add_svstr($data)
  {
    $id=$data['id'];
        $datay = array();
        $datay['date_vstr']=$data['date_vstr'];
        $datay['time_vstr']=$data['time_vstr'];
        $datay['procedur']=$data['procedur'];
        $datay['user']=$data['user'];
        $datay['otkaz']=$data['otkaz'];
        $datay['prichotkaza']=$data['prichotkaza'];
    
    
		/*foreach ($this->rules_lib->vstr_klients_tel_rules as $item)
        {
            $fname = $item['field'];
            $datay[$fname] = $this->input->post($fname);                        
        }*/
        $datay['id_client']=$id;
        $datay['id_user']=$this->session->userdata('user_id');
        $this->db->insert('vstrechi', $datay);
        /* $this->db->where('id',$id);
       $this->db->set('perezvon',0);
		$this->db->update('klients');*/
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
  
     //обновление косметолога
     function update_kosm($fio,$proc,$old_kosmet) 
	 {
         if(!empty($fio)){
       $tmp = explode(' ', $fio);
       $family=$tmp[0];
       $name=$tmp[1];
        }
         else {$family="";$name="";}
        if($old_kosmet!='')
        {
       $tmp2 = explode(' ', $old_kosmet);
       $family2=$tmp2[0];
       $name2=$tmp2[1];
       $this->db->where('family',$family2);
       $this->db->where('name',$name2);
       $this->db->set('rabota',0);
       $this->db->update('sotrudnik'); 
        }
        
	   if($proc==1 || $proc==2)
       {$data['rabota']='1';}
	   else {$data['rabota']='0';}
        $this->db->where('family',$family);
        $this->db->where('name',$name);
		$this->db->update('sotrudnik',$data);
     }
    //обновление доктора
     function update_doctor($fio,$proc,$old_doctor) 
	 {
       $tmp = explode(' ', $fio);
       $family=$tmp[0];
       $name=$tmp[1];
       
       if($old_doctor!='')
       {
       $tmp2 = explode(' ', $old_doctor);
       $family2=$tmp2[0];
       $name2=$tmp2[1];
        
       $this->db->where('family',$family2);
       $this->db->where('name',$name2);
       $this->db->set('rabota',0);
       $this->db->update('doctor');
       }
       
	   if($proc==1 || $proc==2)
       {$data['rabota']='1';}
	   else {$data['rabota']='0';}
        $this->db->where('family',$family);
        $this->db->where('name',$name);
		$this->db->update('doctor',$data);
     }
     //удаляем клиента из админки
     function del_admin_klients($id,$user,$prichina) 
	 {
        $izmenenie='Удален клиент из базы';
        $izmeneno_na='';
        $izmenil=$user;
        $this->history($id,$izmenenie,$izmeneno_na,$izmenil,$prichina);
        $this->db->where('id',$id);
        $this->db->delete('klients');
        return TRUE;      
	 }
     
     //получение списка включенных процедур++
     function get_proc()
     {
        $this->db->where('state','on');
        $query=$this->db->get('proceduri');
        return $query->result_array(); 
     }
     //получение всех процедур
     function get_all_proc()
     {
        $query=$this->db->get('proceduri');
        return $query->result_array(); 
     }
     
     
     
     
     
     // сотрудники 
     
	// список всех сотрудников
     function get_sotrudnik($f,$num,$offset) {
        if($f=='doc'){$this->db->where("doljn", "Врач");}
        elseif($f=='operator'){$this->db->where("doljn", "Оператор");}
        elseif($f=='sadmin'){$this->db->where("doljn", "Администратор Сервис");}
        elseif($f=='kosmet'){$this->db->where("doljn", "Косметолог");$f='';}
        elseif($f=='diagn'){$this->db->where("doljn", "Диагност");$f='';}
        elseif($f=='it'){$this->db->where("doljn", "IT");$f='';}
        elseif($f=='kredexp'){$this->db->where("doljn", "Кредитный эксперт");}
        elseif($f=='soperator'){$this->db->where("doljn", "Оператор сервиса");}
        elseif($f=='ruktm'){$this->db->where("doljn", "Рук-ль тм1");$f='';}
        elseif($f=='poperator'){$this->db->where("doljn", "Подтверждающий оператор");}
        elseif($f=='parih'){$this->db->where("doljn", "Парикмахер");$f='';}
        elseif($f=='yrist'){$this->db->where("doljn", "Юрист");$f='';}
        elseif($f=='radmin'){$this->db->where("doljn", "Администратор (ресепшен)");}
        elseif($f=='stkredexp'){$this->db->where("doljn", "Старший кредитный эксперт");}
        elseif($f=='aup'){$this->db->where("doljn", "АУП");$f='';}
        elseif($f=='rukserv'){$this->db->where("doljn", "Рук-ль сервиса");}
        
                
        /*if($f=='fio')
        {$this->db->order_by("family", "asc"); }
        elseif($f=='doljn')
        {$this->db->order_by("doljn", "asc"); }
        elseif($f=='otdel')
        {$this->db->order_by("otdel", "asc"); }
        elseif($f=='date')
        {$this->db->order_by("date_rozd", "asc"); }
        else
        {$this->db->order_by("id", "desc"); }*/
        //$this->db->order_by("id", "desc");
         $query = $this->db->get('sotrudnik',$num,$offset);
        return $query->result_array();  
	 }
     // список всех сотрудников
     function get_sotrudnik_pag($f) {
        if($f=='doc'){$this->db->where("doljn", "Врач");}
        elseif($f=='operator'){$this->db->where("doljn", "Оператор");}
        elseif($f=='sadmin'){$this->db->where("doljn", "Администратор Сервис");}
        elseif($f=='kosmet'){$this->db->where("doljn", "Косметолог");$f='';}
        elseif($f=='diagn'){$this->db->where("doljn", "Диагност");$f='';}
        elseif($f=='it'){$this->db->where("doljn", "IT");$f='';}
        elseif($f=='kredexp'){$this->db->where("doljn", "Кредитный эксперт");}
        elseif($f=='soperator'){$this->db->where("doljn", "Оператор сервиса");}
        elseif($f=='ruktm'){$this->db->where("doljn", "Рук-ль тм1");$f='';}
        elseif($f=='poperator'){$this->db->where("doljn", "Подтверждающий оператор");}
        elseif($f=='parih'){$this->db->where("doljn", "Парикмахер");$f='';}
        elseif($f=='yrist'){$this->db->where("doljn", "Юрист");$f='';}
        elseif($f=='radmin'){$this->db->where("doljn", "Администратор (ресепшен)");}
        elseif($f=='stkredexp'){$this->db->where("doljn", "Старший кредитный эксперт");}
        elseif($f=='aup'){$this->db->where("doljn", "АУП");$f='';}
        elseif($f=='rukserv'){$this->db->where("doljn", "Рук-ль сервиса");}
         $query = $this->db->get('sotrudnik');
        return $query->result_array();  
	 }
     	// список всех сотрудников для плана
     function get_sotrudnik_plan() {
        $this->db->where('doljn','Оператор');
        $this->db->or_where('doljn','Старший оператор');
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get('sotrudnik');
        return $query->result_array();  
	 }
    //получаем данные для редактирования сотрудника
	 function edit_sotrudnik($id) {
		$this->db->where('id',$id);
        $query = $this->db->get('sotrudnik');
        return $query->row_array();  
	 }
	 //поиск сотрудника по фамилии
	 function find_sotrudnik($family) {
		$this->db->like('family',$family);
        $query = $this->db->get('sotrudnik');
        return $query->result_array();  
	 } 
     
     //обновляем сотрудника в базе
     function update_sotrudnik() 
	 {
        $data = array();
		foreach ($this->rules_lib->update_sotrudnik_rules as $item)
        {
            $fname = $item['field'];
            $data[$fname] = $this->input->post($fname);                        
        }
        $data['date_rozd'] = $this->rotate_date($data['date_rozd']);
        $id=$this->input->post('id');
        $this->db->where('id',$id);
        $this->db->update('sotrudnik',$data);        
	 }
     
     //удаляем сотрудника из базе
     function del_sotrudnik($id) 
	 {

        $this->db->where('id',$id);
        $this->db->delete('sotrudnik');       
	 }
     
     //добавляем сотрудника в базу
     function add_sotrudnik() 
	 {
        $data = array();
		foreach ($this->rules_lib->add_sotrudnik_rules as $item)
        {
            $fname = $item['field'];
            $data[$fname] = $this->input->post($fname);                        
        } 
        $data['date_rozd'] = $this->rotate_date($data['date_rozd']);
        $this->db->insert('sotrudnik',$data);        
	 }
     //получаем список телемаркетологов для просмотра инфы
     function get_telemarketologs($num,$offset) 
	 {
        $this->db->order_by("id", "desc");
        $this->db->where('otdel','Телемаркетинг первички (Тм1)');
        $this->db->where('doljn','Оператор');
        $this->db->or_where('doljn','Старший оператор');
        $this->db->or_where('doljn','Подтверждающий оператор');
        
        $query = $this->db->get('sotrudnik',$num,$offset);
        return $query->result_array();         
	 }
    //получаем id сотрудника из таблицы users
     function get_id_telemarketologs($family,$name) 
	 {
        $this->db->where('family',$family);
        $this->db->where('name',$name);
        //$this->db->where('otkaz',0);
        //$querys = $this->db->get('vstrechi');
        $query = $this->db->get('users');
        return $query->row_array();         
	 }
     //получаем колличество назначеных встреч телемаркетологом
     function get_nazn_telemarketologs($user) 
	 {
        $this->db->where('user',$user);
        $this->db->where('otkaz',0);
        //$querys = $this->db->get('vstrechi');
        $this->db->from('vstrechi');
        $querys = $this->db->count_all_results();
        return $querys; 
        //return $query->result_array();         
	 }
     //получаем колличество пройденных встреч телемаркетологом
     function get_proid_telemarketologs($user) 
	 {
        $this->db->where('user',$user);
        $this->db->where('klient_go',1);
        $this->db->where('status',3);
        //$querys = $this->db->get('vstrechi');
        $this->db->from('vstrechi');
        $querys = $this->db->count_all_results();
        return $querys; 
        //return $query->result_array();         
	 }
     //получаем колличество проданных встреч телемаркетологом
     function get_prod_telemarketologs($user) 
	 {
        $this->db->where('user',$user);
        $this->db->where('klient_go',1);
        $this->db->where('status',3);
        $this->db->where('prodacha',1);
        //$querys = $this->db->get('vstrechi');
        $this->db->from('vstrechi');
        $querys = $this->db->count_all_results();
        return $querys; 
        //return $query->result_array();         
	 }
     //получаем список телемаркетологов для просмотра инфы
     function get_telemarketolog($id) 
	 {
        $this->db->where('id',$id);
        $query = $this->db->get('sotrudnik');
        return $query->row_array();         
	 }
     
     //инфо о косметологе встреч за день
     function get_tel_vst_day($family,$name) 
	 {
	    $userrrrs=$family.' '.$name;
        $date=date('d.m.Y');    
        $this->db->where('user',$userrrrs);
        //$this->db->where('otkazon',0);
        //$this->db->where('procedura',0);
        //$this->db->where('otkaz','');
        $this->db->where('perezvon',0);
        //$this->db->where('vstrecha',1);
        $this->db->where('date_dobav',$date);
        $this->db->from('klients');
        $querys = $this->db->count_all_results();
        return $querys;    
     }
     //инфо о косметологе встреч за неделю
     function get_tel_vst_week($family,$name) 
	 {
	    $userrrrs=$family.' '.$name;
        $d=date('d')-7;
        $date1=date($d.'.m.Y');
        $date2=date('d.m.Y');    
        $this->db->where('user',$userrrrs);
        /*$this->db->where('otkazon',0);
        $this->db->where('procedura',0);
        $this->db->where('otkaz','');*/
        $this->db->where('perezvon',0);
        //$this->db->where('vstrecha',1);
        $this->db->where('date_dobav >=',$date1);
        $this->db->where('date_dobav <=',$date2);
        $this->db->from('klients');
        $querys = $this->db->count_all_results();
        return $querys; 
     }
     //инфо о косметологе встреч за месяц
     function get_tel_vst_mon($family,$name) 
	 {
        $d1=date('m');
        $d2=date('Y');
	    $numdays = cal_days_in_month(CAL_GREGORIAN, $d1, $d2);
        $date1=date('1.m.Y');
        $date2=date($numdays.'.m.Y');
        $userrrrs=$family.' '.$name;    
        $this->db->where('user',$userrrrs);
        /*$this->db->where('otkazon',0);
        $this->db->where('procedura',0);
        $this->db->where('otkaz','');*/
        $this->db->where('perezvon',0);
        //$this->db->where('vstrecha',1);
        $this->db->where('date_dobav >=',$date1);
        $this->db->where('date_dobav <=',$date2);
        $this->db->from('klients');
        $querys = $this->db->count_all_results();
        return $querys; 
     }
     //инфо о косметологе за день
     function get_tel_klient_day($family,$name) 
	 {
	    $userrrrs=$family.' '.$name;
        $date=date('d.m.Y');    
        $this->db->where('user',$userrrrs);
        $this->db->where('date_dobav',$date);
        $this->db->from('klients');
        $querys = $this->db->count_all_results();
        return $querys;  
     }
     //инфо о косметологе за неделю
     function get_tel_klient_week($family,$name) 
	 {
	    $userrrrs=$family.' '.$name;
        $d=date('d')-7;
        $date1=date($d.'.m.Y');
        $date2=date('d.m.Y');    
        $this->db->where('user',$userrrrs);
        $this->db->where('date_dobav >=',$date1);
        $this->db->where('date_dobav <=',$date2);
        $this->db->from('klients');
        $querys = $this->db->count_all_results();
        return $querys; 
     }
     //инфо о косметологе за месяц
     function get_tel_klient_mon($family,$name) 
	 {
        $d1=date('m');
        $d2=date('Y');
	    $numdays = cal_days_in_month(CAL_GREGORIAN, $d1, $d2);
        $date1=date('1.m.Y');
        $date2=date($numdays.'.m.Y');
        $userrrrs=$family.' '.$name;    
        $this->db->where('user',$userrrrs);
        $this->db->where('date_dobav >=',$date1);
        $this->db->where('date_dobav <=',$date2);
        $this->db->from('klients');
        $querys = $this->db->count_all_results();
        return $querys; 
     }
     
     // пользователи
     	// список всех пользователей
     function get_users($num,$offset) {
        $this->db->order_by("id", "desc");
        $this->db->where('username !=','');
        $this->db->where('pass !=','');
        //$this->db->where('dostup','on');
        $query = $this->db->get('sotrudnik',$num,$offset);
        return $query->result_array();  
	 }
          	// список всех пользователей для пагинации
     function get_users_pag() {
        $this->db->where('username !=','');
        $this->db->where('pass !=','');
        $this->db->where('dostup','on');
        $query = $this->db->get('sotrudnik');
        return $query->result_array();  
	 }
     	 //поиск сотрудника по фамилии
	 function find_users($family) {
		$this->db->like('family',$family);
        $query = $this->db->get('sotrudnik');
        return $query->result_array();  
	 }
         //получаем данные для редактирования пользователя
	 function edit_users($id) {
		$this->db->where('id',$id);
        $query = $this->db->get('sotrudnik');
        return $query->row_array();  
	 }
          //удаляем пользоватля из базе
     function del_users($id) 
	 {
	    $this->db->set('username','');
        $this->db->set('pass','');
        $this->db->set('dostup','off');
        $this->db->where('id',$id);
        $this->db->update('sotrudnik');
        /*$this->db->where('id',$id);
        $this->db->delete('users');  */     
	 }
    //обновляем пользователя в базе
     function update_users() 
	 {
        $this->db->set('pass',$this->input->post('pass'));
        $this->db->where('id',$this->input->post('id_user'));
        $this->db->update('sotrudnik');
        return TRUE;   
	 }
     //включаем и отключаем доступ пользователя в базу
     function disable_user($id_user,$conf_states) 
	 {
	    $this->db->where('id',$id_user);
        $this->db->set('dostup',$conf_states);
        $query=$this->db->update('sotrudnik');
        if(mysql_affected_rows()!=0){return TRUE;}     
        else{return FALSE;}
        
	 }
    //добавляем доступ пользователя в базу
     function add_users() 
	 {
        $this->db->set('username',$this->input->post('username'));
        $this->db->set('pass',$this->input->post('pass'));
        $this->db->set('dostup','on');
        $this->db->where('id',$this->input->post('id_user'));
        $this->db->update('sotrudnik');       
	 }
     
     // История
     function get_history_klients($num,$offset) 
	 {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('history',$num,$offset);
        return $query->result_array();        
	 }
     //заносим данные в историю
     function history($id,$izmenenie,$izmeneno_na,$izmenil,$prichina)
     {
        $izm = $this->edit_klients($id);
        $izmeneno=$izm['family']." ".$izm['name']." ".$izm['lastname'];
        $date_izm=date('d.m.Y');
        $time_izm=date('H:i');
        $data['izmenenie']=$izmenenie;
        $data['izmeneno']=$izmeneno;
        $data['izmeneno_na']=$izmeneno_na;
        $data['date_izm']=$date_izm;
        $data['time_izm']=$time_izm;
        $data['izmenil']=$izmenil;
        $data['prichina']=$prichina;
        
	    /*$this->db->set('izmenenie', $izmenenie);
	    $this->db->set('izmeneno', $izmeneno);
        $this->db->set('izmeneno_na', $izmeneno_na);
        $this->db->set('date_izm', $date_izm);
        $this->db->set('time_izm', $time_izm);
        $this->db->set('izmenil', $izmenil);
        $this->db->set('prichina', $prichina);*/
        $this->db->insert('history',$data);
		
     }
     
     //план
     //выбираем клиентов добаввленых за сегодня пользователем
     function get_plan_klients($family,$name) 
	 {
	    $date=date('d.m.Y');
        $user=$family.' '.$name;
        $this->db->where('date_dobav',$date);
        $this->db->where('user',$user);
        $this->db->from('klients');
        $querys = $this->db->count_all_results();
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
     //назначаем план сотруднику по id
     function update_plan($ids,$plan) 
	 {
        $this->db->where('id',$ids);
        $this->db->set('plan',$plan);
        $this->db->update('sotrudnik');
        return TRUE;        
	 }
     //выбираем клиентов добавленых за сегодня
     function get_plan_klients_all() 
	 {
	    $date=date('d.m.Y');
        $this->db->where('date_dobav',$date);
        $this->db->from('klients');
        $querys = $this->db->count_all_results();
        return $querys;        
	 }
     //выбираем планы сотрудников по добавлению клиентов на сегодня
     function get_plan_sotr_all() 
	 {
        $this->db->select('plan');
        $this->db->where('otdel', 'Телемаркетинг первички (Тм1)');
        $this->db->where('doljn', 'Оператор');
        $this->db->or_where('doljn', 'Старший оператор');
        $query=$this->db->get('sotrudnik');
        return $query->result_array();   
	 }
     //выбираем колличество встречь назначеных на сегодня
     function get_vstr_today() 
	 {
	    $date=date('d.m.Y');
        $this->db->where('vstrecha',1);
        $this->db->where('date_vstr',$date);
        $this->db->from('klients');
        $querys = $this->db->count_all_results();
        return $querys;     
	 }
    //выбираем колличество клиентов которые пришли сегодня и ожидают процедуру
     function get_proced_today() 
	 {
	    $date=date('d.m.Y');
        $this->db->where('vstrecha',1);
        $this->db->where('date_vstr',$date);
        $this->db->where('procedura',1);
        $this->db->from('klients');
        $querys = $this->db->count_all_results();
        return $querys;     
	 }
     
     
     /*Смена */
    //выбираем всех косметологов из бд
     function get_kosmetolog() 
	 {

		$this->db->where('otdel','Сервис');
        $this->db->where('doljn','Косметолог');
        $query = $this->db->get('sotrudnik');
        return $query->result_array();  
	 }
          //назначаем план сотруднику по id
     function update_smena($ids,$smena) 
	 {
        $this->db->where('id',$ids);
        $this->db->set('smena',$smena);
        $this->db->update('sotrudnik');
        return TRUE;        
	 }
    //обновляем состояние процедуры по id
     function update_proc($id,$proc) 
	 {
        $this->db->where('id',$id);
        $this->db->set('state',$proc);
        $this->db->update('proceduri');
        return TRUE;        
	 }
    //сохраняем время процедуры по id
     function safe_time($id,$time) 
	 {
        $this->db->where('id',$id);
        $this->db->set('time',$time);
        $this->db->update('proceduri');
        return TRUE;        
	 }
	 //добавляем процедур в базу сервиса
     function add_proc($proc) 
	 {
        $this->db->set('name_proc', $proc);
        $this->db->insert('proceduri');
        return TRUE;        
	 }
     //удаляем процедуру из базы сервиса
     function del_proc($id) 
	 {
        $this->db->where('id',$id);
        $this->db->delete('proceduri');
        return TRUE;        
	 }
     
  //аякс запрос на сохранение клиента на сервисе телемаркетинга
  function save_klient_sresep($data)
  {
        $id=$data['id'];
        $datae = array();
        //edit_klients_sresep_rules
        foreach ($this->rules_lib->serv_add_klients_rules as $item)
        {
            $fname = $item['field'];
            $datae[$fname] = $this->input->post($fname);                        
        }
        $datae['brichday'] = $this->rotate_date($datae['brichday']);
        //$datae['date_dobav'] = $this->rotate_date($datae['date_dobav']);
        $this->db->where('id',$id);
	    $this->db->update('klients', $datae);
        $datas = array();
       // edit_klients_sresep_rules
        foreach ($this->rules_lib->edit_klients_sresep_rules as $item)
        {
            $fname = $item['field'];
            $datas[$fname] = $this->input->post($fname);                        
        }
        $datas['date_vstr'] = $this->rotate_date($datas['date_vstr']);
        $sproc=$datas['sproc'];
        $ads=count($sproc);
        $datas['sproc']='';
        $x=0;
        while ($x<$ads)
        {
            if($datas['sproc']=='')
            {
                $datas['sproc']=$sproc[$x];
            }
            else
            {
                $datas['sproc']=$datas['sproc'].';'.$sproc[$x];
            }
        $x++;
        }

        $old_doctor=$datas['old_doctor'];
        unset($datas['old_doctor']);
        $this->db->where('id_client',$id);
        $this->db->where('date_vstr',$datas['date_vstr']);
        //$this->db->where('time_vstr',$datas['time_vstr']);
	    $this->db->update('vstrechi', $datas);
        
        $doctor=$datas['doctor'];
        if($datas['procedura']==1 || $datas['procedura']==2 || $datas['procedura']==3)
        { $this->update_doctor($doctor,$datas['procedura'],$old_doctor); }
        
        return TRUE;
  }
       	// последний договор клиента 
     function get_last_dog($id) {
        //$this->db->where('ok',1);
        $this->db->where('id_client',$id);
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query = $this->db->get('dogovora');
        return $query->row_array();  
	 }
       	// конкретный договор клиента 
     function get_konk_dog($id) {
        //$this->db->where('ok',1);
        $this->db->where('id',$id);
        //$this->db->order_by("id", "desc");
        //$this->db->limit(1);
        $query = $this->db->get('dogovora');
        return $query->row_array();  
	 }

       	// все договора клиента 
     function get_all_dog($id) {
        //$this->db->where('ok',1);
        $this->db->where('id_client',$id);
        $this->db->order_by("id", "desc");
        //$this->db->limit(1);
        $query = $this->db->get('dogovora');
        //return $query->row_array();
        return $query->result_array();    
	 }

       	// 5 последних договоров клиента 
     function get_five_dog($id) {
        //$this->db->where('ok',1);
        $this->db->where('id_client',$id);
        $this->db->order_by("id", "desc");
        $this->db->limit(5);
        $query = $this->db->get('dogovora');
        //return $query->row_array();
        return $query->result_array();    
	 }
     
          function acs($id,$d1,$d2) {
             $this->db->where('id_client',$id);
    if($d1=='' || $d2=='')
    {}
    else
    {
    $where = "date_vstr BETWEEN '".$this->rotate_date($d1)."' AND '".$this->rotate_date($d2)."'"; 
    $this->db->where($where);  
    }
        //$this->db->where('ok',1);
        //$this->db->where('otkaz',0);
        //$this->db->where('id_client',$id);
        
        $query = $this->db->get('vstrechi');  
        return $query->result_array();
	 }
     
     function ads($doc,$d1,$d2) {
     $this->db->where('doctor',$doc);
    if($d1=='' || $d2=='')
    {}
    else
    {
    $where = "date_vstr BETWEEN '".$this->rotate_date($d1)."' AND '".$this->rotate_date($d2)."'"; 
    $this->db->where($where);  
    }
    $this->db->where('otkaz',0);
        $query = $this->db->get('vstrechi');  
        return $query->result_array();
	 }

    function asd($d1,$d2) {
    if($d1=='' || $d2=='')
    {}
    else
    {
    $where = "date_vstr BETWEEN '".$this->rotate_date($d1)."' AND '".$this->rotate_date($d2)."'"; 
    $this->db->where($where);  
    }
    $this->db->where('otkaz',0);
    $query = $this->db->get('vstrechi');  
    return $query->result_array();
	 }
     
    function doc_print($doc,$d1) {
    $this->db->where('who_vstr','serv');
    $this->db->where('doctor',$doc);
    $this->db->where('date_vstr',$this->rotate_date($d1));
    $this->db->where('otkaz',0);
    $query = $this->db->get('vstrechi');  
    return $query->result_array();
	 }

       //получаем список всех операторов сервиса
     function get_all_users() {
        $this->db->where('dostup','on');
		$this->db->where('otdel','Сервис');
        $this->db->where('doljn','Оператор сервиса');
        $this->db->or_where('doljn','Старший оператор');
        $query = $this->db->get('sotrudnik');
        return $query->result_array();  
	 }
     //получаем число назначенных пользователем встреч
         function get_nazn_users($family,$name) {
        $this->db->where('user',$family.' '.$name);
        $query = $this->db->get('vstrechi');
        return $query->result_array();  
	 } 
      //получаем число пройденых пользователем встреч
      function get_proi_users($family,$name) {
        $this->db->where('user',$family.' '.$name);
        $this->db->where('procedura',3);
        $query = $this->db->get('vstrechi');
        return $query->result_array();  
	 } 
      //получаем число откзанныъ пользователем встреч
      function get_otkz_users($family,$name) {
        $this->db->where('user',$family.' '.$name);
        $this->db->where('otkaz',1);
        $query = $this->db->get('vstrechi');
        return $query->result_array();  
	 }
           //получаем число проданных пользователем встреч
      function get_prod_users($family,$name) {
        $this->db->where('user',$family.' '.$name);
        $this->db->where('prodacha',1);
        $query = $this->db->get('vstrechi');
        return $query->result_array();  
	 }
     
     

     /*получение настроек CRM*/
     function get_config() {
        $query = $this->db->get('config');
        return $query->row_array();  
	 }

    //обновляем настройки сайта по имени настройки
     function update_conf($name_conf,$conf_states) 
	 {
        //$this->db->where('id',$name_conf);
        $this->db->set($name_conf,$conf_states);
        $this->db->update('config');
        return TRUE;        
	 }
     
     //сохраняем группу доступа
     function add_admin_group($group_name,$group_desc,$znach) 
	 {
        if($znach=='group')
        {
            $this->db->set('group_name',$group_name);
            $this->db->set('group_desc',$group_desc);
            $query=$this->db->insert('group_assets');
            if($query){return TRUE;}
            else{return FALSE;} 
        }
        if($znach=='otdel')
        {
            $this->db->set('name_otdel',$group_name);
            $this->db->set('desc_otdel',$group_desc);
            $query=$this->db->insert('otdel');
            if($query){return TRUE;}
            else{return FALSE;}
        }
        if($znach=='doljn')
        {
            $this->db->set('name_doljn',$group_name);
            $query=$this->db->insert('doljnosti');
            if($query){return TRUE;}
            else{return FALSE;}
        }
        else{return FALSE;}     
	 }
     //получаем группы доступа
     function get_group_assets($znach) 
	 {
        if($znach=='group')
        {
            $query = $this->db->get('group_assets');
        }
        elseif($znach=='otdel')
        {
            $query = $this->db->get('otdel');
        }
        elseif($znach=='doljn')
        {
            $query = $this->db->get('doljnosti');
        }
        //$query = $this->db->get('group_assets');
        return $query->result_array();          
	 }
     
     
     ///******
     function getLastDayOfMonth($dateInISO8601)
        {
            // Проверяем дату на корректность
            $date = explode('-', $dateInISO8601);
            if ( !checkdate ( $date[1] , $date[2] , $date[0] ) )
                return false;
         
            $start = new DateTime( $dateInISO8601 );
            $end = new DateTime( $dateInISO8601 );
            $end->add( new DateInterval( 'P2M' ) );
            $interval = new DateInterval( 'P1D' );
            $daterange = new DatePeriod($start, $interval, $end);
         
            $prev = $start;
            // Проходимся по периодам, если номер месяца
            // предыдущего периода не совпадает с текущим номером месяца
            // то возвращаем последний день предыдущего месяца
            foreach ($daterange as $date)
            {
                if ($prev->format('m') != $date->format('m') )
                    return  (int) $prev->format('d');
         
                $prev = $date;
            }
         
            return false;
        }

        function add_new_kredit()
        {
        $data = array();
        foreach ($this->rules_lib->edit_kred_klients_rules as $item)
        {
            $fname = $item['field'];
            $data[$fname] = $this->input->post($fname);
        }

            $age = DateTime::createFromFormat('d.m.Y', $data['brichday'])
        ->diff(new DateTime('now'))
        ->y;
 
            $data['vozrast']= $age;
            $data['phone']=$data['sotov'];
            unset($data['sotov']);
            
            
        if($data['brichday']!=''){$data['brichday'] = $this->rotate_date($data['brichday']);}
        if($data['date_vidan']!=''){$data['date_vidan'] = $this->rotate_date($data['date_vidan']);}
            $this->db->insert('klients',$data);
            $query_id=mysql_insert_id();
            
            
        $data_dog = array();
   	    foreach ($this->rules_lib->edit_kred_dog_klients_rules as $item)
        {
            $fname = $item['field'];
            $data_dog[$fname] = $this->input->post($fname);
        }
        if($data_dog['date_dog']!=''){$data_dog['date_dog'] = $this->rotate_date($data_dog['date_dog']);}
        /*$data_dog['date_vstr'] = $date_vstr;
        $data_dog['time_vstr'] = $time_vstr;*/
        $data_dog['id_client']=$query_id;
        $this->db->insert('dogovora',$data_dog);
        $query_id_dog=mysql_insert_id();
        $query=array($query_id,$query_id_dog);
            return $query;
        }
        
        //получаем список пользователей которые онлайн на сайте
        function users_online()
        {
        $this->db->order_by('doljn','desc');
        $query = $this->db->get('session');
        return $query->result_array();
        }
        //удаляем сессию пользователя из бд
        function del_ses_user($id_ses)
        {
        $this->db->where('id_session',$id_ses);
        $query=$this->db->delete('session');
        if($query){return true;}
        else{return FALSE;}
        }
        
        /* чат */
        
       /* function try {
    // получаем id последнего сообщения
    $last_id = isset($_POST['last_id']) ? (int)$_POST['last_id'] : 0;
    
    // текст
    $text = isset($_POST['text']) ? trim($_POST['text']) : '';
    if (!empty($text)) {
        // вставка новой записи
        $sth = $this->db->i$dbh->prepare("INSERT INTO `chat` (`text`) VALUES (:text)");
        $sth->execute(array(':text' => $text));
    }

    // загружаем сообщения, которые были после последнего полученного нами, но не более 20
    $sth = $dbh->prepare("SELECT * FROM `chat` WHERE `id` > :last_id ORDER BY `id` DESC LIMIT 20");
    $sth->bindParam(':last_id', $last_id, PDO::PARAM_INT);
    $sth->execute();
    
    // отдаём массив сообщений в формате JSON
    echo json_encode(array_reverse($sth->fetchall()));
} catch (PDOException $e) {
    echo 'Ошибка подключения: ' . $e->getMessage();
}*/

    //отправка сообщения и запись его в бд
    function send_msg()
    {
        $this->db->set('id_in',$_POST['id_user_in']);
        $this->db->set('user_in',$_POST['user_in']);
        $this->db->set('id_out',$_POST['id_user_out']);
        $this->db->set('user_out',$_POST['user_out']);
        $this->db->set('messeg',$_POST['chat_msg']);
        $this->db->set('date',date("d.m.Y"));
        $this->db->set('time',date("H:i"));
        $this->db->set('mail_ok',0);
        $query = $this->db->insert('mail');
        if($query){return true;}else{return false;}
    }
    //получаем список сообщений не более 15
    function get_mail_user($id_user_in,$id_user_out)
    {
        
        $this->db->where('id_in',$id_user_in);
        $this->db->where('id_out',$id_user_out);
        $this->db->or_where('id_in',$id_user_out);
        $this->db->where('id_out',$id_user_in);
        $this->db->order_by('id','desc');
        $this->db->limit(10);
        $query = $this->db->get('mail');
        return $query->result_array();  
    }
        //получаем список пользователей которые онлайн
    function get_user_list()
    {
        $query=$this->db->get('session');
        return $query->result_array();  
    }
        
     
}