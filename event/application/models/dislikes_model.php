<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class dislikes_model extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->helper('url_helper');
    }
    public function all_dislikes($id_events='',$id_user=''){
  
          $this->db->select('*');
          $this->db->from('dislikes');
          if($id_user!='') {$this->db->where('id_user', $id_user);}
          if($id_events!='') {$this->db->where('id_events', $id_events);}
        $query = $this->db->get();
        $res=$query->result();
           if(!empty($res))
        {
           
            return $res;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
    public function all_dislikes_rows($id_events=''){
  
          $this->db->select('*');
          $this->db->from('dislikes');
          if($id_events!='') {$this->db->where('id_events', $id_events);}
         $query = $this->db->get();
        $res=$query->num_rows();
        
            return $res;
        }
    public function ajout($row){
      

          $this->db->insert('dislikes',$row);

}

 public function delete($row){
     	     	
        
            $this->db->where('id', $row[0]->id);  
            $this->db->delete('dislikes');

          }
}
