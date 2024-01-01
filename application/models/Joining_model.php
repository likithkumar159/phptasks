<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Joining_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('');
    }
    public function get_joining()
    {
        $this->db->select('table1.id, table1.name, table2.description, table3.value');
        $this->db->from('table1');
        $this->db->join('table2', 'table1.id=table2.id', 'inner');
        $this->db->join('table3', 'table1.id=table3.id', 'inner');
        $query = $this->db->get();
        return $query->result();
    }
    public function getCombinedDataForExport() {
        $this->db->select('table1.id, table1.name, table2.description, table3.value');
        $this->db->from('table1');
        $this->db->join('table2', 'table1.id = table2.id', 'left');
        $this->db->join('table3', 'table1.id = table3.id', 'left');
        
        // You may add additional conditions, sorting, etc. if needed
        
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getCombinedData($limit, $offset, $order_column, $order_dir, $search)
    {
        $this->db->select('table1.id, table1.name, table2.description, table3.value');
        $this->db->from('table1');
        $this->db->join('table2', 'table1.id = table2.id', 'left');
        $this->db->join('table3', 'table1.id = table3.id', 'left');

        // Implement searching if applicable
        if ($search) {
            $this->db->like('table1.name', $search);
            // Add more like conditions for other columns if needed
        }

        // Implement sorting
        $this->db->order_by($order_column, $order_dir);

        // Implement pagination
        $this->db->limit($limit, $offset);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTotalRecords() {
        return $this->db->count_all_results('table1');
    }
    
    public function getFilteredRecords($search) {
        // Implement your logic to count the total filtered records
        // based on the search parameter
        // Example:
        $this->db->from('table1');
        $this->db->like('name', $search);
        return $this->db->count_all_results();
    }
}
