<?php

class Ads_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function getAdsOnPage($row_count, $offset) {
    $query = $this->db
      ->order_by('time', 'desc')
      ->get('adverb', $row_count, $offset);
    return $query->result_array();
}

  public function setAds($title, $text, $autor = 'unnamed', $image = 'img_cat') {
    $data = [
      'title' => $title,
      'text' => $text,
      'autor' => $autor,
      'image' => $image
    ];
    return $this->db->insert('adverb', $data);
  }

}
