<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['scales'] = $this->db->get('scales')->result();
        $data['main_view'] = 'dashboard/index';
        $data['title'] = 'PT PMS - Dashboard';
        $data['breadcrumb'] = 'Dashboard';
        $this->load->view('template', $data);
    }

    public function create()
    {
        if ($this->input->post('createDateInput') != null) {
            $this->form_validation->set_rules('createDateInput', 'Tanggal', 'required');
            $this->form_validation->set_rules('truckNumberInput', 'No. Truk', 'required');
            $this->form_validation->set_rules('driveNameInput', 'Nama Sopir', 'required');
            $this->form_validation->set_rules('brutoInput', 'Bruto', 'required');
            if ($this->form_validation->run() == TRUE) {
                // Get the input data from the POST request
                $createDate = $this->input->post('createDateInput');
                $truckNumber = $this->input->post('truckNumberInput');
                $driverName = $this->input->post('driveNameInput');
                $bruto = $this->input->post('brutoInput');

                // Create a DateTime object with the desired timezone ("Asia/Jakarta")
                $timezone = new DateTimeZone('Asia/Jakarta');
                $currentTime = new DateTime('now', $timezone);

                // Create an associative array with the data to be inserted
                $data = array(
                    'truck_number' => $truckNumber,
                    'driver_name' => $driverName,
                    'bruto' => $bruto,
                    'create_date' => $createDate,
                    'create_time' => $currentTime->format('H:i:s')
                );

                $this->load->model('scales_model');
                $this->scales_model->create($data);
                redirect('dashboard');
            }
        }
        $data['main_view'] = 'dashboard/create';
        $data['title'] = 'PT PMS - Buat Barang Masuk';
        $data['breadcrumb'] = 'Buat Barang Masuk';
        $this->load->view('template', $data);
    }

    public function detail($id)
    {
        $this->load->model('scales_model');
        $data['scale'] = $this->scales_model->get($id);
        $data['destinations'] = $this->db->get('destinations')->result();
        $data['main_view'] = 'dashboard/detail';
        $data['title'] = 'PT PMS - Detail Barang Masuk';
        $data['breadcrumb'] = 'Detail Barang Masuk';
        $this->load->view('template', $data);
    }

    public function edit($id)
    {
        $this->load->model('scales_model');
        $data['scale'] = $this->scales_model->get($id);
        $data['main_view'] = 'dashboard/edit';
        $data['title'] = 'PT PMS - Edit Barang Masuk';
        $data['breadcrumb'] = 'Edit Barang Masuk';
        $this->load->view('template', $data);
    }

    public function update($id)
    {
        $this->load->model('scales_model');

        // Get the input data from the POST request
        $createDate = $this->input->post('createDateInput');
        $truckNumber = $this->input->post('truckNumberInput');
        $driverName = $this->input->post('driveNameInput');
        $bruto = $this->input->post('brutoInput');



        // Create an associative array with the data to be updated
        $data = array(
            'truck_number' => $truckNumber,
            'driver_name' => $driverName,
            'bruto' => $bruto,
            'create_date' => $createDate
        );

        // Update the data in the 'scales' table with the given id
        $update_result = $this->scales_model->update($id, $data);

        if ($update_result) {
            $get_row = $this->scales_model->get($id);
            if ($get_row) {
                if ($get_row->tara == null) {
                    redirect('dashboard');
                } else {
                    $tara = $get_row->tara;
                    $netto = $bruto - $tara;
                    $data = array(
                        'netto' => $netto
                    );
                    $this->scales_model->update($id, $data);
                    // Update successful
                    redirect('dashboard');
                }
            } else {
                // Update successful
                redirect('dashboard');
            }
        } else {
            // Update failed
            // Handle the update failure here
            // For example, show an error message or redirect to an error page
        }
    }

    public function delete($id)
    {
        $this->load->model('scales_model');
        $this->scales_model->delete($id);
        redirect('dashboard');
    }

    public function update_weight($id)
    {
        if ($this->input->method() === 'post') {
            // Parse the JSON data sent from the client
            $postData = json_decode(file_get_contents("php://input"), true);

            // Extract the values from the parsed JSON data
            $itemName = $postData['itemNameInput'];
            $destination = $postData['destinationInput'];
            $tara = $postData['taraInput'];
            $netto = $postData['nettoInput'];
            $updateDate = $postData['updateDateInput'];
            $information = $postData['informationInput'];

            // Create a DateTime object with the desired timezone ("Asia/Jakarta")
            $timezone = new DateTimeZone('Asia/Jakarta');
            $currentTime = new DateTime('now', $timezone);

            $this->load->model('destinations_model');
            $destination_row = $this->destinations_model->get($destination);
            if ($destination_row) {
                // Do nothing
            } else {
                $formdata = array(
                    'name' => $destination
                );
                $this->destinations_model->create($formdata);
            }

            // Create an associative array with the data to be updated
            $data = array(
                'item_name' => $itemName,
                'destination' => $destination,
                'tara' => $tara,
                'netto' => $netto,
                'update_date' => $updateDate,
                'update_time' => $currentTime->format('H:i:s'),
                'information' => $information
            );

            // Call the model's update_weight method to update the data in the database
            $this->load->model('scales_model');
            $result = $this->scales_model->update($id, $data);

            // Return a response to the client (optional)
            // You can return a JSON response to indicate the success or failure of the update
            $response = array(
                'code' => $result ? 'success' : 'error', // 'success' or 'error
                'success' => $result,
                'message' => $result ? 'Data updated successfully!' : 'Failed to update data!'
            );

            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // If it's not an AJAX request, redirect to the dashboard page
            redirect('dashboard');
        }
    }
}
