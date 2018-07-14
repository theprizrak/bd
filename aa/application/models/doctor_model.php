<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doctor_model extends CI_Model
{
 	// список назначений клиента для доктора
     function get_klients_recom($id) {
        $this->db->where('id_client',$id);
        //$this->db->where('who_vstr','serv');
        //$this->db->where('ok',1);
        //$this->db->where('otkaz',0);
        //$this->db->where('id_client',$id);
        
        //$this->db->order_by("id", "desc"); 
        $query = $this->db->get('klients_recom');
        return $query->row_array();  
        //return $query->result_array();  
	 }
	 
	  //сохранение назначений у врачей
     function save_recom($data) {
        $datas=array();
        $datas['id_client']=$data['id_client'];
        $datas['date_recom']=$data['date_recom'];     
        $datas['id_doctor']=$data['id_doctor'];     
        $datas['name_doctor']=$data['name_doctor'];     
        $datas['recomendation']=$data['recomendation'];     
        $datas['contraindications']=$data['contraindications'];     
        $query=$this->db->insert('klients_recom', $datas);
                                       
        /*$sql = "INSERT INTO `klients_recom`(`id_client`, `id_doctor`, `date_recom`, `name_doctor`, `recomendation`, `contraindications`) VALUES ('$data[id_client]','$data[id_doctor]','$data[date_recom]','$data[name_doctor]','$data[recomendation]','$data[contraindications]')";
        $query = $this->db->query($sql);*/        
        return $query;
	 }
     //обновление назначений у врачей
     function update_recom($data) {
        /*$this->db->where('id',$data['id_recom']);
        //$this->db->where('id','1');
        //$this->db->where('id_client',$data['id_client']);
        $this->db->set('date_recom',$data['date_recom']);
        $this->db->set('id_doctor',$data['id_doctor']);
        $this->db->set('name_doctor',$data['name_doctor']);
        $this->db->set('recomendation',$data['recomendation']);
        $this->db->set('contraindicationst',$data['contraindications']);
        $this->db->update('klients_recom');*/

        $sql = "UPDATE `klients_recom` SET `id_doctor`='$data[id_doctor]',`date_recom`='$data[date_recom]',`name_doctor`='$data[name_doctor]',`recomendation`='$data[recomendation]',`contraindications`='$data[contraindications]' WHERE `id`='$data[id_recom]'";
        $query = $this->db->query($sql);               
        return $query; 
	 }
     
 //добавляем клиента в базу у врача сервиса
     function doc_add_klient() 
	 {
        $data = array();
		foreach ($this->rules_lib->serv_doc_add_klients_rules as $item)
        {
            $fname = $item['field'];
            $data[$fname] = $this->input->post($fname);                        
        } 
        $data['family']=preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $data['family'] );
        $data['lastname']=preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $data['lastname'] );
        $data['name']=preg_replace( '/^(\S)(.*)$/eu', "mb_strtoupper('\\1', 'UTF-8').mb_strtolower('\\2', 'UTF-8')", $data['name'] );
        $this->db->insert('klients',$data);   
        
        //mysql_insert_id()
        
        $datas=array();
        $datas['id_client']=mysql_insert_id();
        $datas['date_recom']=$data['date_dobav'];     
        $datas['id_doctor']=$this->input->post('id_doctor');     
        $datas['name_doctor']=$data['user'];     
        $datas['recomendation']=$this->input->post('recomendation');     
        $datas['contraindications']=$this->input->post('contraindications');     
        $this->db->insert('klients_recom', $datas);

	 }


}