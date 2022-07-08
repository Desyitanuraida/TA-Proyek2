<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perawatan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->title = 'Perawatan';
		$this->table = 'perawatan';

		$this->load->model('M_Master');

		if (!$this->session->userdata('user')) {
			$this->M_Master->warning('Silahkan login terlebih dahulu');
			redirect('login');
		}
	}

	public function index() {
		$select = "{$this->table}.*, mobil.nopol as nopol, jenis_perawatan.nama as jenis_perawatan";
        $data['data'] = $this->M_Master->get_join_id(
            $this->table,
            array(
                array(
                    'table' => 'mobil',
                    'fk'    => $this->table . '.mobil_id=mobil.id'
                ),
				array(
                    'table' => 'jenis_perawatan',
                    'fk'    => $this->table . '.jenis_perawatan_id=jenis_perawatan.id'
                ),
            ),
            null,
            $select)->result();
        $data['title'] = $this->title;
        $data['view'] = $this->table . '/index';

        $this->load->view('template/index', $data);
	}

	public function form($id = null) {
		if ($this->input->method(TRUE) == 'POST') {
			$mobil 				= $this->input->post('mobil');
			$jenis_perawatan 	= $this->input->post('jenis_perawatan');
			$tanggal 			= $this->input->post('tanggal');
			$biaya 				= $this->input->post('biaya');
			$km_mobil 			= $this->input->post('km_mobil');
			$deskripsi 			= $this->input->post('deskripsi');
			
			$data   = [
				'mobil_id' 				=> $mobil,
				'jenis_perawatan_id' 	=> $jenis_perawatan,
				'tanggal' 				=> $tanggal,
				'biaya' 				=> $biaya,
				'km_mobil' 				=> $km_mobil,
				'deskripsi' 			=> $deskripsi,
			];

            $msg    = 'Berhasil tambah data';
			
            if (!empty($id)) {
                $where  = ['id' => $id];
                $edit   = $this->M_Master->edit($this->table, $data, $where);
                $msg    = 'Berhasil ubah data';
            } else {
                $add    = $this->M_Master->add($this->table, $data);
            }

            $this->M_Master->success($msg);
            redirect('admin/perawatan');
		}

		$data['mobil']           	= $this->M_Master->get('mobil')->result();
		$data['jenis_perawatan']    = $this->M_Master->get('jenis_perawatan')->result();
		$data['detail'] 			= $id ? $this->M_Master->get_id($this->table, ['id' => $id])->row() : null;
		$data['title'] 				= $this->title;
		$data['view'] 				= $this->table.'/form';

		$this->load->view('template/index', $data);
	}

	public function delete($id)
	{
		$where  = ['id' => $id];
		$del    = $this->M_Master->del($this->table, $where);
		$this->M_Master->success('Berhasil hapus data');
		
		redirect('admin/perawatan');
	}
}
