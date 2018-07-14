<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
	   //если нажата кнопка войти
	if (isset($_POST['login_ok']))
    {
	   //запускаем проверку валидации
       $this->form_validation->set_rules($this->rules_lib->login_rules);
        
        // Если валидация не пройдена
        if ($this->form_validation->run() == FALSE)
        {
            //выводим форму входа
            //$data = array("info" => "0");
            $this->load->view('login_view',$data);    
        }
        
        // Если валидация пройдена 
        else
        {
            //если введеные данные не совпадают из базы и возвращается FALSE
            if($this->auth_lib->do_login($_POST['username'],$_POST['pass'])==FALSE)
            {
                //выводим сообщение о неверно введенных данных и выводим форму входа
                //$data = array("info" => "1");
                setcookie ("info", '3',time()+7); // период действия - 7 секунд
                $this->load->view('login_view');  
            }
        }                   
	}
    //если кнопка войти не нажата
        else{
            if ($this->session->userdata('username')!='' && $this->session->userdata('doljn')!='' && isset($_COOKIE["userlogin"]) && $_COOKIE["userlogin"]==1 && isset($_COOKIE["redirect"]))
            {
                redirect($_COOKIE["redirect"]);
            }
            else
            {
            //выводим форму входа
        	$data = array("info" => "0");
            $this->load->view('login_view',$data); 
            }
        }
	}
    
    public function logout()
	{
	   //$this->load->view('header_view');
		$this->auth_lib->do_logout();
	}

    function error_404()
	{
	   $this->load->view('404');
	}
    function error_302()
	{
	   $this->load->view('302');
	}
    
}
