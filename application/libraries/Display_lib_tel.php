<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Display_lib_tel {
    
    public function klients_view($data)
    {
        $CI =& get_instance();    
        $CI->load->view('header_view',$data);
		$CI->load->view('left_view');
		$CI->load->view('telemarket/klients_view');
		$CI->load->view('footer_view');     
    }
    
    public function add_klients_view()
    {
        $CI =& get_instance();
        $CI->load->view('header_view');
		$CI->load->view('left_view');
		$CI->load->view('telemarket/add_klients_view');
		$CI->load->view('footer_view');
    }
    
    public function edit_klients_view($data)
    {
        $CI =& get_instance();
        $CI->load->view('header_view',$data);
		$CI->load->view('left_view');
		$CI->load->view('telemarket/edit_klients_view');
		$CI->load->view('footer_view');
    }
    
    function pagination_view()
    {
        $CI =& get_instance(); 
        $config['full_tag_open'] = "<p id='pagination'>";
        $config['full_tag_close'] = '</p>';
        $config['next_link'] = 'Далее';
        $config['prev_link'] = 'Назад';
        $config['first_link'] = 'Первая';
        $config['last_link'] = 'Последняя';
        $config['first_tag_open'] = '<span class="first_tag_open">';
        $config['first_tag_close'] = '</span>';
        $config['next_tag_open'] = '<span class="next_tag_open">';
        $config['next_tag_close'] = '</span>';
        $config['last_tag_open'] = '<span class="last_tag_open">';
        $config['last_tag_close'] = '</span>';
        $config['prev_tag_open'] = '<span class="prev_tag_open">';
        $config['prev_tag_close'] = '</span>';
        $config['cur_tag_open'] = '<span class="cur_tag_open">';
        $config['cur_tag_close'] = '</span>';
        $config['num_tag_open'] = '<span class="num_tag_open">';
        $config['num_tag_close'] = '</span>';
        $config['full_tag_open'] = "<p id='pagination'>";
        $config['full_tag_close'] = '</p>';
        return $config;
    }
    
    
}