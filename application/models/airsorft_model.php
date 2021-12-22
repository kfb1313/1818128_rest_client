<?php
defined('BASEPATH') or exit('No direct script access allowed');

class airsoft_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function get($id = null, $limit = 5, $offset = 0)
  {
    if ($id === null) {
      return $this->db->get('tb_airsoft', $limit, $offset)->result();
    } else {
      return $this->db->get_where('tb_airsoft', ['id_model' => $id])->result_array();
    }
  }

  public function count()
  {
    return $this->db->get('tb_airsoft')->num_rows();
  }

  public function add($data)
  {
    try {
      $this->db->insert('tb_airsoft', $data);
      $error = $this->db->error();
      if (!empty($error['code'])) {
        throw new Exception('ERROR: ' . $error['message']);
        return false;
      }
      return ['status' => true, 'data' => $this->db->affected_rows()];
    } catch (Exception $ex) {
      return ['status' => false, 'msg' => $ex->getMessage()];
    }
  }

  public function update($id, $data)
  {
    try {
      $this->db->update('tb_airsoft', $data, ['id_model' => $id]);
      $error = $this->db->error();
      if (!empty($error['code'])) {
        throw new Exception('ERROR: ' . $error['message']);
        return false;
      }
      return ['status' => true, 'data' => $this->db->affected_rows()];
    } catch (Exception $ex) {
      return ['status' => false, 'msg' => $ex->getMessage()];
    }
  }

  public function delete($id)
  {
    try {
      $this->db->delete('tb_airsoft', ['id_model' => $id]);
      $error = $this->db->error();
      if (!empty($error['code'])) {
        throw new Exception('ERROR: ' . $error['message']);
        return false;
      }
      return ['status' => true, 'data' => $this->db->affected_rows()];
    } catch (Exception $ex) {
      return ['status' => false, 'msg' => $ex->getMessage()];
    }
  }
}
