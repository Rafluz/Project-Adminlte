<main class="app-main">
    <!-- App Content Header -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Form Tambah Post</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Tambah Post</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- App Content -->
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Form Tambah Post</h4>
            </div>
            <div class="card-body">
                <form action="http://localhost/blajar/view/page/form_tambah_post/simpan_post.php" method="get">
                    <!-- Judul Post -->
                    <div class="mb-3">
                        <label for="judul_post" class="form-label">Judul Post</label>
                        <input type="text" class="form-control" id="judul_post" name="judul_post" placeholder="Masukkan Judul Post" required>
                    </div>
                    <!-- Isi Post -->
                    <div class="mb-3">
                        <label for="isi_post" class="form-label">Isi Post</label>
                        <textarea class="form-control" id="isi_post" name="isi_post" placeholder="Masukkan Isi Post" rows="5" required></textarea>
                    </div>
                    <!-- Tanggal Post -->
                    <div class="mb-3">
                        <label for="tgl_post" class="form-label">Tanggal Post</label>
                        <input type="date" class="form-control" id="tgl_post" name="tgl_post" required>
                    </div>
                    <!-- Kategori -->
                    <div class="mb-3">
                        <label for="id_katgori" class="form-label">Kategori</label>
                        <select name="id_katgori" id="id_katgori" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            <?php
                            // Contoh opsi kategori, bisa diambil dari database jika diperlukan
                            echo '<option value="1">Berita</option>';
                            echo '<option value="2">Artikel</option>';
                            echo '<option value="3">Tutorial</option>';
                            ?>
                        </select>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>
