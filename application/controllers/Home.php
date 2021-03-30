<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data = [
            'judul' => 'Home',
            'nama' => 'Aji Permana'
        ];


        $this->load->view('templates/header', $data);
        $this->load->view('Home/index', $data);
        $this->load->view('templates/footer');
    }
}
