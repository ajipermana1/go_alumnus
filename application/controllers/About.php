<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function index()
    {
        $data = [
            'judul' => 'Home',
            'nama' => 'Aji Permana',
            'umur' => 16,
            'pekerjaan' => 'Pelajar'

        ];


        $this->load->view('templates/header', $data);
        $this->load->view('About/index', $data);
        $this->load->view('templates/footer');
    }
}
