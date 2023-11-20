<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class Data_user extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
    }

    public function index()
    {
        // if (empty($this->session->userdata('userName'))) {
        //     redirect('adminpanel');
        // }
        $data['user'] = $this->Model->get_all_data('user')->result();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/user/tampil', $data);
        $this->load->view('admin/layout/footer');
    }

    public function delete($id)
    {
        // if (empty($this->session->userdata('userName'))) {
        //     redirect('adminpanel');
        // }
        $this->Model->delete('user', 'id_user', $id);
        redirect('data_user');
    }
}
