<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scales_model extends CI_Model
{
    public function create()
    {
        // Get the input data from the POST request
        $createDate = $this->input->post('createDateInput');
        $truckNumber = $this->input->post('truckNumberInput');
        $driverName = $this->input->post('driveNameInput');
        $bruto = $this->input->post('brutoInput');

        // Create an associative array with the data to be inserted
        $data = array(
            'create_date' => $createDate,
            'truck_number' => $truckNumber,
            'driver_name' => $driverName,
            'bruto' => $bruto
        );

        // Insert the data into the 'incoming_goods' table
        $this->db->insert('scales', $data);

        // Optionally, you can check if the insertion was successful
        if ($this->db->affected_rows() > 0) {
            // Insertion successful
            return true;
        } else {
            // Insertion failed
            return false;
        }
    }

    public function get($id)
    {
        // Get the data from the 'incoming_goods' table with the given id
        $this->db->where('id', $id);
        $query = $this->db->get('scales');

        // Optionally, you can check if the query was successful
        if ($query->num_rows() > 0) {
            // Query successful
            return $query->row();
        } else {
            // Query failed
            return false;
        }
    }

    public function delete($id)
    {
        // Delete the data from the 'incoming_goods' table with the given id
        $this->db->where('id', $id);
        $this->db->delete('scales');

        // Optionally, you can check if the deletion was successful
        if ($this->db->affected_rows() > 0) {
            // Deletion successful
            return true;
        } else {
            // Deletion failed
            return false;
        }
    }

    public function update($id, $data)
    {
        // Update the data in the 'incoming_goods' table with the given id
        $this->db->where('id', $id);
        $this->db->update('scales', $data);

        // Optionally, you can check if the update was successful
        if ($this->db->affected_rows() > 0) {
            // Update successful
            return true;
        } else {
            // Update failed
            return false;
        }
    }
}
