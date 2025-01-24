<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    background-color: #f0f0f0;
    }
    .sidebar {
        width: 250px;
        background-color: #ffffff;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        position: relative;
        height: 100vh;
        overflow-y: auto;
    }
    .logo {
        top: 10px;
        left: 20px;
        width: 150px;
        margin-bottom: 0px;
    }
    .logo img {
        width: 100%;
    }
    .sidebar a, .sidebar button.collapsible {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: #333;
        margin-bottom: 10px;
        border-radius: 5px;
        cursor: pointer;
        background-color: transparent;
        border: none;
        text-align: left;
        font-family: Arial, sans-serif;
    }
    .sidebar a:hover, .sidebar button.collapsible:hover {
        background-color: #ddd;
    }
    .sidebar a.active, .sidebar button.collapsible.active {
        background-color: #7434ac;
        color: white;
    }
    .main-content {
        flex-grow: 1;
        padding: 20px;
    }
    .main-content h1 {
        margin-top: 0;
    }
    .grid-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    .card {
        background-color: #7434ac;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        border-radius: 5px;
    }
    .card h2 {
        margin: 0 0 30px;
    }
    .card select {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
    }
    .profile-container {
        background-color: #ffffff;
        padding: 20px;
        box-shadow: 0 2px 5px #7434ac;
        border-radius: 5px;
        max-width: 700px;
    }
    .profile-header {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .profile-item {
        margin-bottom: 10px;
    }
    .profile-item label {
        font-weight: normal;
        display: block;
    }
    .kuis-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    .kuis-item {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 40px;
        padding-top: 60px;
        background-color: #ffffff;
        box-shadow: 0 2px 5px #7434ac;
        position: relative;
    }
    .kuis-item h2 {
        font-size: 15px;
        font-weight: normal;
        margin: 0;
        text-align: left;
        position: absolute;
        top: 15px;
        left: 10px;
        border-bottom: 1px solid #ddd;
        width: calc(100% - 20px);
        padding-bottom: 10px;
    }
    .rekap-container {
        margin-top: 20px;
    }
    .rekap-container select {
        padding: 10px;
        margin-bottom: 10px;
    }
    table {
        width: 100%;
        background-color: #ffffff;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid #d4d4d4;
    }
    th, td {
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #7434ac;
    }
    .hidden {
        display: none;
    }
    .collapsible {
        cursor: pointer;
        padding: 10px;
        width: 100%; 
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
    } 
    .collapsible-content {
        padding: 0 10px;
        display: none;
        overflow: hidden;
        background-color: #ffffff;
    }
    .form-container {
        width: 90%;
        background-color: #ffffff;
        padding: 20px;
        box-shadow: 0 2px 5px #7434ac;
        border-radius: 5px;
    }
    .form-container label {
        display: block;
        margin-bottom: 10px;
    }
    .form-container input, .form-container select {
        width: 98%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .form-container button {
        background-color: #7434ac;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .add-data-button {
        background-color:rgb(87, 38, 130);
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 10px;
    }
    .add-data-button:hover {
        background-color:rgb(112, 56, 161);
    }
    .modal {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
    }
    .modal.hidden {
        display: none;
    }
    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        width: 400px;
        max-width: 90%;
    }
    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }
</style>
</style>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="http://ppm.amikom.ac.id/resource/assets/images/Logo_Amikom_color.png" alt="Logo">
        </div>
        <a onclick="showSection('beranda')">Beranda</a>
        <a onclick="showSection('profil')">Profil</a>
        <a onclick="showSection('kuis')">Kuis</a>
        <button class="collapsible">Rekapitulasi Nilai</button>
        <div class="collapsible-content">
            <a onclick="showSection('kehadiran')">Kehadiran</a>
            <a onclick="showSection('nilai')">Nilai</a>
        </div>
    </div>
    <div class="main-content">
        <div id="beranda" class="content-section">
            <h1>Beranda</h1>
            <div class="grid-container">
                <div class="card">
                    <h2>Prodi</h2>
                    <select>
                        <option>Kelas</option>
                    </select>
                </div>
                <div class="card">
                    <h2>Prodi</h2>
                    <select>
                        <option>Kelas</option>
                    </select>
                </div>
                <div class="card">
                    <h2>Prodi</h2>
                    <select>
                        <option>Kelas</option>
                    </select>
                </div>
                <div class="card">
                    <h2>Prodi</h2>
                    <select>
                        <option>Kelas</option>
                    </select>
                </div>
                <div class="card">
                    <h2>Prodi</h2>
                    <select>
                        <option>Kelas</option>
                    </select>
                </div>
                <div class="card">
                    <h2>Prodi</h2>
                    <select>
                        <option>Kelas</option>
                    </select>
                </div>
                <div class="card">
                    <h2>Prodi</h2>
                    <select>
                        <option>Kelas</option>
                    </select>
                </div>
                <div class="card">
                    <h2>Prodi</h2>
                    <select>
                        <option>Kelas</option>
                    </select>
                </div>
                <div class="card">
                    <h2>Prodi</h2>
                    <select>
                        <option>Kelas</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="profil" class="content-section hidden">
            <h1>Profil</h1>
            <div class="profile-container">
                <div class="profile-header">Ringkasan Profil</div>
                <div class="profile-item">
                    <label>Nama :</label>
                </div>
                <div class="profile-item">
                    <label>NID/NIDN :</label>
                </div>
                <div class="profile-item">
                    <label>Tempat/Tanggal Lahir :</label>
                </div>
                <div class="profile-item">
                    <label>Jenis Kelamin :</label>
                </div>
                <div class="profile-item">
                    <label>Agama :</label>
                </div>
                <div class="profile-item">
                    <label>Alamat :</label>
                </div>
                <div class="profile-item">
                    <label>Email :</label>
                </div>
            </div>
        </div>
        <div id="kuis" class="content-section hidden">
            <h1>Kuis</h1>
            <div class="kuis-grid">
                <div class="kuis-item">
                    <h2>Kuis ke -</h2>
                </div>
                <div class="kuis-item">
                    <h2>Kuis ke -</h2>
                </div>
                <div class="kuis-item">
                    <h2>Kuis ke -</h2>
                </div>
                <div class="kuis-item">
                    <h2>Kuis ke -</h2>
                </div>
                <div class="kuis-item">
                    <h2>Kuis ke -</h2>
                </div>
                <div class="kuis-item">
                    <h2>Kuis ke -</h2>
                </div>
                <div class="kuis-item">
                    <h2>Kuis ke -</h2>
                </div>
                <div class="kuis-item">
                    <h2>Kuis ke -</h2>
                </div>
                <div class="kuis-item">
                    <h2>Kuis ke -</h2>
                </div>
                <div class="kuis-item">
                    <h2>Kuis ke -</h2>
                </div>
                <div class="kuis-item">
                    <h2>Kuis ke -</h2>
                </div>
                <div class="kuis-item">
                    <h2>Kuis ke -</h2>
                </div>
            </div>
        </div>
        <div id="kehadiran" class="content-section hidden">
            <h1>Kehadiran</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Email</th>
                        <th>Hadir / Tidak</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
        <div id="nilai" class="content-section hidden">
            <h1>Nilai</h1>
            <button class="add-data-button" onclick="showModal()">Tambah Data</button>
            <!-- Modal Tambah Data -->
            <div id="modalTambahData" class="modal hidden">
                <div class="modal-content form-container">
                    <span class="close" onclick="closeModal()">×</span>
                    <h2>Tambah Data Nilai</h2>
                    <form id="formTambahData" action="mahasiswa/simpan" method="POST">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" required>
                    
                    <label for="nim">NIM</label>
                    <input type="text" id="nim" name="nim" required>
                    
                    <label for="tugas">Tugas</label>
                    <input type="number" id="tugas" name="tugas" required>
                    
                    <label for="responsi">Responsi</label>
                    <input type="number" id="responsi" name="responsi" required>
                    
                    <label for="uts">UTS</label>
                    <input type="number" id="uts" name="uts" required>
                    
                    <label for="uas">UAS</label>
                    <input type="number" id="uas" name="uas" required>
                    
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit">Simpan</button>
                </form>
                    </form>
                </div>
            </div>
            <!-- Modal Edit Data -->
            <div id="modalEditData" class="modal hidden">
            <div class="modal-content form-container">
                <span class="close" onclick="closeModalEdit()">×</span>
                <h2>Edit Data Nilai</h2>
                <form id="formEditData" action="mahasiswa/update" method="POST">
                    <input type="hidden" id="editId" name="id">
                    
                    <label for="editNama">Nama</label>
                    <input type="text" id="editNama" name="nama" required>
                    
                    <label for="editNim">NIM</label>
                    <input type="text" id="editNim" name="nim" required>
                    
                    <label for="editTugas">Tugas</label>
                    <input type="number" id="editTugas" name="tugas" required>
                    
                    <label for="editResponsi">Responsi</label>
                    <input type="number" id="editResponsi" name="responsi" required>
                    
                    <label for="editUts">UTS</label>
                    <input type="number" id="editUts" name="uts" required>
                    
                    <label for="editUas">UAS</label>
                    <input type="number" id="editUas" name="uas" required>
                    
                    <button type="submit">Simpan</button>
                </form>
            </div>
        </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Tugas</th>
                        <th>Responsi</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($nilai)) : ?>
                <?php $no = 1; foreach ($nilai as $row) : ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']); ?></td>
                        <td><?= htmlspecialchars($row['nama']); ?></td>
                        <td><?= htmlspecialchars($row['nim']); ?></td>
                        <td><?= htmlspecialchars($row['tugas']); ?></td>
                        <td><?= htmlspecialchars($row['responsi']); ?></td>
                        <td><?= htmlspecialchars($row['uts']); ?></td>
                        <td><?= htmlspecialchars($row['uas']); ?></td>
                        <td>
                            <button onclick="editData(<?= $row['id']; ?>, '<?= $row['nama']; ?>', '<?= $row['nim']; ?>', <?= $row['tugas']; ?>, <?= $row['responsi']; ?>, <?= $row['uts']; ?>, <?= $row['uas']; ?>)">Edit</button>
                            <button onclick="deleteData(<?= $row['id']; ?>)">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <td colspan="7" style="text-align: center;">Tidak ada data nilai</td>
                </tr>
            <?php endif; ?>
                </tbody>
            </table>
        </div>
    <script>
        function showModal() {
            document.getElementById('modalTambahData').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modalTambahData').classList.add('hidden');
        }
            function showSection(sectionId) {
                const sections = document.querySelectorAll('.content-section');
                sections.forEach(section => {
                    section.classList.toggle('hidden', section.id !== sectionId);
                });
            }
        document.querySelectorAll('.collapsible').forEach(button => {
            button.addEventListener('click', () => {
                button.classList.toggle('active');
                const content = button.nextElementSibling;
                if (content.style.display === 'block') {
                    content.style.display = 'none';
                } else {
                    content.style.display = 'block';
                }
            });
        });

        $('#formTambahData').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: 'http://localhost/23.01.5065_UAS/public/mahasiswa/simpan', // Pastikan endpoint yang benar
                method: 'POST',
                data: $(this).serialize(), // Menyertakan data form
                success: function(response) {
                    if(response.status === 'success') {
                        alert(response.message); // Menampilkan pesan sukses
                        closeModal(); // Menutup modal
                        location.reload(); // Reload halaman untuk melihat data terbaru
                    } else {
                        alert(response.message); // Menampilkan pesan error
                    }
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan: ' + error); // Menangani error AJAX
                }
            });
        });

        function editData(id, nama, nim, tugas, responsi, uts, uas) {
            document.getElementById('editId').value = id;
            document.getElementById('editNama').value = nama;
            document.getElementById('editNim').value = nim;
            document.getElementById('editTugas').value = tugas;
            document.getElementById('editResponsi').value = responsi;
            document.getElementById('editUts').value = uts;
            document.getElementById('editUas').value = uas;
            document.getElementById('modalEditData').classList.remove('hidden');
        }

        function closeModalEdit() {
            document.getElementById('modalEditData').classList.add('hidden');
        }

        $('.btnDelete').on('click', function() {
        const id = $(this).data('id');
        console.log('ID yang dihapus:', id); // Periksa nilai ID di konsol browser

        if (id === undefined) {
            alert('ID tidak ditemukan. Periksa HTML tombol delete.');
            return;
        }

        const confirmDelete = confirm(`Apakah Anda yakin ingin menghapus data mahasiswa dengan ID ${id}?`);

        if (confirmDelete) {
            $.ajax({
            url: `http://localhost/ci4crud/public/index.php/mahasiswa/delete/${id}`,
            type: "POST",
            success: function(response) {
                if (response.status === 'success') {
                alert(response.message);
                location.reload();
                } else {
                alert(response.message);
                }
            },
            error: function() {
                alert('Terjadi kesalahan saat menghapus data.');
            }
            });
        }
        });

    </script>
</body>
</html>