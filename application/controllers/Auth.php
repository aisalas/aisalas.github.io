<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function dashboard()
	{
		// if(empty($this->session->userdata('username'))){
		// 	redirect('auth');
		// }
		$this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/layout/footer');
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim', [
			'required' => 'Username harus diisi'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required' => 'Password harus diisi'
		]);

		if($this->form_validation->run()==false){
			$this->load->view('login');
		}else{
			$username= $this->input->post('username');
		    $password= $this->input->post('password');

			$user = $this->db->get_where('user', ['username' => $username])->row_array();
			$admin = $this->db->get_where('admin', ['username' => $username])->row_array();
		
			if($user || $admin){
				//user ada, cek password
				if(password_verify($password, $user['password'])){
					redirect('user');
				}elseif($password=$admin['password']){
					redirect('auth/dashboard');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Password salah</div>');
			redirect('auth');
				}
			}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Username tidak terdaftar</div>');
			redirect('auth');
			}
		}
	}

	public function registrasi()
	{
		$this->form_validation->set_rules('fullname', 'Fullname', 'required|trim', [
			'required' => 'Nama lengkap harus diisi'
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim', [
			'required' => 'Username harus diisi'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email_user]', [
			'is_unique' => 'Email ini sudah registrasi'
		]);
		$this->form_validation->set_rules('pass1', 'Pass', 'required|trim|min_length[6]|matches[pass2]', [
			'required' => 'Password harus diisi',
			'matches' => 'Password tidak cocok!',
			'min_length' => 'Password terlalu pendek!'
		]);
		$this->form_validation->set_rules('pass2', 'Pass', 'required|trim|matches[pass1]', [
			'required' => 'Ulang password harus diisi'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
			'required' => 'Alamat harus diisi'
		]);
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim', [
			'required' => 'No. telepon harus diisi'
		]);

		if($this->form_validation->run()==false){
			$this->load->view('register');
		}else{
			$data = [
				'username'=> htmlspecialchars($this->input->post('username', true)),
				'password'=> password_hash($this->input->post('pass1'), PASSWORD_DEFAULT),
				'nama_user'=> $this->input->post('fullname'),
				'email_user'=> htmlspecialchars($this->input->post('email', true)),
				'alamat'=> $this->input->post('alamat'),
				'no_telepon'=> $this->input->post('telepon')
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Selamat Anda telah berhasil membuat akun. Login sekarang!</div>');
			redirect('auth');
		}
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
