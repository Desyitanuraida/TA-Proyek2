<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->model('M_Master');
	}

	public function index()
	{
		if (!$this->session->userdata('user')) {
			$this->M_Master->warning('Silahkan login terlebih dahulu');
			redirect('login');
		}

        $select = "mobil.*, merk.nama as nama_merk, merk.produk as produk";
        $data['data'] = $this->M_Master->get_join_id(
            'mobil',
            array(
                array(
                    'table' => 'merk',
                    'fk'    => 'mobil.merk_id=merk.id'
                ),
            ),
            null,
            $select)->result();

		$this->load->view('template/car', $data);
	}

	public function rent($id = null)
	{
        if (!$id) redirect('/');

        if ($this->input->method(TRUE) == 'POST') {
			$tanggal_mulai 	= $this->input->post('tanggal_mulai');
			$tanggal_akhir 	= $this->input->post('tanggal_akhir');
			$tujuan			= $this->input->post('tujuan');
			$noktp			= $this->input->post('noktp');

			$this->M_Master->add('sewa', [
				'tanggal_mulai' 	=> $tanggal_mulai,
				'users_id' 			=> $this->session->userdata('user')->id,
				'mobil_id' 			=> $id,
				'tanggal_akhir' 	=> $tanggal_akhir,
				'tujuan' 			=> $tujuan,
				'noktp' 			=> $noktp,
			]);

			$this->M_Master->success('Data berhasil dikirim');
			redirect('/');
		}
	}

	public function login() {
        if ($this->input->method(TRUE) == 'POST') {
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$where = [
				'email' => $email,
				'password' => $password,
			];

			$cek = $this->M_Master->get_id('users', $where)->row();

			if ($cek) {
				$this->session->set_userdata('user', $cek);
				$this->M_Master->success('Anda berhasil login');

				if ($cek->role === 'public') {
					redirect('/');
				} else {
					redirect('admin/jenis-perawatan');
				}
			} else {
				$this->M_Master->warning('Email atau password salah');
				redirect('login');
			}
        }

		$this->load->view('template/login');
	}

	public function register()
	{
        if ($this->input->method(TRUE) == 'POST') {
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$where = "username = '$username' or email = '$email'";

			$cek = $this->M_Master->get_id('users', $where)->row();

			if (!$cek) {
                $add = $this->M_Master->add('users', [
					'username' => $username,
					'email' => $email,
					'password' => $password,
					'status' => 1,
					'created_at' => date('Y-m-d H:i:s'),
					'role' => 'public',
				]);
				$this->M_Master->success('Anda berhasil register');
				redirect('login');
			} else {
				$this->M_Master->warning('Username atau email sudah terdaftar');
				redirect('register');
			}
        }

		$this->load->view('template/register');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}