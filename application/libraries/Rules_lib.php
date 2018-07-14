<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rules_lib {

    //клиенты
    // Правила отказа встречи клиента на телемаркетинге
    public $add_klients_otkz_rules = array(
     array
       ('field' => 'otkaz',
        'label' => 'Отказ',
        'rules' => ''        
       ),
	   array
       ('field' => 'prichotkaza',
        'label' => 'Причина отказа',
        'rules' => ''        
       )
    );
	// Правила для добавления клиента на телемаркетинге
    public $add_klients_rules = array(
	   array
       ('field' => 'vozrast',
        'label' => 'Возраст',
        'rules' => 'required|max_length[50]'        
       ),
	   array
       ('field' => 'predpod',
        'label' => 'Предварительное подверждение',
        'rules' => '|max_length[50]'        
       ),
       array
       ('field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'max_length[50]'        
       ),
       array
       ('field' => 'name',
        'label' => 'Имя',
        'rules' => 'required|max_length[50]'        
       ),
       array
       ('field' => 'user',
        'label' => 'Пользователь',
        'rules' => ''        
       ),
       array
       ('field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'max_length[50]'        
       ),
       array
       ('field' => 'dop_phone',
        'label' => 'Дополнитеьный Номер телефона',
        'rules' => 'trim|max_length[17]'            
       ),
       array
       ('field' => 'phone',
        'label' => 'Номер телефона',
        'rules' => 'required|trim|max_length[17]'            
       ),
       array
       (
         'field' => 'status',
         'label' => 'Статус клиента',
         'rules' => 'required'
       ),
       array
       ('field' => 'date_dobav',
        'label' => 'Дата добавления',
        'rules' => ''        
       ),
       array
       ('field' => 'otkaz_tm',
        'label' => 'Отказ',
        'rules' => ''
       ),
       array('field' => 'prichotkaza_tm',
        'label' => 'Причина Отказ',
        'rules' => ''
       ),
       array('field' => 'who_user',
        'label' => 'Чей клиент',
        'rules' => 'max_length[4]'
       ),
       array
       (
         'field' => 'perezvon_tm',
         'label' => 'Перезвон',
         'rules' => ''
       )
    );
    // Правила для добавления клиента на сервисе-телемаркетинге
    public $serv_add_klients_rules = array(
	   array
       ('field' => 'vozrast',
        'label' => 'Возраст',
        'rules' => 'required|max_length[2]'        
       ),
        array
       ('field' => 'brichday',
        'label' => 'Дата рождения',
        'rules' => ''        
       ),
       array
       ('field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'max_length[50]'        
       ),
       array
       ('field' => 'name',
        'label' => 'Имя',
        'rules' => 'required|max_length[50]'        
       ),
       array
       ('field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'max_length[50]'        
       ),
       array
       ('field' => 'user',
        'label' => 'Пользователь',
        'rules' => ''        
       ),
       array
       ('field' => 'phone',
        'label' => 'Номер телефона',
        'rules' => 'required|trim|max_length[17]'            
       ),
       array
       ('field' => 'dop_phone',
        'label' => 'Дополнитеьный Номер телефона',
        'rules' => 'trim|max_length[17]'            
       ),
       array
       (
         'field' => 'status',
         'label' => 'Статус клиента',
         'rules' => 'required'
       ),
       array
       ('field' => 'date_dobav',
        'label' => 'Дата добавления',
        'rules' => ''        
       ),
       array('field' => 'who_user',
        'label' => 'Чей клиент',
        'rules' => 'max_length[4]'
       )
    );

    // Правила для добавления клиента у врачей сервиса
    public $serv_doc_add_klients_rules = array(
       array
       ('field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'max_length[50]'        
       ),
       array
       ('field' => 'name',
        'label' => 'Имя',
        'rules' => 'required|max_length[50]'        
       ),
       array
       ('field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'max_length[50]'        
       ),
	   array
       ('field' => 'vozrast',
        'label' => 'Возраст',
        'rules' => 'required|max_length[2]'        
       ),
       array
       ('field' => 'user',
        'label' => 'Пользователь',
        'rules' => ''        
       ),
       array
       ('field' => 'phone',
        'label' => 'Номер телефона',
        'rules' => 'required|trim|max_length[17]'            
       ),
       array
       ('field' => 'dop_phone',
        'label' => 'Дополнитеьный Номер телефона',
        'rules' => 'trim|max_length[17]'            
       ),
       array
       (
         'field' => 'status',
         'label' => 'Статус клиента',
         'rules' => 'required'
       ),
       array
       ('field' => 'date_dobav',
        'label' => 'Дата добавления',
        'rules' => ''        
       ),
       array('field' => 'who_user',
        'label' => 'Чей клиент',
        'rules' => 'max_length[4]'
       )
    );

    // Правила для редактирования клиента на ресепшене
    public $edit_klients_rules = array(
       array
       (
        'field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'max_length[50]'     
       ),
       array
       (
        'field' => 'name',
        'label' => 'Имя',
        'rules' => 'required|max_length[50]'        
       ),
       array
       (
        'field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'max_length[50]'        
       ),
       array
       (
        'field' => 'brichday',
        'label' => 'Дата рождения',
        'rules' => 'max_length[11]'        
       ),
       array
       (
        'field' => 'vozrast',
        'label' => 'Возраст',
        'rules' => 'max_length[3]'        
       ),
       array
       (
        'field' => 'status',
        'label' => 'Статус',
        'rules' => ''        
       ),
       array
       (
        'field' => 'phone',
        'label' => 'Телефон',
        'rules' => 'required|max_length[17]'        
       )
    );
    // Правила для редактирования клиента на ресепшене сервиса
    public $edit_klients_sresep_rules = array(
       array
       (
         'field' => 'date_vstr',
         'label' => 'Дата встречи',
         'rules' => ''      
       ),
       array
       (
         'field' => 'time_vstr',
         'label' => 'Время встречи',
         'rules' => ''      
       ),
       array
       (
         'field' => 'sproc',
         'label' => 'Процедура',
         'rules' => ''      
       ),
       array
       (
         'field' => 'klient_go',
         'label' => 'Пришел',
         'rules' => ''      
       ),
       array
       (
         'field' => 'procedura',
         'label' => 'Статус Встречи',
         'rules' => ''      
       ),
       array
       (
         'field' => 'doctor',
         'label' => 'Врач',
         'rules' => ''      
       ),
       array
       (
         'field' => 'old_doctor',
         'label' => 'Старый Врач',
         'rules' => ''      
       )
       /*array
       (
         'field' => 'recomendation',
         'label' => 'Рекомендации',
         'rules' => 'numeric|xss_clean'      
       ),
       array
       (
         'field' => 'prodazha',
         'label' => 'Продажа',
         'rules' => 'xss_clean'      
       ),*/
       
       /*array
       (
         'field' => 'otkazon',
         'label' => 'Отказ',
         'rules' => 'xss_clean'      
       ),
       array
       (
        'field' => 'otkaz',
        'label' => 'Причина отказа',
        'rules' => 'xss_clean|max_length[200]'        
       ),
       array
       (
        'field' => 'otkaz2',
        'label' => 'Причина отказа',
        'rules' => 'xss_clean|max_length[100]'        
       )*/
    );
     // Правила для встреч клиента на ресепшене
    public $edit_resep_vstr_klients_rules = array(
    array
       (
         'field' => 'klient_go',
         'label' => 'Пришел',
         'rules' => ''      
       ),
       array
       (
         'field' => 'kosmetolog',
         'label' => 'Косметолог',
         'rules' => ''      
       ),
       array
       (
         'field' => 'old_kosmet',
         'label' => 'Старый косметолог',
         'rules' => ''      
       ),
       array
       (
         'field' => 'recomendation',
         'label' => 'Рекомендации',
         'rules' => 'numeric'      
       ),
       array
       (
         'field' => 'procedura',
         'label' => 'Процедура',
         'rules' => ''      
       ),
       array
       (
         'field' => 'otkaz',
         'label' => 'Отказ',
         'rules' => ''      
       ),
       array
       (
        'field' => 'prichotkaza',
        'label' => 'Причина отказа',
        'rules' => 'max_length[100]'        
       ),
       array
       (
        'field' => 'text_prichotkaza',
        'label' => 'Текст причины отказа',
        'rules' => 'max_length[300]'        
       )
    );
    
    // Правила для редактирования клиента на кредитном(данные клиента)
    public $edit_kred_klients_rules = array(
       array
       (
        'field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'max_length[50]'        
       ),
       array
       (
        'field' => 'name',
        'label' => 'Имя',
        'rules' => 'max_length[50]'        
       ),
       array
       (
        'field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'max_length[50]'        
       ),
       array
       (
         'field' => 'mesto_proz',
         'label' => 'Адрес проживания',
         'rules' => ''      
       ),
       array
       (
         'field' => 'mesto_prop',
         'label' => 'Адрес по прописке',
         'rules' => ''      
       ),
       array
       (
         'field' => 'brichday',
         'label' => 'Дата рождения',
         'rules' => ''      
       ),
       array
       (
         'field' => 'mesto_rozd',
         'label' => 'Место рождения',
         'rules' => ''      
       ),
       array
       (
         'field' => 'ser_pasp',
         'label' => 'Паспорт серия',
         'rules' => ''      
       ),
	   array
       (
         'field' => 'nom_pasp',
         'label' => 'Паспорт номер',
         'rules' => ''      
       ),
	   array
       (
         'field' => 'date_vidan',
         'label' => 'Дата выдачи паспорт',
         'rules' => ''      
       ),
	   array
       (
         'field' => 'vidan',
         'label' => 'Паспорт выдан',
         'rules' => ''      
       ),
	   array
       (
        'field' => 'sotov',
        'label' => 'сотовый',
        'rules' => ''        
       )/*,
	   array
       (
         'field' => 'teldom',
         'label' => 'Дом. тел',
         'rules' => 'xss_clean'      
       ),
	   array
       (
         'field' => 'telrab',
         'label' => 'Дом. рабочий',
         'rules' => 'xss_clean'      
       ),
	   array
       (
         'field' => 'date_vstr',
         'label' => 'Дата последней встречи клиента',
         'rules' => 'xss_clean'      
       )*/
	   
    );
    // Правила для редактирования клиента на кредитном(данные договора)
    public $edit_kred_dog_klients_rules = array(
       array
       (
        'field' => 'bank',
        'label' => 'Банк',
        'rules' => 'max_length[100]'        
       ),
       array
       (
        'field' => 'number_dog',
        'label' => 'Номер договора',
        'rules' => ''        
       ),
       array
       (
        'field' => 'date_dog',
        'label' => 'Дата договора',
        'rules' => ''        
       ),
	   array
       (
        'field' => 'sotov',
        'label' => 'Дата договора',
        'rules' => ''        
       ),
      array
       (
         'field' => 'teldom',
         'label' => 'Дом. тел',
         'rules' => ''      
       ),
	   array
       (
         'field' => 'telrab',
         'label' => 'Дом. рабочий',
         'rules' => ''      
       ),
       array
       (
        'field' => 'summa',
        'label' => 'Цена товара',
        'rules' => ''        
       ),
	    array
       (
        'field' => 'produkt',
        'label' => 'Продукт',
        'rules' => 'max_length[50]'        
       ),
       array
       (
        'field' => 'srok_kred',
        'label' => 'Срок кредита',
        'rules' => ''        
       ),
       array
       (
        'field' => 'date_kred',
        'label' => 'Дата платежа',
        'rules' => ''        
       ),
       array
       (
        'field' => 'summa_mount',
        'label' => 'Сумма в месяц',
        'rules' => ''        
       ),
       array
       (
        'field' => 'first_vznos',
        'label' => 'Первый взнос',
        'rules' => ''        
       ),
	   array
       (
         'field' => 'prodobespech',
         'label' => 'Продавец обеспечивает',
         'rules' => ''      
       ),
	   array
       (
         'field' => 'srokproced',
         'label' => 'течении',
         'rules' => ''      
       ),
       array
       (
         'field' => 'summa_kred',
         'label' => 'Сумма кредита',
         'rules' => ''      
       ),
       array
       (
         'field' => 'off_bonk',
         'label' => 'Расторгнуто с банком',
         'rules' => ''      
       ),
       array
       (
         'field' => 'comments',
         'label' => 'Комментарий',
         'rules' => ''      
       ),
       array
       (
         'field' => 'summa_proced',
         'label' => 'Цена на процедуры',
         'rules' => ''      
       ),
       array
       (
         'field' => 'mesto_proz',
         'label' => 'Адресс проживания',
         'rules' => ''      
       ),
       array
       (
         'field' => 'mesto_prop',
         'label' => 'Адресс проживания по прописке',
         'rules' => ''      
       )
    );
    
    // Правила .... телемаркетинге
    public $prod_kred_rules = array(
    array
       (
         'field' => 'date_vstr',
         'label' => 'Дата встречи',
         'rules' => 'required'      
       ),
    array
       (
         'field' => 'time_vstr',
         'label' => 'Время встречи',
         'rules' => 'required'      
       )
       
    );
    
    // Правила для редактирования клиента на телемаркетинге
    public $edit_klients_tel_rules = array(
       array
       (
        'field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'max_length[50]'        
       ),
       array
       (
        'field' => 'name',
        'label' => 'Имя',
        'rules' => 'max_length[50]'        
       ),
       array
       (
        'field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'max_length[50]'        
       ),
       array
       (
        'field' => 'status',
        'label' => 'Статус',
        'rules' => ''        
       ),
       array
       (
        'field' => 'phone',
        'label' => 'Телефон',
        'rules' => 'max_length[17]'        
       ),
       array(
        'field' => 'otkaz_tm',
        'label' => 'Отказ',
        'rules' => ''        
       ),
       array(
        'field' => 'vozrast',
        'label' => 'Возраст',
        'rules' => ''        
       )
      
    );
    
    // Правила для редактирования клиента на сервисе-телемаркетинге
    public $edit_klients_serv_tel_rules = array(
       array
       (
        'field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'max_length[50]'        
       ),
       array
       (
        'field' => 'name',
        'label' => 'Имя',
        'rules' => 'max_length[50]'        
       ),
       array
       (
        'field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'max_length[50]'        
       ),
       array
       (
        'field' => 'status',
        'label' => 'Статус',
        'rules' => ''        
       ),
       array
       (
        'field' => 'phone',
        'label' => 'Телефон',
        'rules' => 'max_length[17]'        
       ),
       /*array(
        'field' => 'otkaz_serv',
        'label' => 'Отказ',
        'rules' => 'xss_clean'        
       ),*/
       array
       (
         'field' => 'vozrast',
         'label' => 'Процедура',
         'rules' => 'required'      
       )
    );
     // Правила для редактирования клиента на сервисе-телемаркетинге
    public $serv_tel_vstr_rules = array(
       array(
        'field' => 'text_prichotkaza',
        'label' => 'Причина отказа',
        'rules' => ''        
       ),
       array
       (
        'field' => 'date_vstr',
        'label' => 'Дата встречи',
        'rules' => ''        
       ),
       array
       (
        'field' => 'time_vstr',
        'label' => 'Время встречи',
        'rules' => ''        
       ),
       array
       (
         'field' => 'sproc',
         'label' => 'Процедуры',
         'rules' => ''      
       ),
       array
       (
        'field' => 'otkaz',
        'label' => 'Отказ от встречи',
        'rules' => ''        
       ),
       array
       (
         'field' => 'prichotkaza',
         'label' => 'Причина отказа',
         'rules' => ''      
       ),
       array
       (
         'field' => 'doctor',
         'label' => 'Врач',
         'rules' => ''      
       )
      
    );
    
    //правила проверки встречи
    public $vstr_klients_tel_rules = array(
        array
       (
         'field' => 'vstrecha',
         'label' => 'Встреча',
         'rules' => ''      
       ),
        array
       (
         'field' => 'date_vstr',
         'label' => 'Дата встречи',
         'rules' => 'required'      
       ),
       array
       (
         'field' => 'time_vstr',
         'label' => 'Время встречи',
         'rules' => 'required'      
       ),
       array
       (
         'field' => 'type_procedur',
         'label' => 'Тип процедуры',
         'rules' => 'required'      
       ),
       array
       (
        'field' => 'office',
        'label' => 'Офис',
        'rules' => 'required'        
       ),
       array
       (
         'field' => 'user',
         'label' => 'Сотрудник',
         'rules' => 'max_length[100]'
       ),
       array
       (
         'field' => 'comments',
         'label' => 'Комментарий',
         'rules' => ''
       ),
       array
       (
        'field' => 'otkaz_tm',
        'label' => 'Отказ',
        'rules' => ''        
       ),
	   array
       (
        'field' => 'prichotkaza_tm',
        'label' => 'Причина отказа',
        'rules' =>     ''    
       )
       );
       //правила проверки встречи на сервисе-телемаркетинге
    public $vstr_klients_stel_rules = array(
        array
       (
         'field' => 'vstrecha',
         'label' => 'Встреча',
         'rules' => 'required'      
       ),
        array
       (
         'field' => 'date_vstr',
         'label' => 'Дата встречи',
         'rules' => 'required'      
       ),
       array
       (
         'field' => 'time_vstr',
         'label' => 'Время встречи',
         'rules' => 'required'      
       ),
       array
       (
         'field' => 'sproc',
         'label' => 'Процедура',
         'rules' => 'required'      
       ),
       array
       (
         'field' => 'user',
         'label' => 'Сотрудник',
         'rules' => 'max_length[100]'
       ),
       array
       (
         'field' => 'doctor',
         'label' => 'Врач',
         'rules' => ''
       )
       );
       //правила проверки звонков
    public $zvon_klients_tel_rules = array(
        array
       (
         'field' => 'perezvon_tm',
         'label' => 'Перезвон',
         'rules' => ''      
       ),
       array
       (
         'field' => 'date_perezvon',
         'label' => 'Дата звонка',
         'rules' => ''      
       ),
       array
       (
         'field' => 'time_perezvon',
         'label' => 'Время звонка',
         'rules' => ''      
       ),
       array
       (
         'field' => 'tema_perezvon',
         'label' => 'Тема звонка',
         'rules' => ''      
       ),
       array
       ('field' => 'comment_perezvon',
        'label' => 'Коментарий',
        'rules' => ''        
       )
       );
    // сотрудники
    
    // Правила для добавления сотрудника
    public $add_sotrudnik_rules = array(
       array
       ('field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'required|max_length[50]'        
       ),
	   array
       ('field' => 'name',
        'label' => 'Имя',
        'rules' => 'required|max_length[50]'        
       ),
	   array
       ('field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'required|max_length[50]'        
       ),
       array
       ('field' => 'phone',
        'label' => 'Номер телефона',
        'rules' => 'required|trim|max_length[20]'            
       ),
        array
       (
         'field' => 'date_rozd',
         'label' => 'Дата рождения',
         'rules' => 'required|max_length[11]'
       ),        
       array
       (
         'field' => 'doljn',
         'label' => 'Должность',
         'rules' => 'max_length[100]'
       ),
       array
       (
         'field' => 'otdel',
         'label' => 'Отдел',
         'rules' => 'max_length[100]'
       )      
    );
    // Правила для обновления сотрудника
    public $update_sotrudnik_rules = array(
       array
       ('field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'required|max_length[50]'        
       ),
	   array
       ('field' => 'name',
        'label' => 'Имя',
        'rules' => 'required|max_length[50]'        
       ),
	   array
       ('field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'required|max_length[50]'        
       ),
              array
       ('field' => 'date_rozd',
        'label' => 'Дата рождения',
        'rules' => 'required|max_length[50]'        
       ),
	   array
       ('field' => 'phone',
        'label' => 'Телефон',
        'rules' => 'required|max_length[50]'        
       ),
	   array
       ('field' => 'doljn',
        'label' => 'Должность',
        'rules' => 'required|max_length[50]'        
       ),
	   array
       ('field' => 'otdel',
        'label' => 'Отдел',
        'rules' => 'required|max_length[50]'        
       )    
    );
    
    
    // пользователи
    
 	// Правила для входа пользователя
    public $login_rules = array(
       array
       ('field' => 'username',
        'label' => 'Логин',
        'rules' => 'trim|required|alpha_dash|max_length[50]'        
       ),
	   array
       ('field' => 'pass',
        'label' => 'Пароль',
        'rules' => 'trim|required|alpha_dash|max_length[50]'        
       ) 
    );
    /*
    // Правила для обновления пользователя
    public $update_users_rules = array(
       array
       ('field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'required|xss_clean|max_length[50]'        
       ),
	   array
       ('field' => 'name',
        'label' => 'Имя',
        'rules' => 'required|xss_clean|max_length[50]'        
       ),
	   array
       ('field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'required|xss_clean|max_length[50]'        
       ),
              array
       ('field' => 'username',
        'label' => 'Логин',
        'rules' => 'required|xss_clean|max_length[50]'        
       ),
	   array
       ('field' => 'pass',
        'label' => 'Пароль',
        'rules' => 'required|xss_clean|max_length[50]'        
       )  
    );
    */
    // Правила для добавления пользователя
    public $add_users_rules = array(
       array
       ('field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'required|max_length[50]'        
       ),
	   array
       ('field' => 'name',
        'label' => 'Имя',
        'rules' => 'required|max_length[50]'        
       ),
	   array
       ('field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'required|max_length[50]'        
       ),
        array
       ('field' => 'username',
        'label' => 'Логин',
        'rules' => 'required|max_length[50]'        
       ),
	   array
       ('field' => 'pass',
        'label' => 'Пароль',
        'rules' => 'required|max_length[50]'        
       ),
	   array
       ('field' => 'doljn',
        'label' => 'Должность',
        'rules' => 'required|max_length[50]'        
       ),
	   array
       ('field' => 'otdel',
        'label' => 'Отдел',
        'rules' => 'required|max_length[50]'        
       )   
    );
    // Правила для добавления плана сотруднику
    public $add_plan_rules = array(
       array
       ('field' => 'plan',
        'label' => 'План',
        'rules' => 'numeric'        
       ) 
    );
	
    
    // Правила для добавления клиента на телемаркетинге
    public $add_sklients_rules = array(
	   array
       ('field' => 'vozrast',
        'label' => 'Возраст',
        'rules' => 'required|max_length[50]'        
       ),
       array
       ('field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'max_length[50]'        
       ),
       array
       ('field' => 'name',
        'label' => 'Имя',
        'rules' => 'required|max_length[50]'        
       ),
       array
       ('field' => 'user',
        'label' => 'Пользователь',
        'rules' => ''        
       ),
       array
       ('field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'max_length[50]'        
       ),
       array
       ('field' => 'dop_phone',
        'label' => 'Дополнитеьный Номер телефона',
        'rules' => 'trim|max_length[17]'            
       ),
       array
       ('field' => 'phone',
        'label' => 'Номер телефона',
        'rules' => 'required|trim|max_length[17]'            
       ),
       array
       (
         'field' => 'status',
         'label' => 'Статус клиента',
         'rules' => 'required'
       ),
       array
       ('field' => 'date_dobav',
        'label' => 'Дата добавления',
        'rules' => ''        
       ),
       array
       ('field' => 'proc',
        'label' => 'Название процедуры',
        'rules' => ''        
       )   
    );
    
        // Правила для добавления врача сервис
    public $add_doctor_rules = array(
       array
       ('field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'max_length[50]'        
       ),
       array
       ('field' => 'name',
        'label' => 'Имя',
        'rules' => 'max_length[50]'        
       ),
       array
       ('field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'max_length[50]'        
       )
    );
    
    
}