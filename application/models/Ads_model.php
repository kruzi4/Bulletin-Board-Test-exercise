<?php

class Ads_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function getAds() {
    $query = $this->db->get('adverb');
    return $query->result_array();
  }

}
