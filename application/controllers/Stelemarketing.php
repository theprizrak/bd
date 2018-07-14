<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stelemarketing extends CI_Controller {
    
	public function index()
	{
	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
       if (isset($_POST['edit_ok'])){
		
		$data['id']=$_POST['id'];
          $this->form_validation->set_rules($this->rules_lib->edit_klients_serv_tel_rules); 
        if ($this->form_validation->run() == TRUE)
        {
        $data['user']=$this->session->userdata('family')." ".$this->session->userdata('name');
	    $this->stelemarket_model->update_serv_tel_klients($data);
        setcookie ("info", '2',time()+7); // период действия - 7 секунд
        redirect('/stelemarketing');
        }
        //если проверка не прошла то снова выводим форму добавления клиента
		else {
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('telemarket/s/add_klients_view');
		$this->load->view('footer_view');
		}
		}
        else if (isset($_POST['add_ok'])){
            
		//проводим проверку формы на правильность заполнения
		$this->form_validation->set_rules($this->rules_lib->serv_add_klients_rules);
        //если проверка прошла, то добавляем клиента в базу
        if ($this->form_validation->run() == TRUE)
        {
		$this->stelemarket_model->serv_add_klient();
        setcookie ("info", '1',time()+7); // период действия - 7 секунд
        redirect('/stelemarketing');
		}
		
	 }
      else {
		 //подключаем постраничную навигация
         include ('pagination.php');
        $config['base_url'] = base_url().'stelemarketing/index/';
        $userrrrs=$this->session->userdata('family')." ".$this->session->userdata('name');
        $data = array(
        'klient' => $this->stelemarket_model->get_klients_serv_tel($userrrrs,$config['per_page'],$this->uri->segment(3)),
        "info" => "0"
        );
        $config['total_rows'] = count($this->stelemarket_model->get_klients_serv_tel_user($userrrrs));
        $this->pagination->initialize($config);
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/s/klients_view');
		$this->load->view('footer_view');
        }
	}
	
	//добавление клиента
	public function add()
	{
        //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
       
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('telemarket/s/add_klients_view');
		$this->load->view('footer_view');
	}
    //список встреч клиентов
	public function vstr()
	{
        //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
       
		//подключаем постраничную навигация
        include ('pagination.php');
        $config['base_url'] = base_url().'stelemarketing/index/';
        $config['total_rows'] = $this->db->count_all('klients');
        $this->pagination->initialize($config);
                
        $userrrrs=$this->session->userdata('family')." ".$this->session->userdata('name');
        $data = array();
        $data['vstrsss']=$this->stelemarket_model->get_klients_tel_v($userrrrs);  
        $data['info']=0;

		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/s/klient_view_filt');
		$this->load->view('footer_view');
	}
	//список перезвонов клиентов
	public function przn()
	{
        //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
       
		//подключаем постраничную навигация
        include ('pagination.php');
        $config['base_url'] = base_url().'stelemarketing/index/';
        $config['total_rows'] = $this->db->count_all('klients');
        $this->pagination->initialize($config);
                
        $userrrrs=$this->session->userdata('family')." ".$this->session->userdata('name');
        $data = array();
        $data['vstrsss']=$this->stelemarket_model->get_klients_tel_p($userrrrs);
        $data['info']=0;

		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/s/klient_view_filt_p');
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
        'klient' => $this->stelemarket_model->find_klients_stelemarket($phone),
        "info" => "0");
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/s/klients_view');
		$this->load->view('footer_view');
	 }
     /*if (isset($_POST['find_fam_ok'])){
		
		$family = $_POST['family'];
		$data = array(
        'klient' => $this->stelemarket_model->find_klients_fam_stelemarket($family),
        "info" => "0");
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/s/klients_view');
		$this->load->view('footer_view');
	 }
	 //Поиск по имени встречи
	 if (isset($_POST['find_name_ok'])){
		
		$name = $_POST['name'];
		$data = array(
        'klient' => $this->stelemarket_model->find_klients_name_stelemarket($name),
        "info" => "0");
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/s/klients_view');
		$this->load->view('footer_view');
	 }*/
          //Поиск по имени и фамилии встречи
	 if (isset($_POST['find_fioname_ok'])){
		
		$name = $_POST['fioname'];
		$data = array(
        'klient' => $this->stelemarket_model->find_klients_fioname_stelemarket($name),
        "info" => "0");
        $this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/s/klients_view');
		$this->load->view('footer_view');
	 }
	 //Конец поиска по дате встречи
	 //Поиск по fio
	 if (isset($_POST['find_otch_ok'])){
		
		$otch = $_POST['otch'];
		$data = array(
        'klient' => $this->user_model->find_klients_otch_stelemarket($otch),
        "info" => "0");
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/s/klients_view');
		$this->load->view('footer_view');
	 }
     if (isset($_POST['sortdate_ok']))
        {
        //подключаем постраничную навигация
        $config['base_url'] = base_url().'stelemarketing/index/';
        $config['per_page'] = '50'; 
        $config['full_tag_open'] = "<p id='pagination'>";
        $config['full_tag_close'] = '</p>';
        $config['next_link'] = 'Далее';
        $config['prev_link'] = 'Назад';
        $config['first_link'] = 'Первая';
        $config['last_link'] = 'Последняя';
        $userrrrs=$this->session->userdata('family')." ".$this->session->userdata('name');
        $data = array(
        'klient' => $this->stelemarket_model->get_klients_sortdate($config['per_page'],$this->uri->segment(3),$userrrrs),
        "info" => "0"
        );
        
        $config['total_rows'] = count($this->stelemarket_model->get_klients_serv_tel_user($userrrrs));
        $this->pagination->initialize($config);


		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/s/klients_view_sordate');
		$this->load->view('footer_view');
        }
	 //Конец поиска по дате встречи
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
        $data['kosmet']=$this->user_model->get_kosmet();
        $data['klients_recom'] = $this->doctor_model->get_klients_recom($id);
        //$data['klientss_vstr'] = $this->stelemarket_model->get_klients_vstr_tel($id);
        $data['klientss_zvon'] = $this->stelemarket_model->get_klients_zvon_tel($id);
       // $kosmetologi = array('kosmet' => $this->user_model->get_kosmet());
		
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/s/edit_klients_view');
		$this->load->view('footer_view');
		}
		else {
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('telemarket/s/klients_view');
		$this->load->view('footer_view');
		}
		
	 }
     
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
     
     //сохранение встречи клиента
	public function save_svstr()
	{
        if(isset($_POST['save_svstr']))
        {
        if(!isset($_POST['otkz_vstr']))
        {
        $data['id']=$_POST['id'];
        $data['date_vstr']=$_POST['date_vstr'];
        $data['time_vstr']=$_POST['time_vstr'];
        $data['sproc']=$_POST['sproc'];
        $data['user']=$_POST['user'];
        $data['doctor']=$_POST['doctor'];
        $data['otkaz']=$_POST['otkaz'];
        $data['text_prichotkaza']=$_POST['text_prichotkaza']; 
        }
        else
        {
        $data['otkz_vstr']=$_POST['otkz_vstr'];
        $data['id']=$_POST['id'];
        $data['date_vstr']=$_POST['date_vstr'];
        $data['user']=$_POST['user'];
        $data['otkaz']=$_POST['otkaz'];
        $data['text_prichotkaza']=$_POST['text_prichotkaza']; 
        }
        //$data['user']=$this->session->userdata('family')." ".$this->session->userdata('name');
        $query=$this->stelemarket_model->add_svstr($data); 
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
	$query=$this->stelemarket_model->add_przv($data); 
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
	
}