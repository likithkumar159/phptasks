<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NameController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('NameModel');
        $this->load->database();
    }
    public function index()
    {
        $this->load->view('name_form');
    }
    public function check_name_existence()
    {
        $this->load->model('NameModel');
        $name = $this->input->post('name');
        $name_exists = $this->NameModel->check_name_existence($name);
        echo json_encode(array('exists' => $name_exists));
    }
}
