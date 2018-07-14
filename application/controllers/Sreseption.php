<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sreseption extends CI_Controller {

    

	public function index()
	{
 	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
		if (isset($_POST['edit_ok'])){
		
		$data['id']=$_POST['id'];
        //$data['date']=$_POST['date_vstr'];
          $this->form_validation->set_rules($this->rules_lib->serv_add_klients_rules); 
        if ($this->form_validation->run() == TRUE)
        {
		$query=$this->user_model->save_klient_sresep($data);
        if(!$query)
        {
            $status=1;
            echo $status;
        }
        else
        {   
            $status=0;
            echo $status;
        }
        }
        else{$status=2;echo $status;}
		}
         else if (isset($_POST['add_ok'])){
            
		//проводим проверку формы на правильность заполнения
		$this->form_validation->set_rules($this->rules_lib->serv_add_klients_rules);
        //если проверка прошла, то добавляем клиента в базу
        if ($this->form_validation->run() == TRUE)
        {
		$this->stelemarket_model->serv_add_klient();
        setcookie ("info", '1',time()+7); // период действия - 7 секунд
        redirect('/sreseption');
		}
        //если проверка не прошла то снова выводим форму добавления клиента
		else {
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('sreseption/klients_view');
		$this->load->view('footer_view');
		}
		
	 }
		else 
		{
        //подключаем постраничную навигация
        include ('pagination.php');
        $data = array(
        'klient_vstr' =>$this->stelemarket_model->get_klients_vstr_resep1($config['per_page'],$this->uri->segment(3)),
        'info' => '0'
        );
        $config['base_url'] = base_url().'sreseption/index/';
        $config['total_rows'] = count($this->stelemarket_model->get_klients_vstr_resep_pag());
        //$config['total_rows'] = $this->db->count_all('klients');
        $this->pagination->initialize($config);
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('sreseption/klients_view');
		$this->load->view('footer_view');
		}
	}
	
	//редактирование клиента
	public function edit()
	{
 	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
	 if (isset($_GET['id'])){
		
		$id=$_GET['id'];
		$data = array();
		$data = $this->user_model->edit_klients($id);
        $data['doctor']=$this->stelemarket_model->get_doctor();
        $data['klients_recom'] = $this->doctor_model->get_klients_recom($id);
        //$data['klientss_vstr'] = $this->stelemarket_model->get_klients_vstr_tel($id);
        $data['info']='0';
		
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('sreseption/edit_klients_view');
		$this->load->view('footer_view');
		}
		else {
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('sreseption/klients_view');
		$this->load->view('footer_view');
		}
		
	 }
	
       //поиск клиента
	public function find()
	{
 	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
	 /*if (isset($_POST['find_ok'])){
		if(isset($_POST['family']) && $_POST['family']!='')
        {
        $i=0;
		$family = $_POST['family'];  
        }
        elseif(isset($_POST['name']) && $_POST['name']!='')
        {
        $i=2;
		$family = $_POST['name'];  
        }
		$data = array('klient' => $this->user_model->find_klients_kredit($family,$i),
        'info' => '0');
		
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('sreseption/find_klients_view');
		$this->load->view('footer_view');
	 }*/
     if (isset($_POST['find_fioname_ok'])){
		$i=3;
		$family = $_POST['fioname'];
		$data = array(
        'klient' => $this->user_model->find_klients_kredit($family,$i),
        "info" => "0");
        		
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('sreseption/find_klients_view');
		$this->load->view('footer_view');
	 }
     if (isset($_POST['find_tel_ok'])){
		$i=1;
		$family = $_POST['phone'];
		$data = array('klient' => $this->user_model->find_klients_kredit($family,$i),
        'info' => '0');
		
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('sreseption/find_klients_view');
		$this->load->view('footer_view');
	 }
        if (isset($_POST['sortdate_ok']))
        {
        //подключаем постраничную навигация
        include ('pagination.php');
        $userrrrs=$this->session->userdata('family')." ".$this->session->userdata('name');
        $data = array(
        'klient' => $this->stelemarket_model->get_klients_sortdate_sresep($config['per_page'],$this->uri->segment(3),$userrrrs),
        "info" => "0"
        );
        $config['base_url'] = base_url().'sreseption/index/';
        $config['total_rows'] = count($this->stelemarket_model->get_klients_sortdate_pag($userrrrs));/*$this->db->count_all('klients');*/
        $this->pagination->initialize($config);

		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('sreseption/klients_view_sordate');
		$this->load->view('footer_view');
        }
     
	}

    public function karta()
	{
		$this->load->view('header_view');
		$this->load->view('sreseption/karta');
	}
    public function klient_today()
	{
		$this->load->view('header_view');
		$this->load->view('sreseption/karta_all');
	}
    

      	//добавление клиента
    public function add()
	{
        //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
       
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('sreseption/add_klients_view');
		$this->load->view('footer_view');
	}

 //добавление, удаление процедур
    	public function procedurs()
	{
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
       else
       {
	    $data['proc']=$this->user_model->get_all_proc();
	    $this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('sreseption/procedurs');
		$this->load->view('footer_view');
        }
    }
    
    function add_doctor()
    {
        //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
       
       if(isset($_POST['add_ok']))
       {
        //проводим проверку формы на правильность заполнения
		$this->form_validation->set_rules($this->rules_lib->add_doctor_rules);
        //если проверка прошла, то добавляем клиента в базу
        if ($this->form_validation->run() == TRUE)
        {
		$this->stelemarket_model->add_doctor_sresep();
        
        $data['okays']=1;
        $this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('sreseption/add_doctor_view');
		$this->load->view('footer_view');
        }
       }
       else
        {
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('sreseption/add_doctor_view');
		$this->load->view('footer_view');
        }
    }
    
    function safe_vstr()
    {
       if(isset($_POST['safe_vstr']))
       {
        $query=$this->stelemarket_model->safe_vstr($_POST['id_proc'],$_POST['date_vstr'],$_POST['time_vstr'],$_POST['klient_go'],$_POST['procedura'],$_POST['doctor']);
        if($query==TRUE)
        {$status=0;echo $status;}
        else
        {$status=1;echo $status;}
       }
       if(isset($_POST['safe_sresep']))
       {
        $query=$this->stelemarket_model->save_klient_sresep($_POST['id']);
        if($query==TRUE)
        {$status=0;echo $status;}
        else
        {$status=1;echo $status;}
       }
	 if (isset($_POST['otkz_ok']) && $_POST['otkz_ok']='otkz_ok'){
		
        $query=$this->stelemarket_model->update_otkz($_POST['id'],$_POST['otkaz']);
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
    
    function add_vstr()
    {
       if(isset($_POST['add_vstr']))
       {
        $query=$this->stelemarket_model->add_vstr($_POST['id_client'],$_POST['date_vstr'],$_POST['time_vstr'],$_POST['sproc'],$_POST['user'],$_POST['doctor']);
        if($query==TRUE)
        {$status=0;echo $status;}
        else
        {$status=1;echo $status;}
       }
    }
    
    function get_time()
     {
        if ($_POST['get_time'])
        {
        $query=$this->stelemarket_model->get_time($_POST['date_vstr'],$_POST['doctor']);
        if(!empty($query))
        {
            echo json_encode($query);
        }
        else
        {
        $status=1;
        echo $status; 
        }  
        }
     }

 function doc_print()
{
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('sreseption/test');
		$this->load->view('footer_view');
}
 
 }