<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reseption extends CI_Controller {

	public function index()
	{
 	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
		if (isset($_POST['edit_ok'])){
		
		$data['id']=$_POST['id'];
        $data['date']=$_POST['date_vstr'];
          $this->form_validation->set_rules($this->rules_lib->edit_klients_rules); 
        if ($this->form_validation->run() == TRUE)
        {
		/*$data['procedura']=$procedura;
        $data['otkaz']=$_POST['otkaz'];
        $data['fio']=$_POST['fio'];*/
        $usersss=$this->session->userdata('family')." ".$this->session->userdata('name');
		$this->telemarket_model->update_klients($data,$usersss);
        
        //подключаем постраничную навигация
        $config['base_url'] = base_url().'reseption/index/';
        $config['per_page'] = '50'; 
        $config['full_tag_open'] = "<p id='pagination'>";
        $config['full_tag_close'] = '</p>';
        $config['next_link'] = 'Далее';
        $config['prev_link'] = 'Назад';
        $config['first_link'] = 'Первая';
        $config['last_link'] = 'Последняя';
        
		$data = array(
        'klient' => $this->telemarket_model->get_klients_resep($config['per_page'],$this->uri->segment(3)),
        'info' => '1'
        );
        $config['total_rows'] = $this->db->count_all('klients');
        $this->pagination->initialize($config);
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('reseption/klients_view');
		$this->load->view('footer_view');
        }
        else{echo "Ошибка";}
		}
		else 
		{
        //подключаем постраничную навигация
        include ('pagination.php');
        $data = array(
        'klient' => $this->user_model->get_klients_resep($config['per_page'],$this->uri->segment(3)),
        'info' => '0'
        );
        $config['base_url'] = base_url().'reseption/index/';
        $config['total_rows'] = count($this->user_model->get_klients_resep_pag());
        $this->pagination->initialize($config);
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('reseption/klients_view');
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
        $data['klientss_vstr']=$this->telemarket_model->get_klients_vstr_resep($id);
        $data['info']='0';
       // $kosmetologi = array('kosmet' => $this->user_model->get_kosmet());
		
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('reseption/edit_klients_view');
		$this->load->view('footer_view');
		}
		else {
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('reseption/klients_view');
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
		$this->load->view('reseption/klients_view');
		$this->load->view('footer_view');
	 }*/
          //Поиск по имени и фамилии клиента
	 if (isset($_POST['find_fioname_ok'])){
		$i=3;
		$family = $_POST['fioname'];
		$data = array(
        'klient' => $this->user_model->find_klients_kredit($family,$i),
        "info" => "0");
        		
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('reseption/klients_view');
		$this->load->view('footer_view');
	 }
     if (isset($_POST['find_tel_ok'])){
		$i=1;
		$family = $_POST['phone'];
		$data = array('klient' => $this->user_model->find_klients_kredit($family,$i),
        'info' => '0');
		
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('reseption/klients_view');
		$this->load->view('footer_view');
	 }
     if (isset($_POST['sortdate_ok']))
        {       
        //подключаем постраничную навигация
        include ('pagination.php');
        $data = array(
        'klient' => $this->user_model->get_klients_sortdate($config['per_page'],$this->uri->segment(3)),
        "info" => "0"
        );
        
        $config['base_url'] = base_url().'reseption/find/';
        $config['total_rows'] = count($this->user_model->get_klients_sortdate_pag());
        $this->pagination->initialize($config);

		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('reseption/klients_view_sordate');
		$this->load->view('footer_view');
        }
     
	}
   


	
}