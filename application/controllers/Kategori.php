<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // if (empty($this->session->userdata('username'))) {
        //     redirect('auth');
        // }
        $data['kategori'] = $this->Model->get_all_data('kategori')->result();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/kategori/tampil', $data);
        $this->load->view('admin/layout/footer');
    }

    public function add()
    {
        // if (empty($this->session->userdata('username'))) {
        //     redirect('auth');
        // }
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/kategori/formAdd');
        $this->load->view('admin/layout/footer');
    }

    public function save()
    {
        // if (empty($this->session->userdata('username'))) {
        //     redirect('auth');
        // }

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required', array('required'=> 'Nama Kategori tidak boleh kosong!'));
        
        if ($this->form_validation->run() == false){
            $this->load->view('admin/layout/header');
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/formAdd');
            $this->load->view('admin/layout/footer');
        }else{
            $namaKat = $this->input->post('nama_kategori');
            $dataInput = array('nama_kategori' => $namaKat);
            $this->Model->insert('kategori', $dataInput);
            redirect('kategori');
        }
        
    }

    public function get_by_id($id)
    {
        $dataWhere = array('id_kategori' => $id);
        $data['kategori'] = $this->Model->get_by_id('kategori', $dataWhere)->row_object();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/kategori/formEdit', $data);
        $this->load->view('admin/layout/footer');
    }

    public function edit()
    {
        $id = $this->input->post('id');
        
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required', array('required'=> 'Nama Kategori tidak boleh kosong!'));
       
            
        if ($this->form_validation->run() == false){
            $dataWhere = array('id_kategori'=>$id);
            $data['kategori'] = $this->Model->get_by_id('kategori', $dataWhere)->row_object();
            $this->load->view('admin/layout/header');
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/formEdit',$data);
            $this->load->view('admin/layout/footer');
        }else{
            $namaKategori = $this->input->post('nama_kategori');
            $dataUpdate = array('nama_kategori' => $namaKategori);
            $this->Model->update('kategori', $dataUpdate, 'id_kategori', $id);
            redirect('kategori');
        }
    }

    public function delete($id)
    {
        // if (empty($this->session->userdata('userName'))) {
        //     redirect('adminpanel');
        // }
        $this->Model->delete('kategori', 'id_kategori', $id);
        redirect('kategori');
    }
}
