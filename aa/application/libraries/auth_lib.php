<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_lib
{
    //получаем данные пользователя для входа пользователя
    function user_login($username)
    {
        $CI =& get_instance();
        $CI->db->where('username',$username);
        $CI->db->where('dostup','on');
        $query = $CI->db->get('sotrudnik');
        return $query->row_array(); 
    }
    function check_sess($username)
    {
        $CI =& get_instance();
        $CI->db->where('user_name',$username);
        $query = $CI->db->get('session');
        return $query->row_array(); 
    }
        function update_ses($username)
    {
        $CI =& get_instance();
        $CI->db->where('user_name',$username);
        $CI->db->set('last_activity',time());
        $CI->db->update('session');
    }
    // Проверяет на совпадение введенные данные с данными из базы и авторизует в случае совпадения
    function do_login($username,$pass)
    {
        $CI =& get_instance(); 
        $check_sess=$this->check_sess($username);
        if(count($check_sess)==0)
        {
        $user=$this->user_login($username);
        if(count($user)==0)
        {
            return FALSE;
        }
        else
        {
        // Проверка на совпадение
        if (($user['username'] === $username) && ($user['pass'] === $pass))
        {

            $ses = array();
            $ses['username'] = $user['username']; // Логин пользователя
            $ses['user_id'] = $user['id']; // ID пользователя
            $ses['doljn'] = $user['doljn']; // Должность пользователя
            $ses['otdel'] = $user['otdel']; // Отдел пользователя
            $ses['family'] = $user['family']; // фамилия пользователя
            $ses['name'] = $user['name']; // имя пользователя
            
            $this->sess_create(/*$username*/$ses);

            //$ses['admin_hash'] = $this->the_hash(); // Дополонительная защита - хэш
            
            $CI->session->set_userdata($ses); // Запись сессии
            setcookie ("userlogin", '1',time()+3600); // период действия - 1 час
            
            if($CI->session->userdata('otdel')=='Телемаркетинг первички (Тм1)' && $CI->session->userdata('doljn')=="Оператор" || $CI->session->userdata('doljn')=="Старший оператор" || $CI->session->userdata('doljn')=="Рук-ль тм1")
            {
                setcookie ("redirect", 'telemarketing',time()+86400); // период действия - 24 часа
                redirect ('telemarketing');
            }
            if($CI->session->userdata('otdel')=='АУП' && $CI->session->userdata('doljn')=="IT" || $CI->session->userdata('doljn')=="Старший оператор" || $CI->session->userdata('doljn')=="Рук-ль сервиса")
            {
                setcookie ("redirect", 'admin',time()+86400); // период действия - 24 часа
                redirect ('admin');
            }
            if($CI->session->userdata('otdel')=='Кредитный' && $CI->session->userdata('doljn')=="Кредитный эксперт" || $CI->session->userdata('doljn')=="Старший кредитный эксперт")
            {
                setcookie ("redirect", 'kredit',time()+86400); // период действия - 24 часа
                redirect ('kredit');
            }
            if($CI->session->userdata('doljn')=="Администратор (ресепшен)")
            {
                setcookie ("redirect", 'reseption',time()+86400); // период действия - 24 часа
                redirect ('reseption');
            }
            if($CI->session->userdata('doljn')=="Подтверждающий оператор")
            {
                setcookie ("redirect", 'ptelemarketing',time()+86400); // период действия - 24 часа
                redirect ('ptelemarketing');
            }
            if($CI->session->userdata('otdel')=='Сервис' && $CI->session->userdata('doljn')=="Оператор сервиса" || $CI->session->userdata('doljn')=="Старший оператор")
            {
                setcookie ("redirect", 'stelemarketing',time()+86400); // период действия - 24 часа
                redirect ('stelemarketing');
            }
            if($CI->session->userdata('otdel')=='Сервис' && $CI->session->userdata('doljn')=="Администратор Сервис")
            {
                setcookie ("redirect", 'sreseption',time()+86400); // период действия - 24 часа
                redirect ('sreseption');
            }
            if($CI->session->userdata('otdel')=='Сервис' && $CI->session->userdata('doljn')=="Врач")
            {
                setcookie ("redirect", 'doctor',time()+86400); // период действия - 24 часа
                redirect ('doctor');
            }
            
        } 
        
        // если данные не совпали, выводим страницу входа
        else
        {
            setcookie ("info", '1',time()+7); // период действия - 7 секунд
            return FALSE;
            //redirect (base_url());      
        }
        }
        }
        else 
        {
            setcookie ("info", '2',time()+7); // период действия - 7 секунд
            return FALSE;
        } 
    }
    
    // Очищает данные сессии
    function do_logout()
    {
        $CI =& get_instance();
        $this->sess_delete($CI->session->userdata('username'));
        $ses = array();
        $ses['username'] = '';
        $ses['group'] = '';
        $ses['family'] = ''; 
        $ses['name'] = '';
        $ses['plan'] = '';
        $ses['id_session'] = '';
        setcookie ("userlogin", '0',time()+2);
        //$ses['admin_hash'] = '';
        
        // Удаляем сессию
        $CI->session->unset_userdata($ses);
        redirect (base_url());
        
    }
    
    public function the_hash()
    {
        $CI =& get_instance();
        
        $CI->load->library('preferences_lib');
        
        // формирование хэша: пароль + IP + доп. слово
        $hash = md5($CI->preferences_lib->get_preference('admin_pass').$_SERVER['REMOTE_ADDR'].'cigniter');
        
        return $hash;        
    }
    
    // Функция проверки того, был ли совершен вход - проставить во всех контоллерах и функциях, доступ к которым должен быть закрыт паролем
    public function check_user()
    {
        $CI =& get_instance();
        $ses=$this->check_sess($CI->session->userdata('username'));
        if(count($ses)==0)
        {$this->do_logout();}
        else
        {      
        // Если в бд уже существует запись с таким логином, то запрещаем авторизацию
        /*if(!empty($CI->session->userdata('username')) && !empty($CI->session->userdata('doljn')))
        {*/
            if ($CI->session->userdata('username')!='' && $CI->session->userdata('doljn')!='' && isset($_COOKIE["userlogin"]) && $_COOKIE["userlogin"]==1)
            {
                $this->update_ses($CI->session->userdata('username'));
                //setcookie ("userlogin", "1", time() - 3600); // удаляем куки
                setcookie ("userlogin", '1',time()+3600); // устанавливаем куки период действия - 1 час
                //да получилась хрень с куками, но что поделать :)
                return TRUE; // Просто возвращем значение, если все совпадает
            }
            else
            {
                $this->do_logout();
                //redirect (base_url());            
            }
        }                  
    }
    function config_site()
    {
       $CI =& get_instance();
       $configs = $CI->db->get('config');
       return $configs->row_array(); 
    }


        function sess_create($ses)
	{
        $CI =& get_instance();
		$sessid = '';
		while (strlen($sessid) < 32)
		{
			$sessid .= mt_rand(0, mt_getrandmax());
		}

        $now = time();
        $time = mktime(gmdate("H", $now), gmdate("i", $now), gmdate("s", $now), gmdate("m", $now), gmdate("d", $now), gmdate("Y", $now));
		// To make the session ID even more secure we'll combine it with the user's IP
		$sessid .= $CI->input->ip_address();
        $id_session=md5(uniqid($sessid, TRUE));
		$this->userdata = array(
                            'id_session'	=> $id_session,
                            'user_name'	=> $ses['username'],
                            'id_user'	=> $ses['user_id'],
                            'name'	=> $ses['family'].' '.$ses['name'],
                            'last_activity'	=> time(),
                            'otdel'	=> $ses['otdel'],
                            'doljn'	=> $ses['doljn'],
                            'in_bd'	=> date("H:i"),
                            'ip_adress'	=> $CI->input->ip_address(),
							);
       
        $ses['id_session'] = $id_session; // имя пользователя
        $CI->session->set_userdata($ses); // Запись сессии
        //setcookie ("id_session", $id_session,time()+86400); // период действия - 24 часа
		$CI->db->query($CI->db->insert_string('session', $this->userdata));
    }
        function sess_delete($username)
    	{
            $CI =& get_instance();
           $CI->db->where('id_session',$CI->session->userdata('id_session'));
           $CI->db->where('user_name',$username);
           $CI->db->delete('session');
        }


}