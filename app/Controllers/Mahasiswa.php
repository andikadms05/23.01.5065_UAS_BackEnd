<?php

namespace App\Controllers;

use App\Models\ModelMahasiswa;

class Mahasiswa extends BaseController
{
    protected $model;

    public function __construct()
    {

        $this->model = new ModelMahasiswa();
    }


    public function index()
    {
        $data['nilai'] = $this->model->findAll();
        return view('dashboard', $data);
    }



    public function simpan()
    {
        $nama = $this->request->getPost('nama');
        $nim = $this->request->getPost('nim');
        $tugas = $this->request->getPost('tugas');
        $responsi = $this->request->getPost('responsi');
        $uts = $this->request->getPost('uts');
        $uas = $this->request->getPost('uas');

        // Validasi data
        if (!$nama || !$nim || !$tugas || !$responsi || !$uts || !$uas) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Semua data harus diisi!']);
        }

        // Siapkan data untuk disimpan
        $data = [
            'nama' => $nama,
            'nim' => $nim,
            'tugas' => $tugas,
            'responsi' => $responsi,
            'uts' => $uts,
            'uas' => $uas,
        ];

        try {

            if ($this->model->save($data)) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil disimpan!']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menyimpan data ke database!']);
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => 'Kesalahan server: ' . $e->getMessage()]);
        }
    }


    public function update()
    {
        $id = $this->request->getPost('id');
        $data = [
            'nama' => $this->request->getPost('nama'),
            'nim' => $this->request->getPost('nim'),
            'tugas' => $this->request->getPost('tugas'),
            'responsi' => $this->request->getPost('responsi'),
            'uts' => $this->request->getPost('uts'),
            'uas' => $this->request->getPost('uas'),
        ];

        if ($this->model->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil diperbarui!']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal memperbarui data!']);
        }
    }

    public function delete($id)
    {
        if ($this->model->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus data']);
        }
    }


    public function cari()
    {
        $kataKunci = $this->request->getVar('katakunci'); // Ambil input dari form atau AJAX
        if (!$kataKunci) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Kata kunci tidak boleh kosong.']);
        }

        // Gunakan model yang benar
        $model = new ModelMahasiswa();

        // Cari data berdasarkan kolom yang relevan
        $data = $model->like('nim', $kataKunci)
            ->orLike('nama', $kataKunci)
            ->first(); // Ambil hanya satu data

        // Periksa apakah data ditemukan
        if ($data) {
            return $this->response->setJSON(['status' => 'success', 'data' => $data]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data tidak ditemukan.']);
        }
    }
}
