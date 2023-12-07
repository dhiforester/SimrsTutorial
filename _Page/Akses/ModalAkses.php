<div class="modal fade" id="ModalTambahAkses" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahAkses">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-person-plus"></i> Tambah Akses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="nama_akses">Nama Lengkap</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="nama_akses" id="nama_akses" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="kontak_akses">Nomor Kontak</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="kontak_akses" id="kontak_akses" class="form-control" placeholder="62">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="email_akses">Email</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="email_akses" id="email_akses" class="form-control" placeholder="alamat-email@domain.com">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="password1">Password</label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" name="password1" id="password1" class="form-control">
                            <small class="credit">Password hanya boleh terdiri dari 6-20 karakter angka dan huruf</small>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="password2">Ulangi Password</label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" name="password2" id="password2" class="form-control">
                            <small class="credit">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Tampilkan" id="TampilkanPassword" name="TampilkanPassword">
                                    <label class="form-check-label" for="TampilkanPassword">
                                        Tampilkan Password
                                    </label>
                                </div>
                            </small>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="akses">Level Akses</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="akses" id="akses" list="ListAkses" class="form-control">
                            <datalist id="ListAkses">
                                <?php
                                    //Array Data akses
                                    $QryAkses = mysqli_query($Conn, "SELECT DISTINCT akses FROM akses ORDER BY akses ASC");
                                    while ($DataAkses = mysqli_fetch_array($QryAkses)) {
                                        $akses= $DataAkses['akses'];
                                        echo '<option value="'.$akses.'">';
                                    }
                                ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3" id="NotifikasiTambahAkses">
                            <small class="text-primary">Pastkan data akses yang anda input sudah benar</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-primary">
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
<div class="modal fade" id="ModalDetailAkses" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light"><i class="bi bi-person-fill"></i> Detail Akses</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="FormDetailAkses">
                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEditAkses" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditAkses">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-person-plus"></i> Edit Akses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormEditAkses">
                    
                </div>
                <div class="modal-footer bg-primary">
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
<div class="modal fade" id="ModalUbahPassword" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesUbahPassword">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-light"><i class="bi bi-key"></i> Ubah Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormUbahPassword">
                    
                </div>
                <div class="modal-footer bg-info">
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