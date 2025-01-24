<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model {
    private $table = 'nilai';

    public function get_all_grades() {
        return $this->db->get($this->table)->result();
    }

    public function insert_grade($data) {
        return $this->db->insert($this->table, $data);
    }
}