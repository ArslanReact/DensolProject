<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LogsModel extends CI_Model {

    protected $table = "log";

    public function __construct()
    {
        parent::__construct();
    }

    public function get_log_by_ip($ip,$type)
    {
        $this->db->escape($ip);
        $this->db->where('ip', $ip);
        $this->db->where('type', $type);
        $query = $this->db->get($this->table);
        $row = $query->row();
        if(isset($row)){
            return $row;
        }else{
            return false;
        }
    }
    
    public function add_log($user='Guest',$ip,$failed,$type,$message,$importance='no')
    {
        $data = array(
            'user' => $user,
            'ip' => $ip,
            'failed' => $failed,
            'type' => $type,
            'message' => $message,
            'importance' => $importance,
            'failed_last' => time(),
        );
        $this->db->set('created', 'NOW()', FALSE);
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }
    
    public function update_log($id,$user='Guest',$failed,$failed_last,$type,$message,$importance='no')
    {
        $data = array(
            'user' => $user,
            'failed' => $failed,
            'type' => $type,
            'message' => $message,
            'importance' => $importance,
            'failed_last' => $failed_last,
        );
        if($this->db->update($this->table, $data, "id = ".$id)){
            return true;
        }else{
            return true;
        }
    }
    public function delete_log($id,$type)
    {
        if($this->db->delete($this->table, array('id' => $id,'type' => $type))){
            return true;
        }else{
            return false;
        }
    }

    

}