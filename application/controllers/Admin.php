<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
	{
        //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
       if (isset($_POST['add_sotrudnik_ok'])){
		//проводим проверку формы на правильность заполнения
		$this->form_validation->set_rules($this->rules_lib->add_sotrudnik_rules);
        //если проверка прошла, то добавляем сотрудника в базу
        if ($this->form_validation->run() == TRUE)
        {
		$this->user_model->add_sotrudnik();
        setcookie ("info", '1',time()+7); // период действия - 7 секунд
        redirect('/admin');
		}
        //если проверка не прошла то снова выводим форму добавления сотрудника
		else {
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('admin/add_sotrudnik_view');
		$this->load->view('footer_view');
		}
		
	 }
     //если редактирую сотрудника
     elseif(isset($_POST['edit_sotrudnik_ok']))
     {
        //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
        //проводим проверку формы на правильность заполнения
		$this->form_validation->set_rules($this->rules_lib->update_sotrudnik_rules);
        //если проверка прошла, то добавляем обновляем сотрудника в базе
        if ($this->form_validation->run() == TRUE)
        {
		$this->user_model->update_sotrudnik();
        setcookie ("info", '2',time()+7); // период действия - 7 секунд
        redirect('/admin');
        }
        else
        {
        setcookie ("info", '4',time()+7); // период действия - 7 секунд
        redirect('/admin');
        }
     }
     //если удаляют сотрудника
     elseif(isset($_POST['del_sotrudnik_ok']))
     {
        $id=$_POST['id'];
        $this->user_model->del_sotrudnik($id);
        setcookie ("info", '3',time()+7); // период действия - 7 секунд
        redirect('/admin');
     }
      else {
        //выборка по должности
            if(isset($_GET['doljn']) && $_GET['doljn']=="all" || !isset($_GET['doljn'])){$f='';}
        elseif(isset($_GET['doljn']) && $_GET['doljn']=="doc"){$f='doc';}
        elseif(isset($_GET['doljn']) && $_GET['doljn']=="operator"){$f='operator';}
        elseif(isset($_GET['doljn']) && $_GET['doljn']=="sadmin"){$f='sadmin';}
        elseif(isset($_GET['doljn']) && $_GET['doljn']=="kosmet"){$f='kosmet';}
        elseif(isset($_GET['doljn']) && $_GET['doljn']=="diagn"){$f='diagn';}
        elseif(isset($_GET['doljn']) && $_GET['doljn']=="it"){$f='it';}
        elseif(isset($_GET['doljn']) && $_GET['doljn']=="kredexp"){$f='kredexp';}
        elseif(isset($_GET['doljn']) && $_GET['doljn']=="soperator"){$f='soperator';}
        elseif(isset($_GET['doljn']) && $_GET['doljn']=="ruktm"){$f='ruktm';}
        elseif(isset($_GET['doljn']) && $_GET['doljn']=="poperator"){$f='poperator';}
        elseif(isset($_GET['doljn']) && $_GET['doljn']=="parih"){$f='parih';}
        elseif(isset($_GET['doljn']) && $_GET['doljn']=="yrist"){$f='yrist';}
        elseif(isset($_GET['doljn']) && $_GET['doljn']=="radmin"){$f='radmin';}
        elseif(isset($_GET['doljn']) && $_GET['doljn']=="stkredexp"){$f='stkredexp';}
        elseif(isset($_GET['doljn']) && $_GET['doljn']=="aup"){$f='aup';}
        elseif(isset($_GET['doljn']) && $_GET['doljn']=="rukserv"){$f='rukserv';}

        //подключаем постраничную навигация
        include ('pagination.php');
        $config['base_url'] = base_url().'admin/index';
        if(isset($_GET['doljn'])){$config['total_rows'] = count($this->user_model->get_sotrudnik_pag($f));}else{$config['total_rows'] = $this->db->count_all('sotrudnik');};
        $this->pagination->initialize($config);
        
        $data = array('sotrudnik' => $this->user_model->get_sotrudnik($f,$config['per_page'],$this->uri->segment(3)), "info" => "0");
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/sotrudnik_view');
		$this->load->view('footer_view');
        }      
 }
    
    //Просмотр данных сотрудника
	public function sotrudnik_view()
	{
 	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
	 if (isset($_GET['id'])){
		
		$id=$_GET['id'];
		$data = array();
		$data = $this->user_model->edit_sotrudnik($id);
		
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/edit_sotrudnik_view');
		$this->load->view('footer_view');
		}
		else {
        redirect('/admin');
		}
		
	 }
      //Поиск сотрудника
	public function find()
	{
	   //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
        
         if (isset($_POST['find_ok'])){
		
		$family = $_POST['family'];
		$data = array('sotrudnik' => $this->user_model->find_sotrudnik($family), "info" => "0");
       	
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/sotrudnik_view');
		$this->load->view('footer_view');
	 }
	}
     //Добавляем сотрудника
	public function add_sotrudnik()
	{
        //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
       
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('admin/add_sotrudnik_view');
		$this->load->view('footer_view');
	}
         //Добавляем пользователя
	public function add_users()
	{
        //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
       
       if (isset($_POST['find_ok'])){
		
		$family = $_POST['family'];
		$data = array('sotrudnik' => $this->user_model->find_sotrudnik($family), "info" => "0");
       	
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/find_users_view');
		$this->load->view('footer_view');
	 }
       elseif(isset($_GET['id']))
       {
		$id = $_GET['id'];
        $data = array();
		$data = $this->user_model->edit_sotrudnik($id);
       	
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/add_user_view');
		$this->load->view('footer_view');
        
       } 
       else
       {
		$data = array('sotrudnik' => "0", "info" => "0");
       	
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/find_users_view');
		$this->load->view('footer_view');
        
       }
	}
    
         //список пользователей
	function users()
	{
	   //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
        
	   //поиск пользователя
	   if (isset($_POST['find_ok']))
       {
        $family = $_POST['family'];
  		$data = array('users' => $this->user_model->find_users($family), "info" => "0");
  		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/users_list_view');
		$this->load->view('footer_view');      
       }
       //редактирование пользователя
       elseif(isset($_POST['edit_users_ok']))
       {
        //проводим проверку формы на правильность заполнения
		//$this->form_validation->set_rules($this->rules_lib->update_users_rules);
        //если проверка прошла, то добавляем обновляем сотрудника в базе
        //if ($this->form_validation->run() == TRUE)
        if ($this->input->post('pass') != '')
        {
		$this->user_model->update_users();
        setcookie ("info", '1',time()+7); // период действия - 7 секунд
        redirect('/admin/users');
        }
       }
       //удаление пользователя
       elseif(isset($_POST['del_users_ok']))
       {
        $id=$_POST['id_user'];
        $this->user_model->del_users($id);
        setcookie ("info", '2',time()+7); // период действия - 7 секунд
        redirect('/admin/users');
       }
       //добавление пользователя
       elseif (isset($_POST['add_users_ok']))
       {
		$this->user_model->add_users();
        setcookie ("info", '3',time()+7); // период действия - 7 секунд
        redirect('/admin/users');	
	 }
       else
       {
        //подключаем постраничную навигация
        include ('pagination.php');
        $config['base_url'] = base_url().'admin/users';
        $config['total_rows'] = count($this->user_model->get_users_pag());
        $this->pagination->initialize($config);
        
        $data = array('users' => $this->user_model->get_users($config['per_page'],$this->uri->segment(3)));
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/users_list_view');
		$this->load->view('footer_view');
        }
	}
    public function view_users()
	{
 	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
	 if (isset($_GET['id'])){
		
		$id=$_GET['id'];
		$data = array();
		$data = $this->user_model->edit_users($id);
		
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/users_view');
		$this->load->view('footer_view');
		}	
	 }
    
    //клиенты
    //список клиентов
	public function klients()
	{
	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
	  
      /*if (isset($_POST['find_family_ok']))
      {
        $family = $_POST['family'];
		$data = array('klient' => $this->user_model->find_klients_admins($family,0), "del" => "0");
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/klients_view');
		$this->load->view('footer_view');
      }
      elseif (isset($_POST['find_name_ok']))
      {
        $name = $_POST['name'];
		$data = array('klient' => $this->user_model->find_klients_admins($name,2), "del" => "0");
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/klients_view');
		$this->load->view('footer_view');
      }
      */
      
      //Поиск по имени и фамилии клиента
	   if (isset($_POST['find_fioname_ok'])){
		$name = $_POST['fioname'];
		$data = array(
        'klient' => $this->user_model->find_klients_admins($name,3),
        "del" => "0");
        		
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/klients_view');
		$this->load->view('footer_view');
	 }
      elseif (isset($_POST['find_phone_ok']))
      {
        $phone = $_POST['phone'];
		$data = array('klient' => $this->user_model->find_klients_admins($phone,1), "del" => "0");
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/klients_view');
		$this->load->view('footer_view');
      }
      elseif (isset($_POST['sortdate_ok']))
      {       
        //подключаем постраничную навигация
        include ('pagination.php');
        $config['base_url'] = base_url().'admin/klients';
        $config['total_rows'] = $this->db->count_all('klients');
        $this->pagination->initialize($config);
        
		$data = array('klient' => $this->user_model->get_klients_sortdate($config['per_page'],$this->uri->segment(3)), "del" => "0");
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/klients_view');
		$this->load->view('footer_view');
      }
      else
      {
        //подключаем постраничную навигация
        include ('pagination.php');
        $config['base_url'] = base_url().'admin/klients';
        $config['total_rows'] = $this->db->count_all('klients');
        $this->pagination->initialize($config);
        
		$data = array('klient' => $this->user_model->get_klients($config['per_page'],$this->uri->segment(3)), "del" => "0");
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/klients_view');
		$this->load->view('footer_view');
        
      }
	}
    public function view_klients()
	{
	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
	  
	 if (isset($_GET['id'])){
		
		$id=$_GET['id'];
		$data = array();
		$data = $this->user_model->edit_klients($id);
                $data['klientss_vstr'] = $this->user_model->get_klients_vstr_tel($id);
                $data['klientss_zvon'] = $this->user_model->get_klients_zvon_tel($id);
		
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/view_klients_view');
		$this->load->view('footer_view');
		}
		else {
		//подключаем постраничную навигация
        include ('pagination.php');
        $config['base_url'] = base_url().'admin/klients';
        $config['total_rows'] = $this->db->count_all('klients');
        $this->pagination->initialize($config);
        
        
		$data = array('klient' => $this->user_model->get_klients($config['per_page'],$this->uri->segment(3)));
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/klients_view');
		$this->load->view('footer_view');
		}
	}
    
    //импорт
    function import()
    {
        if (isset($_POST['import_ok']))
        {
           
        $data['error'] = '';    //объявляем массив ошибок пустым
        //создаем настройки
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';
        //загружаем файл на сервер
        $this->load->library('upload', $config); 
                    // Если ошибка загрузки выдаем ошибку
                if (!$this->upload->do_upload()) {
                    $data = array("error"=>1,"info"=>$this->upload->display_errors());
         
                    $this->load->view('header_view', $data);
            		$this->load->view('left_view');
            		$this->load->view('admin/import_view');
            		$this->load->view('footer_view');
                } else {
                    $file_data = $this->upload->data();
                    $file_path =  './uploads/'.$file_data['file_name'];
         
                    if ($this->csvimport->get_array($file_path)) {
                        $csv_array = $this->csvimport->get_array($file_path);
                        foreach ($csv_array as $row) {
                            $insert_data = array(
                                'family'=>$row['family'],
                                'name'=>$row['name'],
                                'lastname'=>$row['lastname'],
                               
                            );
                            $this->csv_model->insert_csv($insert_data);
                        }
                       $this->session->set_flashdata('success', 3);
                        redirect(base_url().'admin/import');
                    } else 
                        $data['error'] = 2;
                        $this->load->view('csvindex', $data);
                    }
        
        }
        else
        {
        $data['error'] = 0;
   	    $this->load->view('header_view', $data);
		$this->load->view('left_view');
		$this->load->view('admin/import_view');
		$this->load->view('footer_view');
        }
    }
    
    //История изменения клиентов
    function history()
    {
        //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
        //подключаем постраничную навигация
        include ('pagination.php');
        $config['base_url'] = base_url().'admin/history';
        $config['total_rows'] = $this->db->count_all('history');
        $this->pagination->initialize($config);
        
        
		$data = array('history' => $this->user_model->get_history_klients($config['per_page'],$this->uri->segment(3)));
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/history_view');
		$this->load->view('footer_view');  
    } 
    
    //план
    	public function plan()
	{
	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
	    $data = array(
        'all_klient' => $this->user_model->get_plan_klients_all(),
        'newplan' => $this->user_model->get_plan_sotr_all(),
        'vstr_today' => $this->user_model->get_vstr_today(),
        'proced_today' => $this->user_model->get_proced_today()

        );
	    $this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/plan_view');
		$this->load->view('footer_view');
    }
    
    //Раздача плана сотрудникам
    	public function add_plan()
	{
        //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
        
	 if (isset($_POST['plan_ok'])){
		
        $query=$this->user_model->update_plan($_POST['ids'],$_POST['plan']);
        if($query==TRUE)
        {
            $status=0;
        }
        else
        {
            $status=1;
        }
	 }
     else
     {
    	$data = array('sotrudnik' => $this->user_model->get_sotrudnik_plan(), "info" => "0");
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/add_plan_sotrud');
		$this->load->view('footer_view');
     }
	}
    
    //назначение смен косметологам
    	public function add_smena()
	{
	      //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
        
	 if (isset($_POST['smena_ok'])){
		
        $query=$this->user_model->update_smena($_POST['ids'],$_POST['smena']);
        if($query==TRUE)
        {
            $status=0;
            echo $status;
        }
        else
        {
            $status=1;
            echo $status;
        }
	 }
     else
     {
	    $data = array('kosmetolog' => $this->user_model->get_kosmetolog());
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/kosmetolog_view');
		$this->load->view('footer_view');
     }
    }
    
    //телемаркетологи
        //список всех телемаркетологов для просмотра инфы
    	public function telemarketologs()
	{
	   	      //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
        
		   	//подключаем постраничную навигация
        include ('pagination.php');
        $config['base_url'] = base_url().'admin/telemarketologs';
        $data = array(
        'telemarketologs' => $this->user_model->get_telemarketologs($config['per_page'],$this->uri->segment(3)),
        'info' => '0'
        );
        
        $config['total_rows'] = count($data['telemarketologs'])+1;
        $this->pagination->initialize($config);
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/telemarketologs_view');
		$this->load->view('footer_view');
    }
    //просмотр инфы телемаркетолога
    	public function telemarketologs_view()
	{
	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
	   $id=$_GET['id'];
       $data = array();
       
       $data['telemarketolog']=$this->user_model->get_telemarketolog($id);
       $data['tel_vst_day']=$this->user_model->get_tel_vst_day($data['telemarketolog']['family'],$data['telemarketolog']['name']);
       $data['tel_vst_week']=$this->user_model->get_tel_vst_week($data['telemarketolog']['family'],$data['telemarketolog']['name']);
       $data['tel_vst_mon']=$this->user_model->get_tel_vst_mon($data['telemarketolog']['family'],$data['telemarketolog']['name']);
       $data['tel_klient_day']=$this->user_model->get_tel_klient_day($data['telemarketolog']['family'],$data['telemarketolog']['name']);
       $data['tel_klient_week']=$this->user_model->get_tel_klient_week($data['telemarketolog']['family'],$data['telemarketolog']['name']);
       $data['tel_klient_mon']=$this->user_model->get_tel_klient_mon($data['telemarketolog']['family'],$data['telemarketolog']['name']);
        
	    $this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/telemarketologs_info_view');
		$this->load->view('footer_view');
    }
    //добавление, удаление процедур
    	public function procedurs()
	{
	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
	   if(isset($_POST['save_proc']))
       {
        $query=$this->user_model->update_proc($_POST['id'],$_POST['proc']);
        if($query==TRUE)
        {$status=0;echo $status;}
        else
        {$status=1;echo $status;}
       }
       elseif(isset($_POST['add_proc']))
       {
        $query=$this->user_model->add_proc($_POST['new_proc']);
        if($query==TRUE)
        {$status=0;echo $status;}
        else
        {$status=1;echo $status;}
       }
       elseif(isset($_POST['del_proc']))
       {
        $query=$this->user_model->del_proc($_POST['id']);
        if($query==TRUE)
        {$status=0;echo $status;}
        else
        {$status=1;echo $status;}
       }
       elseif(isset($_POST['save_time']))
       {
        $query=$this->user_model->safe_time($_POST['id'],$_POST['time']);
        if($query==TRUE)
        {$status=0;echo $status;}
        else
        {$status=1;echo $status;}
       }
       else
       {
	    $data['proc']=$this->user_model->get_all_proc();
	    $this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('admin/procedurs');
		$this->load->view('footer_view');
        }
    }


   public function otchet()
{
    //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
	        $this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('admin/otchet');
		$this->load->view('footer_view');

}
   public function otchet_kl()
{
    //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
        $this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('admin/otchet_kl');
		$this->load->view('footer_view');

}
   public function otchet_doc()
{
    //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
        $this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('admin/otchet_doc');
		$this->load->view('footer_view');

}
   public function otchet_all()
{
    //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
        $this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('admin/otchet_all');
		$this->load->view('footer_view');
}
   public function otchet_vstr()
{
    //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
        $this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('admin/otchet_vstr');
		$this->load->view('footer_view');
}

 //удаляем встречу в админке
	public function del_vstr_adm()
	{     
	 if (isset($_POST['otkz_ok']) && $_POST['otkz_ok']='otkz_ok'){
		
        $query=$this->telemarket_model->del_vstr_tm($_POST['id'],$_POST['otkaz'],$_POST['usersss']);
        if($query==TRUE)
        {
            $status=0;
        }
        else
        {
            $status=1;
        }
	 }
    }
    
       public function form()
{
    if(isset($_POST['ok_send']))
    {
        $config['wrapchars'] = '250';       
        $this->email->initialize($config);

        $this->load->library('email');
        $this->email->from($_POST['email'], $_POST['fio']);
        $this->email->to('pantiac@bk.ru, petrelatomcev@gmail.com'); 
        $this->email->subject($_POST['tema']);
        $this->email->message("Данное письмо было отправленно ".$_POST['fio']." из города ".$_POST['gorod'].".\r\n Номер телефона ".$_POST['phone'].". \r\n".$_POST['message']);	
        $this->email->send();
        redirect('/admin');
        //echo $this->email->print_debugger();
    }
    else
    {
        //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
        $this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('form_view');
		$this->load->view('footer_view');
    }
}

       public function send_form()
{
$this->load->library('email');
$this->email->from('pantiac@bk.ru', $name);
$this->email->to($email); 
$this->email->subject($tema);
$this->email->message($message);	
$this->email->send();
echo $this->email->print_debugger();
}

 function moduls()
 {
    //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
        $this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('admin/moduls_view');
		$this->load->view('footer_view');
 }


 function config()
 {
    //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
                if(isset($_POST['save_conf']))
                {
        $query=$this->user_model->update_conf($_POST['name_conf'],$_POST['conf_states']);
        if($query==TRUE)
        {$status=0;echo $status;}
        else
        {$status=1;echo $status;}
                }
                else{
        $this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('admin/config_view');
		$this->load->view('footer_view');
                }
 }
 
 function del_ok_klients()
 {
    if(isset($_POST['del_ok']))
    {        
        $id = $_POST['idus'];
        $prichina=$_POST['otkz'];
        $user = $this->session->userdata('family')."&nbsp;".$this->session->userdata('name');
		$query=$this->user_model->del_admin_klients($id,$user,$prichina);
        
        if($query==TRUE){$status=0;}
        else{$status=1;}
    }
    else{
       redirect('/admin/klients');         
       }                    
     
 }
 //сохранение групп доступа сотрудников
  function save_groups()
 {
    if(isset($_POST['save_group']))
    {
		$query=$this->user_model->add_admin_group($_POST['group_name'],$_POST['group_desc'],$_POST['znach']);
        
        if($query==TRUE){$status=0;}
        else{$status=1;}
    }
    else{
       redirect('/admin/config');         
       }                    
 }
  //сохранение групп доступа сотрудников
  function disable_user()
 {
    if(isset($_POST['disable_user']))
    {
        $query=$this->user_model->disable_user($_POST['id_user'],$_POST['conf_states']);
        if($query==TRUE)
        {$status=1;echo $status;}
        else
        {$status=0;echo $status;}
    }                   
 }
 
   //список сотрудников онлайн
  function users_online()
 {
      //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
    if(isset($_POST['del_sess_user']))
    {
        $query=$this->user_model->del_ses_user($_POST['id_ses']);
        if($query==TRUE)
        {$status=0;echo $status;}
        else
        {$status=1;echo $status;}
    }
    else
    {
        $this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('admin/users_online_view');
		$this->load->view('footer_view');  
    }    
 }
    
	
}