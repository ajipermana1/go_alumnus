<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mydata extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        // $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        // $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        // $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        if ($this->form_validation->run() == false) {

            $data['mydata'] = $this->db->get('data')->result_array();
            $data['judul'] = 'Data';


            $this->load->view('templates/header', $data);
            $this->load->view('mydata/index', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $no_wa = $this->input->post('no_wa');
            $profesi = $this->input->post('profesi');
            $alamat = $this->input->post('alamat');

            $data = [
                'nama' => $nama,
                'no_wa' => $no_wa,
                'profesi' => $profesi,
                'alamat' => $alamat
            ];
            $this->db->insert('data', $data);

            redirect('Mydata');
        }
    }
    public function detail($id)
    {
        $data['sdata'] = $this->db->get_where('data', ['id' => $id])->row_array();

        $data['judul'] = 'Detail';


        $this->load->view('templates/header', $data);
        $this->load->view('mydata/detail', $data);
        $this->load->view('templates/footer');
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        if ($this->form_validation->run() == false) {

            $data['sdata'] = $this->db->get_where('data', ['id' => $id])->row_array();

            $data['judul'] = 'Detail';


            $this->load->view('templates/header', $data);
            $this->load->view('mydata/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $no_wa = $this->input->post('no_wa');
            $profesi = $this->input->post('profesi');
            $alamat = $this->input->post('alamat');

            $data = [
                'nama' => $nama,
                'no_wa' => $no_wa,
                'profesi' => $profesi,
                'alamat' => $alamat
            ];


            $this->db->where('id', $id);
            $this->db->update('data', $data);

            redirect('Mydata/detail/' . $id);
        }
    }

    public function delete($id)
    {
        $this->db->delete('data', ['id' => $id]);
        redirect('Mydata');
    }
}
