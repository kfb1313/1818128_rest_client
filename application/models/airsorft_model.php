<?php
defined('BASEPATH') or exit('No direct script access allowed');
use GuzzleHttp\Client;

class airsoft_model extends CI_Model
{
  private $_client;

  public function __construct()
  {
    parent::__construct();
    $this->_client = new Client();
  }

  public function get()
  {
    $response = $this->_client->request('GET', 'http://localhost/rest_airsoftgun/airsoft');
    $result = json_decode($response->getBody()->getContents(), true);
  }

  public function count()
  {
    return $this->_client->request('GET', 'http://localhost/rest_airsoftgun/airsoft')->num_rows();
  }

  public function add($data)
  {
    try {
      $response = $this->_client->request('POST', 'http://localhost/rest_airsoftgun/airsoft', [
        'form_params' => $data
      ]);
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
    $response = $this->_client->request('DELETE', 'http://localhost/rest_airsoftgun/airsoft',[
      'form_params' => [
        'id' => $id
      ]
    ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result;
  }
}
