<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Select_tables extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('');
    }
    public function index()
    {
        $this->load->model('database_model');
        // Get table names from the database
        $data['tables'] = $this->database_model->get_tables();
        $this->load->view('select_view', $data);
        // $this->load->view('select_view');
    }
    public function get_fields()
    {
        $this->load->model('database_model');

        // Get selected table name from the AJAX request
        $table_name = $this->input->post('table_name');

        // Get fields from the selected table
        $fields = $this->database_model->get_fields($table_name);

        // Send JSON response with fields
        echo json_encode($fields);
    }

    public function get_fields_data() {
        $this->load->model('database_model');

        // Get selected table name from the AJAX request
        $table_name = $this->input->post('table_name');

        // Get data from the selected table
        $data['fields_data'] = $this->database_model->get_table_data($table_name);

        // Send JSON response with data
        echo json_encode($data);
    }
}
