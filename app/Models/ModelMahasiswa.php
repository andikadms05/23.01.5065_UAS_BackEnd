<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMahasiswa extends Model
{
    protected $table      = 'nilai'; // Nama tabel
    protected $primaryKey = 'id'; // Sesuaikan dengan primary key tabel Anda

    protected $allowedFields = ['nama', 'nim', 'tugas', 'responsi', 'uts', 'uas']; // Kolom yang boleh diinsert
}
