<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kredit extends CI_Controller {

	public function index()
	{
 	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
       //сохраняем клиента после редактирования в кредите
		if (isset($_POST['edit_kred_ok'])){
		
    		$data['id']=$_POST['id'];
              $this->form_validation->set_rules($this->rules_lib->edit_kred_klients_rules); 
            if ($this->form_validation->run() == TRUE)
            {
        		$zapros=$this->user_model->update_kred_klients($data);
                
                    if($zapros==true)
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
                    
                    redirect("/kredit/edit?id=".$_POST['id']);}
        		}
		else 
		{
        //подключаем постраничную навигация
        include ('pagination.php');
        $data = array(
        'klient' => $this->user_model->get_klients_kredit($config['per_page'],$this->uri->segment(3)),
        'info' => '0'
        );
        $config['base_url'] = base_url().'kredit/index/';
        $config['total_rows'] = $this->db->count_all('klients');
        $this->pagination->initialize($config);
        
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('kredit/klients_view');
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
        $data['klient_vstr']=$this->user_model->get_klients_vstr_resep($id);

		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('kredit/edit_klients_view');
		$this->load->view('footer_view');
		}
		else {
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('kredit/klients_view');
		$this->load->view('footer_view');
		}
		
	 }

        	//просмотр договора клиента
	public function view_dog()
	{
 	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
	 if (isset($_GET['id'])){
		
		$id=$_GET['id'];
                //if(isset($_GET['id_dog'])){$data['id_dog']=$_GET['id_dog'];}
		$data = array();
		$data = $this->user_model->edit_klients($id);
        $data['klient_vstr']=$this->user_model->get_klients_vstr_resep($id);

		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('kredit/view_dog');
		$this->load->view('footer_view');
		}
		else {
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('kredit/klients_view');
		$this->load->view('footer_view');
		}
		
	 }
	
        	//просмотр всех договоров клиента
	public function all_dog()
	{
 	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
	 if (isset($_GET['id'])){
		
		$id=$_GET['id'];
		$data = array();
		$data = $this->user_model->edit_klients($id);

		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('kredit/all_dog_klient');
		$this->load->view('footer_view');
		}
		else {
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('kredit/klients_view');
		$this->load->view('footer_view');
		}
		
	 }
	
	//поиск клиента
	public function find()
	{
 	   //проверяем авторизирован ли пользователь
	   $this->auth_lib->check_user();
       
	 if (isset($_POST['find_ok'])){
		$i=0;
		$family = $_POST['family'];
		$data = array('klient' => $this->user_model->find_klients_kredit($family,$i),
        'info' => '0');
		
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('kredit/klients_view');
		$this->load->view('footer_view');
	 }
     if (isset($_POST['find_tel_ok'])){
		$i=1;
		$family = $_POST['phone'];
		$data = array('klient' => $this->user_model->find_klients_kredit($family,$i),
        'info' => '0');
		
		$this->load->view('header_view',$data);
		$this->load->view('left_view');
		$this->load->view('kredit/klients_view');
		$this->load->view('footer_view');
	 }
	}
	public function dogovor()
	{
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('kredit/dogovor');
		$this->load->view('footer_view');
	}
	public function dogovor_fadjara()
	{
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('kredit/dogovor_fadjara');
		$this->load->view('footer_view');
	}
	public function akt()
	{
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('kredit/akt');
		$this->load->view('footer_view');
	}
		public function akt_fadjara()
	{
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('kredit/akt_fadjara');
		$this->load->view('footer_view');
	}
	public function addklient()
	{
		$this->load->view('header_view');
		$this->load->view('left_view');
		$this->load->view('kredit/addklient');
		$this->load->view('footer_view');
	}
    public function spisok_dog()
    {
        $this->load->view('header_view');
        $this->load->view('left_view');
        $this->load->view('kredit/spisok_dog');
        $this->load->view('footer_view');
    }
	public function vnut_dog()
    {
        $this->load->view('header_view');
        $this->load->view('left_view');
        $this->load->view('kredit/vnut_dog');
        $this->load->view('footer_view');
    }
	
    	function new_dog()
    {
        if(!isset($_POST['new_kred_ok']))
        {
        $this->load->view('header_view');
        $this->load->view('left_view');
        $this->load->view('kredit/new_dog_view');
        $this->load->view('footer_view');
        }
        else
        {
            $query_id=$this->user_model->add_new_kredit();
            
            redirect("/kredit/view_dog?id=".$query_id['0']."&id_dog=".$query_id['1']."");
        }
    }
}