<main class="app-main">
    <!-- App Content Header -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Form Tambah Menu</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Tambah Menu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- App Content -->
    <div class="app-content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Form Tambah Menu</h4>
                </div>
                <div class="card-body">
                    <?php
                    include ".../../../auth/connect.php";
                    ?>
                    <form id="menuForm" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="urutan" class="form-label">Urutan</label>
                            <input type="number" class="form-control" id="urutan" name="urutan"
                                placeholder="Masukkan Urutan" required>
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="url" class="form-control" id="link" name="link" placeholder="Masukkan Link"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="id_induk" class="form-label">Induk</label>
                            <select name="id_induk" id="id_induk" class="form-control" required>
                                <option value="0">Menu Utama</option>
                                <?php
                                $sql = "SELECT * FROM tbmenu WHERE id_induk=0";
                                $result = $db->query($sql);
                                while ($mn = $result->fetch()) {
                                    $id_induk = $mn['id_menu'];
                                    $menu = htmlspecialchars($mn['menu']);
                                    echo "<option value='$id_induk'>$menu</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="target" class="form-label">Target</label>
                            <input type="text" class="form-control" id="target" name="target"
                                placeholder="Masukkan Target" required>
                        </div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </form>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function () {
                            $('#menuForm').on('submit', function (e) {
                                e.preventDefault();
                                var formData = $(this).serialize();
                                var submitButton = $('button[type="submit"]');
                                submitButton.prop('disabled', true).text('Processing...');

                                $.ajax({
                                    type: 'POST',
                                    url: 'http://localhost:8080/xampp/native/view/page/form_tambah_menu/simpan_insert.php',
                                    data: formData,
                                    success: function (response) {
                                        try {
                                            var data = JSON.parse(response);

                                            if (data.status === 'success') {
                                                alert('Data berhasil disimpan!');

                                                var newOption = `<option value="${data.menu.id_menu}">${data.menu.menu}</option>`;
                                                $('#id_induk').append(newOption);

                                                var newSidebarItem = `
                                                <li class="nav-item">
                                                    <a href="?page=${data.menu.menu.toLowerCase().replace(/\s+/g, '_')}" class="nav-link">
                                                        <i class="nav-icon bi bi-palette"></i>
                                                        <p>${data.menu.menu}</p>
                                                    </a>
                                                </li>`;
                                                $('.sidebar-menu').append(newSidebarItem);


                                                $('#menuForm')[0].reset();
                                            } else {
                                                alert('Gagal menyimpan data: ' + data.message);
                                            }

                                            refreshIdIndukDropdown();
                                        } catch (error) {
                                            alert('Gagal memproses respons server. Detail: ' + response);
                                        }
                                    },
                                    error: function (xhr, status, error) {
                                        alert('Terjadi kesalahan. Detail: ' + xhr.responseText);
                                    },
                                    complete: function () {
                                        submitButton.prop('disabled', false).text('Submit');
                                    }
                                });
                            });

                            function refreshIdIndukDropdown() {
                                $.ajax({
                                    url: 'http://localhost:8080/xampp/native/view/page/form_tambah_menu/load_id_induk.php',
                                    method: 'GET',
                                    success: function (response) {
                                        $('#id_induk').html(response);
                                    },
                                    error: function (xhr, status, error) {
                                        alert('Gagal memuat ulang dropdown. Detail: ' + xhr.responseText);
                                    }
                                });
                            }
                        });
                    </script>


                </div>
            </div>
        </div>
    </div>
</main>