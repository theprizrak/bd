<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ptelemarketing extends CI_Controller {
    
	public function index()
	{
	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
       if (isset($_POST['edit_ok'])){
		
		$data['id']=$_POST['id'];
          $this->form_validation->set_rules($this->rules_lib->edit_klients_tel_rules); 
        if ($this->form_validation->run() == TRUE)
        {
        $data['user']=$this->session->userdata('family')." ".$this->session->userdata('name');
		$this->user_model->update_tel_klients($data);
        
        //подключаем постраничную навигация
         include ('pagination.php');
        $config['base_url'] = base_url().'ptelemarketing/index/';

        
		$userrrrs=$this->session->userdata('family')." ".$this->session->userdata('name');
        $data = array(
        'klient' => $this->user_model->get_klients_ptel($userrrrs,$config['per_page'],$this->uri->segment(3)),
        "info" => "2");
        
        $config['total_rows'] = $this->db->count_all('klients');
        $this->pagination->initialize($config);
        
        $this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/klients_view');
		$this->load->view('footer_view');
        }
        //если проверка не прошла то снова выводим форму добавления клиента
		else {
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('telemarket/add_klients_view');
		$this->load->view('footer_view');
		}
		}
        else if (isset($_POST['add_ok'])){
		//проводим проверку формы на правильность заполнения
		$this->form_validation->set_rules($this->rules_lib->add_klients_rules);
        //если проверка прошла, то добавляем клиента в базу
        if ($this->form_validation->run() == TRUE)
        {
		$this->user_model->add_klient();

		 //подключаем постраничную навигация
         include ('pagination.php');
        $config['base_url'] = base_url().'ptelemarketing/index/';
        
        $userrrrs=$this->session->userdata('family')." ".$this->session->userdata('name');
        $data = array(
        'klient' => $this->telemarket_model->get_klients_tel($userrrrs,$config['per_page'],$this->uri->segment(3)),
         "info" => "1");
         
        $config['total_rows'] = $this->db->count_all('klients');
        $this->pagination->initialize($config);
        
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/klients_view');
		$this->load->view('footer_view');
		}
        //если проверка не прошла то снова выводим форму добавления клиента
		else {
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('telemarket/add_klients_view');
		$this->load->view('footer_view');
		}
		
	 }
      else {
		 //подключаем постраничную навигация
         include ('pagination.php');
        $config['base_url'] = base_url().'ptelemarketing/index/';
        
        $userrrrs=$this->session->userdata('family')." ".$this->session->userdata('name');
        $data = array(
        'klient' => $this->user_model->get_klients_ptel($userrrrs,$config['per_page'],$this->uri->segment(3)),
        "info" => "0"
        );
        //$data['klientss_vstr']=$this->user_model->get_klients_vstr_resep($data['klient']);
        
        $config['total_rows'] = $this->db->count_all('klients');
        $this->pagination->initialize($config);
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/p/klients_view');
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
		$this->load->view('telemarket/add_klients_view');
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
        'klient' => $this->user_model->find_klients_telemarket($phone),
        "info" => "0");
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/p/klients_view');
		$this->load->view('footer_view');
	 }
     if (isset($_POST['find_fam_ok'])){
		
		$family = $_POST['family'];
		$data = array(
        'klient' => $this->user_model->find_klients_fam_telemarket($family),
        "info" => "0");
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/p/klients_view');
		$this->load->view('footer_view');
	 }
     if (isset($_POST['sortdate_ok']))
        { 
        //подключаем постраничную навигация
         include ('pagination.php');
        $config['base_url'] = base_url().'ptelemarketing/index/';
        
        $config['total_rows'] = $this->db->count_all('klients');
        $this->pagination->initialize($config);
        $userrrrs=$this->session->userdata('family')." ".$this->session->userdata('name');
        $data = array(
        'klient' => $this->telemarket_model->get_klients_psortdate($config['per_page'],$this->uri->segment(3),$userrrrs),
        "info" => "0"
        );

		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/p/klients_view_sordate');
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
        $data['kosmet']=$this->user_model->get_kosmet();
        //$data['klientss_vstr'] = $this->user_model->get_klients_vstr_tel1($id);
        $data['klientss_zvon'] = $this->user_model->get_klients_zvon_tel($id);
       // $kosmetologi = array('kosmet' => $this->user_model->get_kosmet());
		
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/p/edit_klients_view');
		$this->load->view('footer_view');
		}
		else {
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('telemarket/p/klients_view');
		$this->load->view('footer_view');
		}
		
	 }
     
     //сохраняем подтверждение встречи клиента
	public function pod_ok()
	{     
	 if (isset($_POST['pod_ok']) && $_POST['pod_ok']='pod_ok'){
		
        $query=$this->telemarket_model->update_pod_ok($_POST['id'],$_POST['dd'],$_POST['tt'],$_POST['uu'],$_POST['st']);
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
         //сохраняем встречу после редактирования на подтверждалке
	public function safe_ok()
	{     
	 if (isset($_POST['safe_ok']) && $_POST['safe_ok']='safe_ok'){
		
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
	 if (isset($_POST['otkz_ok']) && $_POST['otkz_ok']='otkz_ok'){
		
        $query=$this->telemarket_model->update_otkz($_POST['id'],$_POST['otkaz']);
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
    
    //список встреч клиентов
	public function vstr()
	{
        //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
       
		//подключаем постраничную навигация
         include ('pagination.php');
        $config['base_url'] = base_url().'ptelemarketing/index/';
        
        $config['total_rows'] = $this->db->count_all('klients');
        $this->pagination->initialize($config);    
        $userrrrs=$this->session->userdata('family')." ".$this->session->userdata('name');
        $data = array();
        $data['vstrsss']=$this->telemarket_model->get_klients_ptel_v($userrrrs);
        $data['plan']=$this->telemarket_model->get_plan_klients($this->session->userdata('family'),$this->session->userdata('name'));
        $data['newplan']=$this->telemarket_model->get_plan_sotrud($this->session->userdata('family'),$this->session->userdata('name'));
        $data['info']=0;
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/p/klient_view_filt');
		$this->load->view('footer_view');
	}
	//список перезвонов клиентов
	public function przn()
	{
        //проверяем авторизирован ли пользователь
        $this->auth_lib->check_user();
       
		//подключаем постраничную навигация
         include ('pagination.php');
        $config['base_url'] = base_url().'ptelemarketing/index/';
        
        $config['total_rows'] = $this->db->count_all('klients');
        $this->pagination->initialize($config);    
        $userrrrs=$this->session->userdata('family')." ".$this->session->userdata('name');
        $data = array();
        $data['vstrsss']=$this->telemarket_model->get_klients_ptel_p();
        $data['plan']=$this->telemarket_model->get_plan_klients($this->session->userdata('family'),$this->session->userdata('name'));
        $data['newplan']=$this->telemarket_model->get_plan_sotrud($this->session->userdata('family'),$this->session->userdata('name'));
        $data['info']=0;
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('telemarket/p/klient_view_filt_p');
		$this->load->view('footer_view');
	}
	
}