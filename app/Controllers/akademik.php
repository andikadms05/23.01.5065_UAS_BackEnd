<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(['Kehadiran_model', 'Nilai_model']);
    }

    public function kehadiran() {
        $data['kehadiran'] = $this->Kehadiran_model->get_all_attendance();
        $this->load->view('akademik/kehadiran', $data);
    }

    public function nilai() {
        $data['nilai'] = $this->Nilai_model->get_all_grades();
        $this->load->view('akademik/nilai', $data);
    }
}