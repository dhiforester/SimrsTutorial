<div class="modal fade" id="ModalTambahPasien" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahPasien">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"><i class="bi bi-plus"></i> Tambah Pasien</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="nama">Nama Lengkap</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="nama" id="nama" class="form-control">
                            <small>
                                <code id="panjang_nama" class="text-dark">0</code>/<code class="text-info">50</code>
                            </small>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="nik">NIK</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="nik" id="nik" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="no_bpjs">No.BPJS</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="no_bpjs" id="no_bpjs" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="kontak">Nomor Kontak</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="kontak" id="kontak" class="form-control" placeholder="62">
                            <small>Hanya boleh angka (maksimal 20 karakter)</small>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="tempat_lahir">Tempat Lahir</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
                            <small>
                                <code id="panjang_tempat_lahir" class="text-dark">0</code>/<code class="text-info">20</code>
                            </small>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                        </div>
                        <div class="col-md-8">
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="gender">Gender</label>
                        </div>
                        <div class="col-md-8">
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Pilih</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-laki">Laki-laki</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="propinsi">Provinsi</label>
                        </div>
                        <div class="col-md-8">
                            <select name="propinsi" id="propinsi" class="form-control">
                                <option value="">Pilih</option>
                                <?php
                                    //List Provinsi
                                    $query = mysqli_query($Conn, "SELECT*FROM wilayah WHERE kategori='Provinsi' ORDER BY nama ASC");
                                    while ($data = mysqli_fetch_array($query)) {
                                        $id_wilayah=$data['id_wilayah'];
                                        $kode=$data['kode'];
                                        $nama=$data['nama'];
                                        echo '<option value="'.$kode.'">'.$nama.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="kabupaten">Kabupaten</label>
                        </div>
                        <div class="col-md-8">
                            <select name="kabupaten" id="kabupaten" class="form-control">
                                <option value="">Pilih</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="kecamatan">Kecamatan</label>
                        </div>
                        <div class="col-md-8">
                            <select name="kecamatan" id="kecamatan" class="form-control">
                                <option value="">Pilih</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="desa">Desa</label>
                        </div>
                        <div class="col-md-8">
                            <select name="desa" id="desa" class="form-control">
                                <option value="">Pilih</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="alamat">Alamat</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="alamat" id="alamat" class="form-control"></textarea>
                            <code id="panjang_alamat" class="text-dark">0</code>/<code class="text-info">50</code>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="golongan_darah">Golongan Darah</label>
                        </div>
                        <div class="col-md-8">
                            <select name="golongan_darah" id="golongan_darah" class="form-control">
                                <option value="">Pilih</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="status">Satatus Pasien</label>
                        </div>
                        <div class="col-md-8">
                            <select name="status" id="status" class="form-control">
                                <option value="">Pilih</option>
                                <option value="Aktiv">Aktiv</option>
                                <option value="Non Aktiv">Non Aktiv</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3" id="NotifikasiTambahPasien">
                            <small><code class="text-primary">Pastkan data pasien yang anda input sudah benar</code></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDetailPasien" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark"><i class="bi bi-info-circle"></i> Detail Pasien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDetailPasien">
                <!-- Menampilkan Detail pasien Disini -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEditPasien" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditPasien">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"><i class="bi bi-pencil-square"></i> Edit Pasien</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="FormEditPasien">
                        <!-- Form Edit Pasien -->
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3" id="NotifikasiEditPasien">
                            <small><code class="text-primary">Pastkan data pasien yang anda input sudah benar</code></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalHapusPasien" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesHapusPasien">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"><i class="bi bi-trash"></i> Hapus Pasien</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_pasien" id="PutIdPasien">
                    <div class="row">
                        <div class="col-md-12 text-center mt-3">
                            <img src="assets/img/delete.gif" width="80%">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3" id="NotifikasiHapusPasien">
                            <small><code class="text-primary">Apakah anda yakin akan menghapus data ini?</code></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-check"></i> Ya, Hapus
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>