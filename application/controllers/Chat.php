<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends CI_Controller {

    function chat_ajax()
	{
	   //$this->load->view('footer_view');
        if(isset($_POST['send_msg']))
        {
        $query=$this->user_model->send_msg();
        if($query==TRUE)
        {$status=0;echo $status;}
        else
        {$status=1;echo $status;}
        }
    }
    
    function get_mail_user()
     {
        if ($_POST['load_msg'])
        {
        $query=$this->user_model->get_mail_user($_POST['id_user_in'],$_POST['id_user_out']);
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

    function get_user_list()
    {
        $query=$this->user_model->get_user_list();
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
         