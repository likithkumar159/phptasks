<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Joining_contorl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Joining_model');
    }

    public function index()
    {
        $this->load->view('joining_tableview');
    }

    public function get_table_data()
    {
        $limit = $this->input->post('length');
        $offset = $this->input->post('start');
        $order_column = $this->input->post('order[0][column]');
        $order_dir = $this->input->post('order[0][dir]');
        $search = $this->input->post('search[value]');

        $result = $this->Joining_model->getCombinedData($limit, $offset, $order_column, $order_dir, $search);

        // Get total records without filtering
        $total_records = $this->Joining_model->getTotalRecords();

        // Implement your logic to get the total filtered records
        $filtered_records = $this->Joining_model->getFilteredRecords($search);

        $data = array(
            'data' => $result,
            'recordsTotal' => $total_records,
            'recordsFiltered' => $filtered_records,
            'draw' => intval($this->input->post('draw'))
        );

        echo json_encode($data);
    }

    // Joining_contorl.php
    public function export_csv()
    {
        $this->load->helper('csv');
        $this->load->helper('download');

        $filename = 'export_data.csv';

        // Fetch data for export
        $data = $this->Joining_model->getCombinedDataForExport();

        // Create CSV content
        $csv_content = array_to_csv($data);

        // Force download the CSV file
        force_download($filename, $csv_content);
    }
}
