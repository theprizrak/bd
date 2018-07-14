<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Telemarketing extends CI_Controller {
    
	public function index()
	{
	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
       if (isset($_POST['edit_ok'])){
		
		$data['id']=$_POST['id'];
          $this->form_validation->set_rules($this->rules_lib->edit_klients_tel_rules); 
        if ($this->form_validation->run() == TRUE)
        {
		$this->telemarket_model->update_tel_klients($data);
        setcookie ("info", '2',time()+7); // период действия - 7 секунд
        redirect('/telemarketing');
        }
        //если проверка не прошла то снова выводим форму добавления клиента
		else {
		  $this->display_lib_tel->add_klients_view();
		}
		}
        else if (isset($_POST['add_ok'])){
		//проводим проверку формы на правильность заполнения
		$this->form_validation->set_rules($this->rules_lib->add_klients_rules);
        //если проверка прошла, то добавляем клиента в базу
        if ($this->form_validation->run() == TRUE)
        {
		$this->telemarket_model->add_klient();
        setcookie ("info", '1',time()+7); // период действия - 7 секунд
        redirect('/telemarketing');
		}
        //если проверка не прошла то снова выводим форму добавления клиента
		else {
		$this->display_lib_tel->add_klients_view();
		}
	 }
      else {
		 //подключаем постраничную навигация
         include ('pagination.php');
        $config['base_url'] = base_url().'telemarketing/index/';
        $userrrrs=$this->session->userdata('family')." ".$this->session->userdata('name');
        $data = array(
        'klient' => $this->telemarket_model->get_klients_tel($userrrrs,$config['per_page'],$this->uri->segment(3)),
        'plan' => $this->telemarket_model->get_plan_klients($this->session->userdata('family'),$this->session->userdata('name')),
        'newplan' => $this->telemarket_model->get_plan_sotrud($this->session->userdata('family'),$this->session->userdata('name')),
        "info" => "0"
        );

        $config['total_rows'] = count($this->telemarket_model->get_klients_tel_pag($userrrrs));
        $this->pagination->initialize($config);

        $this->display_lib_tel->klients_view($data);
        }
	}
	
	//сохранение встречи и перезвона клиента
	public function save_vstr_przv()
	{
        if(isset($_POST['save_vstr']))
        {
        $data['id']=$_POST['id'];
        $data['date_vstr']=$_POST['date_vstr'];
        if(isset($_POST['time_vstr'])){$data['time_vstr']=$_POST['time_vstr'];}
        if(isset($_POST['type_procedur'])){$data['type_procedur']=$_POST['type_procedur'];}
        $data['office']=$_POST['office'];
        $data['user']=$_POST['user'];
        if(isset($_POST['comments'])){$data['comments']=$_POST['comments'];}
        $data['otkaz']=$_POST['otkaz'];
        $data['prichotkaza']=$_POST['prichotkaza'];
        //$data['user']=$this->session->userdata('family')." ".$this->session->userdata('name');
		$query=$this->telemarket_model->add_vstr($data); 
        if($query=TRUE)
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
        else if(isset($_POST['save_przv']))
        {
        $data['id']=$_POST['id'];
        $data['date_perezvon']=$_POST['date_perezvon'];
        $data['time_perezvon']=$_POST['time_perezvon'];
        $data['tema_perezvon']=$_POST['tema_perezvon'];
        $data['comment_perezvon']=$_POST['comment_perezvon'];
        $data['user']=$this->session->userdata('family')." ".$this->session->userdata('name');
		$query=$this->telemarket_model->add_przv($data); 
        if($query=TRUE)
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
	}

	//добавление клиента
	public function add()
	{
        //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
        $this->display_lib_tel->add_klients_view();
	}
    
    //изменение возраста
	function edit_vozrast()
	{
        if(isset($_POST['safe_ok']) && $_POST['safe_ok']="safe_ok")
        {
            $data['id']=$_POST['id'];
            $data['vozrast']=$_POST['vozrast'];
            $query=$this->telemarket_model->edit_vozrast($data); 
            if($query=TRUE)
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
	}
    //список встреч клиентов
	public function vstr()
	{
        //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
       
		//подключаем постраничную навигация
        include ('pagination.php');
        $config['base_url'] = base_url().'telemarketing/vstr/';
        $userrrrs=$this->session->userdata('family')." ".$this->session->userdata('name');
        $data = array();
        $data['vstrsss']=$this->telemarket_model->get_klients_tel_v($userrrrs,$config['per_page'],$this->uri->segment(3));
        $data['plan']=$this->telemarket_model->get_plan_klients($this->session->userdata('family'),$this->session->userdata('name'));
        $data['newplan']=$this->telemarket_model->get_plan_sotrud($this->session->userdata('family'),$this->session->userdata('name'));
        $data['info']=0;
        $data['info111']=count($this->telemarket_model->get_klients_tel_v_pag($userrrrs));

        $config['total_rows'] = count($this->telemarket_model->get_klients_tel_v_pag($userrrrs));
        $this->pagination->initialize($config);    

		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/klient_view_filt');
		$this->load->view('footer_view');
	}
	//список перезвонов клиентов
	public function przn()
	{
        //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
       
		//подключаем постраничную навигация
        include ('pagination.php');
        $config['base_url'] = base_url().'telemarketing/przn/';
        $userrrrs=$this->session->userdata('family')." ".$this->session->userdata('name');
        $data = array();
        $data['vstrsss']=$this->telemarket_model->get_klients_tel_p($userrrrs,$config['per_page'],$this->uri->segment(3));
        $data['plan']=$this->telemarket_model->get_plan_klients($this->session->userdata('family'),$this->session->userdata('name'));
        $data['newplan']=$this->telemarket_model->get_plan_sotrud($this->session->userdata('family'),$this->session->userdata('name'));
        $data['info']=0;
        $config['total_rows'] = count($this->telemarket_model->get_klients_tel_p_pag($userrrrs));
        $this->pagination->initialize($config);    

		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/klient_view_filt_p');
		$this->load->view('footer_view');
	}
    
	//поиск клиента
	public function find()
	{
        //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
        
	 if (isset($_POST['find_ok'])){
		
		$phone = $_POST['phone'];
		$data = array(
        'klient' => $this->telemarket_model->find_klients_telemarket($phone),
        'plan' => $this->telemarket_model->get_plan_klients($this->session->userdata('family'),$this->session->userdata('name')),
        'newplan' => $this->telemarket_model->get_plan_sotrud($this->session->userdata('family'),$this->session->userdata('name')),
        "info" => "0");
        $this->display_lib_tel->klients_view($data);
	 }
     /*if (isset($_POST['find_fam_ok'])){
		
		$family = $_POST['family'];
		$data = array(
        'klient' => $this->telemarket_model->find_klients_fam_telemarket($family),
        'plan' => $this->telemarket_model->get_plan_klients($this->session->userdata('family'),$this->session->userdata('name')),
        'newplan' => $this->telemarket_model->get_plan_sotrud($this->session->userdata('family'),$this->session->userdata('name')),
        "info" => "0");
        $this->display_lib_tel->klients_view($data);
	 }
	 //Поиск по имени встречи
	 if (isset($_POST['find_name_ok'])){
		
		$name = $_POST['name'];
		$data = array(
        'klient' => $this->telemarket_model->find_klients_name_telemarket($name),
        'plan' => $this->telemarket_model->get_plan_klients($this->session->userdata('family'),$this->session->userdata('name')),
        'newplan' => $this->telemarket_model->get_plan_sotrud($this->session->userdata('family'),$this->session->userdata('name')),
        "info" => "0");
        $this->display_lib_tel->klients_view($data);
	 }*/
     //Поиск по имени и фамилии встречи
	 if (isset($_POST['find_fioname_ok'])){
		
		$name = $_POST['fioname'];
		$data = array(
        'klient' => $this->telemarket_model->find_klients_fioname_telemarket($name),
        'plan' => $this->telemarket_model->get_plan_klients($this->session->userdata('family'),$this->session->userdata('name')),
        'newplan' => $this->telemarket_model->get_plan_sotrud($this->session->userdata('family'),$this->session->userdata('name')),
        "info" => "0");
        $this->display_lib_tel->klients_view($data);
	 }
     if (isset($_POST['sortdate_ok']))
        { 
        //подключаем постраничную навигация
        include ('pagination.php');
        $config['base_url'] = base_url().'telemarketing/sort/';
        $userrrrs=$this->session->userdata('family')." ".$this->session->userdata('name');
        $data = array(
        'klient' => $this->telemarket_model->get_klients_sortdate($config['per_page'],$this->uri->segment(3),$userrrrs),
        'plan' => $this->telemarket_model->get_plan_klients($this->session->userdata('family'),$this->session->userdata('name')),
        'newplan' => $this->telemarket_model->get_plan_sotrud($this->session->userdata('family'),$this->session->userdata('name')),
        "info" => "0"
        );

        $config['total_rows'] = count($this->telemarket_model->get_klients_sortdate_pag($userrrrs));
         $this->pagination->initialize($config);   
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
         if($_POST['type_sort']=='vstr'){
		$this->load->view('telemarket/klients_view_sordate');
         }else {
		$this->load->view('telemarket/klients_view_sordate_prvn');
         }
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
		$data = $this->telemarket_model->edit_klients($id);
        $data['kosmet']=$this->telemarket_model->get_kosmet();
        //$data['klientss_vstr'] = $this->telemarket_model->get_klients_vstr_tel($id);
        $data['klientss_zvon'] = $this->telemarket_model->get_klients_zvon_tel($id);
        // $kosmetologi = array('kosmet' => $this->user_model->get_kosmet());
		$this->display_lib_tel->edit_klients_view($data);
		}
		else {
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('telemarket/klients_view');
		$this->load->view('footer_view');
		}
		
	 }
     // аякс функция на проверку совпадения номера в базе
     function no_number()
     {
        if ($_POST['nonumber'])
        {
            
        $query=$this->user_model->no_number($_POST['number']);
        if(!empty($query))
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
     }
 //сохраняем встречу после редактирования на подтверждалке
	public function safe_ok()
	{     
	 if (isset($_POST['safe_ok']) && $_POST['safe_ok']=='safe_ok'){
		
        $query=$this->telemarket_model->update_safe_ok($_POST['id'],$_POST['id_client'],$_POST['dd'],$_POST['tt'],$_POST['uu'],$_POST['tpr']);
        if($query==TRUE)
        {
            $status=0;
        }
        else
        {
            $status=1;
        }
	 }
	 if (isset($_POST['otkz_ok']) && $_POST['otkz_ok']=='otkz_ok'){
		
        $query=$this->telemarket_model->del_vstr_tm($_POST['id'],$_POST['otkaz']);
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

function safe_vstr()
    {
	 if (isset($_POST['otkz_ok']) && $_POST['otkz_ok']=='otkz_ok'){
		
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

}