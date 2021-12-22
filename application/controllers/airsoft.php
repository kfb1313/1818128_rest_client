<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class airsoft extends RestController
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('airsoft_model', 'ars');
    $this->methods['index_get']['limit'] = 2;
  }

  public function index_get()
  {
    $id = $this->get('id_model', true);
    if ($id === null) {
      $p = $this->get('page', true);
      $p = (empty($p) ? 1 : $p);
      $total_data = $this->ars->count();
      $total_page = ceil($total_data / 5);
      $start = ($p - 1) * 5;
      $list = $this->ars->get(null, 5, $start);
      if ($list) {
        $data = [
          'status' => true,
          'page' => $p,
          'total_data' => $total_data,
          'total_page' => $total_page,
          'data' => $list
        ];
      } else {
        $data = [
          'status' => false,
          'msg' => 'Data tidak ditemukan'
        ];
      }
      $this->response($data, RestController::HTTP_OK);
    } else {
      $data = $this->ars->get($id);
      if ($data) {
        $this->response(['status' => true, 'data' => $data], RestController::HTTP_OK);
      } else {
        $this->response(['status' => false, 'msg' => $id . ' tidak ditemukan'], RestController::HTTP_NOT_FOUND);
      }
    }
  }

  public function index_post()
  {
    $data = [
      'id_model' => $this->post('id_model', true),
      'nama_unit' => $this->post('nama_unit', true),
      'jenis_unit' => $this->post('jenis_unit', true),
      'tahun_model' => $this->post('tahun_model', true),
      'harga_sewa' => $this->post('harga_sewa', true)
    ];
    $simpan = $this->ars->add($data);
    if ($simpan['status']) {
      $this->response(['status' => true, 'msg' => $simpan['data'] . ' DATA DITAMBAHKAN'], RestController::HTTP_CREATED);
    } else {
      $this->response(['status' => false, 'msg' => $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
    }
  }

  public function index_put()
  {
    $data = [
      'id_model' => $this->put('id_model', true),
      'nama_unit' => $this->put('nama_unit', true),
      'jenis_unit' => $this->put('jenis_unit', true),
      'tahun_model' => $this->put('tahun_model', true),
      'harga_sewa' => $this->put('harga_sewa', true),
    ];
    $id = $this->put('id_model', true);
    if ($id === null) {
      $this->response(['status' => false, 'msg' => 'Masukan ID Model yang Akan Diubah'], RestController::HTTP_BAD_REQUEST);
    }
    $simpan = $this->ars->update($id, $data);
    if ($simpan['status']) {
      $status = (int)$simpan['data'];
      if ($status > 0)
        $this->response(['status' => true, 'msg' => $simpan['data'] . ' Data telah dirubah'], RestController::HTTP_OK);
      else
        $this->response(['status' => false, 'msg' => 'Tidak ada data yang dirubah'], RestController::HTTP_BAD_REQUEST);
    } else {
      $this->response(['status' => false, 'msg' => $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
    }
  }

  public function index_delete()
  {
    $id = $this->delete('id_model', true);
    if ($id === null) {
      $this->response(['status' => false, 'msg' => 'Masukan ID Model yang Akan Dihapus'], RestController::HTTP_BAD_REQUEST);
    }
    $delete = $this->ars->delete($id);
    if ($delete['status']) {
      $status = (int)$delete['data'];
      if ($status > 0)
        $this->response(['status' => true, 'msg' => $id . ' data telah dihapus'], RestController::HTTP_OK);
      else
        $this->response(['status' => false, 'msg' => 'Tidak ada data yang dihapus'], RestController::HTTP_BAD_REQUEST);
    } else {
      $this->response(['status' => false, 'msg' => $delete['msg']], RestController::HTTP_INTERNAL_ERROR);
    }
  }
}
