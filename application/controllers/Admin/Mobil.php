<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mobil extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->title = 'Mobil';
        $this->table = 'mobil';

        $this->load->model('M_Master');

		if (!$this->session->userdata('user')) {
			$this->M_Master->warning('Silahkan login terlebih dahulu');
			redirect('login');
		}
    }

    public function index()
    {
        $select = "{$this->table}.*, merk.nama as nama_merk";
        $data['data'] = $this->M_Master->get_join_id(
            $this->table,
            array(
                array(
                    'table' => 'merk',
                    'fk'    => $this->table . '.merk_id=merk.id'
                ),
            ),
            null,
            $select)->result();
        $data['title'] = $this->title;
        $data['view'] = $this->table . '/index';

        $this->load->view('template/index', $data);
    }

    public function form($id = null)
    {
        if ($this->input->method(TRUE) == 'POST') {
            $merk       = $this->input->post('merk');
            $nopol      = $this->input->post('nopol');
            $warna      = $this->input->post('warna');
            $biaya_sewa = $this->input->post('biaya_sewa');
            $deskripsi  = $this->input->post('deskripsi');
            $cc         = $this->input->post('cc');
            $tahun      = $this->input->post('tahun');

            $data   = [
                'merk_id'       => $merk,
                'nopol'         => $nopol,
                'warna'         => $warna,
                'biaya_sewa'    => $biaya_sewa,
                'deskripsi'     => $deskripsi,
                'cc'            => $cc,
                'tahun'         => $tahun,
            ];

            $msg    = 'Berhasil tambah data';
            
            if ($_FILES['foto']['name']) {
                $new_name = time() . $_FILES['foto']['name'];
                $config['file_name'] = $new_name;
                $config['upload_path'] = './public/mobil/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);

                create_folder(FCPATH . str_replace('./', '', $config['upload_path']));
                $data['foto'] = $new_name;
                if (!$this->upload->do_upload('foto')) {
                    $error = array('error' => $this->upload->display_errors());

                    $this->M_Master->warning(implode('<br>', $error));
                    $id = $id ? $id : '';
                    redirect('admin/mobil/form/' . $id);
                } else {
                    $upload_data = array('upload_data' => $this->upload->data());
                }
            }

            if (!empty($id)) {

                $where  = ['id' => $id];
                $detail = $this->M_Master->get_id($this->table, $where)->row();
                $edit   = $this->M_Master->edit($this->table, $data, $where);
                $msg    = 'Berhasil ubah data';
            
            } else {
                $add    = $this->M_Master->add($this->table, $data);
            }

            $this->M_Master->success($msg);
            redirect('admin/mobil');
        }

        $data['merk']           = $this->M_Master->get('merk')->result();
        $data['detail']         = $id ? $this->M_Master->get_id($this->table, ['id' => $id])->row() : null;
        $data['title']          = $this->title;
        $data['view']           = $this->table . '/form';

        $this->load->view('template/index', $data);
    }

    public function sewa($mobil_id)
    {

        $select = "sewa.*, users.username, mobil.nopol as nopol";
        $data['data'] = $this->M_Master->get_join_id(
            'sewa',
            array(
                array(
                    'table' => 'users',
                    'fk'    => 'sewa.users_id=users.id'
                ),
                array(
                    'table' => 'mobil',
                    'fk'    => 'sewa.mobil_id=mobil.id'
                ),
            ),
            null,
        $select)->result();
        $data['title'] = "sewa";
        $data['view'] = $this->table . '/sewa';

        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $where  = ['id' => $id];
        $del    = $this->M_Master->del($this->table, $where);
        $this->M_Master->success('Berhasil hapus data');

        redirect('admin/mobil');
    }
}
