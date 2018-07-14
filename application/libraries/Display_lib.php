<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Display_lib {
    
    function pagination_view()
    {
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
    }
    
    //навигация для ресепшена
    public function pag_reseption() 
    {
        $CI =& get_instance();
        
        $config['base_url'] = base_url().'reseption/';
        $config['total_rows'] = $CI->db->count_all('klients');
        $config['per_page'] = '3'; 
        $config['full_tag_open'] = "<p id='pagination'>";
        $config['full_tag_close'] = '</p>';
        $config['first_link'] = 'Первая';
        $config['last_link'] = 'Последняя';
        
        $CI->pagination->initialize($config);
    }
    
	//навигация для кредитного
	public function pag_kredit() 
    {
        $CI =& get_instance();
        
        $config['base_url'] = base_url().'kredit/';
        $config['total_rows'] = $CI->db->count_all('klients');
        $config['per_page'] = '3'; 
        $config['full_tag_open'] = "<p id='pagination'>";
        $config['full_tag_close'] = '</p>';
        $config['first_link'] = 'Первая';
        $config['last_link'] = 'Последняя';
        
        $CI->pagination->initialize($config);
    }
    
    //навигация для телемаркетинга
    public function pag_telemarket() 
    {
        $CI =& get_instance();
        
        $config['base_url'] = base_url().'telemarketing/';
        $config['total_rows'] = $CI->db->count_all('klients');
        $config['per_page'] = '20'; 
        $config['full_tag_open'] = "<p id='pagination'>";
        $config['full_tag_close'] = '</p>';
        $config['first_link'] = 'Первая';
        $config['last_link'] = 'Последняя';
        
        $CI->pagination->initialize($config);
    }

	 //навигация для телемаркетинга Подтверждаюшего
    public function pag_ptelemarket() 
    {
        $CI =& get_instance();
        
        $config['base_url'] = base_url().'ptelemarketing/';
        $config['total_rows'] = $CI->db->count_all('klients');
        $config['per_page'] = '20'; 
        $config['full_tag_open'] = "<p id='pagination'>";
        $config['full_tag_close'] = '</p>';
        $config['first_link'] = 'Первая';
        $config['last_link'] = 'Последняя';
        
        $CI->pagination->initialize($config);
    }
    
    	 //навигация для телемаркетинга Подтверждаюшего
    function pag_tag_all() 
    {   
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
}

}