<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database_model extends CI_Model {

    public function get_tables() {
        // Get table names from the database
        $query = $this->db->list_tables();
        return $query;
    }

    public function get_fields($table_name) {
        // Get fields from the selected table
        $query = $this->db->list_fields($table_name);
        return $query;
    }

    public function get_table_data($table_name) {
        // Get data from the selected table
        $query = $this->db->get($table_name);
        return $query->result_array();
    }
}
