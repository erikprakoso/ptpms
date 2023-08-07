<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Destinations_model extends CI_Model
{
    public function create($data)
    {
        // Insert the data into the 'incoming_goods' table
        $this->db->insert('destinations', $data);

        // Optionally, you can check if the insertion was successful
        if ($this->db->affected_rows() > 0) {
            // Insertion successful
            return true;
        } else {
            // Insertion failed
            return false;
        }
    }

    public function get($name)
    {
        // Get the data from the 'incoming_goods' table with the given name
        $this->db->where('name', $name);
        $query = $this->db->get('destinations');

        // Optionally, you can check if the query was successful
        if ($query->num_rows() > 0) {
            // Query successful
            return $query->row();
        } else {
            // Query failed
            return false;
        }
    }
}
