<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doctor extends CI_Controller {

	public function index()
	{
	    //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
    if (isset($_POST['add_ok'])){  
		//проводим проверку формы на правильность заполнения
		$this->form_validation->set_rules($this->rules_lib->serv_doc_add_klients_rules);
        //если проверка прошла, то добавляем клиента в базу
        if ($this->form_validation->run() == TRUE)
        {
		$this->doctor_model->doc_add_klient();
        setcookie ("info", '1',time()+7); // период действия - 7 секунд
        redirect('/doctor');
        
        /*
        //подключаем постраничную навигацию
        include ('pagination.php');
        $data = array(
        'klient_vstr' =>$this->stelemarket_model->get_klients_vstr_resep1($config['per_page'],$this->uri->segment(3)),
        'info' => '1'
        );
        $config['base_url'] = base_url().'doctor/index/';
        $config['total_rows'] = $this->db->count_all('klients');
        $this->pagination->initialize($config);
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('doctor/klients_view');
		$this->load->view('footer_view');*/
		}
        //если проверка не прошла то снова выводим форму добавления клиента
		else {
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('doctor/klients_view');
		$this->load->view('footer_view');
		}
		
}
else {
       
	    //подключаем постраничную навигация
        include ('pagination.php');
        $data = array(
        'klient_vstr' =>$this->stelemarket_model->get_klients_vstr_resep1($config['per_page'],$this->uri->segment(3)),
        'info' => '0'
        );
        $config['base_url'] = base_url().'doctor/index/';
        $config['total_rows'] = count($this->stelemarket_model->get_klients_vstr_resep_pag());
        $this->pagination->initialize($config);
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('doctor/klients_view');
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
		$this->load->view('doctor/add_klients_view');
		$this->load->view('footer_view');
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
		$data['klients_recom'] = $this->doctor_model->get_klients_recom($id);
		
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('doctor/edit_klients_view');
		$this->load->view('footer_view');
		}
		else {
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('doctor/klients_view');
		$this->load->view('footer_view');
		}
		
	 }
	 
	    //поиск клиента
	public function find()
	{
 	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
	 if (isset($_POST['find_ok'])){
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
		$this->load->view('doctor/find_klients_view');
		$this->load->view('footer_view');
	 }
     if (isset($_POST['find_tel_ok'])){
		$i=1;
		$family = $_POST['phone'];
		$data = array('klient' => $this->user_model->find_klients_kredit($family,$i),
        'info' => '0');
		
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('doctor/find_klients_view');
		$this->load->view('footer_view');
	 }
     
	}
	
	function save_recom()
    {
       if(isset($_POST['save_recom']))
       {
        $data['id_client']=$_POST['id_client'];
        $data['id_doctor']=$_POST['id_doctor'];
        $data['date_recom']=$_POST['date_recom'];
        $data['name_doctor']=$_POST['name_doctor'];
        $data['recomendation']=$_POST['recomendation'];
        $data['contraindications']=$_POST['contraindications'];
        $query=$this->doctor_model->save_recom($data);
        if($query)
        {$status=0;echo $status;}
        else
        {$status=1;echo $status;}
       }
       if(isset($_POST['update_recom']))
       {
        $data['id_recom']=$_POST['id_recom'];
        $data['id_client']=$_POST['id_client'];
        $data['id_doctor']=$_POST['id_doctor'];
        $data['date_recom']=$_POST['date_recom'];
        $data['name_doctor']=$_POST['name_doctor'];
        $data['recomendation']=$_POST['recomendation'];
        $data['contraindications']=$_POST['contraindications'];
        $query=$this->doctor_model->update_recom($data);
        if($query)
        {$status=0;echo $status;}
        else
        {$status=1;echo $status;}
       }
       
	}
 }