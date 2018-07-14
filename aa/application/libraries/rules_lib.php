<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rules_lib {

    //клиенты
    // Правила отказа встречи клиента на телемаркетинге
    public $add_klients_otkz_rules = array(
     array
       ('field' => 'otkaz',
        'label' => 'Отказ',
        'rules' => 'xss_clean'        
       ),
	   array
       ('field' => 'prichotkaza',
        'label' => 'Причина отказа',
        'rules' => 'xss_clean'        
       )
    );
	// Правила для добавления клиента на телемаркетинге
    public $add_klients_rules = array(
	   array
       ('field' => 'vozrast',
        'label' => 'Возраст',
        'rules' => 'required|xss_clean|max_length[50]'        
       ),
	   array
       ('field' => 'predpod',
        'label' => 'Предварительное подверждение',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       ('field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       ('field' => 'name',
        'label' => 'Имя',
        'rules' => 'required|xss_clean|max_length[50]'        
       ),
       array
       ('field' => 'user',
        'label' => 'Пользователь',
        'rules' => 'xss_clean'        
       ),
       array
       ('field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       ('field' => 'dop_phone',
        'label' => 'Дополнитеьный Номер телефона',
        'rules' => 'trim|xss_clean|max_length[17]'            
       ),
       array
       ('field' => 'phone',
        'label' => 'Номер телефона',
        'rules' => 'required|trim|xss_clean|max_length[17]'            
       ),
       array
       (
         'field' => 'status',
         'label' => 'Статус клиента',
         'rules' => 'required|xss_clean'
       ),
       array
       ('field' => 'date_dobav',
        'label' => 'Дата добавления',
        'rules' => 'xss_clean'        
       ),
       array
       ('field' => 'otkaz_tm',
        'label' => 'Отказ',
        'rules' => 'xss_clean'
       ),
       array('field' => 'prichotkaza_tm',
        'label' => 'Причина Отказ',
        'rules' => 'xss_clean'
       ),
       array('field' => 'who_user',
        'label' => 'Чей клиент',
        'rules' => 'xss_clean|max_length[4]'
       ),
       array
       (
         'field' => 'perezvon_tm',
         'label' => 'Перезвон',
         'rules' => 'xss_clean'
       )
    );
    // Правила для добавления клиента на сервисе-телемаркетинге
    public $serv_add_klients_rules = array(
	   array
       ('field' => 'vozrast',
        'label' => 'Возраст',
        'rules' => 'required|xss_clean|max_length[2]'        
       ),
        array
       ('field' => 'brichday',
        'label' => 'Дата рождения',
        'rules' => 'xss_clean'        
       ),
       array
       ('field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       ('field' => 'name',
        'label' => 'Имя',
        'rules' => 'required|xss_clean|max_length[50]'        
       ),
       array
       ('field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       ('field' => 'user',
        'label' => 'Пользователь',
        'rules' => 'xss_clean'        
       ),
       array
       ('field' => 'phone',
        'label' => 'Номер телефона',
        'rules' => 'required|trim|xss_clean|max_length[17]'            
       ),
       array
       ('field' => 'dop_phone',
        'label' => 'Дополнитеьный Номер телефона',
        'rules' => 'trim|xss_clean|max_length[17]'            
       ),
       array
       (
         'field' => 'status',
         'label' => 'Статус клиента',
         'rules' => 'required|xss_clean'
       ),
       array
       ('field' => 'date_dobav',
        'label' => 'Дата добавления',
        'rules' => 'xss_clean'        
       ),
       array('field' => 'who_user',
        'label' => 'Чей клиент',
        'rules' => 'xss_clean|max_length[4]'
       )
    );

    // Правила для добавления клиента у врачей сервиса
    public $serv_doc_add_klients_rules = array(
       array
       ('field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       ('field' => 'name',
        'label' => 'Имя',
        'rules' => 'required|xss_clean|max_length[50]'        
       ),
       array
       ('field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'xss_clean|max_length[50]'        
       ),
	   array
       ('field' => 'vozrast',
        'label' => 'Возраст',
        'rules' => 'required|xss_clean|max_length[2]'        
       ),
       array
       ('field' => 'user',
        'label' => 'Пользователь',
        'rules' => 'xss_clean'        
       ),
       array
       ('field' => 'phone',
        'label' => 'Номер телефона',
        'rules' => 'required|trim|xss_clean|max_length[17]'            
       ),
       array
       ('field' => 'dop_phone',
        'label' => 'Дополнитеьный Номер телефона',
        'rules' => 'trim|xss_clean|max_length[17]'            
       ),
       array
       (
         'field' => 'status',
         'label' => 'Статус клиента',
         'rules' => 'required|xss_clean'
       ),
       array
       ('field' => 'date_dobav',
        'label' => 'Дата добавления',
        'rules' => 'xss_clean'        
       ),
       array('field' => 'who_user',
        'label' => 'Чей клиент',
        'rules' => 'xss_clean|max_length[4]'
       )
    );

    // Правила для редактирования клиента на ресепшене
    public $edit_klients_rules = array(
       array
       (
        'field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'xss_clean|max_length[50]'     
       ),
       array
       (
        'field' => 'name',
        'label' => 'Имя',
        'rules' => 'required|xss_clean|max_length[50]'        
       ),
       array
       (
        'field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       (
        'field' => 'brichday',
        'label' => 'Дата рождения',
        'rules' => 'xss_clean|max_length[11]'        
       ),
       array
       (
        'field' => 'vozrast',
        'label' => 'Возраст',
        'rules' => 'xss_clean|max_length[3]'        
       ),
       array
       (
        'field' => 'status',
        'label' => 'Статус',
        'rules' => 'xss_clean'        
       ),
       array
       (
        'field' => 'phone',
        'label' => 'Телефон',
        'rules' => 'required|xss_clean|max_length[17]'        
       )
    );
    // Правила для редактирования клиента на ресепшене сервиса
    public $edit_klients_sresep_rules = array(
       array
       (
         'field' => 'date_vstr',
         'label' => 'Дата встречи',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'time_vstr',
         'label' => 'Время встречи',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'sproc',
         'label' => 'Процедура',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'klient_go',
         'label' => 'Пришел',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'procedura',
         'label' => 'Статус Встречи',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'doctor',
         'label' => 'Врач',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'old_doctor',
         'label' => 'Старый Врач',
         'rules' => 'xss_clean'      
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
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'kosmetolog',
         'label' => 'Косметолог',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'old_kosmet',
         'label' => 'Старый косметолог',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'recomendation',
         'label' => 'Рекомендации',
         'rules' => 'numeric|xss_clean'      
       ),
       array
       (
         'field' => 'procedura',
         'label' => 'Процедура',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'otkaz',
         'label' => 'Отказ',
         'rules' => 'xss_clean'      
       ),
       array
       (
        'field' => 'prichotkaza',
        'label' => 'Причина отказа',
        'rules' => 'xss_clean|max_length[100]'        
       ),
       array
       (
        'field' => 'text_prichotkaza',
        'label' => 'Текст причины отказа',
        'rules' => 'xss_clean|max_length[300]'        
       )
    );
    
    // Правила для редактирования клиента на кредитном(данные клиента)
    public $edit_kred_klients_rules = array(
       array
       (
        'field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       (
        'field' => 'name',
        'label' => 'Имя',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       (
        'field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       (
         'field' => 'mesto_proz',
         'label' => 'Адрес проживания',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'mesto_prop',
         'label' => 'Адрес по прописке',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'brichday',
         'label' => 'Дата рождения',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'mesto_rozd',
         'label' => 'Место рождения',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'ser_pasp',
         'label' => 'Паспорт серия',
         'rules' => 'xss_clean'      
       ),
	   array
       (
         'field' => 'nom_pasp',
         'label' => 'Паспорт номер',
         'rules' => 'xss_clean'      
       ),
	   array
       (
         'field' => 'date_vidan',
         'label' => 'Дата выдачи паспорт',
         'rules' => 'xss_clean'      
       ),
	   array
       (
         'field' => 'vidan',
         'label' => 'Паспорт выдан',
         'rules' => 'xss_clean'      
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
        'rules' => 'xss_clean|max_length[100]'        
       ),
       array
       (
        'field' => 'number_dog',
        'label' => 'Номер договора',
        'rules' => 'xss_clean'        
       ),
       array
       (
        'field' => 'date_dog',
        'label' => 'Дата договора',
        'rules' => 'xss_clean'        
       ),
	   array
       (
        'field' => 'sotov',
        'label' => 'Дата договора',
        'rules' => 'xss_clean'        
       ),
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
        'field' => 'summa',
        'label' => 'Цена товара',
        'rules' => 'xss_clean'        
       ),
	    array
       (
        'field' => 'produkt',
        'label' => 'Продукт',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       (
        'field' => 'srok_kred',
        'label' => 'Срок кредита',
        'rules' => 'xss_clean'        
       ),
       array
       (
        'field' => 'date_kred',
        'label' => 'Дата платежа',
        'rules' => 'xss_clean'        
       ),
       array
       (
        'field' => 'summa_mount',
        'label' => 'Сумма в месяц',
        'rules' => 'xss_clean'        
       ),
       array
       (
        'field' => 'first_vznos',
        'label' => 'Первый взнос',
        'rules' => 'xss_clean'        
       ),
	   array
       (
         'field' => 'prodobespech',
         'label' => 'Продавец обеспечивает',
         'rules' => 'xss_clean'      
       ),
	   array
       (
         'field' => 'srokproced',
         'label' => 'течении',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'summa_kred',
         'label' => 'Сумма кредита',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'off_bonk',
         'label' => 'Расторгнуто с банком',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'comments',
         'label' => 'Комментарий',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'summa_proced',
         'label' => 'Цена на процедуры',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'mesto_proz',
         'label' => 'Адресс проживания',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'mesto_prop',
         'label' => 'Адресс проживания по прописке',
         'rules' => 'xss_clean'      
       )
    );
    
    // Правила .... телемаркетинге
    public $prod_kred_rules = array(
    array
       (
         'field' => 'date_vstr',
         'label' => 'Дата встречи',
         'rules' => 'required|xss_clean'      
       ),
    array
       (
         'field' => 'time_vstr',
         'label' => 'Время встречи',
         'rules' => 'required|xss_clean'      
       )
       
    );
    
    // Правила для редактирования клиента на телемаркетинге
    public $edit_klients_tel_rules = array(
       array
       (
        'field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       (
        'field' => 'name',
        'label' => 'Имя',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       (
        'field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       (
        'field' => 'status',
        'label' => 'Статус',
        'rules' => 'xss_clean'        
       ),
       array
       (
        'field' => 'phone',
        'label' => 'Телефон',
        'rules' => 'xss_clean|max_length[17]'        
       ),
       array(
        'field' => 'otkaz_tm',
        'label' => 'Отказ',
        'rules' => 'xss_clean'        
       ),
       array(
        'field' => 'vozrast',
        'label' => 'Возраст',
        'rules' => 'xss_clean'        
       )
      
    );
    
    // Правила для редактирования клиента на сервисе-телемаркетинге
    public $edit_klients_serv_tel_rules = array(
       array
       (
        'field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       (
        'field' => 'name',
        'label' => 'Имя',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       (
        'field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       (
        'field' => 'status',
        'label' => 'Статус',
        'rules' => 'xss_clean'        
       ),
       array
       (
        'field' => 'phone',
        'label' => 'Телефон',
        'rules' => 'xss_clean|max_length[17]'        
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
         'rules' => 'required|xss_clean'      
       )
    );
     // Правила для редактирования клиента на сервисе-телемаркетинге
    public $serv_tel_vstr_rules = array(
       array(
        'field' => 'text_prichotkaza',
        'label' => 'Причина отказа',
        'rules' => 'xss_clean'        
       ),
       array
       (
        'field' => 'date_vstr',
        'label' => 'Дата встречи',
        'rules' => 'xss_clean'        
       ),
       array
       (
        'field' => 'time_vstr',
        'label' => 'Время встречи',
        'rules' => 'xss_clean'        
       ),
       array
       (
         'field' => 'sproc',
         'label' => 'Процедуры',
         'rules' => 'xss_clean'      
       ),
       array
       (
        'field' => 'otkaz',
        'label' => 'Отказ от встречи',
        'rules' => 'xss_clean'        
       ),
       array
       (
         'field' => 'prichotkaza',
         'label' => 'Причина отказа',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'doctor',
         'label' => 'Врач',
         'rules' => 'xss_clean'      
       )
      
    );
    
    //правила проверки встречи
    public $vstr_klients_tel_rules = array(
        array
       (
         'field' => 'vstrecha',
         'label' => 'Встреча',
         'rules' => 'xss_clean'      
       ),
        array
       (
         'field' => 'date_vstr',
         'label' => 'Дата встречи',
         'rules' => 'required|xss_clean'      
       ),
       array
       (
         'field' => 'time_vstr',
         'label' => 'Время встречи',
         'rules' => 'required|xss_clean'      
       ),
       array
       (
         'field' => 'type_procedur',
         'label' => 'Тип процедуры',
         'rules' => 'required|xss_clean'      
       ),
       array
       (
        'field' => 'office',
        'label' => 'Офис',
        'rules' => 'required|xss_clean'        
       ),
       array
       (
         'field' => 'user',
         'label' => 'Сотрудник',
         'rules' => 'xss_clean|max_length[100]'
       ),
       array
       (
         'field' => 'comments',
         'label' => 'Комментарий',
         'rules' => 'xss_clean'
       ),
       array
       (
        'field' => 'otkaz',
        'label' => 'Отказ',
        'rules' => 'xss_clean'        
       ),
	   array
       (
        'field' => 'prichotkaza',
        'label' => 'Причина отказа',
        'rules' => 'xss_clean'        
       )
       );
       //правила проверки встречи на сервисе-телемаркетинге
    public $vstr_klients_stel_rules = array(
        array
       (
         'field' => 'vstrecha',
         'label' => 'Встреча',
         'rules' => 'required|xss_clean'      
       ),
        array
       (
         'field' => 'date_vstr',
         'label' => 'Дата встречи',
         'rules' => 'required|xss_clean'      
       ),
       array
       (
         'field' => 'time_vstr',
         'label' => 'Время встречи',
         'rules' => 'required|xss_clean'      
       ),
       array
       (
         'field' => 'sproc',
         'label' => 'Процедура',
         'rules' => 'required|xss_clean'      
       ),
       array
       (
         'field' => 'user',
         'label' => 'Сотрудник',
         'rules' => 'xss_clean|max_length[100]'
       ),
       array
       (
         'field' => 'doctor',
         'label' => 'Врач',
         'rules' => 'xss_clean'
       )
       );
       //правила проверки звонков
    public $zvon_klients_tel_rules = array(
        array
       (
         'field' => 'perezvon_tm',
         'label' => 'Перезвон',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'date_perezvon',
         'label' => 'Дата звонка',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'time_perezvon',
         'label' => 'Время звонка',
         'rules' => 'xss_clean'      
       ),
       array
       (
         'field' => 'tema_perezvon',
         'label' => 'Тема звонка',
         'rules' => 'xss_clean'      
       ),
       array
       ('field' => 'comment_perezvon',
        'label' => 'Коментарий',
        'rules' => 'xss_clean'        
       )
       );
    // сотрудники
    
    // Правила для добавления сотрудника
    public $add_sotrudnik_rules = array(
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
       ('field' => 'phone',
        'label' => 'Номер телефона',
        'rules' => 'required|trim|xss_clean|max_length[20]'            
       ),
        array
       (
         'field' => 'date_rozd',
         'label' => 'Дата рождения',
         'rules' => 'required|xss_clean|max_length[11]'
       ),        
       array
       (
         'field' => 'doljn',
         'label' => 'Должность',
         'rules' => 'xss_clean|max_length[100]'
       ),
       array
       (
         'field' => 'otdel',
         'label' => 'Отдел',
         'rules' => 'xss_clean|max_length[100]'
       )      
    );
    // Правила для обновления сотрудника
    public $update_sotrudnik_rules = array(
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
       ('field' => 'date_rozd',
        'label' => 'Дата рождения',
        'rules' => 'xss_clean|max_length[50]'        
       ),
	   array
       ('field' => 'phone',
        'label' => 'Телефон',
        'rules' => 'required|xss_clean|max_length[50]'        
       ),
	   array
       ('field' => 'doljn',
        'label' => 'Должность',
        'rules' => 'required|xss_clean|max_length[50]'        
       ),
	   array
       ('field' => 'otdel',
        'label' => 'Отдел',
        'rules' => 'required|xss_clean|max_length[50]'        
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
       ),
	   array
       ('field' => 'doljn',
        'label' => 'Должность',
        'rules' => 'required|xss_clean|max_length[50]'        
       ),
	   array
       ('field' => 'otdel',
        'label' => 'Отдел',
        'rules' => 'required|xss_clean|max_length[50]'        
       )   
    );
    // Правила для добавления плана сотруднику
    public $add_plan_rules = array(
       array
       ('field' => 'plan',
        'label' => 'План',
        'rules' => 'numeric|xss_clean'        
       ) 
    );
	
    
    // Правила для добавления клиента на телемаркетинге
    public $add_sklients_rules = array(
	   array
       ('field' => 'vozrast',
        'label' => 'Возраст',
        'rules' => 'required|xss_clean|max_length[50]'        
       ),
       array
       ('field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       ('field' => 'name',
        'label' => 'Имя',
        'rules' => 'required|xss_clean|max_length[50]'        
       ),
       array
       ('field' => 'user',
        'label' => 'Пользователь',
        'rules' => 'xss_clean'        
       ),
       array
       ('field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       ('field' => 'dop_phone',
        'label' => 'Дополнитеьный Номер телефона',
        'rules' => 'trim|xss_clean|max_length[17]'            
       ),
       array
       ('field' => 'phone',
        'label' => 'Номер телефона',
        'rules' => 'required|trim|xss_clean|max_length[17]'            
       ),
       array
       (
         'field' => 'status',
         'label' => 'Статус клиента',
         'rules' => 'required|xss_clean'
       ),
       array
       ('field' => 'date_dobav',
        'label' => 'Дата добавления',
        'rules' => 'xss_clean'        
       ),
       array
       ('field' => 'proc',
        'label' => 'Название процедуры',
        'rules' => 'xss_clean'        
       )   
    );
    
        // Правила для добавления врача сервис
    public $add_doctor_rules = array(
       array
       ('field' => 'family',
        'label' => 'Фамилия',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       ('field' => 'name',
        'label' => 'Имя',
        'rules' => 'xss_clean|max_length[50]'        
       ),
       array
       ('field' => 'lastname',
        'label' => 'Отчество',
        'rules' => 'xss_clean|max_length[50]'        
       )
    );
    
    
}