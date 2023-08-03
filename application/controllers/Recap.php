<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recap extends CI_Controller
{
    public function index()
    {
        $data['scales'] = $this->db->get('scales')->result();
        $data['main_view'] = 'recap/index';
        $data['title'] = 'PT PMS - Rekap';
        $data['breadcrumb'] = 'Rekap';
        $this->load->view('template', $data);
    }

    public function print($id)
    {
        $data['scale'] = $this->db->get_where('scales', ['id' => $id])->row();
        $this->load->view('recap/print', $data);
    }
}