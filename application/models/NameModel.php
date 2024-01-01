<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NameModel extends CI_Model {

    public function check_name_existence($name) {
        // Assuming 'your_table' is the name of your database table
        $this->db->where('name', $name);
        $query = $this->db->get('users');
        return $query->num_rows() > 0;
    }
}
